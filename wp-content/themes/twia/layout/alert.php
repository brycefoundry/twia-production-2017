


<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


$args['post_type'] = 'alerts';
$args['posts_per_page'] = '1';
$args['paged'] = $paged;
$args['page-status'] = 'published';

?>


<?php query_posts($args); //set p=x where x is post id of post you want to see or use query_posts('cat=1&posts_per_page=1); to show one post from Category 1
if (have_posts()) : ?>	


<?php while (have_posts()) : the_post(); 

$title= get_the_title();

?>

<?php if( get_field('status') == 'active' ): ?>

	

	<?php if(get_field('alert_type')=='modal'): ?>
		
	
<div class="alert-container">
<div class="alert box">
	
	<div class="header">
		<h3 class="dark-blue"><?php the_title();?></h3>
		
	</div>
	<?php if(get_field('background_image')===null): ?>
	<div class="top no-shadow" style="background-color: <?php the_field('background_color');?>;background-image:url('<?php the_field('background_image');?>');">
	<?php else: ?>
	<div class="top" style="background-color: <?php the_field('background_color');?>;background-image:url('<?php the_field('background_image');?>');">
	<?php endif; ?>
		<div class="icons icon-<?php the_field('icon');?>" style="color: <?php the_field('icon_color_picker');?>;">
			
		</div>
	</div>

	<div class="content">
		<?php if( get_field('severity_bar_switch') == 'on' ): ?>
		<div class="rating">
			
			<h6>Severity Rating:</h6>
			<select id="severity-bar">
			<?php if( get_field('severity') == '1' ): ?>
				<option value="1" selected="selected">1</option>
			<?php else: ?>
				<option value="1">1</option>	
			<?php endif; ?>

			<?php if( get_field('severity') == '2' ): ?>
				<option value="2" selected="selected">2</option>
			<?php else: ?>
				<option value="2">2</option>	
			<?php endif; ?>

			<?php if( get_field('severity') == '3' ): ?>
				<option value="3" selected="selected">3</option>
			<?php else: ?>
				<option value="3">3</option>	
			<?php endif; ?>

			<?php if( get_field('severity') == '4' ): ?>
				<option value="4" selected="selected">4</option>
			<?php else: ?>
				<option value="4">4</option>	
			<?php endif; ?>

			<?php if( get_field('severity') == '5' ): ?>
				<option value="5" selected="selected">5</option>
			<?php else: ?>
				<option value="5">5</option>	
			<?php endif; ?>
			 
			  
			 
			</select>
		</div>
		<?php endif; ?>

		<?php the_content();?>
		<div class="calls">
		<?php if( have_rows('call_to_actions') ):?>
		
		<?php while ( have_rows('call_to_actions') ) : the_row(); ?>
			<a class="cta bg-blue" href="<?php the_sub_field('cta_link');?>"><?php the_sub_field('cta_text');?></a>
		<?php endwhile; ?>
		<?php endif; ?>
		</div>
		


	</div>


	

<button class="close-btn">X</button>

</div>
</div>

<?php endif; ?>
<?php if(get_field('alert_type')=='fixed'): ?>

<div class="alert-fixed-container">
	<div class="alert-fixed inner">
		<div class="icons icon-<?php the_field('icon');?>" style="color: <?php the_field('icon_color_picker');?>;">
			
		</div>

		<div class="content">
			<?php the_content();?>
		</div>

		<button class="close-btn">X</button>
	</div>
</div>


<?php endif; ?>	

<?php endif; ?>	


<?php endwhile; ?>







<?php wp_reset_postdata(); ?>

<?php else : ?>
	
<?php endif; ?>	