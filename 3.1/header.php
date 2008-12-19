<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>.php" type="text/css" />
<?php global $options; 
foreach ($options as $value) { if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>
<?php include (TEMPLATEPATH . '/functions/bfa_meta_tags.php'); ?>
<?php if ($bfa_ata_favicon_file != "") { ?><link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon/<?php echo $bfa_ata_favicon_file; ?>" /><?php } ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
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
});
//-->
</script>
<?php if ( function_exists('wp_list_comments') AND is_singular() ) { wp_enqueue_script( 'comment-reply' ); } ?>
<?php wp_head(); ?>
<?php if (function_exists('wp_pagenavi')) { ?>
<style type="text/css">
.wp-pagenavi a:link, .wp-pagenavi a:visited, .wp-pagenavi a:active { color: #<?php echo $bfa_ata_link_color; ?>; border: solid 1px #<?php echo $bfa_ata_link_color; ?>; }
.wp-pagenavi a:hover { color: #<?php echo $bfa_ata_link_hover_color; ?>; border: solid 1px #<?php echo $bfa_ata_link_hover_color; ?>; }
</style>
<?php } ?>
<?php echo ($bfa_ata_html_inserts_header != "" ? apply_filters(widget_text, $bfa_ata_html_inserts_header) : ''); ?>
</head>