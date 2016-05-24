<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<div id="container">

	<div id="featureimg"><?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'page-feature')); ?></div>

	<div id="content" class="wide">
    
        <div class="postarea">
    
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <h1 class="title_page"><?php the_title(); ?></h1>
            
            <?php the_content(__("Read More", 'organicthemes'));?>
            
            <?php if(of_get_option('display_socialpage') == '1') { ?>
            <div class="social_links">
                <div class="tweet_btn">
                    <a href="http://twitter.com/share" class="twitter-share-button"
                    data-url="<?php the_permalink(); ?>"
                    data-via="<?php echo of_get_option('social_twitter_url'); ?>"
                    data-text="<?php the_title(); ?>"
                    data-related=""
                    data-count="horizontal"><?php _e("Tweet", 'organicthemes'); ?></a>
                </div>
                <div class="like_btn">
                    <fb:like href="<?php echo urlencode(get_permalink($post->ID)); ?>" layout="button_count" show_faces="false" width="100" font=""></fb:like>
                </div>
                <div class="plus_btn">
                	<g:plusone size="medium"></g:plusone>
                </div>
            </div>
            <?php } else { ?>
            <?php } ?>
            
            <div style="clear:both;"></div>
			<?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?>
            
            <?php endwhile; else: ?>
            <p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
			<?php endif; ?>
            
        </div>
        
        <div class="postcomments">
			<?php comments_template('',true); ?>
        </div>
		
	</div>
			
</div>

<?php get_footer(); ?>