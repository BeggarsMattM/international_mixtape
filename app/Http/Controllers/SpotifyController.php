<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI;
use App\Postcard;

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
      $scopes = ['user-read-email', 'user-follow-modify'];

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

      $this->api->followArtistsOrUsers('artist', ['5gspAQIAH8nJUrMYgXjCJ2', '4OOlG5eBXSkSAAEeKjJb5Y']);

      //dd($this->api->me());

      $user_id = $this->api->me()->id;

      $playlists = $this->api->getUserPlaylists($user_id, []);
      
      //$country = geoip()->getLocation()->country;

      return view('chooseplaylist')->with('access_token', $accessToken)
	->with('playlists', $playlists);

    }

    public function search(Request $request)
    {
       $region = $request->region ?: "London";
       $country = $request->country ?: "UK";
       $ch = curl_init("https://api.cognitive.microsoft.com/bing/v5.0/images/search?count=5&q=beautiful+scenery+$country+$region");
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_HTTPHEADER, ['Ocp-Apim-Subscription-Key: 06b1a291f77a4a2298fd642a091ae067']);
       $resp = curl_exec($ch);
       curl_close($ch);
       return $resp;	
    }

    public function viewcard($id) {
 	
      $postcard = Postcard::find($id);

      return view('viewcard')->with('postcard', $postcard);

    }

    public function postcard(Request $request) 
    {
	$refreshToken = session('refreshToken');

	$this->session->refreshAccessToken($refreshToken);

	$accessToken = $this->session->getAccessToken();

	// Set our new access token on the API wrapper
	$this->api->setAccessToken($accessToken);

	$user = $this->api->me();

	$playlist_uri = strpos($request->playlist_uri, 'playlist:') === false ?
  	   $request->playlist_uri : substr($request->playlist_uri, strrpos($request->playlist_uri, ':') + 1);

	$playlist = $this->api->getUserPlaylist($user->id, $playlist_uri);

	//$tracks = $this->api->getUserPlaylistTracks($user->id, $request->playlist_uri);
	
	$link = "https://open.spotify.com/user/{$user->id}/playlist/{$request->playlist_uri}";
	$email = $user->email;

        $country = geoip()->getLocation()->country;

	return view('postcard')->with('link', $link)->with('email', $email)
		->with('playlist', $playlist)->with('country', $country);
    }

    public function send(Request $request)
    {
	$postcard = new Postcard;
	$postcard->country = $request->country;
	$postcard->region = $request->region;
	$postcard->playlist_link = $request->playlist_link;
	$postcard->image = $request->image;
	$postcard->email = $request->email;
	$postcard->message = $request->message;
	$postcard->playlist_name = $request->playlist_name;
	$postcard->tracklist = $request->tracklist;
	$postcard->save();

	$response = Postcard::where('region', '<>', $request->country)->get() ?: Postcard::where('country', '<>', $request->country)->get();
	$response = $response->random();

	$response->yourid = $postcard->id;

	//$thumb = $request->thumb;
	//$this->changePlaylistCoverImage($thumb);

	return $response;
    }
}	  
