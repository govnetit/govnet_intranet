<?php

	get_header();
	
	$header_image = get_field('header_image');
	$guide_content = get_field('guide_content');
?>

	<?php while (have_posts()) : the_post(); ?>

<div itemscope itemtype="http://schema.org/Article" class="hero-section banner-header full-height">
	<div class="bg-parallax parallax" style="background-image: url(<?php echo $header_image;?>);">
		<meta itemprop="image" content="<?php echo $header_image;?>">
	</div>
	
	<div class="article-title">
		<div class="inner">
			<div class="article-category">
				<?php $categories = get_the_category();
				if ( ! empty( $categories ) ) {
					echo '<a itemprop="about" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
				}
				?>
			</div>
			<h1 itemprop="name" class="entry-title">
			<?php 
				// convert some words into emoji
				$input = get_the_title();
				echo str_replace("shit","<img src='". get_bloginfo('template_url')."/assets/images/poop_emoji.png' alt=''/>",$input);
			?></h1>
			<div itemprop="datePublished" class="published-time time-ago">
				<div class="author-avatar">
					<?php 
						 echo get_avatar( get_the_author_email(), '120' ); 
					?>
				</div>
				
				<div class="article-meta">
					<div>Published <?=time_ago( get_the_time( 'U' ) )?></div> 
					<div>by <span itemprop="author" itemscope itemtype="http://schema.org/Person" itemprop="author"><span itemprop="name" itemprop="author"><?php $author = get_the_author(); echo $author; ?></span></span></div>
				</div>
			</div>

		</div>
	  </div>

</div>

<div class="article-content-wrap">
	<div class="row">
	<?php if($guide_content) { echo $guide_content; }?>
	</div>

	<?php
	$post_terms = wp_get_object_terms($post->ID, 'guide-category', array('fields'=>'ids'));

	$args = array(
		'post_type' => 'guide',
		'post__not_in' => array($post->ID),
		'tax_query' => array(
			array(
				'taxonomy' => 'guide-category',
				'field' => 'term_id',
				'terms' => $post_terms,
			)
		)
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
			echo '<div class="related-posts"><div class="row">';
			echo '<h2>Related guides</h2>';
			echo '<ul>';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php
		}
			echo '</ul>';
			echo '<a class="see-more" href="'.get_bloginfo('url').'/guides/">see all guides</a>';
			echo '</div></div>';
	} else {
		console.log("No related posts found.");
	}
	wp_reset_postdata();
	?>
</div>



<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
        