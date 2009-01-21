<?php 
function bfa_header_config($header_items) {

global $options;
foreach ($options as $value) {
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } }

if (strpos($header_items,'%image')!==false) { include (TEMPLATEPATH . '/functions/bfa_rotating_header_images.php'); } 

if (strpos($header_items,'%pages')!==false) {
// Page Menu Bar 
$page_menu_bar = '<div id="menu1"><ul id="rmenu2" class="clearfix rMenu-hor rMenu">' . "\n";
if ($bfa_ata_home_page_menu_bar != '') {
	$page_menu_bar .= '<li class="page_item';
	if (function_exists('is_front_page')) {
		if (is_front_page() OR is_home()) { $page_menu_bar .= ' current_page_item';
		}} elseif (is_home()) { $page_menu_bar .= ' current_page_item';	}
$page_menu_bar .= '"><a href="' . get_option('home') . '/" title="' . get_option('blogname') . '">' . 
$bfa_ata_home_page_menu_bar . '</a></li>' . "\n";	
}	
if ($bfa_ata_levels_page_menu_bar == "") {$bfa_ata_levels_page_menu_bar = 0; }	
$page_menu_bar .= bfa_hor_pages($bfa_ata_sorting_page_menu_bar, $bfa_ata_levels_page_menu_bar, $bfa_ata_titles_page_menu_bar, $bfa_ata_exclude_page_menu_bar);
$page_menu_bar .= '</ul></div>' . "\n";
// END of Page Menu Bar 
}

if (strpos($header_items,'%cats')!==false) {
// Category Menu Bar 
$cat_menu_bar = '<div id="menu2"><ul id="rmenu" class="clearfix rMenu-hor rMenu">' . "\n";
if ($bfa_ata_home_cat_menu_bar != '') {
	$cat_menu_bar .= '<li class="cat-item';
	if (function_exists('is_front_page')) {
		if (is_front_page() OR is_home()) { $cat_menu_bar .= ' current-cat';
		}} elseif (is_home()) { $cat_menu_bar .= ' current-cat';	}
$cat_menu_bar .= '"><a href="' . get_option('home') . '/" title="' . get_option('blogname') . '">' . 
$bfa_ata_home_cat_menu_bar . '</a></li>' . "\n";	
}	
if ($bfa_ata_levels_cat_menu_bar == "") {$bfa_ata_levels_cat_menu_bar = 0; }	
$cat_menu_bar .= bfa_hor_cats($bfa_ata_sorting_cat_menu_bar, $bfa_ata_levels_cat_menu_bar, $bfa_ata_titles_cat_menu_bar, $bfa_ata_exclude_cat_menu_bar);
$cat_menu_bar .= '</ul></div>' . "\n";
// END of Category Menu Bar 
}

