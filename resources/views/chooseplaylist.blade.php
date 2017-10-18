@extends('layout')

@section('content')
        <div class="section section2">
          <div class="center-wrap">
            <div class="center-inner">
            <div class="section-header">
              <p class="section-number">1.</p>
              <h2 class="section-title">Select a Playlist</h2>
            </div>
            <div class="center-content">
              @if (count($playlists->items) > 0)
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

	      @endif
              <div class="playlist-box">
                <p>Enter the URI of a custom playlist<span class="where">Where can I find this?</span></p>
                <form action="{{ URL::to('/postcard') }}" method="POST">
                  {{ csrf_field() }}
                  <input id="playlist_uri" type="text" class="uri-input" name="playlist_uri" /><br />
                  <input type="submit" value="SUBMIT" class="uri-submit next-btn-submit-playlist"/>
                </form>
              </div>
            </div>
            </div>
            <!--div class="next-btn">CONTINUE</div-->
          </div>
          <div class="video-popup">
            <video width="600" height="430" controls loop>
              <source src="img/uri-find.mp4" type="video/mp4">
            </video>
          </div>
        </div>
@endsection
