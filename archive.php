<?php get_header(); ?>

<section class="page-hero parallax">
	<div class="inner">
		<div class="container">
			<h1 class="page-title"><?php the_archive_title();?></h1>
			
			<div class="page-subtitle">
				<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
			</div>
			
		</div>
	</div>
</section>		
			
									
	<div id="content">
	
		<div id="inner-content" class="row">
		
		    <main id="main" class="large-12 medium-12 columns" role="main">
			    		
		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive' ); ?>
				    
				<?php endwhile; ?>	

					<?php joints_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
		
			</main> <!-- end #main -->
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>