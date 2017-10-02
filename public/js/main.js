$(document).ready(function() {
  $('.section-wrap').flickity({
    cellAlign: 'left',
    contain: true,
    pageDots: false,
    prevNextButtons: false,
    draggable: false
  });
  $('.next-btn').click(function() {
    $('.section-wrap').flickity('next');
  });
  var song = document.getElementById("continental-breakfast");
  $('.audio-pause').click(function() {
    song.pause();
    $(this).hide();
    $('.audio-play').show();
  });
  $('.audio-play').click(function() {
    song.play();
    $(this).hide();
    $('.audio-pause').show();
  });
});
