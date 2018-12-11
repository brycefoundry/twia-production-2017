<?php
/*
 * Template Name: Claims Center
 * Description: Page template without sidebar
 */


get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		<?php if( get_field('masthead') == 'yes' ): ?>
			<?php if( get_field('masthead_size') == 'large' ): ?>
				<section id="claims-center-section-1" class="cover-masthead" style="background-image:url('<?php the_field( 'lg_masthead'); ?>');">
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

				<section id="claims-center-section-1" class="sm-masthead" style="background-image:url('<?php the_field( 'sm_masthead'); ?>');">
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
				<section id="claims-center-section-1" class="cover-masthead" style="background-image:url('<?php the_field( 'lg_masthead'); ?>');">
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

		<aside class="left-side-nav">
			<div class="container box">
				<ul>
					<?php if( have_rows('content_block') ):?>
					<?php 

					$count = 1;
					

					?>

					<?php while ( have_rows('content_block') ) : the_row(); ?>
					<?php
					$count++;
					?>
					<?php if($count==2): ?>
					<li class="active"><button data-anchor="claims-center-section-<?php echo $count;?>"><?php the_sub_field('section_title');?></button></li>
					<?php endif; ?>

					<?php if($count>2): ?>
					<li class=""><button data-anchor="claims-center-section-<?php echo $count;?>"><?php the_sub_field('section_title');?></button></li>
					<?php endif; ?>
					
					<?php endwhile; ?>
					<?php endif; ?>
					<li><a class="cta bg-blue" href="https://policy.twia.org/loginPage">Manage my Claim</a></li>	
				</ul>
			</div>
		</aside>

		<?php if( have_rows('content_block') ):?>
			<?php 

			$count = 1;
			

			?>

			<?php while ( have_rows('content_block') ) : the_row(); ?>
				<?php
				$count++;
				?>
				

				<?php if($count==2): ?>
				<section id="claims-center-section-<?php echo $count;?>" class="sidenav-start sidenav-section animated fade">
				<?php endif; ?>

				<?php if($count>2): ?>
				<section id="claims-center-section-<?php echo $count;?>" class="sidenav-section animated fade">
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
