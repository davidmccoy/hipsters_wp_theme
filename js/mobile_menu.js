/*
 * Mobile Menu
 * By David McCoy
 * What's a license?
 */

jQuery(document).ready(function($){
  // Navigation Slide In
  $('i.fa-bars').click(function(e) {
    e.preventDefault();
    e.stopPropagation();

    $('#navbar').addClass('slide-in');
    $('html').css("overflow", "hidden");
    $('#overlay').show();
    return false;
  });

  $('#overlay').click(function(e) {
    e.stopPropagation();
    if( $('.open').length > 0 ) {
      $('.open').removeClass('open');
    }
    $('#navbar').removeClass('slide-in');
    $('html').css("overflow", "visible");
    $('#overlay').hide();
  });
  $('i.fa-times').click(function(e) {
    e.stopPropagation();
    if( $('.open').length > 0 ) {
      $('.open').removeClass('open');
    }
    $('#navbar').removeClass('slide-in');
    $('html').css("overflow", "visible");
    $('#overlay').hide();
  });

  $('#navbar li').on('click mousedown mouseup touchstart touchmove', function (e) {
    e.stopPropagation();
    if ( $(window).width() < 768 ){
      if ( $(this).find('ul').hasClass('open') && !$(this).closest('ul').hasClass('open')) {
        $('.open').removeClass('open');

        if ($($(this).find('a')[0]).attr('href') !== undefined ) {
          window.location.href = $($(this).find('a')[0]).attr('href')
          return false;
        } else {
          return false;
        }
      }
      $('.open').not($(this).closest('ul')).removeClass('open');
      $(this).find('ul').addClass('open');
      if ($($(this).find('a')[0]).attr('href') !== undefined ) {
        window.location.href = $($(this).find('a')[0]).attr('href')
        return false;
      } else {
        return false;
      }
    }
  });
  if ( $(window).width() < 768 ){
    $(document).on('click', function() {
      if( $('.open').length > 0 ) {
        $('.open').removeClass('open');
        return false;
      }
    });
  }
});
