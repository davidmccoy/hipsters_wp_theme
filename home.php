<?php get_header(); ?>

<div id="container">

    <div id="homepage">
			
			<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_home'),'posts_per_page'=>of_get_option('postnumber_home'), 'paged'=>$paged)); ?>
			<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
            <?php global $more; $more = 0; ?>
                
            	<div class="homepagecontent">
            		<!--Test to standardize image size, parts still need to be moved to CSS-->
            		<?php
						$post_image_id = get_post_thumbnail_id($post_to_use->ID);
						if ($post_image_id) {
							$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
							if ($thumbnail) (string)$thumbnail = $thumbnail[0];
						} 
					?>
                    <a href="<?php the_permalink() ?>">
                      <div class="featured_image" style="background: url('<?php echo $thumbnail; ?>') no-repeat center center; background-size: cover; height: 220px;">
                      </div>
                    </a>
                    <div class="homeinfo">
                      <div class="post-category">
                        <h4>
                          <?php the_category() ?>
                        </h4>
                      </div>
                      <div class="post-title">
	                     <h3>
                          <a href="<?php the_permalink() ?>" rel="bookmark">
                            <?php the_title(); ?>
                          </a>
                        </h3>
                      </div>
	                	<div class="home_excerpt">
	                	<?php the_excerpt(); ?>
	                	</div>
	                </div>
	                <?php if(of_get_option('display_socialhome') == '1') { ?>
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
                
                </div>
                
            <?php endwhile; ?>
			
			<div id="pagination">
			    <?php if (function_exists("number_paginate")) { number_paginate(); } ?>
			</div>
            
            <?php else : ?>
			<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>