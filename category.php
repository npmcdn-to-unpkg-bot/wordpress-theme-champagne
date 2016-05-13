<?php

get_header();


get_template_part('menu');

?>

<?php if (have_posts()) : ?>

<div class="row grid">
    
    <?php while (have_posts()) : the_post(); // fait la boucle tant qu'il y a des posts : ?>
    <div class="grid-item">
    <div class="card hoverable">
        <div class="card-image waves-effect waves-block waves-light">
           <a href="<?php the_permalink();?>">
            <?php if(has_post_thumbnail())
                echo the_post_thumbnail('cards-list');
                else 
                {
                $imgthumb = catch_that_image();
                echo "<img src='".$imgthumb."' alt='".get_the_title()."'>";
                }
            ?>
            </a>
        </div>
        <div class="card-content colorBg1">
          <span class="card-title activator grey-text text-darken-4"><?php the_title(); ?><i class="material-icons right">more_vert</i></span>
          <p><a href="<?php the_permalink();?>" class="white-text">Lire l'article</a></p>
        </div>
        <div class="card-reveal colorBg1">
          <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
          <p><?php the_excerpt();?></p>
          <br />
          <a href="<?php the_permalink();?>" class="waves-effect waves-light btn colorBg2" style="margin:0 auto;"><i class="material-icons right">play_arrow</i>lire</a>
        </div>
      </div>
</div>

    <?php endwhile;?>

</div>    
    <?php numeric_posts_nav(); ?>
    
<?php else : ?>
    <p class="rien">
        Il n'y a aucun Post à afficher
    </p>
<?php endif; ?>

<?php
get_footer();
?>