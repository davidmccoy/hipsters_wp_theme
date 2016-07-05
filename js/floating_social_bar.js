/*
 * Floating Social Bar
 * By David McCoy
 * What's a license?
 */

(function($) {

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

	    // for mobile touchscreens
	    var ts;
	    $(document).bind('touchstart', function(e) {
	        ts = e.originalEvent.touches[0].clientY;
	    });

	    $(document).bind('touchmove', function(e) {
	        var te = e.originalEvent.changedTouches[0].clientY;
	        if (ts > te) {
	            $('div.share-bar').removeClass('is-visible');
	        } else {
	            $('div.share-bar').addClass('is-visible');
	        }
	    });
		}
	})
	 
})(jQuery);