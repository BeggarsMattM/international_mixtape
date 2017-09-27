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
      $scopes = [];

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

      $user_id = $this->api->me()->id;

      $playlists = $this->api->getUserPlaylists($user_id, []);

      return view('mixtape')->with('access_token', $accessToken)
	->with('playlists', $playlists);

    }

}
