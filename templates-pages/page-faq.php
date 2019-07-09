<?php
/*
Template Name: FAQ
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<section class="faq-section">
	<div class="faq-header">
		<div class="header-search">
			<div class="row">
				<div class="live-search-wrapper">
					<form id="live-search" action="" class="styled" method="post">
							<div class="input-wrap">

								<input type="text" class="text-input" id="filter" value="" placeholder="Type here to search your question ..." x-webkit-speech/>
							</div>
							<div class="clear"></div>
							<span id="filter-count"></span>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="section-header">
			<h1><?php the_title();?></h1>
		</div>
	</div>
	
	
		<div class="faq-wrapper">
			<div class="row">

				<div id="answers-wrap" class="answers-wrap">

						<?php
						// WP_Query arguments
						$args = array(
							'post_type'              => array( 'question' ),
							'posts_per_page'         => '-1',
							'order' => 'ASC',
							'orderby' => 'menu_order',
						);

						// The Query
						$web_design_questions = new WP_Query( $args );

						// The Loop
						if ( $web_design_questions->have_posts() ) {
							while ( $web_design_questions->have_posts() ) {
								$web_design_questions->the_post();
								// do something ?>

							<div class="question-item">

								<div class="question-title" id="q-<?php the_ID();?>">
									<h3><?php the_title();?></h3>
								</div>
								<div class="answer description">
									<?php the_content();?>
								</div>
							</div>

						<?php }
						} else {
							// no posts found
						}

						// Restore original Post Data
						wp_reset_postdata();
						?>


						
				</div>

			</div>

		</div>

</section>







<script>	
	jQuery(document).ready(function() {
      jQuery('#filteroptions li a').click(function() {
        // fetch the class of the clicked item
        var ourClass = jQuery(this).attr('class');
        // reset the active class on all the buttons
        jQuery('#filteroptions li').removeClass('active');
        // update the active state on our clicked button
        jQuery(this).parent().addClass('active');
        if(ourClass == 'all') {
          // show all our items
          jQuery('#answers-wrap').children('div.question-item').show();
        }
        else {
          // hide all elements that don't share ourClass
          jQuery('#answers-wrap').children('div:not(.' + ourClass + ')').hide();
          // show all elements that do share ourClass
          jQuery('#answers-wrap').children('div.' + ourClass).show();
        }
        return false;
      });
    });
    
    
    jQuery(document).ready(function(){
				
		// FAQ questions
		jQuery('.answer').hide();
		
		jQuery('.question-title').click(function(){
			jQuery(this).next('.answer').slideToggle();
			jQuery(this).toggleClass('active');
			//var qID = jQuery(this).attr("id");
			//window.location.hash = qID;
    	});
		
		jQuery(function() {		
			var id = window.location.hash;
			var accor = jQuery(id + '.question-title');
			
			
			if(window.location.hash) {
				var hash = window.location.hash,
        		$hash = jQuery(hash);
				
				//console.log($hash);
				
				$hash.removeAttr('id');
				$hash.before('<div id="'+hash.slice(1)+'" class="hashlink"></div>');
				window.location.hash = hash;
				
				
			  	// Fragment exists
				jQuery(accor).next('.answer').show();
				jQuery(accor).toggleClass('active');

				//console.log(id);
				//console.log(accor);	
			} else {
			  	// Fragment doesn't exist
			}
		});
	});	
</script>

<script>
jQuery(document).ready(function(){
    jQuery("#filter").keyup(function(){
 
        // Retrieve the input field text and reset the count to zero
        var filter = jQuery(this).val(), count = 0;
 
        // Loop through the comment list
        jQuery(".question-item").each(function(){
 
            // If the list item does not contain the text phrase fade it out
            if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
                jQuery(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                jQuery(this).show();
                count++;
            }
        });
 
        // Update the count
        var numberItems = count;
        jQuery("#filter-count").text(count+" results found");
    });
});
</script>



<?php endwhile; endif; ?>


<?php get_footer(); ?>