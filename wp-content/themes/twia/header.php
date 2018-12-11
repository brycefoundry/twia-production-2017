<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage twia
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_enqueue_script("jquery"); ?>
<title>Texas Windstorm Insurance Association - TWIA</title>
<?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div class="loader-container">
		<div class="cs-loader">
		  <div class="cs-loader-inner">
		    <label>	●</label>
		    <label>	●</label>
		    <label>	●</label>
		    <label>	●</label>
		    <label>	●</label>
		    <label>	●</label>
		  </div>
		</div>
	</div>
<div id="page" class="site">
	

	<header id="masthead" class="site-header" role="banner">
		
		<div class="nav-top-bar">
			<div class="inner">
				<div class="logo-container">
					<a href="/" class="logo">
						
					</a>

					


				</div>

				<div class="nav-container">
					<div class="phone">
						<h6 class="">Questions? Call Us: 800-788-8247</h6>
						
					</div>

					<ul id="nav-links">

					

						<?php if(is_front_page()) : ?>
						<li class="active" >
						<?php elseif( $post->post_parent == '2050' ): ?>
						<li class="active" >
						<?php elseif( is_post_type_archive('find_agent') ): ?>
						<li class="active" >
						<?php elseif ( is_singular( 'find_agent' ) ):?>
						<li class="active" >
						<?php else :?>
						<li>
						<?php endif; ?>
					
							<a href="/">
								<h6>Property Owners</h6>
							</a>
							<div class="mobile">
								

								<?php if( have_rows('nav_contents', 2050) ):?>

							 	
							   <?php while ( have_rows('nav_contents', 2050) ) : the_row(); ?>
									   	<div class="wrap">
											<a href="<?php the_sub_field('subnav_link', 2050);?>"><h4><?php the_sub_field('sub_nav_label', 2050);?></h4></a>
											<?php if( get_sub_field('dd_switch') == true ): ?>
												<?php the_sub_field('subnav_col_2', 2050);?>
												<?php the_sub_field('subnav_col_3', 2050);?>
											<?php endif; ?>
									   	</div>
							   	<?php endwhile; ?>
							   
							    <?php endif; ?>


								
							</div>

							<button class="mobile-expand-btn"></button>
							
						</li>
						<?php if(is_page_template( 'layout/agents.php' )) : ?>
						<li class="active" >
						<?php elseif( $post->post_parent == '2048' ): ?>
						<li class="active" >


						<?php else : ?>
						<li>
						<?php endif; ?>
							<a href="/agents/">
								<h6>Agents</h6>
							</a>

							<div class="mobile">
								

								<?php if( have_rows('nav_contents', 2048) ):?>

							 	
							   <?php while ( have_rows('nav_contents', 2048) ) : the_row(); ?>
									   	<div class="wrap">
											<a href="<?php the_sub_field('subnav_link', 2048);?>"><h4><?php the_sub_field('sub_nav_label', 2048);?></h4></a>
											<?php if( get_sub_field('dd_switch') == true ): ?>
												<?php the_sub_field('subnav_col_2', 2048);?>
												<?php the_sub_field('subnav_col_3', 2048);?>
											<?php endif; ?>
									   	</div>
							   	<?php endwhile; ?>
							   
							    <?php endif; ?>


								
							</div>

							<button class="mobile-expand-btn"></button>
						</li>
						<?php if(is_page_template( 'layout/windstorm.php' )) : ?>
						<li class="active" >
						<?php elseif( $post->post_parent == '7846' ): ?>
						<li class="active" >
						<?php else : ?>
						<li>
						<?php endif; ?>
							<a href="/windstorm-certification/">
								<h6>Windstorm Certification</h6>
							</a>

							<div class="mobile">
								

								<?php if( have_rows('nav_contents', 7846) ):?>

							 	
							   <?php while ( have_rows('nav_contents', 7846) ) : the_row(); ?>
									   	<div class="wrap">
											<a href="<?php the_sub_field('subnav_link', 7846);?>"><h4><?php the_sub_field('sub_nav_label', 7846);?></h4></a>
											<?php if( get_sub_field('dd_switch') == true ): ?>
												<?php the_sub_field('subnav_col_2', 7846);?>
												<?php the_sub_field('subnav_col_3', 7846);?>
											<?php endif; ?>
									   	</div>
							   	<?php endwhile; ?>
							   
							    <?php endif; ?>


								
							</div>
							<button class="mobile-expand-btn"></button>
						</li>
						<?php if(is_page_template( 'layout/about.php' )) : ?>
						<li class="active" >
						<?php elseif( $post->post_parent == '2418' ): ?>
						<li class="active" >
						<?php else : ?>
						<li>
						<?php endif; ?>
							<a href="/about-us/">
								<h6>About Us</h6>
							</a>

							<div class="mobile">
								

								<?php if( have_rows('nav_contents', 2418) ):?>

							 	
							   <?php while ( have_rows('nav_contents', 2418) ) : the_row(); ?>
									   	<div class="wrap">
											<a href="<?php the_sub_field('subnav_link', 2418);?>"><h4><?php the_sub_field('sub_nav_label', 2418);?></h4></a>
											<?php if( get_sub_field('dd_switch') == true ): ?>
												<?php the_sub_field('subnav_col_2', 2418);?>
												<?php the_sub_field('subnav_col_3', 2418);?>
											<?php endif; ?>
									   	</div>
							   	<?php endwhile; ?>
							   
							    <?php endif; ?>


								
							</div>
							<button class="mobile-expand-btn"></button>
						</li>
						
						<li class="login">
							
								<h6>Login</h6>
								<select class="login-dropdown" onchange="location = this.value;">
								     <option value="" selected="selected" style="display:none;"></option>
								    <option value="https://policy.twia.org/loginPage">Policyholder</option>
								    <option value="https://portal.twia.org/twia/do/login">Agent</option>
								    <option value="/adjuster-login/">Adjuster</option>
								</select>
							
						</li>
					</ul>
				</div>

			
			</div>
		</div>
		

		<div class="nav-rich-bar">
			<div class="inner">
				<div class="rich-nav-container">
					<ul id="rich-nav-links">
						<?php 
							if ( is_front_page()) {
								include 'template-parts/nav-bar/links-home.php'; 
							}
							elseif( $post->post_parent == '2050' ){
								include "template-parts/nav-bar/links-home.php"; 
							}
						
							elseif( is_post_type_archive('find_agent') ){
								include "template-parts/nav-bar/links-home.php"; 
							}

							elseif( is_singular( 'find_agent' ) ){
								include "template-parts/nav-bar/links-home.php"; 
							}
						
						elseif ( is_page_template( 'layout/about.php' ) ) {
						   include 'template-parts/nav-bar/links-about.php'; 
						} 
						elseif( $post->post_parent == '2418' ){
						  include 'template-parts/nav-bar/links-about.php'; 
						}

						
						elseif ( is_page_template( 'layout/agents.php' ) ) {
						   include 'template-parts/nav-bar/links-agents.php'; 
						} 
						elseif( $post->post_parent == '2048' ){
						  include 'template-parts/nav-bar/links-agents.php';
						}
						

						
						elseif ( is_page_template( 'layout/windstorm.php' ) ) {
						   include 'template-parts/nav-bar/links-windstorm.php'; 
						}
						elseif( $post->post_parent == '7846' ){
						   include 'template-parts/nav-bar/links-windstorm.php'; 
						}

						elseif ( is_page_template( 'layout/contact.php' ) ) {
						   include 'template-parts/nav-bar/links-contact.php'; 
						}

						else{
							include 'template-parts/nav-bar/links-all.php';
						}

						

						?>
					</ul>
				</div>

				<div class="search-container">
					<?php echo do_shortcode( '[searchandfilter id="13068"]' ); ?>
				</div>
			</div>
		</div>

		<div id="menu-btn-container">
			
			<div id="menu-btn">

			  <span></span>
			  <span></span>
			  <span></span>
			</div>
			<h5>Menu</h5>
		</div>
		
	</header><!-- #masthead -->
	
	<div class="nav-rich-contents">
		<div class="inner">
			<ul id="nav-rich-dropdowns">
				<?php 
					if ( is_front_page()) {
						include 'template-parts/dropdowns/menu-home.php'; 
					}

					if( $post->post_parent == '2050' ){
						include 'template-parts/dropdowns/menu-home.php'; 
					}

					if( is_post_type_archive('find_agent') ){
						include 'template-parts/dropdowns/menu-home.php'; 
					}
					if( is_singular( 'find_agent' ) ){
						include 'template-parts/dropdowns/menu-home.php'; 
					}
				?>

				<?php
				if ( is_page_template( 'layout/about.php' ) ) {
				   include 'template-parts/dropdowns/menu-about.php'; 
				}

				if( $post->post_parent == '2418' ){
					include 'template-parts/dropdowns/menu-about.php'; 
				}

				?>

				<?php
				if ( is_page_template( 'layout/agents.php' ) ) {
				   include 'template-parts/dropdowns/menu-agents.php'; 
				}

				if( $post->post_parent == '2048' ){
					include 'template-parts/dropdowns/menu-agents.php'; 


				}
				?>

				<?php
				if ( is_page_template( 'layout/windstorm.php' ) ) {
				   include 'template-parts/dropdowns/menu-windstorm.php'; 
				}
				if( $post->post_parent == '7846' ){
					include 'template-parts/dropdowns/menu-windstorm.php'; 
				}
				?>

				<?php
				if ( is_page_template( 'layout/contact.php' ) ) {
				   include 'template-parts/dropdowns/menu-contact.php'; 
				}
				?>
			</ul>
		</div>
	</div>
	

	<div class="site-content-contain">
		<div id="content" class="site-content">
