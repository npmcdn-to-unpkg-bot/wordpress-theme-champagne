<!-- ///////////////////////////// BOUCLE D'ARTICLES AVEC CARTES PAGE D'ACCUEIL /////////////////////////// -->

    
<div class="row">
	<h3 style="text-align:center;font-family: 'Tangerine', cursive; font-size:5em" class="colorTxt4">Retrouvez nos dernières actualités</h3>
</div>
	
	
<div class="row" data-sr="wait 0s, ease-in-out 20px, reset, vFactor 0.1">
		<?php
			$recentPosts = new WP_Query();
			$recentPosts->query('cat&showposts=3');
		?>

		<?php if ($recentPosts->have_posts()) :?>

		<!--
		Si j'ai des Posts, affiche "affichage des posts"
		-->
		  <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?><!-- fait la boucle tant qu'il y a des posts :-->
		  
<div class="col l4 s12">
    <div class="card hoverable">
        <div class="card-image waves-effect waves-block waves-light">
           <a href="<?php the_permalink();?>">
            <?php if(has_post_thumbnail())
                echo the_post_thumbnail('cards');
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
          <p><a href="<?php the_permalink();?>" class="white-text">This is a link</a></p>
        </div>
        <div class="card-reveal colorBg3">
          <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
          <p><?php the_excerpt();?></p>
        </div>
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