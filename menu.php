 <!--<nav>
    <div class="nav-wrapper" style="margin-top:100px;">
      <a href="#!" class="brand-logo">Logo</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Sass</a></li>
        <li><a href="#">Components</a></li>
        <li><a href="#">Javascript</a></li>
        <li><a href="#">Mobile</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="#">Sass</a></li>
        <li><a href="#">Components</a></li>
        <li><a href="#">Javascript</a></li>
        <li><a href="#">Mobile</a></li>
      </ul>
    </div>
  </nav>-->
    <!-- MENU GENERE DANS L'ADMIN -->
  <header>
<!--  <div class="row">-->
   <div id="remplace-nav"> 
    <nav id="menu-banniere">
       <div class="nav-wrapper colorBg2 hoverable">
          <div class="container">
           <!-- Logo entreprise -->
            <a href="<?php bloginfo('url'); ?>" class="brand-logo">
                <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Logo Menu') ) ?>
            </a>
      		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            
            <?php get_nav_menu();

            class My_Walker_Nav_Menu extends Walker_Nav_Menu {
              function start_lvl(&$output, $depth) {
                $indent = str_repeat("\t", $depth);
                $output .= "\n$indent<ul id=\"dropdown1\" class=\"sousmenu-".$depth." sub-menu\">\n";
              }
            }
           
            function get_nav_menu() {
                $navMenuDefaults = array(
                'theme_location'  => 'header',
                'menu'            => '',
                'container'       => false,
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'right hide-on-med-and-down',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => false,
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => new My_Walker_Nav_Menu()
            );
                return wp_nav_menu($navMenuDefaults);
            }
            
		   
		   // Version mobile
           get_nav_menu_mobile();
            function get_nav_menu_mobile() {
                $navMenuDefaults = array(
                'theme_location'  => 'header',
                'menu'            => '',
                'container'       => false,
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'side-nav',
                'menu_id'         => 'mobile-demo',
                'echo'            => true,
                'fallback_cb'     => false,
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => new My_Walker_Nav_Menu()
            );
                return wp_nav_menu($navMenuDefaults);
            }
           ?>
        </div>
        </div>
    </nav>
   </div> <!-- fin remplace-nav -->
<!--   </div>  fin row menu -->
</header>

<main>


    <div class="container">

