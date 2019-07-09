<!doctype html>
  <html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_url');?>/assets/images/favicon.png" />
		
		<?php wp_head(); ?>

		<!-- Drop Google Analytics here -->
		<!-- end analytics -->
	</head>
		
	<body <?php body_class(); ?>>
		<div id="fullscreen-search" class="fullscreen-search">
			<div class="inner">
				<?php get_search_form(); ?>

				<div class="close-search">Close Search</div>
			</div>
		</div>


		<!-- #page-wrap -->
		<div id="page-wrap">

			<div class="sidebar-wrap">
				<?php get_template_part('sidebar');?>
			</div>

			<!-- .content-wrap -->
			<div class="content-wrap">

				<div class="topbar">
					<div class="row">
						<div class="navigation">
							<ul>
								<li><a class="website-icon" href="http://www.govnet.co.uk/" target="_blank">Govnet website</a></li>
								<li><a class="helpdesk-icon" href="https://govnet.sysaidit.com/servicePortal/" target="_blank">Helpdesk</a></li>
								<?php if($show_help_tab == "Yes") { ?>
								<li><a class="help-icon" href="<?php bloginfo('url');?>/help/">Help</a></li>
								<?php } ?>
								<li><a class="suggestion-icon" href="<?php bloginfo('url');?>/suggestion/">Suggestion</a></li>
								<?php if ( is_user_logged_in() ) { 
									$current_user = wp_get_current_user();
									?>
									<li class="has-dropdown">
										<a class="dashboard-link" href="<?php bloginfo('url');?>/profile-image/">
											<span class="avatar-wrap"><?php  echo get_avatar( $current_user->ID, '40' ); ?></span> <span class="current-user"><?php echo $current_user->display_name;?></span>
										</a>

										<div class="dropdown-menu">
											<ul>	
												<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?>
												<li><a href="<?php bloginfo('url');?>/wp-admin/">WordPress Admin</a></li>	
												<?php } ?>
												<li><a href="<?php bloginfo('url');?>/account/?section=dashboard">Dashboard</a></li>
												<li><a href="<?php bloginfo('url');?>/account/?section=posts">Posts</a></li>
												<li><a href="<?php bloginfo('url');?>/account/?section=edit-profile">Edit Profile</a></li>
												<li><a href="<?php bloginfo('url');?>/account/?section=submit-post">New Article</a></li>
											</ul>
										</div>
								</li>
									<li><a class="logout-icon" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
								<?php } else { ?>
									<li><a class="login-icon" href="<?php bloginfo('url');?>/login/"  rel="home">Login</a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
