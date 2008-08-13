<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
<?php include (TEMPLATEPATH . '/functions/bfa_meta_tags.php'); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<?php include (TEMPLATEPATH . '/style.php'); ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
	</head>
	<body>
		<div id="page-container">
<div class="clearfix" id="modernbricksmenu">
<ul>
<li class="page_item"><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>">Home</a></li>
<?php wp_list_pages('title_li=&depth=1' ); ?>
</ul></div>
<div style="clear: both"></div><div class="headerleft"><?php if ($ata_show_logo_icon == "Yes") { ?><img style="margin:10px 5px 10px 0px; padding:0; border:0; float: left" src="<?php echo get_bloginfo('template_directory'); ?>/images/logosymbol.gif" alt="<?php bloginfo('name'); ?>" /><?php } ?><div style="float: left"><h1><a class="header" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
<div style="clear: both"></div><p class="header"><?php bloginfo('description'); ?></p></div>
</div><a <?php if ($ata_nofollow == "Yes") { echo "rel=\"nofollow\" "; } ?>href="<?php bloginfo('rss2_url'); ?>"><img style="width: 20px; height: 20px; float: right; margin:10px 0 0 0" src="<?php echo get_bloginfo('template_directory'); ?>/images/rss-icon-20x20.gif" alt="<?php bloginfo('name'); ?> RSS Feed" border="0" /></a><div style="clear: right"></div>
<div class="headerright">
<div style="margin: 5px 10px 5px 10px;">
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</div></div><div style="clear:both"></div>
		<div id="modernbricksmenuline">&nbsp;</div>
		<div style="margin: 0; padding: 0; height: <?php echo $ata_headerimage_height; ?>px; background: url(<?php include (TEMPLATEPATH . '/functions/bfa_rotating_header_images.php'); ?>) top center no-repeat;">
		<div style="background-color: white; float: left; height: <?php echo $ata_headerimage_height; ?>px; width: <?php echo $ata_leftcolumn_width; ?>em; filter:alpha(opacity=<?php echo $ata_header_opacity; ?>);-moz-opacity:.<?php echo $ata_header_opacity; ?>;opacity:.<?php echo $ata_header_opacity; ?>;">&nbsp;</div>
		<div style="background-color: white; float: right; height: <?php echo $ata_headerimage_height; ?>px; width: <?php echo $ata_rightcolumn_width; ?>em; filter:alpha(opacity=<?php echo $ata_header_opacity; ?>);-moz-opacity:.<?php echo $ata_header_opacity; ?>;opacity:.<?php echo $ata_header_opacity; ?>;">&nbsp;</div>
		<div style="clear:both"></div>
		</div>
<div id="modernbricksmenuline2">&nbsp;</div>