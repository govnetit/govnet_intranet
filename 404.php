<?php 

header("HTTP/1.1 301 Moved Permanently");
header("Location: ".get_bloginfo('url'));
exit();

get_header(); ?>
			
<section class="page-hero" <?php if($cover_image) { echo 'style="background-image: url('.$cover_image.');"'; } else { echo ''; } ?>>
	<div class="inner">
		<div class="container">
			
			<div class="page-subtitle">
				<h3>This isn't the thing you're looking for.</h3>
				<p>Let's take you out of here!</p>
			</div>
			
			<a href="<?php bloginfo('url');?>">Take me home</a> 
			
		</div>
	</div>
</section>

<?php get_footer(); ?>