<?php 
error_reporting(0);
$fb = 0;

	// find wp-config
	$d = 0; // search depth;
	while (!file_exists(str_repeat('../', $d) . 'wp-config.php')) if (++$d > 99) exit;
	$wpconfig = str_repeat('../', $d) . 'wp-config.php';
	
	// if this is a wpmu setup or we have been instructed to use the fallback method
	if ($_GET['fb'] OR file_exists(str_repeat('../', $d) . 'wpmu-settings.php'))
		$fb++;
	elseif (file_exists($wpconfig))
		// evaluate constant definitions from wp-config.php so we can connect directly to the database and save some time
		foreach (explode("\n", file_get_contents($wpconfig)) as $line) {
			if (preg_match('/define.+?DB_|table_prefix/', $line))
				eval($line);
		}


	// if we seem to have the credentials to the database
	if (defined('DB_USER')) {
		$dbh = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		@mysql_select_db(DB_NAME, $dbh);
		$r = @mysql_query(
			"SELECT option_name,option_value FROM ". $table_prefix ."options WHERE (option_name REGEXP '^bfa_ata_' OR option_name REGEXP '^(stylesheet|siteurl)$');",
			$dbh
		);
		while ($a = @mysql_fetch_row($r)) {
			$$a[0] = $a[1];
		}
		@mysql_free_result($r);
		
		// if theme options were available in options table
		if (isset($bfa_ata_widget_lists)) {
		$bfa_ata_widget_lists = unserialize($bfa_ata_widget_lists);
		$bfa_ata_widget_lists2 = unserialize($bfa_ata_widget_lists2);
		$bfa_ata_widget_lists3 = unserialize($bfa_ata_widget_lists3);
		}
		
		// if the options array seems to be empty/incomplete, fallback
		#if (!isset($bfa_ata_widget_lists))
		#	$fb++;
		global $stylesheet_directory;
		$stylesheet_directory = $siteurl .'/wp-content/themes/'. $stylesheet;
	}
	else $fb++;
	
	// fallback, fewer lines but way longer to process
	if ($fb) {
		// if we're here without 'fb' in the query string, then redirect to this same page and start over
		// this prevents constant redeclaration errors
		if (!$_GET['fb']) {
			$redirect = preg_replace('/(\?.*|$)/', '', $_SERVER['REQUEST_URI']) . '?fb=1';
			header("Location: $redirect");
			exit;
		}
		require_once($wpconfig);
		
		// get default options in case no individual options were saved to wp_options yet
	$d = 0; // search depth;
	while (!file_exists(str_repeat('../', $d) . '/wp-content/themes/atahualpa3/functions/bfa_theme_options.php')) if (++$d > 99) exit;
	$bfa_options = str_repeat('../', $d) . '/wp-content/themes/atahualpa3/functions/bfa_theme_options.php';
	include $bfa_options;	
	global $options; foreach ($options as $value) { 
	if ( !isset($$value['id']) ) { 
			$$value['id'] = $value['std']; 
	}
	}
		
		global $stylesheet_directory;
		$stylesheet_directory = get_bloginfo('stylesheet_directory');
		status_header(200);
	}


	// get default options in case no individual options were saved to wp_options yet
	$d = 0; // search depth;
	while (!file_exists(str_repeat('../', $d) . '/wp-content/themes/atahualpa3/functions/bfa_theme_options.php')) if (++$d > 99) exit;
	$bfa_options = str_repeat('../', $d) . '/wp-content/themes/atahualpa3/functions/bfa_theme_options.php';
	include $bfa_options;	
	global $options; foreach ($options as $value) { 
	if ( !isset($$value['id']) ) { 
		$$value['id'] = $value['std']; 
		}
	}

		
header("Content-type: text/css");
?>
/* ------------------------------------------------------------------
---------- BASE LAYOUT ----------------------------------------------
------------------------------------------------------------------ */
body {
	text-align: center;  /* centering the page container, 
							text-align will be reset to left 
							inside the container */
	margin: 0;
	padding: 0;
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
		
ul, ol, dl, p, h1, h2, h3, h4, h5, h6 {
	margin-top: 10px;
	margin-bottom: 10px;
	padding-top: 0;
	padding-bottom: 0;
	}

ul ul, ul ol, ol ul, ol ol {
	/* kill margins on sub-lists */
	margin-top: 0;
	margin-bottom: 0;
	}

h1 {font-size: 2.15em; font-weight: bold;}
h2 {font-size: 1.85em; font-weight: bold;}
h3 {font-size: 1.6em; font-weight: bold; }
h4 {font-size: 1.4em;}
h5 {font-size: 1.2em;}
h6 {font-size: 1em;}


code, pre {
	font-family: "Courier New", Courier, monospace;
	font-size: 1em;
	}

pre {
	overflow: auto;
	word-wrap: normal;
	padding-bottom: 1.5em;
	overflow-y: hidden;
	width: 99%;
	}


abbr[title], acronym[title] {
	border-bottom: 1px dotted;
	}
	
hr {
	display: block;
	height: 2px;
	border: none;
	margin: 0.5em auto;
	color: #cccccc;
	background-color: #cccccc;
	}

table {
	font-size: 100%; /* use the body's font size in tables, too */
	}	


/* ------------------------------------------------------------------
---------- BREAK LONG STRINGS ---------------------------------------
------------------------------------------------------------------ */

.post, ul.commentlist li, ol.commentlist li {
	word-wrap: break-word; /* break long strings in IE6+ and Safari2+ 
							in posts and comments */
	}

pre, .wp_syntax {
	word-wrap: normal; /* reset "break-word" for pre & wp-syntax */
	}

	
/* ------------------------------------------------------------------
---------- WRAPPER, CONTAINER & LAYOUT ------------------------------
------------------------------------------------------------------ */

/*-------------------- WRAPPER for MIN / MAX width --------*/

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
	text-align: center;  
	margin-left: auto;
	margin-right: auto;
	display: block;
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


/*-------------------- CONTAINER for VISUAL styles --------*/

div#container {
	<?php echo $bfa_ata_layout_style; ?>
	<?php if ( $bfa_ata_layout_style_leftright_padding != "0" ) { ?>
	padding-left: <?php echo $bfa_ata_layout_style_leftright_padding; ?>px;
	padding-right: <?php echo $bfa_ata_layout_style_leftright_padding; ?>px;
	<?php } ?>
	width: auto;
	margin-left: auto;
	margin-right: auto;
	text-align: left; /* resetting the "text-align: center" of "wrapper" */
	display: block;
	}

/*-------------------- LAYOUT to keep it all together -----*/
	
table#layout {
	font-size: 100%;
	width: 100%;
	max-width: 100%;
	table-layout: fixed;
	}

.colone {width: <?php echo $bfa_ata_left_sidebar_width; ?>px;}
.coltwo {width: 100%; min-width:200px;}
.colthree {width: <?php echo $bfa_ata_right_sidebar_width; ?>px;}
	
	
/* ------------------------------------------------------------------
---------- HEADER ---------------------------------------------------
------------------------------------------------------------------ */


/*-------------------- HEADER CONTAINER -------------------*/

td#header {
	width: auto;
	padding: 0;
	}


/*-------------------- LOGO AREA --------------------------*/

table#logoarea, 
table#logoarea tr, 
table#logoarea td {
	margin: 0;
	padding: 0;
	background: none;
	border: 0;
	}

table#logoarea {
	width: 100%;
	max-width: 100%;
	<?php echo $bfa_ata_logoarea_style; ?>
	}
	

/*-------------------- LOGO -------------------------------*/

.logo {
	display: block;
	<?php echo $bfa_ata_logo_style; ?>
	}

td.logoarea-logo {
	width: 1%;
	}

	
/*-------------------- BLOG TITLE -------------------------*/

