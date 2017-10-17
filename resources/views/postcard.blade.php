@extends('layout')

@section('content')

        <div class="section section3">
          <div class="center-wrap">
            <div class="center-inner">
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
  	          <div id="tracks"></div>
              <div class="next-btn1">CHOOSE A REGION</div>
            </div>
          </div>
          <div class="bottom-terms">
            <a href="#">Terms & Conditions</a>
          </div>
        </div>

        <div class="section section4">
          <div class="center-wrap">
            <div class="center-inner">
              <div class="section-header">
              <p class="section-number">3.</p>
              <h2 class="section-title">Create Your Postcard</h2>
            </div>
            <div class="center-content">
              <div class="postcard-wrap">
                <div class="postcard-left">
                <p class="playlist-title">
                  <a href="{{ $link }}" target="blank" id="name" email="{{ $email }}">{{ $playlist->name }}</a>
                </p>
		<div id="tracklist">
            	    <ol>
            	    @foreach ($playlist->tracks->items as $track)
		    <a href="{{ $track->track->external_urls->spotify }}" target="blank">
            	      <li>{{ $track->track->name }} - {{ collect($track->track->artists)->pluck('name')->implode(', ') }}</li>
		    </a>
            	    @endforeach
            	    </ol>
            	    </div>
                </div>
                <div class="postcard-right">
                  <div id="stamp">
                    <img src="img/ck-stamp.jpg" />
                  </div>
                  <textarea class="notes">Message:</textarea>
                </div>
              </div>
            </div>
            <div class="next-btn">CONTINUE</div>
          </div>
          </div>
          <div class="bottom-terms">
            <a href="#">Terms & Conditions</a>
          </div>
        </div>

        <div class="section section5">
          <div class="center-wrap">
            <div class="center-inner">
              <div class="section-header image-choose-header">
                <p class="section-number">4.</p>
                <h2 class="section-title">Choose An Image</h2>
              </div>
                <div class="center-content">
                  <div id="results"></div>
                </div>
                <div id="send">SEND YOUR CARD <i class="fa fa-paper-plane" aria-hidden="true"></i></div>
            </div>
          </div>
          <div class="bottom-terms">
            <a href="#">Terms & Conditions</a>
          </div>
        </div>

        <div class="section section6">

          <div class="loading-animation">
            <img src="img/earthani-large3.gif" />
            <p class="ani-text">Searching for a Card...</p>
          </div>

          <div class="center-wrap">
          <div class="center-content">
            <div class="center-inner">
              <div class="section-header">
                <h2 class="section-title">You've Got Mail</h2>
              </div>
            <div class="flip-container">
              <div class="flipper-wrap flipper" ontouchstart="this.classList.toggle('hover');">
                <div class="front" id="mail" style="background-size:cover;">
                  <img src="img/postcard-overlay.png" />
                </div>
                <div class="back">
                  <div class="response-left">
                    <div id="tracklist"></div>
                  </div>
                  <div class="response-right">
                    <div id="stamp">
                      <img src="img/ck-stamp.jpg" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="end-btns-wrap">
            <!--
            <div class="flip-icon">FLIP <i class="fa fa-refresh" aria-hidden="true"></i></div><br />
            -->
            <div class="next-btn end-share"><a id="sharethis">Share this Card <i class="fa fa-external-link" aria-hidden="true"></i></a></div>
            <div class="next-btn end-share"><a id="shareyours">Share your Card <i class="fa fa-external-link" aria-hidden="true"></i></a></div><br />
            <div class="next-btn end-share">Start Over</div>
          </div>
        </div> <!-- end center inner -->
          </div>
          <div class="bottom-terms">
            <a href="#">Terms & Conditions</a>
          </div>
        </div>

@endsection
