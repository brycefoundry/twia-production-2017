<?php
/*
 * Template Name: Storm Center
 * Description: Page template without sidebar
 */


get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if( get_field('masthead') == 'yes' ): ?>
		<section class="sm-masthead" id="storm-center-section-1" style="background-image:url('<?php the_field( 'sm_masthead'); ?>');">
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

		<?php if( get_field('masthead') == 'no' ): ?>
		<section class="sm-masthead">
			<div class="inner">
				<h1 class="white"><?php the_title(); ?></h1>
			</div>
		</section>
		<?php endif; ?>
		<section class="pane">
			<div class="inner">
			<?php query_posts('cat=50&posts_per_page=5'); //set p=x where x is post id of post you want to see or use query_posts('cat=1&posts_per_page=1); to show one post from Category 1
			if (have_posts()) : ?>	
			
			<?php while (have_posts()) : the_post(); 

			$title= get_the_title();

			?>
			
			

			<div class="box">
				<a class="dark-blue" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				<p><?php if( get_field('custom_excerpt') == 'yes' ): ?>
			<?php the_field( 'custom_excerpt_text'); ?>
		<?php endif; ?>
		<?php
			if( get_field('custom_excerpt') == 'no' ){
				the_excerpt();
			}
			if( get_field('custom_excerpt') == '' ){
				the_excerpt();
			}
		/* translators: %s: Name of current post */
		
		?></p>
				<a class="cta bg-gold" href="<?php the_permalink(); ?>">Read More</a>
			</div>

			
			
			<?php endwhile; ?>
			
			<?php else : ?>
				
			<?php endif; ?>
			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

		
</div><!-- .site-content-contain -->
</div><!-- #page -->	
	
<?php get_footer(); ?>