h1.blogtitle {
	display: block;
	/*white-space: nowrap;*/
	<?php echo $bfa_ata_blog_title_style; ?>
	}
	
h1.blogtitle a:link, 
h1.blogtitle a:visited, 
h1.blogtitle a:active {
	text-decoration: none;
	color: #<?php echo $bfa_ata_blog_title_color; ?>;
	}
	
h1.blogtitle a:hover {
	text-decoration: none;
	color: #<?php echo $bfa_ata_blog_title_color_hover; ?>;
	}


/*-------------------- BLOG TAGLINE -----------------------*/

p.tagline { 
	<?php echo $bfa_ata_blog_tagline_style; ?>
	}

	
td.feed-icons {
	white-space: no-wrap; 
	}

div.rss-box {
	height: 1%; 
	display: block; 
	padding: 10px 0 10px 10px; 
	margin: 0;
	width: <?php echo $bfa_ata_rss_box_width; ?>px;
	}
	
<?php if ($bfa_ata_show_comments_icon == "Yes" ) { ?>
/*-------------------- COMMENTS FEED ICON -----------------*/

.comments-icon {
	background: transparent url(images/comment-feed-small.gif) no-repeat scroll 0;
	height: 22px;
	line-height: 22px;
	margin: 0 10px 0 0;
	padding-left: 27px;
	/*display: inline-block;*/
	display: block;
	text-decoration: none;
	float: right;
	white-space: nowrap;
	}
<?php } ?>


<?php if ($bfa_ata_show_posts_icon == "Yes" ) { ?>
/*-------------------- POSTS FEED ICON --------------------*/

.posts-icon {
	background: transparent url(images/post-feed-small.gif) no-repeat scroll 0;
	height: 22px;
	line-height: 22px;
	margin: 0 10px 0 0;
	padding-left: 25px;
	/*display: inline-block;*/
	display: block;
	text-decoration: none;
	float: right;
	white-space: nowrap;
	}
<?php } ?>


<?php if ($bfa_ata_show_email_icon == "Yes" ) { ?>
/*-------------------- EMAIL SUBSCRIBE ICON ---------------*/

.email-icon {
	background: transparent url(images/email-feed-small.gif) no-repeat scroll 0;
	height: 22px;
	line-height: 22px;
	margin: 0 10px 0 0;
	padding-left: 28px;
	/*display: inline-block;*/
	display: block;
	text-decoration: none;
	float: right;
	white-space: nowrap;
	}
<?php } ?>
	
	
<?php if ($bfa_ata_show_search_box == "Yes" ) { ?>
/*-------------------- SEARCH BOX IN HEADER ---------------*/	

td.search-box {
	height: 1%;
	}
	
.searchbox {
	<?php echo $bfa_ata_searchbox_style; ?>
	}

.searchbox-form {
	margin: 5px 10px 5px 10px;
	}

<?php } ?>


<?php if (strpos($bfa_ata_configure_header,'%bar')!==false) { ?>
/*-------------------- HORIZONTAL BARS --------------------*/

.horbar1, 
.horbar2 { 
	font-size: 1px;
	clear: both; 
	display: block;
	position: relative;
	padding: 0; 
	margin: 0;
	width: 100%; 
	}

.horbar1 {
	<?php echo $bfa_ata_horbar1; ?>
	}
	
.horbar2 { 
	<?php echo $bfa_ata_horbar2; ?>
	}	
<?php } ?>


<?php if (strpos($bfa_ata_configure_header,'%image')!==false) { ?>
.header-image-container {
	position: relative; 
	margin: 0; 
	padding: 0; 
	height: <?php echo $bfa_ata_headerimage_height; ?>px; 
	/* background: (= header image) will be added in bfa_header_config.php */
	<?php echo $bfa_ata_header_image_container_extra; ?>
	}
<?php } ?>

	
<?php if ( $bfa_ata_overlay_blog_title == "Yes" OR $bfa_ata_overlay_blog_tagline == "Yes" ) { ?>
.titleoverlay {
	z-index: 4;
	position: relative;
	float: left;
	width: auto;
	<?php echo $bfa_ata_overlay_box_style; ?>
	}
<?php } ?>


<?php if ( $bfa_ata_header_opacity_left != 0 AND $bfa_ata_header_opacity_left != '' ) { ?>
/*-------------------- OPACITY LEFT -----------------------*/

.opacityleft {
	background-color: #<?php echo $bfa_ata_header_opacity_left_color; ?>; 
	position: absolute; 
	z-index: 2; 
	top: 0; 
	left: 0; 
	height: <?php echo $bfa_ata_headerimage_height; ?>px;
	width: <?php echo $bfa_ata_header_opacity_left_width; ?>px; 
	filter: alpha(opacity=<?php echo $bfa_ata_header_opacity_left; ?>);
	-moz-opacity:.<?php echo $bfa_ata_header_opacity_left; ?>;
	opacity:.<?php echo $bfa_ata_header_opacity_left; ?>;
	}
<?php } ?>


<?php if ( $bfa_ata_header_opacity_right != 0 AND $bfa_ata_header_opacity_right != '' ) { ?>
/*-------------------- OPACITY RIGHT ----------------------*/	
.opacityright {
	background-color: #<?php echo $bfa_ata_header_opacity_right_color; ?>; 
	position: absolute; 
	z-index: 2; 
	top: 0; 
	right: 0; 
	height: <?php echo $bfa_ata_headerimage_height; ?>px;
	width: <?php echo $bfa_ata_header_opacity_right_width; ?>px; 
	filter: alpha(opacity=<?php echo $bfa_ata_header_opacity_right; ?>);
	-moz-opacity:.<?php echo $bfa_ata_header_opacity_right; ?>;
	opacity:.<?php echo $bfa_ata_header_opacity_right; ?>;
	}
<?php } ?>


<?php if ($bfa_ata_header_image_clickable == "Yes") { ?>
/*-------------------- CLICKABLE HEADER IMAGE -------------*/
div.clickable {
	position:absolute; 
	top:0; 
	left:0; 
	z-index:3; 
	margin: 0; 
	padding: 0; 
	height: <?php echo $bfa_ata_headerimage_height; ?>px; 
	width: 100%;
	}
 
a.divclick:link, 
a.divclick:visited, 
a.divclick:active, 
a.divclick:hover {
	width: 100%; 
	height: 100%; 
	display: block;
	text-decoration: none;
	}
<?php } ?>
		
/* ------------------------------------------------------------------
---------- LEFT SIDEBAR ---------------------------------------------
------------------------------------------------------------------ */

td#left {
	vertical-align: top;
	<?php echo $bfa_ata_left_sidebar_style; ?>
	}

	
/* ------------------------------------------------------------------
---------- RIGHT SIDEBAR --------------------------------------------
------------------------------------------------------------------ */

td#right {
	vertical-align: top;
	<?php echo $bfa_ata_right_sidebar_style; ?>
	}

	
/* ------------------------------------------------------------------
---------- CENTER COLUMN --------------------------------------------
------------------------------------------------------------------ */

td#middle {
	vertical-align: top;
	width: 100%;
	max-width: 100%;		
	overflow: auto;
	background-color: #fff;
	<?php echo $bfa_ata_center_column_style; ?>
	}

	
/* ------------------------------------------------------------------
---------- FOOTER ---------------------------------------------------
------------------------------------------------------------------ */

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
	
/* ------------------------------------------------------------------
---------- WIDGETS --------------------------------------------------
------------------------------------------------------------------ */

div.widget {
	display: block;
	width: auto;  /* without this IE will stretch too-wide select 
					menus but not the other widgets. With 100% IE
					will remove sidebar borders if select menu is
					too wide */
	<?php echo $bfa_ata_widget_container; ?>
	}

