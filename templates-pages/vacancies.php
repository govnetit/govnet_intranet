<?php
/*
Template Name: VACANCIES
*/

$hr_email = get_field('hr_email','option')
?>

<?php get_header(); ?>
		
<section class="vacancies-wrap">
	<div class="row">
		<div class="section-header">
			<h1><?php the_title();?></h1>
		</div>	

		<div class="filter-options">
			<div class="tabs cat_filter">
				<ul>
					<li data-filter="*" class="active">Show All Locations</li>
					<li data-filter=".london">London</li>
					<li data-filter=".manchester">Manchester</li>
					<li data-filter=".birmingham">Birmingham</li>
					<li data-filter=".blackburn">Blackburn</li>
				</ul>
			</div>
		</div>


		<div class="vacancies-list-wrap">
			<div class="vacancies_container">

			<?php
			// WP_Query arguments
			$args = array(
				'post_type'              => array( 'vacancy' ),
				'posts_per_page'         => '-1',
				'order' => 'ASC',
				'orderby' => 'date',
			);
			// The Query
			$vacancies = new WP_Query( $args );

			if ( $vacancies->have_posts() ) {
				while ( $vacancies->have_posts() ) {
					$vacancies->the_post(); 
					
					$manager = get_field('hiring_manager');
					$vacancy_url = get_field('vacancy_url');
					?>
					
				<div class="vacancy-item filter <?php $location_list = wp_get_post_terms($post->ID, 'location', array("fields" => "all")); foreach($location_list as $location_single) { echo $location_single->slug .' '; } ?>">
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

<script src="<?php echo get_bloginfo('template_url') .'/assets/js/jquery.isotope.min.js';?>"></script>
<script>
jQuery(window).load(function(){
    var $container = jQuery('.vacancies_container');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
 
    jQuery('.cat_filter li').click(function(){
        jQuery('.cat_filter .active').removeClass('active');
        jQuery(this).addClass('active');
 
        var selector = jQuery(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});
</script>

<?php get_footer(); ?>
