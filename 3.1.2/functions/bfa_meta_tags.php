<?php
# check to see if any of these SEO plugins is installed. If yes, the Bytes For All SEO options will be
# deactivated, not matter what the option "Use Bytes For All SEO options?" is set to
# (at Admin -> Design|Presentation -> [Theme Name] Theme Options)
#
if(class_exists('All_in_One_SEO_Pack') OR // if "All-In-One_SEO" Plugin (http://semperfiwebdesign.com) is installed
class_exists('wpSEO') OR // if "WpSEO" Plugin (http://www.wpseo.de/) is installed
class_exists('HeadSpace2_Admin') OR // if "HeadSpace2" Plugin (http://urbangiraffe.com/plugins/headspace2/) is installed
function_exists('seo_title_tag_options_page') OR // if "SEO Title Tag" Plugin (http://www.netconcepts.com/seo-title-tag-plugin/) is installed
class_exists('Another_WordPress_Meta_Plugin') OR // if "Another WordPress Meta Plugin" (http://wp.uberdose.com/2006/11/04/another-wordpress-meta-plugin/) is installed
class_exists('Platinum_SEO_Pack') OR // if "Platinum_SEO_Pack" Plugin (http://techblissonline.com/platinum-seo-pack/) is installed
function_exists('headmeta') OR // if "HeadMeta" Plugin (http://dougal.gunters.org/blog/2004/06/17/my-first-wordpress-plugin-headmeta) is installed
function_exists('bas_improved_meta_descriptions') OR // if "Improved Meta Description Snippets" Plugin (http://www.microkid.net/wordpress-plugins/improved-meta-description-snippets/) is installed
function_exists('head_meta_desc') OR // if "Head META Description" Plugin (http://guff.szub.net/head-meta-description/) is installed
class_exists('RobotsMeta_Admin') OR // if "Robots Meta" Plugin (http://yoast.com/wordpress/robots-meta/) is installed
function_exists('quickkeywords') OR // if "Quick META Keywords" Plugin (http://www.quickonlinetips.com/) is installed
class_exists('Add_Your_Own_Headers') OR // if "Add Your Own Headers" Plugin (http://wp.uberdose.com/2007/03/30/add-your-own-headers/) is installed
function_exists('SEO_wordpress') OR // if "SEO_Wordpress" Plugin (http://www.utheguru.com/seo_wordpress-wordpress-seo-plugin) is installed
$bfa_ata_use_bfa_seo == "No") { // if the option "Use Bytes For All SEO options?" is set to "No" (at Admin -> Design|Presentation -> [Theme Name] Theme Options)
?>
<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<?php } else { ?>
<title><?php 
if ( is_home() ) {
	bloginfo('name');} else {

	if ( is_single() OR is_page() ) { 
#		$bfa_ata_page_title = htmlentities(single_post_title('', false),ENT_QUOTES); } 
		$bfa_ata_page_title = single_post_title('', false); } // post and page titles get their own filter from WP
	elseif ( is_category() ) { 
		$bfa_ata_page_title = htmlentities(single_cat_title('', false),ENT_QUOTES); } // cat titles don't get a filter, so htmlentities is required
	elseif ( function_exists('is_tag') && is_tag() ) { 
#		$bfa_ata_page_title = htmlentities(single_tag_title('', false),ENT_QUOTES); }
		$bfa_ata_page_title = single_tag_title('', false); } // tag titles get their own filter from WP
	elseif ( is_search() ) { 
		$bfa_ata_page_title = htmlentities(wp_specialchars($s),ENT_QUOTES);	} // no WP filter, htmlentities required 
	elseif ( is_day() ) { 
		$bfa_ata_page_title = get_the_time(__('l, F jS, Y','atahualpa')); } 
	elseif ( is_month() ) { 
		$bfa_ata_page_title = get_the_time(__('F Y','atahualpa')); }
	elseif ( is_year() ) { 
		$bfa_ata_page_title = get_the_time('Y'); } 
#	elseif ( is_author() ) { 
#		$bfa_ata_page_title = htmlentities(the_author(),ENT_QUOTES); }   // this won't work
	elseif ( is_404() ) { 
		$bfa_ata_page_title = __('404 - Page not found','atahualpa'); }
	else { 
		$bfa_ata_page_title = wp_title('', false); } 
	
	switch ($bfa_ata_title_separator_code) {
		case 1: $bfa_ata_title_separator = " &#171; "; break;
		case 2: $bfa_ata_title_separator = " &#187; "; break;
		case 3: $bfa_ata_title_separator = " &#58; "; break;
		case 4: $bfa_ata_title_separator = "&#58; "; break;
		case 5: $bfa_ata_title_separator = " &#62; "; break;
		case 6: $bfa_ata_title_separator = " &#60; "; break;
		case 7: $bfa_ata_title_separator = " &#45; "; break;
		case 8: $bfa_ata_title_separator = " &#8249; "; break;
		case 9: $bfa_ata_title_separator = " &#8250; "; break;
		case 10: $bfa_ata_title_separator = " &#8226; "; break;
		case 11: $bfa_ata_title_separator = " &#183; "; break;
		case 12: $bfa_ata_title_separator = " &#151; "; break;
		case 13: $bfa_ata_title_separator = " &#124; "; break;	
	}
//
// 3 different styles for meta title tag: (1) Blog Title - Page Title, (2) Page Title - Blog Title, (3) Page Title
// To be set in WP Admin -> Design ("Presentation" in WP 2.3 and older) -> [Theme Name] Theme Options 
//
	if ($bfa_ata_add_blogtitle == "Blog Title - Page Title") {
		bloginfo('name'); echo $bfa_ata_title_separator . $bfa_ata_page_title; }
	elseif ($bfa_ata_add_blogtitle == "Page Title - Blog Title") {
		echo $bfa_ata_page_title . $bfa_ata_title_separator; bloginfo('name'); }
	elseif ($bfa_ata_add_blogtitle == "Page Title") { echo $bfa_ata_page_title; }
}
// END TITLE TAG
//
?>
</title>
<?php 
//
// META DESCRIPTION Tag for (only) the HOMEPAGE. 
// To be set in WP Admin -> Design ("Presentation" in WP 2.3 and older) -> [Theme Name] Theme Options 
//
if ( is_home() && trim($bfa_ata_homepage_meta_description) != "" ) { 
	echo "<meta name=\"description\" content=\"" . htmlentities($bfa_ata_homepage_meta_description,ENT_QUOTES) . "\" />\n"; 
	}
//
// META KEYWORDS Tag for (only) the HOMEPAGE. 
// To be set in WP Admin -> Design ("Presentation" in WP 2.3 and older) -> [Theme Name] Theme Options 
if ( is_home() && trim($bfa_ata_homepage_meta_keywords) != "" ) { 
	echo "<meta name=\"keywords\" content=\"" . htmlentities($bfa_ata_homepage_meta_keywords,ENT_QUOTES) . "\" />\n"; 
	}
//
// META DESCRIPTION Tag for CATEGORY PAGES, if a category description exists:
//
if ( is_category() && strip_tags(trim(category_description())) != "" ) {
	// the category description gets its own ASCII code filter from WP, 
	// but <p> ... </p> tags will be included by WP, so we remove them here:
	echo "<meta name=\"description\" content=\"" . strip_tags(trim(category_description())) . "\" />\n"; 	 
}
//
// prevent duplicate content by making archive pages noindex:
// To be set in WP Admin -> Design ("Presentation" in WP 2.3 and older) -> [Theme Name] Theme Options 
//
// If it's a date, category or tag page:
if ( ($bfa_ata_archive_noindex == "Yes" && is_date()) OR 
($bfa_ata_cat_noindex == "Yes" && is_category()) OR 
($bfa_ata_tag_noindex == "Yes" && is_tag()) ) { ?>
<meta name="robots" content="noindex, follow" />  <?php echo "\n"; } ?>
<?php } ?>