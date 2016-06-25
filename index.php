<?php get_header(); ?>

<div id="container">

	<div id="content" class="left">

		<?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
		<?php if ( $video ) : ?>
			<div class="postvid_single"><?php echo $video; ?></div>
		<?php else: ?>
			<div class="postimg_single"><?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'post-feature')); ?></div>
		<?php endif; ?>

		<div class="postarea">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="title_page">

				<h1>
					<?php the_title(); ?>
				</h1>

        <div class="postauthor">
        	<?php
        		$now = current_time('timestamp');
        		$posted_at = get_the_time('U');
        		$post_age = $now - $posted_at
        	?>
        	<?php if($post_age < 604800) { ?>
	      		<p>
	      			<?php _e("By", 'organicthemes'); ?> <?php the_author_posts_link(); ?> <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago ';  ?> <?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?>
	      		</p>
        	<?php } else { ?>
        		<p>
        			<?php _e("By", 'organicthemes'); ?> <?php the_author_posts_link(); ?> <?php _e("on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes'));  ?> <?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?>
        		</p>
        	<?php } ?>
        </div>

      </div>

			<?php the_content(__("Read More", 'organicthemes'));?>

			<?php if(of_get_option('display_socialpost') == '1') { ?>
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
			        <div class="fb-like" href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
			    </div>
			    <div class="plus_btn">
			    	<g:plusone size="medium"></g:plusone>
			    </div>
			</div>
			<?php } else { ?>
			<?php } ?>

			<div style="clear:both;"></div>
			<?php trackback_rdf(); ?>

			<div class="postmeta">
				<p><?php _e("Category:", 'organicthemes'); ?> <?php the_category(', ') ?> &middot; <?php _e("Tags:", 'organicthemes'); ?> <?php the_tags('') ?></p>
			</div>

		</div>

		<?php endwhile; else: ?>
		<p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
		<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>
