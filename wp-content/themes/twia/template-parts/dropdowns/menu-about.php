	<?php if( have_rows('nav_contents', 2418) ):?>

	<?php 

	$count = 1;
	

	?>

 	
   <?php while ( have_rows('nav_contents', 2418) ) : the_row(); ?>
   
		<?php if( get_sub_field('dd_switch') == true ): ?>

			<?php

			$count++;
			?>

			<li class="dropdown-container dropdown-pos-<?php echo $count;?>">
				<div class="wrap">
					<div class="left">
						<div class="contents">
							<?php the_sub_field('subnav_col_1', 2418);?>
						</div>
					</div>

					<div class="right">
						<h6 class="title"><?php the_sub_field('sub_nav_label', 2418);?></h6>
						<div class="col-1">
							<div class="contents">
								<?php the_sub_field('subnav_col_2', 2418);?>
							</div>

							
						</div>
						<div class="col-2">
							<div class="contents">
								<?php the_sub_field('subnav_col_3', 2418);?>
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






