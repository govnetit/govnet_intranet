<?php
/*
Template Name: GUIDES
*/

?>

<?php get_header(); ?>

<div class="guides-header">
	<div class="guides-search">
		<div class="row">
			<div class="live-search-wrapper">
				<form id="live-search" action="" class="styled" method="post">
						<div class="input-wrap">
							<input type="text" class="text-input" id="filter" value="" placeholder="Search guide ..." x-webkit-speech/>
						</div>
						<div class="clear"></div>
						<span id="filter-count"></span>
				</form>
			</div>
		</div>
	</div>
</div>
		
<section class="guides-wrap">
	<div class="row">
		<div class="section-header">
			<h1><?php the_title();?></h1>
		</div>	

		<div class="guides-list-wrap">
			<div class="grid guides_container">

			<?php

			

			// WP_Query arguments
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
				'post_type'              => array( 'guide' ),
				'posts_per_page'         => '12',
				'order' => 'ASC',
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
					
				<div class="grid__cell 1/3--widescreen 1/3--portable 1/3--pocket 1/1--thumb guide-item <?php $guides_cat = wp_get_post_terms($post->ID, 'guide-category', array("fields" => "all")); foreach($guides_cat as $guide_cat) { echo $guide_cat->slug .' '; } ?>">
					<a href="<?php the_permalink();?>">
						<div class="inner">
							<div class="guide-item--image">
								<?php if($image) {
									$guide_img = $image;
								} else {
									$guide_img = get_bloginfo('template_url') .'/assets/images/no-guide-image.png';
								}
								?>
								<img class="guide-image" src="<?php echo $guide_img;?>" alt="<?php the_title();?>">	
							</div>

							<div class="guide-item--content">
								<div class="guide-item--content--cat">
									<?php
										$g_cats = wp_get_post_terms($post->ID, 'guide-category', array("fields" => "all"));
										foreach($g_cats as $g_cat) {
										echo $g_cat->name; 
									}
									?>
								</div>
								<div class="guide-item--content--title"><h3><?php the_title();?></h3></div>	
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
	</div>
</section>


<script>
jQuery(document).ready(function(){
    jQuery("#filter").keyup(function(){
 
        // Retrieve the input field text and reset the count to zero
        var filter = jQuery(this).val(), count = 0;
 
        // Loop through the comment list
        jQuery(".guide-item").each(function(){
 
            // If the list item does not contain the text phrase fade it out
            if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
                jQuery(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                jQuery(this).show();
                count++;
            }
        });
 
        // Update the count
        var numberItems = count;
        jQuery("#filter-count").text(count+" results found");
    });
});
</script>

<?php get_footer(); ?>
