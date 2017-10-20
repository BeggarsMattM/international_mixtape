<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Courtney Barnett and Kurt Vile - Intercontinental Mixtape</title>
        <meta name="description" content="Send and receive a digital a digital postcard and mixtape with people around the world in the spirit of the new collaborative album by Courtney Barnett and Kurt Vile.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:url"                content="http://mixtape.courtneybarnettandkurtvile.com" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="Intercontinental Mixtape" />
        <meta property="og:description"        content="Send and receive a digital a digital postcard and mixtape with people around the world in the spirit of the new album by Courtney Barnett and Kurt Vile." />
        <meta property="og:image"              content="http://beggarsdev.com/international_mixtape/public/img/fb-share-image.jpg" />

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
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId            : '2015209905380407',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v2.10'
          });
          FB.AppEvents.logPageView();
        };

        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = "https://connect.facebook.net/en_US/sdk.js";
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>

      <div class="fixed">
        <div class="top-left corner">
          <a href="https://www.spotify.com/" target="blank"><img src="{{ asset("img/spotify-blk.png") }}" alt="Spotify"/></a>
        </div>
        <div class="top-middle">
          <a href="http://courtneybarnettandkurtvile.com/"><img src="{{ asset("img/cb_kv_logo.png") }}" /></a>
        </div>
        <div class="top-right corner">
          <a href="https://open.spotify.com/album/3gvo4nvimDdqA9c3y7Bptc" target="blank">Stream Courtney and Kurt</a>
        </div>
      </div>

        <div class="section-wrap">
      	  @yield('content')
        </div>

      <footer>
        <div class="bottom-left corner">
        <!--
          <div class="player">
            <iframe src="https://open.spotify.com/embed?uri=spotify:album:2p307RlVPc4fFl34IljlDh&theme=white" width="300" height="80" frameborder="0" allowtransparency="true"></iframe>
          </div>
        -->
          <div class="label-logos">
            <ul>
              <li><a href="http://matadorrecords.com/" target="blank"><img src="/international_mixtape/public/img/matador-small.png" /></a></li>
              <li><a href="http://milk.milkrecords.com.au/" target="blank"><img src="/international_mixtape/public/img/milk-small.png" /></a></li>
              <li><a href="http://marathonartists.com/" target="blank"><img src="/international_mixtape/public/img/marathon-small.png" /></a></li>
            </ul>
          </div>
        </div>
        <div class="bottom-right corner">
          <a href="http://beggars.com/group/privacy-policy" target="blank">Terms & Conditions</a>
        </div>
      </footer>


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
    	    url: "{{ URL::to('/search') }}",
    	    data: { country: encodeURIComponent(country), region: encodeURIComponent(region), _token: '{{ csrf_token() }}' },
    	    dataType: "json"
	  }).done(function (data) {
	    console.log(data);
            if ($('#results').hasClass('slick-initialized')) { $('#results').slick('unslick').empty(); }
    	    for (i = 0; i < data.value.length; i++) {
     	      $('#results').append('<div class="photo-slide-wrap"><div class="photo-slide" style="background:url(' + data.value[i].contentUrl + ') no-repeat center center; background-size:cover;" thumb="' + data.value[i].thumbnailUrl + '"><img src="{{ asset('/img/postcard-overlay.png') }}"></div></div>');
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
	    url: '{{ asset('/send') }}',
            data: {
		country: $('.crs-country option:selected').val(),
		region: $('#ABC option:selected').val(),
		playlist_link: $('#name').attr('href'),
		image: $('.slick-active .photo-slide').css('background-image'),
                thumb: $('.slick-active .photo-slide').attr('thumb'),
		email: $('#name').attr('email'),
                from: $('#from').val(),
		message: $('.notes').val(),
	        playlist_name: $("#name").text(),
	        tracklist: $("#tracklist").html(),
		_token: '{{ csrf_token() }}'
	    },
	    dataType: 'json'
	  }).done(function (data) {
	    console.log('ya123'); console.log(data);
      $('.loading-animation').addClass('active');
            $('#sharethis').attr('href', '{{ URL::to('/postcard') }}/' + data.id);
	    $('#shareyours').attr('href', '{{ URL::to('/postcard') }}/' + data.yourid);
            $('#mail').css('background-image', data.image);
	    $('.response-left').append('<p class="playlist-title"><a href="' + data.playlist_link + '">' + data.playlist_name + '</a></p>')
		.append('<p>' + data.tracklist + '</p>');
            $('.card-fill')
                .append('<p>' + (data.from || ' ')+ '</p>')
                .append('<p>' + (data.message || ' ')+ '</p>');
            $('.response-right')
		.append('<p>' + data.region + ', ' + data.country + '</p>');
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
