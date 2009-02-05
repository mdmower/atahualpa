<?php
// different options text for WP and WPMU, because image upload works differently

$header_image_text_wp = "To add your own header image(s), upload one or several images with any file names 
<code>anything.[jpg|gif|png]</code> i.e. <code>hfk7wdfw8.gif</code>, <code>IMAGE_1475.jpg</code>, <code>bla.png</code> 
to /wp-content/themes/[theme-name]/images/header/ through FTP. You will need a \"FTP Client\" software such as 
<a href=\"http://filezilla-project.org/download.php\">Filezilla</a> (free), the Firefox extension 
<a href=\"https://addons.mozilla.org/de/firefox/addon/684\">FireFTP</a> (free) or 
<a href=\"http://www.smartftp.com/download/\">SmartFTP</a> ($36.95).";

$header_image_text_wpmu = "To upload your own header images, you'll need to prepare your header image(s) 
on your harddrive first. Rename your header images to <code>atahualpa_header_X.[jpg|gif|png|bmp]</code> 
(Example: <code>atahualpa_header_1.jpg</code>, <code>atahualpa_header_3.png</code>, 
<code>atahualpa_header_182.gif</code>) and then, upload them to your WordPress site through the WordPress Editor</strong>. 
<br /><br />There may be no \"upload\" tab in the admin area though. In that case, start as if you were going to 
add an image to a post: Go to Admin -> Manage -> Posts, and click on the title of an existing post to open the editor. 
Click on the \"Add Media\" link, and in the next window click on the \"Choose files to upload\" button. 
That will open a window on your local computer where you can find and select the header image 
(which you've already renamed as described before) on your local harddrive. Select \"Full Size\" and, 
do NOT click on \"Insert into Post\" but click on \"Save all changes\" instead. Now reload your Homepage 
and the new header image should appear. If you want more than one header image (to have them rotate) simply 
repeat all these steps. The theme will autmatically recognize all images that are named 
<code>atahualpa_header_X.[jpg|png|gif]</code>. If there's only one image, then it'll be your single, 
\"static\" header image. If there's more than one image, then the theme will rotate them with every pageview.";

$logo_icon_text_wp = "To show your own graphic, upload an image to <strong>/wp-content/themes/atahualpa3/images/</strong> 
and put the file name of the image into this field. <br /><br /><strong>Example:</strong><br /><code>myownlogo.gif</code>
<br /><br />Make sure you have <strong>no spaces</strong> or exotic characters in the image file name. 
Your Windows or Mac Computer may display them but the hosting server probably won't. The image file can 
have a .gif, .jpg, .jpeg, .png or .bmp extension.";

$logo_icon_text_wpmu = "To show your own graphic, upload an image through the WordPress Editor. 
There may be no \"upload\" tab in your WordPress version. To upload the image start as if you were going to 
add an image to a post: Go to Admin -> Manage -> Posts, and click on the title of an existing post to open 
the editor. Click on the \"Add Media\" link, and in the next window click on the \"Choose files to upload\" button. 
That will open a window on your local computer where you can select the image on your local harddrive. 
After you've selected the image, choose \"Full Size\" and, instead of clicking on \"Insert into Post\", 
click on \"Save all changes\". Then put the file name of your image into this field, i.e. <code>my-new-logo.jpg</code> 
and click \"Save changes\" at the bottom fo this page. Now reload your Homepage and your new logo should appear 
instead of the default one.<br /><br />Make sure you have no spaces or exotic characters in the image file name. 
Your Windows or Mac Computer may display them but the hosting server probably won't. The image file can have 
a .gif, .jpg, .jpeg, .png or .bmp extension.";

if (defined('ABSPATH')) { if (file_exists(ABSPATH."/wpmu-settings.php")) {
$header_image_text = $header_image_text_wpmu; 
$logo_icon_text = $logo_icon_text_wpmu; } }
else {$header_image_text = $header_image_text_wp; 
$logo_icon_text = $logo_icon_text_wp;}

// different options text for different WP versions
// WP 2.7+
if( function_exists('wp_list_comments') ) {
$go_to_pages = "go to Site Admin -> Pages -> Edit";
$go_to_cats = "go to Site Admin -> Posts -> Categories";
$path_to_widgets = "Appearance";
} else {
// WP 2.6 and older
$go_to_pages = "go to Site Admin -> Manage -> Pages";
$go_to_cats = "go to Site Admin -> Manage -> Categories";
$path_to_widgets = "Design (\"Presentation\" in WP 2.3 and older)";
}

// array of theme options starts here. Set the category of the first option of every new option category to "category_name", except for the very first option, which will be hard coded in functions.php
$themename = "Atahualpa";
$shortname = "bfa_ata";
$options1 = array(

    array(    "name" => "Thank you for using Atahualpa",
    	    "category" => "start-here",
            "id" => $shortname."_start_here",
            "type" => "info",
			"lastoption" => "yes", 
            "info" => "<br />Atahualpa is a solid theme that works on all popular browsers and screen sizes.<br />
			Discuss the Atahualpa theme at the <a href=\"http://forum.bytesforall.com/\">Bytes For All Forum</a>.<br />
			<h3>Crafting a theme like this...</h3>...takes a <strong>lot</strong> of time: Please donate, no matter 
			how small the amount may be.<br />See the \"Donate\" links at <a href=\"http://wordpress.bytesforall.com/\">
			wordpress.bytesforall.com</a> and <a href=\"http://forum.bytesforall.com/\">forum.bytesforall.com</a><br /><br />
			Additional ways to support the author: Answer other's questions about the theme at the 
			<a href=\"http://forum.bytesforall.com/\">BFA Forum</a><br />and the <a href=\"http://wordpress.org/search/atahualpa?forums=1\">
			WordPress.org Forum</a>, and vote for Atahualpa over at <a href=\"http://wordpress.org/extend/themes/atahualpa\">
			WordPress Themes</a>. <br />
			<h3>Caching the theme</h3>Due to its many features Atahualpa may be slightly slower than a theme without options. 
			Like any other theme<br />Atahualpa will be fast with a caching plugin such as <a href=\"http://mnm.uib.es/gallir/wp-cache-2/\">
			WP Cache 2</a> (easy installation) or <a href=\"http://wordpress.org/extend/plugins/wp-super-cache/\">WP Super Cache</a>.<br />
			<h3>Customizing with CSS</h3>For greater flexibility many site elements have to be styled with CSS rather than 
			color pickers and select menus. But the theme takes care of the layout and cross-browser related issues and leaves 
			only the fun part of CSS for you: borders, colors, fonts, padding (inner spacing) and margin (outer spacing).
			<h3>CSS usage instructions</h3><ul><li>The theme's CSS is spread over two files: header.php and style.css. style.css contains
			the static CSS (that does not change) and header.php contains the dynamic CSS. The rules in header.php will overwrite any identical
			rule that may appear in style.css. Keep this CSS structure in mind when you want to manually edit the CSS styles of the theme.</li><li>When customizing CSS via the theme options, you'll only be editing what's between the brackets, the part in red: 
			<code>selector {<i>property:value; property2:value2;</i>}</code></li><li>Finish every property:value pair with 
			a semicolon <code>;</code> unless the descripton, the example or the default settings indicate that a semicolon 
			<code>;</code> should not be added. </li><li>To add completely new styles (incl. selectors &amp; brackets), 
			add them as \"CSS insert\", see menu tab <strong>HTML/CSS Inserts</strong></li><li>More about CSS at the 
			<a href=\"http://www.w3schools.com/css/css_syntax.asp\">W3 Schools</a></li></ul>
			<h3>Plugins</h3>Enhance your site with <a href=\"http://wordpress.org/extend/plugins/\">plugins</a>. 
			Atahualpa should work with most plugins. It has plug &amp; play support for these: 
			<a href=\"http://txfx.net/code/wordpress/subscribe-to-comments/\">Subscribe to Comments</a>, 
			<a href=\"http://www.keyvan.net/code/paged-comments/\">Paged Comments</a>, 
			<a href=\"http://aboutme.lmbbox.com/lmbbox-plugins/lmbbox-comment-quicktags/\">LMB Box Comment Quicktags</a>, 
			<a href=\"http://lesterchan.net/portfolio/programming/php/\">WP-PageNavi</a>, 
			<a href=\"http://lesterchan.net/portfolio/programming/php/\">WP-Email</a>, 
			<a href=\"http://lesterchan.net/portfolio/programming/php/\">WP-Print</a>, 
			<a href=\"http://lesterchan.net/portfolio/programming/php/\">WP-PostViews</a> and 
			<a href=\"http://wordpress.org/extend/plugins/sociable/\">Sociable</a>. Tested with 
			<a href=\"http://wordpress.org/extend/plugins/wp-super-cache/\">WP Super Cache</a>, 
			<a href=\"http://mnm.uib.es/gallir/wp-cache-2/\">WP Cache 2</a> and 
			<a href=\"http://wordpress.org/extend/plugins/wp-syntax/\">WP-Syntax</a>. 
			Atahualpa automatically recognizes 12 popular SEO plugins (incl. All-in-one-SEO and Headspace2) and disables its 
			own SEO features to avoid conflicts.<br />
			"),

// New category: seo

    array(    "name" => "Use Bytes For All SEO options?",
    	    "category" => "seo",
			"switch" => "yes",
            "id" => $shortname."_use_bfa_seo",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "<strong>Leave this at \"No\" if you're using ANY SEO plugin</strong> such as \"All-in-one-SEO\", 
			or any plugin that deals with meta tags in some way. If both a SEO plugin and the theme's SEO functions are 
			activated, the meta tags of your site may get messed up, which might affect your search engine rankings. 
			<br /><br />If you leave this at \"No\", the next SEO options (except the last one, \"Nofollow RSS...\") 
			will become obsolete, you may just skip them. <br /><br /><em>Note: Even if you set this to \"Yes\", the 
			SEO functions listed below (except \"Nofollow RSS...\") will NOT be activated IF the theme recognizes that 
			a SEO plugin is activated.</em>"),

    array(    "name" => "Homepage Meta Description",
    	    "category" => "seo",
            "id" => $shortname."_homepage_meta_description",
            "std" => "",
            "type" => "textarea",
			"escape" => "yes", 
            "info" => "Type 1-3 sentences, about 20-30 words total. Will be used as Meta Description for (only) the 
			homepage. If left blank, no Meta Description will be added to the homepage.<br /><br />HTML: No<br />
			Single and double quotes: Yes"),    

    array(    "name" => "Homepage Meta Keywords",
    	    "category" => "seo",
            "id" => $shortname."_homepage_meta_keywords",
            "std" => "",
            "type" => "textarea",
			"escape" => "yes", 
            "info" => "Type 5-30 words or phrases, separated by comma. Will be used as the Meta Keywords for (only) 
			the homepage. If left blank, no Meta Keywords will be added to the homepage.<br /><br />HTML: No<br />
			Single and double quotes: Technically, Yes, but search engines might object to it. Probably better to avoid 
			quotes here."),

    array(    "name" => "Meta Title Tag format",
    	    "category" => "seo",
            "id" => $shortname."_add_blogtitle",
            "type" => "select",
            "std" => "Page Title - Blog Title",
            "options" => array("Page Title - Blog Title", "Blog Title - Page Title", "Page Title"),
            "info" => "Show the blog title in front of or after the page title, in the meta title tag of every page? 
			Or, show only the page title?"),

    array(    "name" => "Meta Title Tag Separator",
    	    "category" => "seo",
            "id" => $shortname."_title_separator_code",
            "type" => "select",
            "std" => "1",
            "options" => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13"),
            "info" => "If you chose to include the blog title in the meta title (the option above), choose here what 
			to put <strong>between</strong> the page and the blog title (or vice versa):<br /><br /> 1<code> &#171; 
			</code> &nbsp;  &nbsp;  2<code> &#187; </code> &nbsp;  &nbsp;  3<code> &#58; </code> &nbsp;  &nbsp;  
			4<code>&#58; </code> &nbsp;  &nbsp;  5<code> &#62; </code> &nbsp;  &nbsp;  6<code> &#60; </code> &nbsp;  
			&nbsp;  7<code> &#45; </code><br /><br />8<code> &#8249; </code> &nbsp;  &nbsp;  9<code> &#8250; </code> 
			&nbsp;  &nbsp;  10<code> &#8226; </code> &nbsp; &nbsp;  11<code> &#183; </code> &nbsp; &nbsp;  12<code> 
			&#151; </code> &nbsp; &nbsp;  13<code> &#124;&nbsp;</code>"),
 
    array(    "name" => "Noindex Date Archive Pages?",
    	    "category" => "seo",
            "id" => $shortname."_archive_noindex",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "Include meta tag \"noindex, follow\" into date based archive pages? The purpose is to keep 
			search engines from spidering duplicate content from your site."),

    array(    "name" => "Noindex Category pages?",
    	    "category" => "seo",
            "id" => $shortname."_cat_noindex",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "Include meta tag \"noindex, follow\" into category pages? Same purpose as above."),

    array(    "name" => "Noindex Tag pages?",
    	    "category" => "seo",
            "id" => $shortname."_tag_noindex",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "Include meta tag \"noindex, follow\" into tag pages? Same purpose as above."),

    array(    "name" => "Nofollow RSS, trackback & admin links?",
    	    "category" => "seo",
            "id" => $shortname."_nofollow",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
			"lastoption" => "yes", 
            "info" => "Make RSS, trackback & admin links \"nofollow\"? Same purpose as above."),

// New category: body-font-links

    array(    "name" => "Body Style",
    	    "category" => "body-font-links",
			"switch" => "yes",
            "id" => $shortname."_body_style",
            "std" => "font-family: tahoma, arial, sans-serif;\nfont-size: 0.8em;\ncolor: #000000;\nbackground: #ffffff;",
            "type" => "textarea",
            "info" => "The styles you set here will apply to everything that doesn't get its own style. <br /><br />
			<strong>Examples:</strong> <br /><br />Setting a background image for the body:<br /><code>background: 
			url(/wp-content/themes/atahualpa3/images/backgr.gif) repeat top left;</code><br />To use your own image upload it to <code>
			/wp-content/themes/[theme-name]/images/</code><br /><br />To put space above and below the layout:<br />
			<code>padding-top: 20px; padding-bottom: 20px;</code><br /><br />Set padding here, instead of margin on the 
			layout container (see tab \"Layout\") because that won't work for the bottom, in Internet Explorer."),
			
    array(    "name" => "Link Default Color",
    	    "category" => "body-font-links",
            "id" => $shortname."_link_color",
            "std" => "666666",
            "type" => "text",
            "info" => "All hex color codes."),

    array(    "name" => "Link Hover Color",
    	    "category" => "body-font-links",
            "id" => $shortname."_link_hover_color",
            "std" => "cc0000",
            "type" => "text",
            "info" => "Color of links when \"hovering\" over them with the mouse pointer. All hex color codes."),

    array(    "name" => "Link Default Decoration",
    	    "category" => "body-font-links",
            "id" => $shortname."_link_default_decoration",
            "type" => "select",
            "std" => "none",
            "options" => array("none", "underline"),
            "info" => "Underline links or not, in their default state?"),

    array(    "name" => "Link Hover Decoration",
    	    "category" => "body-font-links",
            "id" => $shortname."_link_hover_decoration",
            "type" => "select",
            "std" => "underline",
            "options" => array("underline", "none"),
            "info" => "When the mouse pointer hovers over a link, underline it or not?"),        

    array(    "name" => "Link Text Bold or Not",
    	    "category" => "body-font-links",
            "id" => $shortname."_link_weight",
            "type" => "select",
            "std" => "bold",
            "options" => array("bold", "normal"),
			"lastoption" => "yes", 
            "info" => "Make link text bold or not?"),

// New category: layout

    array(    "name" => "Layout WIDTH and type (FLUID or FIXED)",
    	    "category" => "layout",
			"switch" => "yes",
            "id" => $shortname."_layout_width",
            "std" => "99%",
            "type" => "text",
			"size" => "7",
            "info" => "This setting must contain either <code>%</code> (percent) or <code>px</code> after the number.
			<br /><br /><strong>Examples</strong><ul><li><code>990px</code> Fixed width of 990 pixels</li><li><code>92%</code> 
			Fluid width of 92%</li><li><code>100%</code> Fluid width spanning the whole browser viewport</li></ul>"),

    array(    "name" => "Layout MIN width",
    	    "category" => "layout",
            "id" => $shortname."_layout_min_width",
            "std" => "",
            "type" => "text",
			"size" => "5",
            "info" => "OPTIONAL, and for FLUID layouts only: You may set a MINIMUM width (in pixels) for fluid layouts, 
			to limit the resizing behaviour.<br /><br /><strong>Example:</strong> <code>770</code>"),

    array(    "name" => "Layout MAX width",
    	    "category" => "layout",
            "id" => $shortname."_layout_max_width",
            "std" => "",
            "type" => "text",
			"size" => "5",
            "info" => "OPTIONAL, and for FLUID layouts only: You may set a MAXIMUM width (in pixels) for fluid layouts, 
			to limit the resizing behaviour.<br /><br /><strong>Example:</strong> <code>1250</code>"),

	array(    "name" => "Layout Container Style",
    	    "category" => "layout",
            "id" => $shortname."_layout_style",
            "std" => "padding: 0;",
            "type" => "textarea",
            "info" => "Style the layout container here. The layout container holds the whole page including header, 
			sidebars, center column and footer. <ul><li>Don't use <code>margin</code> here. margin-left and margin-right 
			are needed to center the layout container. There's also no real need for left/right margin. You can get 
			space on the left and right of the layout with a layout-width such as 98%. And instead of <code>margin-top</code> 
			and <code>margin-bottom</code> use padding on the body (see menu tab \"Body, Text & Links\")</li>
			<li>Left/Right padding must be set separately in the next option. It will be ignored (set to 0) here.</li></ul>
			<strong>Example:</strong><br /><br /><code>border: solid 2px #cccccc;<br />padding: 10px;</code> 
			(This effectively only affects top/bottom padding)<br /><code>background: #ffffff;<br />-moz-border-radius: 
			10px;<br />-khtml-border-radius: 10px;<br />-webkit-border-radius: 10px;<br />border-radius: 10px;</code><br />
			<br />NOTE: The rounded corners won't be round in Internet Explorer."),

	array(    "name" => "Layout Container Padding Left/Right",
    	    "category" => "layout",
            "id" => $shortname."_layout_style_leftright_padding",
            "std" => "0",
            "type" => "text",
			"size" => "4",
			"lastoption" => "yes", 
            "info" => "If you want left/right padding on the layout container, put the pixel value here. 
			The Theme needs this as a separate style, in order to include it in the min/max width calculation. 
			<strong>Example:</strong> <code>20</code>"),

// New category: favicon

	array(    "name" => "Favicon",
    	    "category" => "favicon",
			"switch" => "yes",
            "id" => $shortname."_favicon_file",
            "std" => "20-favicon.ico",
            "type" => "text",
			"size" => "30",
			"lastoption" => "yes", 
            "info" =>  "<img src=\"" . $stylesheet_directory . "/options/images/favicon-locations.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Put the file name of the favicon here, i.e. 
			<code>fff-sport_soccer.ico</code>. To use your own graphic, upload a <code>your-file-name.ico</code> 
			to <strong>/atahualpa3/images/favicon/</strong><br /><br />Leave blank to show no favicon.<br /><br />
			<em>If the icon doesn't show: In some browsers such as IE6 you might have to clear cache and history 
			and restart the browser</em><br /><br /><em>1-favicon.ico - 44-favicon.ico are available as big .png 
			files (up to 128x128) at <a href=\"http://www.icon-king.com/projects/nuvola/\">Nuvola Icon Set</a> 
			if you want to create a matching logo.</em><br /><br /><em>NOTE: If you create your own favicon: 
			Simply renaming a .gif, .png or jpg file won't work in Internet Explorer. <code>.ico</code> is an 
			actual file format. Create a 32 bit .png (optional: with transparent background) and a size of 16x16 
			pixels and convert it into an <code>.ico</code> file with a software such as 
			<a href=\"http://www.towofu.net/soft-e/\">@Icon Sushi</a></em>" . 
			"<img src=\"" . $stylesheet_directory . "/options/images/favicons.gif\" style=\"display: block; margin: 10px;\">"),		

// New category: header

    array(    "name" => "Configure Header Area",
    	    "category" => "header",
			"switch" => "yes",
            "id" => $shortname."_configure_header",
            "type" => "text",
			"size" => "30",
            "std" => "%pages %logo %bar1 %image %bar2",
            "info" => "Choose from 6 header items to arrange a custom header area:<ul><li><code>%pages</code> - 
			The horizontal drop down menu bar for \"Page\" pages</li><li><code>%cats</code> - The horizontal drop 
			down menu bar for categories</li><li><code>%logo</code> - The logo area, including the logo icon, 
			the blog title & description, the search box and the RSS/Email icons</li><li><code>%image</code> - 
			The rotating (or static) header image with the (optional) opacity overlay left & right and an 
			(optional) overlayed blog title & blog tagline</li><li><code>%bar1</code> - A horizontal bar, to be 
			used as decoration on top, bottom of between header items. Can be used multiple times.</li>
			<li><code>%bar2</code> - A second horizontal bar, that can be styled differently. Can be used 
			multiple times.</li></ul>You can style and configure these header items individually further down on 
			this page, and on the menu tabs \"Page Menu Bar\" and \"Category Menu Bar\". <br /><br />This section 
			here is just for the overall configuration of the header area.<br /><br />List the header items you 
			want to display, in the order you want to display them.<br /><br />
			Examples:<ul><li><code>%image %bar1 %logo %bar1 %pages</code></li><li><code>%pages %image %cats</code></li>
			<li><code>%bar1 %logo %cats %bar2 %pages %bar1</code></li>"),
		
	array(    "name" => "Logo Area: Styling",
    	    "category" => "header",
            "id" => $shortname."_logoarea_style",
            "std" => "",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/logo-area.jpg\" style=\"float: right; 
			margin: 0 0 10px 10px;\">" . "Style the header's logo area. The logo area is the container that holds 
			the logo / logo icon, the blog title, the blog tagline, the search box and the RSS/Email icons. 
			The height of the logo area will be determined by its content. If you want more height, set the height here. 
			You can set the height, borders and the background. Avoid margin and padding for this container - it's a table.
			<br /><br /><strong>Example:</strong><br /><code>height: 150px;<br />background: #eeeeee;<br />
			border: solid 1px #000000;</code>"),

    array(    "name" => "Show Logo Image?",
    	    "category" => "header",
            "id" => $shortname."_logo",
            "type" => "text",
            "std" => "logo.gif",
            "info" => "Show a logo in the logo area? Leave blank to show no logo. To test this, put <code>huge-logo.gif</code> 
			here and set both \"Show Blog Title\" and \"Show Blog Tagline\" to \"No\" below. <br /><br />" . $logo_icon_text),

	array(    "name" => "Logo Image: Styling",
    	    "category" => "header",
            "id" => $shortname."_logo_style",
            "std" => "margin: 0 10px 0 0;",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/logo-style.gif\" style=\"float: right; 
			margin: 0 0 10px 10px;\">" . "Style the logo here, i.e. give it a border or move it around by applying margins.
			<br /><br /><strong>Example:</strong><br /><br /><code>margin: 30px 30px 30px 30px;</code>"),

    array(    "name" => "Show Blog Title?",
    	    "category" => "header",
            "id" => $shortname."_blog_title_show",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "You can remove the blog title, i.e. if you want to have just a (bigger) graphical logo instead 
			of a small logo icon plus the blog title in HTML. If you set this to \"No\" you'll probably want to remove 
			the Blog Tagline as well (see below)"),
			
    array(    "name" => "Blog Title",
    	    "category" => "header",
            "id" => $shortname."_blog_title_style",
            "std" => "margin: 0;\npadding:0;\nletter-spacing:-1px;\nline-height: 1.0em;\n
			font-family: tahoma, arial, sans-serif;\nfont-size: 240%;",
            "type" => "textarea",
            "info" => "Style the blog title font except the color and font-weight (= next options)."),

    array(    "name" => "Blog Title: Font Weight",
    	    "category" => "header",
            "id" => $shortname."_blog_title_weight",
            "type" => "select",
            "std" => "bold",
            "options" => array("bold", "normal"),
            "info" => "Make blog title bold or not."),
			
    array(    "name" => "Blog Title Color",
    	    "category" => "header",
            "id" => $shortname."_blog_title_color",
            "std" => "666666",
            "type" => "text",
            "info" => "The blog title default color."),
			
    array(    "name" => "Blog Title Color: Hover",
    	    "category" => "header",
            "id" => $shortname."_blog_title_color_hover",
            "std" => "000000",
            "type" => "text",
            "info" => "The blog title hover color."),

    array(    "name" => "Show Blog Tagline?",
    	    "category" => "header",
            "id" => $shortname."_blog_tagline_show",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "You can remove the blog tagline here. The blog tagline is the short blog description under 
			the blog title. It can be set at Settings -> General -> Tagline."),
			
    array(    "name" => "Blog Tagline",
    	    "category" => "header",
            "id" => $shortname."_blog_tagline_style",
            "std" => "margin: 0;\npadding: 0;\nfont-size:1.2em;\nfont-weight: bold;\ncolor: #666666;",
            "type" => "textarea",
            "info" => "Style the blog tagline."),
			
    array(    "name" => "Show search box?",
    	    "category" => "header",
            "id" => $shortname."_show_search_box",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "You can remove the search box from the header here.<br /><br /><em>To put a search box into 
			one of the sidebars, go to Site Admin -> " . $path_to_widgets . " -> Widgets, and add the \"Search\" 
			widget to one of the sidebars.</em>"),

	array(    "name" => "Search box",
    	    "category" => "header",
            "id" => $shortname."_searchbox_style",
            "std" => "border-top: 1px dashed #ccc;\nborder-right: 1px dashed #ccc;\nborder-bottom: 0;\n
			border-left: 1px dashed #ccc;\nwidth: 200px;\nmargin: 0;\npadding: 0;",
            "type" => "textarea",
            "info" => "Style the searchbox in the header."),

	array(    "name" => "Text in header search box",
    	    "category" => "header",
            "id" => $shortname."_searchbox_text",
            "std" => "",
            "type" => "text",
			"size" => "30", 
            "info" => "Show pre-filled text in the header search box, such as <code>Type + Enter to search</code> ?"),		

    array(    "name" => "Horizontal Bar 1: Styling",
    	    "category" => "header",
            "id" => $shortname."_horbar1",
            "std" => "height: 5px;\nbackground: #ffffff;\nborder-top: dashed 1px #cccccc;",
            "type" => "textarea",
            "info" => "2 (empty) horizontal bars are available, both of which you can style differently and use once or 
			multiple times as additional styling elements for the header area. These bars will span the whole layout width. 
			You can style their background color, height and all 4 borders (top, right, bottom, left)."),

    array(    "name" => "Horizontal Bar 2: Styling",
    	    "category" => "header",
            "id" => $shortname."_horbar2",
            "std" => "height: 5px;\nbackground: #ffffff;\nborder-bottom: dashed 1px #cccccc;",
            "type" => "textarea",
			"lastoption" => "yes", 
            "info" => "Style the 2nd horizontal bar here. You can use each one of these bars multiple times (or not at all)."),
			
// New category: header-image

    array(    "name" => "Header Images",
    	    "category" => "header-image",
			"switch" => "yes",
            "id" => $shortname."_header_image_info",
            "type" => "info",
            "info" => "<br />All header images are located in /[theme-name]/images/header. All images in that directory will 
			be rotated. If you don't want rotating header images, leave only one image in that directory. <ul><li>If you 
			chose a fixed width layout, the image(s) should be as wide as your layout width.</li><li>If you chose a fluid layout, 
			the images should be as wide as your \"max width\" setting.</li><li>If you chose no \"max-width\" setting, your 
			images should be as wide as the widest screen resolution (of your visitors) you want to cater for. 1280 pixels is 
			common today, so the images should be that wide or wider. The next common screen widths are 1440, 1600, 1680 and 
			1920 pixels. </li></ul>" . $header_image_text),
			
    array(    "name" => "Make header image clickable?",
    	    "category" => "header-image",
            "id" => $shortname."_header_image_clickable",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "Select \"Yes\" to make the header image clickable and to link it to the homepage."),

    array(    "name" => "Header Image: Height",
    	    "category" => "header-image",
            "id" => $shortname."_headerimage_height",
            "std" => "150",
            "type" => "text",
			"size" => "5",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/header-image-height.jpg\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Visible height of the header image(s), <strong>in pixels</strong>. 
			Change this value to show a taller or less tall area of the header image(s). <br /><br /><em>This value 
			does not need to match the actual height of your header image(s). In fact, all your header images could 
			have different (actual) heights. Only the top XXX (= value that you set here) pixels of each image will 
			be shown, the rest will be hidden. </em>"),

    array(    "name" => "Header Image: Alignment",
    	    "category" => "header-image",
            "id" => $shortname."_headerimage_alignment",
            "type" => "select",
            "std" => "top center",
            "options" => array("top center", "top left", "top right", "center left", "center center", "center right", 
			"bottom left", "bottom center", "bottom right"),
            "info" => "The aligned edge or end of the image will be the fixed part, and the image will be cut off from 
			the opposite edge or end if it doesn't fit into the visitor's browser viewport. <br /><br />
			<strong>Example:</strong> If you choose \"Top Left\" as the alignment, then the image(s) will be cut off 
			from the opposite edge, which would be \"Bottom Right\" in this case."),

    array(    "name" => "Opacity LEFT: Value",
    	    "category" => "header-image",
            "id" => $shortname."_header_opacity_left",
            "std" => "40",
            "type" => "select",
			"options" => array("0", "5", "10", "15", "20", "25", "30", "35", "40", "45", "50", "55", "60", "65", 
			"70", "75", "80", "85", "90", "95"),
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/opacity.jpg\" style=\"float: right; 
			margin: 0 0 10px 10px;\">" . "Opacity overlay for the LEFT hand side of the header image. 
			Choose 0 to remove the Opacity."),

    array(    "name" => "Opacity LEFT: Width",
    	    "category" => "header-image",
            "id" => $shortname."_header_opacity_left_width",
            "std" => "200",
            "type" => "text",
			"size" => "5",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/opacity-left-width.jpg\" style=\"float: right; 
			margin: 0 0 10px 10px;\">" . "Width of the Opacity overlay for the LEFT hand side of the header image, 
			<strong>in pixels</strong>. To match this to the left sidebar's width, add up the left sidebar's width plus 
			its left and right paddings, if you've set any."),

    array(    "name" => "Opacity LEFT: Color",
    	    "category" => "header-image",
            "id" => $shortname."_header_opacity_left_color",
            "std" => "ffffff",
            "type" => "text",
            "info" => "Color of the Opacity overlay for the LEFT hand side of the header image."),
			
    array(    "name" => "Opacity RIGHT: Value",
    	    "category" => "header-image",
            "id" => $shortname."_header_opacity_right",
            "std" => "40",
            "type" => "select",
			"options" => array("0", "5", "10", "15", "20", "25", "30", "35", "40", "45", "50", "55", "60", "65", 
			"70", "75", "80", "85", "90", "95"),
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/opacity.jpg\" style=\"float: right; 
			margin: 0 0 10px 10px;\">" . "Opacity overlay for the RIGHT hand side of the header image. 
			Choose 0 to remove the Opacity."),

    array(    "name" => "Opacity RIGHT: Width",
    	    "category" => "header-image",
            "id" => $shortname."_header_opacity_right_width",
            "std" => "200",
            "type" => "text",
			"size" => "5",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/opacity-right-width.jpg\" style=\"float: right; 
			margin: 0 0 10px 10px;\">" . "Width of the Opacity overlay for the RIGHT hand side of the header image, 
			<strong>in pixels</strong>. To match this to the right sidebar's width, add up the left sidebar's width plus 
			its left and right paddings, if you've set any."),

    array(    "name" => "Opacity RIGHT: Color",
    	    "category" => "header-image",
            "id" => $shortname."_header_opacity_right_color",
            "std" => "ffffff",
            "type" => "text",
            "info" => "Color of the Opacity overlay for the RIGHT hand side of the header image."),

    array(    "name" => "Overlay Blog TITLE over Header Image(s)?",
    	    "category" => "header-image",
            "id" => $shortname."_overlay_blog_title",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "An alternative location for the blog title."),

    array(    "name" => "Overlay Blog TAGLINE over Header Image(s)?",
    	    "category" => "header-image",
            "id" => $shortname."_overlay_blog_tagline",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "An alternative location for the blog tagline."),

    array(    "name" => "Overlayed Blog Title/Tagline Style",
    	    "category" => "header-image",
            "id" => $shortname."_overlay_box_style",
            "std" => "margin-top: 30px;\nmargin-left: 30px;",
            "type" => "textarea",
			"lastoption" => "yes", 
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/header-overlay.jpg\" style=\"float: right; 
			margin: 0 0 10px 10px;\">" . "The overlayed blog title and blog tagline will be in a div container. 
			Move that container around by changing the <code>margin-top</code> and <code>margin-left</code> values. 
			To right-align the overlayed container, add <code>float: right;</code> and replace <code>margin-left</code> 
			with <code>margin-right</code>. To center it, add <code>float:none; margin-left:auto; margin-right:auto; 
			text-align:center;</code> and, instead of adding margin-top here, add padding-top to 
			the parent container, via HTML/CSS Inserts -> CSS Inserts: 
			<code>div.header-image-container { padding-top: 30px; height: XXXpx; }</code> with XXX = desired image height - 
			padding-top value.<br />
			<br />You can add background color, borders and padding, too.
			<br /><br /><strong>Example (as shown in the image):</strong><br /><br /><code>margin-top: 30px;<br />margin-left: 30px;<br />
			width: 300px;<br />padding: 7px;<br />background: #ffffff;<br />border: solid 2px #000000;<br />
			filter: alpha(opacity=60);<br />-moz-opacity:.60;<br />opacity:.60;<br />-moz-border-radius: 7px;<br />
			-khtml-border-radius: 7px;<br />-webkit-border-radius: 7px;<br />border-radius: 7px;</code><br /><br />
			Leave <code>width: ...;</code> out to let the box adjust to the width of the blog title or tagline, whichever is longer.<br />
			<br />To change the styles of the blog title or the blog tagline individually, see the menu tab \"Header\"."),        

// New category: feed-links

    array(    "name" => "RSS settings",
    	    "category" => "feed-links",
			"switch" => "yes",
            "id" => $shortname."_rss_settings_info",
            "type" => "info",
            "info" => "<br />Choose from 4 types of RSS links:<ul><li>Subscribe to the Posts feed</li><li>Subscribe to 
			the Comments feed</li><li>Subscribe by Email, via Feedburner</li><li>Subscribe to the comments of a single 
			post</li></ul>There are 4 different locations to place these RSS links:<ul><li>On the right hand side of 
			the logo area: Small buttons and/or text links.<br />Configuration: Menu tab \"RSS Settings\" (the page you're 
			looking at right now)</li><li>In a sidebar, via the widget \"BFA Subscribe\". Bigger buttons and text, plus 
			a Email form field.<br />Configuration: Site Admin -> Design (\"Presentation\" in WP 2.3 and older) -> Widgets 
			-> BFA Subscribe.</li><li>In the footer area: Text links.<br />Configuration: Menu tab \"Footer\".</li><li>
			Above or below a post: Buttons and/or Text links<br />Configuration: Menu tab \"Post/Page Info Items\".</li></ul>
			After you've configured everything...<ul><li>... the \"Subscribe by Email\" link will go to Feedburner</li><li>... 
			the \"Subscribe by Email\" form field will be submitted to Feedburner</li><li>... but all Posts and Comments 
			Feed links will still go to the default WordPress RSS links</li></ul><strong>If you want to redirect all the 
			Posts and Comments RSS links to Feedburner, you will need to install the 
			<a href=\"http://www.google.com/support/feedburner/bin/answer.py?answer=78483&topic=13252\">Feedburner Feedsmith</a> 
			plugin.</strong> <em>Note: When copying and pasting your Feedburner feed URL from your Feedburner account into 
			the options page of Feedsmith here on your blog, make sure there is <strong>no space</strong> at the end of the 
			URL or Feedburner account name.</em><br /><br />This theme does not send RSS subscribers (other than Email subscribers) 
			straight away to Feedburner, because...<ul><li>... that would not cover existing subscribers</li><li>... 
			Feedsmith is a global solution that covers each and any RSS link on your site, including those a third party 
			plugin may add</li><li>... with a Feedsmith redirection readers subscribe to the URLs that you control 
			(http://www.yourdomain.com/feed/). Should you ever want to stop using Feedburner, simply uninstall the Feedsmith plugin 
			and you'll keep all your subscribers - they just won't be redirected anymore.</li></ul>"),

	array(    "name" => "RSS Box Width",
    	    "category" => "feed-links",
            "id" => $shortname."_rss_box_width",
            "std" => "280",
            "type" => "text",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/rss-box.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"Give the box containing the RSS buttons/links a fixed width, <strong>in pixels</strong>, to keep them in 
			one line, to avoid early wrapping. You shouldn't make this wider than needed for the given content."),		
			
    array(    "name" => "Show Post Feed icon?",
    	    "category" => "feed-links",
            "id" => $shortname."_show_posts_icon",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/show_posts_icon.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"Show the Post RSS Feed icon on the right hand side of the logo area?"),

	array(    "name" => "Post Feed Link Text",
    	    "category" => "feed-links",
            "id" => $shortname."_post_feed_link",
            "std" => "Posts",
            "type" => "text",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post_feed_link.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"Leave blank to show no Post Feed Text Link in the logo area."),		

	array(    "name" => "Post Feed Link \"Title\"",
    	    "category" => "feed-links",
            "id" => $shortname."_post_feed_link_title",
            "std" => "Subscribe to the POSTS feed",
            "type" => "text",
			"size" => "30", 
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post_feed_link_title.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"This is not the link anchor text (that was one option above), but the link \"title\", a text that will pop up when the mouse points at the link."),		

    array(    "name" => "Show Comment Feed icon?",
    	    "category" => "feed-links",
            "id" => $shortname."_show_comments_icon",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/show_comments_icon.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"Show the Comment RSS Feed icon on the right hand side of the logo area?"),

	array(    "name" => "Comment Feed Link Text",
    	    "category" => "feed-links",
            "id" => $shortname."_comment_feed_link",
            "std" => "Comments",
            "type" => "text",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/comment_feed_link.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"Leave blank to show no Comment Feed Text Link in the logo area."),		

	array(    "name" => "Comment Feed Link \"Title\"",
    	    "category" => "feed-links",
            "id" => $shortname."_comment_feed_link_title",
            "std" => "Subscribe to the COMMENTS feed",
            "type" => "text",
			"size" => "30", 
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/comment_feed_link_title.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"This is not the link anchor text (that was one option above), but the link \"title\", a text that will pop up when the mouse points at the link."),		

    array(    "name" => "Show Feedburner Email icon?",
    	    "category" => "feed-links",
            "id" => $shortname."_show_email_icon",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/show_email_icon.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"Show a Feedburner \"Subscribe by Email\" icon on the right hand side of the logo area?"),

	array(    "name" => "Feedburner Email Link Text",
    	    "category" => "feed-links",
            "id" => $shortname."_email_subscribe_link",
            "std" => "By Email",
            "type" => "text",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/email_subscribe_link.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"Leave blank to show no \"Subscribe by Email\" Text Link in the logo area"),		

	array(    "name" => "Feedburner Email Link \"Title\"",
    	    "category" => "feed-links",
            "id" => $shortname."_email_subscribe_link_title",
            "std" => "Subscribe by EMAIL",
            "type" => "text",
			"size" => "30", 
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/email_subscribe_link_title.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"This is not the link anchor text (that was one option above), but the link \"title\", a text that will pop up when the mouse points at the link."),		
			
    array(    "name" => "Feedburner ID for this site?",
    	    "category" => "feed-links",
            "id" => $shortname."_feedburner_email_id",
            "type" => "text",
            "std" => "",
			"size" => "25", 
            "info" => "If you chose to show the Feedburner \"Subscribe by Email\" link, put the ID of the Feedburner feed for this site here. 
			<br /><br />The ID will be a number (around 7 digits) if you have an OLD account at feedburner.com. If you have a NEW account 
			at feedburner.google.com, the ID will not be a number but a string that probably resembles your site name but without spaces.
			<br /><br />Log in your Feedburner account, click \"My Feeds\" -> \"[Title of the feed/site in question]\" 
			-> \"Publicize\" -> \"Email Subscriptions\". (If you have not activated the Email subscription yet do it now and proceed with the 
			next step afterwards). Now check out the two textareas.<br /><br /><strong>If you have a feedburner.google.com account:</strong> 
			The smaller one of the two textareas, the one at the bottom, will contain something like this:  
			<code>feedburner.google.com/fb/a/mailverify?uri=<i>bytesforall/lzoG</i>&amp;loc=en_US</code> The highlighted 
			text is your Google/Feedburner ID. Note: <strong>bytesforall/lzoG</strong> will NOT be your ID. This is just a sample to show you where the 
			ID starts and where it ends. It starts after <code>?uri=</code> and it ends before <code>&amp;loc=</code><br /><br /><strong>
			If you have an (old, original) feedburner.com account:</strong> With an old feedburner account, that is not transferred to google yet, 
			the smaller one of the two textareas, the one at the bottom, will contain something like this: 
			<code>www.feedburner.com/fb/a/emailverifySubmit?feedId=<i>1234567</i>&amp;loc=en_US</code> The highlighted number is 
			your (old, original) Feedburner.com ID. Note: <strong>1234567</strong> will NOT be your ID. This is just a sample to show you where the 
			ID starts and where it ends. It starts after <code>?feedId=</code> and it ends before <code>&amp;loc=</code><br /><br />	
			Now that you got your (new Google/Feedburner OR old Feedburner.com) ID put it into this field here"),

    array(    "name" => "OLD or NEW Feedburner account?",
    	    "category" => "feed-links",
            "id" => $shortname."_feedburner_old_new",
            "type" => "select",
            "std" => "New - at feedburner.google.com",
			"lastoption" => "yes", 
            "options" => array("New - at feedburner.google.com", "Old - at feedburner.com"),
            "info" => "Whether your account qualifies as old or new does not depend on whether you log in at feedburner.com or at feedburner.google.com. 
			See one option above to determine whether your account is OLD or NEW."),

// New category: page-menu-bar

    array(    "name" => "Home link in Page Menu Bar",
    	    "category" => "page-menu-bar",
			"switch" => "yes",
            "id" => $shortname."_home_page_menu_bar",
            "std" => "Home",
            "type" => "text",
            "info" => "<ul><li>Leave this blank to have no \"Home\" link in the page menu bar</li><li>Or, put text here 
			to include a link to your homepage into the page menu bar</li><li>The text doesn't have to be \"Home\", it 
			can be anything</li></ul>"),

    array(    "name" => "Exclude pages from Page Menu Bar?",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_exclude_page_menu_bar",
            "std" => "",
            "type" => "text",
			"size" => "30", 
            "info" => "<ul><li>Leave blank to include all pages in the page menu bar</li><li>To exclude certain pages from the 
			page menu bar, put their ID's into this field, separated by comma</li></ul><strong>Example:</strong> <code>13,29,102,117</code>
			<br /><br />To get the ID of a page, go to Site Admin -> Manage -> Pages, point your mouse at the title of the page 
			in question, and watch your browser's status bar (it's at the bottom) for an URL ending on \"...action=edit&post=<strong>XX</strong>\". 
			<strong>XX</strong> is the ID of the page."),

    array(    "name" => "Depth of Page Menu Bar",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_levels_page_menu_bar",
            "std" => "0",
            "type" => "select",
            "options" => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
            "info" => "<ul><li>Choose 0 to include ALL levels of pages (top level, sub pages, sub sub pages...) in the page 
			menu bar</li><li>Choose a number between 1 and 10 to include only the respective amount of page levels</li></ul>"),

    array(    "name" => "Sorting order of Page Menu Bar",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_sorting_page_menu_bar",
            "type" => "select",
            "std" => "menu_order",
            "options" => array("menu_order", "post_title"),
            "info" => "<ul><li><code>menu_order</code> - Sort the pages chronologically, as you created them (Change the page 
			order at Manage -> Pages -> Click on page title -> Page Order)</li><li><code>post_title</code> - alphabetically</li></ul>"),

    array(    "name" => "Title tags in Page Menu Bar",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_titles_page_menu_bar",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "Include a \"title\" tag for each item in the page menu? These will pop up when hovering over a menu item."),

    array(    "name" => "Border around all menu items",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_anchor_border_page_menu_bar",
            "std" => "dashed 1px #cccccc",
            "type" => "text",
            "info" => "Every item of the menu bar, plus the menu bar itself, will be wrapped into this border. 
			To have no borders in the first level, give it the same color as the background color for first level items. 
			Don't use semicolons here.<br /><br />Note: Leave the border width at 1px, match colors if you want to make 
			it dissapear."),

    array(    "name" => "Background color",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_page_menu_bar_background_color",
            "std" => "ffffff",
            "type" => "text",
            "info" => "Background color for menu items in their default state and the menu bar itself."),


    array(    "name" => "Background color: Hover",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_page_menu_bar_background_color_hover",
            "std" => "eeeeee",
            "type" => "text",
            "info" => "Background color for menu items in hover state."),

    array(    "name" => "Background color: Parent",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_page_menu_bar_background_color_parent",
            "std" => "dddddd",
            "type" => "text",
            "info" => "Background color for parent menu item while hovering over its sub menu."),

    array(    "name" => "Font Size &amp; Face",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_page_menu_font",
            "std" => "11px Arial, Verdana, sans-serif",
            "type" => "text",
			"size" => "30", 
            "info" => "Set both the font size and the font face for the menu items. Enclose font face names with a 
			space in quotes, i.e.:<br /><code>12px \"comic sans ms\", \"courier new\", arial, sans-serif</code><br />
			<br />Don't use semicolons here."),

    array(    "name" => "Link Color",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_page_menu_bar_link_color",
            "std" => "777777",
            "type" => "text",
            "info" => "Color of the link text."),

    array(    "name" => "Link Color: Hover",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_page_menu_bar_link_color_hover",
            "std" => "000000",
            "type" => "text",
            "info" => "Color of the link text in hover state."),
	
    array(    "name" => "Transform text in Page Menu Bar?",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_page_menu_transform",
            "type" => "select",
            "std" => "uppercase",
            "options" => array("uppercase", "lowercase", "capitalize", "none"),
            "info" => "You can transform the link titles in the page menu bar."),

    array(    "name" => "White or Black Arrows as Sub Menu Indicator?",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_page_menu_arrows",
            "type" => "select",
            "std" => "black",
            "options" => array("black", "white"),
            "info" => "If a menu item has sub menus, it will be indicated with down/right arrows. Choose the color for these arrows."),

    array(    "name" => "Width of Sub Menus",
    	    "category" => "page-menu-bar",
            "id" => $shortname."_page_menu_submenu_width",
            "type" => "select",
            "std" => "11",
			"lastoption" => "yes", 
			"options" => array("7", "7.5", "8", "8.5", "9", "9.5", "10", "10.5", "11", "11.5", "12", "12.5", "13", 
			"13.5", "14", "14.5", "15", "15.5", "16", "16.5", "17", "17.5", "18", "18.5", "19", "19.5", "20", "20.5", 
			"21", "21.5", "22", "22.5", "23", "23.5", "24", "24.5", "25"),
            "info" => "The width of top level items will adjust to the width of the links inside, but the sub menus 
			need a defined width, <strong>in \"em\"</strong>."),
			
// New category: cat-menu-bar

    array(    "name" => "Home link in Category Menu Bar",
    	    "category" => "cat-menu-bar",
			"switch" => "yes",
            "id" => $shortname."_home_cat_menu_bar",
            "std" => "",
            "type" => "text",
            "info" => "<ul><li>Leave this blank to have no \"Home\" link in the category menu bar</li><li>Or, put text 
			here to include a link to your homepage into the category menu bar</li><li>The text doesn't have to be \"Home\", 
			it can be anything</li></ul>"),

    array(    "name" => "Exclude categories from Category Menu Bar?",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_exclude_cat_menu_bar",
            "std" => "",
            "type" => "text",
			"size" => "30", 
            "info" => "<ul><li>Leave blank to include all categories in the category menu bar</li><li>To exclude certain 
			categories put their ID into this field, separated by comma</li></ul><strong>Example:</strong> <code>13,29,102,117</code>
			<br /><br />To get the ID of a category, go to Site Admin -> Manage -> Categories, point your mouse at the 
			title of the category in question, and watch your browser's status bar (it's at the bottom) for an URL ending 
			on \"...action=edit&cat_ID=<strong>XX</strong>\". <strong>XX</strong> is the ID of the category."),

    array(    "name" => "Depth of Category Menu Bar",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_levels_cat_menu_bar",
            "std" => "0",
            "type" => "select",
            "options" => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
            "info" => "<ul><li>Choose 0 to include ALL levels of categories (top level, sub cats, sub sub cats...) in the 
			category menu bar</li><li>Choose a number between 1 and 10 to include only the respective amount of category levels</li></ul>"),

    array(    "name" => "Sorting order of Category Menu Bar",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_sorting_cat_menu_bar",
            "type" => "select",
            "std" => "ID",
            "options" => array("ID", "name", "count"),
            "info" => "<ul><li><code>ID</code> - Sort the categories chronologically, as you created them</li>
			<li><code>name</code> - alphabetically</li><li><code>count</code> - by number of posts</li></ul>"),

    array(    "name" => "Title tags in Category Menu Bar",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_titles_cat_menu_bar",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "Include a \"title\" tag for each item in the category menu bar? Title tags are the little 
			boxes that pop up when hovering over a menu item. Setting this to yes makes sense if you've set a 
			\"description\" for each category (Manage -> Categories -> Click on category name). Otherwise the 
			title tag will just repeat the category name."),

    array(    "name" => "Border around all menu items",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_anchor_border_cat_menu_bar",
            "std" => "solid 1px #000000",
            "type" => "text",
            "info" => "Every item of the menu bar, plus the menu bar itself, will be wrapped into this border. 
			To have no borders in the first level, give it the same color as the background color for first level items. 
			Don't use semicolons here. <br /><br />Note: Leave the border width at 1px, match colors if you want to make it dissapear."),

    array(    "name" => "Background color",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_cat_menu_bar_background_color",
            "std" => "777777",
            "type" => "text",
            "info" => "Background color for menu items in their default state and the menu bar itself."),

    array(    "name" => "Background color: Hover",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_cat_menu_bar_background_color_hover",
            "std" => "cc0000",
            "type" => "text",
            "info" => "Background color for menu items in hover state."),

    array(    "name" => "Background color: Parent",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_cat_menu_bar_background_color_parent",
            "std" => "000000",
            "type" => "text",
            "info" => "Background color for parent menu item while hovering over its sub menu."),
			
    array(    "name" => "Font for Category Menu Bar",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_cat_menu_font",
            "std" => "11px Arial, Verdana, sans-serif",
            "type" => "text",
			"size" => "30", 
            "info" => "Set both the font size and the font face for the menu items. Enclose font face names 
			with a space in quotes, i.e.:<br /><code>12px \"comic sans ms\", \"courier new\", arial, sans-serif</code>
			<br /><br />Don't use semicolons here."),

    array(    "name" => "Link Color",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_cat_menu_bar_link_color",
            "std" => "ffffff",
            "type" => "text",
            "info" => "Color of the link text in default state."),

    array(    "name" => "Link Color: Hover",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_cat_menu_bar_link_color_hover",
            "std" => "ffffff",
            "type" => "text",
            "info" => "Color of the link text in hover state."),
			
    array(    "name" => "Transform text in Category Menu Bar?",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_cat_menu_transform",
            "type" => "select",
            "std" => "uppercase",
            "options" => array("uppercase", "lowercase", "capitalize", "none"),
            "info" => "You can transform the link titles in the category menu bar."),
			
    array(    "name" => "White or Black Arrows as Sub Menu Indicator?",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_cat_menu_arrows",
            "type" => "select",
            "std" => "white",
            "options" => array("white", "black"),
            "info" => "If a menu item has sub menus, it will be indicated with down/right arrows. 
			Choose the color for these arrows."),

    array(    "name" => "Width of Sub Menus",
    	    "category" => "cat-menu-bar",
            "id" => $shortname."_cat_menu_submenu_width",
            "type" => "select",
            "std" => "11",
			"lastoption" => "yes", 
			"options" => array("7", "7.5", "8", "8.5", "9", "9.5", "10", "10.5", "11", "11.5", "12", "12.5", 
			"13", "13.5", "14", "14.5", "15", "15.5", "16", "16.5", "17", "17.5", "18", "18.5", "19", "19.5", "20", 
			"20.5", "21", "21.5", "22", "22.5", "23", "23.5", "24", "24.5", "25"),
            "info" => "The width of top level items will adjust to the width of the links inside, but the sub menus 
			need a defined width, <strong>in \"em\"</strong>."),
			
// new category: center

	array(    "name" => "Center column style",
    	    "category" => "center",
			"switch" => "yes",
            "id" => $shortname."_center_column_style",
            "std" => "padding: 10px 15px;",
            "type" => "textarea",
			"lastoption" => "yes", 
            "info" => "Style the center column here. The center column is the container for everything in the middle: 
			All posts (including \"page\" posts) and the next/prev navigation."),
			

// New category: next/prev navigation
			
    array(    "name" => "NEWER / OLDER orientation",
    	    "category" => "next-prev-nav",
			"switch" => "yes",
            "id" => $shortname."_next_prev_orientation",
            "std" => "Newer Left, Older Right",
            "type" => "select", 
			"options" => array("Newer Left, Older Right", "Older Left, Newer Right"), 
            "info" => "Show the link to the NEWER post/page on the LEFT or the RIGHT hand side of the navigation bar(s)?"),
			
    array(    "name" => "Home link in Nav. on MULTI post pages?",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_home_multi_next_prev",
            "std" => "",
            "type" => "text",
            "info" => "On multi post pages, show a \"Home\" link between the 2 links pointing to the previous and 
			the next page?<ul><li>Leave blank to show no \"Home\" link</li><li>Or, put any text here to use it as 
			the text for the link to the homepage</li><li>If you use the WP-PageNavi plugin, this setting becomes 
			obsolete as then the page numbers of WP-PageNavi will be displayed instead of the default next/prev links</li></ul>"),

    array(    "name" => "Home link in Nav. on SINGLE post pages?",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_home_single_next_prev",
            "std" => "",
            "type" => "text",
            "info" => "On single post pages, show a \"Home\" link between the 2 links pointing to the previous and 
			the next post?<ul><li>Leave blank to show no \"Home\" link</li><li>Or, put any text here to use it as 
			the text for the link to the homepage</li></ul>"),

    array(    "name" => "\"Newer Page\" link on MULTI post pages",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_multi_next_prev_newer",
            "std" => "&laquo; Newer Entries",
            "type" => "text",
			"size" => "30", 
			"editable" => "yes", 
            "info" => "You can use single and double quotes, and HTML. Examples:<ul><li><code>&lt;br /&gt;</code> 
			for line breaks</li><li><code>&lt;strong&gt; ... &lt;/strong&gt;</code> to make text <strong>bold</strong></li>
			<li><code>&lt;em&gt; ... &lt;/em&gt;</code> to make text <em>italic</em></li><li><code>&amp;nbsp;</code> to 
			include a non-breaking space</li><li><code>&amp;raquo;</code> for a right angle quote 
			<span style=\"font-size: 25px\">&raquo;</span></li><li><code>&amp;laquo;</code> for a left angle quote 
			<span style=\"font-size: 25px\">&laquo;</span></li><li><code>&amp;rsaquo;</code> for a right single angle quote 
			<span style=\"font-size: 25px\">&rsaquo;</span></li><li><code>&amp;lsaquo;</code> for a left single angle quote 
			<span style=\"font-size: 25px\">&lsaquo;</span></li><li><code>&amp;rarr;</code> for a right arrow 
			<span style=\"font-size: 25px\">&rarr;</span></li><li><code>&amp;larr;</code> for a left arrow 
			<span style=\"font-size: 25px\">&larr;</span></li></ul>
			<em>NOTE: If you use WP-PageNavi then this and the next setting become obsolete</em>"), 

    array(    "name" => "\"Older Page\" link on MULTI post pages",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_multi_next_prev_older",
            "std" => "Older Entries &raquo;",
            "type" => "text",
			"size" => "30", 
			"editable" => "yes", 
            "info" => "See above for HTML examples."), 

    array(    "name" => "\"Newer Post\" link on SINGLE post pages",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_single_next_prev_newer",
            "std" => "&laquo; %link",
            "type" => "text",
			"size" => "30", 
			"editable" => "yes", 
            "info" => "See above for HTML examples.<br /><br />To include the linked title of the newer post, use <code>%link</code>"), 
			
    array(    "name" => "\"Older Post\" link on SINGLE post pages",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_single_next_prev_older",
            "std" => "%link &raquo;",
            "type" => "text",
			"size" => "30", 
			"editable" => "yes", 
            "info" => "See above for HTML examples.<br /><br />To include the linked title of the older post, use <code>%link</code>"),

);

$options2 = array(

    array(    "name" => "\"Newer Comments\" link for COMMENTS navigation",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_comments_next_prev_newer",
            "std" => "Newer Comments &raquo;",
            "type" => "text",
			"size" => "30", 
			"editable" => "yes", 
            "info" => "See above for HTML examples. If you choose to show page numbers (see below) the 
			\"Newer Comments\" link will be on the left hand side of the page numbers."), 
			
    array(    "name" => "\"Older Comments\" link for COMMENTS navigation",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_comments_next_prev_older",
            "std" => "&laquo; Older Comments",
            "type" => "text",
			"size" => "30", 
			"editable" => "yes", 
            "info" => "See above for HTML examples. If you choose to show page numbers (see below) the 
			\"Older Comments\" link will be on the right hand side of the page numbers."), 

    array(    "name" => "Location of Paged COMMENTS Navigation",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_location_comments_next_prev",
            "std" => "Above and Below Comments",
            "type" => "select", 
			"options" => array("Above Comments", "Below Comments", "Above and Below Comments"), 
            "info" => "Show the Next/Previous comments navigation above or below the comments?<br /><br />
			"),

    array(    "name" => "Style the COMMENTS ABOVE Box",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_next_prev_style_comments_above",
            "std" => "margin: 0 0 10px 0;\npadding: 5px 0 5px 0;",
            "type" => "textarea",
            "info" => "Style the box that contains the next/previous navigation for comments, when it is above the comments."),

    array(    "name" => "Style the COMMENTS BELOW Box",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_next_prev_style_comments_below",
            "std" => "margin: 0 0 10px 0;\npadding: 5px 0 5px 0;",
            "type" => "textarea",
            "info" => "Style the box that contains the next/previous navigation for comments, when it is below the comments."),

    array(    "name" => "Show Page Numbers (Pagination) for COMMENTS Navigation",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_next_prev_comments_pagination",
            "std" => "Yes",
            "type" => "select", 
			"options" => array("Yes", "No"), 
            "info" => "Instead of the regular Newer Comments / Older Comments links you can show the page numbers plus 
			previous/next links. Your settings for \"Newer Comments\" link and \"Older Comments\" link from above 
			will be used as the next/previous link texts."),

);

$options3 = array(
			
    array(    "name" => "Location of Next/Previous Page Navigation on MULTI Post Pages",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_location_multi_next_prev",
            "std" => "Bottom",
            "type" => "select", 
			"options" => array("Top", "Bottom", "Top and Bottom", "None"), 
            "info" => "On multi post pages, show the Next/Previous navigation on top (above all posts), at the bottom 
			(below all posts), or on top AND at the bottom?"),
			
    array(    "name" => "Location of Next/Previous Post Navigation on SINGLE Post Pages",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_location_single_next_prev",
            "std" => "Top",
            "type" => "select", 
			"options" => array("Top", "Middle", "Bottom", "Top and Middle", "Top and Bottom", "Middle and Bottom", 
			"Top, Middle and Bottom", "None"), 
            "info" => "On single post pages, show the Next/Previous navigation on top, in the middle 
			(between the post and the comments), or at the bottom?"),

    array(    "name" => "Style the Navigation TOP Box",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_next_prev_style_top",
            "std" => "margin: 0 0 10px 0;\npadding: 10px 0 10px 0;\nborder-bottom: dashed 1px #ccc;",
            "type" => "textarea",
            "info" => "Style the box that contains the next/previous navigation, when it is at the top."),

	array(    "name" => "Style the Navigation MIDDLE Box",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_next_prev_style_middle",
            "std" => "margin: 10px 0 20px 0;\npadding: 10px 0 10px 0;\nborder-top: dashed 1px #ccc;\nborder-bottom: dashed 1px #ccc;",
            "type" => "textarea",
            "info" => "Style the box that contains the next/previous navigation, when it is in the middle."),
			
    array(    "name" => "Style the Navigation BOTTOM Box",
    	    "category" => "next-prev-nav",
            "id" => $shortname."_next_prev_style_bottom",
            "std" => "margin: 20px 0 0 0;\npadding: 10px 0 10px 0;\nborder-top: dashed 1px #ccc;",
            "type" => "textarea",
			"lastoption" => "yes", 
            "info" => "Style the box that contains the next/previous navigation, when it is at the bottom."),
			
// New category: sidebars

    array(    "name" => "LEFT sidebar: Display on:",
    	    "category" => "sidebars",
			"switch" => "yes",
            "id" => $shortname."_leftcol_on",
            "std" => array ("homepage" => "on", 
								"frontpage" => "on", 
								"single" => "on", 
								"page" => "on", 
								"category" => "on", 
								"date" => "on", 
								"tag" => "on", 
								"search" => "on", 
								"author" => "on", 
								"404" => "on", 
								"attachment" => "on", 
								"check-if-saved-once" => FALSE),
            "type" => "displayon",
			"stripslashes" => "no",
            "info" => "(*) \"Front Page\" will only affect WP 2.5 and newer: For those newer WP versions, 
			IF you select a static \"Page\" page as the home page, then \"Front Page\" becomes the actual homepage, 
			while the \"Homepage\" will be the home page for Posts (but not the whole blog). If no static front page 
			is selected, Homepage and Front Page will be the same."),

    array(    "name" => "LEFT sidebar: Don't display on Pages:",
    	    "category" => "sidebars",
            "id" => $shortname."_left_col_pages_exclude",
            "std" => "",
            "type" => "text",
			"size" => "30", 
            "info" => "To turn off the left sidebar on <strong>individual</strong> pages, put the ID's of 
			those pages here, separated by comma<br /><br /><strong>Example:</strong><br /><code>29,8,111</code><br /><br />
			To get the ID of a page, " . $go_to_pages . ", point your mouse at the title of the page in question, and 
			watch your browser's status bar (it's at the bottom) for an URL ending on \"...action=edit&post=<strong>XX</strong>\". 
			<strong>XX</strong> is the ID of the page."), 

    array(    "name" => "LEFT sidebar: Don't display on Categories:",
    	    "category" => "sidebars",
            "id" => $shortname."_left_col_cats_exclude",
            "std" => "",
            "type" => "text",
			"size" => "30", 
            "info" => "To turn off the left sidebar on <strong>individual</strong> category pages, put the ID's of 
			those categories here, separated by comma<br /><br /><strong>Example:</strong><br /><code>13,5,87</code><br /><br />
			To get the ID of a category, " . $go_to_cats . ", point your mouse at the title of the category in question, 
			and watch your browser's status bar (it's at the bottom) for an URL ending on \"...action=edit&cat_ID=<strong>XX</strong>\". 
			<strong>XX</strong> is the ID of the category.<br /><br />Note: This will turn on/off sidebars on category pages 
			(pages that list the posts in the given category), but not on \"all single post pages of posts in category XX\"."), 
			
	array(    "name" => "RIGHT sidebar: Display on:",
    	    "category" => "sidebars",
            "id" => $shortname."_rightcol_on",
            "std" => array ("homepage" => "on", 
								"frontpage" => "on", 
								"single" => "on", 
								"page" => "on", 
								"category" => "on", 
								"date" => "on", 
								"tag" => "on", 
								"search" => "on", 
								"author" => "on", 
								"404" => "on", 
								"attachment" => "on", 
								"check-if-saved-once" => FALSE),
            "type" => "displayon",
			"stripslashes" => "no",
            "info" => "(*) \"Front Page\" will only affect WP 2.5 and newer: For those newer WP versions, IF you 
			select a static \"Page\" page as the home page, then \"Front Page\" becomes the actual homepage, while the 
			\"Homepage\" will be the home page for Posts (but not the whole blog). If no static front page is selected, 
			Homepage and Front Page will be the same."),

    array(    "name" => "RIGHT sidebar: Don't display on Pages:",
    	    "category" => "sidebars",
            "id" => $shortname."_right_col_pages_exclude",
            "std" => "",
            "type" => "text",
			"size" => "30", 
            "info" => "To turn off the right sidebar on <strong>individual</strong> pages, put the ID's of 
			those pages here, separated by comma<br /><br /><strong>Example:</strong><br /><code>29,8,111</code><br /><br />
			To get the ID of a page, " . $go_to_pages . ", point your mouse at the title of the page in question, and 
			watch your browser's status bar (it's at the bottom) for an URL ending on \"...action=edit&post=<strong>XX</strong>\". 
			<strong>XX</strong> is the ID of the page."), 

    array(    "name" => "RIGHT sidebar: Don't display on Categories:",
    	    "category" => "sidebars",
            "id" => $shortname."_right_col_cats_exclude",
            "std" => "",
            "type" => "text",
			"size" => "30", 
            "info" => "To turn off the right sidebar on <strong>individual</strong> categories, put the ID's of 
			those categories here, separated by comma<br /><br /><strong>Example:</strong><br /><code>13,5,87</code><br /><br />
			To get the ID of a category, " . $go_to_cats . ", point your mouse at the title of the category in question, and 
			watch your browser's status bar (it's at the bottom) for an URL ending on \"...action=edit&cat_ID=<strong>XX</strong>\". 
			<strong>XX</strong> is the ID of the category.<br /><br />Note: This will turn on/off sidebars on category pages 
			(pages that list the posts in the given category), but not on \"all single post pages of posts in category XX\""), 
 
    array(    "name" => "LEFT sidebar WIDTH",
    	    "category" => "sidebars",
            "id" => $shortname."_left_sidebar_width",
            "std" => "200",
            "type" => "text", 
			"size" => "6", 
            "info" => "Width of the left sidebar in pixels. <strong>Example:</strong> <code>165</code>"),

    array(    "name" => "RIGHT sidebar WIDTH",
    	    "category" => "sidebars",
            "id" => $shortname."_right_sidebar_width",
            "std" => "200",
            "type" => "text", 
			"size" => "6", 
            "info" => "Width of the right sidebar in pixels. <strong>Example:</strong> <code>220</code>"),
			
    array(    "name" => "LEFT sidebar style",
    	    "category" => "sidebars",
            "id" => $shortname."_left_sidebar_style",
            "std" => "border-right: dashed 1px #CCCCCC;\npadding: 10px 10px 10px 10px;\nbackground: #ffffff;",
            "type" => "textarea",
            "info" => "Style the LEFT sidebar here. Usually all content in a sidebar would be inside of widgets, 
			so there should be no need to set text styles for the sidebar. The widgets can be styled separately, 
			see the menu tabs above."),

    array(    "name" => "RIGHT sidebar style",
    	    "category" => "sidebars",
            "id" => $shortname."_right_sidebar_style",
            "std" => "border-left: dashed 1px #CCCCCC;\npadding: 10px 10px 10px 10px;\nbackground: #ffffff;",
            "type" => "textarea",
			"lastoption" => "yes", 
            "info" => "Style the RIGHT sidebar here."),

// New category: widgets

    array(    "name" => "Widget Container",
    	    "category" => "widgets",
			"switch" => "yes",
            "id" => $shortname."_widget_container",
            "std" => "margin: 0 0 15px 0;",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/widget.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"The widget container contains the \"Widget Title\" (-Box) and the \"Widget Content\" (-Box), 
			both of which you can style independently."),

    array(    "name" => "Widget Title Box",
    	    "category" => "widgets",
            "id" => $shortname."_widget_title_box",
            "std" => "",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/widget-title-box.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"The Widget Title box contains the widget title. Text, calendar and search widgets may have no 
			title if you chose none. In that case there will be no Widget Title box in the widget container."),	

    array(    "name" => "Widget Title",
    	    "category" => "widgets",
            "id" => $shortname."_widget_title",
            "std" => "",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/widget-title.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style the Widget Title Font."),	

    array(    "name" => "Widget Content Box",
    	    "category" => "widgets",
            "id" => $shortname."_widget_content",
            "std" => "",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/widget-content.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "The widget Content box contains all the widget 
			content except the title."),

    array(    "name" => "Widget List Items",
    	    "category" => "widgets",
            "id" => $shortname."_widget_lists",
       			"std" => array  (
       								"li-margin-left" => 0, 
       								"link-weight" => "normal", 
       								"link-padding-left" => 5, 
       								"link-border-left-width" => 7,
       								"link-color" => "666666", 
       								"link-hover-color" => "000000",  
       								"link-border-left-color" => "cccccc", 
       								"link-border-left-hover-color" => "000000"),
            "type" => "widget-list-items",
			"stripslashes" => "no",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/widget-list-items-1.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "List items and links in widgets."),

    array(    "name" => "Widget List Items, 2nd level",
    	    "category" => "widgets",
            "id" => $shortname."_widget_lists2",
       			"std" => array  (
       								"li-margin-left" => 5, 
       								"link-weight" => "normal", 
       								"link-padding-left" => 5, 
       								"link-border-left-width" => 7,
       								"link-color" => "666666", 
       								"link-hover-color" => "000000",  
       								"link-border-left-color" => "cccccc", 
       								"link-border-left-hover-color" => "000000"),
            "type" => "widget-list-items",
			"stripslashes" => "no",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/widget-list-items-2.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Second level list items and links in widgets."),

    array(    "name" => "Widget List Items, 3rd and lower level",
    	    "category" => "widgets",
            "id" => $shortname."_widget_lists3",
				"std" => array  (
       								"li-margin-left" => 5, 
       								"link-weight" => "normal", 
       								"link-padding-left" => 5, 
       								"link-border-left-width" => 7,
       								"link-color" => "666666", 
       								"link-hover-color" => "000000",  
       								"link-border-left-color" => "cccccc", 
       								"link-border-left-hover-color" => "000000"),
            "type" => "widget-list-items",
			"stripslashes" => "no",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/widget-list-items-3.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Third and lower level list items and links in widgets."),

    array(    "name" => "Category Widget Display Type",
    	    "category" => "widgets",
            "id" => $shortname."_category_widget_display_type",
            "std" => "inline",
            "type" => "select", 
            "options" => array("inline", "block"),
            "info" => "The category widget needs this extra setting because it is the only widget that can 
			have both a link and a non-linked text (the \"post count\") inside a single list item AND be 
			hierarchical AND be too long to fit into a single line. For the most pleasing result across 
			browsers, choose... <ul><li><code>inline</code> if you are displaying the post count</li>
			<li><code>block</code> if you're <strong>not</strong> displaying the post count</li></ul>"),

    array(    "name" => "Adjust SELECT menu font size",
    	    "category" => "widgets",
            "id" => $shortname."_select_font_size",
            "std" => "Default",
            "type" => "select", 
            "options" => array("Default", "12px", "11px", "10px", "9px"),
			"lastoption" => "yes", 
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/select-cutoff.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "In <strong>Internet Explorer</strong>, 
			\"Select\" drop down menus will be cut off if one or more of the select menu items (in this 
			case: category titles) are too long. <br /><br />To avoid this, set a (small) fixed pixel font 
			size for the select menu items here, such as <strong>11px</strong> (11 pixels) if you feel 
			(or see, because you use IE) that your select menus might be too wide for the set sidebar 
			width. (OR: Make your sidebar wider)"),
			
// New category: postinfos

    array(    "name" => "KICKER: Homepage",
    	    "category" => "postinfos",
			"switch" => "yes",
            "id" => $shortname."_post_kicker_home",
            "type" => "postinfos",
            "std" => "",
            "info" => "Leave blank to display no kicker on posts on the homepage.<br /><strong>Example:
			</strong> <code>%category%</code>"),

	array(    "name" => "KICKER: Multi Post Pages",
    	    "category" => "postinfos",
            "id" => $shortname."_post_kicker_multi",
            "type" => "postinfos",
            "std" => "",
            "info" => "Leave blank to display no kicker on posts on multi post pages.<br /><strong>Example:
			</strong> <code>%category-linked%</code>"),

	array(    "name" => "KICKER: Single Post Pages",
    	    "category" => "postinfos",
            "id" => $shortname."_post_kicker_single",
            "type" => "postinfos",
            "std" => "",
            "info" => "Leave blank to display no kicker on posts on single post pages.<br /><strong>Example:
			</strong> <code>%category-linked%</code>"),

	array(    "name" => "KICKER: \"Page\" Pages",
    	    "category" => "postinfos",
            "id" => $shortname."_post_kicker_page",
            "type" => "postinfos",
            "std" => "",
            "info" => "Leave blank to display no kicker on \"page\" pages.<br /><em>NOTE: \"Page\" 
			pages don't have categories or tags</em>"),

	array(    "name" => "BYLINE: Homepage",
    	    "category" => "postinfos",
            "id" => $shortname."_post_byline_home",
            "type" => "postinfos",
            "std" => "",
            "info" => "Leave blank to display no byline on posts on the homepage.<br /><strong>Example:
			</strong> <code>By %author%, on %date('<i>F jS, Y</i>')%</code>"),

	array(    "name" => "BYLINE: Multi Post Pages",
    	    "category" => "postinfos",
            "id" => $shortname."_post_byline_multi",
            "type" => "postinfos",
            "std" => "",
            "info" => "Leave blank to display no byline on posts on multi post pages.<br /><strong>Example:
			</strong> <code>By %author%, on %date('<i>F jS, Y</i>')%</code>"),

	array(    "name" => "BYLINE: Single Post Pages",
    	    "category" => "postinfos",
            "id" => $shortname."_post_byline_single",
            "type" => "postinfos",
            "std" => "",
            "info" => "Leave blank to display no byline on posts on single post pages.<br /><strong>Example:
			</strong> <code>By %author%, on %date('<i>F jS, Y</i>')%</code>"),

	array(    "name" => "BYLINE: \"Page\" Pages",
    	    "category" => "postinfos",
            "id" => $shortname."_post_byline_page",
            "type" => "postinfos",
            "std" => "",
            "info" => "Leave blank to display no byline on \"page\" pages.<br /><em>NOTE: \"Page\" 
			pages don't have categories or tags</em>"),

	array(    "name" => "FOOTER: Homepage",
    	    "category" => "postinfos",
            "id" => $shortname."_post_footer_home",
            "type" => "postinfos",
            "std" => "%date('F jS, Y')% | %tags-linked('Tags: ', ', ', ' | ')% Category: %categories-linked(', ')% | 
			%comments('Leave a comment', 'One comment', '% comments', 'Comments are closed')%",
            "info" => "Leave blank to display no footer on posts on the homepage.<br /><strong>Example:</strong> 
			<code>%tags-linked('<i>&lt;strong&gt;Tags:&lt;/strong&gt; </i>', '<i>, </i>', '<i> - </i>')% 
			&lt;strong&gt;Categories:&lt;/strong&gt; %categories-linked('<i>, </i>')%&lt;br /&gt;
			%comments('<i>Leave a comment</i>', '<i>One comment so far</i>', '<i>% comments - be the next!</i>', 
			'<i>Comments are closed</i>')% %edit(' | ', 'Edit', '')%</code>"),

	array(    "name" => "FOOTER: Multi Post Pages",
    	    "category" => "postinfos",
            "id" => $shortname."_post_footer_multi",
            "type" => "postinfos",
            "std" => "%date('F jS, Y')% | %tags-linked('Tags: ', ', ', ' | ')% Category: %categories-linked(', ')% | 
			%comments('Leave a comment', 'One comment', '% comments', 'Comments are closed')%",
            "info" => "Leave blank to display no footer on posts on multi post pages.<br /><strong>Example:</strong> 
			<code>%tags-linked('<i>&lt;strong&gt;Tags:&lt;/strong&gt; </i>', '<i>, </i>', '<i> - </i>')% &lt;strong&gt;
			Categories:&lt;/strong&gt; %categories-linked('<i>, </i>')%&lt;br /&gt;%comments('<i>Leave a comment</i>', 
			'<i>One comment so far</i>', '<i>% comments - be the next!</i>', '<i>Comments are closed</i>')% %edit(' | ', 'Edit', '')%</code>"),

	array(    "name" => "FOOTER: Single Post Pages",
    	    "category" => "postinfos",
            "id" => $shortname."_post_footer_single",
            "type" => "postinfos",
            "std" => "%date('F jS, Y')% | %tags-linked('Tags: ', ', ', ' | ')% Category: %categories-linked(', ')% | 
			%comments('Leave a comment', 'One comment', '% comments', 'Comments are closed')%",
            "info" => "Leave blank to display no footer on posts on single post pages.<br /><strong>Example:</strong> 
			<code>%tags-linked('<i>&lt;strong&gt;Tags:&lt;/strong&gt; </i>', '<i>, </i>', '<i> - </i>')% &lt;strong&gt;
			Categories:&lt;/strong&gt; %categories-linked('<i>, </i>')%&lt;br /&gt;%comments('<i>Leave a comment</i>', 
			'<i>One comment so far</i>', '<i>% comments - be the next!</i>', '<i>Comments are closed</i>')% %edit(' | ', 'Edit', '')%</code>"),

	array(    "name" => "FOOTER: \"Page\" Pages",
    	    "category" => "postinfos",
            "id" => $shortname."_post_footer_page",
            "type" => "postinfos",
            "std" => "",
			"lastoption" => "yes", 
            "info" => "Leave blank to have no footer on \"page\" pages.<br /><em>NOTE: \"Page\" pages 
			don't have categories or tags</em>"),

// New category: posts

    array(    "name" => "POST Container",
    	    "category" => "posts",
			"switch" => "yes",
            "id" => $shortname."_post_container_style",
            "std" => "margin: 0 0 30px 0;\n",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-container.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the container</strong> 
			that contains the whole post/page."),

    array(    "name" => "POST Container: STICKY",
    	    "category" => "posts",
            "id" => $shortname."_post_container_sticky_style",
            "std" => "background: #eee url(" . $stylesheet_directory . "/images/sticky.gif) 99% 5% no-repeat;\nborder: dashed 1px #ccc;\npadding: 10px;",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-container.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Additional styles for <strong>the container
			</strong> when it is <strong>STICKY</strong>. This works only in WP 2.7 and newer. 
			In WP 2.7, posts can be marked as \"sticky\" which will make them stay on the top of the homepage."),

    array(    "name" => "KICKER Box",
    	    "category" => "posts",
            "id" => $shortname."_post_kicker_style",
            "std" => "margin: 0 0 5px 0;\n",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-kicker.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the box</strong> that 
			contains the post/page \"kicker\", <strong>and the text</strong> inside, except the links."),

    array(    "name" => "KICKER Box: Links",
    	    "category" => "posts",
            "id" => $shortname."_post_kicker_style_links",
            "std" => "color: #000000;\ntext-decoration: none;\ntext-transform: uppercase;",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-kicker-links.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the links</strong> in the kicker box."),			

	array(    "name" => "KICKER Box: Links: Hover",
    	    "category" => "posts",
            "id" => $shortname."_post_kicker_style_links_hover",
            "std" => "color: #cc0000;",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-kicker-links-hover.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the links</strong> in the 
			kicker box, in their <strong>hover</strong> state."),			
			
    array(    "name" => "HEADLINE Box",
    	    "category" => "posts",
            "id" => $shortname."_post_headline_style",
            "std" => "",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-headline.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the box</strong> that contains 
			the post/page title. The text inside (= the post/page title) will be styled in the next section."),

    array(    "name" => "HEADLINE Box: Text",
    	    "category" => "posts",
            "id" => $shortname."_post_headline_style_text",
            "std" => "padding: 0;\nmargin: 0;\n",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-headline-text.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the post/page titles, when 
			they are NOT links</strong>, but regular text (= on single post pages and \"page\" pages)."),
			
    array(    "name" => "HEADLINE Box: Links",
    	    "category" => "posts",
            "id" => $shortname."_post_headline_style_links",
            "std" => "color: #666666;\ntext-decoration: none;\n",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-headline-links.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the post/page titles, when 
			they ARE links</strong> (= on multi post pages such as home, archive, category, tag, search...). 
			\"Page\" page titles are usually never links, but they might become links, i.e. if you expand 
			WordPress' search capabilities with a plugin."),			

	array(    "name" => "HEADLINE Box: Links: Hover",
    	    "category" => "posts",
            "id" => $shortname."_post_headline_style_links_hover",
            "std" => "color: #000000;\ntext-decoration: none;\n",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-headline-links-hover.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style the <strong>hover</strong> state of 
			<strong>post/page titles</strong>, when they are links."),			

    array(    "name" => "BYLINE Box",
    	    "category" => "posts",
            "id" => $shortname."_post_byline_style",
            "type" => "textarea",
            "std" => "margin: 5px 0 10px 0;",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-byline.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the box</strong> that contains 
			the post/page byline, <strong>and the text</strong> inside, except the links."),

	array(    "name" => "BYLINE Box: Links",
    	    "category" => "posts",
            "id" => $shortname."_post_byline_style_links",
            "type" => "textarea",
            "std" => "",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-byline-links.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the links</strong> in 
			the byline box."),

	array(    "name" => "BYLINE Box: Links: Hover",
    	    "category" => "posts",
            "id" => $shortname."_post_byline_style_links_hover",
            "type" => "textarea",
            "std" => "",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-byline-links-hover.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the links</strong> in the 
			byline box, in their <strong>hover</strong> state."),

    array(    "name" => "BODY Box",
    	    "category" => "posts",
            "id" => $shortname."_post_bodycopy_style",
            "type" => "textarea",
            "std" => "",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-body.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the box</strong> that 
			contains the post/page main text (= the \"body copy\"). The text and links in 
			the post/page main text box can be styled on the main tab \"Text & Link Styling\"."),
		
	array(    "name" => "FOOTER Box",
    	    "category" => "posts",
            "id" => $shortname."_post_footer_style",
            "type" => "textarea",
            "std" => "margin: 0;\npadding: 5px;\nbackground: #eeeeee;\ncolor: #666;\nline-height: 18px;",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-footer.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the box</strong> that 
			contains the post/page footer, <strong>and the text</strong> inside, except the links."),

	array(    "name" => "FOOTER Box: Links",
    	    "category" => "posts",
            "id" => $shortname."_post_footer_style_links",
            "type" => "textarea",
            "std" => "color: #333;\nfont-weight: normal;\ntext-decoration: none;",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-footer-links.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the links</strong> in the footer box."),

	array(    "name" => "FOOTER Box: Links: Hover",
    	    "category" => "posts",
            "id" => $shortname."_post_footer_style_links_hover",
            "type" => "textarea",
            "std" => "color: #333;\nfont-weight: normal;\ntext-decoration: underline;",
			"lastoption" => "yes", 
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/post-footer-links-hover.gif\" 
			style=\"float: right; margin: 0 0 10px 10px;\">" . "Style <strong>the links</strong> in the 
			footer box, in their <strong>hover</strong> state."),

			
// New category: posts-or-excerpts
             
    array(    "name" => "Posts or excerpts on HOME page?",
    	    "category" => "posts-or-excerpts",
			"switch" => "yes",
            "id" => $shortname."_excerpts_home",
            "type" => "select",
            "std" => "Full Posts",
            "options" => array("Only Excerpts", "Full Posts"),
            "info" => "Show full posts or only excerpts, on the Homepage?"),

    array(    "name" => "Show the first X posts on HOME page as full posts?",
    	    "category" => "posts-or-excerpts",
            "id" => $shortname."_full_posts_homepage",
            "type" => "select",
            "std" => 0,
            "options" => array(0,1,2,3,4,5,6,7,8,9,10),
            "info" => "By setting a number here and setting the option above (Posts or excerpts on HOME page?) to 
			\"Only Excerpts\" you can show X full posts on top of the Homepage, followed by excerpts."),
			
    array(    "name" => "Posts or excerpts on CATEGORY pages?",
    	    "category" => "posts-or-excerpts",
            "id" => $shortname."_excerpts_category",
            "type" => "select",
            "std" => "Only Excerpts",
            "options" => array("Only Excerpts", "Full Posts"),
            "info" => "Show full posts or only excerpts, on Category pages?"),
            
    array(    "name" => "Posts or excerpts on ARCHIVE pages?",
    	    "category" => "posts-or-excerpts",
            "id" => $shortname."_excerpts_archive",
            "type" => "select",
            "std" => "Only Excerpts",
            "options" => array("Only Excerpts", "Full Posts"),
            "info" => "Show full posts or only excerpts, on (date based) Archive pages?"),

    array(    "name" => "Posts or excerpts on TAG pages?",
    	    "category" => "posts-or-excerpts",
            "id" => $shortname."_excerpts_tag",
            "type" => "select",
            "std" => "Only Excerpts",
            "options" => array("Only Excerpts", "Full Posts"),
            "info" => "Show full posts or only excerpts, on Tag pages?"),
            
    array(    "name" => "Posts or excerpts on SEARCH RESULT pages?",
    	    "category" => "posts-or-excerpts",
            "id" => $shortname."_excerpts_search",
            "type" => "select",
            "std" => "Only Excerpts",
            "options" => array("Only Excerpts", "Full Posts"),
            "info" => "Show full posts or only excerpts, on Search Result pages?"),

    array(    "name" => "Posts or excerpts on AUTHOR pages?",
    	    "category" => "posts-or-excerpts",
            "id" => $shortname."_excerpts_author",
            "type" => "select",
            "std" => "Only Excerpts",
            "options" => array("Only Excerpts", "Full Posts"),
			"lastoption" => "yes", 
            "info" => "Show full posts or only excerpts, on Author pages?"),

// New category: more-tag

    array(    "name" => "Read More",
    	    "category" => "more-tag",
			"switch" => "yes",
           "id" => $shortname."_more_tag",
            "std" => "Continue reading %post-title%",
            "type" => "text",
			"size" => "30", 
			"editable" => "yes", 
			"lastoption" => "yes", 
            "info" => "Configure the \"Read More\" text here. The text you put here will be displayed whenever you use 
			<code>&lt;!--more--&gt;</code> in a post, either by manually inserting that tag into a post or by using the 
			more button (see images below). This is a more fine-grained method of generating post excerpts than setting 
			the post display type to \"Excerpts\" (see menu tab \"Posts or Excerpts\"). <br /><br />Whenever you insert 
			<code>&lt;!--more--&gt;</code> into a post or page, only the text before that tag will be displayed on 
			multi-post-pages while the whole post will be displayed on its dedicated single post page. <br /><br />
			Use <code>%post-title%</code> to include the post title in the \"More\" text.<br /><br />
			Example:<br /> <code>Continue reading \"&lt;strong&gt;%post-title%&lt/strong&gt;\" &amp;raquo;</code><br /><br />
			You can use single and double quotes, and HTML. Examples:<ul><li><code>&lt;br /&gt;</code> for line breaks</li>
			<li><code>&lt;strong&gt; ... &lt;/strong&gt;</code> to make text <strong>bold</strong></li>
			<li><code>&lt;em&gt; ... &lt;/em&gt;</code> to make text <em>italic</em></li><li><code>&amp;nbsp;</code> to 
			include a non-breaking space</li><li><code>&amp;raquo;</code> for a right angle quote 
			<span style=\"font-size: 25px\">&raquo;</span></li><li><code>&amp;laquo;</code> for a left angle quote 
			<span style=\"font-size: 25px\">&laquo;</span></li><li><code>&amp;rsaquo;</code> for a right single angle quote 
			<span style=\"font-size: 25px\">&rsaquo;</span></li><li><code>&amp;lsaquo;</code> for a left single angle quote 
			<span style=\"font-size: 25px\">&lsaquo;</span></li><li><code>&amp;rarr;</code> for a right arrow 
			<span style=\"font-size: 25px\">&rarr;</span></li><li><code>&amp;larr;</code> for a left arrow 
			<span style=\"font-size: 25px\">&larr;</span></li></ul>The WordPress editor buttons to insert the 
			\"Read More\" tag into a post or page. They look different depending on whether you're in Visual or HTML mode.<br /><br >" . 
			"<img src=\"" . $stylesheet_directory . "/options/images/readmore1.gif\" /><br /><br />
			<img src=\"" . $stylesheet_directory . "/options/images/readmore2.gif\" />"),
 
// New category: comments
                                                                
    array(    "name" => "Highlight Author comments?",
    	    "category" => "comments",
			"switch" => "yes",
            "id" => $shortname."_author_highlight",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Highlight author (blog owner) comments with a different background color?"),

    array(    "name" => "Color for Author comment highlighting",
    	    "category" => "comments",
           "id" => $shortname."_author_highlight_color",
            "std" => "ffecec",
            "type" => "text",
            "info" => "If you chose Yes above, set the background color for author comments here."),

    array(    "name" => "Regular Comment Background Color",
    	    "category" => "comments",
           "id" => $shortname."_comment_background_color",
            "std" => "ffffff",
            "type" => "text",
            "info" => "Background color for comments"),

    array(    "name" => "Alternating Comment Background Color",
    	    "category" => "comments",
           "id" => $shortname."_comment_alt_background_color",
            "std" => "f6f6f6",
            "type" => "text",
            "info" => "Background color for every second comment. Choose the same color as one option above if 
			you want the same background color for all comments."),

    array(    "name" => "Border between single comments",
    	    "category" => "comments",
           "id" => $shortname."_comment_border",
            "std" => "dotted 1px #cccccc",
            "type" => "text",
            "info" => "Style the line that separates every comment from the next. No semicolon here."),

    array(    "name" => "Comment Author Name Size",
    	    "category" => "comments",
            "id" => $shortname."_comment_author_size",
            "type" => "select",
            "std" => "110%",
            "options" => array("100%", "105%", "110%", "115%", "120%", "125%", "130%", "135%", "140%", "145%", "150%"),
            "info" => "Font size of comment author names relative to base font size."),	
			
    array(    "name" => "Allow comments on \"Page\" pages, too?",
    	    "category" => "comments",
            "id" => $shortname."_comments_on_pages",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes"),
            "info" => "Set to Yes to have a comment form (and comments if any) on \"Page\" pages, too, and not only on Post pages."),

    array(    "name" => "Separate trackbacks/pings from comments?",
    	    "category" => "comments",
            "id" => $shortname."_separate_trackbacks",
            "type" => "select",
            "std" => "No",
            "options" => array("Yes", "No"),
            "info" => "For WP 2.6 and older: List comments, trackbacks and pings in the order they come in, or put all 
			trackbacks and pings below the comments?<br /><br /><em>Note: This works well with the theme's own functions 
			but not if you use the plugin <a href=\"http://wordpress.org/extend/plugins/paged-comments/\">Paged Comments</a> 
			or Wordpress 2.7</em>"),	

    array(    "name" => "Avatar Size",
    	    "category" => "comments",
           "id" => $shortname."_avatar_size",
            "type" => "select",
            "std" => "55",
            "options" => array("0", "20", "25", "30", "35", "40", "45", "50", "55", "60", "65", "70", "75", "80"),
            "info" => "The size of avatars, in pixels. 55 means 55 x 55 pixels. Choose 0 here to show no avatars 
			(or turn them off in the WordPress admin panel if your WP version has built in avatar support)."),			

    array(    "name" => "Avatar Style",
    	    "category" => "comments",
           "id" => $shortname."_avatar_style",
            "std" => "margin: 0 8px 1px 0;\npadding: 3px;\nborder: solid 1px #ddd;\nbackground-color: #f3f3f3;\n
			-moz-border-radius: 3px;\n-khtml-border-radius: 3px;\n-webkit-border-radius: 3px;\nborder-radius: 3px;",
            "type" => "textarea",
            "info" => "Style avatars. The lines with \"radius\" create rounded corners in Firefox and Safari."), 

    array(    "name" => "Show XHTML tags?",
    	    "category" => "comments",
           "id" => $shortname."_show_xhtml_tags",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Show the \"You can use these HTML tags\" info above the comment form?"),			

    array(    "name" => "Comment Form Style",
    	    "category" => "comments",
           "id" => $shortname."_comment_form_style",
            "std" => "margin: 25px 0;\npadding: 25px;\nbackground: #eee;\n-moz-border-radius: 8px;\n-khtml-border-radius: 8px;\n-webkit-border-radius: 8px;\nborder-radius: 8px;",
            "type" => "textarea",
            "info" => "Style the comment form area = Box that contains the Name, Email, Website input fields, the comment textarea and the submit button."), 
			
    array(    "name" => "Submit Button Style",
    	    "category" => "comments",
           "id" => $shortname."_submit_button_style",
            "std" => "padding: 4px 10px 4px 10px;\nfont-size: 1.2em;\nline-height: 1.5em;\nheight: 36px;",
            "type" => "textarea",
            "info" => "Style the comment submit button, i.e. give it margin to move it around. This section here is 
			specifically for the <strong>comment</strong> submit button. Additionally, default button styles will be applied, see
			menu tab \"Forms\", options \"Submit Buttons: Default Style\" and \"Submit Buttons: Hover Style\"."), 
			
    array(    "name" => "Comment display order",
    	    "category" => "comments",
            "id" => $shortname."_comment_display_order",
            "type" => "select",
            "std" => "Oldest on top",
            "options" => array("Oldest on top", "Newest on top"),
			"lastoption" => "yes", 
            "info" => "For WP 2.6 and older: To list comments in reverse order choose \"Newest on top\". 
			In WP 2.7+ you can set this at Settings -> Discussion."),	
			
// New category: footer-style (don't name this "footer", Wordpress already uses that for their own footer in the admin area)

    array(    "name" => "Footer Style",
    	    "category" => "footer-style",
			"switch" => "yes",
           "id" => $shortname."_footer_style",
            "std" => "background-color: #ffffff;\nborder-top: dashed 1px #cccccc;\npadding: 10px;\n
			text-align: center;\ncolor: #777777;\nfont-size: 95%;",
            "type" => "textarea",
            "info" => "Style the footer box and the text inside."), 

    array(    "name" => "Footer Style: Links",
    	    "category" => "footer-style",
           "id" => $shortname."_footer_style_links",
            "std" => "text-decoration: none;\ncolor: #777777;\nfont-weight: normal;",
            "type" => "textarea",
            "info" => "Style the links in the footer."), 

    array(    "name" => "Footer Style: Links: Hover",
    	    "category" => "footer-style",
           "id" => $shortname."_footer_style_links_hover",
            "std" => "text-decoration: none;\ncolor: #777777;\nfont-weight: normal;",
            "type" => "textarea",
            "info" => "Style the links in the footer in hover state."), 

    array(    "name" => "Footer: Content",
    	    "category" => "footer-style",
           "id" => $shortname."_footer_style_content",
            "std" => "Copyright &copy; %current-year% %home% - All Rights Reserved",
            "type" => "textarea",
			"editable" => "yes", 
            "info" => "Content in the footer area. You can use (X)HTML and these placeholders ...
			<ul><li><code>%current-year%</code> to display the current year</li>
			<li><code>%page-XX%</code> to display the full link for a specific page. Replace XX with the ID of the page 
			you want to display the link for.</li><li><code>%home%</code> to display a full link to the homepage.</li>
			<li><code>%loginout%</code> to display a full Login/Logout link</li><li><code>%admin%</code> to display a 
			full link to the admin area. (Will only be displayed for logged in users.)</li>
			<li><code>%register%</code> to display a full register link</li><li><code>%rss%</code> to display (only) 
			the URL for the RSS feed. This is not a full link, just the URL. Use something like 
			<code>&lt;a href=\"%rss%\" rel=\"nofollow\"&gt;Posts Feed&lt;/a&gt;</code></li>
			<li><code>%comments-rss%</code> to display (only) the URL for the Comments RSS feed. This is not a full link, 
			just the URL. Use something like <code>&lt;a href=\"%comments-rss%\" rel=\"nofollow\"&gt;Comments Feed&lt;/a&gt;</code>. 
			(The BFA SEO option \"Nofollow RSS\" will not work here - nofollow would have to be included manually as 
			shown in these examples).</li>
			<li>In HTML, <span style=\"font-size:24px\">&copy;</span> can be displayed with <code>&amp;copy;</code>, 
			<span style=\"font-size:24px\">&trade;</span> with <code>&amp;trade;</code> and 
			<span style=\"font-size:24px\">&reg;</span> with <code>&amp;reg;</code></li></ul>"), 
			
    array(    "name" => "Show number of queries &amp; timer?",
    	    "category" => "footer-style",
            "id" => $shortname."_footer_show_queries",
            "type" => "select",
            "std" => "No",
            "options" => array("No", "Yes - visible", "Yes - in source code"),
			"lastoption" => "yes", 
            "info" => "Show the amount of database queries and the time required to render the given page, 
			at the bottom of every page? This can be useful to see how certain settings or plugins add to 
			the page rendering time."),

// New category: tables

    array(    "name" => "Table Style",
    	    "category" => "tables",
			"switch" => "yes",
            "id" => $shortname."_table",
            "std" => "border-collapse: collapse;\nmargin: 10px 0;",
            "type" => "textarea",
            "info" => "Style the table as a whole <code>&lt;table&gt;</code> ... <code>&lt;/table&gt;</code>"),
			
    array(    "name" => "Table Caption Style",
    	    "category" => "tables",
            "id" => $shortname."_table_caption",
            "std" => "background: #eeeeee;\nborder: #999999;\npadding: 4px 8px;\ncolor: #666666;",
            "type" => "textarea",
            "info" => "The table caption (if you use any) is (usually) the first row in a table.<br /><br />
			<strong>Example:</strong><br /><br /><code>&lt;table&gt;<br /><i>&lt;caption&gt;Results May 2008&lt;/caption&gt;</i><br />
			&lt;thead&gt;&lt;tr&gt;&lt;th&gt;Name&lt;/th&gt;&lt;th&gt;Address&lt;/th&gt;&lt;/tr&gt;&lt;/thead&gt;<br />
			&lt;tfoot&gt;&lt;tr&gt;&lt;td&gt;Previous&lt;/td&gt;&lt;td&gt;Next&lt;/td&gt;&lt;/tr&gt;&lt;/tfoot&gt;<br />
			&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;John&lt;/td&gt;&lt;td&gt;Smallville&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;<br />
			&lt;/table&gt;</code><br /><br /><em>Note how the table footer <code>tfoot</code> comes <strong>before</strong> 
			the body <code>tbody</code></em>"),

    array(    "name" => "Table Header Cells",
    	    "category" => "tables",
            "id" => $shortname."_table_th",
            "std" => "background: #888888;\ncolor: #ffffff;\nfont-weight: bold;\nfont-size: 90%;\npadding: 4px 8px;\n
			border: solid 1px #ffffff;\ntext-align: left;",
            "type" => "textarea",
            "info" => "Style the table header cells <code>&lt;th&gt;</code> ... <code>&lt;/th&gt;</code>"),

    array(    "name" => "Table Body Cells",
    	    "category" => "tables",
            "id" => $shortname."_table_td",
            "std" => "padding: 4px 8px;\nbackground-color: #ffffff;\nborder-bottom: 1px solid #dddddd;\ntext-align: left;",
            "type" => "textarea",
            "info" => "Style the regular table cells <code>&lt;td&gt;</code> ... <code>&lt;/td&gt;</code>"),

    array(    "name" => "Table Footer Cells",
    	    "category" => "tables",
            "id" => $shortname."_table_tfoot_td",
            "std" => "",
            "type" => "textarea",
            "info" => "You can style the table footer cells individually.<br /><br /><em>Or else they'll get the 
			same style as the Table Body Cells.</em>"),
			
    array(    "name" => "Zebra stripe all tables?",
    	    "category" => "tables",
            "id" => $shortname."_table_zebra_stripes",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Add a different style to every second row in <strong>all</strong> tables in posts and pages?<br /><br />
			Alternatively, set this to \"No\" and add the class <code>zebra</code> to individual tables that you want to 
			zebra stripe. Example: <br /><br /><code>&lt;table class=\"zebra\"&gt; ... &lt;/table&gt;</code>"),

    array(    "name" => "Zebra row TD style",
    	    "category" => "tables",
            "id" => $shortname."_table_zebra_td",
            "std" => "background: #f4f4f4;",
            "type" => "textarea",
            "info" => "If you chose to zebra stripe tables, set the style for the cells in every second row here."),
			
    array(    "name" => "Hover effect for all tables?",
    	    "category" => "tables",
            "id" => $shortname."_table_hover_rows",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Change the style of table rows when the mouse pointer hovers over them, for <strong>all</strong> 
			tables in posts and pages?<br /><br />Alternatively, set this to \"No\" and add the class <code>hover</code> 
			to individual tables that you want to apply the hover effect on. Example: <br /><br />
			<code>&lt;table class=\"hover\"&gt; ... &lt;/table&gt;</code><br /><br />Multiple classes can be added, too, 
			i.e. to add both the zebra and the hover effect to an individual table:<br /><br />
			<code>&lt;table class=\"zebra hover\"&gt; ... &lt;/table&gt;</code>"),

    array(    "name" => "Hover row TD style",
    	    "category" => "tables",
            "id" => $shortname."_table_hover_td",
            "std" => "background: #e2e2e2;",
            "type" => "textarea",
			"lastoption" => "yes", 
            "info" => "If you chose to use a hover efect for table rows, set the style for the cells in hovered table rows here."),

// New category: forms

    array(    "name" => "Form fields: Style",
    	    "category" => "forms",
			"switch" => "yes",
            "id" => $shortname."_form_input_field_style",
            "std" => "color: #000000;\nborder-top: solid 1px #333333;\nborder-left: solid 1px #333333;\n
			border-right: solid 1px #999999;\nborder-bottom: solid 1px #cccccc;",
            "type" => "textarea",
            "info" => "Style the text input fields and textareas in forms. "),

    array(    "name" => "Form fields: Background image",
    	    "category" => "forms",
           "id" => $shortname."_form_input_field_background",
            "std" => "inputbackgr.gif",
            "type" => "text", 
			"size" => "35", 
            "info" => "The \"shadow\" inside of text fields and texareas. <br /><br />Other available shadows are <code>inputbackgr-red.gif</code>, 
			<code>inputbackgr-green.gif</code> and <code>inputbackgr-blue.gif</code>, or upload you own image to atahualpa3/images/. 
			Leave blank to have no background image in form fields."),
			
    array(    "name" => "Highlight form fields?",
    	    "category" => "forms",
            "id" => $shortname."_highlight_forms",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Highlight form input fields when they get focus (when someone clicks into the field)?"),

    array(    "name" => "Highlight form fields: Style",
    	    "category" => "forms",
            "id" => $shortname."_highlight_forms_style",
            "std" => "background: #e8eff7;\nborder-color: #37699f;",
            "type" => "textarea",
            "info" => "If you chose \"Yes\" above, style the highlighted state of input fields here."),

    array(    "name" => "Submit Buttons: Default Style",
    	    "category" => "forms",
            "id" => $shortname."_button_style",
            "std" => "background-color: #777777;\ncolor: #ffffff;\nborder: solid 2px #555555;\nfont-weight: bold;",
            "type" => "textarea",
            "info" => "Style submit buttons in their <strong>default</strong> state."),

    array(    "name" => "Submit Buttons: Hover Style",
    	    "category" => "forms",
            "id" => $shortname."_button_style_hover",
            "std" => "background-color: #6b9c6b;\ncolor: #ffffff;\nborder: solid 2px #496d49;",
            "type" => "textarea",
			"lastoption" => "yes", 
            "info" => "Style submit buttons in their <strong>hover</strong> state."),

// New category: blockquotes

    array(    "name" => "Blockquotes: Style",
    	    "category" => "blockquotes",
			"switch" => "yes",
            "id" => $shortname."_blockquote_style",
            "std" => "color: #555555;\npadding: 1em 1em;\nbackground: #f4f4f4;\nborder: solid 1px #e1e1e1;",
            "type" => "textarea",
            "info" => "<img src=\"" . $stylesheet_directory . "/options/images/blockquotes.gif\" style=\"float: right; margin: 0 0 10px 10px;\">" . 
			"Style blockquotes. <br /><br /><strong>Example:</strong><br /><br /><code>font: italic 1.1em georgia, serif;<br />color: #336699;<br />
			padding: 0 1em;<br />background: #c9dbed;<br />border: dashed 5px #336699;</code><br /><br />Example Screenshot is from IE7. 
			It will look different on non-IE browsers."),
			
    array(    "name" => "Blockquotes in blockquotes: Style",
    	    "category" => "blockquotes",
            "id" => $shortname."_blockquote_style_2nd_level",
            "std" => "color: #444444;\npadding: 1em 1em;\nbackground: #e1e1e1;\nborder: solid 1px #d3d3d3;",
            "type" => "textarea",
			"lastoption" => "yes", 
            "info" => "Style blockquotes inside of blockquotes."),

// New category: images

    array(    "name" => "Images in Posts",
    	    "category" => "images",
			"switch" => "yes",
            "id" => $shortname."_post_image_style",
            "std" => "padding: 5px;\nborder: solid 1px #dddddd;\nbackground-color: #f3f3f3;\n-moz-border-radius: 3px;\n
			-khtml-border-radius: 3px;\n-webkit-border-radius: 3px;\nborder-radius: 3px;",
            "type" => "textarea",
            "info" => "Style images in posts, when they have no caption.<br /><br />The lines with \"radius\" create 
			rounded corners in Firefox and Safari.<br /><br />To remove the border around images, delete everything in this box."),
			
    array(    "name" => "Images in Posts: Caption Style",
    	    "category" => "images",
            "id" => $shortname."_post_image_caption_style",
            "std" => "border: 1px solid #dddddd;\ntext-align: center;\nbackground-color: #f3f3f3;\npadding-top: 4px;\n
			margin: 10px 0 0 0;\n-moz-border-radius: 3px;\n-khtml-border-radius: 3px;\n-webkit-border-radius: 3px;\nborder-radius: 3px;",
            "type" => "textarea",
            "info" => "Style the caption box for images in posts, that have a caption.<br /><br />The lines with \"radius\" 
			create rounded corners in Firefox and Safari.<br /><br />To remove the border around images with caption, delete everything in this box."),

    array(    "name" => "Caption Text: Style",
    	    "category" => "images",
            "id" => $shortname."_image_caption_text",
            "std" => "font-size: 0.8em;\nline-height: 13px;\npadding: 2px 4px 5px;\nmargin: 0;\ncolor: #666666;",
            "type" => "textarea",
			"lastoption" => "yes", 
            "info" => "Style the caption text."),

// New category: html-inserts

    array(    "name" => "HTML Inserts: Header",
    	    "category" => "html-inserts",
			"switch" => "yes",
            "id" => $shortname."_html_inserts_header",
            "std" => "",
            "type" => "textarea",
			"editable" => "yes", 
            "info" => "Add code here (JavaScript, HTML, CSS) that you want to put into the header section of the website, 
			between <code>&lt;head&gt;</code> and <code>&lt;/head&gt;</code>."),

    array(    "name" => "HTML Inserts: Body Tag",
    	    "category" => "html-inserts",
            "id" => $shortname."_html_inserts_body_tag",
            "std" => "",
            "type" => "textarea",
			"editable" => "yes", 
            "info" => "Add code here that you want to add to the opening body tag <code>&lt;body&gt;</code> of the website.<br /><br />
			<strong>Example:</strong><br /><br /><code>onLoad=\"alert('The page is loading... now!')\"</code><br />would result 
			in an output of<br /><code>&lt;body <i>onLoad=\"alert('The page is loading... now!')\"</i>&gt;</code><br />instead 
			of the regular<br /><code>&lt;body&gt;</code>"),

    array(    "name" => "HTML Inserts: Body Top",
    	    "category" => "html-inserts",
            "id" => $shortname."_html_inserts_body_top",
            "std" => "",
            "type" => "textarea",
			"editable" => "yes", 
            "info" => "Add code here (JavaScript, HTML, CSS) that you want to put into the body section of the website, between 
			<code>&lt;body&gt;</code> and <code>&lt;/body&gt;</code>, right after <code>&lt;body&gt;</code>."),

    array(    "name" => "HTML Inserts: Body Bottom",
    	    "category" => "html-inserts",
            "id" => $shortname."_html_inserts_body_bottom",
            "std" => "",
            "type" => "textarea",
			"editable" => "yes", 
            "info" => "Add code here (JavaScript, HTML, CSS) that you want to put into the body section of the website, 
			between <code>&lt;body&gt;</code> and <code>&lt;/body&gt;</code>, right before <code>&lt;/body&gt;</code>.<br /><br />
			<strong>Google Analytics</strong> code would go here, and most other tracking code probably too."),

    array(    "name" => "CSS Inserts",
    	    "category" => "html-inserts",
            "id" => $shortname."_html_inserts_css",
            "std" => "",
            "type" => "textarea",
			"editable" => "yes", 
			"lastoption" => "yes", 
            "info" => "Add CSS code here that you want to append to the theme's CSS file. <strong>Example</strong><br /><br />
			<code>.newclass {<br />color: #123456;<br />border: solid 1px #000000;<br />
			font-family: arial, \"comic sans ms\", sans-serif;<br />}</code>"),

// New category: Archives page

    array(    "name" => "Archives Page ID",
    	    "category" => "archives-page",
			"switch" => "yes",
           "id" => $shortname."_archives_page_id",
            "std" => "",
            "type" => "text",
			"size" => "5",
            "info" => "This theme has no Archives page by default but you can create a custom one:<ul>
			<li>Put the ID of an existing page into this field to make that page the Archives page.</li>
			<li>This can be an empty page or a page with content.</li><li>If the page has content, the archives 
			will be appended at the bottom.</li></ul>An Archives page is a \"Page\" page listing the links to 
			(usually: monthly) archives and the categories, similar to a sitemap, but usually without a list 
			of \"Page\" pages. The difference to the archive links or select menu in the sidebar is that the 
			links will be displayed as regular content in the middle column"),

    array(    "name" => "Show Archives by Date?",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_date_show",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Show archives by date?"),
			
    array(    "name" => "Archives by Date: Title",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_date_title",
            "std" => "Archives by Month",
            "type" => "text",
            "info" => "The headline for the yearly/monthly/daily/postbypost archives"),

    array(    "name" => "Archives by Date: Type",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_date_type",
            "type" => "select",
            "std" => "monthly",
            "options" => array("yearly", "monthly", "weekly", "daily", "postbypost"),
            "info" => "List the date based archives by year, month, week, day or post by post?"),

    array(    "name" => "Archives by Date: Limit",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_date_limit",
            "std" => "",
            "type" => "text",
            "info" => "Optional: Limit the amount of date based archive links. Leave blank for no limit. 
			<strong>Example:</strong> <code>30</code>"),

    array(    "name" => "Archives by Date: Show post count?",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_date_count",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Show the post count for each date based archive link? Won't be used if you chose \"postbypost\" above."),

    array(    "name" => "Show Archives by Category?",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_category_show",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Show archives by category?"),
			
    array(    "name" => "Archives by Category: Title",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_category_title",
            "std" => "Archives by Category",
            "type" => "text",
            "info" => "The headline for the category archives"),

    array(    "name" => "Archives by Category: Show post count?",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_category_count",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Display the post count after each category link?"),

    array(    "name" => "Archives by Category: Depth",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_category_depth",
            "type" => "select",
            "std" => "0",
            "options" => array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10"),
            "info" => "Limit the depth of category levels to be displayed. Choose 0 to display all categories (= no depth limit)"),

    array(    "name" => "Archives by Category: Order by",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_category_orderby",
            "type" => "select",
            "std" => "name",
            "options" => array("ID", "name", "count"),
            "info" => "Sort the category archive links by <ul><li><strong>ID</strong> - chronologically</li>
			<li><strong>name</strong> - alphabetically</li><li><strong>count</strong> - post count</li></ul>"),

    array(    "name" => "Archives by Category: Order",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_category_order",
            "type" => "select",
            "std" => "ASC",
            "options" => array("ASC", "DESC"),
            "info" => "Sort the category list<ul><li><strong>ASC</strong> - ascending</li>
			<li><strong>DESC</strong> - descending</li></ul>"),	

    array(    "name" => "Archives by Category: Feed Link",
    	    "category" => "archives-page",
           "id" => $shortname."_archives_category_feed",
            "type" => "select",
            "std" => "No",
            "options" => array("Yes", "No"),
			"lastoption" => "yes", 
            "info" => "Show a linked RSS icon after each category link?"),			
);

// Merge arrays to get different options sets for WP 2.7+ (with new paged comments settings) and WP 2.6 and older 
if (function_exists('wp_list_comments')) {
$options = array_merge($options1, $options2, $options3);  // WP 2.7 and newer
} else {
$options = array_merge($options1, $options3);  // WP 2.6 and older
}

?>