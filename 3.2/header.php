<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<?php global $options; 
foreach ($options as $value) { if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>
<?php include (TEMPLATEPATH . '/functions/bfa_meta_tags.php'); ?>
<?php if ($bfa_ata_favicon_file != "") { ?><link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon/<?php echo $bfa_ata_favicon_file; ?>" /><?php } ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/ruthsarian_utilities.js"></script>
<script type="text/javascript">
	<!--
	if ( ( typeof( sfHover ) ).toLowerCase() != 'undefined' ) { event_attach( 'onload' , function () { 
	<?php if (strpos($bfa_ata_configure_header,'pages')!==FALSE) { ?>sfHover( 'rmenu2' );<?php } ?>
	<?php if (strpos($bfa_ata_configure_header,'cats')!==FALSE) { ?>sfHover( 'rmenu' );<?php } ?>	
	if (document.getElementById("recent-comments") != null) { sfHover( 'recent-comments' ); }
	if (document.getElementById("bfa-recent-comments") != null) {sfHover( 'bfa-recent-comments' ); }
		} ); }
	//-->
</script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-1.2.6.min.js"></script>
<script type="text/javascript">
<!--
var $bfa = jQuery.noConflict();
$bfa(document).ready(function(){    
	// IE6 max-width for images 
	if ($bfa.browser.msie && /MSIE 6\.0/i.test(window.navigator.userAgent) && !/MSIE 7\.0/i.test(window.navigator.userAgent)) {
	var centerwidth = $bfa("td#middle").width(); 
	// without caption
	$bfa(".post img").each(function() { 
		var maxwidth = centerwidth - 10 + 'px';
		var imgwidth = $bfa(this).width(); 
		var imgheight = $bfa(this).height(); 
		var newimgheight = (centerwidth / imgwidth * imgheight) + 'px';	
		if (imgwidth > centerwidth) { 
			$bfa(this).css({width: maxwidth}); 
			$bfa(this).css({height: newimgheight}); 
		}
	});
	// with caption
	$bfa("div.wp-caption").each(function() { 
		var captionwidth = $bfa(this).width(); 
		var maxcaptionwidth = centerwidth + 'px';
		var captionheight = $bfa(this).height();
		var captionimgwidth =  $bfa("div.wp-caption img").width();
		var captionimgheight =  $bfa("div.wp-caption img").height();
		if (captionwidth > centerwidth) { 
			$bfa(this).css({width: maxcaptionwidth}); 
			var newcaptionheight = (centerwidth / captionwidth * captionheight) + 'px';
			var newcaptionimgheight = (centerwidth / captionimgwidth * captionimgheight) + 'px';
			$bfa(this).css({height: newcaptionheight}); 
			$bfa("div.wp-caption img").css({height: newcaptionimgheight}); 
			}
	});
	}
	<?php if ($bfa_ata_table_hover_rows == "Yes") { ?>
	$bfa(".post table tr").mouseover(function() {$bfa(this).addClass("over");}).mouseout(function() {$bfa(this).removeClass("over");});
	<?php } else { ?>
	$bfa(".post table.hover tr").mouseover(function() {$bfa(this).addClass("over");}).mouseout(function() {$bfa(this).removeClass("over");});	
	<?php } ?>
	<?php if ($bfa_ata_table_zebra_stripes == "Yes") { ?>
	$bfa(".post table tr:even").addClass("alt");
	<?php } else { ?>
	$bfa(".post table.zebra tr:even").addClass("alt");	
	<?php } ?>
	<?php if ($bfa_ata_highlight_forms == "Yes") { ?>
	$bfa("input.text, input.TextField, input.file, input.password, textarea").focus(function () {  $bfa(this).addClass("highlight"); }).blur(function () { $bfa(this).removeClass("highlight"); })
	<?php } ?>
	$bfa("input.inputblur").focus(function () {  $bfa(this).addClass("inputfocus"); }).blur(function () { $bfa(this).removeClass("inputfocus"); })
	<?php if (function_exists('lmbbox_comment_quicktags_display')) { ?>
	$bfa("input.ed_button").mouseover(function() {$bfa(this).addClass("ed_button_hover");}).mouseout(function() {$bfa(this).removeClass("ed_button_hover");});
	<?php } ?>
	$bfa("input.button, input.Button").mouseover(function() {$bfa(this).addClass("buttonhover");}).mouseout(function() {$bfa(this).removeClass("buttonhover");});
	// toggle "you can use these xhtml tags
	$bfa("a.xhtmltags").click(function(){ $bfa("div.xhtml-tags").slideToggle(300); });
});
//-->
</script>
<?php if ( function_exists('wp_list_comments') AND is_singular() ) { wp_enqueue_script( 'comment-reply' ); } ?>
<style type="text/css">
body {
	<?php echo $bfa_ata_body_style; ?>
	}

a:link, a:visited, a:active {
	color: #<?php echo $bfa_ata_link_color; ?>; 
	font-weight: <?php echo $bfa_ata_link_weight; ?>; 
	text-decoration: <?php echo $bfa_ata_link_default_decoration; ?>; 
	}
	
a:hover {
	color: #<?php echo $bfa_ata_link_hover_color; ?>;
	font-weight: <?php echo $bfa_ata_link_weight; ?>; 
	text-decoration: <?php echo $bfa_ata_link_hover_decoration; ?>; 
	}
		
<?php if  ( $bfa_ata_layout_style_leftright_padding == "" ) { 
	$bfa_ata_layout_style_leftright_padding = "0"; }
	if ( $bfa_ata_layout_style_leftright_padding != "0" ) { 
	$bfa_ata_layout_min = $bfa_ata_layout_min_width + ( $bfa_ata_layout_style_leftright_padding * 2 );
	$bfa_ata_layout_max = $bfa_ata_layout_max_width + ( $bfa_ata_layout_style_leftright_padding * 2 );	
	} else {
	$bfa_ata_layout_min = $bfa_ata_layout_min_width;
	$bfa_ata_layout_max = $bfa_ata_layout_max_width;
	}
	?>

div#wrapper {
	width: <?php echo $bfa_ata_layout_width; ?>;
	<?php // if layout is fluid, set min/max width, if defined:
	if(stristr($bfa_ata_layout_width, 'px') === FALSE) { 
	echo ($bfa_ata_layout_min_width == "" ? "" : "min-width: " . $bfa_ata_layout_min . "px;\n"); 
	echo ($bfa_ata_layout_max_width == "" ? "" : "max-width: " . $bfa_ata_layout_max . "px;\n");	
	} ?>
	}

<?php // min/max width for IE6:
if(stristr($bfa_ata_layout_width, 'px') === FALSE && ($bfa_ata_layout_min != "" OR $bfa_ata_layout_max != "" )) { ?>
* html div#wrapper {
	width:expression<?php if($bfa_ata_layout_max_width != "") { ?>(((document.compatMode && 
	document.compatMode=='CSS1Compat') ? 
	document.documentElement.clientWidth : 
	document.body.clientWidth) 
	> <?php echo $bfa_ata_layout_max +1; ?> ? "<?php echo $bfa_ata_layout_max; ?>px" : 
	<?php } if($bfa_ata_layout_min_width == "") { ?>"<?php echo $bfa_ata_layout_width; ?>");}<?php } else { ?>
	(((document.compatMode && 
	document.compatMode=='CSS1Compat') ? 
	document.documentElement.clientWidth : 
	document.body.clientWidth) 
	< <?php echo $bfa_ata_layout_min + 1; ?> ? "<?php echo $bfa_ata_layout_min; ?>px" : 
	"<?php echo $bfa_ata_layout_width; ?>")); 
	}
