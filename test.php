<?php
/**
 * Custom widgets
 *
 * @package kicoe
 */
 class Kicoe_Profile extends WP_Widget {
    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        // widget actual processes
        parent::WP_Widget(false, $name = __('Kicoe Profile', 'wp_widget_plugin') );
        wp_enqueue_media();
    }
    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        extract( $args );
        echo wp_get_attachment_image($instance['image_id'], 'profilethumb', false);
    }
    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', THEMENAME); ?></label><br />
            <input type="text" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" value="<?php echo $instance['text']; ?>" class="" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label>
            <br />
            <img class="custom_media_image" src="<?php if(!empty($instance['image_uri'])){echo $instance['image_uri'];} ?>" style="margin:0px 10px 0px 0px; border-radius: 2px; padding:5px;max-width:90px; border: 1px solid #ccc; float:left;display:inline-block" />
            <input type="hidden" class="custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>">
            <input type="hidden" class="custom_media_id" name="<?php echo $this->get_field_name('image_id'); ?>" id="<?php echo $this->get_field_id('image_id'); ?>" value="<?php echo $instance['image_id']; ?>">
            <input type="button" value="<?php _e( 'Upload Image', 'theme name' ); ?>" class="button custom_media_upload" id="custom_image_uploader"/>
        </p>
        <br /><br /><br />
        <script>
            jQuery(document).ready( function(){
                function media_upload(mediaclass) {
                    var _custom_media = true,
                    _orig_send_attachment = wp.media.editor.send.attachment;
                    jQuery('body').on('click',mediaclass, function(e) {
                        var button_id ='#'+jQuery(this).attr('id');
                        /* console.log(button_id); */
                        var self = jQuery(button_id);
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        var button = jQuery(button_id);
                        var id = button.attr('id').replace('_button', '');
                        _custom_media = true;
                        wp.media.editor.send.attachment = function(props, attachment){
                            if ( _custom_media  ) {
                               jQuery('.custom_media_id').val(attachment.id);
                               jQuery('.custom_media_url').val(attachment.url);
                               jQuery('.custom_media_image').attr('src',attachment.url).css('display','block');
                            } else {
                                return _orig_send_attachment.apply( button_id, [props, attachment] );
                            }
                        }
                        wp.media.editor.open(button);
                        return false;
                    });
                }
                media_upload('.custom_media_upload');
            });
        </script>
        <?php
    }
    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['text'] = strip_tags( $new_instance['text'] );
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        $instance['image_id'] = strip_tags( $new_instance['image_id'] );
        return $instance;
    }
}
add_action('widgets_init', create_function('', 'return register_widget("Kicoe_Profile");'));
 ?>