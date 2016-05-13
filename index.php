<?php


get_header();

if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Introduction') );

get_template_part('menu');

get_template_part('accueil');

get_footer();

?>