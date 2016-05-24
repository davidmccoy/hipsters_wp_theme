<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="container">

	<div id="featureimg"><?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'page-feature')); ?></div>

	<div id="content" class="left">
	
		<div class="postarea">
							
            <?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_blog'), 'posts_per_page'=>of_get_option('postnumber_blog'), 'paged'=>$paged)); ?>
            <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
            <?php global $more; $more = 0; ?>
            
			<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            
	            <div class="postauthor">
	        		<p><?php _e("Posted by", 'organicthemes'); ?> <?php the_author_posts_link(); ?> <?php _e("on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?> &middot; <a href="<?php the_permalink(); ?>#comments">
<?/*php 
$c=full_comment_count();
if ($c==0)
  {
  echo "Add a Comment";
  }
else if ($c==1)
  {
  echo "1 Comment";
  }
else
  {
  echo full_comment_count();
  echo " Comments";
  }
*/?>
Comments
</a>&nbsp;<?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?></p>      
	            </div>
            
            <?php if ( $video ) : ?>
            	<div class="postvid_blog"><?php echo $video; ?></div>
            <?php else: ?>
            	<div class="postimg_blog"><a href="<?php the_permalink() ?>" rel="bookmark"><?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'post-feature')); ?></a></div>
            <?php endif; ?>
            
            <?php the_content(__("Read More", 'organicthemes')); ?><div class="clear"></div>
            				
			<div class="postmeta">
				<p><?php _e("Category:", 'organicthemes'); ?> <?php the_category(', ') ?> &middot; <?php _e("Tags:", 'organicthemes'); ?> <?php the_tags('') ?></p>
			</div>

			<?php endwhile; ?>
			
			<div id="pagination">
			    <?php if (function_exists("number_paginate")) { number_paginate(); } ?>
			</div>
            
            <?php else : // do not delete ?>

            <h3><?php _e("Page not Found", 'organicthemes'); ?></h3>
            <p><?php _e("We're sorry, but the page you're looking for isn't here.", 'organicthemes'); ?></p>
            <p><?php _e("Try searching for the page you are looking for or using the navigation in the header or sidebar", 'organicthemes'); ?></p>

			<?php endif; // do not delete ?>
		
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<?php get_footer(); ?>