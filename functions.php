<?php

// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php'); 

// Remove 4.2 Emoji Support
require_once(get_template_directory().'/assets/functions/disable-emoji.php'); 

// Use this as a template for custom post types
require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// IMAGE RESIZER (CROPPER)
require_once(get_template_directory().'/assets/functions/resize.php');

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// fix Gravity forms error message
add_filter("gform_validation_message", "gwp_change_message", 10, 2);
function gwp_change_message($message, $form){
return '
<div class="validation_error">Please double check the field(s) marked red.</div>
';
}


/* TIME AGO */

define( TIMEBEFORE_NOW,         'just now' );
define( TIMEBEFORE_MINUTE,      '{num} minute ago' );
define( TIMEBEFORE_MINUTES,     '{num} minutes ago' );
define( TIMEBEFORE_HOUR,        '{num} hour ago' );
define( TIMEBEFORE_HOURS,       '{num} hours ago' );
define( TIMEBEFORE_YESTERDAY,   'yesterday' );
define( TIMEBEFORE_FORMAT,      '%e %b' );
define( TIMEBEFORE_FORMAT_YEAR, '%e %b, %Y' );

function time_ago( $time )
{
	$out    = ''; // what we will print out
	$now    = time(); // current time
	$diff   = $now - $time; // difference between the current and the provided dates

	if( $diff < 60 ) // it happened now
		return TIMEBEFORE_NOW;

	elseif( $diff < 3600 ) // it happened X minutes ago
		return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

	elseif( $diff < 3600 * 24 ) // it happened X hours ago
		return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

	elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
		return TIMEBEFORE_YESTERDAY;

	else // falling back on a usual date format as it happened later than yesterday
		return strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time );
}


// DISPLAY YEARS / AGE / HOW LONG TIME IM DOING STUFF ETC //
function how_many_years($start_date) {
	extract( shortcode_atts( array(
		'start_date' => 'start_date'
	), $start_date));
	return date("Y", time() - strtotime($start_date)) - 1970;
}
add_shortcode('show-years', 'how_many_years');

// [show-years start_date="02/19/1985"]



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

// Add to calendar function
function squarecandy_add_to_gcal(
    $name,
    $startdate,
    $enddate = false,
    $description = false,
    $location = false,
    $allday = false,
    $linktext = 'Add to Calendar',
    $classes = array('gcal-button, button')
  ) {
    // calculate the start and end dates, convert to ISO format
    if ($allday) {
      $startdate = date('Ymd',strtotime($startdate));
    }
    else {
      $startdate = date('Ymd\THis',strtotime($startdate));
    }
    if ($enddate && !empty($enddate) && strlen($enddate) > 2) {
      if ($allday) {
        $enddate = date('Ymd',strtotime($enddate . ' + 1 day'));
      }
      else {
        $enddate = date('Ymd\THis',strtotime($enddate));
      }
    }
    else {
      $enddate = date('Ymd\THis',strtotime($startdate . ' + 2 hours'));
    }
    // build the url
    $url = 'http://www.google.com/calendar/event?action=TEMPLATE';
    $url .= '&text=' . rawurlencode($name);
    $url .= '&dates=' . $startdate . '/' . $enddate;
    if ($description) {
      $url .= '&details=' . rawurlencode($description);
    }
    if ($location) {
      $url .= '&location=' . rawurlencode($location);
    }
    // build the link output
    $output = '<a href="' . $url . '" class="' . implode(' ',$classes) . '">'.$linktext.'</a>';
    return $output;
  }

  /********************
 *
 *  Example Usage:
 *
 *  echo squarecandy_add_to_gcal('Example Event', 'June 30, 2017 8:00pm');
 *  echo squarecandy_add_to_gcal('Example Event', 'June 30, 2017 8:00pm', 'July 2, 2017 10:00am', 'This is my detailed event description', '1600 Pennsylvania Ave NW, Washington, DC 20500');
 *  echo squarecandy_add_to_gcal('Example Event', 'June 30, 2017', 'July 2, 2017', 'This is my detailed event description', '1600 Pennsylvania Ave NW, Washington, DC 20500', true, 'gCal+', array('my-custom-class') );
 *
 */


 // Numbered Pagination
if ( !function_exists( 'govnet_pagination' ) ) {
	
	function govnet_pagination() {
		
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}