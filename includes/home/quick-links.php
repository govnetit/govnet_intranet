<section class="home-portfolio-wrap underlay" data-jq-clipthru="dark-bg">
	<div class="portfolio-slider carousel">
		<?php 
    
			// WP_Query arguments
			$args = array (
				'post_type'              => array( 'portfolio' ),
				'order'                  => 'ASC',
				'orderby'                => 'menu_order',
				'posts_per_page'         => '6',
				'offset'                 => '0',

				'tax_query' => array(
				array(
					'taxonomy' => 'portfolio-category',
					'field' => 'slug',
					'terms' => 'web-design'
				)
			),
			'meta_query' => array(
				array(
				   'key' => 'show_on_homepage',
				   'value' => 'Yes',
				   //'compare' => 'LIKE'
				),

				array(
					'key' => 'coming_soon',
				   'value' => 'Yes',
				   'compare' => 'NOT LIKE'
				)
			)
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {

				while ( $query->have_posts() ) {
					$query->the_post();

		$image_square = get_field('portfolio_item_desktop_image_home');			
		$bg_position = get_field('item_background_position');
		$item_desc = get_field('portfolio_item_description');
		$coming_soon = get_field('coming_soon');
		$item_desc = get_field('portfolio_item_description');		
		$client_logo = get_field('client_logo');
		?>


		<div class="portfolio-item slide carousel-cell">
			<a href="<?php the_permalink();?>" class="selector">
				<div class="portfolio-item-inner">
					<div class="background-image" style="background-image: url('<?php echo $image_square['url'];?>');"></div>

					<div class="section-wrapper">
						<div class="portfolio-item-title">
							<div class="text-placement">
								
								<?php /*if($client_logo) { ?>
									<div class="logo_item">
										<img src="<?php echo $client_logo;?>" alt="<?php the_title();?>">
									</div>
								<?php } */?>
								
								<div class="project-specification">
								<?php $proj_desc = get_field('portfolio_item_description', get_the_ID()); if($proj_desc) { echo '<div class="project_description">'.$proj_desc.'</div>'; }?>
								</div>

								<h2 class="portfolio-name"><?php the_title();?>.</h2>
							</div>
						</div>
					</div>
				</div>
			</a>
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
</section>	
  

<script>
jQuery(document).ready(function(){new Flickity(".portfolio-slider",{wrapAround:!0,cellAlign: 'left',autoPlay:!0,groupCells:!1,prevNextButtons:!1,pageDots:!1,resize:!0})});
</script>