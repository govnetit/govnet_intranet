<?php
/*
Template Name: OFFICES
*/

?>

<?php get_header(); ?>
		
<section class="offices-wrap">
	<div class="row">
		<div class="section-header">
			<h1><?php the_title();?></h1>
		</div>	



		<div class="offices-list-wrap">
			<div class="grid offices_container">

			<?php
			// WP_Query arguments
			$args = array(
				'post_type'              => array( 'office' ),
				'posts_per_page'         => '-1',
				'order' => 'ASC',
				'orderby' => 'date',
			);
			// The Query
			$offices = new WP_Query( $args );

			if ( $offices->have_posts() ) {
				while ( $offices->have_posts() ) {
					$offices->the_post(); 
					
					$image = get_field('image');
					$email = get_field('email');
					$phone = get_field('phone');
					$fax = get_field('fax');
					$address = get_field('address');
					$google_maps_address = get_field('google_maps_address');
					?>
					
					<div class="grid__cell 1/2--widescreen 1/2--portable 1/2--pocket 1/1--thumb location-item">
						<div class="inner">
							<div class="location-item--image">
								<?php if($image) {
									$location_img = $image;
								} else {
									$location_img = get_bloginfo('template_url') .'/assets/images/no-office-image.png';
								}
								?>
								<img class="office-image" src="<?php echo $location_img;?>" alt="<?php the_title();?>">	
							</div>
							<div class="location-item--location">
								<div class="left-col">
									<h3><?php the_title();?></h3>
								</div>
								<div class="right-col">
									<?php if($google_maps_address) { echo '<div class="maps_url"><a target="_blank" href="http://maps.google.com/maps?q='. urlencode($google_maps_address) .'">See on Google Maps</a></div>'; } ?>
								</div>
							</div>
							<div class="location-item--info">
								<div class="left-col">
									<?php if($address) { echo '<div class="address">'.$address.'</div>'; } ?>
								</div>
								<div class="right-col">
									<?php if($email) { echo '<div class="contact_details email">Email: '.$email.'</div>'; } ?>
									<?php if($phone) { echo '<div class="contact_details phone">Telephone: '.$phone.'</div>'; } ?>
									<?php if($fax) { echo '<div class="contact_details fax">Fax: '.$fax.'</div>'; } ?>
								</div>
							</div>			
						</div>
					</div>
				
			<?php 
				}

				} else {
				// no posts found
			}
			// Restore original Post Data
			wp_reset_postdata();
			?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