<?php } } ?>

div#container {
	<?php echo $bfa_ata_layout_style; ?>
	<?php if ( $bfa_ata_layout_style_leftright_padding != "0" ) { ?>
	padding-left: <?php echo $bfa_ata_layout_style_leftright_padding; ?>px;
	padding-right: <?php echo $bfa_ata_layout_style_leftright_padding; ?>px;
	<?php } ?>
	}

.colone {width: <?php echo $bfa_ata_left_sidebar_width; ?>px;}
.colthree {width: <?php echo $bfa_ata_right_sidebar_width; ?>px;}
	
table#logoarea {
	border-spacing: 0px;
	<?php echo $bfa_ata_logoarea_style; ?>
	}
	
.logo {
	<?php echo $bfa_ata_logo_style; ?>
	}

h1.blogtitle {
	<?php echo $bfa_ata_blog_title_style; ?>
	}
	
h1.blogtitle a:link, 
h1.blogtitle a:visited, 
h1.blogtitle a:active {
	color: #<?php echo $bfa_ata_blog_title_color; ?>;
	font-weight: <?php echo $bfa_ata_blog_title_weight; ?>;
	}
	
h1.blogtitle a:hover {
	color: #<?php echo $bfa_ata_blog_title_color_hover; ?>;
	font-weight: <?php echo $bfa_ata_blog_title_weight; ?>;
	}

