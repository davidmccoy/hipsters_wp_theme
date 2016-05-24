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
	 
})(jQuery);