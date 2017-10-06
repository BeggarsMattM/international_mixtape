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
  $('.next-btn1').click(function() {
    if (!$('#ABC').val()) return false;
    var slick = function() { $('#results').slick(); };
    $.when(slick()).done(function() { $('.section-wrap').flickity('next'); });
  });
  $('.flip-icon').click(function() {
    $('.flip-container').toggleClass('hover');
  });
  $('#send').click(function(e) {
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
});
