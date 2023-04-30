<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title(); ?></title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body>
	<div class="site-wrapper">
        <header class="site-header">
                <?php if ( is_single() ) : ?>
                        <p class="site-title"><a href="<?php echo home_url(); ?>">Properties Offers</a></p>
                <?php else : ?>
                        <h1 class="site-title"><a href="<?php echo home_url(); ?>">Properties Offers</a></h1>
                <?php endif; ?>
        </header>
        <div class="header-nav-menu">
                <?php
                if ( has_nav_menu( 'primary_menu' ) ) {
                        wp_nav_menu(
                                array(
                                        'theme_location' => 'primary_menu',
                                )
                        );
                }
                ?>
        </div>
