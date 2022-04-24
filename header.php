<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans&display=swap" rel="stylesheet"> 
  <?php wp_head(); ?>
</head>

<body>

  <header id="header">
    <div class="container">
      <div class="row desktop-menu">
        <div class="col-md-3 left-menu">
          <?php wp_nav_menu($args = array(
            'menu'              => "", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
            'menu_class'        => "", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
            'menu_id'           => "", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
            'container'         => "", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
            'container_class'   => "", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
            'container_id'      => "", // (string) The ID that is applied to the container.
            'theme_location'    => "left_menu", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.

          )); ?>
        </div>
        <div class="col-md-3 logo">
          <?php $custom_logo_id = get_theme_mod('custom_logo');
          $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
          ?>
          <a href="<?php echo get_home_url(); ?>">
          <img src="<?php echo $logo[0]; ?> " alt="" class="img-fluid">
          </a>
        </div>
        <div class="col-md-5 right-menu"> <?php wp_nav_menu($args = array(
                                            'menu'              => "", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                                            'menu_class'        => "", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                                            'menu_id'           => "", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                                            'container'         => "", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                                            'container_class'   => "", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                                            'container_id'      => "", // (string) The ID that is applied to the container.
                                            'theme_location'    => "right_menu", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.

                                          )); ?>
        </div>

        <div class="col-md-1 cart">
          <?php
          global $woocommerce;
          ?>

          <a href="<?php echo wc_get_cart_url();?>" class="cart-link">
          <i class="fas fa-shopping-basket"></i>
          <i class="fas fa-comment absolute white"></i>
          <span class="count-cart">
            <?php echo $woocommerce->cart->cart_contents_count;?> 
          </span>
          </a>
        </div>
      </div>
      
      <div class="mobile-menu">
        <div class="row z-3">
          <div class="col-3">
        <a href="<?php echo get_home_url(); ?>">
          <img src="<?php echo get_template_directory_uri() ?>/images/mobile.png " alt="" class="img-fluid">
          </a>
        </div>
        <div class="col-3">
          <a href="" class="txt-black">
           <i class="fas fa-user-circle"></i>
          </a>
        </div>
        <div class="col-3" >
        <a href="" class="txt-black">
           <i class="fas fa-shopping-basket"></i>
          </a>
        </div>
        <div class="col-3">
          <a href="" class="menu-mobile text-white">
            <i class="fas fa-bars"></i>
          </a>
        </div>
        </div>
        

        <div class="menu">
          <?php wp_nav_menu($args = array(
                                              'menu'              => "", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                                              'menu_class'        => "", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                                              'menu_id'           => "", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                                              'container'         => "", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                                              'container_class'   => "", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                                              'container_id'      => "", // (string) The ID that is applied to the container.
                                              'theme_location'    => "mobile_menu", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.

                                            )); ?>
        </div>

      </div>
    </div>
  </header>