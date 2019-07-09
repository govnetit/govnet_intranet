<?php
	/**
	 * The template for displaying all single posts.
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	 *
	 * @package re17
	 */


	get_header();

	$manager = get_field('hiring_manager');
	$vacancy_url = get_field('vacancy_url');
?>

<section class="page-content">
	<div class="row">
		
	<div class="vacancy-item">
			<div class="inner">
				<div class="vacancy-item--header">
					<h3><?php the_title();?></h3>
				</div>

				<div class="vacancy-item--content">
					<div class="division">
						<span>Division: </span>
						<?php
							$division_list = wp_get_post_terms($post->ID, 'division', array("fields" => "all"));
							foreach($division_list as $division_single) {
							echo $division_single->name; 
						}
						?>
					</div>
					<?php if($manager) { echo '<div class="manager"><span>Hiring Manager: </span>'.$manager.'</div>';} ?>

					<div class="location">
						<?php
							$location_list = wp_get_post_terms($post->ID, 'location', array("fields" => "all"));
							foreach($location_list as $location_single) {
							echo '<span>'.$location_single->name .'</span>'; 
						}
						?>
					</div>
				</div>

				<div class="vacancy-item--footer">
					<div class="view-btn"><?php if($vacancy_url) { echo '<a target="_blank" href="'.$vacancy_url.'">View Vacancy</a>'; } ?></div>
					<div class="contact-btn"><a href="mailto:<?php echo $hr_email;?>?subject=Applying for a vacancy: <?php the_title();?> (<?php echo $division_single->name;?>)">Contact HR Recruitment</a></div>
				</div>
			</div>
		</div>
		
	</div>
</section>


<?php get_footer(); ?>
        