div.widget-title {
	display: block;
	width: auto;
	<?php echo $bfa_ata_widget_title_box; ?>
	}

div.widget-title h3 {
	padding:0;
	margin:0;
	<?php echo $bfa_ata_widget_title; ?>
	}	
	
div.widget-content {
	display: block;
	width: auto;
	<?php echo $bfa_ata_widget_content; ?>
	}

	
/* ------------------------------------------------------------------
---------- Select MENUS INSIDE OF WIDGETS -------------------------
------------------------------------------------------------------ */

/* if a select menu is too wide to fit into the sidebar (because one 
 or several of its option titles are too long) then it will be cut off
 in IE 6 & 7 */

div.widget select { 
	<?php if ( $bfa_ata_select_font_size != "Default" ) { 
	echo "font-size: " . $bfa_ata_select_font_size . ";\n"; } ?> 
	width: 98%; 		/* auto won't work in Safari */
	margin-top: 5px;
}	
	
	
/* ------------------------------------------------------------------
---------- LISTS INSIDE OF WIDGETS ----------------------------------
------------------------------------------------------------------ */

.widget ul {
	list-style-type: none; 
	margin: 0; 
	padding: 0; 
	width: auto;
	}

/*------------- list items with 1 link per item -----------*/
	
.widget ul li {
	margin: 2px 0 2px 0;  
	display: block;
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
	text-decoration: none; 
	font-weight: normal; 
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
	
.widget ul li a:link, 
.widget ul li a:visited, 
.widget ul li a:active,
.widget ul li a:hover {
	display: block;   /* if we set this to inline-block, we cannot
						overwrite it to "inline" for the comments widgets, for IE */
	height: 1%;   /* IE needs this */
	}

/* the archive widgets get inline-blick so post counts won't wrap
into the next line. In FF2 items that don't fit into a single line 
will overflow the sidebar but that is unlikely as the longest item 
would be "[month name] (post count)" */
.widget_categories ul li a:link, 
.widget_categories ul li a:visited, 
.widget_categories ul li a:active,
.widget_categories ul li a:hover,
.widget_archive ul li a:link, 
.widget_archive ul li a:visited, 
.widget_archive ul li a:active,
.widget_archive ul li a:hover {
	display: -moz-inline-box; /* Firefox 2 doesn't know default "inline-block" */
	display: inline-block !important;  
	}

/* We cannot use inline-block for the category widget because unlike the archive 
widget the category widget items may need to wrap on top of (possibly) being 
displayed hierarchically. If "post count" is not displayed then it's easy: use "block". 
With post count turned on we'll display it inline, because inline-block
will cause it to overflow in FF2 and look bad in IE, too, if the item needs to wrap*/
.widget_categories ul li a:link, 
.widget_categories ul li a:visited, 
.widget_categories ul li a:active,
.widget_categories ul li a:hover {
	display: <?php echo $bfa_ata_category_widget_display_type; ?> !important;  
	}
	
/*------------- list items with 2 links or link & text ----*/
/* different styles for the default Recent Comments widget,
the BFA Recent Comments widget and the Get Recent Comments widget */

/* The Get Recent Comments widget's first level (= Post Title)
doesn't get a border or padding */
div#get_recent_comments_wrap ul li {
	padding: 0px;
	display: block; 
	border-left: 0px;
	}

div#get_recent_comments_wrap ul li ul li {
	margin-left: 0px;
	}
	
/* Get Recent comments 2nd level, others 1st level: */
div#get_recent_comments_wrap ul li ul li,
.widget_recent_comments ul li, 
.widget_simple_recent_comments ul li {
	padding: 0 0 0 <?php echo $bfa_ata_widget_lists['link-padding-left']; ?>px; 
	display: block; 
	border-left: solid <?php echo $bfa_ata_widget_lists['link-border-left-width']; ?>px #<?php echo $bfa_ata_widget_lists['link-border-left-color']; ?>; 
	}

/* Get Recent comments 3rd level, others 2nd level: */	
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
	
/*- with sfhover for IE6 because it doesn't know li:hover -*/

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
	
/*--- comments get the border on the li instead of the a --*/

div#get_recent_comments_wrap ul li a:link, 
div#get_recent_comments_wrap ul li a:visited, 
div#get_recent_comments_wrap ul li a:active, 
div#get_recent_comments_wrap ul li a:hover,
.widget ul li.recentcomments a:link, 
.widget ul li.recentcomments a:visited, 
.widget ul li.recentcomments a:active, 
.widget ul li.recentcomments a:hover,
.widget ul li.bfarecentcomments a:link, 
.widget ul li.bfarecentcomments a:visited, 
.widget ul li.bfarecentcomments a:active, 
.widget ul li.bfarecentcomments a:hover { 	
	border-left: 0px !important; 
	display: inline !important; 
	padding: 0px !important; 
	margin: 0px !important; 
	}



/* ------------------------------------------------------------------
---------- BFA SUBSCRIBE WIDGET -------------------------------------
------------------------------------------------------------------ */

table.subscribe {
	width: 100%;
	}
	
table.subscribe td.email-text {
	padding: 0 0 5px 0;
	vertical-align: top;
	}

table.subscribe td.email-field {
	padding: 0;
	width: 100%;
	}
	
table.subscribe td.email-button {
	padding: 0 0 0 5px;
	}
	
table.subscribe td.post-text {
	padding: 7px 0 0 0;
	vertical-align: top;
	}
	
table.subscribe td.comment-text {
	padding: 7px 0 0 0;
	vertical-align: top;
	}
	
	
/* ------------------------------------------------------------------
---------- POSTS ----------------------------------------------------
------------------------------------------------------------------ */

/*-------------------- POST CONTAINER ---------------------*/

div.post {
	display: block;
	<?php echo $bfa_ata_post_container_style; ?>
	}

/* additonal styles for sticky posts */
.sticky {
	<?php echo $bfa_ata_post_container_sticky_style; ?>
	}

/*-------------------- POST KICKER ------------------------*/

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

	
/*-------------------- POST HEADLINE ----------------------*/

div.post-headline {
	<?php echo $bfa_ata_post_headline_style; ?>
	}

