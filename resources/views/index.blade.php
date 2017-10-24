@extends('layout')

@section('content')
        <div class="section section1">
          <div class="center-wrap">
            <div class="center-inner">
              <p class="home-logo"><img src="img/cbkv-logo2.png" /></p>
              <h2 class="title-text">Intercontinental Mixtape</h2>
              <p class="description">Share a mixtape with a stranger in a foreign land in the spirit of the new album ‘Lotta Sea Lice’ by Courtney Barnett and Kurt Vile</p>
              <div class="next-btn"><a href="{{ URL::to('/connect') }}"><i class="fa fa-spotify" aria-hidden="true"></i> GET STARTED</a></div>
            </div> <!-- end center inner -->
          </div> <!-- end center wrap -->
        </div>
@endsection
