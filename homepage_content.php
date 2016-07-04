     
<div class="homepagecontent" <?php if (is_sticky()) echo 'id="sticky"' ?>> 
  <?php
    $post_image_id = get_post_thumbnail_id($post_to_use->ID);
    if ($post_image_id) {
      $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
      if ($thumbnail) (string)$thumbnail = $thumbnail[0];
    } 
  ?>
  <div class="post_container">
    <a href="<?php the_permalink() ?>">
      <div class="featured_image" style="background-image: url('<?php echo $thumbnail; ?>'); background-size: cover; height: 220px;">
      </div>
    </a>
    <div class="homeinfo">
      <div class="post-category">
        <h4>
          <?php
          $category = get_the_category();
          if ($category) {
            echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
          }
          ?>
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
</div>