if (strpos($header_items,'%logo')!==false) {
// Logo Area 
$logo_area = '<table id="logoarea" cellpadding="0" cellspacing="0" border="0" width="100%"><tr>';

if ($bfa_ata_show_search_box == "Yes" AND ($bfa_ata_show_posts_icon == "Yes" OR $bfa_ata_show_email_icon == "Yes" OR $bfa_ata_show_comments_icon == "Yes")) { 
$header_rowspan = 'rowspan="2" '; } else { $header_rowspan = ''; }

	// Logo Icon for Wordpress and WPMU
	if ($bfa_ata_logo != "") { 
		$logo_area .= '<td ' . $header_rowspan . 'valign="middle" class="logoarea-logo"><a href="' . get_option('home') . '/"><img class="logo" src="';
			// if this is WordPress MU 
			if (file_exists(ABSPATH."/wpmu-settings.php")) {
				// two ways to figure out the upload path on WPMU, version 1:
				$upload_path1 = ABSPATH . get_option('upload_path');
				// Version 2: You will have to change "atahualpa3" if you changed the theme's directory name
				$upload_path2 = str_replace('themes/atahualpa3/functions', '', $_SERVER['DOCUMENT_ROOT']) . 
				'/wp-content/blogs.dir/' . $wpdb->blogid . '/files';
				// see if user has uploaded his own "logosymbol.gif" somewhere into his upload folder, version 1:
				$wpmu_logosymbol = m_find_in_dir($upload_path1,$bfa_ata_logo); $upload_path = $upload_path1;
				// try version 2 if no logosymbol.gif was found:
				if (!$wpmu_logosymbol) {
					$wpmu_logosymbol = m_find_in_dir($upload_path2,$bfa_ata_logo); $upload_path = $upload_path2;
					}
				// if we found logosymbol.gif one way or another, figure out the public URL
				if ($wpmu_logosymbol) {
					$new_logosymbol = str_replace($upload_path,
					get_option('fileupload_url'), $wpmu_logosymbol); 
					$logo_area .= $new_logosymbol[0] . '" alt="' . get_bloginfo('name');
					// otherwise: print the one in the theme folder
					} 
				else { 
					$logo_area .= get_bloginfo('template_directory') . '/images/' . $bfa_ata_logo . '" alt="' . get_bloginfo('name'); 
					}
			// if this is Wordpress and not WPMU, print the logosymbol.gif in the theme folder right away
			} else { 
				$logo_area .= get_bloginfo('template_directory') . '/images/' . $bfa_ata_logo . '" alt="' . get_bloginfo('name'); 
				} 
	$logo_area .= '" /></a></td>';
	} 
	// END of Logo Icon

	// Blog title and description
	if ( $bfa_ata_blog_title_show == "Yes" OR $bfa_ata_blog_tagline_show == "Yes" ) {
	$logo_area .= '<td ' . $header_rowspan . 'valign="middle" class="logoarea-title">';
			if ( $bfa_ata_blog_title_show == "Yes" ) {
			$logo_area .= '<h1 class="blogtitle"><a href="' . get_option('home') . '/">' . get_bloginfo('name') . '</a></h1>';
			}
			if ( $bfa_ata_blog_tagline_show == "Yes" ) {
			$logo_area .= '<p class="tagline">' . get_bloginfo( 'description' ) . '</p>';
			}
	$logo_area .= '</td>';
	}
	// END of title/description

	// is any feed icon or link active?
	if ($bfa_ata_show_posts_icon == "Yes" OR $bfa_ata_show_email_icon == "Yes" OR $bfa_ata_show_comments_icon == "Yes") {
	$logo_area .= '<td class="feed-icons" valign="middle" align="right"><div class="clearfix rss-box">';
	}

	// COMMENT Feed link
	if ($bfa_ata_show_comments_icon == "Yes" ) { 
	$logo_area .= '<a class="comments-icon" '; 
	if ($bfa_ata_nofollow == "Yes") { $logo_area .= 'rel="nofollow" '; } 
	$logo_area .= 'href="' . get_bloginfo('comments_rss2_url') . '" title="' . $bfa_ata_comment_feed_link_title . '">' . $bfa_ata_comment_feed_link . '</a>';
	} 
	// END: of COMMENT Feed link 
	
	// Feedburner Email link
	if ($bfa_ata_show_email_icon == "Yes" ) { 
	$logo_area .= '<a class="email-icon" '; 
	if ($bfa_ata_nofollow == "Yes") { $logo_area .= 'rel="nofollow" '; } 
	$logo_area .= 'href="http://www.feedburner.com/fb/a/emailverifySubmit?feedId=' . 
	$bfa_ata_feedburner_email_id . '&amp;loc=' . get_bloginfo('language') . '" title="' . $bfa_ata_email_subscribe_link_title . '">' . $bfa_ata_email_subscribe_link . '</a>';
	} 
	// END: of Feedburner Email link 
	
	// POSTS Feed link
	if ($bfa_ata_show_posts_icon == "Yes" ) { 
	$logo_area .= '<a class="posts-icon" '; 
	if ($bfa_ata_nofollow == "Yes") { $logo_area .= 'rel="nofollow" '; } 
	$logo_area .= 'href="' . get_bloginfo('rss2_url') . '" title="' . $bfa_ata_post_feed_link_title . '">' . $bfa_ata_post_feed_link . '</a>';
	} 
	// END: of POSTS Feed link 

	if ($bfa_ata_show_posts_icon == "Yes" OR $bfa_ata_show_email_icon == "Yes" OR $bfa_ata_show_comments_icon == "Yes") {
	$logo_area .= '</div></td>';
		if ($bfa_ata_show_search_box == "Yes" ) { 
		$logo_area .= '</tr><tr>';
		}
	}	
	
	// Search box
	if ($bfa_ata_show_search_box == "Yes" ) { 
	$logo_area .= '<td valign="bottom" class="search-box" align="right">';
	$logo_area .= '<div class="searchbox">
		<form method="get" class="searchform" action="' . get_bloginfo( 'url' ) . '/">
		<div class="searchbox-form">
			<input type="text" class="text inputblur" onfocus="this.value=\''.(get_search_query() ? get_search_query() : '' ).'\'" 
			value="' . (get_search_query() ? get_search_query() : $bfa_ata_searchbox_text ) . 
			'" onblur="this.value=\''.(get_search_query() ? get_search_query() : $bfa_ata_searchbox_text ).'\'" name="s" />
		</div>
		</form>
	</div>
	</td>';
	} 
	// END of Search box 

$logo_area .= '</tr></table>';	
// END of Logo Area 
}

