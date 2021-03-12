<?php 
/// menus creados que son de navegacion 
function gymfitness_menus() { 
    register_nav_menus(array(
        'menu-principal' => __('menus principal' , 'gymfitness')
    ));
}

/// usamos un hook
add_action('init' , 'gymfitness_menus' );

//Scrips y Styles
function gymfitness_scripts_styles() {
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

    wp_enqueue_style('googleFont','https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Raleway:wght@100&family=Staatliches&display=swap', array(), '1.0.0');
   
   
        /// hoja de estilos 
      wp_enqueue_style('styles', get_stylesheet_uri(), array('normalize'), '1.0.0');
}

add_action( 'wp_enqueue_scripts' , 'gymfitness_scripts_styles' );