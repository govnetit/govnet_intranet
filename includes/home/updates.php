<div class="company-updates">
	<div class="row">

		<div class="section-header">
			<div class="section-title">
				<h2>Company Updates</h2>

				<a class="view-updates" href="<?php bloginfo('url');?>/company-updates/">View previous updates</a>
			</div>
		</div>



		<div class="company-updates-featured">
			<div class="wrap">
				<?php

				// WP_Query arguments
				$currentID = get_the_ID();
				$args = array(
					'post_type'              => array( 'post' ),
					'posts_per_page'         => '1',
					'order'                  => 'DESC',
					'orderby'                => 'date',
					'tax_query'              => array(
						array(
							'taxonomy' => 'category',
							'terms' => array('featured'),
							'field' => 'slug',
							'operator' => 'IN',
						)
					)
				);

				// The Query
				$query = new WP_Query( $args );

				$i = 0;		
				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post(); $i++;
				?>
				

				<div class="single-post-item">
					<div class="grid">

						<?php if ( has_post_thumbnail() ) { 
							// get the src of the post thumbnail
							$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );        
							$background = $src[0]; 
						} else {
							$background = get_bloginfo('template_directory') .'/assets/images/no-image.png';
						}
						?>
						<div class="grid__cell 7/12--widescreen 7/12--portable 7/12--pocket 1/1--thumb update_image">
						<a href="<?php the_permalink();?>" title="<?php the_title();?>">
							<div class="background-image-wrap">
								<div class="background-image" style="background-image:url(<?php echo $background;?>);"></div>
							</div>	
						</a>
						</div>

						<div class="grid__cell 5/12--widescreen 5/12--portable 5/12--pocket 1/1--thumb update_desc">
							<div class="inner">
								<div class="post-title">
									<div class="post-title--meta">
										<div class="post-title--featured">Featured</div>

										<div class="post-date">
											<span><?php the_time( 'F d, Y' ); ?></span>
										</div>
									</div>	
							
									<h4><?php the_title();?></h4>
								</div>

								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<div class="read-more-link">Read More</div>
								</a>
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

		
		
		<div class="company-updates-rest">
			<div class="grid">
				<?php

				// WP_Query arguments
				$currentID = get_the_ID();
				$args = array(
					'post_type'              => array( 'post' ),
					'posts_per_page'         => '3',
					'order'                  => 'DESC',
					'orderby'                => 'date',
					'tax_query'              => array(
						array(
							'taxonomy' => 'category',
							'terms' => array('featured'),
							'field' => 'slug',
							'operator' => 'NOT IN',
						)
					)
				);

				// The Query
				$query = new WP_Query( $args );

				$i = 0;		
				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post(); $i++;
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
</div>
