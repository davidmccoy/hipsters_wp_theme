<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="en" />
<meta name="verify-v1" content="7XvBEj6Tw9dyXjHST/9sgRGxGymxFdHIZsM6Ob/xo5E=" />
<meta name="viewport" content="width=device-width, maximum-scale=1.0" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<link rel="Shortcut Icon" href="http://www.hipstersofthecoast.com/favicon.ico" type="image/x-icon" />

<!-- style -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/base.css" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e("RSS Feed", 'organicthemes'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e("Atom Feed", 'organicthemes'); ?>" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>

<?php get_template_part( 'style', 'options' ); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish/hoverIntent.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.anythingslider.js"></script>
<!-- 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.anythingslider.video.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/swfobject.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.masonry.min.js"></script> 

<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
-->

<script type="text/javascript"> 
	var $j = jQuery.noConflict();
	$j(document).ready(function() { 
		$j('.menu').superfish(); 
	});
</script>

<script type="text/javascript">
	var $j = jQuery.noConflict();
	$j(function(){
		$j('#slider1').anythingSlider({
			width           : 620,
			height          : 440,
			delay           : <?php echo of_get_option('slider_transition_interval'); ?>,
			resumeDelay     : 10000,
			startStopped    : false,
			autoPlay        : true,
			autoPlayLocked  : false,
			easing          : "swing"
		});
	});
</script>

<script type="text/javascript"> 
	var $j = jQuery.noConflict();
	$j(document).ready(function () {
		$j('#homeslider iframe').each(function() {
			var url = $j(this).attr("src")
			$j(this).attr("src",url+"&amp;wmode=Opaque")
		});
	});
</script>

<script type="text/javascript"> 
	var $j = jQuery.noConflict();
	$j(function(){
	  $j('#portfolio .postarea').masonry({
	    // options
	    itemSelector : '.portfolio',
	    columnWidth : 320
	  });
	});
</script>


</head>

<body <?php if(function_exists('body_class')) body_class(); ?>>

<div id="header">
	<i class="fa fa-bars fa-lg" aria-hidden="true"></i>
  <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
  <a href="<?php bloginfo('url'); ?>/" title="Home" id="logo">
  	<img src="/assets/hipsters_logo.jpeg" id="full-logo"/>
  </a>

</div>
<div id="wrap">
		<div id="spacer">
			<img src="/assets/hipsters_logo.jpeg" id="full-logo"/>
    </div>
    <div id="navbar">
    	<i class="fa fa-times fa-lg" aria-hidden="true"></i>
			<?php if ( function_exists('wp_nav_menu') ) { 
				// Check for 3.0+ menus
				wp_nav_menu( array( 'title_li' => '', 'depth' => 4, 'container_class' => 'menu' ) ); 
			}
			else {?>
				<ul class="menu"><?php wp_list_pages('title_li=&depth=4'); ?></ul>
			<?php } ?>
    </div>
    
    <div style="clear:both;"></div>