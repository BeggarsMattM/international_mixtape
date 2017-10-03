<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Courtney Barnett and Kurt Vile - Intercontinental Mixtape</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css" />
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
        <script src="https://use.typekit.net/dga7jfu.js"></script>
        <script src="https://use.fontawesome.com/f254e2fc06.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
    </head>
    <body>

      <div class="fixed">
        <div class="top-left corner">
          <img src="img/spotify-blk.png" alt="Spotify"/>
        </div>
        <div class="top-right corner">
          <a href="#">Stream Courtney and Kurt</a>
        </div>
        <div class="bottom-left corner">
          <div class="player">
            <audio id="continental-breakfast" loop>
              <source src="https://s3-eu-west-1.amazonaws.com/cdn.beggars.com/matador/courtney-and-kurt/05+Continental+Breakfast.mp3" type="audio/mpeg"/>
            </audio>
            <div class="audio-controls">
              <img class="audio-play" src="img/play-icon.png" />
              <img class="audio-pause" src="img/pause-icon.png" />
            </div>
            <div class="audio-details">
              <p>Continental Breakfast</p>
              <p>Lotta Sea Lice</p>
            </div>
          </div>
        </div>
        <div class="bottom-right corner">
          <a href="#">Terms & Conditions</a>
        </div>
      </div>

        <div class="section section-wrap">
      	  @yield('content')
        </div>


        <!--script src="js/vendor/modernizr-{MODERNIZR_VERSION}.min.js"></script-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="js/jquery.crs.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
	<script>
        $('.public_playlist').on('click', function () {
          $('#playlist_uri').val($(this).attr('id'));
	  get_tracklist($(this).attr('id'));
        });
	$("#ABC").change(function () {
	  var country = $('.crs-country option:selected').val();
  	  var region = $("#ABC option:selected").val();
	  $('.postcard-right').append('<p class="location-card">' + region + ", " + country + '</p>');
  	  $.post({
    	    url: "/search",
    	    data: { region: encodeURIComponent(region), _token: '{{ csrf_token() }}' },
    	    dataType: "json"
  	  }).done(function (data) {
    	    $('#results').empty();
    	    for (i = 0; i < data.value.length; i++) {
     	      $('#results').append('<div class="photo-slide-wrap"><div class="photo-slide" style="background:url(' + data.value[i].contentUrl + ') no-repeat center center; background-size:cover;"><img src="img/postcard-overlay.png"></div></div>');
    	    }
          $('#results').slick();
  	  });

	});
        $('#playlist_uri').on('change', function () {
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
		email: $('#name').attr('email'),
		message: $('.notes').val(),
	        playlist_name: $("#name").text(),
	        tracklist: $("#tracklist").html(),
		_token: '{{ csrf_token() }}'
	    },
	    dataType: 'json'
	  }).done(function (data) {
            $('#mail').css('background-image', data.image);
	    $('.response-left').append('<a href="' + data.playlist_link + '">' + data.playlist_name + '</a>')
		.append('<p>' + data.tracklist + '</p>');
            $('.response-right').append('<p>' + (data.message || 'This postcard intentionally left blank')+ '</p>')
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
