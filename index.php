<?php get_header(); ?>

<div id="container">

	<div id="content" class="left">

		<div class="post-area">


      <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
      <?php if ( $video ) : ?>
        <div class="postvid_single"><?php echo $video; ?></div>
      <?php else: ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0]; ?>
        <div class="postimg_single" style="background-image: url('<?php echo $image ?>');"></div>
      <?php endif; ?>

			<h4 class="category">
				<?php
        $category = get_the_category();
        if ($category) {
          echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
        }
        ?>
			</h4>
			<h1 class="post-title">
                        <?php
                              $title = get_the_title();
                              $split_title = explode("—", $title);

                              if (count($split_title) > 1 && strcmp($category[0]->name, $split_title[0]) == 0) {
                                    echo $split_title[1];
                              } else {
                                    echo the_title();
                              }
                        ?>
			</h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="post-author-container">
        <div class="post-author-image" style="background-image: url('<?php echo get_wp_user_avatar_src(get_the_author_meta( 'ID' ), 66); ?> ');">
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

      <div class="post-content">
		    <?php the_content(__("Read More", 'organicthemes'));?>
      </div>

			<div style="clear:both;"></div>
			<?php trackback_rdf(); ?>

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

                  <?php
                        // Display related posts of current post
                        rp4wp_children();
                  ?>

		</div>

		<?php endwhile; else: ?>
		<p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
		<?php endif; ?>

    <div class="share-bar">
      <div class="share-bar-container">
        <div class="share-bar-content">
          <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(wp_get_shortlink($post->ID)); ?>&text=<?php the_title(); ?> via @HipstersMTG" onclick="return !window.open(this.href, 'Twitter', 'width=500,height=500')" target="_blank">
            <div class="social-share twitter">
              <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
            </div>
          </a>
          <a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(wp_get_shortlink($post->ID)); ?>" onclick="return !window.open(this.href, 'Facebook', 'width=500,height=500')" target="_blank">
            <div class="social-share mid facebook">
              <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
            </div>
          </a>
          <?php
            $myExcerpt = get_the_excerpt();
            $tags = array("<p>", "</p>");
            $myExcerpt = str_replace($tags, "", $myExcerpt);
            ?>
          <a href="mailto:?subject=<?php urlencode(the_title()); ?>&amp;body=<?php echo $myExcerpt; ?>%0A%0ARead More:%0A<?php echo wp_get_shortlink($post->ID); ?>" class="email-link">
            <div class="social-share email">
              <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
            </div>
          </a>
        </div>
      </div>
    </div>

		<?php get_footer(); ?>
	</div>

</div>
<script>
      // Hacky way to customize popup email link
      window.onload = function() {
            var emailLink = document.querySelector('.email-link').href
            var otherEmailLink = document.querySelector('.has_email');
            otherEmailLink.querySelector('a').href = emailLink;
      }
</script>
