<!-- page.php

sert à afficher une Page.
La page a des informations différentes par rapport aux Posts (single.php) :
  - On enlève la catégorie
  - On enlève la date
  - On enlève les commentaires
-->

<?php 

get_header();

get_template_part('menu');

?>

</div> <!-- fermeture wrap -->


<div class="page">



<?php if (have_posts()) :?>
  <?php while (have_posts()) : the_post(); ?><!-- fait la boucle tant qu'il y a des posts :-->
   
   
   
<?php
    if(has_post_thumbnail())
    {
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
    }
    else 
    {
        $thumb_url[0] = get_bloginfo('template_url') . "/img/parallax-empty.jpg";
    } 
?>
<div class="bandeauTitre" style="background-image:url(<?php echo $thumb_url[0]; ?>);background-size:cover;background-position:center;">
    <div class="container">
        <h1><?php the_title(); ?></h1>        
    </div>
</div>  
   
   

<div class="container">
     
    <div class="pageContent">
        <?php the_content(); ?>
    </div>
  
  <?php endwhile;?>
<?php endif; ?>

</div>

<?php get_footer(); ?>