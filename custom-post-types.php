<?php

/**
 * Registers the `recipe` post type.
 */
function recipe_init() {
	register_post_type( 'recipe', array(
		'labels'                => array(
			'name'                  => __( 'Recipes', 'YOUR-TEXTDOMAIN' ),
			'singular_name'         => __( 'Recipe', 'YOUR-TEXTDOMAIN' ),
			'all_items'             => __( 'All Recipes', 'YOUR-TEXTDOMAIN' ),
			'archives'              => __( 'Recipe Archives', 'YOUR-TEXTDOMAIN' ),
			'attributes'            => __( 'Recipe Attributes', 'YOUR-TEXTDOMAIN' ),
			'insert_into_item'      => __( 'Insert into recipe', 'YOUR-TEXTDOMAIN' ),
			'uploaded_to_this_item' => __( 'Uploaded to this recipe', 'YOUR-TEXTDOMAIN' ),
			'featured_image'        => _x( 'Featured Image', 'recipe', 'YOUR-TEXTDOMAIN' ),
			'set_featured_image'    => _x( 'Set featured image', 'recipe', 'YOUR-TEXTDOMAIN' ),
			'remove_featured_image' => _x( 'Remove featured image', 'recipe', 'YOUR-TEXTDOMAIN' ),
			'use_featured_image'    => _x( 'Use as featured image', 'recipe', 'YOUR-TEXTDOMAIN' ),
			'filter_items_list'     => __( 'Filter recipes list', 'YOUR-TEXTDOMAIN' ),
			'items_list_navigation' => __( 'Recipes list navigation', 'YOUR-TEXTDOMAIN' ),
			'items_list'            => __( 'Recipes list', 'YOUR-TEXTDOMAIN' ),
			'new_item'              => __( 'New Recipe', 'YOUR-TEXTDOMAIN' ),
			'add_new'               => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'          => __( 'Add New Recipe', 'YOUR-TEXTDOMAIN' ),
			'edit_item'             => __( 'Edit Recipe', 'YOUR-TEXTDOMAIN' ),
			'view_item'             => __( 'View Recipe', 'YOUR-TEXTDOMAIN' ),
			'view_items'            => __( 'View Recipes', 'YOUR-TEXTDOMAIN' ),
			'search_items'          => __( 'Search recipes', 'YOUR-TEXTDOMAIN' ),
			'not_found'             => __( 'No recipes found', 'YOUR-TEXTDOMAIN' ),
			'not_found_in_trash'    => __( 'No recipes found in trash', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'     => __( 'Parent Recipe:', 'YOUR-TEXTDOMAIN' ),
			'menu_name'             => __( 'Recipes', 'YOUR-TEXTDOMAIN' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'recipe',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'recipe_init' );

/**
 * Sets the post updated messages for the `recipe` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `recipe` post type.
 */
function recipe_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['recipe'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Recipe updated. <a target="_blank" href="%s">View recipe</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'YOUR-TEXTDOMAIN' ),
		3  => __( 'Custom field deleted.', 'YOUR-TEXTDOMAIN' ),
		4  => __( 'Recipe updated.', 'YOUR-TEXTDOMAIN' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Recipe restored to revision from %s', 'YOUR-TEXTDOMAIN' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Recipe published. <a href="%s">View recipe</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
		7  => __( 'Recipe saved.', 'YOUR-TEXTDOMAIN' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Recipe submitted. <a target="_blank" href="%s">Preview recipe</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Recipe scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview recipe</a>', 'YOUR-TEXTDOMAIN' ),
		date_i18n( __( 'M j, Y @ G:i', 'YOUR-TEXTDOMAIN' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Recipe draft updated. <a target="_blank" href="%s">Preview recipe</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'recipe_updated_messages' );