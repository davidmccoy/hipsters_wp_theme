<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {

	// Test data
	$test_array = array("one" => __("One", 'organicthemes'),"two" => __("Two", 'organicthemes'),"three" => __("Three", 'organicthemes'),"four" => __("Four", 'organicthemes'),"five" => __("Five", 'organicthemes'));

	// Multicheck Array
	$multicheck_array = array("one" => __("French Toast", 'organicthemes'), "two" => __("Pancake", 'organicthemes'), "three" => __("Omelette", 'organicthemes'), "four" => __("Crepe", 'organicthemes'), "five" => __("Waffle", 'organicthemes'));

	// Multicheck Defaults
	$multicheck_defaults = array("one" => "true","five" => "true");

	// Background Defaults
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	// Slider Transition Array
	$transition_array = array("1000" => __("1 Second", 'organicthemes'), "2000" => __("2 Seconds", 'organicthemes'), "4000" => __("4 Seconds", 'organicthemes'), "6000" => __("6 Seconds", 'organicthemes'), "8000" => __("8 Seconds", 'organicthemes'), "10000" => __("10 Seconds", 'organicthemes'), "12000" => __("12 Seconds", 'organicthemes'), "14000" => __("14 Seconds", 'organicthemes'), "16000" => __("16 Seconds", 'organicthemes'), "18000" => __("18 Seconds", 'organicthemes'), "20000" => __("20 Seconds", 'organicthemes'), "30000" => __("30 Seconds", 'organicthemes'), "60000" => __("1 Minute", 'organicthemes'), "999999999" => __("Hold Frame", 'organicthemes'));
	
	// Yes or No Array
	$yesno_array = array("true" => __("Yes", 'organicthemes'), "false" => __("No", 'organicthemes'));
	
	// Stylesheet Array
	$stylesheet_array = array("true" => __("White", 'organicthemes'), "false" => __("Black", 'organicthemes'));

	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Add all categories option
    $options_categories[0] = __("All Categories", 'organicthemes');

	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages['false'] = __("Select a page:", 'organicthemes');
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';

	$options = array();
	
	$options[] = array( "name" => __("Slideshow", 'organicthemes'),
						"type" => "heading");
						
	$options[] = array( "name" => __("Featured Slider Category", 'organicthemes'),
						"desc" => __("Choose the category you wish to display in the homepage slider.", 'organicthemes'),
						"id" => "category_slider",
						"std" => __("Select a category:", 'organicthemes'),
						"type" => "select",
						"options" => $options_categories);
						
	$options[] = array( "name" => __("Featured Slider Posts To Display", 'organicthemes'),
						"desc" => __("Enter the number of posts you would like to display in the featured slider.", 'organicthemes'),
						"id" => "postnumber_slider",
						"std" => "8",
						"type" => "text");
						
	$options[] = array( "name" => __("Featured Slider Transition Interval", 'organicthemes'),
						"desc" => __("Choose the transition time for the homepage slider. This is the time the frame is held before transitioning to the next slide.", 'organicthemes'),
						"id" => "slider_transition_interval",
						"std" => "10000",
						"type" => "select",
						"options" => $transition_array);

	$options[] = array( "name" => __("Homepage Settings", 'organicthemes'),
						"type" => "heading");
						
	$options[] = array( "name" => __("Featured Page Headline", 'organicthemes'),
						"desc" => __("Choose the page title you wish to display as the featured headline.", 'organicthemes'),
						"id" => "banner_text",
						"std" => __("Select a page:", 'organicthemes'),
						"type" => "select",
						"options" => $options_pages);
						
	$options[] = array( "name" => __("Home Blog Category", 'organicthemes'),
						"desc" => __("Choose the category you wish to display for the homepage blog posts.", 'organicthemes'),
						"id" => "category_home",
						"std" => __("Select a category:", 'organicthemes'),
						"type" => "select",
						"options" => $options_categories);
						
	$options[] = array( "name" => __("Home Blog Posts Displayed", 'organicthemes'),
						"desc" => __("Enter the number of posts you would like displayed in the homepage blog. Pagination occurs after entered number of posts.", 'organicthemes'),
						"id" => "postnumber_home",
						"std" => "3",
						"type" => "text");
						
	$options[] = array( "name" => __("Home Sidebar Category", 'organicthemes'),
						"desc" => __("Choose the category you wish to display for the featured homepage sidebar posts.", 'organicthemes'),
						"id" => "category_side",
						"std" => __("Select a category:", 'organicthemes'),
						"type" => "select",
						"options" => $options_categories);
						
	$options[] = array( "name" => __("Home Sidebar Posts Displayed", 'organicthemes'),
						"desc" => __("Enter the number of posts you would like displayed in the featured homepage sidebar.", 'organicthemes'),
						"id" => "postnumber_side",
						"std" => "3",
						"type" => "text");
						
	$options[] = array( "name" => __("Page Templates", 'organicthemes'),
						"type" => "heading");
						
	$options[] = array( "name" => __("Blog Template Category", 'organicthemes'),
						"desc" => __("Choose the category you wish to display on the blog page template.", 'organicthemes'),
						"id" => "category_blog",
						"std" => __("Select a category:", 'organicthemes'),
						"type" => "select",
						"options" => $options_categories);
								
	$options[] = array( "name" => __("Blog Posts To Display", 'organicthemes'),
						"desc" => __("Enter the number of posts you would like to display on the blog page template.", 'organicthemes'),
						"id" => "postnumber_blog",
						"std" => "5",
						"type" => "text");
						
	$options[] = array( "name" => __("Portfolio Template Category", 'organicthemes'),
						"desc" => __("Choose the category you wish to display on the 3 column portfolio page template.", 'organicthemes'),
						"id" => "category_portfolio_3",
						"std" => __("Select a category:", 'organicthemes'),
						"type" => "select",
						"options" => $options_categories);
								
	$options[] = array( "name" => __("Portfolio Posts To Display", 'organicthemes'),
						"desc" => __("Enter the number of posts you would like to display on the 3 column portfolio page template.", 'organicthemes'),
						"id" => "postnumber_portfolio_3",
						"std" => "12",
						"type" => "text");
						
	$options[] = array( "name" => __("Display Settings", 'organicthemes'),
						"type" => "heading");
						
	$options[] = array( "name" => __("Display Banner Text?", 'organicthemes'),
						"desc" => __("Select whether or not you would like to display the featured banner text homepage.", 'organicthemes'),
						"id" => "display_banner",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __("Display Featured Slider and Widgets?", 'organicthemes'),
						"desc" => __("Select whether or not you would like to display the featured content slider and widget section on the homepage.", 'organicthemes'),
						"id" => "display_slider",
						"std" => "1",
						"type" => "checkbox");
												
	$options[] = array( "name" => __("Display Sidebar Posts?", 'organicthemes'),
						"desc" => __("Select whether or not you would like to display the featured posts in the sidebar.", 'organicthemes'),
						"id" => "display_side",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __("Display Social Buttons Home?", 'organicthemes'),
						"desc" => __("Select whether or not you would like to display the Tweet, Facebook Like and Google Plus buttons on the homepage.", 'organicthemes'),
						"id" => "display_socialhome",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __("Display Social Buttons Page?", 'organicthemes'),
						"desc" => __("Select whether or not you would like to display the Tweet, Facebook Like and Google Plus buttons on pages.", 'organicthemes'),
						"id" => "display_socialpage",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __("Display Social Buttons Post?", 'organicthemes'),
						"desc" => __("Select whether or not you would like to display the Tweet, Facebook Like and Google Plus buttons on posts.", 'organicthemes'),
						"id" => "display_socialpost",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __("Colors", 'organicthemes'),
						"type" => "heading");
	
	$options[] = array( "name" => __("Choose Color Scheme", 'organicthemes'),
						"desc" => __("Select whether you would like to display the white or black color scheme.", 'organicthemes'),
						"id" => "display_style",
						"std" => __("true", 'organicthemes'),
						"type" => "select",
						"options" => $stylesheet_array);
											
	$options[] = array( "name" => __("Link Color", 'organicthemes'),
						"desc" => __("Select the color you wish to use for the link colors.", 'organicthemes'),
						"id" => "link_color",
						"std" => "#666666",
						"type" => "color");
						
	$options[] = array( "name" => __("Link Hover Color", 'organicthemes'),
						"desc" => __("Select the color you wish to use for the text link hover colors.", 'organicthemes'),
						"id" => "link_hover_color",
						"std" => "#151515",
						"type" => "color");
						
	$options[] = array( "name" => __("Heading Link Color", 'organicthemes'),
						"desc" => __("Select the color you wish to use for the heading link colors.", 'organicthemes'),
						"id" => "heading_link_color",
						"std" => "#151515",
						"type" => "color");
						
	$options[] = array( "name" => __("Heading Link Hover Color", 'organicthemes'),
						"desc" => __("Select the color you wish to use for the heading link hover colors.", 'organicthemes'),
						"id" => "heading_link_hover_color",
						"std" => "#999999",
						"type" => "color");
						
	$options[] = array( "name" => __("Link Background Color", 'organicthemes'),
						"desc" => __("Select the color you wish to use for the link background color.", 'organicthemes'),
						"id" => "link_background_color",
						"std" => "#FFFF00",
						"type" => "color");	

	return $options;
}