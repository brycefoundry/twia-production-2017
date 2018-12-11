<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage twia
 * @since 1.0
 * @version 1.2
 */

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

	


