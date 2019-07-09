<?php
/*
Template Name: SUPPORT
*/

get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="support-wrap">
	<div class="support-content">
		<?php the_content();?>
	</div>
</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>