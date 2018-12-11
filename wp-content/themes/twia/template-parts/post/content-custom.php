<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage twia
 * @since 1.0
 * @version 1.0
 */

?>


<div class="box">
	<a class="dark-blue" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
	<p><?php the_excerpt(); ?></p>
	<a class="cta bg-gold" href="<?php the_permalink(); ?>">Read More</a>
</div>
