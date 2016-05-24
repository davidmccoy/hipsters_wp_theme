<div style="clear:both;"></div>

<div id="footertopbg">

    <div id="footerwidgets">
        
            <div class="footerwidgetleft">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left') ) : ?>
                <?php endif; ?>
            </div>
            
            <div class="footerwidgetmidleft">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Mid Left') ) : ?>
                <?php endif; ?>
            </div>
            
            <div class="footerwidgetmidright">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Mid Right') ) : ?>
                <?php endif; ?>
            </div>
            
            <div class="footerwidgetright">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right') ) : ?>
                <?php endif; ?>
            </div>
            
    </div>

</div>

<div id="footerbg">

	<div id="footer">
    
    	<div class="footerleft">
            <div class="footertop">
                <p><?php _e("Copyright", 'organicthemes'); ?> <?php echo date(__("Y", 'organicthemes')); ?> <?php bloginfo('name'); ?> &middot; <a href="<?php bloginfo('rss_url'); ?>" target="_blank"><?php _e("RSS Feed", 'organicthemes'); ?></a> &middot; <?php wp_loginout(); ?></p>
            </div>
            
            <div class="footerbottom">
                <p><a href="http://www.organicthemes.com/themes/" target="_blank"><?php _e("The Structure Theme v3", 'organicthemes'); ?></a> <?php _e("by", 'organicthemes'); ?> <a href="http://www.organicthemes.com" target="_blank"><?php _e("Organic Themes", 'organicthemes'); ?></a> &middot; <a href="http://kahunahost.com" target="_blank" title="WordPress Hosting"><?php _e("WordPress Hosting", 'organicthemes'); ?></a></p>
            </div>
        </div>
        
        <div class="footerright">
    		<a href="http://www.organicthemes.com" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/footer_logo.png" alt="<?php _e("Organic Themes",'organicthemes'); ?>" /></a>
    	</div>
		
	</div>
	
</div>

</div>

<?php do_action('wp_footer'); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42146894-1', 'hipstersofthecoast.com');
  ga('send', 'pageview');
</script>

</body>
</html>