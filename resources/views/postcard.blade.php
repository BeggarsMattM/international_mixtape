@extends('layout')

@section('content')

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
	    <div id="tracks"></div>
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
                <div class="postcard-left">
                <p class="playlist-title">
                  <a href="{{ $link }}" target="blank">Playlist Name</a>
                </p>
		<div id="tracklist">
            	    <ol>
            	    @foreach ($tracks as $track)
		    <a href="{{ $track->track->external_urls->spotify }}" target="blank">
            	      <li>{{ $track->track->name }} - {{ collect($track->track->artists)->pluck('name')->implode(', ') }}</li>
		    </a>
            	    @endforeach
            	    </ol>
            	    </div>
                </div>
                <div class="postcard-right">
                  <div id="stamp">YOUR STAMP HERE</div>
                  <textarea class="notes" placeholder="Message:"></textarea>
                </div>
              </div>
            </div>
            <div class="next-btn">CONTINUE</div>
          </div>
        </div>

        <div class="section section5">
          <div class="center-wrap">
            <div class="section-header">
              <p class="section-number">4.</p>
              <h2 class="section-title">Choose An Image</h2>
              <div class="center-content">
                <div id="results"></div>
              </div>
              <div class="next-btn">SEND YOUR CARD</div>
            </div>
          </div>
        </div>

        <div class="section section6">
          <div class="center-wrap">
          <div class="section-header">
            <h2 class="section-title">You've Got Mail</h2>
          </div>
          <div class="center-content">
            <div class="postcard-wrap">
              <div class="front">
                <div class="postcard-left">
                  <div id="tracklist"></div>
                </div>
                <div class="postcard-right"></div>
              </div>
              <div class="back">
                <!-- insert image here -->
              </div>
            </div>
          </div>
          <div class="next-btn">CONTINUE</div>
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
