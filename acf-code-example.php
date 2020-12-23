/*------Display a field--------------*/

<p><?php the_field('field_name'); ?></p>


/*---------Retrieving a field as a variable---------*/

<?php

$variable = get_field('field_name');

?>

/*------------Using conditional statements--------------*/

get_field returns false if (value == "" || value == null || value == false)
<?php

if(get_field('field_name'))
{
	echo '<p>' . get_field('field_name') . '</p>';
}

?>

/*-----------------Working with Array values------------------*/

checkbox, select, relationship, repeater

<?php

$values = get_field('field_name');
if($values)
{
	echo '<ul>';

	foreach($values as $value)
	{
		echo '<li>' . $value . '</li>';
	}

	echo '</ul>';
}

// always good to see exactly what you are working with
var_dump($values);

?>

/*---------------Working with Images – URL----------------------*/

<img src="<?php the_field('image_test'); ?>" alt="" />

/*-----------------------Working with Images – ID------------------*/

By using the ID, you can retrieve any crop size of the image and even get the name of the file!

<?php $image = wp_get_attachment_image_src(get_field('image_test'), 'full'); ?>
<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('image_test')) ?>" />

/*-------------Working with the Repeater Field--------------------*/

repeater can be accessed by get_field or the_repeater_field / the_sub_field

<?php if( have_rows('repeater_field_name') ): ?>
 
    <ul>
 
    <?php while( have_rows('repeater_field_name') ): the_row(); ?>
 
        <li>sub_field_1 = <?php the_sub_field('sub_field_1'); ?>, sub_field_2 = <?php the_sub_field('sub_field_2'); ?>, etc</li>
        
        <?php 
        
        $sub_field_3 = get_sub_field('sub_field_3'); 
        
        // do something with $sub_field_3
        
        ?>
        
    <?php endwhile; ?>
 
    </ul>
 
<?php endif; ?>

/*------------Randomly select a repeater field row--------------*/

<?php

$rows = get_field('repeater_field_name');
$row_count = count($rows);
$i = rand(0, $row_count - 1);

echo $rows[ $i ]['sub_field_name'];

?>

/*-------------Getting values from another page--------------------*/

<?php

$other_page = 12;

?>
<p><?php the_field('field_name', $other_page); ?></p>
<?php

// get variable
$variable = get_field('field_name', $other_page);

// repeater field: note that the_sub_field and get_sub_field don't need a post id parameter
if( have_rows('repeater_field_name', $other_page) ): ?>
 
    <ul>
 
    <?php while( have_rows('repeater_field_name', $other_page) ): the_row(); ?>
    
        <li>sub_field_1 = <?php the_sub_field('sub_field_1'); ?>, sub_field_2 = <?php the_sub_field('sub_field_2'); ?>, etc</li>
        
        <?php 
        
        $sub_field_3 = get_sub_field('sub_field_3'); 
        
        // do something with $sub_field_3
        
        ?>
        
    <?php endwhile; ?>
 
    </ul>
 
<?php endif; ?>

/*--------Query posts with ACF values----------------*/

<?php

$posts = get_posts(array(
	'numberposts' => -1,
	'post_type' => 'event',
	'meta_key' => 'location',
	'meta_value' => 'melbourne'
));

if($posts)
{
	echo '<ul>';

	foreach($posts as $post)
	{
		echo '<li><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></li>';
	}

	echo '</ul>';
}

?>