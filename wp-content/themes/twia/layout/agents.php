<?php
/*
 * Template Name: Agents
 * Description: Page template without sidebar
 */


get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if( get_field('mh_switch') == true ): ?>
		<section class="lg-masthead" id="agents-section-1">
			<div class="inner">
				<div class="fifty-col left">
					

					<?php if( get_field('featured_switch') == false ): ?>

						<div class="feature loaded" style="background-image:url('<?php the_field( 'featured_img');?>'); background-repeat:no-repeat; background-size: cover;">
							<div class="content-container">
								<h1 class="white"><?php the_field( 'featured_hdr'); ?></h1>
								<p class="white"><?php the_field( 'featured_desc'); ?></p>
								

								<?php if( have_rows('featured_cta_content') ):?>

								 	
									<?php while ( have_rows('featured_cta_content') ) : the_row(); ?>
										
										

										
											<a class="cta <?php the_sub_field( 'cta_color'); ?>" href="<?php the_sub_field( 'cta_link'); ?>"><?php the_sub_field( 'cta_text'); ?></a>
										
									
										

									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					
			
					<?php else : ?>
						<?php

						global $post;
						$args = array( 'posts_per_page' => 1, 'tag' => 'agent-feature' );

						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

						<?php
						$title= get_the_title();
						?>
							<div class="feature loaded" style="background-image:url('<?php echo $image[0]; ?>'); background-repeat:no-repeat; background-size: cover;">
								<div class="content-container">
									<h1 class="white"><?php echo $title;?></h1>
									<p class="white">
										<?php if( get_field('custom_excerpt') == 'yes' ): ?>
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
										
										?>
									</p>
									
									<a class="cta bg-gold" href="<?php the_permalink(); ?>">Read More</a>
								</div>
							</div>
						<?php endforeach; 
						wp_reset_postdata();?>
						
					<?php endif; ?>
					
				</div>
				<div class="fifty-col right">
					<div class="secondary-feature one">
						<div class="content-container">
							<?php the_field( 'sec_content'); ?>	
						</div>
					</div>


							<div class="secondary-feature two">

						

							<div class="content-container">
								<?php the_field('tert_content');?>
								
							</div>
						</div>

						
				</div>
			</div>
		</section>
		<?php endif; ?>	
		
		<?php if( get_field('marketing_switch') == true ): ?>
			<section class="social-section" id="home-section-2">
				<div class="inner">
					<div class="fifty-col left announcements">
						<div class="wrap">
							<h4>Announcements</h4>
							<div class="module">
								
									
										<?php

										global $post;
										$args = array( 'posts_per_page' => 2, 'category' => 44 );

										$myposts = get_posts( $args );
										foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

										<?php
										$title= get_the_title();
										?>
											<div class="fifty-col">
													<div class="content-container">
												
														<a href="<?php the_permalink() ?>"><h4 class="dark-gold"><?php the_title(); ?></h4></a>
														<p><?php if( get_field('custom_excerpt') == 'yes' ): ?>
																	<?php the_field( 'custom_excerpt_text', false, false); ?>
																<?php endif; ?>
																
																<?php
																	if( get_field('custom_excerpt', false, false) == 'no' ){
																		the_excerpt();
																	}
																	if( get_field('custom_excerpt', false, false) == '' ){
																		the_excerpt();
																	}
																/* translators: %s: Name of current post */
																
																?></p>

															</div>
														</div>
										<?php endforeach; 
										wp_reset_postdata();?>
										

									

								
								
								
							</div>
							<a class="cta bg-white" href="/announcements/">View All</a>
						</div>
					</div>

					<div class="fifty-col right social">
						<div class="fifty-col left">
							<div class="wrap">
								<h4>Twitter</h4>
								<div class="module">
										
										
										<a class="twitter-timeline" data-chrome="nofooter noborders transparent noheader" data-lang="en" data-height="274" data-theme="light" data-link-color="#C1AA85" href="https://twitter.com/TXWindstormIns?ref_src=twsrc%5Etfw">Tweets by TXWindstormIns</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
								
									
									
									
								
										
									
								</div>
								<a class="cta bg-white" href="https://twitter.com/TXWindstormIns" target="_blank">View All</a>
							</div>

						</div>

						<div class="fifty-col right">
							<div class="wrap">
							<h4>Facebook</h4>
								<div class="module">
										<div class="content-container">
										
									<div class="fb-page" data-href="https://www.facebook.com/TexasWindstormInsurance/" data-tabs="timeline" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/TexasWindstormInsurance/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TexasWindstormInsurance/">Texas Windstorm Insurance Association</a></blockquote></div>
									
									
									
								
										
									</div>
								</div>
								<a target="_blank" class="cta bg-white" href="https://www.facebook.com/TexasWindstormInsurance/">View All</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php endif; ?>	



		<?php if( have_rows('content_block') ):?>
			<?php 

			$count = 2;
			

			?>

			<?php while ( have_rows('content_block') ) : the_row(); ?>
				<?php
				$count++;
				?>

				<section id="agents-section-<?php echo $count;?>">
					<div class="inner">
						<?php the_sub_field('portal_content_html');?>
					</div>
				</section>
			<?php endwhile; ?>

		<?php endif; ?>	

			

	</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

		
</div><!-- .site-content-contain -->
</div><!-- #page -->		
<?php get_footer(); ?>
