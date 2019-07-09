<?php
/*
Template Name: Login
*/

get_header(); 
$user_id = get_current_user_id();
?>

<div class="login-wrap">
 	<div class="form-col">
		<div class="container form-wrap">

				<div class="l_form">
				
					<h2>Login</h2>
				<?php global $user_login;
				if(isset($_GET['login']) && $_GET['login'] == 'failed')
				{
					?>
						<div class="aa_error">
							<p>Login Failed, Please Try Again!</p>
						</div>
					<?php
				}
					if (is_user_logged_in()) {
						//$redirect_url = get_bloginfo('url') .'/my-account/';
						$redirect_url = get_bloginfo('url') .'/wp-admin/';
						header("Location: $redirect_url"); 
					} else { ?>

						<?php 
							  global $bp;
							  $user_id = get_current_user_id();
							  //$redirect_url = get_bloginfo('url') .'/my-account/';
							  $redirect_url = get_bloginfo('url') .'/wp-admin/';
							  $args = array(
										'echo'           => true,
										//'redirect'       => $redirect_url, 
										'form_id'        => 'loginform',
										'label_username' => __( 'Email Address' ),
										'label_password' => __( 'Password' ),
										'label_remember' => __( 'Remember Me' ),
										'label_log_in'   => __( 'Log In' ),
										'id_username'    => 'user_login',
										'id_password'    => 'user_pass',
										'id_remember'    => 'rememberme',
										'id_submit'      => 'wp-submit',
										'remember'       => NULL,
										'value_username' => NULL,
										'value_remember' => true
										); 

										wp_login_form($args);
					}
				?>
				</div> 

			</div><!--/.container -->
		</div>
	
	
</div>


<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.validate.min.js"></script>


<script>

( function( $ ) {

   $('#user_login').attr( 'placeholder', 'What is your username?' );
   $('#user_pass').attr( 'placeholder', 'What is your password?' );
   $("#user_login").addClass("required");
   $("#user_login").addClass("username");
   $("#user_pass").addClass("required");

} )( jQuery );

jQuery(document).ready(function(){
	jQuery("#loginform").validate();
});

</script>


<?php get_footer(); ?>