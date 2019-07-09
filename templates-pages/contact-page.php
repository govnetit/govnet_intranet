<?php
/**
 * Template Name: Contact page
 *
 */

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
	wpcf7_enqueue_scripts();
}

if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
	wpcf7_enqueue_styles();
}

get_header( 'none' ); 

$subtitle = get_field('page_subtitle');
$cover_image = get_field('cover_image');
?>
<div class="map-section dark-bg">
	<div class="map_wrapper">
		<div id="map"></div>
	</div>
</div>

<section class="contact-content">

	<div class="row">
		<div class="c_heading">
			<h1>Let's get in touch</h1>
			
			<p>I'm always happy to make valuable new contacts</p>
		</div>
	</div>

	<div class="row">
		<div class="c_content">
			<div class="grid">
				<div class="grid__cell 1/3--widescreen 1/3--portable 1/3--pocket 1/1--thumb">
					<h5>Address</h5>
					<p>Virginia House,<br> 5-7 Great Ancoats St,<br> Manchester,<br> M4 5AD</p>
				</div>
				<div class="grid__cell 1/3--widescreen 1/3--portable 1/3--pocket 1/1--thumb">
					<h5>Email Address</h5>
					<p><span class="codedirection">moc.traerkire@kire</span></p>
				</div>
				<div class="grid__cell 1/3--widescreen 1/3--portable 1/3--pocket 1/1--thumb">
					<h5>Telephone / Whatsapp</h5>
					<p>07397 240006</p>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="d_content">
			<div class="grid">
				<div class="grid__cell 1/1--widescreen 1/1--pocket 1/1--thumb">
					<p>Have questions, a problem that needs solving or looking to grow your business online? Feel free to drop me a message. <br>For project inquiries kindly visit <a href="<?php bloginfo('url');?>/project-planner/">Project planner</a>.</p>
					
					
				</div>
			</div>
		</div>
	</div>
	
</section>

<section class="contact-form-section">
	<div class="row">
		<div class="grid">
			<div class="grid__cell 1/1--widescreen 1/1--pocket 1/1--thumb">
				<?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true]');?>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="grid">
			<div class="grid__cell 1/1--widescreen 1/1--pocket 1/1--thumb">				
				<p class="dark-bg-text">Don't like waiting? Feel free to give me a call on (+44) 7397 240006, and we can arrange a meeting, either at my office or at a location that suits you best. I'm looking forward to hearing from you.</p>
			</div>
		</div>
	</div>
</section>






<script src="https://mobilemarkup.com/javascripts/libs/jquery.customSelect.min.js"></script>

<script>
jQuery( document ).ready(function() {
	
	
(function() {
  (function(jQuery) {
    return jQuery.fn.floatedLabel = function(options) {
      var defaults, settings;
      defaults = {
        focusClass: 'focus',
        activeClass: 'active',
        errorClass: 'error'
      };
      settings = jQuery.extend({}, defaults, options);
      return this.each(function() {
        var element, input, label;
        label = jQuery(this);
        if (!label.prop('for')) {
          return;
        }
        element = label.parents('.field').first();
        input = jQuery("#" + (label.prop('for'))).filter('textarea, input, select').first();
        return input.bind('checkval', function() {
          return element.toggleClass(settings.activeClass, !!input.val());
        }).on('keyup input change', function() {
          element.removeClass(settings.errorClass);
          return input.trigger('checkval');
        }).on('blur', function() {
          return element.removeClass(settings.focusClass);
        }).on('focus', function() {
          return element.addClass(settings.focusClass);
        }).trigger('checkval');
      });
    };
  })(jQuery);

	  jQuery(function() {
		jQuery('.label').floatedLabel();
		//return jQuery('.select').customSelect();
	  });

	}).call(this);
});

</script>

	
	

