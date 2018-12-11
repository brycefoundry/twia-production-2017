<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage twia
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->
		<?php the_field('footer_content', 14212);?>
		<!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->



<?php wp_footer(); ?>

<?php include('layout/alert.php'); ?>



<!--<script type="text/javascript">
(function() { var s = document.createElement("script"); s.type = "text/javascript"; s.async = true; s.src = '//api.usersnap.com/load/67fa0ad8-7522-47fe-9e2a-9077d86c8f36.js';
var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x); })();
</script>-->


</body>
</html>
