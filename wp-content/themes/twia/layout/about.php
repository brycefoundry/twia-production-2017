<?php
/*
 * Template Name: About
 * Description: Page template without sidebar
 */


get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		
		

		<section class="sm-masthead" id="about-section-1" style="background-image:url('/wp-content/themes/twia/assets/images/about/about-header.png');">
			<div class="inner">
				<h1 class="white animated left">About Us</h1>
			</div>
		</section>
		
		<div class="wp-contents">
			
		
			<aside class="left-side-nav">
				<div class="container box">
					<ul>
						<li class="active"><button data-anchor="what-is-twia">What is TWIA?</button></li>
						<li><button data-anchor="working-at-twia">Working at TWIA</button></li>
						<li><button data-anchor="board-meetings">Board Meetings</button></li>
						<li><button data-anchor="about-twia-policies">About TWIA Policies</button></li>
						<li><button data-anchor="media-resources">Media Resources</button></li>
						<li><button data-anchor="community-outreach">Community Outreach</button></li>
						<li><button data-anchor="financials-reports">Financials &amp; Reports</button></li>
						
					</ul>
				</div>
			</aside>

			<?php if( have_rows('about_sections') ):?>

			<?php 

			$count = 1;
			

			?>
	 	
	   		<?php while ( have_rows('about_sections') ) : the_row(); ?>


	   		<?php

	   		$count++;
	   		?>


			
			

	   		<?php if($count==2): ?>

	   		<section class="sidenav-start sidenav-section animated fade show" id="<?php echo strip_tags(get_sub_field('section_id')); ?>">
	   		<?php endif; ?>

	   		<?php if($count>2): ?>
			
	   		<section class="sidenav-section animated fade show" id="<?php echo strip_tags(get_sub_field('section_id')); ?>">
	   		<?php endif; ?>
	   		

	   			<div class="inner">
	   				<div class="wrap">

	   				
					<h2 class="gold"><?php the_sub_field('section_title'); ?></h2>
					
					<?php the_sub_field('about-edit');?>
					

	   				<?php if( have_rows('tabbed') ):?>
						
						
		   				<?php

		   				$tabcount = 0;
		   				$tabcountcont = 0;
		   				?>

		   				<div class="content-selector-module">

		   					<div class="links">
		   					<ul>
		   					<?php while ( have_rows('tabbed') ) : the_row(); ?>
		   						
								<?php $tabcount++;?>

		   						
		   						
								<?php if($tabcount==1): ?>
		   						<li class="active"><button class="cta"><?php the_sub_field('tabbed_title');?></button></li>
								<?php endif; ?>

								<?php if($tabcount>1): ?>
								<li><button class="cta"><?php the_sub_field('tabbed_title');?></button></li>
								<?php endif; ?>


		   					<?php endwhile; ?>
		   					</ul>
		   					</div>
		   				

		   				<div class="content box">
		   					<ul>
		   					<?php while ( have_rows('tabbed') ) : the_row(); ?>
		   						<?php $tabcountcont++;?>
 								
		   								
			   					<?php if($tabcountcont==1): ?>
			   						<li class="active parent">

										<?php if(get_sub_field('select_media')=='photo'): ?>
										<div class="fifty-col left" style="background-image:url('<?php the_sub_field( 'tabbed_accent_image');?>'); ">
											<div class="content-container">
												
											</div>
										</div>
										<?php endif; ?>

										<?php if(get_sub_field('select_media')=='video'): ?>
										<div class="fifty-col left">
											<div class="content-container">
												<?php the_sub_field( 'tabbed_accent_video');?>
											</div>
										</div>
										<?php endif; ?>

										<div class="fifty-col right">
											<div class="content-container">
												<h3 class="blue"><?php the_sub_field('tabbed_title');?></h3>
												<hr>
												<?php the_sub_field('tabbed_content');?>
											</div>
										</div>

			   						</li>
			   					<?php endif; ?>
								
								<?php if($tabcountcont>1): ?>
									<li class="parent">
										<?php if(get_sub_field('select_media')=='photo'): ?>
										<div class="fifty-col left" style="background-image:url('<?php the_sub_field('tabbed_accent_image');?>');">
											<div class="content-container">
												
											</div>
										</div>
										<?php endif; ?>

										<?php if(get_sub_field('select_media')=='video'): ?>
										<div class="fifty-col left">
											<div class="content-container">
												<?php the_sub_field( 'tabbed_accent_video');?>
												
											</div>
										</div>
										<?php endif; ?>

										<div class="fifty-col right">
											<div class="content-container">
												<h3 class="blue"><?php the_sub_field('tabbed_title');?></h3>
												<hr>
												<?php the_sub_field('tabbed_content');?>
											</div>
										</div>
									</li>
								<?php endif; ?>


		   					<?php endwhile; ?>
		   					</ul>
		   				</div>
		   				</div>


	   				<?php endif; ?>

	   				<?php if( have_rows('expandible_list') ):?>

		   				<?php while ( have_rows('expandible_list') ) : the_row(); ?>
		   					<div class="expandible-module">
			   				<ul class="tier-1">
			   					<li class="tier-1">
			   						<h4 class="title"><?php the_sub_field('parent_name');?></h4>
			   						<ul class="tier-2">
									<?php if( have_rows('child') ):?>

						   				<?php while ( have_rows('child') ) : the_row(); ?>
											
											
												
														
												
													<?php if(get_sub_field('child_link_option')=='link'): ?>
														<li class="tier-2 quart-col link">
															<div class="content-container box">
																<a target="_blank" href="<?php the_sub_field('input_link');?>"><?php the_sub_field('child_name');?></a>
															</div>
														</li>
													<?php endif; ?>

													<?php if(get_sub_field('child_link_option')=='doc'): ?>
														<li class="tier-2 quart-col doc">
															<div class="content-container box">
																<a target="_blank" href="<?php the_sub_field('input_doc');?>"><?php the_sub_field('child_name');?></a>
															</div>
														</li>
													<?php endif; ?>													
												
						   				<?php endwhile; ?>



					   				<?php endif; ?>
					   				</ul>
			   						</li>
			   					</ul>
			   				</div>
		   				<?php endwhile; ?>
		   				</div>

	   				<?php endif; ?>

				
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
