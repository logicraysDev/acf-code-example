<?php
add_action('acf/save_post', function ($post_id) {
    $value = get_field('post_image', $post_id);
    if ($value) {
        if (!is_numeric($value)) {
            $value = $value['ID'];
        }
        update_post_meta($post_id, '_thumbnail_id', $value);
    } else {
        delete_post_meta($post_id, '_thumbnail_id');
    }
}, 11);

add_action('acf/save_post', 'twentyseventeen_new_recipe_send_email');

function twentyseventeen_new_recipe_send_email( $post_id ) {

	if( get_post_type($post_id) !== 'recipe' && get_post_status($post_id) == 'draft' ) {
		return;
	}

	if( is_admin() ) {
		return;
	}

	$post_title = get_the_title( $post_id );
	$post_url 	= get_permalink( $post_id );
	$subject 	= "A New Recipe Has Been Added to Your Site";
	$message 	= "Please Review the recipe before publishing:\n\n";
	$message   .= $post_title . ": " . $post_url;

	$administrators = get_users(array(
		'role'	=> 'administrator'
	));

	foreach ($administrators as &$administrator) {
		wp_mail( $administrator->data->user_email, $subject, $message );
	}

}