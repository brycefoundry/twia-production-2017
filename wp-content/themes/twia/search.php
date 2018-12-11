<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage twia
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	
	

	
	<section id="search-listing-container" class="inner">
			<h4>Found <?php 
			global $wp_query;
			echo $wp_query->found_posts; 
			?> Results</h4>
			<div id="search-listing">
				
			
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/post/content', 'excerpt' );

					endwhile; // End of the loop.

					

				else : ?>

					
					<?php
						

				endif;
				?>
			</div>
		
	</section>
	
	
</div><!-- .wrap -->

<?php wp_footer(); ?>
<?php get_footer(); ?>
