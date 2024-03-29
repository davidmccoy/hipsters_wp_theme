<?php
//Initiate the localization of the theme domain
load_theme_textdomain( 'organicthemes', TEMPLATEPATH.'/languages' );

//Turn a category ID to a Name
function cat_id_to_name($id) {
	foreach((array)(get_categories()) as $category) {
    	if ($id == $category->cat_ID) { return $category->cat_name; break; }
	}
}

// Theme Options Framework
if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = 'false') {

		$optionsframework_settings = get_option('optionsframework');

		// Gets the unique option id
		$option_name = $option_name = $optionsframework_settings['id'];

		if ( get_option($option_name) ) {
			$options = get_option($option_name);
		}

		if ( !empty($options[$name]) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}

if ( !function_exists( 'optionsframework_add_page' ) && current_user_can('edit_theme_options') ) {
	function options_default() {
		add_theme_page(__("Theme Options",'organicthemes'), __("Theme Options",'organicthemes'), 'edit_theme_options', 'options-framework','optionsframework_page_notice');
	}
	add_action('admin_menu', 'options_default');
}

/**
 * Displays a notice on the theme options page if the Options Framework plugin is not installed
 */

if ( !function_exists( 'optionsframework_page_notice' ) ) {
	add_thickbox(); // Required for the plugin install dialog.

	function optionsframework_page_notice() { ?>

		<div class="wrap">
		<?php screen_icon( 'themes' ); ?>
		<h2><?php _e("Theme Options", 'organicthemes'); ?></h2>
        <p><b><?php _e("This theme requires the Options Framework plugin installed and activated to manage your theme options.", 'organicthemes'); ?> <a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&plugin=options-framework&TB_iframe=true&width=640&height=517'); ?>" class="thickbox onclick"><?php _e("Install Now", 'organicthemes'); ?></a></b></p>
		</div>
		<?php
	}
}

// Remove height and width from featured image tags
function clean_wp_width_height($string){
	return preg_replace('/\<(.*?)(width="(.*?)")(.*?)(height="(.*?)")(.*?)\>/i', '<$1$4$7>',$string);
}

//	Include the Custom Header code
include_once(TEMPLATEPATH.'/includes/custom-header.php');

//	Register sidebars
if ( function_exists('register_sidebars') )
	register_sidebar(array('name'=>'Homepage Top Right','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));
	register_sidebar(array('name'=>'Home Sidebar Left','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));
	register_sidebar(array('name'=>'Home Sidebar Right','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));
	register_sidebar(array('name'=>'Left Sidebar','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));
	register_sidebar(array('name'=>'Right Sidebar','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));
	register_sidebar(array('name'=>'Footer Left','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));
	register_sidebar(array('name'=>'Footer Mid Left','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));
	register_sidebar(array('name'=>'Footer Mid Right','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));
	register_sidebar(array('name'=>'Footer Right','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));

// Page Numbering Pagination
function number_paginate($args = null) {
	$defaults = array(
		'page' => null, 'pages' => null,
		'range' => 5, 'gap' => 5, 'anchor' => 1,
		'before' => '<div class="number-paginate">', 'after' => '</div>',
		'title' => '',
		'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),
		'echo' => 1
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	if (!$page && !$pages) {
		global $wp_query;
		$page = get_query_var('paged');
		$page = !empty($page) ? intval($page) : 1;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));
	}

	$output = "";

	if ($pages > 1) {
		$output .= "$before<span class='number-title'>$title</span>";
		$ellipsis = "<span class='number-gap'>...</span>";
		if ($page > 1 && !empty($previouspage)) {
			$output .= "<a href='" . get_pagenum_link($page - 1) . "' class='number-prev'>$previouspage</a>";
		}

		$min_links = $range * 2 + 1;
		$block_min = min($page - $range, $pages - $min_links);
		$block_high = max($page + $range, $min_links);
		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

		if ($left_gap && !$right_gap) {
			$output .= sprintf('%s%s%s',
				number_paginate_loop(1, $anchor),
				$ellipsis,
				number_paginate_loop($block_min, $pages, $page)
			);
		}

		else if ($left_gap && $right_gap) {
			$output .= sprintf('%s%s%s%s%s',
				number_paginate_loop(1, $anchor),
				$ellipsis,
				number_paginate_loop($block_min, $block_high, $page),
				$ellipsis,
				number_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}

		else if ($right_gap && !$left_gap) {
			$output .= sprintf('%s%s%s',
				number_paginate_loop(1, $block_high, $page),
				$ellipsis,
				number_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}

		else {
			$output .= number_paginate_loop(1, $pages, $page);
		}

		if ($page < $pages && !empty($nextpage)) {
			$output .= "<a href='" . get_pagenum_link($page + 1) . "' class='number-next'>$nextpage</a>";
		}

		$output .= $after;
	}

	if ($echo) {
		echo $output;
	}

	return $output;

}

function number_paginate_loop($start, $max, $page = 0) {
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i))
			? "<span class='number-page number-current'>$i</span>"
			: "<a href='" . get_pagenum_link($i) . "' class='number-page'>$i</a>";
	}

	return $output;

}

// Add Custom Meta Box To Posts

$prefix = 'custom_meta_';

$meta_box = array(
    'id' => 'my-meta-box',
    'title' => 'Featured Video',
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __("Paste Video Embed Code", 'organicthemes'),
            'desc' => __("Enter Vimeo, YouTube or other embed code to display a featured video.", 'organicthemes'),
            'id' => $prefix . 'video',
            'type' => 'textarea',
            'std' => ''
        ),
    )
);

add_action('admin_menu', 'mytheme_add_box');

// Add meta box
function mytheme_add_box() {
    global $meta_box;

    add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function mytheme_show_box() {
    global $meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="8" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
        }
        echo     '<td>',
            '</tr>';
    }

    echo '</table>';
}

add_action('save_post', 'mytheme_save_data');

// Save data from meta box
function mytheme_save_data($post_id) {
    global $meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

// Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
function add_menuclass($ulclass) {
return preg_replace('/<ul>/', '<ul class="menu">', $ulclass, 1);
}
add_filter('wp_page_menu','add_menuclass');
add_filter('wp_nav_menu','add_menuclass');

// Add custom background
if ( function_exists('add_custom_background') )
add_custom_background();

// Add navigation support
if ( function_exists('add_theme_support') )
add_theme_support( 'menus' );

// Add default posts and comments RSS feed links to head
if ( function_exists('add_theme_support') )
add_theme_support( 'automatic-feed-links' );

//	Add thumbnail support
if ( function_exists('add_theme_support') )
add_theme_support('post-thumbnails');
add_image_size( 'page-feature', 960, 460, true ); // Page Feature Image
add_image_size( 'post-feature', 640, 420, true ); // Post Feature Image
add_image_size( 'home-feature', 700, 480 ); // Homepage Feature Image
add_image_size( 'home-thumbnail', 450, 450 ); // Homepage Mid Thumbnail
add_image_size( 'home-side', 180, 180, true ); // Homepage Sidebar Thumbnail
add_image_size( 'portfolio-3', 300, 500 ); // Portfolio Page 3 Column Images
add_image_size( 'cat-thumbnail', 450, 450, true ); // Category Thumbnail

// Get combined FB and WordPress comment count
function full_comment_count() {
  global $post;
  $url = get_permalink($post->ID);
  ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
  $filecontent = file_get_contents('https://graph.facebook.com/?ids=' . $url);
  $json = json_decode($filecontent);
  $count = $json->$url->comments;
  $wpCount = get_comments_number();
  $realCount = $count + $wpCount;
  if ($realCount == 0 || !isset($realCount)) {
    $realCount = 0;
  }
  return $realCount;
}

function floating_social_bar() {
  wp_register_script( 'custom-script', get_template_directory_uri() . '/js/floating_social_bar.js', array( 'jquery' ) );

  wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'floating_social_bar' );

function casthaven_redirect() {
  wp_register_script( 'custom-script', get_template_directory_uri() . '/js/casthaven_redirect.js', array( 'jquery' ) );

  wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'casthaven_redirect' );

function mobile_menu() {
  wp_register_script( 'mobile_menu', get_template_directory_uri() . '/js/mobile_menu.js', array( 'jquery' ) );

  wp_enqueue_script( 'mobile_menu' );
}
add_action( 'wp_enqueue_scripts', 'mobile_menu' );

function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Add Google Analytics
 */

function google_load_file() {
	$this_post = get_queried_object();
	$author_id = $this_post->post_author;
	$name = get_the_author_meta('display_name', $author_id);

	wp_enqueue_script( 'author-tracking', get_stylesheet_directory_uri() . '/js/google.js', array(), '1.0.0', true );
	wp_localize_script( 'author-tracking', 'author', array( 'name' => $name ) );
}
add_action( 'wp_enqueue_scripts', 'google_load_file' );

/**
 * Add infinite scroll to homepage
 */

function mytheme_infinite_scroll_init() {
  add_theme_support( 'infinite-scroll', array(
    'type' => 'scroll',
    'container' => 'homepage',
    'render' => 'mytheme_infinite_scroll_render',
    'posts_per_page' => 11,
    'footer' => false,
  ) );
}
add_action( 'init', 'mytheme_infinite_scroll_init' );

function mytheme_infinite_scroll_render() {
  while ( have_posts() ) : the_post();
    get_template_part( 'homepage_content' );
  endwhile;
}

// /**
//  * Add infinite scroll to categories
//  */
//
// function category_infinite_scroll_init() {
//   add_theme_support( 'infinite-scroll', array(
//     'type' => 'scroll',
//     'container' => 'category-post-area',
//     'render' => 'category_infinite_scroll_render',
//     'posts_per_page' => 10,
//     'footer' => false,
//   ) );
// }
// add_action( 'init', 'category_infinite_scroll_init' );
//
// function category_infinite_scroll_render() {
//   while ( have_posts() ) : the_post();
//     get_template_part( 'category_content' );
//   endwhile;
// }
//
// /**
//  * Add infinite scroll to authors
//  */
//
// function author_infinite_scroll_init() {
//   add_theme_support( 'infinite-scroll', array(
//     'type' => 'scroll',
//     'container' => 'author-post-area',
//     'render' => 'author_infinite_scroll_render',
//     'posts_per_page' => 10,
//     'footer' => false,
//   ) );
// }
// add_action( 'init', 'author_infinite_scroll_init' );
//
// function author_infinite_scroll_render() {
//   while ( have_posts() ) : the_post();
//     get_template_part( 'author_content' );
//   endwhile;
// }
//
// /**
//  * Add infinite scroll to search
//  */
//
// function search_infinite_scroll_init() {
//   add_theme_support( 'infinite-scroll', array(
//     'type' => 'scroll',
//     'container' => 'search-post-area',
//     'render' => 'search_infinite_scroll_render',
//     'posts_per_page' => 10,
//     'footer' => false,
//   ) );
// }
// add_action( 'init', 'search_infinite_scroll_init' );
//
// function search_infinite_scroll_render() {
//   while ( have_posts() ) : the_post();
//     get_template_part( 'search_content' );
//   endwhile;
// }
//
// /**
//  * Add infinite scroll to tag
//  */
//
// function tag_infinite_scroll_init() {
//   add_theme_support( 'infinite-scroll', array(
//     'type' => 'scroll',
//     'container' => 'tag-post-area',
//     'render' => 'tag_infinite_scroll_render',
//     'posts_per_page' => 10,
//     'footer' => false,
//   ) );
// }
// add_action( 'init', 'tag_infinite_scroll_init' );
//
// function tag_infinite_scroll_render() {
//   while ( have_posts() ) : the_post();
//     get_template_part( 'tag_content' );
//   endwhile;
// }

/**
 * Remove WP Admin bar
 */

add_filter('show_admin_bar', '__return_false');

/**
 * returns the number of words in a post
 */
function wcount(){
    ob_start();
    the_content();
    $content = ob_get_clean();
    return sizeof(explode(" ", $content));
}

/**
 * adds title and twitter handle to user profile
 */
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>


  <h3>Extra profile information</h3>

  <table class="form-table">
  <?php if( current_user_can( 'administrator' ) ){  ?>

    <tr>
      <th><label for="title">Title</label></th>

      <td>
        <input type="text" name="title" id="title" value="<?php echo esc_attr( get_the_author_meta( 'title', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description">User's official title.</span>
      </td>
    </tr>
  <?php } ?>
    <tr>
      <th><label for="twitter">Twitter</label></th>

      <td>
        <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description">Please enter your Twitter username (including the @).</span>
      </td>
    </tr>
  </table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

  if ( !current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }

  /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
  update_usermeta( $user_id, 'title', $_POST['title'] );
  update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
}
// add search to navbar
add_theme_support( 'html5', array( 'search-form' ) );
add_filter('wp_nav_menu_items', 'add_search_form_to_menu', 10, 2);
function add_search_form_to_menu($items, $args) {
  return $items . '<li class="my-nav-menu-search">' . get_search_form(false) . '</li>';
}

// disable related posts from appending to post content
add_filter( 'rp4wp_append_content', '__return_false' );

// inject ads into the homepage
add_action( 'the_post', 'ad_injection' );
function ad_injection() {
	if( is_home() || is_archive() ) {
		global $wp_query;
		if( $wp_query->current_post%4 == 0 && $wp_query->current_post >0 && $wp_query->current_post < 8 ) {
			echo '<div class="homepagecontent">
			<div class="post_container">
		    <a href="https://www.cardkingdom.com/?utm_source=hipsters&utm_medium=affiliate" target="_blank" onclick="ga(\'send\', \'event\', \'Card Kingdom Homepage Ad\', \'click\', \'Card Kingdom 2018\');">
		      <div class="featured_image" style="background-image: url(/assets/cardkingdom/Hipsters_Ad_Shipping_SNC-order.jpg)">
		      </div>
		    </a>
		    <div class="homeinfo">
		      <div class="post-category">
		        <h4>
							<a href="https://www.cardkingdom.com/?utm_source=hipsters&utm_medium=affiliate" target="_blank" onclick="ga(\'send\', \'event\', \'Card Kingdom Homepage Ad\', \'click\', \'Card Kingdom 2018\');">
								ADVERTISEMENT
							</a>
		        </h4>
		      </div>
		      <div class="post-title">
		       <h3>
		          <a href="https://www.cardkingdom.com/?utm_source=hipsters&utm_medium=affiliate" target="_blank" rel="bookmark"  onclick="ga(\'send\', \'event\', \'Card Kingdom Homepage Ad\', \'click\', \'Card Kingdom 2018\');">
		            Card Kingdom
		          </a>
		        </h3>
		      </div>
		      <div class="home_excerpt">
		        <p>
							Lightning-fast shipping, exceptional customer service, unique MTG products, and general awesomeness since 1999.
						</p>
		      </div>
		    </div>
		  </div>
			</div>';
		}
	}
}

?>
