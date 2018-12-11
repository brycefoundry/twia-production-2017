<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage twia
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section>
				<div class="inner">
					<?php
							// Start the loop.
							while ( have_posts() ) : the_post();

								// Include the single post content template.
								get_template_part( 'template-parts/post/content', 'profile' );

									

								

								// End of the loop.
							endwhile;
							?>

				</div>
			</section>
			
		</main><!-- #main -->
	</div><!-- #primary -->
	
</div><!-- .wrap -->

<?php get_footer(); ?>