div.post-headline h2 {
	margin: 0;
	padding: 0;
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

	
/*-------------------- POST BYLINE ------------------------*/
	
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

	
/*-------------------- POST BODY COPY ---------------------*/
	
div.post-bodycopy {
	<?php echo $bfa_ata_post_bodycopy_style; ?>
	}
	
div.post-bodycopy p {
	margin: 1em 0;
	padding: 0;
	display: block;
	/* The rule below would create hor. scrollbars in Firefox, 
	which would be better than overflowing long strings, but the
	downside is that text won't float around images anymore. 
	Uncomment this if you don't float images anyway */
	/* overflow: auto; */
	}

/*-------------------- POST PAGINATION --------------------*/

div.post-pagination {
	/*border: solid 1px brown;*/
	}

	
/*-------------------- POST FOOTER ------------------------*/
	
div.post-footer {
	clear:both; 
	display: block;
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

	
/*-------------------- ICONS in KICKER, BYLINE & FOOTER ---*/

div.post-kicker img, 
div.post-byline img, 
div.post-footer img {
	border: 0;
	padding: 0;
	margin: 0 0 -1px 0;
	background: none;
	}
	
span.post-ratings {
	display:inline-block; 	/* postratings set to "span" by the 
							theme, instead of default "div", to 
							make them display inline. Adding 
							inline-block and nowrap to avoid 
							line wrapping of single voting stars. */
	width: auto;
	white-space: nowrap;
	}


/* ------------------------------------------------------------------
---------- PAGE NAVIGATION NEXT/PREVIOUS ----------------------------
------------------------------------------------------------------ */

.navigation-top {
	display: block; 
	width: 100%; 
	<?php echo $bfa_ata_next_prev_style_top; ?>
	}

.navigation-middle {
	display: block; 
	width: 100%; 
	<?php echo $bfa_ata_next_prev_style_middle; ?>
	}
	
.navigation-bottom {
	display: block; 
	width: 100%; 
	<?php echo $bfa_ata_next_prev_style_bottom; ?>
	}

.navigation-comments-above {
	display: block; 
	width: 100%; 
	<?php echo $bfa_ata_next_prev_style_comments_above; ?>
	}
	
.navigation-comments-below {
	display: block; 
	width: 100%; 
	<?php echo $bfa_ata_next_prev_style_comments_below; ?>
	}
	
.older {
	float: left; 
	width: 49%; 
	text-align: left; 
	margin:0; 
	padding:0;
	}
	
.newer {
	float:right; 
	width: 49%; 
	text-align: right; 
	margin:0; 
	padding:0; 
	}	

.older-home {
	float: left; 
	width: 45%; 
	text-align: left; 
	margin:0; 
	padding:0;
	}

.newer-home {
	float:right; 
	width: 45%; 
	text-align: right; 
	margin:0; 
	padding:0; 
	}	

.home {
	float: left; 
	width: 9%; 
	text-align: center;  
	margin:0; 
	padding:0;
	}

	
/* ------------------------------------------------------------------
---------- FORMS ----------------------------------------------------
------------------------------------------------------------------ */

form, .feedburner-email-form {
	margin: 0; 
	padding: 0; 
	}

fieldset {
	border: 1px solid #cccccc; 
	width: auto; 
	padding: 0.35em 0.625em 0.75em;
	display: block; 
	}
	
legend { 
	color: #000000; 
	background: #f4f4f4; 
	border: 1px solid #cccccc; 
	padding: 2px 6px; 
	margin-bottom: 15px; 
	}
	
form p {
	margin: 5px 0 0 0; 
	padding: 0; 
	}
	
label {
	margin-right: 0.5em; 
	font-family: arial;
	cursor: pointer; 
	}

/* input.TextField for WP-Email */
input.text, 
input.password, 
input.file,
input.TextField, 
textarea {
	padding: 3px;
	<?php echo $bfa_ata_form_input_field_style; ?>
	}

textarea {
	width: 96%; 
	}


input.inputblur {
	color: #777777;
	width: 95%;
	}

input.inputfocus {
	color: #000000;
	width: 95%;
	}	
	
<?php if ($bfa_ata_highlight_forms == "Yes") { ?>
input.highlight, textarea.highlight {
	<?php echo $bfa_ata_highlight_forms_style; ?>
	}
<?php } ?>

/* .Button for WP-Email */
.button, .Button {
	padding: 0 2px;
	height: 24px;
	line-height: 16px;
	<?php echo $bfa_ata_button_style; ?>
	}
	
.buttonhover {
	padding: 0 2px;
	cursor: pointer;
	<?php echo $bfa_ata_button_style_hover; ?>
	}
	
	
/* ------------------------------------------------------------------
---------- SEARCH FORM ----------------------------------------------
------------------------------------------------------------------ */

table.searchform {
	width: 100%;
	}

table.searchform td.searchfield {
	padding: 0;
	width: 100%;
	}
	
table.searchform td.searchbutton {
	padding: 0 0 0 5px;
	}

	
/* ------------------------------------------------------------------
---------- BLOCKQUOTES ----------------------------------------------
------------------------------------------------------------------ */

blockquote {
	height: 1%;
	display: block;
	clear: both;
	<?php echo $bfa_ata_blockquote_style; ?>	
	}
	
blockquote blockquote {
	height: 1%;
	display: block;
	clear: both;
	<?php echo $bfa_ata_blockquote_style_2nd_level; ?>
	}


/* ------------------------------------------------------------------
---------- TABLES & CALENDAR ----------------------------------------
------------------------------------------------------------------ */

/*-------------------- TABLES IN POSTS --------------------*/

.post table {
	border-collapse: collapse;
	background-color: #ffffff;
	margin: 10px 0;
	}
	
.post table caption {
	width: auto;
	margin: 0 auto;
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


/*-------------------- CALENDAR WIDGET --------------------*/

#calendar_wrap {
	padding: 0;
	border: none;
	}
	
table#wp-calendar {
	width: 100%; 
	font-size:90%;
	border-collapse: collapse;
	background-color: #ffffff;
	margin: 0 auto;
	}

table#wp-calendar caption {
	width: auto;
	background: #eeeeee;
	border: none;;
	padding: 3px;
	margin: 0 auto;
	font-size: 1em;
	}

table#wp-calendar th {
	border: solid 1px #eeeeee;
	background-color: #999999;
	color: #ffffff;
	font-weight: bold;
	padding: 2px;
	text-align: center;
	}
	
table#wp-calendar td {
	padding: 0;
	line-height: 18px;
	background-color: #ffffff;
	border: 1px solid #dddddd;
	text-align: center;
	}

table#wp-calendar tfoot td {
	border: solid 1px #eeeeee;
	background-color: #eeeeee;
	}
	
table#wp-calendar td a {
	display: block;
	background-color: #eeeeee;
	width: 100%;
	height: 100%;
	padding: 0;
	}


/* ------------------------------------------------------------------
---------- COMMENTS -------------------------------------------------
------------------------------------------------------------------ */

ol.commentlist {
	margin: 15px 0 25px 0;
	list-style-type: none;
	padding: 0;
	border-top: <?php echo $bfa_ata_comment_border; ?>;
	display:block;
	}
	
ol.commentlist li {
	background-color: #<?php echo $bfa_ata_comment_background_color; ?>;
	border-bottom: <?php echo $bfa_ata_comment_border; ?>;
	padding: 15px 10px;
	display: block;
	height: 1%; /* for IE6 */
	margin: 0;
	}

ol.commentlist li.alt {
	background-color: #<?php echo $bfa_ata_comment_alt_background_color; ?>;
	border-bottom: <?php echo $bfa_ata_comment_border; ?>;
	display: block;
	height: 1%; /* for IE6 */
	}

ol.commentlist li.authorcomment {
	background-color: #<?php echo $bfa_ata_author_highlight_color; ?>;
	display: block;
	height: 1%;
	}

ol.commentlist span.authorname {
	font-size: <?php echo $bfa_ata_comment_author_size; ?>;
	font-weight: bold;
	}

ol.commentlist span.commentdate {
	color: #666666;
	font-size: 90%;
	margin-bottom: 5px;
	display: block;
	}

ol.commentlist span.editcomment {
	display: block;
	}
	
ol.commentlist li p {
	margin: 2px 0 5px 0;
	}

div.comment-number {
	float: right; 
	font-size: 2em; 
	line-height: 2em; 
	font-family: georgia, serif; 
	font-weight: bold; 
	color: #ddd; 
	margin: -10px 0 0 0; 
	position: relative; 
	height: 1%
	}

div.comment-number a:link, 
div.comment-number a:visited, 
div.comment-number a:active {
	color: #ccc;
	}

textarea.comment {
	width: 96%; 
	margin: 0; 
	}


/* ------------------------------------------------------------------
---------- COMMENTS WP 2.7 ------------------------------------------
------------------------------------------------------------------ */

ul.commentlist {
	margin: 15px 0 15px 0;
	list-style-type: none;
	padding: 0;
	border-top: <?php echo $bfa_ata_comment_border; ?>;
	display:block;
	}

ul.commentlist ul {
	margin: 15px 0 25px 0;
	list-style-type: none;
	padding: 0;
	border: none;
	display:block;
	}

ul.commentlist li.thread-even {
	background-color: #<?php echo $bfa_ata_comment_background_color; ?>;
	border-bottom: <?php echo $bfa_ata_comment_border; ?>;
	padding: 15px 10px;
	display: block;
	clear: both;
	height: 1%; /* for IE */
	margin: 0;
	}

