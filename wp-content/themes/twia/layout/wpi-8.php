<?php
/*
 * Template Name: WPI-8
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


		
		<div class="wp-contents">
		<aside class="right-side-nav">
			<div class="container box">
				<h3 class="gold"><?php the_field('title'); ?></h3>
				<div class="img-container">
					<?php the_field('content'); ?>
				</div>
				
				



				<?php if( have_rows('call_to_action') ):?>
					<?php 

					$count = 0;
					

					?>

					<?php while ( have_rows('call_to_action') ) : the_row(); ?>
						<?php
						$count++;
						?>
						<a class="cta <?php the_sub_field('link_color');?>" href="<?php the_sub_field('link_url');?>"><?php the_sub_field('link_text') ?></a>
						
					<?php endwhile; ?>

				<?php endif; ?>
			</div>
		</aside>

		<?php if( have_rows('content_block') ):?>
			<?php 

			$count = 0;
			

			?>

			<?php while ( have_rows('content_block') ) : the_row(); ?>
				<?php
				$count++;
				?>

				<?php if($count==1):?>
				<section class="sidenav-start animated fade" id="wpi-section-<?php echo $count;?>">
				<?php endif; ?>

				<?php if($count>1):?>
				<section class="animated fade" id="wpi-section-<?php echo $count;?>">
				<?php endif; ?>

				
					<div class="inner">
						<div class="wrap">
						<?php the_sub_field('portal_content_html');?>	
						</div>
					</div>
				</section>
			<?php endwhile; ?>
		<?php endif; ?>	

		

		
	</div>
		
		
		

		
</div>
	</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

		
</div><!-- .site-content-contain -->
</div><!-- #page -->	
	
<?php get_footer(); ?>
