<?php


//////////////// RETOUR A JQUERY 1.11.3

if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false, '1.11.3');
        wp_enqueue_script('jquery');
}

//////////////// IMPORTATION SCRIPT.JS

function loader_js(){
	wp_enqueue_script( 'page loader',
	get_template_directory_uri() . '/js/loader.js',
	array('jquery') ); 
}
add_action( 'wp_footer', 'loader_js' );

//////////////// scrollReveal.js
wp_enqueue_script( 'scroll-reveal', 'https://cdn.jsdelivr.net/scrollreveal.js/2.3.2/scrollReveal.min.js', array(), '', true );

//////////////// IMPORTATION materialize.min.js

function materialize_js(){
	wp_enqueue_script( 'script materialize',
	get_template_directory_uri() . '/js/bin/materialize.min.js',
	array('jquery') ); 
}
 
add_action( 'wp_footer', 'materialize_js' );

//////////////// IMPORTATION masonry.js (grilles fluides)

function masonry_js(){
	wp_enqueue_script( 'script masonry',
	get_template_directory_uri() . '/js/bin/masonry.pkgd.min.js',
	array('jquery') ); 
}
 
add_action( 'wp_footer', 'masonry_js' );


//////////////// IMPORTATION SCRIPT.JS

function theme_js(){
	wp_enqueue_script( 'script js',
	get_template_directory_uri() . '/js/script.js',
	array('jquery') ); 
}
 
add_action( 'wp_footer', 'theme_js' );


////////////////// MENUS ADMINISTRABLE DU SITE

register_nav_menus(array(
    'header' => 'Menu principal (header)',
    'footer' => 'Menu secondaire (footer)'
));

////////////////// ZONE DE WIDGET IMAGE D'ACCUEIL 

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'name' => 'Introduction',
        'before_widget' => '<div class="widget_intro">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));	
	}

////////////////// ZONE DE WIDGET  PARALLAXACCUEIL 

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'name' => 'Parallax accueil'
      ));	
	}

////////////////// ZONE DE WIDGET  PARALLAXACCUEIL 

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'name' => 'Présentation accueil',
        'before_widget' => '<div class="widgetPresentationAccueil colorBg2"><div class="container accueil" data-sr="wait 0s, ease-in-out 20px, reset, vFactor 0.1">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));	
	}

////////////////// ZONE DE WIDGET LOGO 

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'name' => 'Logo Menu',
        'before_widget' => '<div class="zoneWidgetAccueil">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));	
	}

////////////////// ZONE DE WIDGET NEWSLETTER 

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'name' => 'Zone Newsletter',
        'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));	
	}

////////////////// ZONE DE WIDGET FOOTER 1

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'name' => 'Pied de page colonne 1',
        'before_widget' => '<div class="widget_footer_1">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
      ));	
	}

////////////////// ZONE DE WIDGET FOOTER 2

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'name' => 'Pied de page colonne 2',
        'before_widget' => '<div class="widget_footer_1">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
      ));	
	}

////////////////// ZONE DE WIDGET FOOTER 3

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'name' => 'Pied de page colonne 3',
        'before_widget' => '<div class="widget_footer_1">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
      ));	
	}

//////////////// Image de remplacement si image à la une non définie

function catch_that_image() {
//	global $post;
//	$first_img = '';
//	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
//	$first_img = $matches [1] [0];
	if(empty($first_img)){
	$first_img = "http://localhost/theme-demo-1/wp-content/themes/theme-demo-1/img/background1-carre.jpg";
	}
	return $first_img;
}

//////////////// IMAGES A LA UNE

function montheme_setup() {
	add_theme_support( 'post-thumbnails', array( 'post','page', 'champagne') );
	set_post_thumbnail_size( 600, 600, true ); // largeur int, hauteur int, recadrage boolean
	add_image_size( 'square-small', 500, 500, true );
	add_image_size( 'bandeau', 1920, 600, true );
	add_image_size( 'cards', 500, 280, true );
	add_image_size( 'bouteille', 400, 1000, false );
	add_image_size( 'cards-list', 400, 400, false );
	add_image_size( 'full-parallax', 2000, 1333, true );
} 
add_action( 'after_setup_theme', 'montheme_setup' );


