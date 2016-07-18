<?php get_header(); ?>

<div id="container">

	<div id="content" class="author">

        <?php

            if(isset($_GET['author_name'])) :
            $curauth = get_userdatabylogin($author_name);
            else :
            $curauth = get_userdata(intval($author));
            endif;

        ?>

        <div class="author-info">
            <div class="author-left">
                <h1>
                    <?php echo $curauth->display_name; ?>
                </h1>
                <p>
                    <?php the_author_meta( 'title' ); ?>
                </p>
                <p>
                    <a href="http://www.twitter.com/<?php the_author_meta( 'twitter' ); ?>" rel="twitter" target="_blank">
                        <?php the_author_meta( 'twitter' ); ?>
                    </a>
                </p>
            </div><div class="author-right">
                <div class="author-image" style="background-image: url('<?php echo get_wp_user_avatar_src($author, 120); ?> ');">
                </div>
            </div>
        </div>



        <div class="post-area author_column" id="author-post-area">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'author_content' ); ?>
            <?php endwhile; else: ?>
                <p>
                    <?php _e("No posts by this author.", 'organicthemes'); ?>
                </p>
            <?php endif; ?>

            <div id="pagination">
                <?php if (function_exists("number_paginate")) { number_paginate(); } ?>
            </div>

        </div>

        <?php get_footer(); ?>

	</div>

</div>
