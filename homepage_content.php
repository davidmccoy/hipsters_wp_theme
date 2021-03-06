<?php global $wp_query; ?>
<div class="homepagecontent <?php echo $wp_query->current_post ?>" <?php if (is_sticky()) echo 'id="sticky"' ?>>
  <?php
    $post_image_id = get_post_thumbnail_id($post_to_use->ID);
    if ($post_image_id) {
      if (is_sticky()) {
        $thumbnail = wp_get_attachment_image_src( $post_image_id, 'page-feature', false);
      } else {
        $thumbnail = wp_get_attachment_image_src( $post_image_id, 'home-feature', false);
      }
      if ($thumbnail) (string)$thumbnail = $thumbnail[0];
    }
  ?>
  <div class="post_container">
    <a href="<?php the_permalink() ?>">
      <div class="featured_image" style="background-image: url('<?php echo $thumbnail; ?>');">
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
        </h3>
      </div>
      <div class="home_excerpt">
        <?php the_excerpt(); ?>
      </div>
    </div>
  </div>
</div>
