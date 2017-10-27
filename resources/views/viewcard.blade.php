@extends('layout')

@section('content')

        <div class="section share-section">
          <div class="center-wrap">
            <div class="center-inner">
              <div class="flip-container" style="transform: translate(0,0);">
                <div class="flipper-wrap flipper" ontouchstart="this.classList.toggle('hover');">
                  <div class="front" id="mail" style='background-size:cover; background-image:{!! $postcard->image !!}'>
                    <img src="/img/postcard-overlay.png" />
                  </div>
                  <div class="back">
                    <div class="response-left">
                      <p class="playlist-title"><a href="{{ $postcard->playlist_link }}">{{ $postcard->playlist_name }}</a></p>
                      <div id="tracklist">
                  {!! $postcard->tracklist !!}
          </div>
                    </div>
                    <div class="response-right">
                      <p>{{ $postcard->region }}, {{ $postcard->country }}</p>
                      <div id="stamp"><img src="../img/ck-stamp.jpg"></div>
                      <div class="card-fill">
                        <p>{{ $postcard->from }}</p>
                        <p>{{ $postcard->message }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="share-btns">
                  <ul class="share-icon-list">
                    <li>SHARE: </li>
                    <li><a id="fbShareBtn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a class="twitter popup" href="http://twitter.com/share"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a onclick="CopyLink()"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              <div class="next-btn"><a href="http://mixtape.courtneybarnettandkurtvile.com">CREATE A NEW CARD</a></div>
            </div>
          </div>
        </div>


@endsection
