<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Courtney Barnett and Kurt Vile - Intercontinental Mixtape</title>
        <meta name="description" content="Share a mixtape with a stranger in a foriegn land in the spirit of the new album 'Lotta Sea Lice' by Courtney Barnett and Kurt Vile.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="fb:app_id"             content="2015209905380407" />
        <meta property="og:url"                content="http://mixtape.courtneybarnettandkurtvile.com" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="Intercontinental Mixtape" />
        <meta property="og:description"        content="Share a mixtape with a stranger in a foriegn land in the spirit of the new album 'Lotta Sea Lice' by Courtney Barnett and Kurt Vile." />
        <meta property="og:image"              content="http://mixtape.courtneybarnettandkurtvile.com/img/share-image.jpg" />

        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css" />
        <link rel="stylesheet" href="{{ asset("css/normalize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/main.css") }}">
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
        <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NF7XQLH');</script>
        <!-- End Google Tag Manager -->

        <script src="https://use.typekit.net/dga7jfu.js"></script>
        <script src="https://use.fontawesome.com/f254e2fc06.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
    </head>
    <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NF7XQLH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
          <a href="https://open.spotify.com/user/spotify/playlist/37i9dQZF1DWUheBGiz3rlx" target="blank">
            <div class="top-right-inner">
              <span><i class="fa fa-spotify" aria-hidden="true"></i> This is: Courtney Barnett</span>
              <span><i class="fa fa-spotify" aria-hidden="true"></i> This is: Courtney Barnett</span>
            </div>
          </a>
        </div>
        <div class="top-right corner top-right-lower">
          <a href="https://open.spotify.com/user/spotify/playlist/37i9dQZF1DX6jgu09eXX7G" target="blank">
            <div class="top-right-inner">
              <span><i class="fa fa-spotify" aria-hidden="true"></i> This is: Kurt Vile</span>
              <span><i class="fa fa-spotify" aria-hidden="true"></i> This is: Kurt Vile</span>
            </div>
          </a>
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
              <li><a href="http://matadorrecords.com/" target="blank"><img src="/img/matador-small.png" /></a></li>
              <li><a href="http://milk.milkrecords.com.au/" target="blank"><img src="/img/milk-small.png" /></a></li>
              <li><a href="http://marathonartists.com/" target="blank"><img src="/img/marathon-small.png" /></a></li>
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
	  $('.next-btn1').text("CONTINUE").addClass('next-btn-style');
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-870879-24"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-870879-24');
    </script>
    </body>
</html>
