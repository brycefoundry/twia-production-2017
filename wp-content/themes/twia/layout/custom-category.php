<?php
/*
 * Template Name: Custom Category
 * Description: Page template without sidebar
 */


get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		
		<?php if( get_field('masthead') == 'yes' ): ?>
			<?php if( get_field('masthead_size') == 'large' ): ?>
				<section class="cover-masthead" style="background-image:url('<?php the_field( 'lg_masthead'); ?>');">
					<div class="inner">
						<div class="container">
						
							<?php if( get_field('masthead_l1') != '' ): ?>
							<h2 class="<?php the_field( 'masthead_l1_color'); ?> animated left"><?php the_field( 'masthead_l1'); ?></h2>

							<?php endif; ?>
							<?php if( get_field('masthead_l2') != '' ): ?>
								<h1 class="<?php the_field( 'masthead_l2_color'); ?> animated left"><?php the_field( 'masthead_l2'); ?></h1>
							<?php endif; ?>
							<?php if( get_field('cta_switch_1') == 'yes' ): ?>
								<a class="cta <?php the_field( 'cta_1_color'); ?>" href="<?php the_field( 'cta_1'); ?>"><?php the_field( 'cta_1_text'); ?></a>
							<?php endif; ?>

							<?php if( get_field('cta_switch_2') == 'yes' ): ?>
								<a class="cta <?php the_field( 'cta_2_color'); ?>" href="<?php the_field( 'cta_2'); ?>"><?php the_field( 'cta_2_text'); ?></a>
							<?php endif; ?>

							<?php if( get_field('cta_switch_3') == 'yes' ): ?>
								<a class="cta <?php the_field( 'cta_3_color'); ?>" href="<?php the_field( 'cta_3'); ?>"><?php the_field( 'cta_3_text'); ?></a>
							<?php endif; ?>
						</div>

					</div>
				</section>

			<?php endif; ?>

			<?php if( get_field('masthead_size') == 'small' ): ?>

				<section class="sm-masthead" style="background-image:url('<?php the_field( 'sm_masthead'); ?>');">
					<div class="inner">
						
						<?php if( get_field('masthead_l1') != '' ): ?>
						<h2 class="<?php the_field( 'masthead_l1_color'); ?> animated left"><?php the_field( 'masthead_l1'); ?></h2>

						<?php endif; ?>
						<?php if( get_field('masthead_l2') != '' ): ?>
							<h1 class="<?php the_field( 'masthead_l2_color'); ?> animated left"><?php the_field( 'masthead_l2'); ?></h1>
						<?php endif; ?>
						<?php if( get_field('cta_switch_1') == 'yes' ): ?>
							<a class="cta <?php the_field( 'cta_1_color'); ?>" href="<?php the_field( 'cta_1'); ?>"><?php the_field( 'cta_1_text'); ?></a>
						<?php endif; ?>

						<?php if( get_field('cta_switch_2') == 'yes' ): ?>
							<a class="cta <?php the_field( 'cta_2_color'); ?>" href="<?php the_field( 'cta_2'); ?>"><?php the_field( 'cta_2_text'); ?></a>
						<?php endif; ?>

						<?php if( get_field('cta_switch_3') == 'yes' ): ?>
							<a class="cta <?php the_field( 'cta_3_color'); ?>" href="<?php the_field( 'cta_3'); ?>"><?php the_field( 'cta_3_text'); ?></a>
						<?php endif; ?>


					</div>
				</section>

			<?php endif; ?>


			<?php if( get_field('masthead_size') == '' ): ?>
				<section class="cover-masthead" style="background-image:url('<?php the_field( 'lg_masthead'); ?>');">
					<div class="inner">
						<div class="container">
						
						
							<h1><?php the_title(); ?></h1>
						
						</div>

					</div>
				</section>	
			<?php endif; ?>
		<?php endif; ?>
		<?php if( get_field('masthead') == '' ): ?>
		<section class="sm-masthead plain">
			<div class="inner">
				<h1><?php the_title(); ?></h1>
			</div>
		</section>
		<?php endif; ?>

		<?php if( get_field('masthead') == 'no' ): ?>
		<section class="sm-masthead plain">
			<div class="inner">
				<h1><?php the_title(); ?></h1>
			</div>
		</section>
		<?php endif; ?>
		
		<section>
			<div class="inner">
							
			</div>
		</section>
		
	
		

		<?php if( get_field('include_search') == 'yes' ): ?>

			<section id="category-content">
				<div class="inner">
					
					<?php if( get_field('include_side') == 'yes' ): ?>
					<div class="content-container">
					<?php endif; ?>

					<?php if( get_field('include_side') == 'no' ): ?>
					<div class="content-container full">
					<?php endif; ?>
						<?php the_field('search_part_1'); ?>

						<?php the_field('search_part_2'); ?>
					

					</div>
					<?php if( get_field('include_side', $post_id) == 'yes' ): ?>
					<aside class="right-side-nav">
						<div class="container box">
							<h3 class="gold"><?php the_field('side_bar_title',$post_id);?></h3>
							<?php if(get_field('side_bar_accent_image', $post_id)!=''): ?>
								<div class="img-container" style="background-image: url('<?php the_field('side_bar_accent_image', $post_id);?>');"></div>


							<?php endif; ?>

							<?php if( have_rows('side_bar_links', $post_id) ):?>

							 	
								<?php while ( have_rows('side_bar_links', $post_id) ) : the_row(); ?>
									
									

									
										<a class="cta <?php the_sub_field( 'side_link_color', $post_id); ?>" href="<?php the_sub_field( 'side_link'); ?>"><?php the_sub_field( 'side_link_title', $post_id); ?></a>
									
								
									

								<?php endwhile; ?>
							<?php endif; ?>
							<?php the_field('side_bar_contents', $post_id);?>	
							

						</div>
					</aside>
					<?php endif; ?>


				</div>
			</section>
		<?php endif; ?>

		<?php if( get_field('include_search') == 'no' ): ?>

			<section id="category-content">
				<div class="inner">
					
					<?php $post_id = get_the_ID();
					  
					   ?>
					
					<?php if( get_field('include_side') == 'yes' ): ?>
					<div class="content-container">
					<?php endif; ?>

					<?php if( get_field('include_side') == 'no' ): ?>
					<div class="content-container full">
					<?php endif; ?>
						
					
						
						<?php
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$customcat = get_field('custom_category');

						$args['cat'] = $customcat;
						$args['posts_per_page'] = '10';
						$args['paged'] = $paged;
						$args['page-status'] = 'published';
						
						?>

						
						
						

						<?php query_posts($args); //set p=x where x is post id of post you want to see or use query_posts('cat=1&posts_per_page=1); to show one post from Category 1
						if (have_posts()) : ?>	
						<div class="pagination-links"><?php echo paginate_links(); ?></div>
						
						<?php while (have_posts()) : the_post(); 

						$title= get_the_title();

						?>


						
						

						<?php get_template_part( 'template-parts/post/content', 'excerpt' ); ?>
						
						
						<?php endwhile; ?>

						
						<div class="pagination-links"><?php echo paginate_links(); ?></div>
						



						<?php wp_reset_postdata(); ?>
						
						<?php else : ?>
							
						<?php endif; ?>		
					</div>


					

					<?php if( get_field('include_side', $post_id) == 'yes' ): ?>
					<aside class="right-side-nav">
						<div class="container box">
							<h3 class="gold"><?php the_field('side_bar_title',$post_id);?></h3>
							<?php if(get_field('side_bar_accent_image', $post_id)!=''): ?>
								<div class="img-container" style="background-image: url('<?php the_field('side_bar_accent_image', $post_id);?>');"></div>


							<?php endif; ?>

							<?php if( have_rows('side_bar_links', $post_id) ):?>

							 	
								<?php while ( have_rows('side_bar_links', $post_id) ) : the_row(); ?>
									
									

									
										<a class="cta <?php the_sub_field( 'side_link_color', $post_id); ?>" href="<?php the_sub_field( 'side_link', $post_id); ?>"><?php the_sub_field( 'side_link_title', $post_id); ?></a>
									
								
									

								<?php endwhile; ?>
							<?php endif; ?>
							<?php the_field('side_bar_contents', $post_id);?>	
							

						</div>
					</aside>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>

		

		


		

		
		

		
</div>
	</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

		
</div><!-- .site-content-contain -->
</div><!-- #page -->	
	
<?php get_footer(); ?>
