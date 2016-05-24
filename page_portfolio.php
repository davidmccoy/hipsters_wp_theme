<?php
/*
Template Name: Portfolio Page 3 Column
*/
?>

<?php get_header(); ?>

<div id="container">

	<div id="featureimg"><?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'page-feature')); ?></div>

	<div id="content" class="wide">
	
		<div id="portfolio">
		
			<h1 class="title_page"><?php the_title(); ?></h1>
		
			<div class="postarea">
            
	            <?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_portfolio_3'),'posts_per_page'=>of_get_option('postnumber_portfolio_3'),'paged'=>$paged)); ?>
				<?php $post_class = 'first'; ?>
	            <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
	            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
	            <?php global $more; $more = 0; ?>
	            
	            <div class="portfolio three <?php echo $post_class; ?>">
	            
					<?php
	                    if ('first' == $post_class){
	                      $post_class = 'second';
	                    }elseif ('second' == $post_class){
	                      $post_class = 'third';
	                    }else{
	                      $post_class = 'first';
	                    }
	                ?>	
	
	                <?php if ( $video ) : ?>
	              		<div class="portfoliovideo three"><?php echo $video; ?></div>
					<?php else: ?>
	                    <div class="portfolioimg three"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'portfolio-3' ); ?></a></div>
	                <?php endif; ?>
	                
	                <div class="portfoliotitle three">              
	                    <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	                    <?php the_excerpt(); ?>
	                </div>
	            
	            </div>
								
				<?php endwhile; ?>
	            
	            <?php else : // do not delete ?>
	
	            <h1><?php _e("No Posts Have Been Added", 'organicthemes'); ?></h1>
	            <p><?php _e("You must choose a category of published posts for the portfolio page within the theme options.", 'organicthemes'); ?></p>
	
				<?php endif; // do not delete ?>
			
			</div>
			
			<div id="pagination">
			    <?php if (function_exists("number_paginate")) { number_paginate(); } ?>
			</div>
		
		</div>
		
	</div>
		
</div>

<?php get_footer(); ?>