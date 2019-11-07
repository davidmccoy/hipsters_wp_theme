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
<link rel="Shortcut Icon" href="https://www.hipstersofthecoast.com/favicon.ico" type="image/x-icon" />

<!-- style -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/base.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e("RSS Feed", 'organicthemes'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e("Atom Feed", 'organicthemes'); ?>" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>

</head>

<body <?php if(function_exists('body_class')) body_class(); ?>>

<div id="header">
	<i class="fa fa-bars fa-lg" aria-hidden="true"></i>
  <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
  <a href="<?php bloginfo('url'); ?>/" title="Home" id="logo">
  	<img src="/assets/hipsters-of-the-coast-logo.svg" id="full-logo" onerror="this.onerror=null; this.src='/assets/hipsters-of-the-coast-logo.png'" />
  </a>
</div>
<div id="wrap">
		<div id="spacer">
			<img src="/assets/hipsters-of-the-coast-logo.svg" id="full-logo" onerror="this.onerror=null; this.src='/assets/hipsters-of-the-coast-logo.png'"/>
    </div>
    <div id="navbar">
      <div class="mobile-menu-header">
        <div class="mobile-menu-logo">
          <a href="/">
            <img src="/assets/hipsters-of-the-coast-logo-stacked.svg" id="mobile-logo-small" onerror="this.onerror=null; this.src='/assets/hipsters-of-the-coast-logo-stacked.png'" />
          </a>
        </div>
        <div class="mobile-menu-close">
          <i class="fa fa-times fa-lg" aria-hidden="true"></i>
        </div>
      </div>
			<?php if ( function_exists('wp_nav_menu') ) {
				// Check for 3.0+ menus
				wp_nav_menu( array( 'title_li' => '', 'depth' => 4, 'container_class' => 'menu' ) );
				// get_search_form();
			}
			else {?>
				<ul class="menu"><?php wp_list_pages('title_li=&depth=4'); ?></ul>
			<?php } ?>
    </div>

    <div style="clear:both;"></div>
