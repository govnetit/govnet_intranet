<?php
/*
Template Name: NEWS
*/
?>

<?php get_header(); ?>
		
		
<section class="news-section">
	<div class="row">
		<div class="section-header">
			<h1><?php the_title();?></h1>
		</div>
	</div>

	<div class="row">
		<div class="news-wrapper grid">
			<?php
			// WP_Query arguments
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
				'post_type'              => array( 'post' ),
				'posts_per_page'         => '12',
				'order' => 'DESC',
				'orderby' => 'date',
				'paged' => $paged
			);
			// The Query
			$wp_query = new WP_Query( $args );

			if ( $wp_query->have_posts() ) :
				while ( $wp_query->have_posts() ) :
					$wp_query->the_post(); 

					$image = get_field('article_image');
					
					?>
					
				<div class="grid__cell 1/3--widescreen 1/3--portable 1/3--pocket 1/1--thumb article-item <?php $a_cats = wp_get_post_terms($post->ID, 'category', array("fields" => "all")); foreach($a_cats as $a_cat) { echo $a_cat->slug.' '; } ?>">
					<a href="<?php the_permalink();?>">
						<div class="inner">
							<div class="article-item--image">
								<div class="article-item--content--cat">
									<?php
										$a_cats = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
										foreach($a_cats as $a_cat) {
										echo '<span class="'.$a_cat->slug.'">'.$a_cat->name.'</span>'; 
									}
									?>
								</div>

								<?php if ( has_post_thumbnail() ) { 
									// get the src of the post thumbnail
									$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news-update-standard' );        
									$thumbnailSrc = $src[0]; 

									$width = 800;
									$height = 500;
									$crop = true;
									$retina = false;

								// Call the resizing function (returns an array)
								$image = erikreart_image_resize( $thumbnailSrc, $width, $height, $crop, $retina );
								?>
								<img class="article-image" src="<?php echo $image['url']; ?>" alt="<?php the_title();?>">  

								<?php } else { ?>
								<img src="<?php bloginfo('template_directory'); ?>/assets/images/no-article-image.png" alt="<?php the_title();?>">
								<?php } ?>	
							</div>

							<div class="article-item--content">
								<div class="article-item--content--title"><h3><?php the_title();?></h3></div>	

								<div class="article-item--content--date">
									<span class="date"><?php the_time( 'F d, Y' ); ?></span>
								</div>
							</div>
						</div>
					</a>
				</div>

			<?php endwhile; ?>


			<?php
			else:
				// no posts found
			endif;
			// Restore original Post Data
			govnet_pagination();
			wp_reset_postdata();

			?>
		</div>
	</div>
</section>		
		

<?php get_footer(); ?>
