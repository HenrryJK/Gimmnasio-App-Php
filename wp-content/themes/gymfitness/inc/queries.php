<?php 

    function gymfitness_lista_clases() { ?>
        <ul class="lista-clases">
            <?php
              $args = array(
                'post_type' => 'gymfitness_clases' ,
                'posts_per_page' => 10 
              /*  'orderby' => 'title', */
              /*  'order' => 'ASC' // ascendente */
              );
              /// imprmiendo como un loop y que muestre el contenido gracias al uso de  the_post() que contiene todo
              $clases = new WP_Query($args);
              while($clases -> have_posts()) : $clases -> the_post();
             ?>
             <li>
                <h1> <?php the_title(); ?></h1>   
             
              </li>


          <?php endwhile; wp_reset_postdata(); ?>

        </ul>

        <?php
    }


?>