if (strpos($header_items,'%image')!==false) {
// Header Image
$header_image = '<div class="header-image-container" style="background: url(' . $selected_header_image . ') ' . $bfa_ata_headerimage_alignment . ' no-repeat;">';
$header_image .= ($bfa_ata_header_image_clickable == "Yes" ? '<div class="clickable">
				<a class="divclick" title="' . get_bloginfo('name') . '" href ="' . get_option('home') . '/">&nbsp;</a></div>' : '' );

		if ( $bfa_ata_header_opacity_left != 0 AND $bfa_ata_header_opacity_left != '' ) { 
			$header_image .= '<div class="opacityleft">&nbsp;</div>';
			}
		if ( $bfa_ata_header_opacity_right != 0 AND $bfa_ata_header_opacity_right != '' ) { 
			$header_image .= '<div class="opacityright">&nbsp;</div>';
			}
		// END: If Header Opacity 
		if ( $bfa_ata_overlay_blog_title == "Yes" OR $bfa_ata_overlay_blog_tagline == "Yes" ) {
		$header_image .= '<div class="titleoverlay">' . 
			( $bfa_ata_overlay_blog_title == "Yes" ? '<h1 class="blogtitle"><a href="' . get_option('home') . '/">' . get_bloginfo('name') . '</a></h1>' : '' ) . 
			( $bfa_ata_overlay_blog_tagline == "Yes" ? '<p class="tagline">' . get_bloginfo( 'description' ) . '</p>' : '' ) . 
			'</div>';
		}

$header_image .= '</div>';
// END of Header Image
}

if (strpos($header_items,'%bar1')!==false) {
// Horizontal bar 1
$horizontal_bar1 = '<div class="horbar1">&nbsp;</div>';
// END of Horizontal bar 1
}

if (strpos($header_items,'%bar2')!==false) {
// Horizontal bar 2
$horizontal_bar2 = '<div class="horbar2">&nbsp;</div>';
// END of Horizontal bar 2
}

$header_item_numbers = array("%pages", "%cats", "%logo", "%image", "%bar1", "%bar2");
$header_output = array($page_menu_bar, $cat_menu_bar, $logo_area, $header_image, $horizontal_bar1, $horizontal_bar2);

$header_items = trim($header_items);
$header_items = str_replace(" ", "", $header_items);
$final_header = str_replace($header_item_numbers, $header_output, $header_items);

echo $final_header;
}
?>