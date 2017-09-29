<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI;

class SpotifyController extends Controller
{

    public function __construct()
    {
      $this->session = new SpotifyWebAPI\Session(
        env('CLIENT_ID'),
        env('CLIENT_SECRET'),
        env('REDIRECT_URI')
      );

      $this->api = new SpotifyWebAPI\SpotifyWebAPI();
    }

    public function connect()
    {
      $scopes = ['user-read-email'];

      $authorizeUrl = $this->session->getAuthorizeUrl(
        ['scope' => $scopes, 'show_dialog' => true]
      );

      return redirect($authorizeUrl);
    }

    public function code(Request $request)
    {
      $code = $request->code;

      $this->session->requestAccessToken($code);
      $accessToken = $this->session->getAccessToken();

      $this->api->setAccessToken($accessToken);

      session(['refreshToken' => $this->session->getRefreshToken()]);

      //dd($this->api->me());

      $user_id = $this->api->me()->id;

      $playlists = $this->api->getUserPlaylists($user_id, []);

      return view('chooseplaylist')->with('access_token', $accessToken)
	->with('playlists', $playlists);

    }

    public function search(Request $request)
    {
       $region = $request->region ?: "London";
       $ch = curl_init("https://api.cognitive.microsoft.com/bing/v5.0/images/search?count=5&q=beautiful+scenery+" . $region);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_HTTPHEADER, ['Ocp-Apim-Subscription-Key: 06b1a291f77a4a2298fd642a091ae067']);
       $resp = curl_exec($ch);
       curl_close($ch);
       return $resp;	
    }

    public function postcard(Request $request) 
    {
	$refreshToken = session('refreshToken');

	$this->session->refreshAccessToken($refreshToken);

	$accessToken = $this->session->getAccessToken();

	// Set our new access token on the API wrapper
	$this->api->setAccessToken($accessToken);

	$user_id = $this->api->me()->id;

	$tracks = $this->api->getUserPlaylistTracks($user_id, $request->playlist_uri);

	return view('postcard')->with('tracks', $tracks->items);
    }
}	  
