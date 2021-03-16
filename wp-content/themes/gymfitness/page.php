 <!-- <header class="site-header">
<h1>  Nombre del Sitio  </h1>

</header> -->

<?php get_header();  ?>

<?php while( have_posts() ):the_post();?>

<h1> <?php  the_title();   ?></h1>

<?php  if(has_post_thumbnail()):
        the_post_thumbnail();
        endif;
    ?>

<?php the_content(); ?>
Escrito por : <?php the_author(); ?>

Escrito Fecha : <?php the_Date(); ?>

<?php  endwhile; ?>
<?php get_footer();  ?>