p.tagline { 
	<?php echo $bfa_ata_blog_tagline_style; ?>
	}

div.rss-box {
	width: <?php echo $bfa_ata_rss_box_width; ?>px;
	}
	
.searchbox {
	height: 35px;
	<?php echo $bfa_ata_searchbox_style; ?>
	}

.horbar1 {
	<?php echo $bfa_ata_horbar1; ?>
	}
	
.horbar2 { 
	<?php echo $bfa_ata_horbar2; ?>
	}	

<?php if (strpos($bfa_ata_configure_header,'%image')!==false) { ?>
.header-image-container {
	height: <?php echo $bfa_ata_headerimage_height; ?>px; 
	}
<?php } ?>
	
<?php if ( $bfa_ata_overlay_blog_title == "Yes" OR $bfa_ata_overlay_blog_tagline == "Yes" ) { ?>
.titleoverlay {
	<?php echo $bfa_ata_overlay_box_style; ?>
	}
<?php } ?>

<?php if ( $bfa_ata_header_opacity_left != 0 AND $bfa_ata_header_opacity_left != '' ) { ?>
.opacityleft {
	background-color: #<?php echo $bfa_ata_header_opacity_left_color; ?>; 
	height: <?php echo $bfa_ata_headerimage_height; ?>px;
	width: <?php echo $bfa_ata_header_opacity_left_width; ?>px; 
	filter: alpha(opacity=<?php echo $bfa_ata_header_opacity_left; ?>);
	-moz-opacity:.<?php echo $bfa_ata_header_opacity_left; ?>;
	opacity:.<?php echo $bfa_ata_header_opacity_left; ?>;
	}
<?php } ?>

<?php if ( $bfa_ata_header_opacity_right != 0 AND $bfa_ata_header_opacity_right != '' ) { ?>
.opacityright {
	background-color: #<?php echo $bfa_ata_header_opacity_right_color; ?>; 
	height: <?php echo $bfa_ata_headerimage_height; ?>px;
	width: <?php echo $bfa_ata_header_opacity_right_width; ?>px; 
	filter: alpha(opacity=<?php echo $bfa_ata_header_opacity_right; ?>);
	-moz-opacity:.<?php echo $bfa_ata_header_opacity_right; ?>;
	opacity:.<?php echo $bfa_ata_header_opacity_right; ?>;
	}
<?php } ?>


<?php if ($bfa_ata_header_image_clickable == "Yes") { ?>
div.clickable {
	height: <?php echo $bfa_ata_headerimage_height; ?>px; 
	}
<?php } ?>
		
td#left {
	<?php echo $bfa_ata_left_sidebar_style; ?>
	}

td#right {
	<?php echo $bfa_ata_right_sidebar_style; ?>
	}

