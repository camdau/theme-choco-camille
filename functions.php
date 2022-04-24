<?php

function ajout_style()
{


    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css', array(), '1.1', 'all');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4', 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/custom.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('jquery-slim', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', [], 3.5, true);
    wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], 1.16, true);
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', [], 1.1, true);
}

add_action('wp_enqueue_scripts', 'ajout_style');

if (!function_exists('mytheme_register_nav_menu')) {

    function mytheme_register_nav_menu()
    {
        register_nav_menus(array(
            'left_menu' => __('Left Menu', 'text_domain'),
            'right_menu' => __('Right Menu', 'text_domain'),
            'mobile_menu' => __('Mobile Menu', 'text_domain'),
        ));
    }
    add_action('after_setup_theme', 'mytheme_register_nav_menu', 0);
}

add_theme_support('custom-logo', [
    'height'      => 146,
    'width'       => 262,

]);

add_filter('loop_shop_columns', 'filter_loop_shop_per_page', 10, 1);

function filter_loop_shop_per_page($products)
{
    $products = 3;
    return $products;
}

add_theme_support('woocommerce');

if (!function_exists('woocommerce_template_loop_product_title')) {

    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function woocommerce_template_loop_product_title()
    {
        echo '<h3 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . get_the_title() . '</h3>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}


register_sidebar(array(
    'id' => 'footer-info-col-1',
    'name' => 'Footer information 1',
    'before_widget'  => '<div class="footer-1">',
    'after_widget'  => '</div>',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
));

register_sidebar(array(
    'id' => 'footer-info-col-2',
    'name' => 'Footer information 2',
    'before_widget'  => '<div class="footer-2">',
    'after_widget'  => '</div>',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
));

register_sidebar(array(
    'id' => 'footer-info-col-3',
    'name' => 'Footer information 3',
    'before_widget'  => '<div class="footer-3">',
    'after_widget'  => '</div>',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
));

register_sidebar(array(
    'id' => 'reassurance',
    'name' => 'Reassurance',
    'before_widget'  => '<div class="reassurance">',
    'after_widget'  => '</div>',
    'before_title' => '<h3 class="reassurance-title">',
    'after_title' => '</h3>',
));

if (!function_exists('woocommerce_breadcrumb')) {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
}

function products_woo_function($atts)
{
    $atts = (array) $atts;
    $type = 'products_woo';

    // Allow list product based on specific cases.
    if (isset($atts['on_sale']) && wc_string_to_bool($atts['on_sale'])) {
        $type = 'sale_products';
    } elseif (isset($atts['best_selling']) && wc_string_to_bool($atts['best_selling'])) {
        $type = 'best_selling_products';
    } elseif (isset($atts['top_rated']) && wc_string_to_bool($atts['top_rated'])) {
        $type = 'top_rated_products';
    }

    $shortcode = new WC_Shortcode_Products($atts, $type);

    return $shortcode->get_content();
}

add_shortcode('products_woo', 'products_woo_function');

function getSavoirFaire($atts)
{
    $atts = (array) $atts;
    $args = array(
        'post_type' => 'savoir_faire',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'ID',
        'order' => 'ASC',
    );

    $loop = new WP_Query($args);
    //var_dump($loop);
    $html = '<div class="row">';
    $i = 0;
    while ($loop->have_posts()) : $loop->the_post();
        if ($i != 1) {
            $html .= '<div class="offset-md-6 col-md-6">';
        } else {
            $html .= '<div class="col-md-6">';
        }
        $html .= "<h3>" . get_the_title() . "</h3>";
        $html .= '<div class="row">';
        $html .= '<div class="col-md-7">';
        $html .= '<img src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '" class="img-fluid">';
        $html .= '</div>';
        $html .= '<div class="col-md-5">';
        $html .= get_the_content();
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $i++;
    endwhile;
    $html .= '</div>';

    wp_reset_postdata();

    return $html;
}

add_shortcode('savoir_faire', 'getSavoirFaire');


function slideChocolate($atts)
{
    $atts = (array) $atts;
    $args = array(
        'post_type' => 'slides',
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'orderby' => 'ID',
        'order' => 'ASC',
    );


    $loop = new WP_Query($args);
    //var_dump($loop); 
    $html = '<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">';
    $html .= '<ol class="carousel-indicators"';
    $count = $loop->post_count;
    for ($j = 0; $j < $count; $j++) {
        if ($j == 0) {
            $html .= '<li data-target="#carouselExampleCaptions" data-slide-to="' . $j . '" class="active"></li>';
        } else {
            $html .= '<li data-target="#carouselExampleCaptions" data-slide-to="' . $j . '"></li>';
        }
    }
    $html .= '</ol>';
    $html .= '<div class="carousel-inner">';
    $i = 0;
    while ($loop->have_posts()) : $loop->the_post();
        if ($i == 0) {
            $html .= '<div class="carousel-item active">';
        } else {
            $html .= '<div class="carousel-item">';
        }

        $html .= '<img src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '" class="d-block w-100 alt="' . get_the_title() . '">';
        $html .= '<div class="carousel-caption d-none d-md-block">';
        $html .= "<h5>" . get_the_title() . "</h5>";
        $link = get_field('link');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            $html .= '<p>' . get_the_content() . '<br> <a class="btn btn-danger" href="' . esc_url($link_url) . '" target=' . esc_attr($link_target) . '">' . esc_html($link_title) . '</a></p>';
        else :
            $html .= "<p>" . get_the_content() . "</p>";
        endif;
        $html .= '</div>';
        $html .= '</div>';
        $i++;
    endwhile;
    $html .= '</div>';
    $html .= '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>';
    $html .= '</div>';


    wp_reset_postdata();

    return $html;
}

add_shortcode('slide_chocolate', 'slideChocolate');


/**
 * Change number of related products output
 */
function woo_related_products_limit()
{
    global $product;

    $args['posts_per_page'] = 1;
    return $args;
}
add_filter('woocommerce_output_related_products_args', 'jk_related_products_args', 20);
function jk_related_products_args($args)
{
    $args['posts_per_page'] = 3; // 4 related products
    $args['columns'] = 1; // arranged in 2 columns
    return $args;
}



function getContact($atts)
{
    $atts = (array) $atts;
    $args = array(
        'post_type' => 'contact',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'ID',
        'order' => 'ASC',
    );

    $loop = new WP_Query($args);
    //var_dump($loop);
    $html = '<div class="row">';
    $i = 0;
    while ($loop->have_posts()) : $loop->the_post();
        if ($i != 1) {
            $html .= '<div class="col-md-4">';
        } else {
            $html .= '<div class="col-md-4">';
        }

        $html .= '<img src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '" class="img-fluid">';
        $html .= "<h3>" . get_the_title() . "</h3>";
        $html .= get_the_content();
        $html .= '</div>';

        $i++;
    endwhile;
    $html .= '</div>';

    wp_reset_postdata();

    return $html;
}

add_shortcode('contact', 'getContact');
add_filter('woocommerce_show_variation_price', function() {return TRUE;});
