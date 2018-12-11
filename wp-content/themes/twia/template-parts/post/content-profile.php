<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage twia
 * @since 1.0
 * @version 1.2
 */

?>

	<?php

$location = get_field("location");
$loclat = $location['lat'];
$loclng = $location['lng'];



	?>	


			<div class="third-col left-30">

				<div class="profile-image-container">
					<div class="acf-map">

								
								<?php if( get_field('lat') != ''): ?>

								
					            	 <div class="marker" data-lat="<?php echo the_field('lat'); ?>" data-lng="<?php the_field('lng'); ?>">
					             

								</div>

								<?php elseif($loclat !=''): ?>
					            	 <div class="marker" data-lat="<?php echo $loclat;?>" data-lng="<?php echo $loclng; ?>">
					             

								</div>

								<?php endif; ?>
					</div>
				</div>
			</div>
									
			<div class="third-col right-70">
				<div class="content-container">
				<a class="cta bg-gold" href="/property-owners/find-agent/">Back to List</a><?php the_title( '<h1 class="entry-title">', '</h1>' );?>
				<hr>
				<h6><?php the_field('street'); ?><br /><?php the_field('city'); ?>,&nbsp;<?php the_field('state'); ?>&nbsp;<?php 


				$myString = get_field('zipcode'); 
				
				$result = substr($myString, 0, 5); 
				
				echo $result; 

				?></h6>
				<p><?php if( get_field('email') == '' ): ?>
				<?php else: ?>	
				<strong>Email:</strong>&nbsp;<a href="mailto:<?php 

				$email_var = the_field('email');
				$res = preg_replace("/[^a-zA-Z]/", "", $emailvar);
				echo $res;
				?>">
				
				<?php

				$email_var = the_field('email');
				

				$res = preg_replace("/[^a-zA-Z]/", "", $emailvar);
				echo $res;
				
				?>
				</a>
				<?php endif; ?>


				<?php if( get_field('phone') == '' ): ?>
				
				<?php else: ?>	
				&nbsp;<strong>Phone:</strong> &nbsp;<?php 


				

				$data = get_field('phone');


			

				function formatPhoneNumber($phoneNumber) {
				    $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

				    if(strlen($phoneNumber) > 10) {
				        $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
				        $areaCode = substr($phoneNumber, -10, 3);
				        $nextThree = substr($phoneNumber, -7, 3);
				        $lastFour = substr($phoneNumber, -4, 4);

				        $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
				    }
				    else if(strlen($phoneNumber) == 10) {
				        $areaCode = substr($phoneNumber, 0, 3);
				        $nextThree = substr($phoneNumber, 3, 3);
				        $lastFour = substr($phoneNumber, 6, 4);

				        $phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
				    }
				    else if(strlen($phoneNumber) == 7) {
				        $nextThree = substr($phoneNumber, 0, 3);
				        $lastFour = substr($phoneNumber, 3, 4);

				        $phoneNumber = $nextThree.'-'.$lastFour;
				    }

				    echo $phoneNumber;
				}


				formatPhoneNumber($data);


				?>
				<?php endif; ?>

				<?php if( get_field('fax') == '' ): ?>
				
				<?php else: ?>	
				&nbsp;<strong>Fax:</strong> &nbsp;<?php 

				$data = get_field('fax'); 

				formatPhoneNumber($data);

				?>
				<?php endif; ?></p>
				</div>
			</div>					
			
							
					

		
		
		
	


	


