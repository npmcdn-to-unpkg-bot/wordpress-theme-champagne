<?php


/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("pu_media_upload_widget");' ) );

class pu_media_upload_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'pu_media_upload',
            'description' => 'Widget de l\'image d\'introduction de la page d\'accueil.'
        );

        parent::__construct( 'pu_media_upload', 'Introduction accueil', $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }

    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
//        wp_enqueue_script('upload_media_widget', theme_url(__FILE__) . 'theme-demo-1/js/upload-media.js', array('jquery'));

        wp_enqueue_style('thickbox');
        wp_enqueue_media();
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )
    {
        // Add any html to output the image in the $instance array
    ?>
    <div class="intro_accueil" style="background-image:url( <?php echo $instance['image']; ?> )">
               <div>
                   <?php if(!empty($instance['title'])){ ?><h2 class="white-text"><?php echo $instance['title']; ?></h2> <?php } ?>
                   <div style="width:100%; text-align:center">
                   		<img src="<?php echo $instance['logo']; ?>" alt="Logo" class="logoIntroFront">
                   </div>
                   <p><a href="#menu-banniere" class="white-text waves-effect waves-light"><?php echo $instance['bouton']; ?></a><br>&#x25bc;</p>
               </div>
           </div>
    <?php
    }
    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {
//        $title = __('Widget Image');
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }
//        $bouton = __('Widget Image');
        if(isset($instance['bouton']))
        {
            $bouton = $instance['bouton'];
        }

//        $image = '';
        if(isset($instance['logo']))
        {
            $logo = $instance['logo'];
        }

//        $logo = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }
        ?>
        <p> <!-- TEXTE -->
            <label for="<?php echo $this->get_field_name( 'title' ); ?>">Texte (optionnel) :</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p> <!-- LOGO -->
            <label for="<?php echo $this->get_field_name( 'logo' ); ?>"><?php _e( 'Logo :' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'logo' ); ?>" id="<?php echo $this->get_field_id( 'logo' ); ?>" class="widefat logoIntro" type="text" size="36"  value="<?php echo esc_url( $logo ); ?>" />
            <input class="upload_image_button logoIntro" type="button" value="Charger votre logo" />
        </p>
        
        <p> <!-- BOUTON -->
            <label for="<?php echo $this->get_field_name( 'bouton' ); ?>">Bouton :</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'bouton' ); ?>" name="<?php echo $this->get_field_name( 'bouton' ); ?>" type="text" value="<?php echo esc_attr( $bouton ); ?>" />
        </p>

        <p> <!-- IMAGE BACKGROUND -->
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image :' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat imgFondInput" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button imgIntroButton" type="button" value="Charger une image" />
        </p>
        <script>
			
			jQuery(document).ready( function(){
				function media_upload(mediaclass) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					jQuery('body').on('click',mediaclass, function(e) {
                        console.log(this);
						var button_id ='.'+jQuery(this).attr('class');
						var self = jQuery(button_id);
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = jQuery(button_id);
						_custom_media = true;
                        var that = jQuery(this);
						wp.media.editor.send.attachment = function(that){
                                console.log(that);
							if ( _custom_media  ) {
                                var url_img = jQuery('.visible .attachment-details .setting[data-setting="url"] input').val();
                                console.log(url_img);
                                if(that.hasClass('imgIntroButton'))
                                {
                                    console.log('yeah');
                                    jQuery('.imgFondInput').val(url_img);  
                                }
                                else if(that.hasClass('logoIntro'))
                                {
                                    console.log('yeah');
                                    jQuery('.logoIntro').val(url_img);  
                                }
							} else {
								return _orig_send_attachment.apply( button_id, [props, attachment] );
							}
						}
						wp.media.editor.open(button);
						return false;
					});
				}
				media_upload('.upload_image_button');
			});
        </script>
    <?php
    }
}