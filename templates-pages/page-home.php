<?php
/*
Template Name: Homepage
*/

get_header(); 
?>

<?php get_search_form(); ?>

<?php get_template_part( 'includes/home/updates'); ?>
<?php $show_birthdays = get_field('show_birthdays','option');

if($show_birthdays == "Yes") { ?>

<div class="events-birthdays">
	<div class="row">
		<div class="birthdays-wrap">
			<h2>Upcoming Birthdays - <?php echo date('F'); ?></h2>
			<div class="grid">
				<?php get_template_part( 'includes/home/birthdays'); ?>
			</div>
		
			<div class="see-more-birthdays">
				<a href="<?php bloginfo('url');?>/upcoming-birthdays/">See all upcoming birthdays</a>
			</div>
		</div>
	</div>
</div>

<?php } ?>

<div class="quick-links">
	<div class="row">
		<?php if( have_rows('quick_links','option') ): ?>
		<div class="grid">
		<div class="grid__cell 1/1--widescreen 1/1--portable 1/1--pocket 1/1--thumb quick-links--item">
			<h2>Quick Links</h2>
		</div>
			<?php while( have_rows('quick_links','option') ): the_row(); 

				// vars
				$website_name = get_sub_field('website_name');
				$website_url = get_sub_field('website_url');
				$website_logo = get_sub_field('website_logo');

				if($website_logo) {
					$site_logo_img = $website_logo;
				} else {
					$site_logo_img = get_bloginfo('template_url').'/assets/images/no-logo.png';
				}
				?>

				<div class="grid__cell 1/3--widescreen 1/3--portable 1/3--pocket 1/1--thumb quick-links--item">

					<div class="inner">
						<?php if( $website_url ): ?>
							<a href="<?php echo $website_url; ?>" target="_blank">
						<?php endif; ?>
							<div class="quick-links--item--image">
								<img src="<?php echo $site_logo_img; ?>" alt="<?php echo $website_name; ?>" />
							</div>
							
							<div class="quick-links--item--title">
								<?php echo '<h4>'.$website_name.'</h4>'; ?>
							</div>

						<?php if( $website_url ): ?>
							</a>
						<?php endif; ?>
					</div>

				</div>

			<?php endwhile; ?>
		</div>
		<?php endif; ?>	
	</div>
</div>

<?php get_footer(); ?>