td#middle {
	<?php echo $bfa_ata_center_column_style; ?>
	}

td#footer {
	width: auto;
	<?php echo $bfa_ata_footer_style; ?>
	}

td#footer a:link, td#footer a:visited, td#footer a:active {
	<?php echo $bfa_ata_footer_style_links; ?>
	}

td#footer a:hover {
	<?php echo $bfa_ata_footer_style_links_hover; ?>
	}
	
div.widget {
	<?php echo $bfa_ata_widget_container; ?>
	}

div.widget-title {
	<?php echo $bfa_ata_widget_title_box; ?>
	}

div.widget-title h3 {
	<?php echo $bfa_ata_widget_title; ?>
	}	
	
div.widget-content {
	<?php echo $bfa_ata_widget_content; ?>
	}

div.widget select { 
	<?php if ( $bfa_ata_select_font_size != "Default" ) { 
	echo "font-size: " . $bfa_ata_select_font_size . ";\n"; } ?> 
}	
	
.widget ul li {
	margin: 2px 0 2px <?php echo $bfa_ata_widget_lists['li-margin-left']; ?>px;
	}

.widget ul li ul li {
	margin: 2px 0 2px <?php echo $bfa_ata_widget_lists2['li-margin-left']; ?>px;  
	}

.widget ul li ul li ul li {
	margin: 2px 0 2px <?php echo $bfa_ata_widget_lists3['li-margin-left']; ?>px;  
	}
	
