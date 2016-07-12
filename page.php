<?php get_header(); ?>

<div id="container">

	<div id="content" class="page">

                <div class="post-area">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0]; ?>
                        <div class="featureimg" style="background-image: url('<?php echo $image ?>');">
                        </div>

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                <h1 class="title_page">
                                        <?php the_title(); ?>
                                </h1>
                                <p class="edit">
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
