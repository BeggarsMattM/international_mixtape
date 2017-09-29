@extends('layout')

@section('content')
        <div class="section section2">
          <div class="center-wrap">
            <div class="section-header">
              <p class="section-number">1.</p>
              <h2 class="section-title">Select a Playlist</h2>
            </div>
            <div class="center-content">
              <div class="playlist-box">
                <p>Choose From Your Public Playlists</p>
                <ol class="playlist-list">
		  @foreach ($playlists->items as $playlist)
		  <li id="{{ $playlist->id }}" class="public_playlist">{{ $playlist->name }}</li>
		   @endforeach
                  <!--li>1. Playlist Name</li>
                  <li>2. Playlist Name</li>
                  <li>3. Playlist Name</li>
                  <li>4. Playlist Name</li>
                  <li>5. Playlist Name</li>
                  <li>6. Playlist Name</li>
                  <li>7. Playlist Name</li>
                  <li>8. Playlist Name</li>
                  <li>9. Playlist Name</li>
                  <li>10. Playlist Name</li>
                  <li>11. Playlist Name</li>
                  <li>12. Playlist Name</li-->
                </ol>
              </div>
              <p class="or-text">OR</p>
              <div class="playlist-box">
                <p>Enter the URI of a custom playlist</p>
                <p>Where can I find this?</p>
                <form action="/postcard" method="POST">
                  {{ csrf_field() }}
                  <input id="playlist_uri" type="text" class="uri-input" name="playlist_uri" /><br />
                  <input type="submit" value="SUBMIT" class="uri-submit" />
                </form>
              </div>
            </div>
            <!--div class="next-btn">CONTINUE</div-->
          </div>
        </div>

        <div class="section section3">
          <div class="center-wrap">
            <div class="section-header">
              <p class="section-number">2.</p>
              <h2 class="section-title">Select Your Region</h2>
            </div>
            <div class="center-content center-select-region">
              <form class="country-select-form">
                <select class="crs-country" data-region-id="ABC"></select><br />
                <select id="ABC" data-blank-option="Select region"></select>
              </form>
            </div>
            <div class="next-btn">CONTINUE</div>
          </div>
        </div>

        <div class="section section4">
          <div class="center-wrap">
            <div class="section-header">
 <p class="section-number">3.</p>
              <h2 class="section-title">Create Your Postcard</h2>
            </div>
            <div class="center-content">
              <div class="postcard-wrap">
                <div class="postcard-left"></div>
                <div class="postcard-right"></div>
              </div>
            </div>
	    <div id="tracklist"></div>
            <div class="next-btn">CONTINUE</div>
          </div>
        </div>

        <div class="section section5">
          <div class="center-wrap">
            <div class="section-header">
              <p class="section-number">4.</p>
              <h2 class="section-title">Choose An Image</h2>
	      <div id="results"></div>
            </div>
          </div>
        </div>

        <div class="section section6">
          <div class="center-wrap">
          <div class="section-header">
            <h2 class="section-title">You've Got Mail</h2>
          </div>
          </div>
        </div>

        <div class="section section7">
          <div class="center-wrap">
            <div class="section-header">
              <h2 class="section-title">Your Mixtape</h2>
           </div>
          </div>
        </div>

        <div class="section section8"></div>
@endsection
