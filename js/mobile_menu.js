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
    $('#navbar').removeClass('slide-in');
    $('html').css("overflow", "visible");
    $('#overlay').hide();
  });
  $('i.fa-times').click(function(e) {
    e.stopPropagation();
    $('#navbar').removeClass('slide-in');
    $('html').css("overflow", "visible");
    $('#overlay').hide();
  });

  $('#navbar li').on('click mousedown mouseup touchstart touchmove', function () {
    if ( $(this).find('ul').hasClass('open') && !$(this).closest('ul').hasClass('open')) {
        $('.open').removeClass('open');
        return false;
    }
    $('.open').not($(this).closest('ul')).removeClass('open');
    $(this).find('ul').addClass('open');
    return false;
  });
  $(document).on('click', function() {
    if( $('.open').length > 0 ) {
        $('.open').removeClass('open');
        return false;
    }
  });
});
