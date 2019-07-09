<?php
	/**
	 * The template for displaying all single posts.
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	 *
	 * @package re17
	 */


	get_header();

	$file_attachment = get_field('file_attachment');
	$file_type = get_field('file_type');
?>

<section class="page-content">
	<div class="row">
		<div class="section-header">
			<h1><?php the_title();?></h1>
		</div>	
	</div>

	<div class="row">
		
		<div class="document-item">

			<div class="action-buttons">
				
				<?php if($file_attachment && $file_type == "PDF") { ?>
				<div class="action-buttons--view"><a target="_blank" href="<?php echo $file_attachment; ?>">View</a></div>
				<?php } ?>

				<?php if($file_attachment) { ?>
				<div class="action-buttons--download"><a target="_blank" href="<?php echo $file_attachment; ?>" download>Download</a></div>
				<?php } ?>
			</div>
		</div>
		
	</div>
</section>


<?php get_footer(); ?>
        