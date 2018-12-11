<?php
/*
 * Template Name: WPI-3 Application
 * Description: Page template without sidebar
 */


get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
	
		
		<section id="wpi3-section-1">
			<div class="inner">
				<h1 class="animated left">WPI-3 Online Application Form</h1>
				<h2 class="gold animated fade">Application for Certificate of Compliance for Completed Improvement(s) (WPI-8-C)</h2>
				
			</div>
		</section>

		
		<div class="wp-contents">
			<aside class="left-side-nav">
				<div class="container box">
					<ul>
						<li class="active"><button data-anchor="general">General</button></li>
						<li><button data-anchor="location">Location of the Improvement to be certified</button></li>
						<li><button data-anchor="owner">Owner</button></li>
						<li><button data-anchor="builder">Builder or contractor who completed the improvement</button></li>
						<li><button data-anchor="inspected-items">Inspected items</button></li>
						<li><button data-anchor="building-code">Building code and wind load design provision used</button></li>
						
						
					</ul>
				</div>
			</aside>

			<section id="wpi3-section-2" class="sidenav-start">
				<div class="inner">
					<div class="wrap">
						<?php echo do_shortcode( '[gravityform id="19" title="true" description="true"]' ); ?>
					</div>
				</div>
			</section>
		</div>



		

		

		
		
		

		
	
	</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

		
</div><!-- .site-content-contain -->
</div><!-- #page -->	
	
<?php get_footer(); ?>
