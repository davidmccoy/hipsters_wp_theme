<style type="text/css" media="screen">
<?php  
	$link_color = of_get_option('link_color'); 
	$heading_link_color = of_get_option('heading_link_color');
	$link_hover_color = of_get_option('link_hover_color');
	$heading_link_hover_color = of_get_option('heading_link_hover_color');
	$link_background_color = of_get_option('link_background_color');
?>

#container a, #container a:link, #container a:visited, #footerwidgets a, #footerwidgets a:link, #footerwidgets a:visited {
<?php 
	if ($link_color) {
	    echo 'color: ' .$link_color. ';';
    }; 
?>
}

#container a:hover, #container a:focus, #container a:active, #footerwidgets a:hover, #footerwidgets a:focus, #footerwidgets a:active {
<?php 
	if ($link_hover_color) {
	    echo 'color: ' .$link_hover_color. ';';
    }; 
?>
}

#container h1 a, #container h2 a, #container h3 a, #container h4 a, #container h5 a, #container h6 a,
#container h1 a:link, #container h2 a:link, #container h3 a:link, #container h4 a:link, #container h5 a:link, #container h6 a:link,
#container h1 a:visited, #container h2 a:visited, #container h3 a:visited, #container h4 a:visited, #container h5 a:visited, #container h6 a:visited {
<?php 
	if ($heading_link_color) {
	    echo 'color: ' .$heading_link_color. ';';
    }; 
?>
}

#container h1 a:hover, #container h2 a:hover, #container h3 a:hover, #container h4 a:hover, #container h5 a:hover, #container h6 a:hover,
#container h1 a:focus, #container h2 a:focus, #container h3 a:focus, #container h4 a:focus, #container h5 a:focus, #container h6 a:focus,
#container h1 a:active, #container h2 a:active, #container h3 a:active, #container h4 a:active, #container h5 a:active, #container h6 a:active {
<?php 
	if ($heading_link_hover_color) {
	    echo 'color: ' .$heading_link_hover_color. ';';
    }; 
?>
}

#container a:hover, #container a:focus, #container a:active, #sidebar ul.menu li a:hover, #sidebar_left ul.menu li ul.sub-menu li a:hover, #sidebar_right ul.menu li ul.sub-menu li a:hover, #commentform #submit:hover, #submit:hover, #searchsubmit:hover, .reply a:hover, #prevLink p a:hover, #prevLink p a:focus, #prevLink p a:active, #nextLink p a:hover, #nextLink p a:focus, #nextLink p a:active, #container .portfolioimg a img:hover, #footerwidgets a:hover, #footerwidgets a:focus, #footerwidgets a:active {
<?php 
	if ($link_background_color) {
	    echo 'background-color: ' .$link_background_color. ' !important;';
    }; 
?>
}
</style>