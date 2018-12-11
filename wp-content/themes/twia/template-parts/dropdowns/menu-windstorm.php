


	<?php if( have_rows('nav_contents', 7846) ):?>

 	<?php 

 	$count = 1;
 	

 	?>
   <?php while ( have_rows('nav_contents', 7846) ) : the_row(); ?>
   		

		<?php if( get_sub_field('dd_switch') == true ): ?>
			<?php

			$count++;
			?>
			<li class="dropdown-container dropdown-pos-<?php echo $count;?>">
				<div class="wrap">
					<div class="left">
						<div class="contents">
							<?php the_sub_field('subnav_col_1', 7846);?>
						</div>
					</div>

					<div class="right">
						<h6 class="title"><?php the_sub_field('sub_nav_label', 7846);?></h6>
						<div class="col-1">
							<div class="contents">
								<?php the_sub_field('subnav_col_2', 7846);?>
							</div>

							
						</div>
						<div class="col-2">
							<div class="contents">
								<?php the_sub_field('subnav_col_3', 7846);?>
							</div>
							
						</div>
					</div>
				</div>
			</li>

			
		<?php endif; ?>

		<?php if( get_sub_field('dd_switch') == false ): ?>
			<li class="dropdown-container dropdown-pos-<?php echo $count;?>">
							<div class="wrap">
								<div class="left">
									<div class="contents">
									</div>
								</div>
								<div class="right">
									
								</div>
							</div>
						</li>
		<?php endif; ?>

		

   
		
	<?php endwhile; ?>

	
   <?php endif; ?>




