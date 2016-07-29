<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saudacor
 */
$bodyClass='';
if(has_nav_menu( 'top-extra' )){
	$bodyClass="give-extra";
}


?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1"/>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">



<!-- Favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/favicon-16x16.png">
<link rel="manifest" href="/saudacor-wp/wp-content/themes/saudacor/img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/saudacor-wp/wp-content/themes/saudacor/img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- /Favicon -->
<?php wp_head(); ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


</head>

<body <?php body_class($bodyClass); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'saudacor' ); ?></a>
	 
	
	<nav class="navbar navbar-default navbar-fixed-top">
	<?php if ( has_nav_menu( 'top-extra' ) ) { ?>
    	<header class="top-extra bottom-thin">
    		<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'top-extra' ) ); ?>    			
    		</div>
		</header>
	<?php } ?>
	  <div class="nav-container">
	  	<div class="container">	  		
	  	
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapse" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="menu-label">Menu</span>
		      </button>
		      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home' class="navbar-brand">
		      	<img src='<?php echo esc_url( get_theme_mod( 'saudacor_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
		      </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="menu-collapse">
		    	<div class="search-toggle">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</div>

				<?php 
				   /**
					* Displays a navigation menu
					* @param array $args Arguments
					*/
					$args = array(
						'theme_location' => 'primary',
						'menu' => '',
						'container' => 'menu-collapse',
						'container_class' => 'collapse navbar-collapse',
						'container_id' => '',
						'menu_class' => 'nav navbar-nav navbar-right',
						'menu_id' => '',
						'echo' => true,
						'fallback_cb' => 'wp_page_menu',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
						'depth' => 0,
						'walker' => new wp_bootstrap_navwalker()
					);
				
					wp_nav_menu( $args );
				?>
				<div class="search-form-container">
			    	<?php get_search_form(); ?>
			    </div>
		    </div><!-- /.navbar-collapse -->	
	    </div>    
	  </div><!-- /.container -->
	  
	</nav>