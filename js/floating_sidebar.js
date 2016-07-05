/*
 * Floating Sidebar
 * By David McCoy
 * What's a license?
 */

(function($) {
	 $(window).scroll(function(){
	    if ($('#sidebar_right').height() < $('#content.left').height())
	    {
	    if ($(this).scrollTop() > 190)
	        $('#sidebar_right').css({"margin-top": ($(this).scrollTop()) - 190 });
	    else
	        $('#sidebar_right').css('margin-top', '0px');
	    }
	 });

	$(window).scroll(function(){
	    if ($('#sidebar_right').height() < $('.homepagemid').height())
	    {
	    if ($(this).scrollTop() > 665)
	        $('#sidebar_right').css({"margin-top": ($(this).scrollTop()) - 665 });
	    else
	        $('#sidebar_right').css('margin-top', '0px');
	    }
	 });

	$(document).ready(function() {
		if ( $('div.share-bar').size() > 0 ) {
			// Detect IE version
	    var iev=0;
	    var ieold = (/MSIE (\d+\.\d+);/.test(navigator.userAgent));
	    var trident = !!navigator.userAgent.match(/Trident\/7.0/);
	    var rv=navigator.userAgent.indexOf("rv:11.0");

	    if (ieold) iev=new Number(RegExp.$1);
	    if (navigator.appVersion.indexOf("MSIE 10") != -1) iev=10;
	    if (trident&&rv!=-1) iev=11;

	    // Firefox or IE 11
	    if(typeof InstallTrigger !== 'undefined' || iev == 11) {
        var lastScrollTop = 0;
        $(window).on('scroll', function() {
          st = $(this).scrollTop();
          if(st < lastScrollTop) {
          	$('div.share-bar').removeClass('is-visible');
          }
          else if(st > lastScrollTop) {
          	$('div.share-bar').addClass('is-visible');
          }
          lastScrollTop = st;
        });
	    }
	    // Other browsers
	    else {
        $('body').on('mousewheel', function(e){
          if(e.originalEvent.wheelDelta > 0) {
          	$('div.share-bar').removeClass('is-visible');
          }
          else if(e.originalEvent.wheelDelta < 0) {
          	$('div.share-bar').addClass('is-visible');
          }
        });
	    }
		}
	})
	 
})(jQuery);