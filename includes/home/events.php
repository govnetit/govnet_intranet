<?php 
    
			// WP_Query arguments
			$today = date('Y-m-d H:i:s');
			$args = array (
				'post_type'              => array( 'event' ),
				'posts_per_page'         => '3',

				'meta_query' => array(
					array(
						'key'		=> 'event_date',
						'compare'	=> '>',
						'value'		=> $today,
					)       
				),
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {

				while ( $query->have_posts() ) {
					$query->the_post();

		$event_start_date = get_field('event_start_date');	
		$event_end_date = get_field('event_end_date');	
		$event_location = get_field('event_location');
		$event_description = get_field('event_description');		
		?>


		<div class="event-item">
			<div class="event-details">
				<div class="event-date">
					<?php if($event_start_date) { echo $event_start_date; } ?>
					<?php // echo squarecandy_add_to_gcal(get_the_title(), $event_start_date, $event_end_date, $event_description, $event_location); ?>
				</div>
				<div class="event-name">
					<h4>
						<?php the_title();?>
					</h4>
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