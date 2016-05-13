<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<!--	<link rel="profile" href="http://gmpg.org/xfn/11">-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/sass/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
 <?php wp_head();?>
 <!-- function Wp quasi indispensable qui permet aux plugins d'insérer le code dans le <head> -->
</head>


<body>
	<img src="<?php bloginfo('template_url'); ?>/img/login/logo-pastille-webforlyon.svg" alt="Logo Webforlyon" width="400" height="400" /><br />
	<a href="<?php echo bloginfo('url') ?>">Retourner à l'accueil du site</a><br />
	<a onclick="history.back()">Revenir en arrière</a>
</body>


</html>