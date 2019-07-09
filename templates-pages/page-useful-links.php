<?php
/*
Template Name: USEFUL LINKS
*/
?>

<?php get_header(); ?>
		
<section class="forms-section">
	<div class="row">
		<div class="section-header">
			<h1><?php the_title();?></h1>
		</div>	
	</div>

	<div class="forms-list-wrap">
		<div class="row">
		<?php 
			$my_categories = get_terms( 'link-category' );
			$my_categories_count = count( $my_categories );
			if ( $my_categories_count > 0 && is_array( $my_categories ) ) {
				echo '<div class="wrap">';
				foreach ( $my_categories as $single_cat ) { ?>
					<div class="forms-group">
					<div class="forms-group--header">
						<div class="h-title"><h2><?php echo $single_cat->name; ?></h2></div>
						<div class="h-text">Action</div>
					</div>
					
					
					<?php
						$cat_posts_args = array(
							'post_type' => 'useful-link',
							'order' => 'ASC',
							'orderby' => 'menu_order',
							'post_status' => 'publish',
							'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'link-category',
									'field' => 'id',
									'terms' => $single_cat->term_id,
									'include_children' => false
								)
							)
						);
						$cat_posts = new WP_Query( $cat_posts_args );
						if ( $cat_posts->have_posts() ) :
							echo '<div class="forms-list-ul"><ul>';
							while ( $cat_posts->have_posts() ) : $cat_posts->the_post(); 
							
								$link_url = get_field('link_url');
							?>
			
								<li>
									<div class="form-name"><a target="_blank" href="<?php echo $link_url; ?>"><span><?php the_title(); ?></span></a></div>
									<div class="action-buttons">
							

										<?php if($link_url) { ?>
										<div class="action-buttons--visit"><a target="_blank" href="<?php echo $link_url; ?>">Visit Site</a></div>
										<?php } ?>
									</div>
								</li>
			
							<?php endwhile;
							echo '</ul></div>';
						else :
							if ( !$parent ) echo '<p>No forms found.</p>';
						endif;
						wp_reset_postdata();

						echo '</div>';
					} // end foreach
				echo '</div>';
			}
		?>
			
		</div>	
	</div>
</section>

<?php get_footer(); ?>
