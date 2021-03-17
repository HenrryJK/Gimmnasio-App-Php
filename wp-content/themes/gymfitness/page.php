 <!-- <header class="site-header">
<h1>  Nombre del Sitio  </h1>

</header> -->

<?php get_header();  ?>
    <main class="contenedor pagina seccion con-sidebar">
        <div class="contenido-principal">
        <?php while( have_posts() ):the_post();?>

        <h1 class="text-center texto-primario"> <?php  the_title();   ?></h1>

        <?php  if(has_post_thumbnail()):
        /// despyes de la coma es por de alli defino una clase personalizada para poder darle estilos a la img
                the_post_thumbnail('blog' , array('class' => 'imagen-destacada'));
                endif;
            ?>

        <?php the_content(); ?>
        <?php  endwhile; ?>
        </div>
        
        <?php get_sidebar(); ?>

    </main>
    
    
   

<?php get_footer();  ?>