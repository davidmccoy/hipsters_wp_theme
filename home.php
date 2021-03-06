<?php get_header(); ?>

<div id="homepage-container">

    <div id="homepage">

			<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_home'),'posts_per_page'=>of_get_option('postnumber_home'), 'paged'=>$paged)); ?>
			<?php
      while (have_posts()) : the_post();

            get_template_part( 'homepage_content' );

      endwhile;
      ?>

      <div id="pagination">
          <?php if (function_exists("number_paginate")) { number_paginate(); } ?>
      </div>

	</div>

</div>

<?php get_footer(); ?>
