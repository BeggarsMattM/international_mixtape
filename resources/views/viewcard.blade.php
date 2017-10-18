@extends('layout')

@section('content')

        <div class="section share-section">
          <div class="center-wrap">
            <div class="center-inner">
              <div class="flip-container" style="transform: translate(0,0);">
                <div class="flipper-wrap flipper" ontouchstart="this.classList.toggle('hover');">
                  <div class="front" id="mail" style='background-size:cover; background-image:{!! $postcard->image !!}'>
                    <img src="/international_mixtape/public/img/postcard-overlay.png" />
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
              <div class="share-btns">
                  <ul class="share-icon-list">
                    <li>SHARE: </li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              <div class="next-btn"><a href="#">CREATE YOUR OWN CARD</a></div>
            </div>
          </div>
        </div>


@endsection
