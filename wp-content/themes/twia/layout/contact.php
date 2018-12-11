<?php
/*
 * Template Name: Contact Us
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
		
		

		
		<section id="contact-section-1" class="animated fade">
					<div class="inner">
						<div class="custom-form third-col left-70">
							<div class="box">
								<h3>Message</h3>
								<?php echo do_shortcode( '[gravityform id="18" title="true" description="true"]' ); ?>
								
							</div>
						</div>
						

						<aside class="third-col right-30">
							<div class="inner">
								<?php the_field('contact_sidebar');?>
							


							</div>
						</aside>
					</div>

		</section>
		

		
</div>
	</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

		
</div><!-- .site-content-contain -->
</div><!-- #page -->	
	
<?php get_footer(); ?>
