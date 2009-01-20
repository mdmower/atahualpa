<?php
# Load translation file if available
load_theme_textdomain('atahualpa');
# Sidebars:
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name'=>'Left Sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="widget-title"><h3>',
        'after_title' => '</h3></div><div class="widget-content">',
    ));
    register_sidebar(array(
         'name'=>'Right Sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="widget-title"><h3>',
        'after_title' => '</h3></div><div class="widget-content">',
    )); 
} 
# Load functions
include (TEMPLATEPATH . '/functions/bfa_header_config.php');
include (TEMPLATEPATH . '/functions/bfa_hor_cats.php');
include (TEMPLATEPATH . '/functions/bfa_hor_pages.php');
include (TEMPLATEPATH . '/functions/bfa_footer.php');
include (TEMPLATEPATH . '/functions/bfa_recent_comments.php');
include (TEMPLATEPATH . '/functions/bfa_popular_posts.php');
include (TEMPLATEPATH . '/functions/bfa_popular_in_cat.php');
include (TEMPLATEPATH . '/functions/bfa_subscribe.php');
include (TEMPLATEPATH . '/functions/bfa_text_widget.php');
include (TEMPLATEPATH . '/functions/bfa_search_widget.php');
include (TEMPLATEPATH . '/functions/bfa_calendar_widget.php');
if (!function_exists('paged_comments')) { include (TEMPLATEPATH . '/functions/bfa_comment_walker.php'); }
if (function_exists('sociable_html')) { include (TEMPLATEPATH . '/functions/bfa_sociable2.php'); }
// find in directory function, needed for header images on WPMU
if (file_exists(ABSPATH."/wpmu-settings.php")) {include (TEMPLATEPATH . '/functions/bfa_m_find_in_dir.php');}
# Add admin page CSS
function bfa_add_stuff_admin_head() {
    $url_base = get_bloginfo('template_directory');
	// add jquery function only to theme page or widgets won't work in 2.3 and older
	if ( $_GET['page'] == basename(__FILE__) ) { 
	echo "<script src=\"$url_base/options/jscolor/jscolor.js\" type=\"text/javascript\"></script>\n";
	echo "<style type=\"text/css\">\n";
	echo "div.tabcontent { height: auto; border: none; margin: 0; padding: 0; display:none; /*overflow: visible;*/ width: auto} \n"; 
	echo ".bfa-container { width: 100%; border: solid 3px #C6D9E9; background-color: #E4F2FD; margin: 10px auto; padding: 0; \n";
	echo "-moz-border-radius: 5px; -khtml-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px;	}\n";
	echo ".bfa-container ul {list-style: circle url('" . get_bloginfo('template_directory') . "/options/images/list-arrow.gif') !important; margin: 1em 1em 1em 2em;} \n";
	echo ".bfa-container-left { display: block; float: left; text-align: right; width: 35%; border-right: solid 1px #C6D9E9; margin: 0; padding: 10px; }\n";
	echo ".bfa-container-right { display: block; float: right; width: 58%; margin: 0; padding: 10px; }\n";
	echo ".bfa-container-full { /*display:block;*/ width: auto; margin: 0; padding: 10px; }\n";
	echo ".bfa-container h2 { font-size: 1.5em; color: #666; margin:0; padding: 3px; border: none}\n";
	echo ".bfa-container input { text-align: right }\n";
	echo ".bfa-container label { font-size: 16px; font-weight: bold; color: #444; }\n";
	echo ".bfa-container input, .bfa-container-left textarea, .bfa-container-left select { margin: 7px 0 4px 7px}\n";
	echo "ul#bfaoptiontabs {text-align: left;list-style-type: none; margin: 10px 0 0 0; padding: 0; -moz-padding-start: 0}\n";
	echo "ul#bfaoptiontabs li {display: inline; list-style-type: none; padding-top: 5px; }\n";
	echo "ul#bfaoptiontabs li a:link, ul#bfaoptiontabs li a:visited, ul#bfaoptiontabs li a:active {display: -moz-inline-box; display: inline-block; white-space: nowrap; outline: 0; text-decoration: none; position: relative; z-index: 1; padding: 2px 6px; \n";
	echo "margin-right: 0px; margin-top: 3px; border: 2px solid #C6D9E9; font-size: 1.1em; color: #2582a9; background-color: #E4F2FD; /*line-height: 22px; height: 22px;*/\n";
	echo "-moz-border-radius: 3px; -khtml-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px;}\n";
	echo "ul#bfaoptiontabs li a:hover {border: 2px solid #D54E21; background-color: #ffffff; color: #D54E21; }\n";
	echo "ul#bfaoptiontabs li a.selected {border: 2px solid #883215; background-color: #D54E21; color: #ffffff !important; outline: 0}\n";
	echo "table.bfa-optiontable-layout {width: 100%; }\n";
	echo "table.bfa-optiontable {text-align: left; white-space: wrap; background-color: #f1f9fe; border-collapse: collapse; border: solid 1px #c4e2fb }\n";
	echo "table.bfa-optiontable input {margin: 0 2px 0 2px; padding: 2px; text-align: left }\n";
	echo "table.bfa-optiontable input.color {text-align: right }\n";
	echo "table.bfa-optiontable thead tr td {line-height: 11px; }\n";
	echo "table.bfa-optiontable-layout td {vertical-align:top; }\n";
	echo "table.bfa-optiontable td {vertical-align:middle; padding: 1px 3px}\n";
	echo "table.bfa-optiontable thead td {text-align: center; background-color: #c4e2fb; font-weight: bold; padding: 5px; }\n";
	echo "div.more_blog_title_font { display: none }\n";
	echo "div.more_show_header_image { display: none }\n";
	echo "h4 {font-size: 18px; font-family:\"Courier New\", Courier, monospace; margin-bottom: 5px}\n";
	echo "code {background: #ffffff; padding-left: 5px; padding-right: 5px;}\n";
	echo "i {color: red; font-style: normal; font-weight: bold;}\n";
	echo "input.save-tab { line-height: normal !important; font-size: 5em !important; padding: 5px 20px 10px 75px; border: solid 5px #063; background: #009d4f url('" . get_bloginfo('template_directory') . "/options/images/save.png') no-repeat 5% 50% !important; color: #fff; text-align: center; font-weight: bold;}\n";
	echo "input.save-tab:hover { border: solid 5px #88d87a; background: #063 url('" . get_bloginfo('template_directory') . "/options/images/save.png') 5% 50% no-repeat !important; color: #fff; }\n";
	echo "input.reset-tab { line-height: normal !important; font-size: 2em !important; padding: 5px 10px 5px 45px; border: solid 3px #800; background: #c30 url('" . get_bloginfo('template_directory') . "/options/images/reset.png') no-repeat 5% 50% !important; background-image: none; color: #fff; text-align: center; font-weight: bold;}\n";
	echo "input.reset-tab:hover { border: solid 3px #ff9393; background: #800 url('" . get_bloginfo('template_directory') . "/options/images/reset.png') 5% 50% no-repeat !important; color: #fff; }\n";
	echo "input.reset-all { line-height: normal !important; font-size: 1.5em !important; padding: 5px 10px 5px 45px; border: solid 3px #555; background: #777 url('" . get_bloginfo('template_directory') . "/options/images/reset-all-gray.png') no-repeat 5% 50% !important; background-image: none; color: #ddd; text-align: center; font-weight: bold;}\n";
	echo "input.reset-all:hover { border: solid 3px #ff9393; background: #800 url('" . get_bloginfo('template_directory') . "/options/images/reset-all.png') 5% 50% no-repeat !important; color: #fff; }\n";
	echo "p.submit { text-align: center; }\n";
	echo "</style>\n";
	echo "<script LANGUAGE=\"JavaScript\">\n";
	echo "<!--\n";
	echo "function confirmSubmit()\n";
	echo "{\n";
	echo "var agree=confirm(\"Are you sure? This will reset ALL theme options.\");\n";
	echo "if (agree) return true ;\n";
	echo "else return false ;\n";
	echo "}\n";
	echo "// -->\n";
	echo "</script>\n";
	// add jquery to WP 2.3 and older
	if ( substr(get_bloginfo('version'), 0, 3) < 2.5 ) {   
	echo "<script type=\"text/javascript\" src=\"$url_base/js/jquery-1.2.6.min.js\"></script>\n";
	}
	echo "<script type=\"text/javascript\" src=\"$url_base/options/tabcontent/tabcontent.js\">\n";
	echo "/***********************************************\n";
	echo "* Tab Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)\n";
	echo "* This notice MUST stay intact for legal use\n";
	echo "* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code\n";
	echo "***********************************************/\n";
	echo "</script>\n";
	}
}
add_action('admin_head', 'bfa_add_stuff_admin_head');
?>
<?php
// Escape single & double quotes
function bfa_escape($string) {
	$string = str_replace('"', '&#34;', $string);
	$string = str_replace("'", '&#39;', $string);
	return $string;
}
// change them back
function bfa_unescape($string) {
	$string = str_replace('&#34;', '"', $string);
	$string = str_replace('&#39;', "'", $string);
	return $string;
}
function bfa_escapelt($string) {
	$string = str_replace('<', '&lt;', $string);
	$string = str_replace('>', '&gt;', $string);
	return $string;
}
?>
<?php
// get the theme options
$stylesheet_directory = get_bloginfo('template_directory');
include (TEMPLATEPATH . '/functions/bfa_theme_options.php');

