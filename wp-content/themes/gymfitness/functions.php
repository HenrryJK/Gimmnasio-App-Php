<?php 
/// menus creados que son de navegacion 
function gymfitness_menus() { 
    register_nav_menus(array(
        'menu_principal' => __('Menu Principal' , 'gymfitness')
    ));
}

/// usamos un hook
add_action('init' , 'gymfitness_menus' );

//Scrips y Styles
function gymfitness_scripts_styles() {
    wp_enqueue_style('styles', get_stylesheet_uri(), array(), '1.0.0');
}

add_action( 'wp_enqueue_scripts' , 'gymfitness_scripts_styles' );