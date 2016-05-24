<?php
/*
Template Name: Archive
*/
?>

<?php get_header(); ?>

<div id="container">

	<div id="content" class="left">
    
        <div class="postarea">
    
    		<h1 class="title_page"><?php the_title(); ?></h1>
				
				<div class="archive_column first">
		
					<h6><?php _e("By Page:", 'organicthemes'); ?></h6>
						<ul>
							<?php wp_list_pages('title_li='); ?>
						</ul>
				
					<h6><?php _e("By Month:", 'organicthemes'); ?></h6>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>
							
					<h6><?php _e("By Category:", 'organicthemes'); ?></h6>
						<ul>
							<?php wp_list_categories('sort_column=name&title_li='); ?>
						</ul>
		
				</div>
				
				<div class="archive_column">
					
					<h6><?php _e("By Post:", 'organicthemes'); ?></h6>
						<ul>
							<?php wp_get_archives('type=postbypost&limit=100'); ?> 
						</ul>
				</div>
			            
        </div>
		
	</div>
			
<?php include(TEMPLATEPATH."/sidebar.php");?>

</div>

<?php get_footer(); ?>