///////////////// IMAGES A LA UNE MULTIPLES

if (class_exists('MultiPostThumbnails')) {
 
//	new MultiPostThumbnails(array(
//		'label' => 'Seconde image à la Une',
//		'id' => 'secondary-image',
//		'post_type' => array('post')
//		 ) 
//	);
	new MultiPostThumbnails(array(
		'label' => 'Premier fond champagne',
		'id' => 'champagne-fond-1',
		'post_type' => 'champagne'
		 ) 
	);
	new MultiPostThumbnails(array(
		'label' => 'Deuxième fond champagne',
		'id' => 'champagne-fond-2',
		'post_type' => 'champagne'
		 ) 
	);
}

//////////////// TAILLE DES RESUMES D'ARTICLE

function new_excerpt_length($length) {
	return 25;
}
add_filter('excerpt_length', 'new_excerpt_length');


//////////////// FIN DES RESUMES D'ARTICLE

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


//////////////// AJOUTER UN CUSTOM POST TYPE POUR LES DIFFERENTS CHAMPAGNES

function create_post_type() {
  register_post_type( 'champagne',
    array(
      'labels' => array(
        'name' => __( 'Nos champagnes' ),
        'singular_name' => __( 'Produit' )
      ),
      'public' => true,
      'has_archive' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' )
    )
  );
}// Add Custom Category
add_action( 'init', 'create_post_type' );

//////////////// AJOUTER CATEGORIE TYPES DE CHAMPAGNE DANS CUSTOM POST CHAMPAGNE

function champagne_category() {
    register_taxonomy(
        'cat-champ',
        'champagne',
        array(
            'label' => __( 'Types de champagnes' ),
            'rewrite' => array( 'slug' => 'project-cat' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'champagne_category' );








////////////////////////////////////////////////////////
////////////////// PERSONNALISATION ADMIN & LOGIN LOGIN WEBFORLYON
////////////////////////////////////////////////////////

// Fonction qui insere le lien vers le css qui surchargera celui d'origine
function custom_login_css()  {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_url') . '/css/login.css" />';
}
add_action('login_head', 'custom_login_css');
// Filtre qui permet de changer l'url du logo
function custom_url_login()  {
    return 'http://www.webforlyon.fr/'; // On retourne l'index du site
}
add_filter('login_headerurl', 'custom_url_login');
// Filtre qui permet de changer l'attribut title du logo
function custom_title_login($message) {
    return 'WebForLyon, agence web et digitale qui connecte chaque entreprise avec ses clients !'; // On retourne la description du site
}
add_filter('login_headertitle', 'custom_title_login');
// Fonction qui permet d'ajouter du contenu juste au dessus de la balise 
function add_footer_login()  {
    echo '<p id="contact"><p id="contact">En cas de problème de connexion, veuillez <a href="http://www.webforlyon.fr/" target="blank">contacter le webmaster</a>.'; 
}
add_action('login_footer','add_footer_login');

////////////////// RETIRER LOGO WP DE LA BARRE D'ADMINISTRATION

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

////////////////// AJOUTER FEUILLE DE STYLE A L'ADMIN

function admin_css() {
    $admin_handle = 'admin_css';
    $admin_stylesheet = get_template_directory_uri() . '/css/admin.css';
    wp_enqueue_style( $admin_handle, $admin_stylesheet );
}
add_action('admin_print_styles', 'admin_css', 11 );

////////////////// CACHER VERSION WP

remove_action('wp_head', 'wp_generator');






// CHARGEMENT WIDGETS EXTERNES

require_once (TEMPLATEPATH . '/widget/widget_image.php');
require_once (TEMPLATEPATH . '/widget/widget_intro.php');
require_once (TEMPLATEPATH . '/widget/widget_parallax_accueil.php');
require_once (TEMPLATEPATH . '/widget/widget_carousel.php');
require_once (TEMPLATEPATH . '/widget/second_editeur_champ.php');





function numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="hoverable waves-effect waves-block waves-light">%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li class="hoverable waves-effect waves-block waves-light">…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li class="hoverable waves-effect waves-block waves-light">…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="hoverable waves-effect waves-block waves-light">%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}
