<?php 
//  Consultas Reutilizables 
require get_template_directory() . '/inc/queries.php';


//Cuando el temas es Activado
function gymfitness_setup() {
    // habilita las imagenes destacadas
    add_theme_support( 'post-thumbnails' );
    // agregando imagenes de tamaño personalizado
    add_image_size( 'square',350 ,350 ,true  );
    add_image_size( 'portrait',350 ,724 ,true  );
    add_image_size( 'cajas',400 ,375 ,true  );
    add_image_size( 'mediano',700 ,400 ,true  );
    add_image_size( 'blog',966 ,644 ,true  );
}
add_action('after_setup_theme' , 'gymfitness_setup');


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
    wp_enqueue_style('slicknavCSS', get_template_directory_uri() .  '/css/slicknav.min.css' ,array(), '1.0.0');

    wp_enqueue_style('googleFont','https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Raleway:wght@100&family=Staatliches&display=swap', array(), '1.0.0');

        /// LIGHTBOX2 Importandolo
        if(is_page('galeria')):
        wp_enqueue_style('lightboxCSS', get_template_directory_uri() .  '/css/lightbox.min.css' ,array(), '2.11.3');
        endif;
       
        wp_enqueue_style('slicknavCSS', get_template_directory_uri() .  '/css/slicknav.min.css' ,array(), '1.0.0');
        /// hoja de estilos 
      wp_enqueue_style('styles', get_stylesheet_uri(), array('normalize' , 'googleFont'), '1.0.0');
      wp_enqueue_script('slicknavJs', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);
      wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery' , 'slicknavJs'), '1.0.0', true);
      
      if(is_page('galeria')):
      wp_enqueue_script('lightboxJs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.3', true);
      endif;
    
    }

    add_action( 'wp_enqueue_scripts' , 'gymfitness_scripts_styles' );
         
    // Declarando funcion para tener un widgets

        function gymfitness_widgets() {
            register_sidebar( array( 
            'name' => 'Sidebar 1' ,
            'id' =>   'sidebar_1',
            'before_widget' => '<div class="widget">',
            'after_widget' =>  '</div>',
            'before_title' => '<h3 class="text-center texto-primario">',
            'after_title' => '</h3>'

            ));

            register_sidebar( array( 
                'name' => 'Sidebar 2' ,
                'id' =>   'sidebar_2',
                'before_widget' => '<div class="widget">',
                'after_widget' =>  '</div>',
                'before_title' => '<h3 class="text-center texto-primario">',
                'after_title' => '</h3>'
    
                ));
        }

        //esto es un hook 
        add_action( 'widgets_init', 'gymfitness_widgets'  );




/// Creating a custom endpoint

/* add_action( 'rest_api_init', 'my_register_route' );

function my_register_route() {
    register_rest_route( 'my-route', 'my-phrase', array(
                    'methods' => 'GET',
                    'callback' => 'custom_phrase',
                )
            );
}

function custom_phrase() {
    return rest_ensure_response( 'Hello World! This is my first REST API' );
}
*/


/// Restricting access to the endpoint 


/* add_action( 'rest_api_init', 'my_register_route' );

function my_register_route() {
    register_rest_route( 'my-route', 'my-phrase', array(
                    'methods' => 'GET',
                    'callback' => 'custom_phrase',
                    'permission_callback' => function() {
                            return current_user_can( 'edit_posts' );
                        },
                )
            );
}

function custom_phrase() {
    return rest_ensure_response( 'Hello World! This is my first REST API' );
}

*/

//Fetching WordPress data using an endpoint 

/* add_action( 'rest_api_init', 'my_register_route');

function my_register_route() {
            
        register_rest_route( 'my-route', 'my-posts', array(
                'methods' => 'GET',
                'callback' => 'my_posts',
               // 'permission_callback' => function() {
               //    return current_user_can( 'edit_others_posts' );
                 //   },  

        ));
}
   
function my_posts() {
            
    // default the author list to all
    $post_author = 'all';

    // get the posts
    $posts_list = get_posts( array( 'type' => 'post', 'author' => $post_author ) );
    $post_data = array();

    foreach( $posts_list as $posts) {
        $post_id = $posts->ID;
        $post_author = $posts->post_author;
        $post_title = $posts->post_title;
        $post_content = $posts->post_content;

        $post_data[ $post_id ][ 'author' ] = $post_author;
        $post_data[ $post_id ][ 'title' ] = $post_title;
        $post_data[ $post_id ][ 'content' ] = $post_content;

    }

    wp_reset_postdata();

    return rest_ensure_response( $post_data );
}
*/

add_action( 'rest_api_init', 'my_register_route');
function my_register_route() {
            
      register_rest_route( 'my-route', 'my-posts/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => 'my_posts',
            'args' => array(
                    'id' => array( 
                        'validate_callback' => function( $param, $request, $key ) {
                            return is_numeric( $param );
                        }
                    ),
                ),
           // 'permission_callback' => function() {
           //     return current_user_can( 'edit_others_posts' );
           //     }, 
        ));
}
   
function my_posts( $data ) {
            
    // default the author list to all
    $post_author = 'all';
    
    // if ID is set
    if( isset( $data[ 'id' ] ) ) {
          $post_author = $data[ 'id' ];
    }
    
    // get the posts
    $posts_list = get_posts( array( 'type' => 'post', 'author' => $post_author ) );
    $post_data = array();
            
    foreach( $posts_list as $posts) {
        $post_id = $posts->ID;
        $post_author = $posts->post_author;
        $post_title = $posts->post_title;
        $post_content = $posts->post_content;
        
        $post_data[ $post_id ][ 'author' ] = $post_author;
        $post_data[ $post_id ][ 'title' ] = $post_title;
        $post_data[ $post_id ][ 'content' ] = $post_content;
    }
            
    wp_reset_postdata();
            
    return rest_ensure_response( $post_data );
}






