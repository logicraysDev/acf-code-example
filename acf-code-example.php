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