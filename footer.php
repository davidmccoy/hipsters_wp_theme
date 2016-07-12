<div style="clear:both;"></div>

<div id="footer">

  	<div class="footerleft">
          <div class="footertop">
              <p><?php _e("&copy;", 'hipsters'); ?> <?php echo date(__("Y", 'hipsters')); ?> <?php bloginfo('name'); ?></p>
          </div>

          <div class="footerbottom">
              <p><a href="<?php bloginfo('rss_url'); ?>" target="_blank"><?php _e("RSS Feed", 'hipsters'); ?></a> &middot; <?php wp_loginout(); ?></p>
          </div>
      </div>

      <div class="footerright">
          <div class="footertop">
              <p>
                Questions? <a href="mailto:info@hipstersofthecoast.com">Email us</a>.
              </p>
          </div>
          <div class="footerbottom">
            <p>
              Problems? Blame <a href="http://www.davidmccoy.com" target="_blank">David</a>.
            </p>
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

<script type="text/javascript">
  var userAgent = navigator.userAgent || navigator.vendor || window.opera;
  var body = document.getElementsByTagName("BODY")[0];


  if( userAgent.match( /iPad/i ) || userAgent.match( /iPhone/i ) || userAgent.match( /iPod/i ) )
  {
    body.className += ' ios';
  } else {
    body.className += ' not-ios';
  }
</script>

<div id="overlay">
</div>

</body>
</html>
