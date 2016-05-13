<?php


/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("parallax_accueil");' ) );

class parallax_accueil extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'widget_parallax_accueil',
            'description' => 'Widget de l\'effet parallax de la page d\'accueil.'
        );

        parent::__construct( 'parallax_accueil', 'Parallax accueil', $widget_ops );

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
   <div class="widgetParallax">
        <div class="parallax-container">
                <div class="container valign-wrapper">
                    <div>
                       <h3 class="white-text" style="font-family: 'Tangerine', cursive; font-size:6em"><?php echo $instance['title']; ?></h3>
                       <p class="white-text"><?php echo $instance['texte']; ?></p>
                   </div>
                </div>
            <div class="parallax">
              <img src="<?php echo $instance['image']; ?>" alt="parallax accueil">
           </div>
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
        if(isset($instance['texte']))
        {
            $texte = $instance['texte'];
        }

//        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        } ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>">Titre :</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'texte' ); ?>">Texte :</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'texte' ); ?>" name="<?php echo $this->get_field_name( 'texte' ); ?>" type="text"><?php echo esc_attr( $texte ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image :' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat imgFond" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button" type="button" value="Charger une image" />
        </p>
        <script>
			jQuery(document).ready( function(){
				function media_upload(mediaclass) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					jQuery('body').on('click',mediaclass, function(e) {
						var button_id ='.'+jQuery(this).attr('class');
						/* console.log(button_id); */
						var self = jQuery(button_id);
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = jQuery(button_id);
//						var id = button.attr('class').replace('_button', '');
						_custom_media = true;
						wp.media.editor.send.attachment = function(){
							if ( _custom_media  ) {
//							   jQuery('.custom_media_id').val(attachment.id);
//							   jQuery('.custom_media_url').val(attachment.url);
//							   jQuery('.custom_media_image').attr('src',attachment.url).css('display','block');
								var url_img = jQuery('.visible .attachment-details .setting[data-setting="url"] input').val();
                                console.log(url_img);
							   jQuery('.imgFond').val(url_img);
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