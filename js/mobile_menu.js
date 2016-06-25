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
}); 