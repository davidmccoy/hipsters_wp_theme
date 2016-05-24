<div id="sidebar_left">

	<?php if(of_get_option('display_side') == '1') { ?>
	
	<div id="sidebar_featured">
	
		<h4 class="featuredtitle"><?php echo cat_id_to_name(of_get_option('category_side')); ?></h4>
	    
	    <?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_side'),'posts_per_page'=>of_get_option('postnumber_side'))); ?>
	    <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
	    <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
	    <?php global $more; $more = 0; ?>
	        
	        <div class="sidecontent">
	            
	            <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-side' ); ?></a>
	            <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	            <?php the_excerpt(); ?>
	            <a class="morelink" href="<?php the_permalink() ?>" rel="bookmark"><?php _e("Read More", 'organicthemes'); ?></a>
	            <div class="clear"></div>
	        
	        </div>
	        
	    <?php endwhile; ?>
	    <?php else : ?>
	    <?php endif; ?>
	
	</div>
	
	<?php } else { ?>
	<?php } ?>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Sidebar Left') ) : ?>
		<div class="widget">
			<h4><?php _e("Widget Area", 'organicthemes'); ?></h4>
			<p><?php _e("This section is widgetized. To add widgets here, go to the", 'organicthemes'); ?> <a href="<?php echo admin_url(); ?>widgets.php"><?php _e("Widgets", 'organicthemes'); ?></a> <?php _e("panel in your WordPress admin, and add the widgets you would like to the", 'organicthemes'); ?> <strong><?php _e("Home Sidebar Left", 'organicthemes'); ?></strong>.</p>
			<p><small><?php _e("*This message will be overwritten after widgets have been added.", 'organicthemes'); ?></small></p>
		</div>
    <?php endif; ?>
			
</div>