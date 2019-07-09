<?php
	/**
	 * The template for displaying all single posts.
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	 *
	 * @package re17
	 */


	get_header();

	$image = get_field('image');
	$email = get_field('email');
	$phone = get_field('phone');
	$fax = get_field('fax');
	$address = get_field('address');
	$google_maps_address = get_field('google_maps_address');

	if($image) {
		$location_img = $image;
	} else {
		$location_img = get_bloginfo('template_url') .'/assets/images/no-office-image.png';
	}
	
?>

<div itemscope itemtype="http://schema.org/Article" class="hero-section banner-header full-height">
	<div class="bg-parallax parallax" style="background-image: url(<?php echo $location_img;?>);">
		<meta itemprop="image" content="<?php echo $location_img;?>">
	</div>
</div>

<section class="page-content">
	<div class="row">
		
	
		<div class="grid__cell 1/1--widescreen 1/2--portable 1/1--pocket 1/1--thumb location-item">
			<div class="inner">
				<div class="location-item--location">
					<div class="left-col">
						<h3><?php the_title();?> office</h3>
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

	</div>	
</section>


<?php get_footer(); ?>
        