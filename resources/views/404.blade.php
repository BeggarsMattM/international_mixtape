@extends('layout')

@section('content')

<div class="section 404-section section1">
  <div class="center-wrap">
    <p>Oops something went wrong</p>
    <div class="next-btn"><a href="{{ URL::to('/') }}">Click here to try again</a></div>
  </div>
</div>


@endsection
