<?php
/*
Template Name: Contact
*/
?>

<?php 

get_header();

get_template_part('menu');

?>

<!-- Google Map -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?"></script>
<script type="text/javascript">
    function initialiser() {


      var latlng = new google.maps.LatLng(45.764970, 4.836913);
        var isDraggable = window.innerWidth > 700 ? true : false;
      //objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant
      //de définir des options d'affichage de notre carte
      var options = {
        scrollwheel: false,
        draggable: isDraggable,
        center: latlng,
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        streetViewControl: false,
      };

      //constructeur de la carte qui prend en paramêtre le conteneur HTML
      //dans lequel la carte doit s'afficher et les options
      var carte = new google.maps.Map(document.getElementById("carte"), options);

      //--> Configuration de l'icône personnalisée
      var image = {
          // Adresse de l'icône personnalisée
          url: '../wp-content/themes/theme-demo-1/img/logo-map.svg',
          // Taille de l'icône personnalisée
          size: new google.maps.Size(100, 100),
          // Origine de l'image, souvent (0, 0)
          origin: new google.maps.Point(0,0),
          // L'ancre de l'image. Correspond au point de l'image que l'on raccroche à la carte. Par exemple, si votre îcone est un drapeau, cela correspond à son mâts
          anchor: new google.maps.Point(30, 76)
      };

      var marker = new google.maps.Marker({
          position: new google.maps.LatLng(45.764970, 4.836913),
          map: carte,
          title:"Agence 33 Degrès, 33 rue de la Bourse - 69002 LYON",
          // On définit l'icône de ce marker comme étant l'image définie juste au-dessus
          icon: image,
          zIndex: -100
      });
      var infowindow = new google.maps.InfoWindow({
          content: "<p style=\"color:black\">Agence 33 Degrés</p><p><a href=\"tel:+33472157149\" style=\"color:black;font-weight:100\">+33 (0) 4 72 15 71 49</a></p><p><a href=\"https://www.google.fr/maps/dir//33+Rue+de+la+Bourse,+69002+Lyon/@45.7648725,4.834837,17z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x47f4eaf89292dd25:0x3b529c7212c65890!2m2!1d4.837031!2d45.7648725\" style=\"color:black;font-weight:100;text-decoration:underline\">Calculer mon itinéraire</a></p>",
          backgroundColor: 'rgb(0,255,255)',
          size: new google.maps.Size(300, 300)
      });
      google.maps.event.addListener(marker, 'click', function(){
          infowindow.open(carte,marker);
      });
    }
</script>

</div> <!-- fermeture wrap -->


<div class="page contact">



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


        <div class="row pageContent">
            <div class="col m6 s12">
              <div class="postContent">
                <?php the_content(); ?>
              </div>
            </div> <!-- fermeture col 6 -->

          <?php endwhile;?>
        <?php endif; ?>

            <div class="col m6 s12">
                <?php echo do_shortcode("[contact-form-7 id=\"93\" title=\"Formulaire de contact 1\"]"); ?>
            </div> <!-- fermeture col 6 -->

        </div>
    </div>
    <!-- MAP -->
    <section id="map" class="mt-section">
        

        <div id="carte"></div>

    </section>
</div>
<?php get_footer(); ?>