ul.commentlist li.thread-odd {
	background-color: #<?php echo $bfa_ata_comment_alt_background_color; ?>;
	border-bottom: <?php echo $bfa_ata_comment_border; ?>;
	padding: 15px 10px;
	display: block;
	clear: both;
	height: 1%; /* for IE */
	margin: 0;
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

ul.commentlist li ul.children li, 
ul.commentlist li ul.children li.bypostauthor {
	margin: 10px 0 0 30px;
	}

ul.commentlist li ul.children li.depth-2 {
	margin: 10px 0 0 0;
	}

ul.children div.comment-container {
	background-color: transparent;
	border: dashed 1px #ccc;
	padding: 8px;
	margin: 0;
   	/* optional rounded corners for browsers that support it */
   	-moz-border-radius: 5px;
   	-khtml-border-radius: 5px;
   	-webkit-border-radius: 5px;
   	border-radius: 5px;
	}
	
ul.children div.bypostauthor {
	background-color: #ffecec;
	border: dashed 1px #ffbfbf;
	}

ul.commentlist li p {
	margin: 2px 0 5px 0;
	}

ul.commentlist span.authorname {
	font-size: <?php echo $bfa_ata_comment_author_size; ?>;
	}

div.comment-meta a:link, 
div.comment-meta a:visited, 
div.comment-meta a:active, 
div.comment-meta a:hover {
	font-weight: normal;
	}

div#cancel-comment-reply {
	margin: -5px 0 10px 0;
	}

div.comment-number {
	float: right; 
	font-size: 2em; 
	line-height: 2em; 
	font-family: georgia, serif; 
	font-weight: bold; 
	color: #ddd; 
	margin: -10px 0 0 0; 
	position: relative; 
	height: 1%
	}

div.comment-number a:link, 
div.comment-number a:visited, 
div.comment-number a:active {
	color: #ccc;
	}


/* ------------------------------------------------------------------
---------- IMAGES ---------------------------------------------------
------------------------------------------------------------------ */

img { 
	border: 0;
	}

.post img {
	max-width: 96%;		/* 	resize images in the main column if needed.
							97% so images with padding and border don't touch
							the right sidebar while being resized. Change this 
							to 100% if you want, if your images
							don't have padding and a border */
	width: auto 100%;
	margin: 5px 0 5px 0;
	/*overflow-x: auto;*/
	<?php echo $bfa_ata_post_image_style; ?>
	}

/* hiding from IE6 which would stretch the image vertically. 
IE6 will get width and height via jQuery */
div[class~=post] img { 
	height: auto; /* FF & Safari need auto */
	}	

img.alignleft {
	float: left; 
	margin: 10px 10px 5px 0; 
	}
	
img.alignright {
	float: right; 
	margin: 10px 0 5px 10px; 
	}

img.aligncenter {
	display: block;
	margin: 10px auto;
	}

.aligncenter, 
div.aligncenter {
   	display: block;
   	margin-left: auto;
   	margin-right: auto;
	}

.alignleft, 
div.alignleft {
	float: left;
	margin: 10px 10px 5px 0;
	}

.alignright, 
div.alignright {
   	float: right;
   	margin: 10px 0 5px 10px;
	}

/* feed icons on archives page */
div.archives-page img {
	border: 0;
	padding: 0;
	background: none;
	margin-bottom: 0;
	vertical-align: -10%;
	}
	
	
/* ------------------------------------------------------------------
---------- IMAGE CAPTION (WP 2.6 and newer) -------------------------
------------------------------------------------------------------ */

.wp-caption {
	max-width: 96%;		/* FF2, IE7, Opera9, Safari 3.0/3.1 will 
							resize images in the main column if needed.
							97% so images with padding and border don't touch
							the right sidebar while being resized. Change this 
							to 100% if you want, if your images
							don't have padding and a border */
	width: auto 100%;
	height: auto;  /* FF3 needs "auto", IE6 needs "100%", see next style*/
	<?php echo $bfa_ata_post_image_caption_style; ?>
	}

/* for imges inside a caption container IE6 does not
stretch images vertically as it does with images without
caption so we can leave this rule although it is probably not
required as jQuery sets the height for caption'ed images too */
* html .wp-caption {
	height: 100%; 
	}
	
.wp-caption img {
   	margin: 0;
   	padding: 0;
   	border: 0 none;
	}
	
.wp-caption p.wp-caption-text {
	<?php echo $bfa_ata_image_caption_text; ?>
	}


/* ------------------------------------------------------------------
---------- SMILEYS --------------------------------------------------
------------------------------------------------------------------ */

img.wp-smiley {
    float: none;  
    border: none; 
	margin: 0 1px -1px 1px; 
	padding: 0;
	background: none;
	}


/* ------------------------------------------------------------------
---------- GRAVATARS ------------------------------------------------
------------------------------------------------------------------ */

img.avatar {
	float: left; 
	display: block;
	<?php echo $bfa_ata_avatar_style; ?>
	}


<?php if (function_exists('lmbbox_comment_quicktags_display')) { ?>
/* ------------------------------------------------------------------
---------- FOR THE QUICKTAGS PLUGIN ---------------------------------
------------------------------------------------------------------ */	

/*--------------------COMMENTS QUCIKTAGS ------------------*/

/* Main Span */
#comment_quicktags {
	text-align: left;
	padding: 10px 0 2px 0;
	display: block;
	}

/* Button Style */
#comment_quicktags input.ed_button {
	background: #f4f4f4;
	border: 2px solid #cccccc;
	color: #444444;
	margin: 2px 4px 2px 0;
	width: auto;
	padding: 0 4px;
	height: 24px;
	line-height: 16px;
	}
	
/* Button Style on focus/click */
#comment_quicktags input.ed_button_hover {
	background: #dddddd;
	border: 2px solid #666666;
	color: #000000;
	margin: 2px 4px 2px 0;
	width: auto;
	padding: 0 4px;
	height: 24px;
	line-height: 16px;
	cursor: pointer;
	}

/* Button Lable style */
#comment_quicktags #ed_strong {
	font-weight: bold;
	}
	
/* Button Lable style */
#comment_quicktags #ed_em {
	font-style: italic;
	}
<?php } ?>
	

<?php if ( function_exists('sociable_html2') AND function_exists('sociable_html') ) { ?>	
/* ------------------------------------------------------------------
---------- FOR THE SOCIABLE PLUGIN ----------------------------------
------------------------------------------------------------------ */

div.sociable { 
	margin: 0; 
	width: 200px;
	display:inline;
	}

div.sociable-tagline {
	display: none;
	}
	
.sociable span {
	display: inline-block;
	}
	
.sociable ul {
	display: inline;
	margin: 0 !important;
	padding: 0 !important;
	}
	
.sociable ul li {
	background: none;
	display: inline;
	list-style-type: none;
	margin: 0;
	padding: 1px;
	}
	
.sociable ul li:before { 
	content: ""; 
	}
	
.sociable img {
	float: none;
	width: 16px;
	height: 16px;
	border: 0;
	margin: 0;
	padding: 0;
	}

.sociable-hovers {
	opacity: .4;
	-moz-opacity: .4;
	filter: alpha(opacity=40);
	vertical-align: text-bottom;
	}
	
.sociable-hovers:hover {
	opacity: 1;
	-moz-opacity: 1;
	filter: alpha(opacity=100);
	}
<?php } ?>


/* ------------------------------------------------------------------
---------- PRINT STYLE ----------------------------------------------
------------------------------------------------------------------ */

