<?php

/* ACF VARAIBLES */

$show_guides_in_sidebar = get_field('show_guides_in_sidebar','option');
$show_useful_links_in_sidebar = get_field('show_useful_links_in_sidebar','option');

?>

<div id="left-sidebar">
	<div class="time-date">
		<div class="inner">
			<div class="s_date">
			<i></i>	
			<span>
					<?php echo date('jS F Y'); ?>
				</span>
			</div>
			<div class="s_time">
				<i></i>
				<span id="live_time"></span>
			</div>
		</div>
	</div>

	<div class="site-logo">
		<a href="<?php bloginfo('url');?>" class="">
			<img src="<?php bloginfo('template_url');?>/assets/images/logo.png" alt="logo">
		</a>
	</div>

	<div class="sidebar-navigation">
		<ul class="menu">
			<li <?php if (is_front_page()) { echo 'class="current"'; } ?>>
				<a href="<?php bloginfo('url');?>" class="">Home</a>
			</li>

			<li <?php if (is_page('Documents')) { echo 'class="current"'; } ?>>
				<a href="<?php bloginfo('url');?>/documents/" class="">Documents</a>
			</li>

			<li <?php if (is_page('Office Locations')) { echo 'class="current"'; } ?>>
				<a href="<?php bloginfo('url');?>/office-locations/" class="">Office Locations</a>
			</li>

			<li <?php if (is_page('Internal Vacancies')) { echo 'class="current"'; } ?>>
				<a href="<?php bloginfo('url');?>/internal-vacancies/" class="">Internal Vacancies <span class="counter"><?php $count_posts = wp_count_posts( 'vacancy' )->publish; echo $count_posts; ?></span></a>		
			</li>

			<li <?php if (is_page('Company Updates')) { echo 'class="current"'; } ?>>
				<a href="<?php bloginfo('url');?>/company-updates/" class="">Company Updates</a>
			</li>

			<?php if($show_guides_in_sidebar == "Yes") { ?>
			<li <?php if (is_page('Guides')) { echo 'class="current"'; } ?>>
				<a href="<?php bloginfo('url');?>/guides/" class="">Guides</a>
			</li>
			<?php } ?>
			<?php if($show_useful_links_in_sidebar == "Yes") { ?>
			<li <?php if (is_page('Useful Links')) { echo 'class="current"'; } ?>>
				<a href="<?php bloginfo('url');?>/useful-links/" class="">Useful Links</a>
			</li>
			<?php } ?>
		</ul>
	</div>

</div>

<script>
	jQuery( document ).ready(function() {
		function startTime() {
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('live_time').innerHTML =
			h + ":" + m + ":" + s;
			var t = setTimeout(startTime, 500);
		}
		
		function checkTime(i) {
			if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
			return i;
		}

		startTime();
	});

	
</script>