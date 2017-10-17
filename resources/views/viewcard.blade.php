@extends('layout')

@section('content')

        <div class="section">
          <div class="center-wrap">
            <div class="flip-container" style="transform: translate(0,0);">
              <div class="flipper-wrap flipper" ontouchstart="this.classList.toggle('hover');">
                <div class="front" id="mail" style='background-size:cover; background-image:{!! $postcard->image !!}'>
                  <img src="/img/postcard-overlay.png" />
                </div>
                <div class="back">
                  <div class="response-left">
                    <a href="{{ $postcard->playlist_link }}">{{ $postcard->playlist_name }}</a>
                    <div id="tracklist">
                {!! $postcard->tracklist !!}
        </div>
                  </div>
                  <div class="response-right">
                    <div id="stamp"><img src="../img/ck-stamp.jpg"></div>
        <p>{{ $postcard->message }}</p>
        <p>Postcard received from {{ $postcard->region }} in {{ $postcard->country }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="next-btn"><a href="#">CREATE YOUR OWN CARD</a></div>
          </div>
        </div>


@endsection
