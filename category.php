<?php get_header(); ?>

<div id="container">

	<div id="content" class="category">

		<div class="post-area" id="category-post-area">

        <h1>
          <?php
            $category = get_the_category();
            echo $category[0]->name;
          ?>
        </h1>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php get_template_part( 'category_content' ); ?>

			<?php endwhile; else: ?>
            <p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
			<?php endif; ?>

            <div id="pagination">
                <?php if (function_exists("number_paginate")) { number_paginate(); } ?>
            </div>

        </div>

        <?php get_footer(); ?>

	</div>

</div>
