<div style="clear:both;"></div>

<div id="footer">

  	<div class="footerleft">
          <div class="footertop">
              <p><?php _e("&copy;", 'hipsters'); ?> <?php echo date(__("Y", 'hipsters')); ?> <?php bloginfo('name'); ?></p>
          </div>

          <div class="footerbottom">
              <p><a href="<?php bloginfo('rss_url'); ?>" target="_blank"><?php _e("RSS Feed", 'hipsters'); ?></a></p>
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
              Problems? Blame <a href="https://www.twitter.com/dmccoy" target="_blank">David</a>.
            </p>
          </div>
  	</div>

</div>

<?php do_action('wp_footer'); ?>

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
