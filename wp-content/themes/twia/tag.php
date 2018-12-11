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
			<section>
				<div class="inner">
						
					<?php
					$args['tag'] = get_query_var('tag');


				
					?>

					
		
					

					<?php query_posts($args); //set p=x where x is post id of post you want to see or use query_posts('cat=1&posts_per_page=1); to show one post from Category 1
					if (have_posts()) : ?>	
					
					<?php while (have_posts()) : the_post(); 

					$title= get_the_title();

					?>
					
					

					<?php get_template_part( 'template-parts/post/content', 'excerpt' ); ?>
					
					
					<?php endwhile; ?>
					
					<?php else : ?>
						
					<?php endif; ?>		





				</div>
			</section>
			

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .wrap -->

<?php get_footer(); ?>