<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var map_center_coordinates = {lat: 53.484784, lng: -2.232175};
  var marker_coordinates = {lat: 53.4845690, lng: -2.232250};
	
  // The map, centered at Uluru
  var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 15, 
	  center: map_center_coordinates,
	  disableDefaultUI: true,
	  
	  styles: [
	  {
		"elementType": "geometry",
		"stylers": [
		  {
			"color": "#212121"
		  }
		]
	  },
	  {
		"elementType": "labels.icon",
		"stylers": [
		  {
			"visibility": "off"
		  }
		]
	  },
	  {
		"elementType": "labels.text.fill",
		"stylers": [
		  {
			"color": "#757575"
		  }
		]
	  },
	  {
		"elementType": "labels.text.stroke",
		"stylers": [
		  {
			"color": "#212121"
		  }
		]
	  },
	  {
		"featureType": "administrative",
		"elementType": "geometry",
		"stylers": [
		  {
			"color": "#757575"
		  }
		]
	  },
	  {
		"featureType": "administrative.country",
		"elementType": "labels.text.fill",
		"stylers": [
		  {
			"color": "#9e9e9e"
		  }
		]
	  },
	  {
		"featureType": "administrative.land_parcel",
		"stylers": [
		  {
			"visibility": "off"
		  }
		]
	  },
	  {
		"featureType": "administrative.locality",
		"elementType": "labels.text.fill",
		"stylers": [
		  {
			"color": "#bdbdbd"
		  }
		]
	  },
	  {
		"featureType": "poi",
		"elementType": "labels.text.fill",
		"stylers": [
		  {
			"color": "#757575"
		  }
		]
	  },
	  {
		"featureType": "poi.park",
		"elementType": "geometry",
		"stylers": [
		  {
			"color": "#181818"
		  }
		]
	  },
	  {
		"featureType": "poi.park",
		"elementType": "labels.text.fill",
		"stylers": [
		  {
			"color": "#616161"
		  }
		]
	  },
	  {
		"featureType": "poi.park",
		"elementType": "labels.text.stroke",
		"stylers": [
		  {
			"color": "#1b1b1b"
		  }
		]
	  },
	  {
		"featureType": "road",
		"elementType": "geometry.fill",
		"stylers": [
		  {
			"color": "#2c2c2c"
		  }
		]
	  },
	  {
		"featureType": "road",
		"elementType": "labels.text.fill",
		"stylers": [
		  {
			"color": "#8a8a8a"
		  }
		]
	  },
	  {
		"featureType": "road.arterial",
		"elementType": "geometry",
		"stylers": [
		  {
			"color": "#373737"
		  }
		]
	  },
	  {
		"featureType": "road.highway",
		"elementType": "geometry",
		"stylers": [
		  {
			"color": "#3c3c3c"
		  }
		]
	  },
	  {
		"featureType": "road.highway.controlled_access",
		"elementType": "geometry",
		"stylers": [
		  {
			"color": "#4e4e4e"
		  }
		]
	  },
	  {
		"featureType": "road.local",
		"elementType": "labels.text.fill",
		"stylers": [
		  {
			"color": "#616161"
		  }
		]
	  },
	  {
		"featureType": "transit",
		"elementType": "labels.text.fill",
		"stylers": [
		  {
			"color": "#757575"
		  }
		]
	  },
	  {
		"featureType": "water",
		"elementType": "geometry",
		"stylers": [
		  {
			"color": "#000000"
		  }
		]
	  },
	  {
		"featureType": "water",
		"elementType": "labels.text.fill",
		"stylers": [
		  {
			"color": "#3d3d3d"
		  }
		]
	  }
	]
	  
  }
  );
  
	
	// The marker, positioned at Uluru
  var marker = new google.maps.Marker({
	  position: marker_coordinates,
	  icon: 'https://beta.erikreart.com/wp-content/themes/erikreart/assets/images/map_marker.png',
	  map: map,
	  title: 'Erik Reart - Freelance Web Designer & WordPress Developer, Manchester'
  });
}
	
	

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA4mi-OFAFlNs8XMoSUTCqk3ro73wx6EE&callback=initMap"></script>


<?php get_footer(); ?>
