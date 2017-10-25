$(document).ready(function() {
  setTimeout(function(){
    $('.section1').addClass('loaded');
    $('.section3').addClass('loaded');
    $('.share-section').addClass('loaded');
  }, 150);
  $('.section-wrap').flickity({
    cellAlign: 'left',
    pageDots: false,
    prevNextButtons: false,
    draggable: false,
    imagesLoaded: true
  });
  $('.flickity-enabled').resize();
  $('.next-btn').click(function() {
    $('.section-wrap').flickity('next');
  });
  $('.next-btn-submit-playlist').click(function() {
   if (!$('#playlist_uri').val()) return false;
   $('.section-wrap').flickity('next');
  });
  $('.next-btn1').click(function() {
    if (!$('#ABC').val()) return false;
    //var slick = function() { console.log('xyz'); console.log($('#results').html()); $('#results').slick(); };
    //$.when(slick()).done(function() {
    //  console.log('slicked');
      $('.section-wrap').flickity('next');
    //});
  });
  $('.flip-icon').click(function() {
    $('.flip-container').toggleClass('hover');
  });
  $('#send').click(function(e) {
    $(this).addClass('hide-send');
    $('.slick-list').addClass('send-up');
    $('.slick-arrow').addClass('hide-arrows');
    $('.image-choose-header').addClass('hide-header');
    setTimeout(function(){
      $('.section-wrap').flickity('next');
    }, 680);
    setTimeout(function(){
      $(".section6").addClass("showcard");
    }, 4000);
  });
  $('.where').click(function() {
    $('.video-popup').addClass('active');
    $('.video-popup').find('video').get(0).play();
  });
  $('.video-popup').click(function() {
    $(this).removeClass('active');
  });
  $('.popup').click(function(event) {
    var width  = 575,
        height = 400,
        left   = ($(window).width()  - width)  / 2,
        top    = ($(window).height() - height) / 2,
        url    = this.href,
        opts   = 'status=1' +
                 ',width='  + width  +
                 ',height=' + height +
                 ',top='    + top    +
                 ',left='   + left;

    window.open(url, 'twitter', opts);

    return false;
  });
});

function copyTextToClipboard(text) {
  var textArea = document.createElement("textarea");

  textArea.value = text;

  document.body.appendChild(textArea);

  textArea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Copying text command was ' + msg);
    window.alert("Link Copied!");
  } catch (err) {
    console.log('Oops, unable to copy');
  }

  document.body.removeChild(textArea);
}

function CopyLink() {
  copyTextToClipboard(location.href);
}

document.getElementById('fbShareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: 'http://mixtape.courtneybarnettandkurtvile.com/',
  }, function(response){});
}
