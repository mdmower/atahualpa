<?php
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name'=>'Left Sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
         'name'=>'Right Sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));  
} ?>
<?php if (eregi('^(2|3)\.(2|3|5)', get_bloginfo('version'))) {  // If Wordpress version number starts with "2.2" or higher ?>
<?php 
function widget_pages( $args ) {
	extract( $args );
	$options = get_option( 'widget_pages' );
	$title = empty( $options['title'] ) ? __( 'Pages' ) : $options['title'];
	$sortby = empty( $options['sortby'] ) ? 'menu_order' : $options['sortby'];
	$exclude = empty( $options['exclude'] ) ? '' : $options['exclude'];
	if ( $sortby == 'menu_order' ) {
		$sortby = 'menu_order, post_title';
	}
	$out = wp_list_pages( array('title_li' => '', 'echo' => 0, 'sort_column' => $sortby, 'exclude' => $exclude) );
	if ( !empty( $out ) ) {
?>
	<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title; ?>
		<ul>
			<?php echo $out; ?>
		</ul>
	<?php echo $after_widget; ?>
<?php
	}
}
function widget_pages_control() {
	$options = $newoptions = get_option('widget_pages');
	if ( $_POST['pages-submit'] ) {
		$newoptions['title'] = strip_tags(stripslashes($_POST['pages-title']));
		$sortby = stripslashes( $_POST['pages-sortby'] );
		if ( in_array( $sortby, array( 'post_title', 'menu_order', 'ID' ) ) ) {
			$newoptions['sortby'] = $sortby;
		} else {
			$newoptions['sortby'] = 'menu_order';
		}
		$newoptions['exclude'] = strip_tags( stripslashes( $_POST['pages-exclude'] ) );
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_pages', $options);
	}
	$title = attribute_escape($options['title']);
	$exclude = attribute_escape( $options['exclude'] );
?>
			<p><label for="pages-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="pages-title" name="pages-title" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="pages-sortby"><?php _e( 'Sort by:' ); ?>
				<select name="pages-sortby" id="pages-sortby">
					<option value="post_title"<?php selected( $options['sortby'], 'post_title' ); ?>><?php _e('Page title'); ?></option>
					<option value="menu_order"<?php selected( $options['sortby'], 'menu_order' ); ?>><?php _e('Page order'); ?></option>
					<option value="ID"<?php selected( $options['sortby'], 'ID' ); ?>><?php _e( 'Page ID' ); ?></option>
				</select></label></p>
			<p><label for="pages-exclude"><?php _e( 'Exclude:' ); ?> <input type="text" value="<?php echo $exclude; ?>" name="pages-exclude" id="pages-exclude" style="width: 180px;" /></label><br />
			<small><?php _e( 'Page IDs, separated by commas.' ); ?></small></p>
			<input type="hidden" id="pages-submit" name="pages-submit" value="1" />
<?php
}
function widget_search($args) {
	extract($args);
?>
		<?php echo $before_widget; ?>
<form method="get" class="searchform" action="<?php bloginfo('url'); ?>/">
<div style="margin: 15px 0;"><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input type="image" src="<?php echo get_bloginfo('template_directory'); ?>/images/search.gif" style="border:none; vertical-align: bottom; margin-right: 0;" id="searchsubmit" value="Search" />
</div>
</form>
		<?php echo $after_widget; ?>
<?php
}
function widget_meta($args) {
	extract($args);
	$options = get_option('widget_meta');
	$title = empty($options['title']) ? __('Meta') : $options['title'];
?>
		<?php echo $before_widget; ?>
			<?php echo $before_title . $title . $after_title; ?>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
		<?php echo $after_widget; ?>
<?php
}
function widget_meta_control() {
	$options = $newoptions = get_option('widget_meta');
	if ( $_POST["meta-submit"] ) {
		$newoptions['title'] = strip_tags(stripslashes($_POST["meta-title"]));
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_meta', $options);
	}
	$title = attribute_escape($options['title']);
?>
			<p><label for="meta-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="meta-title" name="meta-title" type="text" value="<?php echo $title; ?>" /></label></p>
			<input type="hidden" id="meta-submit" name="meta-submit" value="1" />
<?php
}


	$dims150 = array( 'height' => 150, 'width' => 300 );
	$class = array('classname' => 'widget_pages');
	register_sidebar_widget('Pages','widget_pages', $class);
	register_widget_control('Pages','widget_pages_control', $dims150);
	$class['classname'] = 'widget_search';
	register_sidebar_widget('Search','widget_search', $class);   
	$class['classname'] = 'widget_meta';
	register_sidebar_widget('Meta','widget_meta', $class);  
	register_widget_control('Meta','widget_meta_control', $dims150); 
?>
<?php
/*
Plugin Name: Subpages widget
Description: Adds a subpages menu to your sidebar if subpages are present.
Author: Michael Wender
Version: 1.0
Plugin URI: http://wenderhost.com/downloads/wordpress-plugins/subpages-widget/
Author URI: http://michaelwender.com
*/
function widget_subpages_init() {
	// Check for the required plugin functions. This will prevent fatal
	// errors occurring when you deactivate the dynamic-sidebar plugin.
	if ( !function_exists('register_sidebar_widget') )
		return;	
	register_deactivation_hook( __FILE__ , 'delete_widget_subpages_options'); //removing the options from the option table
	
	
	function widget_subpages($args){
		extract($args);
		$options = get_option('widget_subpages');
		$top_id = widget_subpages_top_parent_page();
		$top_page = get_post($top_id);
		$top_title = $top_page->post_title; 
		$top_permalink = get_permalink($top_page->ID);
		(!empty($options['sort_column']))? $sort_column = $options['sort_column'] : $sort_column = 'menu_order';
		$sub_pages = wp_list_pages('sort_column=' .$sort_column. '&title_li=&echo=0&child_of=' .$top_id);
		if ($sub_pages <> "" ){
			echo $before_widget;
#			echo $before_title . '<span id="subpages-title"><a href="' .$top_permalink. '">' .$top_title. '</a> &raquo;</span>' . $after_title;
			echo $before_title . '<span id="subpages-title">' .$top_title. ' &raquo;</span>' . $after_title;
		?>
			<ul id="subpages"><?php echo $sub_pages; ?></ul>
		<?php 
			echo $after_widget;
			
			if(is_array($options)){
				if($options['divider'] == true) echo '<li class="subpages-divider" style="' .$options['divider_style']. '">&nbsp;</li>' . "\n";
			}
		}
	}

	function widget_subpages_top_parent_page(){
		global $post;
		$widget_subpages_post = $post;
		$topparentpageid = $widget_subpages_post->ID;
		$widget_subpages_post_parent_id = $widget_subpages_post->post_parent;
		while ($widget_subpages_post_parent_id) {
			$widget_subpages_post = &get_post($widget_subpages_post_parent_id);
			$topparentpageid = $widget_subpages_post->ID;
			$widget_subpages_post_parent_id = $widget_subpages_post->post_parent;
		}
		return $topparentpageid;
	}
	
	// This registers the widget so it appears with the other available
	// widgets and can be dragged and dropped into any active sidebars.
	register_sidebar_widget(array('Subpages', 'widgets'), 'widget_subpages');
	
	function widget_subpages_options(){
		// Get our options and see if we're handling a form submission.
		$options = get_option('widget_subpages');
		if ( !is_array($options) )
			$options = array('divider'=>'', 'divider_style'=> '');
		if ( $_POST['widget_subpages-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['sort_column'] = $_POST['widget_subpages-sort_column'];
			$options['divider'] = strip_tags(stripslashes($_POST['widget_subpages-divider']));
			$options['divider_style'] = strip_tags(stripslashes($_POST['widget_subpages-divider_style']));
			update_option('widget_subpages', $options);
		}

		// Be sure you format your options to be valid HTML attributes.
		if(!empty($options['sort_column'])){
			if($options['sort_column'] == 'post_title'){
				$menu_order_checked = '';
				$post_title_checked = ' checked="checked"';
			} else {
				$menu_order_checked = ' checked="checked"';
				$post_title_checked = '';			
			}
		} else {
			$menu_order_checked = ' checked="checked"';
		}
		if($options['divider'] == 1) $checked = ' checked="checked"';
		$divider_style = htmlspecialchars($options['divider_style'], ENT_QUOTES);
		
		echo '<p style="text-align:left;"><label for="widget_subpages-sort_column">' . __('Sort subpages by:'). "\n";
		echo '<br />Menu Order: <input id="widget_subpages-sort_column1" name="widget_subpages-sort_column" type="radio" value="menu_order"' .$menu_order_checked. '/>' . "\n"; 
		echo '<br />Page Title: <input id="widget_subpages-sort_column2" name="widget_subpages-sort_column" type="radio" value="post_title"' .$post_title_checked. '/></label></p>' . "\n";
		echo '<p style="text-align:left;"><label for="widget_subpages-divider">' . __('Use divider:') . ' <input id="widget_subpages-divider" name="widget_subpages-divider" type="checkbox" value="1"' .$checked. '/></label><br />(Adds a visual divider beneath the subpages sidebox.)</p>';
		echo '<p style="text-align:left;"><label for="widget_subpages-divider_style">' . __('Divider CSS Styles:', 'widgets') . ' <input style="width: 350px;" id="widget_subpages-divider_style" name="widget_subpages-divider_style" type="text" value="'.$divider_style.'" /></label></p>';
		echo '<input type="hidden" id="widget_subpages-submit" name="widget_subpages-submit" value="1" />';		
	}
	register_widget_control(array('Subpages', 'widgets'), 'widget_subpages_options', 400, 200);
		
	function delete_widget_subpages_options(){
		/* hooks submitted upon deactivation*/
		delete_option('widget_subpages');
	}			

}
add_action('widgets_init', 'widget_subpages_init');
?>
<?php
/**
 * If more than one page exists, return TRUE.
 */
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1) ? TRUE : FALSE;
}
?>
<?php } // "if Wordpress 2.2.x or newer" ends here ?>
<?php
include (TEMPLATEPATH . '/functions/simple_recent_comments.php');
include (TEMPLATEPATH . '/functions/most_commented.php');
include (TEMPLATEPATH . '/functions/most_commented_per_cat.php');
?>
<?php 
function bfa_add_stuff_admin_head() {
    $url_base = get_bloginfo('template_directory');
	echo "<script src=\"$url_base/options/jscolor/jscolor.js\" type=\"text/javascript\"></script>\n";
}
add_action('admin_head', 'bfa_add_stuff_admin_head');
?>
<?php
$themename = "Atahualpa";
$shortname = "ata";
$options = array (

    array(    "name" => "Homepage Meta Description",
            "id" => $shortname."_homepage_meta_description",
            "std" => "",
            "type" => "textarea",
            "info" => "Type 1-3 sentences, about 20-30 words total. Will be used as Meta Description for (only) the homepage. If left blank, no Meta Description will be added to the homepage. <strong>Example:</strong> <em>Comprehensive real estate and property listings. Includes information on buying and selling, tips on building, an auction timetable and other helpful information.</em>"),    

    array(    "name" => "Homepage Meta Keywords",
            "id" => $shortname."_homepage_meta_keywords",
            "std" => "",
            "type" => "textarea",
            "info" => "Type 5-30 words or phrases, separated by comma. Will be used as the Meta Keywords for (only) the homepage. If left blank, no Meta Keywords will be added to the homepage. <strong>Example:</strong> <em>real estate, property listings, buying, selling, tips, building, auction, information</em>"),

     array(    "name" => "Meta Title Tag format",
    	    "category" => "seo",
            "id" => $shortname."_add_blogtitle",
            "type" => "select",
            "std" => "Page Title - Blog Title",
            "options" => array("Page Title - Blog Title", "Blog Title - Page Title", "Page Title"),
            "info" => "Show the blog title in front of or after the page title, in the meta title tag of every page? Or, show only the page title?"),

     array(    "name" => "Meta Title Tag Separator",
    	    "category" => "seo",
            "id" => $shortname."_title_separator_code",
            "type" => "select",
            "std" => "1",
            "options" => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13"),
            "info" => "If you selected to include the blog title in the meta title (the option above), choose here what to put BETWEEN the page and the blog title (or vice versa): 1( &#171; ),  2( &#187; ),  3( &#58; ),  4(&#58; ),  5( &#62; ),  6( &#60; ),  7( &#45; ),  8( &#8249; ),  9( &#8250; ),  10( &#8226; ), 11( &#183; ), 12( &#151; ) or 13( &#124; )."),
 
     array(    "name" => "Noindex Date Archive-Pages?",
            "id" => $shortname."_archive_noindex",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Include meta tag \"noindex, follow\" into date based archive pages? The purpose is to keep search engines from spidering duplicate content from your site. Default is <strong>Yes</strong>"),

     array(    "name" => "Noindex Category & Tags pages?",
            "id" => $shortname."_cat_tag_noindex",
            "type" => "select",
            "std" => "No",
            "options" => array("Yes", "No"),
            "info" => "Include meta tag \"noindex, follow\" into category & tag pages? The purpose is to keep search engines from spidering duplicate content from your site. Default is <strong>No</strong> (Meaning the \"noindex\" meta tag will NOT be set, and the pages will be indexed)"),

     array(    "name" => "Nofollow RSS, trackback & admin links?",
            "id" => $shortname."_nofollow",
            "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Make RSS, trackback & admin links \"nofollow\"? Same purpose as above. Default is <strong>Yes</strong>"),



    array(    "name" => "Body Font",
            "id" => $shortname."_body_font",
            "type" => "select",
            "std" => "Tahoma",
            "options" => array("Tahoma", "Arial", "Calibri", "Cambria", "Candara", "Comic Sans MS", "Consolas", "Constantia", "Corbel", "Courier New", "Georgia", "Times New Roman", "Trebuchet MS", "Verdana"),
            "info" => "The font face for the main content. The fonts starting with \"C\" (except Comic Sans and Courier New) are installed on Computers running Windows Vista. If you choose a Vista font here (recommended, because they're \"fresh\"), choose an Windows XP font (all other fonts in the list) in the section below, as backup for XP users. The \"serif\" or \"sans-serif\" part in the next option will cover all other website visitors, i.e Mac and Linux users. Google Adsense uses Arial, so if you want to blend in Adsense as much as possible you should use Arial here, even though that is a quite often used font face. Default: <strong>Tahoma</strong>"),

    array(    "name" => "Body Backup Font",
            "id" => $shortname."_body_backup_font",
            "type" => "select",
            "std" => "Arial, sans-serif",
            "options" => array("Arial, sans-serif", "Calibri, sans-serif", "Cambria, serif", "Candara, sans-serif", "Comic Sans MS, sans-serif", "Consolas, sans-serif", "Constantia, serif", "Corbel, sans-serif", "Courier New, sans-serif", "Georgia, serif", "Tahoma, sans-serif", "Times New Roman, serif", "Trebuchet MS, sans-serif", "Verdana, sans-serif"),
            "info" => "Show this font for users that don't have the main font face (option above) installed on their computer. I.e., if you've chosen Calibri as the main font, you could choose \"Arial, sans-serif\" as the backup font, for a consistent typographical look for all website visitors."),
                                             
    array(    "name" => "Link Default Color",
            "id" => $shortname."_link_color",
            "std" => "666666",
            "type" => "text",
            "info" => "All hex color codes. Default: <strong>666666</strong>"),

    array(    "name" => "Link Hover Color",
            "id" => $shortname."_link_hover_color",
            "std" => "cc0000",
            "type" => "text",
            "info" => "Color of links when \"hovering\" over them with the mouse pointer. All hex color codes. Default: <strong>cc0000</strong>"),

    array(    "name" => "Link Default Decoration",
            "id" => $shortname."_link_default_decoration",
            "type" => "select",
            "std" => "none",
            "options" => array("none", "underline"),
            "info" => "Underline links or not. Default: <strong>none</strong>"),

    array(    "name" => "Link Hover Decoration",
            "id" => $shortname."_link_hover_decoration",
            "type" => "select",
            "std" => "underline",
            "options" => array("underline", "none"),
            "info" => "When the mouse pointer hovers over a link, underline it or not. Default: <strong>underline</strong>"),        

    array(    "name" => "Link Text Bold or Not",
            "id" => $shortname."_link_weight",
            "type" => "select",
            "std" => "bold",
            "options" => array("bold", "normal"),
            "info" => "Make link text bold or not. Default: <strong>bold</strong>"),

    array(    "name" => "Show Logo Icon?",
            "id" => $shortname."_show_logo_icon",
             "type" => "select",
            "std" => "Yes",
            "options" => array("Yes", "No"),
            "info" => "Show the graphic on the left hand side of the blog title? Default: <strong>Yes</strong>. To use your own graphic, leave this option at <strong>Yes</strong> and Upload a \"logosymbol.gif\" with the size of 50x50 pixels and white background to <strong>/wp-content/themes/atahualpa/images/</strong>"),
                                            
    array(    "name" => "Blog Title Color",
            "id" => $shortname."_blog_title_color",
            "std" => "666666",
            "type" => "text",
            "info" => "All hex color codes. Default: <strong>666666</strong>"),

    array(    "name" => "Blog Title Hover Color",
            "id" => $shortname."_blog_title_hover_color",
            "std" => "000000",
            "type" => "text",
            "info" => "Color when hovering over the blog title. All hex color codes. Default: <strong>000000</strong>"),
            
    array(    "name" => "Blog Tagline Color",
            "id" => $shortname."_blog_tagline_color",
            "std" => "666666",
            "type" => "text",
            "info" => "All hex color codes. Default: <strong>666666</strong>"),

    array(    "name" => "Blog Title Font",
            "id" => $shortname."_blog_title_font",
            "type" => "select",
            "std" => "Tahoma",
            "options" => array("Tahoma", "Arial", "Calibri", "Cambria", "Candara", "Comic Sans MS", "Consolas", "Constantia", "Corbel", "Courier New", "Georgia", "Times New Roman", "Trebuchet MS", "Verdana"),
            "info" => "The font face for the blog title."),

    array(    "name" => "Blog Title Backup Font",
            "id" => $shortname."_blog_title_backup_font",
            "type" => "select",
            "std" => "Arial, sans-serif",
            "options" => array("Arial, sans-serif", "Calibri, sans-serif", "Cambria, serif", "Candara, sans-serif", "Comic Sans MS, sans-serif", "Consolas, sans-serif", "Constantia, serif", "Corbel, sans-serif", "Courier New, sans-serif", "Georgia, serif", "Tahoma, sans-serif", "Times New Roman, serif", "Trebuchet MS, sans-serif", "Verdana, sans-serif"),
            "info" => "The backup font for the blog title, for visitors that don't have the default font (see one option above) available on their computer."),

    array(    "name" => "Blog Title Font Size",
            "id" => $shortname."_blog_title_fontsize",
            "std" => "2.5",
            "type" => "text",
            "info" => "All numeric values such as <strong>2.5</strong>, <strong>3</strong> or <strong>1.92</strong>. Default: <strong>2.5</strong>"),
 
    array(    "name" => "Header Image Height",
            "id" => $shortname."_headerimage_height",
            "std" => "150",
            "type" => "text",
            "info" => "Visible height of the header image, in pixels. You might need to edit this if you upload your own, bigger or smaller header image. This value does not need to match the actual image height. Only the top XXX pixels will be shown, the rest will be hidden. Default: <strong>150</strong>"),

    array(    "name" => "Header Image Opacity",
            "id" => $shortname."_header_opacity",
            "std" => "40",
            "type" => "text",
            "info" => "Opacity overlay for the left and right hand side of the header image. Numeric values between 0 and 99. Put 0 here to remove the Opacity. Default: <strong>40</strong>. "),
                    
     array(    "name" => "Left sidebar width",
            "id" => $shortname."_leftcolumn_width",
            "std" => "15",
            "type" => "text",
            "info" => "Numbers between 10-25 make sense. Default: <strong>15</strong>. Put 0 here to make the left sidebar dissapear. You'll have a 2 column layout then."),
                                                           
     array(    "name" => "Right sidebar width",
            "id" => $shortname."_rightcolumn_width",
            "std" => "15",
            "type" => "text",
            "info" => "Numbers between 10-25 make sense. Default: <strong>15</strong>. Put 0 here to make the right sidebar dissapear. You'll have a 2 column layout then."),

     array(    "name" => "Copyright start year",
           "id" => $shortname."_copyright_start_year",
            "std" => "",
            "type" => "text",
            "info" => "Start year for copyright notice at bottom of page: &copy; <strong>XXXX</strong> - [current year]. (The current year will be included automatically). Default: blank. Example: If you put <strong>2006</strong> into this field, then in 2008 it will read \"2006-2008\" on your page, and on 1-1-2009 it will change to \"2006-2009\", and so on"),
);
function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                header("Location: themes.php?page=functions.php&saved=true");
                die;
        } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] ); }
            header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }
    add_theme_page($themename." Options", "Atahualpa Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>
<form method="post">
<table class="optiontable">
<?php foreach ($options as $value) {
if ($value['type'] == "text") { ?>
<tr valign="top">
    <th scope="row"><?php echo $value['name']; ?>:</th>
    <td>
        <input <?php if (eregi("color", $value['id'])) { ?>class="color" <?php } ?>name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
    </td>
    <td>
    <?php echo $value['info']; ?>
    </td>
</tr>
<?php } elseif ($value['type'] == "textarea") { ?>
<tr valign="top">
    <th scope="row"><?php echo $value['name']; ?>:</th>
    <td>
        <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="30" rows="6"><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea>
    </td>
    <td>
    <?php echo $value['info']; ?>
    </td>
</tr>
<?php } elseif ($value['type'] == "select") { ?>
    <tr valign="top">
        <th scope="row"><?php echo $value['name']; ?>:</th>
        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
        </td>
        <td>
        <?php echo $value['info']; ?>
        </td>
    </tr>
<?php
}
}
?>
</table>
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>
<?php
function is_last_post()
{
	global $wp_query;
	return ($wp_query->current_post == $wp_query->post_count - 1);
}
?>