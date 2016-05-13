<!-- possibilité de nommer cette page seulement taxonomy, mais la nommer taxonomy-cat-champ cible directement la catégorie concernée-->


<?php 

get_header(); 

get_template_part('menu');

?>
</div> <!-- fermeture wrap -->

<!-- BOUCLE QUI LISTE LES ARTICLES DE LA CATEGORIE, ET LES CLASSE PAR DATE DE CREATION -->

<?php if (have_posts()) :
    $i = 0; 
    while (have_posts()) : the_post(); // fait la boucle tant qu'il y a des posts :
	  
        $i++; 
        if(is_int($i / 2))
        {
            $alignement = 'alignGauche';
        }
        else{
            $alignement = 'alignDroite';
        }
    ?>

    <a href="<?php the_permalink();?>" class="presentation-champ waves-effect waves-light row hoverable">

        <div class="parallax-container">
            <div class="container">

                <div class="blocTxt col l5 valign-wrapper <?php echo $alignement; ?>">
                   <div class="col l1"></div>
                    <div class="col l10">
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                   <div class="col l1"></div>
                </div>
                
            </div>

            <?php 	// doc :	https://github.com/voceconnect/multi-post-thumbnails/wiki 
                    // 			https://github.com/voceconnect/multi-post-thumbnails/wiki/Frequently-Asked-Questions
            if (class_exists('MultiPostThumbnails')) : // Si le plugin Multi Post Thumbnails est installé
                if ( MultiPostThumbnails::has_post_thumbnail('champagne', 'champagne-fond-1') ) { // Si l'image à la une est renseignée dans le post, alors : ?>
                        <div class="parallax">
                            <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'champagne-fond-1', NULL, 'full-parallax'); // affiche l'image à la une concernée ?>
                        </div> <?php
                } 
                else { // si l'image à la une est vide dans le post, alors : ?>
                        <div class="parallax">
                            <img src="<?php bloginfo('template_url'); ?>/img/parallax-empty.jpg" alt="Parallax remplacement" />
                        </div>
            <?php } endif; ?>
        </div>
    </a>

    <?php endwhile;?>

<?php else : ?>
    <p class="rien">
        Il n'y a aucun Post à afficher
    </p>
<?php endif; ?>




<div class="wrap"> <!-- ouverture wrap -->

<?php get_footer(); ?>