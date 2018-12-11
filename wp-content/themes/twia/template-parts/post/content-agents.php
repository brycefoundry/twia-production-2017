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


	
		<div class="box">
			<a href="<?php the_permalink(); ?>"z><?php the_title( '<h4 class="entry-title dark-gold">', '</h4>' );?></a>
			<h6><?php the_field('street'); ?>&nbsp;<?php the_field('city'); ?>,<?php the_field('state'); ?>&nbsp;<?php 	$myString = get_field('zipcode'); 
				
				$result = substr($myString, 0, 5); 
				
				echo $result;  ?></h6>

			<?php if( get_field('email') == '' ): ?>
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


				

				$phoneNumber = get_field('phone');


				

				
			    $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

			    if(strlen($phoneNumber) > 10) {
			        $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
			        $areaCode = substr($phoneNumber, -10, 3);
			        $nextThree = substr($phoneNumber, -7, 3);
			        $lastFour = substr($phoneNumber, -4, 4);

			        $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
			        echo $phoneNumber;
			    }
			    else if(strlen($phoneNumber) == 10) {
			        $areaCode = substr($phoneNumber, 0, 3);
			        $nextThree = substr($phoneNumber, 3, 3);
			        $lastFour = substr($phoneNumber, 6, 4);

			        $phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
			        echo $phoneNumber;
			    }
			    else if(strlen($phoneNumber) == 7) {
			        $nextThree = substr($phoneNumber, 0, 3);
			        $lastFour = substr($phoneNumber, 3, 4);

			        $phoneNumber = $nextThree.'-'.$lastFour;

			        echo $phoneNumber;
			    }

				    


			


				?>
			<?php endif; ?>

			<?php if( get_field('fax') == '' ): ?>
			
			<?php else: ?>	
			&nbsp;<strong>Fax:</strong> &nbsp;<?php 


				

				$phoneNumber = get_field('fax');


				

				
			    $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

			    if(strlen($phoneNumber) > 10) {
			        $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
			        $areaCode = substr($phoneNumber, -10, 3);
			        $nextThree = substr($phoneNumber, -7, 3);
			        $lastFour = substr($phoneNumber, -4, 4);

			        $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
			        echo $phoneNumber;
			    }
			    else if(strlen($phoneNumber) == 10) {
			        $areaCode = substr($phoneNumber, 0, 3);
			        $nextThree = substr($phoneNumber, 3, 3);
			        $lastFour = substr($phoneNumber, 6, 4);

			        $phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
			        echo $phoneNumber;
			    }
			    else if(strlen($phoneNumber) == 7) {
			        $nextThree = substr($phoneNumber, 0, 3);
			        $lastFour = substr($phoneNumber, 3, 4);

			        $phoneNumber = $nextThree.'-'.$lastFour;

			        echo $phoneNumber;
			    }

				    


			


				?>
			<?php endif; ?>
			



			
		</div>


		
		
		
	


	


