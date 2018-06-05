<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spark_Body_and_Soul
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!--bootstrap cdn-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--font awesome cdn-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'spark' ); ?></a>
	  <nav class="navbar fixed-top navbar-expand-lg navbar-light">
	  <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_header_image() ?>" alt=""></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		  <?php 
					wp_nav_menu( array( 
						'menu' => '',
						'container' => 'div',
						'menu_class' => 'navbar-nav',
						'menu_id' => 'spark-menu',
						'theme_location'=>'spark-menu'
					) );
			?>
		  <div class="right-menu">
			  <ul class="navbar-nav">
				<?php if( !is_user_logged_in ): ?>
				<li class="nav-item login"><a class="nav-link" href="<?php echo home_url('login'); ?>">Login</a></li>
				<?php else: ?>
				<li><a class="nav-link" href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
				<?php endif; ?>
				<li class="nav-item dropdown">
				  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					  <i class="fas fa-shopping-cart"></i>
				  </a>
				  <ul class="dropdown-menu dropdown-menu-right">
					<li><a class="nav-link" href="<?php echo home_url('cart'); ?>">View Cart</a></li>
					<li><a class="nav-link" href="<?php echo home_url('products'); ?>">Shop More!</a></li>
					<li><a class="nav-link" href="<?php echo home_url('checkout'); ?>">Checkout</a></li>
					<li role="separator" class="divider"></li>
					<li><a class="nav-link" href="<?php echo home_url('appointments'); ?>">Appointments</a></li>
				  </ul>
				</li>
			  </ul>
		  </div>
	  </div> 
	  </nav>
	<div id="content" class="site-content">
