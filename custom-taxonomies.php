<?php

/**
 * Registers the `recipe_category` taxonomy,
 * for use with 'recipe'.
 */
function recipe_category_init() {
	register_taxonomy( 'recipe_category', array( 'recipe' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Recipe categories', 'YOUR-TEXTDOMAIN' ),
			'singular_name'              => _x( 'Recipe category', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
			'search_items'               => __( 'Search Recipe categories', 'YOUR-TEXTDOMAIN' ),
			'popular_items'              => __( 'Popular Recipe categories', 'YOUR-TEXTDOMAIN' ),
			'all_items'                  => __( 'All Recipe categories', 'YOUR-TEXTDOMAIN' ),
			'parent_item'                => __( 'Parent Recipe category', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'          => __( 'Parent Recipe category:', 'YOUR-TEXTDOMAIN' ),
			'edit_item'                  => __( 'Edit Recipe category', 'YOUR-TEXTDOMAIN' ),
			'update_item'                => __( 'Update Recipe category', 'YOUR-TEXTDOMAIN' ),
			'view_item'                  => __( 'View Recipe category', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'               => __( 'Add New Recipe category', 'YOUR-TEXTDOMAIN' ),
			'new_item_name'              => __( 'New Recipe category', 'YOUR-TEXTDOMAIN' ),
			'separate_items_with_commas' => __( 'Separate recipe categories with commas', 'YOUR-TEXTDOMAIN' ),
			'add_or_remove_items'        => __( 'Add or remove recipe categories', 'YOUR-TEXTDOMAIN' ),
			'choose_from_most_used'      => __( 'Choose from the most used recipe categories', 'YOUR-TEXTDOMAIN' ),
			'not_found'                  => __( 'No recipe categories found.', 'YOUR-TEXTDOMAIN' ),
			'no_terms'                   => __( 'No recipe categories', 'YOUR-TEXTDOMAIN' ),
			'menu_name'                  => __( 'Recipe categories', 'YOUR-TEXTDOMAIN' ),
			'items_list_navigation'      => __( 'Recipe categories list navigation', 'YOUR-TEXTDOMAIN' ),
			'items_list'                 => __( 'Recipe categories list', 'YOUR-TEXTDOMAIN' ),
			'most_used'                  => _x( 'Most Used', 'recipe_category', 'YOUR-TEXTDOMAIN' ),
			'back_to_items'              => __( '&larr; Back to Recipe categories', 'YOUR-TEXTDOMAIN' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'recipe_category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'recipe_category_init' );

/**
 * Sets the post updated messages for the `recipe_category` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `recipe_category` taxonomy.
 */
function recipe_category_updated_messages( $messages ) {

	$messages['recipe_category'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Recipe category added.', 'YOUR-TEXTDOMAIN' ),
		2 => __( 'Recipe category deleted.', 'YOUR-TEXTDOMAIN' ),
		3 => __( 'Recipe category updated.', 'YOUR-TEXTDOMAIN' ),
		4 => __( 'Recipe category not added.', 'YOUR-TEXTDOMAIN' ),
		5 => __( 'Recipe category not updated.', 'YOUR-TEXTDOMAIN' ),
		6 => __( 'Recipe categories deleted.', 'YOUR-TEXTDOMAIN' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'recipe_category_updated_messages' );