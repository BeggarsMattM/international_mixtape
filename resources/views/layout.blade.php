<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Courtney Barnett and Kurt Vile - Intercontinental Mixtape</title>
        <meta name="description" content="Send and receive a digital a digital postcard and mixtape with people around the world in the spirit of the new collaborative album by Courtney Barnett and Kurt Vile.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css" />
        <link rel="stylesheet" href="{{ asset("css/normalize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/main.css") }}">
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
        <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
        <script src="https://use.typekit.net/dga7jfu.js"></script>
        <script src="https://use.fontawesome.com/f254e2fc06.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
    </head>
    <body>

      <div class="fixed">
        <div class="top-left corner">
          <img src="{{ asset("img/spotify-blk.png") }}" alt="Spotify"/>
        </div>
        <div class="top-right corner">
          <a href="#">Stream Courtney and Kurt</a>
        </div>
        <div class="bottom-left corner">
          <div class="player">
            <iframe src="https://open.spotify.com/embed?uri=spotify:album:2p307RlVPc4fFl34IljlDh&theme=white" width="300" height="80" frameborder="0" allowtransparency="true"></iframe>
          </div>
        </div>
        <div class="bottom-right corner">
          <a href="#">Terms & Conditions</a>
        </div>
      </div>

        <div class="section-wrap">
      	  @yield('content')
        </div>


        <!--script src="js/vendor/modernizr-{MODERNIZR_VERSION}.min.js"></script-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="{{ asset("js/jquery.crs.min.js") }}"></script>
        <script src="{{ asset("js/slick.min.js") }}"></script>
        <script src="{{ asset("js/plugins.js") }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
	<script>
        $('.public_playlist').on('click', function () {
          $('#playlist_uri').val($(this).attr('id'));
	  //get_tracklist($(this).attr('id'));
        });
	$("#ABC").change(function () {
	  var country = $('.crs-country option:selected').val();
  	  var region = $("#ABC option:selected").val();
	  $('.next-btn1').text("CONTINUE");
          $('#results').html('');
          $('.location-card').remove();
	  $('.postcard-right').append('<p class="location-card">' + region + ", " + country + '</p>');
  	  $.post({
    	    url: "/search",
    	    data: { country: encodeURIComponent(country), region: encodeURIComponent(region), _token: '{{ csrf_token() }}' },
    	    dataType: "json"
	  }).done(function (data) {
	    console.log(data);
            if ($('#results').hasClass('slick-initialized')) { $('#results').slick('unslick').empty(); }
    	    for (i = 0; i < data.value.length; i++) {
     	      $('#results').append('<div class="photo-slide-wrap"><div class="photo-slide" style="background:url(' + data.value[i].contentUrl + ') no-repeat center center; background-size:cover;" thumb="' + data.value[i].thumbnailUrl + '"><img src="/img/postcard-overlay.png"></div></div>');
    	    }
  	  }).done(function (data) {
	    $('#results').slick();
	  });

	});
        $('#playlist_uri').on('change', function () {
          $('.next-btn-submit-playlist').show();
	  get_tracklist($(this).val());
	});
        function get_tracklist(id) {
	  $.post({
	   url: '/tracklist',
	   data: { id: id, _token: '{{ csrf_token() }}' },
           dataType: 'json'
	  }).done(function (data) {
	    $('#tracklist').empty();
	    $('#tracklist').append(data);
	  });
	}
	$('#send').on('click', function () {
	  $.post({
	    url: '/send',
            data: {
		country: $('.crs-country option:selected').val(),
		region: $('#ABC option:selected').val(),
		playlist_link: $('#name').attr('href'),
		image: $('.slick-active .photo-slide').css('background-image'),
                thumb: $('.slick-active .photo-slide').attr('thumb'),
		email: $('#name').attr('email'),
		message: $('.notes').val(),
	        playlist_name: $("#name").text(),
	        tracklist: $("#tracklist").html(),
		_token: '{{ csrf_token() }}'
	    },
	    dataType: 'json'
	  }).done(function (data) {
	    console.log('ya123'); console.log(data);
            $('#sharethis').attr('href', 'http://46.101.76.84/postcard/' + data.id);
	    $('#shareyours').attr('href', 'http://46.101.76.84/postcard/' + data.yourid);
            $('#mail').css('background-image', data.image);
	    $('.response-left').append('<a href="' + data.playlist_link + '">' + data.playlist_name + '</a>')
		.append('<p>' + data.tracklist + '</p>');
            $('.response-right').append('<p>' + (data.message || '')+ '</p>')
		.append('<p>Postcard received from ' + data.region + ' in ' + data.country + '</p>');
	  });
	});
	</script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
