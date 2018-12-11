<?php
/*
 * Template Name: Training Center
 * Description: Page template without sidebar
 */


get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		
		
		

		<?php if( have_rows('content_block') ):?>
			<?php 

			$count = 0;
			

			?>

			<?php while ( have_rows('content_block') ) : the_row(); ?>
				<?php
				$count++;
				?>

				
				<section class="animated fade" id="training-center-section-<?php echo $count;?>">
				

				
					<div class="inner">
						<div class="wrap">
						<?php the_sub_field('portal_content_html');?>	
						</div>
					</div>
				</section>
			<?php endwhile; ?>
		<?php endif; ?>	
	
		

		

		

		

		
		

		
</div>
	</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

		
</div><!-- .site-content-contain -->
</div><!-- #page -->	
	
<?php get_footer(); ?>
