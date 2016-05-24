<?php get_header(); ?>

<div id="container">

	<?php include(TEMPLATEPATH."/sidebar_left.php");?>

	<div id="content" class="archive">

		<div class="postarea">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
            <?php global $more; $more = 0; ?>
            
            <div <?php post_class(); ?>>

	            <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	
	            <div class="postauthor">
	        		<p><?php _e("Posted by", 'organicthemes'); ?> <?php the_author_posts_link(); ?> <?php _e("on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?> &middot; <a href="<?php the_permalink(); ?>#comments">
<?php 
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
?>
</a>&nbsp;<?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?></p>      
	            </div>
	
	            <?php if ( $video ) : ?>
	            	<div class="postvid_archive"><?php echo $video; ?></div>
	            <?php else: ?>
	                <div class="postimg_archive"><a href="<?php the_permalink() ?>" rel="bookmark"><?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'cat-thumbnail')); ?></a></div>
	            <?php endif; ?>
	
	            <?php the_excerpt(); ?><div style="clear:both;"></div>   
	
				<div class="postmeta">
					<p><?php _e("Category", 'organicthemes'); ?> <?php the_category(', ') ?> &middot; <?php _e("Tags", 'organicthemes'); ?> <?php the_tags('') ?></p>
				</div>
			
			</div>

			<?php endwhile; else: ?>         
            <p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
			<?php endif; ?>
            
            <div id="pagination">
                <?php if (function_exists("number_paginate")) { number_paginate(); } ?>
            </div>

        </div>

	</div>

	<?php include(TEMPLATEPATH."/sidebar.php");?>

</div>

<?php get_footer(); ?>