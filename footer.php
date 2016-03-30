<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alpha
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="wrap">
  		<div class="site-info">
  			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'alpha' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'alpha' ), 'WordPress' ); ?></a>
  			<span class="sep"> | </span>
  			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'alpha' ), 'alpha', '<a href="http://adrianvalenz.com" rel="designer">Adrian Valenzuela</a>' ); ?>
  		</div><!-- .site-info -->
    </div><!-- .wrap -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<section id="footer">
			<footer>

				<?php alpha_social_media_icons(); ?>


				<?php if( true == get_theme_mod( 'showform_setting' ) ) { ?>
				<form action="<?php echo esc_url( get_theme_mod( 'formurl_setting' ) ); ?>" method="post">
					<p><?php echo get_theme_mod( 'formblurb_setting' ); ?></p>

					<input type="email" placeholder="Your email..." name="EMAIL">
					<button type="submit"><?php esc_html_e( 'Subscribe', 'alpha' );?></button>
				</form>
				<?php } ?>


				<small>&copy; <?php wp_reset_query(); echo date('Y '); bloginfo('name'); ?>. <a href="<?php echo esc_url( __( 'https://alphatheme.com/', 'alpha' ) ) .' " target="_blank'; ?>" title="<?php esc_attr_e( 'alpha WordPress Theme', 'alpha' ); ?>"><?php printf( __( 'Powered by %s', 'alpha' ), 'alpha WordPress Theme' ); ?></a></small>

			</footer>
		</section>
		<div id="searchwrap">
			<div class="searchform">
				<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" placeholder="Type your search and hit enter..." value="<?php echo get_search_query(); ?>" name="s" id="s">
				</form>

				<div class="fa fa-times close">&nbsp;</div>
			</div>
		</div>

		<script>
			jQuery(".close").click(function() {
				jQuery("#searchwrap").hide();
			});

			jQuery("#searchwrap").hide();

			jQuery(".searchicon").click(function() {
				jQuery("#searchwrap").show();
				jQuery("#searchwrap").addClass("show");
				jQuery(".searchform form input").focus();
			});

		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', '<?php echo esc_url( get_theme_mod( 'ga_setting' ) ); ?>', 'auto');
		  ga('send', 'pageview');

		</script>

<?php wp_footer(); ?>

</body>
</html>