@media print {

body { 
	background: white; 
	color: black; 
	margin: 0; 
	font-size: 12pt; 
	font-family: arial, sans-serif; 
	}

a:link:after, 
a:visited:after { 
	content:" [" attr(href) "] "; 
	font-weight: normal; 
	text-decoration: none; 
	font-size: 12pt;
	}
	
a:link, a:visited {
	text-decoration: underline; 
	color: #000;
	}
	
.postmetadata a:link:after, 
.postmetadata a:visited:after { 
	content: ""; 
	}
	
h2 a:link:after, 
h2 a:visited:after { 
	content: ""; 
	} 
	
h2, 
h2 a:link, 
h2 a:visited, 
h2 a:active {
	color: #000; 
	font-size: 18pt;
	}
	
h3 {
	color: #000; 
	font-size: 15pt;
	}
	
#header, 
#left, 
#right, 
#footer, 
.navigation, 
.wp-pagenavi-navigation, 
#comment, 
.remove-for-print {
	display: none;
	}

}	



<?php if (strpos($bfa_ata_configure_header,'%pages')!==false OR strpos($bfa_ata_configure_header,'%cats')!==false) { ?>
/* ##################################################################
---------------------------------------------------------------------
---------- DROP DOWN / FLY OUT MENUS --------------------------------
Ruthsarian's rMenu http://webhost.bridgew.edu/etribou/layouts/
modified by Bytes For All http://wordpress.bytesforall.com/
---------------------------------------------------------------------
################################################################## */


/* ------------------------------------------------------------------
---------- GENERAL MENU MECHANICS -----------------------------------
------------------------------------------------------------------ */

ul.rMenu, ul.rMenu ul, ul.rMenu li, ul.rMenu a
	{
	display: block;		/* make these objects blocks so they're easier
						to deal with */
	margin: 0;
	padding: 0;			/* get rid of padding/margin values that these
						elements may have by default */
	}
	
ul.rMenu, ul.rMenu li, ul.rMenu ul
	{
	list-style: none;	
	}
	
ul.rMenu ul
	{
	display: none;		/* hide the sub-menus until needed */
	}
	
ul.rMenu li
	{
	position: relative;	/* so sub-menus position relative to their 
						parent LI element */
	z-index: 1;
	}
	
ul.rMenu li:hover
	{
	z-index: 999;		/* make sure this and any sub-menus that pop 
						appear above everything else on the page */
	}
	
ul.rMenu li:hover > ul	/* hide from IE5.0 because it gets confused 
						by this selector */
	{
	display: block;		/* show the sub-menu */
	position: absolute;	/* remove the sub-menus from the flow of the
						layout so when they pop they don't cause any
						disfiguration of the layout. */
	}


/* ------------------------------------------------------------------
---------- EXTENDED MENU MECHANICS ----------------------------------
------------------------------------------------------------------ */

/* These rules exist only for specific menu types, such as horizontal 
or vertical menus, right or left aligned menus. */
 
ul.rMenu-hor li
	{
	float: left;
	width: auto;
	}
	
ul.rMenu-hRight li
	{
	float: right;		/* horizontal, right menus need their LI
				   elements floated to get them over there */
	}
	
ul.rMenu-ver li
	{
	float: none;		/* clear this so vertical sub-menus that are
				   children of horizontal menus won't have
				   their LI widths set to auto. */
	}

	
	
div#menu1 ul.rMenu-ver, div#menu1 ul.rMenu-ver ul
	{
	width: <?php echo $bfa_ata_page_menu_submenu_width; ?>em;		/* sub-menus need a defined width, especially
				   vertical sub-menus. salt to taste. */
	}

div#menu2 ul.rMenu-ver, div#menu2 ul.rMenu-ver ul
	{
	width: <?php echo $bfa_ata_cat_menu_submenu_width; ?>em;		/* sub-menus need a defined width, especially
				   vertical sub-menus. salt to taste. */
	}
	

	
ul.rMenu-wide
	{
	width: 100%;		/* apply this rule if you want the top-level
				   menu to go as wide as possible. this is 
				   something you might want if your top-level
				   is a vertical menu that spans the width
				   of a column which has its width 
				   pre-defined. IE/Win 5 seems to prefer
				   a value of 100% over auto. */
	}
	
ul.rMenu-vRight
	{
	float: right;		/* use this to float a vertical menu right. */
	}
	
ul.rMenu-lFloat
	{
	float: left;		/* use this to float a vertical menu left. */
	}
	
ul.rMenu-noFloat
	{
	float: none;		/* this is to cover those cases where a menu
				   is floated by default and you have a reason
				   to not float it. such as a menu on the
				   right side of the screen that you want 
				   to have drops going left but not floated.
				   to be honest, i don't think this rule is 
				   needed. the clearfix hack will resolve
				   renering issues associated with a floated
				   menu anyways. */
	}


/* ------------------------------------------------------------------
---------- EXTENDED MENU MECHANICS - Center Horizontal Menu ---------
------------------------------------------------------------------ */

div.rMenu-center ul.rMenu
	{
	float: left;
	position: relative;
	left: 50%;
	}
	
div.rMenu-center ul.rMenu li
	{
	position: relative;
	left: -50%;
	}
	
div.rMenu-center ul.rMenu li li
	{
	left: auto;
	}


/* ------------------------------------------------------------------
---------- DROP POSITIONS -------------------------------------------
------------------------------------------------------------------ */

ul.rMenu-hor ul
	{
	top: auto;		/* a value of 100% creates a problem in IE 5.0 
				   and Opera 7.23 */
	right: auto;
	left: auto;		/* typically want a value of 0 here but set to
				   auto for same reasons detailed above */
	margin-top: -1px;	/* so the top border of the dropdown menu 
				   overlaps the bottom border of its parent
				   horizontal menu. */
	}

ul.rMenu-hor ul ul
	{
	margin-top: 0;	/* reset the above for fly out menus */
	margin-left: 0px;
	}
	
ul.rMenu-ver ul
	{
	/*left: 60%;*/
	left: 100%;
	right: auto;
	top: auto;
	/*margin-top: -0.5em;*/	/* i prefer top: 80% but this creates a problem
				   in iCab so negative top margin must be used.
				   salt to taste. */
	top: 0;
	}
	
ul.rMenu-vRight ul, ul.rMenu-hRight ul.rMenu-ver ul
	{
	left: -100%;
	right: auto;
	top: auto;
	/*margin-top: -0.5em;*/	/* i prefer top: 80% but this creates a problem
				   in iCab so negative top margin must be used.
				   salt to taste. */
	}
	
ul.rMenu-hRight ul
	{
	left: auto;
	right: 0;		/* this doesn't work in Opera 7.23 but 7.5 and
				   beyond work fine. this means right-aligned
				   horizontal menus break in Opera 7.23 and
				   earlier. no workaround has been found. */
	top: auto;
	margin-top: -1px;	/* so the top border of the dropdown menu 
				   overlaps the bottom border of its parent
				   horizontal menu. */
	}


/* ------------------------------------------------------------------
---------- PRESENTATION: General ------------------------------------
------------------------------------------------------------------ */

ul.rMenu
	{
	background: #<?php echo $bfa_ata_page_menu_bar_background_color; ?>;
	border: <?php echo $bfa_ata_anchor_border_page_menu_bar; ?>;
	border-left: none;
	}
/*added for darkmenu*/
ul#rmenu
	{
	background: #<?php echo $bfa_ata_cat_menu_bar_background_color; ?>;
	border: <?php echo $bfa_ata_anchor_border_cat_menu_bar; ?>;
	border-left: none;
	}



ul.rMenu li a
	{
	border: <?php echo $bfa_ata_anchor_border_page_menu_bar; ?>;	/* border around all anchor tags */
	}
/*added*/
ul#rmenu li a
	{
	border: <?php echo $bfa_ata_anchor_border_cat_menu_bar; ?>;	/* border around all anchor tags */
	}



	
ul.rMenu-hor li
	{
	margin-bottom: -1px;	/* this is so if we apply a bottom border to 
				   the UL element it will render behind, but
				   inline with the bottom border of the LI
				   elements. Default: -1px */
	margin-top: -1px;	/* this is so if we apply a top border to 
				   the UL element it will render behind, but
				   inline with the bottom border of the LI
				   elements. Default: -1px */				
	margin-left: -1px;	/* negative borders on LIs to make borders on
				   child A elements overlap. they go here and
				   not on the A element for compatibility
				   reasons (IE6 and earlier). Default: -1px */
	}


	
ul#rmenu li
	{	
	/*margin-right: 3px;*/	/* set to 0 to remove the space between single, 
				   horizontal LI elements */
	}
ul#rmenu li ul li
	{	
	/*margin-right: 0;*/	/* without this, the 2nd level horizontal LI's would get
				   a margin-right, too. This should always be 0 */
	}


	

ul.rMenu-hor
	{
	padding-left: 1px ;	/* compensate for the 1px left jog created by
				   the above negative margin. */
	}
	
ul.rMenu-ver li
	{
	margin-left: 0;
	margin-top: -1px;	/* same thing above except for vertical
				   menus */
	}
	
	
div#menu1 ul.rMenu-ver
	{
	border-top: <?php echo $bfa_ata_anchor_border_page_menu_bar; ?>;	/* ditto */
	}

div#menu2 ul.rMenu-ver
	{
	border-top: <?php echo $bfa_ata_anchor_border_cat_menu_bar; ?>;	/* ditto */
	}
	
	
ul.rMenu li a
	{
	padding: 4px 5px;	
	}
/* added for dark menu*/
ul#rmenu li a
	{
	padding: 4px 5px;	
	}


	
		
ul.rMenu li a:link, ul.rMenu li a:hover, ul.rMenu li a:visited, ul.rMenu li a:active
	{
	text-decoration: none;
	color: #<?php echo $bfa_ata_page_menu_bar_link_color; ?>;
	text-transform: <?php echo $bfa_ata_page_menu_transform; ?>;
	font: <?php echo $bfa_ata_page_menu_font; ?>;  
	margin:0;
	padding: 4px 5px;	
	}

/*added*/
ul#rmenu li a:link, ul#rmenu li a:hover, ul#rmenu li a:visited, ul#rmenu li a:active
	{
	text-decoration: none;
	color: #<?php echo $bfa_ata_cat_menu_bar_link_color; ?>;
	text-transform: <?php echo $bfa_ata_cat_menu_transform; ?>;
	font: <?php echo $bfa_ata_cat_menu_font; ?>; 
	margin:0;
	padding: 4px 5px;	
	}


/*
ul.rMenu li.sfhover a:active,
ul.rMenu li:hover a:active
	{
	color: #fff;
	background-color: #c00;
	}
*/

	
ul.rMenu li
	{
	background-color: #<?php echo $bfa_ata_page_menu_bar_background_color; ?>;	/* default background color of menu items */
	/*background: url(images/dropbackgr.gif) repeat-x top left;*/
	}

/*added*/
ul#rmenu li
	{
	background-color: #<?php echo $bfa_ata_cat_menu_bar_background_color; ?>;	/* default background color of menu items */
	/*background: #777 url(images/dropbackgr.gif) repeat-x top left;*/
	}



	
ul.rMenu li:hover,
ul.rMenu li.sfhover
	{
	background-color: #<?php echo $bfa_ata_page_menu_bar_background_color_parent; ?>;	/* background color for parent menu items of
				   the current sub-menu. includes the sfhover
				   class which is used in the suckerfish hack
				   detailed later in this stylesheet. */

			   
	}
/*added for dark menu*/
ul#rmenu li:hover,
ul#rmenu li.sfhover
	{
	background-color: #<?php echo $bfa_ata_cat_menu_bar_background_color_parent; ?>;	/* background color for parent menu items of
				   the current sub-menu. includes the sfhover
				   class which is used in the suckerfish hack
				   detailed later in this stylesheet. */
	}




/* "current" page and hover */
ul.rMenu li.current_page_item, 
ul.rMenu li a:hover
	{
	background-color: #<?php echo $bfa_ata_page_menu_bar_background_color_hover; ?>;
	color: #<?php echo $bfa_ata_page_menu_bar_link_color_hover; ?>;
	}
/*added*/
/* "current" category and hover */
ul#rmenu li.current-cat,
ul#rmenu li a:hover
	{
	background-color: #<?php echo $bfa_ata_cat_menu_bar_background_color_hover; ?>;
	color: #<?php echo $bfa_ata_cat_menu_bar_link_color_hover; ?>;
	}


/* ------------------------------------------------------------------
---------- PRESENTATION: Expand -------------------------------------
------------------------------------------------------------------ */

div#menu1 ul.rMenu li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a
	{
	padding-right: 15px;
	padding-left: 5px;
	background-image: url(images/expand-right<?php echo ($bfa_ata_page_menu_arrows == "white" ? "-white" : ""); ?>.gif);
	background-repeat: no-repeat;
	background-position: 100% 50%;
	}
/*added for dark menu*/
div#menu2 ul.rMenu li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a
	{
	padding-right: 15px;
	padding-left: 5px;
	background-image: url(images/expand-right<?php echo ($bfa_ata_cat_menu_arrows == "white" ? "-white" : ""); ?>.gif);
	background-repeat: no-repeat;
	background-position: 100% 50%;
	}


	
ul.rMenu-vRight li.rMenu-expand a,
ul.rMenu-vRight li.rMenu-expand li.rMenu-expand a,
ul.rMenu-vRight li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-vRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-vRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-vRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-vRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-vRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-vRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-vRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-hRight li.rMenu-expand a,
ul.rMenu-hRight li.rMenu-expand li.rMenu-expand a,
ul.rMenu-hRight li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-hRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-hRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-hRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-hRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-hRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-hRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a,
ul.rMenu-hRight li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand a
	{
	padding-right: 5px;
	padding-left: 20px;
	background-image: url(images/expand-left.gif);
	background-repeat: no-repeat;
	background-position: -5px 50%;
	}

/* divs added for "IE6 & 2 menu styles" */	
div#menu1 ul.rMenu-hor li.rMenu-expand a
	{
	padding-left: 5px;	/* reset padding */
	padding-right: 15px;
	background-image: url(images/expand-down<?php echo ($bfa_ata_page_menu_arrows == "white" ? "-white" : ""); ?>.gif);
	background-position: 100% 50%;
	}
/*added for dark menu*/
div#menu2 ul.rMenu-hor li.rMenu-expand a
	{
	padding-left: 5px;	/* reset padding */
	padding-right: 15px;
	background-image: url(images/expand-down<?php echo ($bfa_ata_cat_menu_arrows == "white" ? "-white" : ""); ?>.gif);
	background-position: 100% 50%;
	}


	
div#menu1 ul.rMenu li.rMenu-expand li a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu1 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a
	{
	background-image: none;
	padding-right: 5px;	/* reset padding */
	padding-left: 5px;	/* reset padding */
	}

/*added for darkmenu*/
div#menu2 ul.rMenu li.rMenu-expand li a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a,
div#menu2 ul.rMenu li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li.rMenu-expand li a
	{
	background-image: none;
	padding-right: 5px;	/* reset padding */
	padding-left: 5px;	/* reset padding */
	}


/* ------------------------------------------------------------------
---------- HACKS: General -------------------------------------------
------------------------------------------------------------------ */

* html ul.rMenu
	{
	display: inline-block;	/* this is for IE/Mac. it forces IE/Mac to 
				   expand the element's dimensions to contain 
				   its floating child elements without a 
				   clearing element. */
	/* \*/ display: block;	/* override above rule for every other 
				   browser using IE/Mac backslash hack */
	position: relative;	/* IE 5.0/Mac needs this or it may clip the
				   dropdown menus */
	/* \*/ position: static;/* reset position attribute for IE/Win as it
				   causes z-index problems */
	}
	
* html ul.rMenu ul
	{
	float: left;		/* IE/Mac 5.0 needs this, otherwise hidden 
				   menus are not completely removed from the
				   flow of the document. */
	/* \*/ float: none;	/* reset the rule for non-Macs */
	}
	
ul.rMenu ul
	{
	/*background-color: #fff;*/	/* IE/Win (including 7) needs this on an object 
				   that hasLayout so that it doesn't "look through"
				   the menu and let any object (text) below the 
				   menu to gain focus, causing the menu to 
				   disappear. application of this rule does not
				   cause any rendering problems with other browsers
				   as the background color is covered by the
				   menu itself. */
	}
	
* html ul.rMenu-ver li,
* html ul.rMenu-hor li ul.rMenu-ver li
	{
				/* the second selector above is there 
				   because of problems IE/Mac has with 
				   inheritance and what rules should take
				   precedence. and to serve as a reminder on
				   how to work around the issue if it's 
				   encountered again down the road. */
	width: 100%;
	float: left;
	clear: left;		/* IE likes to stick space below any LI
				   in :hover state with a sub-menu. floating
				   the LIs seems to work around this issue. But
				   note that this also triggers hasLayout 
				   because we need a width of 100% on floats. */
	}
	
*:first-child+html ul.rMenu-ver > li	/* hide from IE5.0 because 
										it gets confused by this 
										selector */
	{
	width: 100%;
	float: left;
	clear: left;		/* same as previous rule set except this is
				   for IE7 and the direct child selector 
				   make inheritence much easier and obvious */
	}
	
ul.rMenu li a
	{
	position: relative;	/* trigger hasLayout for IE on anchor 
				   elements. without hasLayout on anchors
				   they would not expand the full width 
				   of the menu. this rule may not trigger
				   hasLayour in later versions of IE and
				   if you find this system broken in new
				   versions of IE, this is probably the
				   source. */
	min-width: 0;		/* triggers hasLayout for IE 7 */
	}
	
* html ul.rMenu-hor li
	{
	width: 11em;		/* IE Mac doesn't do auto widths so specify a width 
				   for the sake of IE/Mac. Salt to taste. */
	/* \*/ width: auto;	/* now undo previous rule for non Macs by using 
				   the IE Mac backslash comment hack */
	}
	
* html div.rMenu-center
	{
	position: relative;
	z-index: 1;		/* IE 6 and earlier need a little help with
				   z-indexes on centered menus */
	}


/* ------------------------------------------------------------------
---------- HACKS: Suckerfish w/ Form Field Support (IE 5.5 & 6) -----
------------------------------------------------------------------ */

* html ul.rMenu ul
	{
	display: block;
	position: absolute;	/* ovewrite original functionality of hiding
				   element so we can hide these off screen */
	}
	
* html ul.rMenu ul,
* html ul.rMenu-hor ul,
* html ul.rMenu-ver ul,
* html ul.rMenu-vRight ul, 
* html ul.rMenu-hRight ul.rMenu-ver ul,
* html ul.rMenu-hRight ul
	{
	left: -10000px;		/* move menus off screen. note we're ovewriting
				   the dropdown position rules that use the 
				   LEFT property, thus all the selectors. */
	}
	
* html ul.rMenu li.sfhover
	{
	z-index: 999;		/* not totally needed, but keep the menu 
				   that pops above all other elements within
				   it's parent menu system */
	}
	
* html ul.rMenu li.sfhover ul
	{
	left: auto;		/* pull the menus that were off-screen back 
				   onto the screen */
	}
	
* html ul.rMenu li.sfhover ul ul, 
* html ul.rMenu li.sfhover ul ul ul,
* html ul.rMenu li.sfhover ul ul ul ul,
* html ul.rMenu li.sfhover ul ul ul ul ul,
* html ul.rMenu li.sfhover ul ul ul ul ul ul,
* html ul.rMenu li.sfhover ul ul ul ul ul ul ul,
* html ul.rMenu li.sfhover ul ul ul ul ul ul ul ul,
* html ul.rMenu li.sfhover ul ul ul ul ul ul ul ul ul,
* html ul.rMenu li.sfhover ul ul ul ul ul ul ul ul ul ul
	{ 
	display: none;		/* IE/Suckerfish alternative for browsers that
				   don't support :hover state on LI elements */
	}
	
* html ul.rMenu li.sfhover ul, 
* html ul.rMenu li li.sfhover ul, 
* html ul.rMenu li li li.sfhover ul,
* html ul.rMenu li li li li.sfhover ul,
* html ul.rMenu li li li li li.sfhover ul,
* html ul.rMenu li li li li li li.sfhover ul,
* html ul.rMenu li li li li li li li.sfhover ul,
* html ul.rMenu li li li li li li li li.sfhover ul,
* html ul.rMenu li li li li li li li li li.sfhover ul,
* html ul.rMenu li li li li li li li li li li.sfhover ul
	{
	display: block;		/* ^ ditto ^ */
	}

* html ul.rMenu-ver li.sfhover ul
	{
	left: 100%;		/* dropdown positioning uses the left attribute
				   for horizontal positioning. however we can't
				   use this property until the menu is being
				   displayed.

				   note that all ULs beneath the menu item 
				   currently in the hover state will get this
				   value through inheritance. however all sub-
				   menus still won't display because
				   two rule sets up we're setting the 
				   DISPLAY property to none.
				 */
	}
	
* html ul.rMenu-vRight li.sfhover ul, 
* html ul.rMenu-hRight ul.rMenu-ver li.sfhover ul
	{
	left: -100%;		/* ^ ditto ^ */
	}
	
* html ul.rMenu iframe
{
	/*filter:progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0); */
				/* the above rule is now applied in the 
				   javascript used to generate the IFRAME this
				   is applied to. it allows the CSS to validate
				   while keeping the original functionality. */
	position: absolute;
	left: 0;
	top: 0;
	z-index: -1;		/* this is the IFRAME that's placed behind
				   dropdown menus so that form elements don't
				   show through the menus. they are not set
				   programatically via javascript because
				   doing so generates some lag in the display
				   of the dropdown menu. */
}

/* ie6 fixes */

* html ul.rMenu
{
	margin-left: 1px;
}

* html ul.rMenu ul, 
* html ul.rMenu ul ul,
* html ul.rMenu ul ul ul,
* html ul.rMenu ul ul ul ul
{
	margin-left: 0;
}
<?php } ?>


/* ------------------------------------------------------------------
---------- HACKS: Clearfix & others ---------------------------------
------------------------------------------------------------------ */

.clearfix:after
	{
    	content: "."; 
    	display: block; 
    	height: 0; 
    	clear: both; 
    	visibility: hidden;
	}
	
.clearfix
	{
	min-width: 0;		/* trigger hasLayout for IE7 */
	display: inline-block;
	/* \*/	display: block;	/* Hide from IE Mac */
	}
	
* html .clearfix
	{
	/* \*/  height: 1%;	/* Hide from IE Mac */ 
	}

/* Chrome and Safari don't like clearfix in some cases.
Also, adding height and font-size for IE6 */
.clearboth {
	clear: both;
	height: 1%;
	font-size: 1%;
	line-height: 1%;
	display: block;
	padding: 0;
	margin: 0;
	}

	
	
/* ------------------------------------------------------------------
---------- CUSTOM STYLES: -------------------------------------------
------------------------------------------------------------------ */

<?php echo $bfa_ata_html_inserts_css; ?>