.widget ul li a:link, 
.widget ul li a:visited, 
.widget ul li a:active {
	padding: 0 0 0 <?php echo $bfa_ata_widget_lists['link-padding-left']; ?>px; 
	color: #<?php echo $bfa_ata_widget_lists['link-color']; ?>; 
	border-left: solid <?php echo $bfa_ata_widget_lists['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists['link-border-left-color']; ?>; 
	}

.widget ul li ul li a:link, 
.widget ul li ul li a:visited, 
.widget ul li ul li a:active {
	padding: 0 0 0 <?php echo $bfa_ata_widget_lists2['link-padding-left']; ?>px; 
	color: #<?php echo $bfa_ata_widget_lists2['link-color']; ?>; 
	border-left: solid <?php echo $bfa_ata_widget_lists2['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists2['link-border-left-color']; ?>; 
	}

.widget ul li ul li ul li a:link, 
.widget ul li ul li ul li a:visited, 
.widget ul li ul li ul li a:active {
	padding: 0 0 0 <?php echo $bfa_ata_widget_lists3['link-padding-left']; ?>px; 
	color: #<?php echo $bfa_ata_widget_lists3['link-color']; ?>; 
	border-left: solid <?php echo $bfa_ata_widget_lists3['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists3['link-border-left-color']; ?>; 
	}

	
.widget ul li a:hover {
	color: #<?php echo $bfa_ata_widget_lists['link-hover-color']; ?>; 
	border-left: solid <?php echo $bfa_ata_widget_lists['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists['link-border-left-hover-color']; ?>; 
	}

.widget ul li ul li a:hover {
	color: #<?php echo $bfa_ata_widget_lists2['link-hover-color']; ?>; 
	border-left: solid <?php echo $bfa_ata_widget_lists2['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists2['link-border-left-hover-color']; ?>; 
	}

.widget ul li ul li ul li a:hover {
	color: #<?php echo $bfa_ata_widget_lists3['link-hover-color']; ?>; 
	border-left: solid <?php echo $bfa_ata_widget_lists3['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists3['link-border-left-hover-color']; ?>; 
	}
	
.widget_categories ul li a:link, 
.widget_categories ul li a:visited, 
.widget_categories ul li a:active,
.widget_categories ul li a:hover {
	display: <?php echo $bfa_ata_category_widget_display_type; ?> !important;  
	}
	
div#get_recent_comments_wrap ul li ul li,
.widget_recent_comments ul li, 
.widget_simple_recent_comments ul li {
	padding: 0 0 0 <?php echo $bfa_ata_widget_lists['link-padding-left']; ?>px; 
	border-left: solid <?php echo $bfa_ata_widget_lists['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists['link-border-left-color']; ?>; 
	}

div#get_recent_comments_wrap ul li ul li ul li, 
.widget_recent_comments ul li ul li, 
.widget_simple_recent_comments ul li ul li {
	padding: 0 0 0 <?php echo $bfa_ata_widget_lists2['link-padding-left']; ?>px; 
	border-left: solid <?php echo $bfa_ata_widget_lists2['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists2['link-border-left-color']; ?>; 
	}

.widget_recent_comments ul li ul li ul li, 
.widget_simple_recent_comments ul li ul li ul li {
	padding: 0 0 0 <?php echo $bfa_ata_widget_lists3['link-padding-left']; ?>px; 
	border-left: solid <?php echo $bfa_ata_widget_lists3['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists3['link-border-left-color']; ?>; 
	}	
	
div#get_recent_comments_wrap ul li ul li:hover, 
.widget_recent_comments ul li:hover, 
.widget_simple_recent_comments ul li:hover, 
div#get_recent_comments_wrap ul li ul li.sfhover, 	
.widget_recent_comments ul li.sfhover, 
.widget_simple_recent_comments ul li.sfhover {	
	border-left: solid <?php echo $bfa_ata_widget_lists['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists['link-border-left-hover-color']; ?>; 
	}

div#get_recent_comments_wrap ul li ul li ul li:hover, 
.widget_recent_comments ul li ul li:hover, 
.widget_simple_recent_comments ul li ul li:hover, 	
div#get_recent_comments_wrap ul li ul li ul li.sfhover, 
.widget_recent_comments ul li ul li.sfhover, 
.widget_simple_recent_comments ul li ul li.sfhover {	
	border-left: solid <?php echo $bfa_ata_widget_lists2['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists2['link-border-left-hover-color']; ?>; 
	}

.widget_recent_comments ul li ul li ul li:hover, 
.widget_simple_recent_comments ul li ul li ul li:hover, 	
.widget_recent_comments ul li ul li ul li.sfhover, 
.widget_simple_recent_comments ul li ul li ul li.sfhover {	
	border-left: solid <?php echo $bfa_ata_widget_lists3['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists3['link-border-left-hover-color']; ?>; 
	}
	
div.post {
	<?php echo $bfa_ata_post_container_style; ?>
	}

.sticky {
	<?php echo $bfa_ata_post_container_sticky_style; ?>
	}

div.post-kicker {
	<?php echo $bfa_ata_post_kicker_style; ?>
	}

div.post-kicker a:link, 
div.post-kicker a:visited, 
div.post-kicker a:active {
	<?php echo $bfa_ata_post_kicker_style_links; ?>
	}

div.post-kicker a:hover {
	<?php echo $bfa_ata_post_kicker_style_links_hover; ?>
	}

div.post-headline {
	<?php echo $bfa_ata_post_headline_style; ?>
	}

div.post-headline h2 {
	<?php echo $bfa_ata_post_headline_style_text; ?>
	}

div.post-headline h2 a:link, 
div.post-headline h2 a:visited, 
div.post-headline h2 a:active {
	<?php echo $bfa_ata_post_headline_style_links; ?>
	}

div.post-headline h2 a:hover {
	<?php echo $bfa_ata_post_headline_style_links_hover; ?>
	}
	
div.post-byline {
	<?php echo $bfa_ata_post_byline_style; ?>
	}

div.post-byline a:link, 
div.post-byline a:visited, 
div.post-byline a:active {
	<?php echo $bfa_ata_post_byline_style_links; ?>
	}

div.post-byline a:hover {
	<?php echo $bfa_ata_post_byline_style_links_hover; ?>
	}

div.post-bodycopy {
	<?php echo $bfa_ata_post_bodycopy_style; ?>
	}
	
div.post-footer {
	<?php echo $bfa_ata_post_footer_style; ?>
	}

div.post-footer a:link, 
div.post-footer a:visited, 
div.post-footer a:active {
	<?php echo $bfa_ata_post_footer_style_links; ?>
	}	

div.post-footer a:hover {
	<?php echo $bfa_ata_post_footer_style_links_hover; ?>
	}

.navigation-top {
	<?php echo $bfa_ata_next_prev_style_top; ?>
	}

.navigation-middle {
	<?php echo $bfa_ata_next_prev_style_middle; ?>
	}
	
.navigation-bottom {
	<?php echo $bfa_ata_next_prev_style_bottom; ?>
	}

.navigation-comments-above {
	<?php if (isset($bfa_ata_next_prev_style_comments_above)) echo $bfa_ata_next_prev_style_comments_above; ?>
	}
	
.navigation-comments-below {
	<?php if (isset($bfa_ata_next_prev_style_comments_below)) echo $bfa_ata_next_prev_style_comments_below; ?>
	}
	
input.text, 
input.password, 
input.file,
input.TextField, 
textarea {
	<?php echo $bfa_ata_form_input_field_style . "\n"; ?>
	<?php echo ($bfa_ata_form_input_field_background != "" ? 
	"background: url(" . get_bloginfo('template_directory') . "/images/" . 
	$bfa_ata_form_input_field_background . ") top left no-repeat;" : ""); ?>
	}
	
<?php if ($bfa_ata_highlight_forms == "Yes") { ?>
input.highlight, textarea.highlight {
	<?php echo $bfa_ata_highlight_forms_style; ?>
	}
<?php } ?>

.button, .Button {
	<?php echo $bfa_ata_button_style; ?>
	}
	
.buttonhover {
	<?php echo $bfa_ata_button_style_hover; ?>
	}

form#commentform input#submit	{
	<?php echo $bfa_ata_submit_button_style; ?>
	}
	
blockquote {
	<?php echo $bfa_ata_blockquote_style; ?>	
	}
	
blockquote blockquote {
	<?php echo $bfa_ata_blockquote_style_2nd_level; ?>
	}

.post table {
	<?php echo $bfa_ata_table; ?>
	}
	
.post table caption {
	<?php echo $bfa_ata_table_caption; ?>
	}
	
.post table th {
	<?php echo $bfa_ata_table_th; ?>
	}
	
.post table td {
	<?php echo $bfa_ata_table_td; ?>
	}

.post table tfoot td {
	<?php echo $bfa_ata_table_tfoot_td; ?>
	}
	
.post table tr.alt td {
	<?php echo $bfa_ata_table_zebra_td; ?>
	}

.post table tr.over td {
	<?php echo $bfa_ata_table_hover_td; ?>
	}

ol.commentlist {
	border-top: <?php echo $bfa_ata_comment_border; ?>;
	}
	
ol.commentlist li {
	background-color: #<?php echo $bfa_ata_comment_background_color; ?>;
	border-bottom: <?php echo $bfa_ata_comment_border; ?>;
	}

ol.commentlist li.alt {
	background-color: #<?php echo $bfa_ata_comment_alt_background_color; ?>;
	border-bottom: <?php echo $bfa_ata_comment_border; ?>;
	}

ol.commentlist li.authorcomment {
	background-color: #<?php echo $bfa_ata_author_highlight_color; ?>;
	}

ol.commentlist span.authorname {
	font-size: <?php echo $bfa_ata_comment_author_size; ?>;
	}

ul.commentlist {
	border-top: <?php echo $bfa_ata_comment_border; ?>;
	}

ul.commentlist li.thread-even {
	background-color: #<?php echo $bfa_ata_comment_background_color; ?>;
	border-bottom: <?php echo $bfa_ata_comment_border; ?>;
	}

ul.commentlist li.thread-odd {
	background-color: #<?php echo $bfa_ata_comment_alt_background_color; ?>;
	border-bottom: <?php echo $bfa_ata_comment_border; ?>;
	}

<?php if ($bfa_ata_author_highlight == "Yes") { ?>
ul.commentlist li.bypostauthor {
	background-color: #<?php echo $bfa_ata_author_highlight_color; ?>;
	}
<?php } ?>
	
/* reset children */

ul.commentlist li ul.children, 
ul.commentlist li ul.children li, 
ul.commentlist li ul.children li.bypostauthor  {
	background-color: transparent;
	border: 0;
	padding: 0;
	margin: 0;
	display: block;
	height: 1%;  /* for IE */
	}

ul.commentlist span.authorname {
	font-size: <?php echo $bfa_ata_comment_author_size; ?>;
	}

a.page-numbers:link, 
a.page-numbers:visited, 
a.page-numbers:active {
	color: #<?php echo $bfa_ata_link_color; ?>; 
	border-color: #<?php echo $bfa_ata_link_color; ?>;
	}

a.page-numbers:hover {
	color: #<?php echo $bfa_ata_link_hover_color; ?>; 
	border-color: #<?php echo $bfa_ata_link_hover_color; ?>;
	}

.post img { <?php echo $bfa_ata_post_image_style; ?> }

.wp-caption { <?php echo $bfa_ata_post_image_caption_style; ?> }

.wp-caption p.wp-caption-text {
	<?php echo $bfa_ata_image_caption_text; ?>
	}

img.avatar { 
	<?php echo $bfa_ata_avatar_style; ?> 
	}
	
div#respond {
	<?php echo $bfa_ata_comment_form_style; ?> 
	}
	
<?php if (strpos($bfa_ata_configure_header,'%pages')!==false OR strpos($bfa_ata_configure_header,'%cats')!==false) { ?>
div#menu1 ul.rMenu-ver, div#menu1 ul.rMenu-ver ul
	{
	width: <?php echo $bfa_ata_page_menu_submenu_width; ?>em;	
	}

div#menu2 ul.rMenu-ver, div#menu2 ul.rMenu-ver ul
	{
	width: <?php echo $bfa_ata_cat_menu_submenu_width; ?>em;	
	}
	
ul.rMenu
	{
	background: #<?php echo $bfa_ata_page_menu_bar_background_color; ?>;
	border: <?php echo $bfa_ata_anchor_border_page_menu_bar; ?>;
	}

ul#rmenu
	{
	background: #<?php echo $bfa_ata_cat_menu_bar_background_color; ?>;
	border: <?php echo $bfa_ata_anchor_border_cat_menu_bar; ?>;
	}

ul.rMenu li a
	{
	border: <?php echo $bfa_ata_anchor_border_page_menu_bar; ?>;	
	}

ul#rmenu li a
	{
	border: <?php echo $bfa_ata_anchor_border_cat_menu_bar; ?>;	
	}

div#menu1 ul.rMenu-ver
	{
	border-top: <?php echo $bfa_ata_anchor_border_page_menu_bar; ?>;	
	}

div#menu2 ul.rMenu-ver
	{
	border-top: <?php echo $bfa_ata_anchor_border_cat_menu_bar; ?>;	
	}
	
ul.rMenu li a:link, ul.rMenu li a:hover, ul.rMenu li a:visited, ul.rMenu li a:active
	{
	color: #<?php echo $bfa_ata_page_menu_bar_link_color; ?>;
	text-transform: <?php echo $bfa_ata_page_menu_transform; ?>;
	font: <?php echo $bfa_ata_page_menu_font; ?>;  
	}

ul#rmenu li a:link, ul#rmenu li a:hover, ul#rmenu li a:visited, ul#rmenu li a:active
	{
	color: #<?php echo $bfa_ata_cat_menu_bar_link_color; ?>;
	text-transform: <?php echo $bfa_ata_cat_menu_transform; ?>;
	font: <?php echo $bfa_ata_cat_menu_font; ?>; 
	}
	
ul.rMenu li
	{
	background-color: #<?php echo $bfa_ata_page_menu_bar_background_color; ?>;	
	}

ul#rmenu li
	{
	background-color: #<?php echo $bfa_ata_cat_menu_bar_background_color; ?>;	
	}
	
ul.rMenu li:hover,
ul.rMenu li.sfhover
	{
	background-color: #<?php echo $bfa_ata_page_menu_bar_background_color_parent; ?>;	
	}

ul#rmenu li:hover,
ul#rmenu li.sfhover
	{
	background-color: #<?php echo $bfa_ata_cat_menu_bar_background_color_parent; ?>;	
	}

ul.rMenu li.current_page_item a:link, 
ul.rMenu li.current_page_item a:active, 
ul.rMenu li.current_page_item a:hover, 
ul.rMenu li.current_page_item a:visited, 
ul.rMenu li a:hover
	{
	background-color: #<?php echo $bfa_ata_page_menu_bar_background_color_hover; ?>;
	color: #<?php echo $bfa_ata_page_menu_bar_link_color_hover; ?>;
	}

ul#rmenu li.current-cat a:link, 
ul#rmenu li.current-cat a:active, 
ul#rmenu li.current-cat a:hover, 
ul#rmenu li.current-cat a:visited, 
ul#rmenu li a:hover
	{
	background-color: #<?php echo $bfa_ata_cat_menu_bar_background_color_hover; ?>;
	color: #<?php echo $bfa_ata_cat_menu_bar_link_color_hover; ?>;
	}

div#menu1 ul.rMenu li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a 
	{
	background-image: url(<?php echo get_bloginfo('template_directory'); ?>/images/expand-right<?php echo ($bfa_ata_page_menu_arrows == "white" ? "-white" : ""); ?>.gif);
	}

div#menu2 ul.rMenu li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a 
	{
	background-image: url(<?php echo get_bloginfo('template_directory'); ?>/images/expand-right<?php echo ($bfa_ata_cat_menu_arrows == "white" ? "-white" : ""); ?>.gif);
	}
	
div#menu1 ul.rMenu-hor li.rMenu-expand a
	{
	background-image: url(<?php echo get_bloginfo('template_directory'); ?>/images/expand-down<?php echo ($bfa_ata_page_menu_arrows == "white" ? "-white" : ""); ?>.gif);
	}
	
div#menu2 ul.rMenu-hor li.rMenu-expand a
	{
	background-image: url(<?php echo get_bloginfo('template_directory'); ?>/images/expand-down<?php echo ($bfa_ata_cat_menu_arrows == "white" ? "-white" : ""); ?>.gif);
	}
<?php } ?>	
<?php echo $bfa_ata_html_inserts_css; ?>
</style>
<?php wp_head(); ?>
<?php if (function_exists('wp_pagenavi')) { ?>
<style type="text/css">
.wp-pagenavi a:link, .wp-pagenavi a:visited, .wp-pagenavi a:active { color: #<?php echo $bfa_ata_link_color; ?>; border: solid 1px #<?php echo $bfa_ata_link_color; ?>; }
.wp-pagenavi a:hover { color: #<?php echo $bfa_ata_link_hover_color; ?>; border: solid 1px #<?php echo $bfa_ata_link_hover_color; ?>; }
</style>
<?php } ?>
<?php echo ($bfa_ata_html_inserts_header != "" ? apply_filters(widget_text, $bfa_ata_html_inserts_header) : ''); ?>
</head>
<?php
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

			<?php // Widgetize the Left Sidebar 
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : echo "To put some content here, go to Site Admin -> Appearance/Presentation -> Widgets -> Select \"Left Sidebar\" -> Click \"Show\" -> Click on \"Add\" on one of the widgets on the left side -> Click \"Save changes\" -> Done";
			endif; ?>

		</td>
		<!-- / Left Sidebar -->
		<?php } ?>


		<!-- Main Column -->
		<td id="middle">