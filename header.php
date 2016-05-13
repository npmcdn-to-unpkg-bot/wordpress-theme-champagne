<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<!--	<link rel="profile" href="http://gmpg.org/xfn/11">-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/sass/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
<!--	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>-->
  
 <?php wp_head();?>
 <!-- function Wp indispensable qui permet aux plugins d'insérer le code dans le <head> -->
</head>


<body onload="initialiser()">
<div id="chargement">
	Chargement...
	<span id="chargement-infos">
		
	</span>
	<div class="progress">
      <div class="indeterminate"></div>
  </div>
</div>
<div class="conteneur"><!-- conteneur pour loader -->