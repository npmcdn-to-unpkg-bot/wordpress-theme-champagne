<!--Loop for Portfolio-->


<?php 

get_header();

get_template_part('menu');

?>
</div> <!-- fermeture wrap -->

    <div class="singleChampagne">
    
    <?php if (have_posts()) :?>
     <!-- fait la boucle tant qu'il y a des posts :-->
      <?php while (have_posts()) : the_post(); ?>
        
<div class="container">
	<h1 class="colorTxt4"><?php the_title(); ?></h1>
</div>

<!-- ///////////// CHARGEMENT IMAGE PARALLAX -->

<div style="position:relative">
   <div style="position:absolute;z-index:-1;width:100%;">
    <section class="parallax-container">
            
            <!-- IMAGE DE FOND -->
            <?php 	// doc :	https://github.com/voceconnect/multi-post-thumbnails/wiki 
                    // 			https://github.com/voceconnect/multi-post-thumbnails/wiki/Frequently-Asked-Questions
            if (class_exists('MultiPostThumbnails')) : // Si le plugin Multi Post Thumbnails est installé
                if ( MultiPostThumbnails::has_post_thumbnail('champagne', 'champagne-fond-2') ) { // Si l'image à la une est renseignée dans le post, alors : ?>
                        <div class="parallax">
                            <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'champagne-fond-2', NULL, 'full-parallax'); // affiche l'image à la une concernée ?>
                        </div> <?php
                } 
                else { // si l'image à la une est vide dans le post, alors : ?>
                        <div class="parallax">
                            <img src="<?php bloginfo('template_url'); ?>/img/parallax-empty.jpg" alt="Parallax remplacement" />
                        </div>
            <?php } endif; ?>
        </section>
     </div>
        
	<section class="container">
		<div class="containerSingleChampTxt">
            <aside class="champBouteille">                  
                <?php
                // IMAGE DE LA BOUTEILLE
                if(has_post_thumbnail())
                    echo the_post_thumbnail('bouteille');
                    else 
                    {
                        $imgthumb = catch_that_image();
                        echo "<img src='".$imgthumb."' alt='".get_the_title()."'>";
                    } 
                ?>
            </aside>

            <article class="champContent z-depth-1">
                <p><?php the_content(); ?></p>
			</article>
		</div>
        <article class="secondText" data-sr="wait 0s, ease-in-out 20px, reset, vFactor 0.1">
                <?php $test = get_post_meta( $post->ID, '_custom_editor_1', true); echo $test; ?>
        </article>
    </section>
</div>                 

         

	

         
         
      <?php endwhile;?>
    <?php endif; ?>
</div>
<div class="wrap"> <!-- ouverture wrap -->

<?php get_footer(); ?>