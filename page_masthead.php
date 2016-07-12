<?php
/*
Template Name: Masthead
*/
?>

<?php get_header(); ?>

<div id="container">

        <div id="featureimg">
                <?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'page-feature')); ?>
        </div>

	<div id="content" class="masthead">

                <div class="post-area">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                <h1 class="title_page">
                                        <?php the_title(); ?>
                                </h1>
                                <p class="masthead-edit">
                                        <?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?>
                                </p>

                                <?php the_content(__("Read More", 'organicthemes'));?>

                        <?php if(of_get_option('display_socialpage') == '1') { ?>
                        <?php } else { ?>
                        <?php } ?>

                        <?php endwhile; else: ?>
        			<p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
                        <?php endif; ?>

                </div>

                <?php get_footer(); ?>
	</div>

</div>
