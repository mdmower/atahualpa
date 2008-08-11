<title><?php 
if ( is_home() ) {
	bloginfo('name');} else {

	if ( is_single() OR is_page() ) { 
		$ata_page_title = htmlentities(single_post_title('', false),ENT_QUOTES); } 
	elseif ( is_category() ) { 
		$ata_page_title = htmlentities(single_cat_title('', false),ENT_QUOTES); } 
	elseif ( function_exists('is_tag') && is_tag() ) { 
		$ata_page_title = htmlentities(single_tag_title('', false),ENT_QUOTES); }
	elseif ( is_search() ) { 
		$ata_page_title = htmlentities(wp_specialchars($s),ENT_QUOTES);	} 
	elseif ( is_day() ) { 
		$ata_page_title = get_the_time('l, F jS, Y'); } 
	elseif ( is_month() ) { 
		$ata_page_title = get_the_time('F Y'); }
	elseif ( is_year() ) { 
		$ata_page_title = get_the_time('Y'); } 
#	elseif ( is_author() ) { 
#		$ata_page_title = htmlentities(the_author(),ENT_QUOTES); }   // this would not work
	elseif ( is_404() ) { 
		$ata_page_title = "404 - Page not found"; }
	else { 
		$ata_page_title = wp_title('', false); } 
	
	switch ($ata_title_separator_code) {
		case 1: $ata_title_separator = " &#171; "; break;
		case 2: $ata_title_separator = " &#187; "; break;
		case 3: $ata_title_separator = " &#58; "; break;
		case 4: $ata_title_separator = "&#58; "; break;
		case 5: $ata_title_separator = " &#62; "; break;
		case 6: $ata_title_separator = " &#60; "; break;
		case 7: $ata_title_separator = " &#45; "; break;
		case 8: $ata_title_separator = " &#8249; "; break;
		case 9: $ata_title_separator = " &#8250; "; break;
		case 10: $ata_title_separator = " &#8226; "; break;
		case 11: $ata_title_separator = " &#183; "; break;
		case 12: $ata_title_separator = " &#151; "; break;
		case 13: $ata_title_separator = " &#124; "; break;	
	}
//
// 3 different styles for meta title: (1) Blog Title - Page Title, (2) Page Title - Blog Title, (3) Page Title
// To be set in WP Admin -> Design ("Presentation" in WP 2.3 and older) -> [Theme Name] Theme Options -> SEO
//
	if ($ata_add_blogtitle == "Blog Title - Page Title") {
		bloginfo('name'); echo $ata_title_separator . $ata_page_title; }
	elseif ($ata_add_blogtitle == "Page Title - Blog Title") {
		echo "$ata_page_title" . "$ata_title_separator"; bloginfo('name'); }
	elseif ($ata_add_blogtitle == "Page Title") { echo $ata_page_title; }
}
// END TITLE TAG
//
?>
</title>
<?php 
//
// META DESCRIPTION Tag for (only) the HOMEPAGE. 
// To be set in WP Admin -> Design ("Presentation" in WP 2.3 and older) -> [Theme Name] Theme Options -> SEO
//
if ( is_home() && trim($ata_homepage_meta_description) != "" ) { 
	echo "<meta name=\"description\" content=\"$ata_homepage_meta_description\">\n"; 
	}
//
// META KEYWORDS Tag for (only) the HOMEPAGE. 
// To be set in WP Admin -> Design ("Presentation" in WP 2.3 and older) -> [Theme Name] Theme Options -> SEO
if ( is_home() && trim($ata_homepage_meta_keywords) != "" ) { 
	echo "<meta name=\"keywords\" content=\"$ata_homepage_meta_keywords\">\n"; 
	}
//
// META DESCRIPTION Tag for CATEGORY PAGES, if a category description exists:
//
if ( is_category() && strip_tags(trim(category_description())) != "" ) {
	echo "<meta name=\"description\" content=\"" . category_description() . "\" />\n"; 	 
}
//
// prevent duplicate content by making archive pages noindex:
// To be set in WP Admin -> Design ("Presentation" in WP 2.3 and older) -> [Theme Name] Theme Options -> SEO
//
if ($ata_archive_noindex == "Yes" && (is_day() OR is_month() OR is_year()) ) { ?>
<meta name="robots" content="noindex, follow" />  <?php echo "\n"; } 
if ($ata_cat_tag_noindex == "Yes" && (is_category() OR is_tag() )) { ?>
<meta name="robots" content="noindex, follow" />  <?php echo "\n"; } ?>