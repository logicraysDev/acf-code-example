/*------Display a field--------------*/

<p><?php the_field('field_name'); ?></p>


/*---------Retrieving a field as a variable---------*/

<?php

$variable = get_field('field_name');

?>

/*------------Using conditional statements--------------*/

<?php

if(get_field('field_name'))
{
	echo '<p>' . get_field('field_name') . '</p>';
}

?>