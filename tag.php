<?php get_header(); ?>

<div id="container">

	<div id="content" class="tag">

		<div class="post-area" id="tag-post-area">

        <h4 class="tag">
            Tagged in
        </h4>
        <h1>
             <?php single_tag_title(); ?>
        </h1>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php get_template_part( 'tag_content' ); ?>

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
