</div> <!-- fermeture wrap-->
  
<!-- WIDGET PARALLAX ACCUEIL -->
   <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Parallax accueil') ); ?>
   
   <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Présentation accueil') ); ?>
    
    

<div class="container accueil">
    
<!-- BOUCLE D'ARTICLES PAGE D'ACCUEIL -->
    
<div class="row" data-sr="wait 0s, ease-in-out 20px, reset, vFactor 0.1">
	<h3 style="text-align:center;font-family: 'Tangerine', cursive; font-size:5em" class="colorTxt4">Retrouvez nos dernières actualités</h3>
</div>
	
	
<div class="row" data-sr="wait 0s, ease-in-out 20px, reset, vFactor 0.1">
		<?php
			$recentPosts = new WP_Query();
			$recentPosts->query('cat&showposts=2');
		?>

		<?php if ($recentPosts->have_posts()) :?>

		<!--
		Si j'ai des Posts, affiche "affichage des posts"
		-->
		  <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?><!-- fait la boucle tant qu'il y a des posts :-->
		  
        <div class="col l6 m6 s12 postAccueil">
            <div class="actuHome waves-effect waves-block waves-light">
            <a href="<?php the_permalink();?>">
                <?php
                    if(has_post_thumbnail())
                        echo the_post_thumbnail( 'square-small', array( 'class' => 'z-depth-1 col l5 hoverable' ) );
                        else 
                        {
                        $imgthumb = catch_that_image();
                        echo "<img src='".$imgthumb."' alt='".get_the_title()."'>";
                    }
                ?>
            </a>
                <h3 class="colorTxt4"><?php the_title(); ?></h3>
                <p><?php the_excerpt();?></p>
                <a href="<?php the_permalink();?>" class=" colorBg1 waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>lire</a>
            </div>
        </div>
	  	
		<?php endwhile;?>
		  
		<?php else : ?>
	  
		  <p class="rien">
			Il n'y a aucun Post à afficher
		  </p>
		
		<?php endif; ?>
		

		<?php // Reset Query
		wp_reset_query(); ?>
		
		<div class="clearboth"></div>
		
</div> <!-- fermeture row -->
		
<!--
<div class="carousel carousel-slider">
    <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/800/400/food/1"></a>
    <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/800/400/food/2"></a>
    <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/800/400/food/3"></a>
    <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/800/400/food/4"></a>
</div>
-->

<!-- ZONE DE WIDGET PAGE d'ACCUEIL -->

<div class="row" data-sr="wait 0s, ease-in-out 20px, reset, vFactor 0.1">
    <div class="col l12">
        <div class="card-panel colorBg1 hoverable">
            <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Zone Newsletter') ) ?>
        </div>
    </div>
</div>



<div class="row">
        <h2>Palette couleurs</h2>
    <div class="colorBg1 palette"></div>
    <div class="colorBg2 palette"></div>
    <div class="colorBg3 palette"></div>
    <div class="colorBg4 palette"></div>
    <div class="colorBg5 palette"></div>
    <div class="colorBg6 palette"></div>
</div>