<?php
/**
 * Template Name: Recipe Frontend Form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

acf_form_head();
get_header();
?>
<div class="wrap">
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

			endwhile; // End of the loop.
			?>

			<?php 
			$post_id = $_GET["post"];
			if($post_id){

			acf_form(array(
			    'post_id'	   => $post_id, //Variable that you'll get from the URL
			    'post_title'   => true,
			    'post_content' => true,
			    'fields' => array('post_image', 'ingredients', 'directions', 'category', 'featured', 'color', 'start_date', 'end_date', 'select_any_one', 'repeater_field'),
			    'submit_value' => 'Update Content',
			    'return' => '%post_url%' //Returns to the original post
			));

			}else{

			$fields = array(
				'field_5c9ca61a3a561',	// image
				'field_5c9ca6543a562',	// ingredients
				'field_5c9ca6723a563',	// directions
				'field_5c9ca67d3a564',	// category
				'field_5c9ca6f83a565',	
				'field_5fe9b869620d1',
				'field_5fe9bcaf5a390',
				'field_5fe9bcc45a391',
				'field_5fe9bd000359a',
				'field_5fe9bd6dc7684'
			);

			acf_form(array(
		        'post_id'       => 'new_post',
		        'new_post'      => array(
		            'post_type'     => 'recipe',
		            'post_status'   => 'publish'
		        ),
		        'post_title'		=> true,					
				'post_content'  	=> true,					
				'uploader'      	=> 'basic',					
				'return'			=> home_url('thank-your-for-submitting-your-recipe'),					
				'fields'			=> $fields,
		        'submit_value'  => 'Submit a new Recipe'
		    )); 

			}
		    ?>
		</main><!-- #main -->
	</section><!-- #primary -->
</div>	
<?php
get_footer();
