<?php get_header(); ?>

<div id="container">

	<div id="content" class="search">

		<div class="post-area" id="search-post-area">
      <h4 class="search-query">
        Results for
      </h4>
      <h1>
        <?php the_search_query(); ?>
      </h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php get_template_part( 'search_content' ); ?>

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

        <?php get_footer(); ?>

	</div>

</div>
