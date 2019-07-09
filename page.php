<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<section class="page-content">
	<div class="row">
		<div class="section-header">
			<h1><?php the_title();?></h1>
		</div>

		<?php the_content();?>
		
	</div>
</section>


<?php endwhile; endif; ?>
<?php get_footer(); ?>