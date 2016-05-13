jQuery(document).ready(function($){

    
    // retire les spans du Contact Form 7 pour la compatibilité avec Materialize
    var cf7input = $( ".wpcf7-form-control" );
    if ( cf7input.parent().is( "span" ) ) 
    {
        cf7input.unwrap();
    } 
    else 
    {
        cf7input.wrap( "<span></span>" );
    }
    jQuery('.form-group br').remove();
    
    
    // centrage du contenu widget introduction
	var window_width = $(window).width();
	var window_height = $(window).height();
	// logo introduction
	var widthImgIntro = $('.logoIntroFront').width();
	var heightImgIntro = $('.logoIntroFront').height();
	if(widthImgIntro >= window_width/3){
		$('.logoIntroFront').css({width:(window_width/3), height:'auto'});
	}
	if(heightImgIntro >= window_height/3){
		$('.logoIntroFront').css({height:(window_height/3), width:'auto'});
	}
	$('.intro_accueil').css({width:window_width, height:window_height});
    var intro_height = $('.intro_accueil').height();
    var cont_height = $('.intro_accueil > div').height();
    var cont_width = $('.intro_accueil > div').height();
    var ml_cont = (window_width - cont_width)/2;
    var mt_cont = (intro_height - cont_height) /2;
    $('.intro_accueil > div').css({position:'absolute',top:mt_cont});
	
	
	$(window).resize(function(){
		var window_width = $(window).width();
		var window_height = $(window).height();
		// logo introduction
		var widthImgIntro = $('.logoIntroFront').width();
		var heightImgIntro = $('.logoIntroFront').height();
		if(widthImgIntro >= window_width/3){
			$('.logoIntroFront').css({width:'33%', height:'auto'});
		}
		if(heightImgIntro >= window_height/3){
			$('.logoIntroFront').css({height:(window_height/3), width:'auto'});
		}
		
		$('.intro_accueil').css({width:window_width, height:window_height});
        var intro_height = $('.intro_accueil').height();
        var cont_height = $('.intro_accueil > div').height();
        var cont_width = $('.intro_accueil > div').height();
        var ml_cont = (window_width - cont_width)/2;
        var mt_cont = (intro_height - cont_height) /2;
        $('.intro_accueil > div').css({position:'absolute',top:mt_cont});
        posMenu = intro_height;
	});
    
	
	
    posMenu = intro_height;
	
	var menu_height = jQuery('#menu-banniere').height(); //détermine la hauteur du menu
	$('#remplace-nav').css({height: menu_height}); // ... l'applique sur son conteneur
    // Menu qui devient fixe au scroll
    jQuery(window).scroll(
        function($) {
            position = jQuery(window).scrollTop();
            if (position >= posMenu) {
                jQuery('#menu-banniere').addClass('posFixe');
				console.log('ok');
            } 
            else {
                jQuery('#menu-banniere').removeClass('posFixe');
            }
        }
    );
    
    
    // scroll en animation pour les ancres
    jQuery(function($) {
        $(document).ready(function() {
                $('a[href^=#]').click(function(){
                    event.preventDefault();
                    var nom_section = $(this).attr('href');
                    if(nom_section == '#')
                    {
                        $('html,body').animate({scrollTop:$('#accueil').offset().top},800).css({left:'0'});
                    }
                    else{
                        $('html,body').animate({scrollTop:$(nom_section).offset().top},800).css({left:'0'});                
                    }
                });
            });
    });
    
    
    // initialisation scrollReveal
    (function() {
        
        var config = {
            easing: 'ease-in 50px',
            reset:  true,
            delay:  'always',
            vFactor: 0.90,
            wait: 1.5
        }

        // init scroll-reveal
        window.sr = new scrollReveal(config);
        
     })(jQuery);
    
    
    
    // initialisation paralaxe
    $(document).ready(function(){
      $('.parallax').parallax();
    });
    
    // INITIALISATION CAROUSEL
    $(document).ready(function(){
        $('.carousel').carousel();
    });
    
    
    
    // initialisation masonry
    $('.grid').masonry({
      // options
      itemSelector: '.grid-item',
      columnWidth: 200
    });
    
	// initialisation masonry
	var $grid = $('.grid').imagesLoaded( function() {
	  // init Masonry after all images have loaded
	  $('.grid').masonry({
		// options...
		 // set itemSelector so .grid-sizer is not used in layout
		itemSelector: '.grid-sizer',
		// use element for option
		columnWidth: '.grid-item',
	  });
	});

	$.pageLoader();
    
}); // Fermeture jQuery
