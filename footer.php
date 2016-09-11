
   
</div> <!-- fermeture wrap -->
</main> <!-- fermeture de main -->
    <footer class="page-footer colorBg2">
          <div class="container">
            <div class="row">
                <div class="col l3 s12">
                       <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Pied de page colonne 1') ) ?>
                </div>
                
              <div class="col l6 s12">
                   <div class="zoneLogoFooter">
                        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Pied de page colonne 2') ) ?>
                    </div>
              </div>
              
              <div class="col l3 s12">
                <h5 class="white-text">Links</h5>
                       <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Pied de page colonne 3') ) ?>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"> <i class="fa fa-twitter"></i></a></li>
                </ul>
                <p style="text-align:center;font-size:0.8em;margin:0;">Une création <a href="http://www.web-for-lyon.fr" target="blank">WebForLyon 2016</a></p>
            </div>
          </div>
        </footer>
        </div> <!-- fermeture conteneur pour loader -->
        <?php wp_footer();?>
        <script src="https://unpkg.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
</body>
</html>