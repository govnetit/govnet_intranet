<div class="large-3 columns news-article">

	<a class="link selector" href="<?php the_permalink();?>" title="<?php the_title();?>">
	<div class="wrap">
		<div class="overlay-title">
			<div class="title">

				<div class="post-categories">
					<?php $categories = get_the_category();
					if ( ! empty( $categories ) ) {
						echo '<a class="cat-' . esc_html( $categories[0]->slug ) . '" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
					}
					?>
				</div>

				<div class="post-date">
					<?=time_ago( get_the_time( 'U' ) )?>
				</div>
				<h3><?php 
                        // convert some words into emoji
                        $input = get_the_title();
                        echo str_replace("shit","<img src='". get_bloginfo('template_url')."/assets/images/poop_emoji.png' alt=''/>",$input);
                    ?></h3>
			</div>
		</div>

		<div class="article-image">
			<?php if ( has_post_thumbnail() ) { 
		 // get the src of the post thumbnail
		 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );         
		 $thumbnailSrc = $src[0]; 
		 ?>
			<img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo $thumbnailSrc; ?>&h=600&w=800&zc=1q=90" alt="<?php the_title();?>">  

			<?php } else { ?>
			<img src="<?php bloginfo('template_directory'); ?>/assets/images/no-image.jpg" alt="<?php the_title();?>">
			<?php } ?>
		</div>
	</div>
	</a>

</div>	