<?php 
	$current_month = date('m');
	$filter_month = $current_month; // show current month only

	$args = array (
		'post_type'      => 'team-member', 
		'posts_per_page' => -1,
		'meta_key'       => 'birthday_short',
		'orderby'        => 'meta_value_num',
		'order'          => 'ASC',
		'meta_query' => array(
			array(
				'key'      => 'birthday',
				'compare'  => 'REGEXP',
				'value'    => '[0-9]{4}' . $filter_month . '[0-9]{2}',
			),    
		)
	);

	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() ) {

		while ( $query->have_posts() ) {
			$query->the_post();

			$avatar = get_field('photo');	
			
			if($avatar) {
				$user_photo = $avatar;
			} else {
				$user_photo = get_bloginfo('template_url').'/assets/images/no-avatar.png';
			}

			$birthday = get_field('birthday');

			$birthDate = $birthday;
			//explode the date to get month, day and year
			$birthDate = explode("/", $birthDate);
			//get age from date or birthdate
			$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
				? ((date("Y") - $birthDate[2]) - 1)
				: (date("Y") - $birthDate[2]));
			?>


		<div class="grid__cell 1/2--widescreen 1/2--portable 1/2--pocket 1/1--thumb birthday-item">
			<div class="inner">
				<div class="avatar">
					<img src="<?php echo $user_photo; ?>" class="avatar-image">
				</div>

				<div class="team-member-details">
					<div class="team-member-name">
						<h4>
							<?php the_title();?>
							<?php if($birthday) { echo '<span class="age">('. $age .')</span>'; } ?>
						</h4>
					</div>

					<div class="team-member-birthday">
						<?php if($birthday) { 
							$date = str_replace('/', '-', $birthday );
							$newDate = date("F j", strtotime($date));
							echo $newDate;
						} ?>
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