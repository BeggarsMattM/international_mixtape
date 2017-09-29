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
        <script src="https://use.typekit.net/dga7jfu.js"></script>
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
          <div class="player"></div>
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
  	  var region = $("#ABC option:selected").val();
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
	</script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
