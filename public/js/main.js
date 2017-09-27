$(document).ready(function() {
  $('.section-wrap').flickity({
    cellAlign: 'left',
    contain: true,
    pageDots: false,
    prevNextButtons: false
  });
  $('.next-btn').click(function() {
    $('.section-wrap').flickity('next');
  });
});