function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
 
			foreach ($options as $value) {
				if ( $value['category'] == $_REQUEST['category'] ) {
					if ( $value['escape'] == "yes" ) {  
						update_option( $value['id'], stripslashes(bfa_escape($_REQUEST[ $value['id'] ] )));  
					} elseif ( $value['stripslashes'] == "no" ) {   
						update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
					} else {
						update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ] )); 
					}
				}
			}
				
            foreach ($options as $value) {
				if ( $value['category'] == $_REQUEST['category'] ) {
					if ( $value['escape'] == "yes" ) {
						if( isset( $_REQUEST[ $value['id'] ] ) ) { 
							update_option( $value['id'], stripslashes(bfa_escape($_REQUEST[ $value['id'] ]  ))); 
						} else { 
							delete_option( $value['id'] ); 
						} 
					} elseif ($value['stripslashes'] == "no") { 
						if( isset( $_REQUEST[ $value['id'] ] ) ) { 
							update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
						} else { 
							delete_option( $value['id'] ); 
						} 
					} else { 
						if( isset( $_REQUEST[ $value['id'] ] ) ) { 
							update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ]  )); 
						} else { 
							delete_option( $value['id'] ); 
						} 
					} 
				}
			} 
				
            header("Location: themes.php?page=functions.php&saved=true");
            die;

		} else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
				if ( $value['category'] == $_REQUEST['category'] OR "reset-all" == $_REQUEST['category'] ) {
					delete_option( $value['id'] ); 
					}
				}
            header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }
    add_theme_page($themename. " Options", "Atahualpa Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename. ' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename. ' settings reset.</strong></p></div>';
?>
<?php 
#
$theme_name = "Atahualpa";
$theme_version = "3.1.8";
#
$border_styles = array("solid", "dotted", "dashed", "double", "groove", "ridge", "inset", "outset");
$background_repeat = array("vertic. and horiz.", "vertically", "horizontally", "don't repeat");
$background_position = array("top left", "top center", "top right", "center left", "center center", "center right", "bottom left", "bottom center", "bottom right");
$background_attachment = array("scroll", "fixed");
$background_image_location = array("Remote: http://", "Local: /themes/atahualpa3/images/");
$font_family = array("Tahoma", "Arial", "Calibri", "Cambria", "Candara", "Comic Sans MS", "Consolas", "Constantia", "Corbel", "Courier New", "Georgia", "Times New Roman", "Trebuchet MS", "Verdana");
$font_family_backup = array("Tahoma, sans-serif", "Arial, sans-serif", "Calibri, sans-serif", "Cambria, serif", "Candara, sans-serif", "Comic Sans MS, sans-serif", "Consolas, sans-serif", "Constantia, serif", "Corbel, sans-serif", "Courier New, sans-serif", "Georgia, serif", "Times New Roman, serif", "Trebuchet MS, sans-serif", "Verdana, sans-serif");
$font_size = array("0.5", "0.55", "0.6", "0.65", "0.7", "0.75", "0.8", "0.85", "0.9", "0.95", "1", "1.05", "1.1", "1.15", "1.2", "1.25", "1.3", "1.35", "1.4", "1.45", "1.5", "1.55", "1.6", "1.65", "1.7", "1.75", "1.8", "1.85", "1.9", "1.95", "2", "2.05", "2.1", "2.15", "2.2", "2.25", "2.3", "2.35", "2.4", "2.45", "2.5", "2.55", "2.6", "2.65", "2.7", "2.75", "2.8", "2.85", "2.9", "2.95", "3", "3.05", "3.1", "3.15", "3.2", "3.25", "3.3", "3.35", "3.4", "3.45", "3.5", "3.55", "3.6", "3.65", "3.7", "3.75", "3.8", "3.85", "3.9", "3.95", "4");
$font_weight = array("normal", "bold");
$font_style =array("normal", "italic");
$text_align = array("left", "center", "right", "justify");
$line_height = array("normal", "0.7", "0.75", "0.8", "0.85", "0.9", "0.95", "1", "1.05", "1.1", "1.15", "1.2", "1.25", "1.3", "1.35", "1.4", "1.45", "1.5", "1.55", "1.6", "1.65", "1.7", "1.75", "1.8", "1.85", "1.9", "1.95", "2");
$text_transform = array("none", "capitalize", "uppercase", "lowercase");
$text_decoration = array("none", "underline", "overline", "line-through");
$url_base = get_bloginfo('template_directory');
?>
<table width="100%" cellpadding="2" cellspacing="0"><tr><td valign="middle" width="380"><h2 style="margin:0 30px 0 0; padding: 5px 0 5px 0;"><?php echo $theme_name; ?> Theme Options</h2></td><td valign="middle"><iframe src="http://wordpress.bytesforall.com/update.php?theme=<?php echo $theme_name; ?>&version=<?php echo $theme_version; ?>" width="98%" height="40" scrolling="no" frameborder="0"></iframe></td>
</tr></table>
<div class="wrap">
<ul id="bfaoptiontabs" class="shadetabs">
<li><a href="#" rel="start-here" class="selected">START</a></li>
<li><a href="#" rel="seo">SEO</a></li>
<li><a href="#" rel="body-font-links">Body, Text &amp; Links</a></li>
<li><a href="#" rel="layout">Layout</a></li>
<li><a href="#" rel="favicon">Favicon</a></li>
<li><a href="#" rel="header">Header</a></li>
<li><a href="#" rel="header-image">Header Image</a></li>
<li><a href="#" rel="feed-links">RSS Settings</a></li>
<li><a href="#" rel="page-menu-bar">Page Menu Bar</a></li>
<li><a href="#" rel="cat-menu-bar">Category Menu Bar</a></li>
<li><a href="#" rel="center">Center</a></li>
<li><a href="#" rel="next-prev-nav">Next/Previous Navigation</a></li>
<li><a href="#" rel="sidebars">Sidebars</a></li>
<li><a href="#" rel="widgets">Widgets</a></li>
<li><a href="#" rel="postinfos">Post/Page Info Items</a></li>
<li><a href="#" rel="posts">Post/Page Styling</a></li>
<li><a href="#" rel="posts-or-excerpts">Posts or Excerpts</a></li>
<li><a href="#" rel="more-tag">"Read More" tag</a></li>
<li><a href="#" rel="comments">Comments</a></li>
<li><a href="#" rel="footer-style">Footer</a></li>
<li><a href="#" rel="tables">Tables</a></li>
<li><a href="#" rel="forms">Forms</a></li>
<li><a href="#" rel="blockquotes">Blockquotes</a></li>
<li><a href="#" rel="images">Images</a></li>
<li><a href="#" rel="html-inserts">HTML/CSS Inserts</a></li>
<li><a href="#" rel="archives-page">Archives Page</a></li>
</ul>

<div id="start-here" class="tabcontent">   <!-- opening the first tab content div, first option should be start-here, in the options array above //-->
<?php foreach ($options as $value) {     # start the options loop, check first, if we need to switch to another tab = option category

# open/close category tab divs 
if ( $value['switch'] == "yes") {     
		
	echo "</div>\n<div id=\"" . $value['category'] . "\" class=\"tabcontent\">\n";
	
	// all categories except first category "start-here" get an opening form tag. "start-here" has no value "switch" so no IF required here
	echo '<form method="post">'; 
	
}

# extra info for some categories

if($value['category'] == "postinfos" AND $value['switch'] == "yes") { ?>
<div class="bfa-container">
    <div class="bfa-container-full"><img src="<?php echo get_bloginfo('template_directory'); ?>/options/images/post-structure.gif" style="float: right; margin: 40px 0 15px 15px;">
	<label for="Post Info Items">Post Info Items</label><br /><br />
	Configure a <strong>Kicker</strong>, a <strong>Byline</strong> and a <strong>Footer</strong> for posts and pages by arranging these <strong>Post Info Items</strong>. 
	<br /><br />Some of these post info items have one or several <strong>parameters</strong>: 
<ul>
	<li>You can leave parameters empty but do not remove their single quotes, even if the parameter is empty.</li>
	<li>Replace the parameter <code>delimiter</code> with what you want to put between the list items of the tag or category list, i.e. a comma.</li>
	<li>Replace the parameters <code>before</code> and <code>after</code> with what you want to display before or after that info item. If an item has these "before/after" parameters, use them instead of 
	hard coding text before and after that item: Example: Use <br /><code>%tags-linked('<i>Tags: </i>', '<i>, </i>', '<i> - </i>')%</code><br />instead of<br /><code>Tags: %tags-linked('', '<i>, </i>', '')% - </code></li>
	<li>Replace the parameter <code>linktext</code> with the link text for that item.</li>
</ul>
HTML and <strong>icons</strong> can be used, inside of parameters, too, just not inside the date item:
<ul>
<li><code>&lt;image(someimage.gif)&gt;</code> to include an image. <em>Note: The image item doesn't have quotes</em></li>
<li>To use your own images, upload them to /[theme-folder]/images/icons/</li>
</ul>
	<h3>Icons</h3>
<strong>Currently available images (Once you uploaded yours they will be listed here):</strong><br /><br />
<?php
if ($handle = opendir( TEMPLATEPATH . '/images/icons/')) {
    while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != "..") {
		$files[] = $file;
		}
	}
    closedir($handle);
}
sort($files);
foreach ($files as $key => $file) {
        echo '<span style="float:left; width: 280px; margin-right: 10px; height: 22px;"><img src="' . get_bloginfo('template_directory') . '/images/icons/' . "$file" . '" /> &nbsp;<code>&lt;image(' . "$file" . ')&gt;</code></span>';
}
?>
<div style="clear:left">&nbsp;</div>
<h3>Examples</h3>
Examples for <strong>Post Bylines</strong>:
<ul>
	<li><code>By %author%, on %date('<i>F jS, Y</i>')%</code></li>
	<li><code>&lt;strong&gt;%author-linked%&lt;/strong&gt; posted this in &lt;strong&gt;%categories-linked('<i>, </i>')%&lt;/strong&gt; on &lt;em&gt;%date('<i>F jS, Y</i>')%&lt;/em&gt;</code></li>
	<li><code>&lt;image(user.gif)&gt; %author-linked% &lt;image(date.gif)&gt; %date('<i>l, jS #of F Y #a#t h:i:s A</i>')%</code></li>
	</ul>
Examples for <strong>Post Footers</strong>:
	<ul>
	<li><code>%tags-linked('<i>&lt;strong&gt;Tags:&lt;/strong&gt; </i>', '<i>, </i>', '<i> &amp;mdash; </i>')% &lt;strong&gt;Categories:&lt;/strong&gt; %categories-linked('<i>, </i>')% &amp;mdash; %comments('<i>Nobody has commented yet, kick it off...</i>', '<i>One comment so far</i>', '<i>% people had their say - be the next!</i>', '<i>Sorry, but comments are closed</i>')% &amp;mdash;  
	%wp-print% &amp;mdash; %wp-email% &amp;mdash; %sociable% &amp;mdash; %wp-postviews%</code></li>
	</ul>
	
	<h3>Post Info Items</h3>
	List of available post info items:
<br /><h4>%author%</h4>
Prints the name of the author of the post.
<br /><h4>%author-linked%</h4>
Prints the name of the author of the post, and links it to a page listing all posts by that author.
<br /><h4>%date('F jS, Y')%</h4>
Prints the date and/or time the post was published at. Many configuration options at <a href='http://www.php.net/date'>PHP Date</a>. 
Because most letters of the alphabet represent a certain date/time output function, you will have to <strong>escape</strong> each letter that you want to display LITERALLY, for instance, to 
include words like <strong>at</strong>, <strong>on</strong>, or <strong>the</strong> somewhere <strong>inside</strong> the date output. To <strong>escape</strong> a letter put a hash sign 
<strong>#</strong> right before that letter. (Please note that this is different from the original "PHP way" of escaping with backslashes <code>\</code>. The theme needs the hash sign <code>#</code>).
That will tell the theme that you mean the actual letter and not the corresponding PHP date function.<br /><br />
<strong>How to escape literal strings</strong>
<ul><li>on -> <code>#o#n</code></li>
<li>of -> <code>#of</code> &nbsp;&nbsp;(Note how the the lowercase <strong>f</strong> didn't get a <code>#</code>. That's because <strong>f</strong> is one of the letters of the alphabet that does not represent a PHP date function)</li>
<li>at -> <code>#a#t</code></li>
<li>the -> <code>#t#h#e</code></li>
<li>The arrows just illustrate how to change a word to display it literally inside a date function, don't use them</li>
</ul>
<strong>Examples:</strong>
	<ul>
	<li><code>%date('<i>F j, Y, #a#t g:i a</i>')%</code> displays: December 10, 2008, at 5:16 pm <br />
	Note how the letters <strong>a</strong> and <strong>t</strong> of the word <strong>at</strong> are <strong>escaped</strong> with <code>#</code> 
	to display them literally instead of interpreting them as PHP date functions.
	</li>
	<li><code>%date('<i>F j, Y, g:i a</i>')%</code> displays: December 10, 2008, 5:16 pm
	</li>
	<li><code>%date('<i>m.d.y</i>')%</code> displays: 10.12.08
	</li>
	</ul>
<br /><h4>%category%</h4>
Prints the name of the <strong>first</strong> category the post is filed under.
<br /><h4>%category-linked%</h4>
Prints the name of the <strong>first</strong> category the post is filed under and links the name to that category page.
<br /><h4>%categories('delimiter')%</h4>
Prints the names of <strong>all</strong> categories the post is filed under, separated by delimiter.
<br /><strong>Example:</strong> <code>%categories('<i>, </i>')%</code>
<br /><h4>%categories-linked('delimiter')%</h4>
Prints the names of <strong>all</strong> categories the post is filed under, separated by delimiter, and links each name to the respective category page.
<br /><strong>Example:</strong> <code>%categories-linked('<i> | </i>')%</code>
<br /><h4>%tags('before', 'delimiter', 'after')%</h4>
Prints the names of all tags attached to the post, separated by delimiter.
<br /><strong>Example:</strong> <code>%tags('<i>Tags: </i>', '<i>, </i>', '')%</code>
<br /><h4>%tags-linked('before', 'delimiter', 'after')%</h4>
Prints the names of all tags attached to the post, separated by delimiter, and links each name to the respective tag page.
<br /><strong>Example:</strong> <code>%tags-linked('<i>Tagged with: </i>', '<i> - </i>', '<i>. </i>')%</code>
<br /><h4>%comments('No comments', '1 comment', '% comments', 'Comments closed')%</h4>
Prints a link to the comment section of the post. The link text depends on the comment count & status (open/closed). 
<br /><br /><strong>When using this item, provide 4 text strings for the 4 possible comment states:</strong> <ul>
<li>Replace <code>'No Comments'</code> with your link text for posts that have no comments yet</li>
<li>Replace <code>'1 comment'</code> with your text for posts with 1 comment</li>
<li>Replace <code>'% comments'</code> with your text for posts with 2 or more comments. The <code>%</code> (percent) character 
will be replaced with the comment count. Use that character in your own text, too, unless you do not want to display the comment count.</li>
<li>Replace <code>'Comments closed'</code> with your text for posts where comments are closed.</li>
</ul>
<br /><strong>Example:</strong> <code>%comments('<i>Leave your comment</i>', '<i>One comment so far</i>', '<i>% people had their say - chime in!</i>', '<i>Sorry, but comments are closed</i>')%</code>
<br /><h4>%comments-rss('linktext')%</h4>
Prints a link to the RSS feed of the post's comments, with <em>linktext</em> as the link text.
<br /><strong>Example:</strong> <code>%comments-rss('<i>Subscribe to the comments of this post</i>')%</code>
<br /><h4>%trackback%</h4>
Prints the trackback URL of the post, without linking it.
<br /><h4>%trackback-linked('linktext')%</h4>
Prints a link to the trackback URL of the post, with <em>linktext</em> as the link text.
<br /><strong>Example:</strong> <code>%trackback-linked('<i>Trackback this Post</i>')%</code>
<br /><h4>%print('linktext')%</h4>
Prints a link with <em>linktext</em> as the link text, which, when clicked, will start printing the content of the center column of the current page, without header, sidebars and footer.
<br /><strong>Example:</strong> <code>%print('<i>Print this Page</i>')%</code>
<br /><h4>%edit('before', 'linktext', 'after')%</h4>
Prints a direct edit link for the post, IF the current viewer is permitted to edit posts, with <em>linktext</em> as the link text.
<br /><strong>Example:</strong> <code>%edit('<i> - </i>', '<i>Edit This Post</i>', '')%</code>
<br /><h4>%wp-print%</h4>
Prints a link to a print preview page of the post. A configurable alternative to the theme's own basic print function (which prints right away, without preview page).<br />
<?php echo ( function_exists('wp_print') ? 
'Customize the output at the <a title="If this link doesn\'t work, go to \'Settings\' (top right) -> \'Print\'" 
href="options-general.php?page=wp-print/print-options.php">WP-Print Options Page</a>.' : 
'To use this item, you must first install (= upload) and activate the plugin "<a href="http://wordpress.org/extend/plugins/wp-print/">WP-Print</a>"' ); ?>
<br /><h4>%wp-email%</h4>
Prints a link to a form where visitors can e-mail the post to others.<br />
<?php echo ( function_exists('wp_email') ? 
'Customize the output at the <a title="If this link doesn\'t work, click on \'E-Mail\' at the top of the current page, then \'E-Mail Options\'" 
href="admin.php?page=wp-email/email-options.php">WP-Email Options Page</a>.<br />
<strong>Settings:</strong> <ul><li>Change settings in the section "E-Mail Styles" to customize the output of this item</li>
<li>Make other changes as you see fit</li>
<li>Click "Save Changes"</li></ul>' : 
'To use this item, you must first install (= upload) and activate the plugin "<a href="http://wordpress.org/extend/plugins/wp-email/">WP-Email</a>"' ); ?>
<br /><h4>%wp-postviews%</h4>
Prints how many times the post was viewed.<br />
<?php echo ( function_exists('the_views') ? 
'Customize the output at the <a title="If this link doesn\'t work, go to \'Settings\' (top right) -> \'Post Views\'" 
href="options-general.php?page=wp-postviews/postviews-options.php">WP-PostViews Options Page</a>.<br />
<strong>Settings:</strong> <ul><li>Change "Views Template" to customize the output of this item</li>
<li>Make other changes as you see fit</li>
<li>Click "Save Changes"</li></ul>' : 
'To use this item, you must first install (= upload) and activate the plugin "<a href="http://wordpress.org/extend/plugins/wp-postviews/">WP-PostViews</a>"' ); ?>
<br /><h4>%wp-postratings%</h4>
Prints stars or other graphics showing the vote/rating of a post, and lets visitors rate the post.<br />
<?php echo ( function_exists('the_ratings') ? 
'Customize the output at the <a title="If this link doesn\'t work, click on \'Ratings\' at the top of the current page" 
href="admin.php?page=wp-postratings/postratings-templates.php">WP-PostRatings Options Page</a>.<br />
<strong>Settings:</strong> <ul><li>Delete <code>%RATINGS_TEXT%</code> from the bottom of the textarea named "Ratings Vote Text:"</li>
<li>Delete <code>%RATINGS_TEXT%</code> from the bottom of the textarea named "Ratings None:"</li>
<li>Make other changes as you see fit</li>
<li>Click "Save Changes"</li></ul>' : 
'To use this item, you must first install (= upload) and activate the plugin "<a href="http://wordpress.org/extend/plugins/wp-postratings/">WP-PostRatings</a>"' ); ?>
<br /><h4>%sociable%</h4>
Prints little icons, linking the post to social bookmark sites.<br />
<?php echo ( function_exists('sociable_html') ? 
'Customize the output at the <a title="If this link doesn\'t work, go to \'Settings\' (top right) -> \'Sociable\'" 
href="options-general.php?page=Sociable">Sociable Options Page</a>.<br />
<strong>Settings:</strong> <ul><li>"Tagline:" - Will be ignored</li><li>"Position:" - Uncheck all boxes</li><li>"Use CSS:" - Uncheck this</li>
<li>"Open in new window:" - Check or uncheck, will be used</li><li>Click "Save Changes"</li></ul>' : 
'To use this item, you must first install (= upload) and activate the plugin "<a href="http://wordpress.org/extend/plugins/sociable/">Sociable</a>"' ); ?>
    </div>
</div>
<?php } 
#####################################################################
#     TEXT                                                                                                     
#####################################################################
if ($value['type'] == "text") { ?>
<div class="bfa-container">
    <div class="bfa-container-left"><label for="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></label><br />
        <input <?php if ($value['size'] != "") { echo "size=" . $value['size'] . ($value['size'] > 20 ? " style=\"width: 95%;\"" : " "); } ?><?php 
		if (eregi("color", $value['id'])) { ?>class="color" <?php } ?>name="<?php echo $value['id']; ?>" id="<?php 
		echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php 
		if ( get_option( $value['id'] ) !== FALSE) { 
			echo ( $value['editable'] == "yes" ? stripslashes(format_to_edit(get_option( $value['id'] ))) : get_option( $value['id'] ) ); 
		} else { 
			echo ( $value['editable'] == "yes" ? stripslashes(format_to_edit($value['std'])) : $value['std'] ); 
		}
		?>" />
        <br />Default: <strong>
		<?php if ($value['std'] == "") { 
			echo "blank"; 
		} else { 
			echo ( $value['editable'] == "yes" ? stripslashes(format_to_edit($value['std'])) : $value['std'] ); } ?></strong>
    </div>
    <div class="bfa-container-right">
    <?php echo $value['info']; ?>
    </div>
  	<div style="clear:both"></div>  
</div>
<?php } 
#####################################################################
#     WIDGET LIST ITEMS                                                                                                     
#####################################################################
elseif ($value['type'] == "widget-list-items") { 
# needed for multi array options
$current_options = get_option( $value['id']);	
?>
<div class="bfa-container">
<div class="bfa-container-full">
<label for="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></label>
<br />
<br />
<?php echo $value['info']; ?>
<br />
<br />
<table class="bfa-optiontable" border="0" cellspacing="0">
	<thead>
		<tr><td colspan="8">List items and links inside</td></tr>
		</thead>
<tbody>
	<tr><td>Left Margin for whole Item</td><td>Left Border Width for Links</td><td>Left Border Color for Links</td><td>Left Border Hover Color for Links</td><td>Left Padding for Links</td><td>Link Text Weight</td><td>Link Text Color</td><td>Link Text Hover Color</td></tr>
  <tr>
  	<td>
  			<select name="<?php echo $value['id'] . '[li-margin-left]'; ?>" id="<?php echo $value['id'] . '[li-margin-left]'; ?>">
                <?php for ($i = 0; $i <= 20; $i++) { ?>
                <option<?php if ( $current_options['li-margin-left'] == $i) { echo ' selected="selected"'; } elseif ( !isset($current_options['li-margin-left']) AND $i == $value['std']['li-margin-left']) { echo ' selected="selected"'; } ?>><?php echo $i; ?></option>
                <?php } ?>
        </select>
  	</td>
  	<td>
  			<select name="<?php echo $value['id'] . '[link-border-left-width]'; ?>" id="<?php echo $value['id'] . '[link-border-left-width]'; ?>">
                <?php for ($i = 0; $i <= 20; $i++) { ?>
                <option<?php if ( $current_options['link-border-left-width'] == $i) { echo ' selected="selected"'; } elseif ( !isset($current_options['link-border-left-width']) AND $i == $value['std']['link-border-left-width']) { echo ' selected="selected"'; } ?>><?php echo $i; ?></option>
                <?php } ?>
        </select>
  	</td>
   	<td>
        <input size="8" class="color" name="<?php echo $value['id'] . '[link-border-left-color]'; ?>" id="<?php echo $value['id'] . '[link-border-left-color]'; ?>" type="text" value="<?php if ( $current_options['link-border-left-color'] != "") { echo $current_options['link-border-left-color'] ; } else { echo $value['std']['link-border-left-color']; } ?>" />
  	</td>
   	<td>
        <input size="8" class="color" name="<?php echo $value['id'] . '[link-border-left-hover-color]'; ?>" id="<?php echo $value['id'] . '[link-border-left-hover-color]'; ?>" type="text" value="<?php if ( $current_options['link-border-left-hover-color'] != "") { echo $current_options['link-border-left-hover-color'] ; } else { echo $value['std']['link-border-left-hover-color']; } ?>" />
  	</td>
  	<td>
  			<select name="<?php echo $value['id'] . '[link-padding-left]'; ?>" id="<?php echo $value['id'] . '[link-padding-left]'; ?>">
                <?php for ($i = 0; $i <= 20; $i++) { ?>
                <option<?php if ( $current_options['link-padding-left'] == $i) { echo ' selected="selected"'; } elseif ( !isset($current_options['link-padding-left']) AND $i == $value['std']['link-padding-left']) { echo ' selected="selected"'; } ?>><?php echo $i; ?></option>
                <?php } ?>
        </select>
  	</td>
  	<td>
  			<select name="<?php echo $value['id'] . '[link-weight]'; ?>" id="<?php echo $value['id'] . '[link-weight]'; ?>">
                <?php foreach ($font_weight as $option) { ?>
                <option<?php if ( $current_options['link-weight'] == $option) { echo ' selected="selected"'; } elseif ( !isset($current_options['link-weight']) AND $option == $value['std']['link-weight']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
        </select>
  	</td>
   	<td>
        <input size="8" class="color" name="<?php echo $value['id'] . '[link-color]'; ?>" id="<?php echo $value['id'] . '[link-color]'; ?>" type="text" value="<?php if ( $current_options['link-color'] != "") { echo $current_options['link-color'] ; } else { echo $value['std']['link-color']; } ?>" />
  	</td>
   	<td>
        <input size="8" class="color" name="<?php echo $value['id'] . '[link-hover-color]'; ?>" id="<?php echo $value['id'] . '[link-hover-color]'; ?>" type="text" value="<?php if ( $current_options['link-hover-color'] != "") { echo $current_options['link-hover-color'] ; } else { echo $value['std']['link-hover-color']; } ?>" />
  	</td>
  </tr>
</tbody>
</table>	
<div style="clear:both"></div>
</div>
</div>
<?php } 
#####################################################################
#     DISPLAY ON                                                                                                     
#####################################################################
elseif ($value['type'] == "displayon") { 
# special for checkboxes, if  checkbox is unchecked then there won't be any key/value  pair for that checkbox in the options table.
if (get_option( $value['id'] ) === FALSE) { $current_options = $value['std']; } else { $current_options = get_option( $value['id'] ); }

echo '<div class="bfa-container">
<div class="bfa-container-left"><label for="' . $value['name'] . '">' . $value['name'] . '</label><br /><br />
<table align="right" class="bfa-optiontable" border="0" cellspacing="0" cellpadding="2">
<tbody><tr><td>
<input type="checkbox" name="' . $value['id'] . '[homepage]" ' . ($current_options['homepage'] ? 'checked="checked"' : '' ) . ' /> Homepage<br /> 
<input type="checkbox" name="' . $value['id'] . '[frontpage]" ' . ($current_options['frontpage'] ? 'checked="checked"' : '' ) . ' /> Front Page (*)<br /> 
<input type="checkbox" name="' . $value['id'] . '[single]" ' . ($current_options['single'] ? 'checked="checked"' : '' ) . ' /> Single Posts<br /> 
<input type="checkbox" name="' . $value['id'] . '[page]" ' . ($current_options['page'] ? 'checked="checked"' : '' ) . ' /> "Page" pages<br /> 
</td><td>
<input type="checkbox" name="' . $value['id'] . '[category]" ' . ($current_options['category'] ? 'checked="checked"' : '' ) . ' /> Category Pages<br /> 
<input type="checkbox" name="' . $value['id'] . '[date]" ' . ($current_options['date'] ? 'checked="checked"' : '' ) . ' /> Archive Pages<br /> 
<input type="checkbox" name="' . $value['id'] . '[tag]" ' . ($current_options['tag'] ? 'checked="checked"' : '' ) . ' /> Tag Pages<br /> 
<input type="checkbox" name="' . $value['id'] . '[search]" ' . ($current_options['search'] ? 'checked="checked"' : '' ) . ' /> Search Results<br /> 
</td><td valign="top">
<input type="checkbox" name="' . $value['id'] . '[author]" ' . ($current_options['author'] ? 'checked="checked"' : '' ) . ' /> Author Pages<br /> 
<input type="checkbox" name="' . $value['id'] . '[404]" ' . ($current_options['404'] ? 'checked="checked"' : '' ) . ' /> "Not Found"<br /> 
<input type="checkbox" name="' . $value['id'] . '[attachment]" ' . ($current_options['attachment'] ? 'checked="checked"' : '' ) . ' /> Attachments<br /> 
<input type="hidden" name="' . $value['id'] . '[check-if-saved-once]" value="saved">
</td></tr></tbody>
</table>
</div><div class="bfa-container-right">' . $value['info'] . '
</div><div style="clear:both"></div></div>';
} 
#####################################################################
#     TEXTAREA                                                                                                    
#####################################################################
elseif ($value['type'] == "textarea") { ?>
<div class="bfa-container">
    <div class="bfa-container-left"><label for="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></label><br />
        <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="35" style="width: 95%" rows="6"><?php if ( get_option( $value['id'] ) !== FALSE) { echo ( $value['editable'] == "yes" ? stripslashes(format_to_edit(get_option( $value['id'] ))) : get_option( $value['id'] ) ) ; } else { echo ( $value['editable'] == "yes" ? stripslashes(format_to_edit($value['std'])) : $value['std'] ); } ?></textarea>
        <br />Default: <strong><?php if ($value['std'] == "") { echo "blank"; } else { echo "<br /><code>" . ( $value['editable'] == "yes" ? str_replace("\n", "<br />", htmlentities($value['std'], ENT_QUOTES)) : str_replace("\n", "<br />", $value['std']) ) . "</code>"; } ?></strong>
    </div>
    <div class="bfa-container-right">
    <?php echo $value['info']; ?>
    </div>
   	<div style="clear:both"></div> 
</div>
<?php } 
#####################################################################
#     POSTINFOS                                                                                                     
#####################################################################
elseif ($value['type'] == "postinfos") { ?>
<div class="bfa-container">
    <div class="bfa-container-full"><label for="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></label><br />
	    <?php echo $value['info']; ?><br />
        <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="110" rows="3"><?php if ( get_option( $value['id'] ) !== FALSE) { echo format_to_edit(get_option( $value['id'] )); } else { echo format_to_edit($value['std']); } ?></textarea>
        <br />Default: <strong><?php if ($value['std'] == "") { echo "blank"; } else { echo format_to_edit($value['std']); } ?></strong>
    </div>
</div>
<?php } 
#####################################################################
#     INFO                                                                                                     
#####################################################################
elseif ($value['type'] == "info") { ?>
<div class="bfa-container">
    <div class="bfa-container-full"><label for="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></label><br />
	    <?php echo $value['info']; ?>
	</div>
</div>
<?php } 
#####################################################################
#     SELECT                                                                                                     
#####################################################################
elseif ($value['type'] == "select") { ?>
<div class="bfa-container">
		<div class="bfa-container-left"><label for="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></label><br />
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ( get_option( $value['id']) === FALSE AND $option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
        </select>
        <br />Default: <strong><?php if ($value['std'] == "") { echo "blank"; } else { echo $value['std']; } ?></strong>
     </div>
     <div class="bfa-container-right">
        <?php echo $value['info']; ?>
     </div>
     	<div style="clear:both"></div>
</div>
<?php
}

	// all categories except first category "start-here" get closing form tags and buttons
	if ( $value['category'] != "start-here" AND $value['lastoption'] == "yes" ) {   ?>
		<div class="bfa-container">	
		<p class="submit">
		<input class="save-tab" name="save" type="submit" value="Save changes" />    
		<input type="hidden" name="action" value="save" />
		<input type="hidden" name="category" value="<?php echo $value['category']; ?>" />
		<br /><strong>Save settings of current page</strong>
		</p><br />
		</form>
		<form method="post">
		<p class="submit">
		<input class="reset-tab" name="reset" type="submit" value="Reset settings" />
		<input type="hidden" name="action" value="reset" />
		<input type="hidden" name="category" value="<?php echo $value['category']; ?>" />
		<br /><strong>Reset settings of current page</strong>
		</p>
		</form>
		</div>
	<?php }

} // options loop END
?>
</div> <!-- closing the last tab content div //-->
<script type="text/javascript">
var myflowers=new ddtabcontent("bfaoptiontabs") //enter ID of Tab Container
myflowers.setpersist(true) //toogle persistence of the tabs' state
myflowers.setselectedClassTarget("link") //"link" or "linkparent"
myflowers.init()
</script>
<!-- "reset all" button -->
<br /><br />
			<form method="post">
			<p class="submit">
			<input class="reset-all" name="reset" type="submit" value="Reset ALL theme options" onClick="return confirmSubmit()"/>
			<input type="hidden" name="action" value="reset" />
			<input type="hidden" name="category" value="reset-all" /><br />
			<span style="color: #c00;"><strong>WARNING</strong> - this will reset ALL 200+ theme options!</span><br />Clicking this button will...<br />
			(1) remove all Atahualpa options from the WordPress options table<br />
			(2) reset all Atahualpa options to the default values<br />
			
			</p>

			</form>
</div><!-- / class=wrap -->
<?php
}
add_action('admin_menu', 'mytheme_add_admin'); 
?>
<?php
function footer_output($footer_content) {
$footer_content .= '<br />Powered by <a href="http://www.wordpress.org/">WordPress</a> &middot; <a href="http://wordpress.bytesforall.com/">Atahualpa Theme</a> by <a href="http://www.bytesforall.com/">BytesForAll</a>';
return $footer_content;
}
?>
<?php 
function special_char_import($string) {
$special_placeholders = array("<b>", "</b>", "<i>", "</i>", "<br>", "<raquo>", "<laquo>", "<rsaquo>", "<lsaquo>", "<rarr>", "<larr>", "<s>");
$html_replacement = array("<strong>", "</strong>", "<em>", "</em>", "<br />", "&raquo;", "&laquo;", "&rsaquo;", "&lsaquo;", "&rarr;", "&larr;", "&nbsp;"); 
$string = str_replace($special_placeholders, $html_replacement, $string);
return $string;
}
?>
<?php
// new comment template for WP 2.7+, legacy template for old WP 2.6 and older
if (!function_exists('paged_comments')) {
add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) 	$file = TEMPLATEPATH . '/legacy.comments.php';
	return $file;
}
}
?>
<?php
// see if several pages exist to avoid empty next/prev navigation on multi post pages
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1) ? TRUE : FALSE;
}
?>