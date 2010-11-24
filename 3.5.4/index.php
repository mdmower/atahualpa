<?php 	/* get all options: */
# error_reporting(-1);
# include (TEMPLATEPATH . '/functions/bfa_get_options.php');
list($bfa_ata, $cols, $left_col, $left_col2, $right_col, $right_col2, $bfa_ata['h_blogtitle'], $bfa_ata['h_posttitle']) = bfa_get_options();
# global $bfa_ata;
get_header(); ?>

<?php /* If there are any posts: */
if (have_posts()) : $bfa_ata['postcount'] = 0; /* Postcount needed for option "XX first posts full posts, rest excerpts" */ ?>

	<?php /* This outputs the next/previous post or page navigation. 
	This can be edited at Atahualpa Theme Options -> Style & edit the Center column */
	bfa_center_content($bfa_ata['content_above_loop']); ?>

	<?php /* The LOOP starts here. Do this for all posts: */
	while (have_posts()) : the_post(); $bfa_ata['postcount']++; ?>
	
		<?php /* Add Odd or Even post class so post containers can get alternating CSS style (optional) */
		#$odd_or_even = (($bfa_ata['postcount'] % 2) ? 'odd-post' : 'even-post' );  
		// Since 3.5.4 this is done with a filter in functions.php, function 'bfa_post_class'
		?>

		<?php /* This is the actual Wordpress LOOP. 
		The output can be edited at Atahualpa Theme Options -> Style & edit the Center column */
		bfa_center_content($bfa_ata['content_inside_loop']); ?>
						
	<?php /* END of the LOOP */
	endwhile; ?>

	<?php /* This outputs the next/previous post or page navigation and the comment template.
	This can be edited at Atahualpa Theme Options -> Style & edit the Center column */
	bfa_center_content($bfa_ata['content_below_loop']); ?>

<?php /* END of: If there are any posts */
else : /* If there are no posts: */ ?>

<?php /* This outputs the "Not Found" content, if neither posts, pages nor attachments are available for the requested page.
This can be edited at Atahualpa Theme Options -> Style & edit the Center column */
bfa_center_content($bfa_ata['content_not_found']); ?>

<?php endif; /* END of: If there are no posts */ ?>

<?php if(isset($bfa_ata['center_content_bottom'])) bfa_center_content($bfa_ata['center_content_bottom']); ?>

<?php get_footer(); ?>