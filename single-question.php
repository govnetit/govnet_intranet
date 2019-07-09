<?php
	/**
	 * The template for displaying all single posts.
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	 *
	 * @package re17
	 */


	get_header();
?>
<div class="help-header-wrap">
	<div class="row">
		<div class="section-header">
			<h1>Help</h1>
		</div>

		<h2><?php the_title();?></h2>

		<div class="breadcrumbs">
			
			<ol itemscope itemtype="http://schema.org/BreadcrumbList">
				<li itemprop="itemListElement" itemscope
				itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="<?php echo get_bloginfo('url');?>">
				<span itemprop="name">Home</span></a>
				<span itemprop="position" content="1">&gt;</span>
				</li>
				<li itemprop="itemListElement" itemscope
				itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="<?php echo get_bloginfo('url');?>/help/">
				<span itemprop="name">Help</span></a>
				<span itemprop="position" content="2">&gt;</span>
				</li>
				<li itemprop="itemListElement" itemscope
				itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="<?php the_permalink();?>">
				<span itemprop="name"><?php the_title();?></span></a>
				<span itemprop="position" content="3"></span>
				</li>
			</ol>
		</div>
	</div>
</div>


<div class="page-wrap">
	<div class="inner-page">
		<div class="row page-answer">
			<div id="primary" class="content-area answer-content-area">
				
				<?php while (have_posts()) : the_post(); ?>

					<?php the_content();?>

				<?php endwhile; // End of the loop. ?>
				
				<a class="back-btn" href="<?php bloginfo('url');?>/help">Back to Help page</a>
			</div>
		</div> 
	</div>
</div>


<?php get_footer(); ?>
        