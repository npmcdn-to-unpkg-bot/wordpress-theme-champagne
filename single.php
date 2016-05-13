<!-- single.php

page template qui sert à afficher un Post

-->



<!--/////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////-->
<!--//////////////////////// ISSU DE PHOTODIDACTE SANS MODIFS ///////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////-->


<?php 

get_header();

get_template_part('menu');

?>

<div class="main">
    <div class="single">
    <?php if (have_posts()) :?>
      <?php while (have_posts()) : the_post(); ?><!-- fait la boucle tant qu'il y a des posts :-->
        <div class="post">
            <div class="aligncenter"> <!-- Crée dedans une div... -->
                <h1 class="post-title-single"><!--...contenant un h1  -->
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="alignright">
              <p class="post-info-single">Publié le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author();?>.</p>
            </div> 
          <div class="post-content">
            <?php the_content(); ?>
          </div>
          <br>
            <p class="sources">
            <?php
                $key = "Sources";
                $thumb = get_post_meta($post->ID, $key, true);
                if (!$thumb){
                    echo "";
                }else{
                    echo "Sources : " .$thumb;
                }
            ?>
            </p>
          <p class="auteur"><?php the_author();?></p>
          <div class="post-comments">
            <?php comments_template();?>
          </div>
        </div><!-- Fermeture de Post -->
      <?php endwhile;?>
    <?php endif; ?>
    </div> <!-- fermeture de main single -->
</div>


<?php get_footer(); ?>


