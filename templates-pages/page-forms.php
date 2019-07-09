<?php
/*
Template Name: FORMS
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
			$my_categories = get_terms( 'document-category' );
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
							'post_type' => 'document',
							'order' => 'ASC',
							'orderby' => 'menu_order',
							'post_status' => 'publish',
							'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'document-category',
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
							
								$file_attachment = get_field('file_attachment');
								$file_type = get_field('file_type');
							?>
			
								<li>
									<div class="form-name"><a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a></div>
									<div class="action-buttons">
										
										<?php if($file_attachment && $file_type == "PDF") { ?>
										<div class="action-buttons--view"><a target="_blank" href="<?php echo $file_attachment; ?>">View</a></div>
										<?php } ?>

										<?php if($file_attachment) { ?>
										<div class="action-buttons--download"><a target="_blank" href="<?php echo $file_attachment; ?>" download>Download</a></div>
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
