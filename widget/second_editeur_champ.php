<?php

add_action( 'edit_form_after_editor', 'no_metabox_wspe_114084' );
add_action( 'save_post', 'save_wpse_114084', 10, 2 );

function no_metabox_wspe_114084()
{
    global $post;
    if( 'champagne' != $post->post_type )
        return;

    $editor1 = get_post_meta( $post->ID, '_custom_editor_1', true);

    wp_nonce_field( plugin_basename( __FILE__ ), 'wspe_114084' );
    echo '<br><h1>Deuxième zone de texte (récompenses, notes, ...)</h1><br>';
    echo wp_editor( $editor1, 'custom_editor_1', array( 'textarea_name' => 'custom_editor_1' ) );
}

function save_wpse_114084( $post_id, $post_object )
{
    if( !isset( $post_object->post_type ) || 'champagne' != $post_object->post_type )
        return;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( !isset( $_POST['wspe_114084'] ) || !wp_verify_nonce( $_POST['wspe_114084'], plugin_basename( __FILE__ ) ) )
        return;

    if ( isset( $_POST['custom_editor_1'] )  )
        update_post_meta( $post_id, '_custom_editor_1', $_POST['custom_editor_1'] );
}