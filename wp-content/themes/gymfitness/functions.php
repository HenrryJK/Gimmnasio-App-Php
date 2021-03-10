<?php 

function gymfitness_menus() { 
    register_nav_menus(array(
        'menu_principal' => __('Menu Principal' , 'gymfitness')
    ));
}

/// usamos un hook
add_action('init' , 'gymfitness_menus' );