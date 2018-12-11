<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
			<section class="" id="find-agent-section-1">
				<div class="inner">
					<h1>Find an Agent</h1>
					<p>TWIA does not sell policies directly to the consumer nor do we have agents that sell policies on our behalf. Use this page to find an agent or agency that is certified to work with TWIA.</p>
					<hr>
					<?php echo do_shortcode( '[searchandfilter id="10695"]' ); ?>
					<hr>
					


					
				</div>
			</section>
			

			<section id="agent-listing-container" class="inner">
				<h4>Found <?php 
				global $wp_query;
				echo $wp_query->found_posts; 
				?> Results</h4>
				<div id="agent-listing">
					
				
				<?php
						// Start the loop.
						while ( have_posts() ) : the_post();



							// Include the single post content template.
							get_template_part( 'template-parts/post/content', 'agents' );

								

							

							// End of the loop.
						endwhile;
						?>
				</div>
			</section>

			
				
				
			
		
		</main><!-- #main -->

	</div><!-- #primary -->

	
</div><!-- .wrap -->



<?php get_footer(); ?>

