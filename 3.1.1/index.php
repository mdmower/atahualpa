<?php global $options; 
foreach ($options as $value) { if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } }
get_header(); 
// load postinfo function
include (TEMPLATEPATH . '/functions/bfa_postinfo.php');
// if this is a multi post page, and a "home" link is set for the next/prev navigation on multi post pages, 
// figure out if this the blog homepage, and remove the "home" link from the next/prev navigation if true
if ( !is_single() AND !is_page() AND $bfa_ata_home_multi_next_prev != '' ) {
	$nav_home_div_on = '<div class="home"><a href="' . get_option('home') . '/">' . $bfa_ata_home_multi_next_prev . '</a></div>'; 
	// for WP 2.5 and newer
	if ( function_exists('is_front_page') ) {
		// make sure this is the real homepage and not a subsequent page
		if (is_front_page() && !is_paged() ) {
		$nav_home_add = ""; $nav_home_div = ""; 
		} else {
		$nav_home_add = '-home';
		$nav_home_div = $nav_home_div_on; 
		}
	} 
	// for WP 2.3 and older
	// make sure this is the real homepage and not a subsequent page
	elseif ( is_home() && !is_paged() ) {
	$nav_home_add = ""; $nav_home_div = "";
	}
	else { 
	$nav_home_add = '-home'; 
	$nav_home_div = $nav_home_div_on; 
	}
}
// Home link for next/prev on single pages
if ( is_single() ) {
	if ($bfa_ata_home_single_next_prev != '') {
	$nav_home_div_on_single = '<div class="home"><a href="' . get_option('home') . '/">' . $bfa_ata_home_single_next_prev . '</a></div>'; 
	$nav_home_add_single = '-home';
	} else {
	$nav_home_div_on_single = "";
	$nav_home_add_single = "";
	}
}
// figure out sidebars
global $cols;
$cols = 1;
if ( is_page() ) {
#$current_page_id = $wp_query->get('page_id');
$current_page_id = $wp_query->get_queried_object_id();
	if ($bfa_ata_left_col_pages_exclude != "") { 
	$pages_exlude_left = explode(",", str_replace(" ", "", $bfa_ata_left_col_pages_exclude));
		if ( $bfa_ata_leftcol_on['page'] && !in_array($current_page_id, $pages_exlude_left) ) {
		$cols++; $left_col = "on"; }
	} else {
		if ( $bfa_ata_leftcol_on['page'] ) {
		$cols++; $left_col = "on"; }
	}
	if ($bfa_ata_right_col_pages_exclude != "") { 
	$pages_exlude_right = explode(",", str_replace(" ", "", $bfa_ata_right_col_pages_exclude));
		if ( $bfa_ata_rightcol_on['page'] && !in_array($current_page_id, $pages_exlude_right) ) {
		$cols++; $right_col = "on"; }
	} else {
		if ( $bfa_ata_rightcol_on['page'] ) {
		$cols++; $right_col = "on"; }
	}
} elseif ( is_category() ) {
$current_cat_id = get_query_var('cat');
	if ($bfa_ata_left_col_cats_exclude != "") {
	$cats_exlude_left = explode(",", str_replace(" ", "", $bfa_ata_left_col_cats_exclude));
		if ( $bfa_ata_leftcol_on['category'] && !in_array($current_cat_id, $cats_exlude_left) ) {
		$cols++; $left_col = "on"; }
	} else {
		if ( $bfa_ata_leftcol_on['category'] ) {
		$cols++; $left_col = "on"; }
	}
	if ($bfa_ata_right_col_cats_exclude != "") {
	$cats_exlude_right = explode(",", str_replace(" ", "", $bfa_ata_right_col_cats_exclude));
		if ( $bfa_ata_rightcol_on['category'] && !in_array($current_cat_id, $cats_exlude_right) ) {
		$cols++; $right_col = "on"; }
	} else {
		if ( $bfa_ata_rightcol_on['category'] ) {
		$cols++; $right_col = "on"; }
	}
} else {
if ( (is_home() && $bfa_ata_leftcol_on['homepage']) || ( is_front_page() && $bfa_ata_leftcol_on['frontpage']) || 
( is_single() && $bfa_ata_leftcol_on['single']) || ( is_date() && $bfa_ata_leftcol_on['date']) || 
( is_tag() && $bfa_ata_leftcol_on['tag']) || ( is_search() && $bfa_ata_leftcol_on['search']) || 
( is_author() && $bfa_ata_leftcol_on['author']) || ( is_404() && $bfa_ata_leftcol_on['404']) || 
( is_attachment() && $bfa_ata_leftcol_on['attachment']) ) {
	$cols++; $left_col = "on"; 
	}
if ( (is_home() && $bfa_ata_rightcol_on['homepage']) || ( is_front_page() && $bfa_ata_rightcol_on['frontpage']) || 
( is_single() && $bfa_ata_rightcol_on['single']) || ( is_date() && $bfa_ata_rightcol_on['date']) || 
( is_tag() && $bfa_ata_rightcol_on['tag']) || ( is_search() && $bfa_ata_rightcol_on['search']) || 
( is_author() && $bfa_ata_rightcol_on['author']) || ( is_404() && $bfa_ata_rightcol_on['404']) || 
( is_attachment() && $bfa_ata_rightcol_on['attachment']) ) {
	$cols++; $right_col = "on"; 
	}
}
?>
<body<?php echo ($bfa_ata_html_inserts_body_tag != "" ? ' ' . apply_filters(widget_text, $bfa_ata_html_inserts_body_tag) : ''); ?>>
<?php echo ($bfa_ata_html_inserts_body_top != "" ? apply_filters(widget_text, $bfa_ata_html_inserts_body_top) : ''); ?>
<div id="wrapper">
<div id="container">
<table id="layout" border="0" cellspacing="0" cellpadding="0">
<colgroup>
<?php if ( $left_col == "on" ) { ?>
<col class="colone" />
<?php } ?>
<col class="coltwo" />
<?php if ( $right_col == "on" ) { ?>
<col class="colthree" />
<?php } ?>
</colgroup> 
	<tr>

		<!-- Header -->
		<td id="header" colspan="<?php echo $cols; ?>">
		
		<?php bfa_header_config($bfa_ata_configure_header); ?>

		</td>
		<!-- / Header -->

	</tr>

	<!-- Main Body -->	
	<tr>

		<?php if ( $left_col == "on" ) { ?>
		<!-- Left Sidebar -->
		<td id="left">

			<?php // Widgetize the Right Sidebar 
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : 	
			endif; ?>

		</td>
		<!-- / Left Sidebar -->
		<?php } ?>


		<!-- Main Column -->
		<td id="middle">

			
			<!-- If there are any posts -->
			<?php if (have_posts()) : ?>

				<?php // Next/Previous POST Links (on single post pages) 
				// in next_post_link "next" means newer posts
				if ( is_single() AND strpos($bfa_ata_location_single_next_prev,'Top')!==false ) 
				{ echo '
					<div class="navigation-top">
						<div class="older' . $nav_home_add_single . '">'; 
						$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? previous_post_link(bfa_escape($bfa_ata_single_next_prev_older)) : 
						next_post_link(bfa_escape($bfa_ata_single_next_prev_newer));
						echo ' &nbsp;</div>' . $nav_home_div_on_single . '<div class="newer' . $nav_home_add_single . '">&nbsp; '; 
						$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? next_post_link(bfa_escape($bfa_ata_single_next_prev_newer)) : 
						previous_post_link(bfa_escape($bfa_ata_single_next_prev_older));
						echo '</div>
					<div class="clearboth"></div>
					</div>';			
				} ?>
				
				<?php // Next/Previous PAGE Links (on multi post pages) 
				// in next_posts_link "next" means older posts
				if ( !is_single() AND !is_page() AND strpos($bfa_ata_location_multi_next_prev,'Top')!==false AND show_posts_nav() ) {
					if (function_exists('wp_pagenavi')) { 
					echo '<div class="wp-pagenavi-navigation">'; wp_pagenavi(); echo '</div>'; 
					} else { 
					echo '
					<div class="navigation-top">
						<div class="older' . $nav_home_add . '">'; 
						$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? 
						next_posts_link(bfa_escape($bfa_ata_multi_next_prev_older)) : 
						previous_posts_link(bfa_escape($bfa_ata_multi_next_prev_newer)); 
						echo ' &nbsp;</div>' . $nav_home_div . '<div class="newer' . $nav_home_add . '">&nbsp; ';
						$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? 
						previous_posts_link(bfa_escape($bfa_ata_multi_next_prev_newer)) : 
						next_posts_link(bfa_escape($bfa_ata_multi_next_prev_older)); 
						echo '</div>
					<div class="clearboth"></div>
					</div>'; 
					} 
				} ?>						

				<?php // Do this for all posts:
				while (have_posts()) : the_post(); ?>
					
				<div class="post<?php // new WP 2.7 "sticky" class only on real blog homepage
				if (function_exists('is_sticky')) { if ( is_home() AND !is_paged() AND is_sticky() ) { echo " sticky"; } } 
				?>">
							
				
					<?php // Post Kicker
					if( (is_home() && $bfa_ata_post_kicker_home != "") OR (is_page() && $bfa_ata_post_kicker_page != "") OR 
					(is_single() && $bfa_ata_post_kicker_single != "") OR ( (is_archive() OR is_search() OR is_author() OR is_tag()) && $bfa_ata_post_kicker_multi != "") ) {
					echo '<div class="post-kicker">';
					if ( is_home() ) { echo postinfo("$bfa_ata_post_kicker_home"); } 
					elseif ( is_page() ) { echo postinfo("$bfa_ata_post_kicker_page"); } 
					elseif ( is_single() ) { echo postinfo("$bfa_ata_post_kicker_single"); } 
					else { echo postinfo("$bfa_ata_post_kicker_multi"); } 
					echo '</div>';
					} ?>
					
					<!-- Post Headline -->					
					<div class="post-headline">	
					<h2><?php if( !is_single() AND !is_page() ) { ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php 
					if (function_exists('the_title_attribute')) {the_title_attribute();} 
					elseif (function_exists('the_title')) {the_title();} ?>"><?php } the_title(); if( !is_single() AND !is_page() ) { ?></a><?php } ?></h2>
					</div>

					<?php // Post Byline
					if( (is_home() && $bfa_ata_post_byline_home != "") OR (is_page() && $bfa_ata_post_byline_page != "") OR 
					(is_single() && $bfa_ata_post_byline_single != "") OR ( (is_archive() OR is_search() OR is_author() OR is_tag()) && $bfa_ata_post_byline_multi != "") ) {
					echo '<div class="post-byline">';
					if ( is_home() ) { echo postinfo("$bfa_ata_post_byline_home"); } 
					elseif ( is_page() ) { echo postinfo("$bfa_ata_post_byline_page"); } 
					elseif ( is_single() ) { echo postinfo("$bfa_ata_post_byline_single"); } 
					else { echo postinfo("$bfa_ata_post_byline_multi"); } 
					echo '</div>';
					} ?>
							
					<!-- Post Body Copy -->				
					<div class="post-bodycopy clearfix">
					<?php if ((is_home() && $bfa_ata_excerpts_home == "Full Posts") OR (is_category() && $bfa_ata_excerpts_category == "Full Posts") OR 
					(is_date() && $bfa_ata_excerpts_archive == "Full Posts") OR (is_tag() && $bfa_ata_excerpts_tag == "Full Posts") OR 
					(is_search() && $bfa_ata_excerpts_search == "Full Posts") OR (is_author() && $bfa_ata_excerpts_author == "Full Posts") OR is_single() OR is_page() )
					{ $bfa_ata_more_tag_final = str_replace("%post-title%", the_title('', '', false), $bfa_ata_more_tag);
					the_content(bfa_escape($bfa_ata_more_tag_final)); } else { the_excerpt(); } ?>
					</div>	
					
					<?php // Post Pagination 
					if ((is_home() && $bfa_ata_excerpts_home == "Full Posts") OR (is_category() && $bfa_ata_excerpts_category == "Full Posts") OR 
					(is_date() && $bfa_ata_excerpts_archive == "Full Posts") OR (is_tag() && $bfa_ata_excerpts_tag == "Full Posts") OR 
					(is_search() && $bfa_ata_excerpts_search == "Full Posts") OR (is_author() && $bfa_ata_excerpts_author == "Full Posts") OR is_single() OR is_page() ) {
					wp_link_pages('before=<p class="post-pagination"><strong>' . __('Pages:','atahualpa') . '</strong> &after=</p>&next_or_number=number'); } ?>

					
					
			<?php // Show Archives page if configured
			if ( is_page() AND $current_page_id == $bfa_ata_archives_page_id ) { ?>
			
			<div class="archives-page">
			
			<?php if ( $bfa_ata_archives_date_show == "Yes" ) { ?>
			<h3><?php echo $bfa_ata_archives_date_title; ?></h3>
			<ul>
			<?php wp_get_archives('type=' . $bfa_ata_archives_date_type . '&show_post_count=' . ($bfa_ata_archives_date_count == "Yes" ? '1' : '0')); ?>
			</ul>
			<?php } ?>
			
			<?php if ( $bfa_ata_archives_category_show == "Yes" ) { ?>
			<h3><?php echo $bfa_ata_archives_category_title; ?></h3>
			<ul>
			<?php wp_list_categories('title_li=&orderby=' . $bfa_ata_archives_category_orderby . 
			'&order=' . $bfa_ata_archives_category_order . 
			'&show_count=' . ($bfa_ata_archives_category_count == "Yes" ? '1' : '0') . 
			'&depth=' . $bfa_ata_archives_category_depth . 
			($bfa_ata_archives_category_feed == "Yes" ? '&feed_image=' . get_bloginfo('template_directory') . '/images/icons/feed.gif' : '')); ?>
			</ul>
			<?php } ?>
			
			</div>
			
			<?php } // End Archives Page ?>					
					
					
					
					
					<?php // Post Footer
					if( (is_home() && $bfa_ata_post_footer_home != "") OR (is_page() && $bfa_ata_post_footer_page != "") OR 
					(is_single() && $bfa_ata_post_footer_single != "") OR ( (is_archive() OR is_search() OR is_author() OR is_tag()) && $bfa_ata_post_footer_multi != "") ) {
					echo '<div class="post-footer">';
					if ( is_home() ) { echo postinfo("$bfa_ata_post_footer_home"); } 
					elseif ( is_page() ) { echo postinfo("$bfa_ata_post_footer_page"); } 
					elseif ( is_single() ) { echo postinfo("$bfa_ata_post_footer_single"); } 
					else { echo postinfo("$bfa_ata_post_footer_multi"); } 
					echo '</div>';
					} ?>
						
				</div><!-- / Post -->
							
				<?php // END of: Do this for all posts
				endwhile; ?>

				<?php // Next/Previous POST Links (on single post pages) 
				if ( is_single() AND strpos($bfa_ata_location_single_next_prev,'Middle')!==false ) 
				{ echo '
					<div class="navigation-middle">
						<div class="older' . ($bfa_ata_home_single_next_prev != '' ? '-home' : '') . '">'; 
						$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? previous_post_link(bfa_escape($bfa_ata_single_next_prev_older)) : 
						next_post_link(bfa_escape($bfa_ata_single_next_prev_newer));
						echo ' &nbsp;</div>' . ($bfa_ata_home_single_next_prev!= '' ? '<div class="home"><a href="' . get_option('home') . '/">' . 
						$bfa_ata_home_single_next_prev . '</a></div>' : '') . '<div class="newer' . ($bfa_ata_home_single_next_prev != '' ? '-home' : '') . '">&nbsp; '; 
						$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? next_post_link(bfa_escape($bfa_ata_single_next_prev_newer)) : 
						previous_post_link(bfa_escape($bfa_ata_single_next_prev_older));
						echo '</div>
					<div class="clearboth"></div>
					</div>';			
				} ?>

				<?php // Load Comments template (on single post pages, and "Page" pages, if set on options page) 
				if ( is_single() OR ( is_page() && $bfa_ata_comments_on_pages == "Yes") ) {
				if (function_exists('paged_comments')) { 
				paged_comments_template(); // If plugin "Paged Comments" is activated, for WP 2.6 and older
				} else { 
				comments_template(); // This will load either legacy comments template (for WP 2.6 and older) or the new standard comments template (for WP 2.7 and newer)
				}	 
				} ?>
				
			<!-- / If there are any posts -->
		
			
			<?php // If there are no posts 
			else : ?>
				<h2><?php _e('Not Found','atahualpa'); ?></h2>
				<p><?php _e("Sorry, but you are looking for something that isn't here.","atahualpa"); ?></p>
			<?php endif; ?>

				<?php // Next/Previous POST Links (on single post pages) 
				// in next_post_link "next" means newer 
				if ( is_single() AND strpos($bfa_ata_location_single_next_prev,'Bottom')!==false ) 
				{ echo '
					<div class="navigation-bottom">
						<div class="older' . ($bfa_ata_home_single_next_prev != '' ? '-home' : '') . '">'; 
						$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? 
						previous_post_link(bfa_escape($bfa_ata_single_next_prev_older)) : 
						next_post_link(bfa_escape($bfa_ata_single_next_prev_newer));
						echo ' &nbsp;</div>' . ($bfa_ata_home_single_next_prev!= '' ? '<div class="home"><a href="' . get_option('home') . '/">' . 
						$bfa_ata_home_single_next_prev . '</a></div>' : '') . '<div class="newer' . ($bfa_ata_home_single_next_prev != '' ? '-home' : '') . '">&nbsp; '; 
						$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? 
						next_post_link(bfa_escape($bfa_ata_single_next_prev_newer)) : 
						previous_post_link(bfa_escape($bfa_ata_single_next_prev_older));
						echo '</div>
					<div class="clearboth"></div>
					</div>';			
				} ?>
				
				<?php // Next/Previous PAGE Links (on multi post pages) 
				// in next_posts_link "next" means older 
				if ( !is_single() AND !is_page() AND strpos($bfa_ata_location_multi_next_prev,'Bottom')!==false AND show_posts_nav() ) {
					if (function_exists('wp_pagenavi')) { 
					echo '<div class="wp-pagenavi-navigation">'; wp_pagenavi(); echo '</div>'; 
					} else { 
					echo '
					<div class="navigation-bottom">
						<div class="older' . $nav_home_add . '">'; 
						$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? 
						next_posts_link(bfa_escape($bfa_ata_multi_next_prev_older)) : 
						previous_posts_link(bfa_escape($bfa_ata_multi_next_prev_newer)); 
						echo ' &nbsp;</div>' . $nav_home_div . '<div class="newer' . $nav_home_add . '">&nbsp; ';
						$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? 
						previous_posts_link(bfa_escape($bfa_ata_multi_next_prev_newer)) : 
						next_posts_link(bfa_escape($bfa_ata_multi_next_prev_older)); 
						echo '</div>
					<div style="clear:both"></div>
					</div>'; 
					} 
				} ?>		

			
				
		</td>
		<!-- / Main Column -->	

		<?php if ( $right_col == "on" ) { ?>
		<!-- Right Sidebar -->
		<td id="right">

			<?php // Widgetize the Right Sidebar 
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : 	
			endif; ?>

		</td>
		<!-- / Right Sidebar -->
		<?php } ?>

	</tr>
	<!-- / Main Body -->

<?php get_footer(); ?>