<?php while( have_posts() ):the_post();?>

<h1 class="text-center texto-primario"> <?php  the_title();   ?></h1>

<?php  if(has_post_thumbnail()):
/// despyes de la coma es por de alli defino una clase personalizada para poder darle estilos a la img
        the_post_thumbnail('blog' , array('class' => 'imagen-destacada'));
        endif;
    ?>

   <?php 
   // revisar si los costum post type  es clases
    if(get_post_type() === 'gymfitness_clases'){
   
        $hora_inicio = get_field('hora_inicio');
        $hora_fin = get_field('hora_fin');
      ?>
       <p class="imformacion-clase"><?php the_field('dias_clase') ?> - <?php echo $hora_inicio . " a " . $hora_fin; ?></p>
    <?php  } ?> 



<?php the_content(); ?>
<?php  endwhile; ?>