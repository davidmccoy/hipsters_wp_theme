<?php get_header(); ?>

<div id="container">

	<div id="content" class="search">

		<div class="postarea">
      <h4 class="search-query">
        Results for
      </h4>
      <h1>
        <?php the_search_query(); ?>
      </h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>

					<div class="search-post">
						<?php if ( $video ) : ?>
				      <div class="postvid_archive"><?php echo $video; ?></div>
				    <?php else: ?>
              <?php if (has_post_thumbnail()) { ?>
  			        <?php
  								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
  							?>
                <a href="<?php the_permalink() ?>">
                  <div class="featured_image" style="background-image: url('<?php echo $image ?>');">
                  </div>
                </a>
              <?php } ?>
				    <?php endif; ?>

						<h4 class="category">
              <?php
              $category = get_the_category();
              if ($category) {
                echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
              }
              ?>
            </h4>
            <h2>
              <a href="<?php the_permalink() ?>" rel="bookmark">
                    <?php
                          $title = get_the_title();
                          $split_title = explode("—", $title);

                          if (count($split_title) > 1 && strcmp($category[0]->name, $split_title[0]) == 0) {
                               echo $split_title[1];
                          } else {
                               echo the_title();
                          }
                    ?>
              </a>
            </h2>
            <div class="post-author-container">
              <div class="post-author-image" style="background-image: url('<?php echo get_wp_user_avatar_src($author, 66); ?> ');">
              </div>
              <div class="post-author-info">
                <div class="post-author">
                  <p>
                    <?php the_author_posts_link(); ?>
                  </p>
                  <p>
                    <a href="http://www.twitter.com/<?php the_author_meta( 'twitter' ); ?>" rel="twitter" target="_blank">
                        <?php the_author_meta( 'twitter' ); ?>
                    </a>
                  </p>
                </div>
              </div>
            </div>
            <div class="post-date">
              <?php
                $now = current_time('timestamp');
                $posted_at = get_the_time('U');
                $post_age = $now - $posted_at
              ?>

              <?php if($post_age < 604800) { ?>
                <p>
                  <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago ';  ?>
                </p>
              <?php } else { ?>
                <p>
                  <?php the_time(__("F j, Y", 'organicthemes'));  ?>
                </p>
              <?php } ?>
              <div class="middot-spacer">
                &middot;
              </div>
              <?php
                $time_to_read =  ceil(wcount() / 275);
                if ($time_to_read == 1) {
              ?>
                <p>
                  <?php echo $time_to_read . " min to read" ?>
                </p>
              <?php
                } else {
              ?>
                <p>
                  <?php echo $time_to_read . " min to read" ?>
                </p>
              <?php
                }
              ?>
              <p>
                <?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?>
              </p>
            </div>

            <?php the_excerpt(); ?>

            <div style="clear:both;"></div>
            <div class="postmeta">
              <p>
                <?php
                $before = '';
                $seperator = '';
                $after = '';

                the_tags( $before, $seperator, $after );
                ?>
              </p>
            </div>
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

</div>

<?php get_footer(); ?>
