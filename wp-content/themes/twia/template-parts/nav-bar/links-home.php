	<?php if( have_rows('nav_contents', 2050) ):?>

 	
   <?php while ( have_rows('nav_contents', 2050) ) : the_row(); ?>
   
		<?php if( get_sub_field('dd_switch') == true ): ?>

			<li class="rich-link-pos-3 dropdown">
					<h6><?php the_sub_field('sub_nav_label', 2050);?></h6>
			</li>
		<?php endif; ?>

		<?php if( get_sub_field('dd_switch') == false ): ?>
		<li class="rich-link-pos-3 empty">
				<a href="<?php the_sub_field('subnav_link', 2050);?>"><h6><?php the_sub_field('sub_nav_label', 2050);?></h6></a>
		</li>

		<?php endif; ?>

   
		
	<?php endwhile; ?>

	
   <?php endif; ?>


			


		