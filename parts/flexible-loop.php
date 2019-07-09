<?php
// check if the flexible content field has rows of data
if( have_rows('content_blocks') ):

     // loop through the rows of data
    while ( have_rows('content_blocks') ) : the_row();

		//Hero block
        if( get_row_layout() == 'hero' ):

        	//Slides
        	if ( have_rows( 'slides' ) ) : ?>
        		<section id="hero">
        			<div class="slickslider">
	        			<?php while ( have_rows( 'slides' ) ) : the_row(); ?>
							<?php 
							$image = get_sub_field('image');
							$size = 'large'; // (thumbnail, medium, large, full or custom size)
							$image_attributes = wp_get_attachment_image_src( $image, $size ); ?>
	        				<div class="bh cover-bg" style="background-image: url(<?php echo $image_attributes[0]; ?>);">
	        					<div class="slide-content">
	        						<div class="slide-content-inner">
		        						<div class="inner-wrap">
		        						<?php
		        						global $post;
											if ($post->post_parent == 7) { ?>
												<a class="back-link wow fadeInLeft" href="<?php echo home_url( '/' ); ?>services" title="Back to all services"><i class="fa fa-angle-left"></i>Back to all services</a>
											<?php }
										?>	        						
										<h2 class="wow fadeInLeft"><?php the_sub_field( 'title' ); ?></h2>
		        						<?php if(get_sub_field('text')) { ?>
											<p class="wow fadeInLeft"><?php the_sub_field( 'text' ); ?></p>
		        						<?php } ?>
		        						<?php if(get_sub_field('button_text')) { ?>
		        							<a class="button wow fadeInLeft" href="<?php the_sub_field('button_link'); ?>" title="<?php the_sub_field('button_text'); ?>"><?php the_sub_field('button_text'); ?></a>
		        						<?php } ?>
										</div>
		        					</div>
	        					</div>
	        				</div>
	        			<?php endwhile; ?>
        			</div>
        			<div id="hero-arrows" class="wow fadeInRight"></div>
        			<a class="next-section-toggle wow fadeInDown" href="#next-section" title="">
        				<i class="fa fa-angle-down"></i>
        			</a>
        		</section>
        		

        		<div id="next-section"></div>

        	<?php endif; ?>

        <?php 
		/*
		* SIMPLE TEXT BLOCK
		* SUBTITLE, TITLE, COPY
		*/

		elseif( get_row_layout() == 'simple_text_block' ): ?>

        	<section class="page-block simple-text-block">
				<div class="container">
					<div class="row">
						<article class="text-block centered">
							<?php if(get_sub_field('title')) { ?>
								<h3 class="subtitle"><?php the_sub_field('title'); ?></h3>
							<?php } ?>
							<?php if(get_sub_field('intro')) { ?>
								<h2 class="title"><?php the_sub_field('intro'); ?></h2>
							<?php } ?>
							<?php if(get_sub_field('copy')) { ?>
								<div class="copy">
									<?php the_sub_field('copy'); ?>
								</div>
							<?php } ?>
							<?php if(get_sub_field('button_text') && get_sub_field('button_link')) { ?>
								<a class="button" href="<?php the_sub_field('button_link'); ?>" title="<?php the_sub_field('button_text'); ?>"><?php the_sub_field('button_text'); ?></a>
							<?php } ?>
						</article>
					</div>
				</div>
        	</section>
        	
       
		<?php 
		/*
		* CLIENTS LOGOS CAROUSEL
		*/
		elseif( get_row_layout() == 'clients_logos' ): ?>

        	<?php if( have_rows('client') ): ?>
				<section class="client-logo-section">
					<div class="row">
						<div class="grid">
							<div class="client-logo-carousel">
								<?php $in = 0; while( have_rows('client') ): the_row(); $in++;
								// vars
								$client_name = get_sub_field('client_name');
								$client_logo = get_sub_field('client_logo');
								?>
								<div class="client-logo-item">
									<img src="<?php echo $client_logo; ?>" alt="<?php echo $client_name; ?>" width="225px" height="80px"/>
								</div>
							<?php endwhile; ?>
							</div>
						</div>
					</div>
				</section>
				<?php endif; ?>
        	
        <?php 
		/*
		* TWO COLUMN LIST
		*/
		elseif( get_row_layout() == 'two_column_list' ): ?>

        	<?php 
			if( have_rows('list_item') ): ?>

			<section class="two-col-list">
				<div class="inner-wrap">
					<div class="row">
						<div class="grid">
						

						<?php while( have_rows('list_item') ): the_row(); 

							// vars
							$cl_name = get_sub_field('title');
							$cl_desc = get_sub_field('description');
							$cl_icon = get_sub_field('image_icon');
							
							?>

							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket list-item">
								<div class="inner">
									<?php if($cl_icon) { ?>
									<div class="icon">
										<img src="<?php echo $cl_icon; ?>">
									</div>
									<?php } ?>

									<?php if($cl_name) { ?>
									<div class="title">
										<h3><?php echo $cl_name; ?></h3>
									</div>
									<?php } ?>
									<?php if($cl_desc) { ?>
									<div class="description">
										<?php echo $cl_desc; ?>
									</div>
									<?php } ?>
								</div>
							</div>

						<?php endwhile; ?>

						</div>
					</div>
				</div>
			</section>
			<?php endif; ?>				
        	

        <?php 
		/*
		* LEFT TEXT - RIGHT IMAGE BLOCK
		*/
		elseif( get_row_layout() == 'text_left_image_right' ): ?>

        	<section class="page-block left_text_right_image">
				<div class="inner-container">
					<div class="row">
						<div class="grid">
							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket column-text">
								<div class="inner_text">
									<div class="inner_padding right aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
										<?php if(get_sub_field('subtitle')) { ?>
										<span class="subtitle"><?php the_sub_field('subtitle'); ?></span>
										<?php } ?>

										<?php if(get_sub_field('title')) { ?>
										<?php $show_line = get_sub_field('show_line'); ?>
										<h3 class="title <?php if($show_line == "Yes") { echo 'line';} ?> left-aligned wow fadeInUp"><?php the_sub_field('title'); ?></h3>
										<?php } ?>
										<?php if(get_sub_field('copy')) { ?>
										<div class="copy">
											<?php the_sub_field('copy'); ?>
										</div>
										<?php } ?>


										<?php 
										$link_text = get_sub_field('link_text');
										$link_url = get_sub_field('link_url');


										if($link_text && $link_url) { 
											echo '<a class="block-link" href="'.$link_url.'">'.$link_text.'</a>';
										}
										?>
									</div>
								</div>
							</div>

							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket column-image">
								<?php 
								$image_src = get_sub_field('image');
								$image_orientation = get_sub_field('image_orientation');

								if($image_src) {
									$l_img = $image_src;
								} else {
									$l_img = get_bloginfo('template_url').'/assets/images/placeholder.jpg';
								}

								// get the src of the post thumbnail
								if($image_orientation == "Landscape") {
									$width = 800;
									$height = 640;
								} elseif($image_orientation == "Portrait") {
									$width = 640;
									$height = 800;
								} else {
									$width = 640;
									$height = 800;	
								}
								
								$crop = true;
								$retina = false;

								$output_image = erikreart_image_resize( $l_img, $width, $height, $crop, $retina );
								?>


								<div class="image-item right aos-init aos-animate" data-aos="image-block-reveal">
									<img src="<?php echo $output_image['url']; ?>" alt=""  itemprop="image">
								</div>
							</div>

						</div>
					</div>

				</div>
        	</section>
		
       
       <?php 
		/*
		* RIGHT TEXT - LEFT IMAGE BLOCK
		*/
		elseif( get_row_layout() == 'text_right_image_left' ): ?>

        	<section class="page-block right_text_left_image">
				<div class="inner-container">
					<div class="row">
						<div class="grid">
						
							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket column-image">
								<?php 
								$image_src = get_sub_field('image');
								$image_orientation = get_sub_field('image_orientation');

								if($image_src) {
									$l_img = $image_src;
								} else {
									$l_img = get_bloginfo('template_url').'/assets/images/placeholder.jpg';
								}

								// get the src of the post thumbnail

								if($image_orientation == "Landscape") {
									$width = 800;
									$height = 640;
								} elseif($image_orientation == "Portrait") {
									$width = 640;
									$height = 800;
								} else {
									$width = 640;
									$height = 800;	
								}
								
								$crop = true;
								$retina = false;

								$output_image = erikreart_image_resize( $l_img, $width, $height, $crop, $retina );
								?>


								<div class="image-item left aos-init aos-animate" data-aos="image-block-reveal">
									<img src="<?php echo $output_image['url']; ?>" alt=""  itemprop="image">
								</div>
							</div>
							
							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket column-text">
								<div class="inner_text">
									<div class="inner_padding left aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
										<?php if(get_sub_field('subtitle')) { ?>
										<span class="subtitle"><?php the_sub_field('subtitle'); ?></span>
										<?php } ?>

										<?php if(get_sub_field('title')) { ?>
										<?php $show_line = get_sub_field('show_line'); ?>
										<h3 class="title <?php if($show_line == "Yes") { echo 'line';} ?> left-aligned wow fadeInUp"><?php the_sub_field('title'); ?></h3>
										<?php } ?>
										<?php if(get_sub_field('copy')) { ?>
										<div class="copy">
											<?php the_sub_field('copy'); ?>
										</div>
										<?php } ?>

										<?php 
										$link_text = get_sub_field('link_text');
										$link_url = get_sub_field('link_url');


										if($link_text && $link_url) { 
											echo '<a class="block-link" href="'.$link_url.'">'.$link_text.'</a>';
										}
										?>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
        	</section>
        	
        <?php 
		/* 
		* TWO COLUMN TEXT
		*/
		elseif( get_row_layout() == 'two_text_columns' ): ?>

        	<section class="page-block two-text-columns">
        		<div class="inner-container">
        			<div class="row"> 
						<div class="grid">
							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket">
								<?php if(get_sub_field('left_column_text')) { ?>
									<div class="col_text_inner" data-aos="fade-up" data-aos-duration="2000" data-aos-offset="0">
									<?php the_sub_field('left_column_text'); ?>
									</div>
								<?php } ?>
							</div>

							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket">
								<?php if(get_sub_field('right_column_text')) { ?>
									<div class="col_text_inner" data-aos="fade-up" data-aos-duration="2000" data-aos-offset="0">
									<?php the_sub_field('right_column_text'); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
        		</div>
        	</section>
		
       <?php 
		/* 
		* TITLE LEFT, TEXT RIGHT
		*/
		elseif( get_row_layout() == 'title_left_text_right' ): ?>

        	<section class="page-block title_left_text_right">
        		<div class="inner-container">
        			<div class="row"> 
						<div class="grid">
							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket">
								<?php if(get_sub_field('title')) { ?>
									<div class="col_text_inner" data-aos="fade-up" data-aos-duration="2000" data-aos-offset="0">
										<h2><?php the_sub_field('title'); ?></h2>
									</div>
								<?php } ?>
							</div>

							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket">
								<?php if(get_sub_field('copy')) { ?>
									<div class="col_text_inner" data-aos="fade-up" data-aos-duration="2000" data-aos-offset="0">
									<?php the_sub_field('copy'); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
        		</div>
        	</section>
       
        	
       <?php 
		/* 
		* TITLE LEFT, TEXT RIGHT, IMAGE BOTTOM
		*/
		elseif( get_row_layout() == 'title_left_text_right_image_bottom' ): 
			
		$image = get_sub_field('image');
		?>

        	<section class="page-block title_left_text_right">
        		<div class="inner-container">
        			<div class="row"> 
						<div class="grid">
							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket wow fadeInUp">
								<?php if(get_sub_field('title')) { ?>
									<div class="col_text_inner">
										<h2><?php the_sub_field('title'); ?></h2>
									</div>
								<?php } ?>
							</div>

							<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket wow fadeInUp">
								<?php if(get_sub_field('copy')) { ?>
									<div class="col_text_inner">
									<?php the_sub_field('copy'); ?>
									</div>
								<?php } ?>
							</div>
							
							<?php if($image) { ?>
							<div class="grid__cell 1/1--widescreen 1/1--lap-and-up 1/1--pocket wow fadeInUp">
								<div class="image-wrap aos-init aos-animate" data-aos="image-block-reveal">
									<img src="<?php echo $image; ?>">
								</div>
							</div>
							<?php } ?>
							
						</div>
					</div>
        		</div>
        	</section>
        	 	 	 	
       <?php 
		/* 
		* FULLSCREEN IMAGE BLOCK 
		*/
		elseif( get_row_layout() == 'fullscreen_image' ): ?>
			<?php $image = get_sub_field('image'); ?>
       		
       		<?php if($image) { ?>
        	<section class="page-block fullscreen-image">
				<div class="image-wrap aos-init aos-animate" data-aos="image-block-reveal">
					<img src="<?php echo $image;?>">
				</div>
        	</section>
        	<?php } ?>
        	
        <?php 
		/*
		* INNER PAGE HERO
		*/
		elseif( get_row_layout() == 'inner_page_hero' ): ?>
			
			<?php 
			
			$background_type = get_sub_field('background_type');
			$background_image = get_sub_field('background_image');
		
			$size = 'large'; // (thumbnail, medium, large, full or custom size)
			$image_attributes = wp_get_attachment_image_src( $background_image, $size ); ?>

        	<section class="inner-hero" <?php if($background_type == "Single Image") { echo 'style="background-image: url('.$image_attributes[0].');"'; }?>>
				
				<?php if($background_type == "Slider") { ?> 
				<div class="inner-hero-background">
					
					<?php if( have_rows('slide_images') ): ?>
					<div class="inner-hero-image-slider">
						<?php while( have_rows('slide_images') ): the_row();
							$image = get_sub_field('image');
						?>

						<div class="slide-bg" style="background-image: url(<?php echo $image; ?>);"></div>

						<?php endwhile; ?>	
					</div>
					<?php endif; ?>
		
				</div>
				
				<script>
				jQuery(document).ready(function() {
					if(jQuery('.inner-hero-image-slider').length){
						jQuery('.inner-hero-image-slider').slick({
						  dots: false,
						  arrows:false,
						  infinite: true,
						  fade: true,
						  speed: 1500,
						  slidesToShow: 1,
						  slidesToScroll: 1,
						  autoplay: true,
						  autoplaySpeed: 4000,
						});
					}
				});		
				</script>
				<?php } ?>
				
				<div class="hero-content">
					<div class="row">
						<div class="hero_inner_wrap">
							<h2 class="white wow fadeInUp"><?php the_sub_field( 'title' ); ?></h2>
							<?php if(get_sub_field('text')) { ?>
								<p class=" wow fadeInUp"><?php the_sub_field( 'text' ); ?></p>
							<?php } ?>
							
							<?php 
							$link_text = get_sub_field('link_text');
							$link_url = get_sub_field('link_url');


							if($link_text && $link_url) { 
								echo '<a class="block-link" href="'.$link_url.'">'.$link_text.'</a>';
							}
							?>
						</div>
					</div>
				</div>
				
				<?php 
				$cta_text = get_sub_field('cta_text');
				if($cta_text) {
					echo '<div class="inner-hero-info-text">'.$cta_text.'</div>';
				}
				?>
			</section>
		
		<?php 
		/*
		* FULL ROW IMAGE
		*/
		elseif( get_row_layout() == 'full_row_image' ): ?>
			
			<?php $image = get_sub_field('image'); ?>
       		
       		<?php if($image) { ?>
        	<section class="page-block full-row-image">
				<div class="row">
					<div class="image-wrap">
						<img src="<?php echo $image;?>">
					</div>
				</div>
        	</section>
        	<?php } ?>
		

		<?php 
		/*
		* ABOUT SECTION (HOME)
		*/
		elseif( get_row_layout() == 'home_about_section' ): 
		
		// load about section
		include TEMPLATEPATH . '/includes/home/about-section.php'; ?>

		<?php 
		/*
		* FEATURED WORK CAROUSEL
		*/
		elseif( get_row_layout() == 'featured_work_carousel' ): 
		
		// load featured work
		include TEMPLATEPATH . '/includes/home/portfolio/portfolio-section.php'; ?>
		
		<?php
		/*
		* FEATURED PROJECT
		*/
		elseif( get_row_layout() == 'featured_project' ): 
		
		// load featured work
		include TEMPLATEPATH . '/includes/home/featured-project.php'; ?>

		<?php 
		/*
		* CONTACT FORM - GRACITY FORMS
		*/

		elseif( get_row_layout() == 'contact_form' ): 
		$contact_form_id = get_sub_field('contact_form_id');
		?>

        	<section class="page-block cta-contact-form">
				<div class="row">
					<div class="grid">
						<div class="grid__cell 1/1--widescreen 1/1--pocket 1/1--thumb">
							<?php echo do_shortcode('[gravityform id='.$contact_form_id.' title=false description=false ajax=true]');?>
						</div>
					</div>
				</div>
        	</section>
		
		<?php 
		/*
		* SERVICES LIST
		*/
		elseif( get_row_layout() == 'services_list' ): ?>

        	
				<section class="services-list-section">
					<div class="row">
						<div class="grid">
							
							<div class="services-header">
								<?php 
								$s_subheading = get_sub_field('services_subheading'); 
								$s_heading = get_sub_field('services_heading'); ?>
								
								<?php if($s_subheading) { echo '<span>'.$s_subheading.'</span>'; } ?>
								<?php if($s_heading) { echo '<h2>'.$s_heading.'</h2>'; } ?>
							</div>
							
							<?php if( have_rows('service_section') ): ?>
							
								<?php while( have_rows('service_section') ): the_row();
								// vars
								$service_heading = get_sub_field('service_heading'); ?>
								<div class="services-list-section-row">
									<div class="grid__cell 1/4--widescreen 1/4--lap-and-up 1/1--pocket">
										<?php
										if($service_heading) {
											echo '<h3>'.$service_heading.'</h3>';
										}
										?>
									</div>
								
									
									<?php if( have_rows('list_of_services') ): ?>
									<div class="grid__cell 3/4--widescreen 3/4--lap-and-up 1/1--pocket">
										<ul class="list-all-services">
											<?php	
											while( have_rows('list_of_services') ): the_row();
											// vars
											$service_name = get_sub_field('service_name'); ?>

											<?php
											if($service_name) {
												echo '<li><span>'.$service_name.'</span></li>';
											}
											?>	

											<?php endwhile; ?>
										</ul>
									</div>
									<?php endif; ?>
							</div>
							<?php endwhile; ?>
							
					<?php endif; ?>		
					</div>
				</section>
				

		<?php 
		/*
		* DOUBLE IMAGE BLOCK
		*/
		elseif( get_row_layout() == 'double_image_block' ): ?>

			<div class="page-block double-image-block">
				<div class="inner-container">
					<div class="grid">

					<?php 
						$left_image = get_sub_field('left_image');
						$right_image = get_sub_field('right_image');

						if($left_image) {
							$l_img = $left_image;
						} else {
							$l_img = get_bloginfo('template_url').'/assets/images/placeholder.jpg';
						}

						if($right_image) {
							$r_img = $right_image;
						} else {
							$r_img = get_bloginfo('template_url').'/assets/images/placeholder.jpg';
						}

						// get the src of the post thumbnail

						$width = 700;
						$height = 500;
						$crop = true;
						$retina = false;

						$output_left_image = erikreart_image_resize( $l_img, $width, $height, $crop, $retina );
						$output_right_image = erikreart_image_resize( $r_img, $width, $height, $crop, $retina );
						?>

						<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket image-item">
							<img src="<?php echo $output_left_image['url']; ?>" alt=""  itemprop="image">
						</div>

						<div class="grid__cell 1/2--widescreen 1/2--lap-and-up 1/1--pocket image-item">
							<img src="<?php echo $output_right_image['url']; ?>" alt=""  itemprop="image">
						</div>

					</div>
				</div>
			</div>
		

        <?php endif;

    endwhile;

else :

    // no layouts found

endif;
?>