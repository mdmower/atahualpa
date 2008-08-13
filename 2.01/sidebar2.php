<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>

<?php if ($ata_rightcolumn_width != 0) { ?>


<?php # from here up to line 106 the contents are "hardcoded" into the theme and won't dissapear 
      # even after you dropped widgets into this right sidebar. If you want to change this first,   
      # upper part of the right sidebar, you'll need to do it manually. ?>
      
<?php if (is_home() OR is_category() OR is_single()) { ?>

<?php if (is_home()) { ?>

	<?php if (function_exists('mdv_most_commented')) { ?>
	<h3 class="widgettitle">Popular Posts</h3>
	<ul>
	<?php # The first number (10) is max amount of posts displayed, 
	      # the last number (365) is how old (days) posts can be to be included here.
	      # Don't change the other parts. Salt to taste:
	mdv_most_commented(10, '<li>', '</li>', false, 365); ?>
	</ul>
	<?php } ?>

	<?php if (function_exists('src_simple_recent_comments')) { ?>
	<h3 class="widgettitle">Recent Comments</h3>
	<ul>
	<?php src_simple_recent_comments(); ?>
	</ul>
	<?php } ?>

<?php } ?>

<?php if (is_category()) { ?>

	<?php if (function_exists('mdv_most_commented_per_cat')) { ?>
	<?php $current_cat_id = get_query_var('cat'); 
	# The first number (10) is max # of posts displayed, 
	# the last number (365) is how old (days) posts can be to be included here.
	# Don't change the other parts. Salt to taste:
	$popular_in_this_cat = mdv_most_commented_per_cat(10, '<li>', '</li>', false, 365, $current_cat_id); 
	if ($popular_in_this_cat != "None found") { ?>
	<h3 class="widgettitle">Popular in <?php single_cat_title(); ?></h3>
	<ul>
	<?php echo $popular_in_this_cat; ?>
	</ul>
	<?php } ?>
	<?php } ?>
	
	<h3 class="widgettitle">Recent Posts</h3>
	<ul>
	<?php wp_get_archives('type=postbypost&limit=5&format=html&before=&after='); ?>
	</ul>
	
<?php } ?>

<?php if (is_single()) { ?>

 	<?php if (function_exists('related_posts')) { ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php # The "related posts" will only display if you've installed
	# the "related posts" plugin from http://www.w-a-s-a-b-i.com
	# Note: The original one from wasabi will not work as expected in this theme.
	# The MODIFIED version of that plugin should have been included with this theme. If not,
	# download this theme again at wordpress.bytesforall.com to get the modified plugin.
	# The first number (5) is max # of posts displayed, 
	# the second number (10) is length of post excerpt (words) to show.
	# Salt to taste:
	$current_related_posts = related_posts(5, 10, '<li>', '</li>', '', '', false, false); 
	if ($current_related_posts != "No related posts") { ?>
	<h3 class="widgettitle">Related Posts</h3>
	<ul>
	<?php echo $current_related_posts; ?>
	</ul>
	<?php } ?>
	<?php endwhile; endif; } ?>

	<h3 class="widgettitle">Recent Posts</h3>
	<ul>
	<?php wp_get_archives('type=postbypost&limit=5&format=html&before=&after='); ?>
	</ul>

<?php } ?>
		
<?php # for pages that are not single posts, category pages or the homepage, show this:
	} else { ?>
	
	<h3 class="widgettitle">Recent Posts</h3>
	<ul>
	<?php wp_get_archives('type=postbypost&limit=5&format=html&before=&after='); ?>
	</ul>
	<?php if (function_exists('mdv_most_commented')) { ?>
	
	<h3 class="widgettitle">Popular Posts</h3>
	<ul>
	<?php # The first number (10) is max amount of posts displayed, 
	      # the last number (365) is how old (days) posts can be to be included here.
	      # Don't change the other parts. Salt to taste:
	mdv_most_commented(10, '<li>', '</li>', false, 365); ?>
	</ul>
	<?php } ?>
	
<?php } ?>


			<?php 	/* #####################################################################
			           #######   Widgetized RIGHT sidebar area starts here 		######## 
			           #######   The stuff below will dissapear once you start 	########
			           #######   to add widgets to the right sidebar  		########
			           ##################################################################### */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>

			<h3 class="widgettitle">Links</h3>
			<ul>
			<?php wp_list_bookmarks('title_li=&categorize=&title_before=&title_after='); ?>
			</ul>
			
			<h3 class="widgettitle">Meta</h3>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
			
			
			<?php endif; ?>
			
<?php } ?>