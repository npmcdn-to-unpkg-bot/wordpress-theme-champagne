<?php


/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("widget_img");' ) );

class widget_img extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'Image',
            'description' => 'Rajouter une image dans vos zones de widget.'
        );

        parent::__construct( 'widget_img', 'Image', $widget_ops );

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
    
    <img src="<?php echo $instance['image']; ?>" alt="<?php echo $instance['alt']; ?>" clas="widgetImg">
    
    
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
        if(isset($instance['alt']))
        {
            $alt = $instance['alt'];
        }

        if(isset($instance['image']))
        {
            $image = $instance['image'];
        } ?>

        <p> <!-- IMAGE -->
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image :' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat imgFond" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button" type="button" value="Charger une image" />
        </p>
        
        <p> <!-- ATTRIBUT ALT -->
            <label for="<?php echo $this->get_field_name( 'alt' ); ?>">Description courte (pour le référencement) :</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'alt' ); ?>" name="<?php echo $this->get_field_name( 'alt' ); ?>" type="text" value="<?php echo esc_attr( $alt ); ?>" />
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
								var url_img = jQuery('.visible .attachment-details .setting[data-setting="url"] input').val();
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