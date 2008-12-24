<?php
function image_files($matches) {
return '<img src="' . get_bloginfo('template_directory') . '/images/icons/' . $matches[1] . '" alt="" />';
}

function postinfo($postinfo_string) {

# put date format escape backslashes back in
$postinfo_string = bfa_unescape_date_format_slashes($postinfo_string);

# get all the data for the current post
//$post_id = $wp_query->get_queried_object_id();
$post_id = $post->ID;
$post_data = get_post($post_id, ARRAY_A);
$post_title = $post_data['post_title'];
$post_author_id = $post_data['post_author'];
$post_comment_count = $post_data['comment_count'];
$post_comment_status = $post_data['comment_status'];
// This may not work for imported posts:
// $post_permalink = $post_data['guid'];
$post_permalink = get_permalink($post_id);
$post_date = $post_data['post_date'];
#$post_date = date("Y m d",strtotime($post->post_date))

if (strpos($postinfo_string,'%tags')!==false) {
######## TAGS ########
$tag_options = preg_match("/(.*)%tags\('(.*?)'(.*?)'(.*?)'(.*?)'(.*?)'(.*)/i",$postinfo_string,$tag_matches);
$tag_link_options = preg_match("/(.*)%tags-linked\('(.*?)'(.*?)'(.*?)'(.*?)'(.*?)'(.*)/i",$postinfo_string,$tag_link_matches);
// tags-linked
if (get_the_tag_list()) {$tags_linked = get_the_tag_list($tag_link_matches[2], $tag_link_matches[4], $tag_link_matches[6]);} 
else { $tags_linked = ""; }
// tags
$posttags = get_the_tags();
if ($posttags) { foreach($posttags as $tag) {
$tag_list .= $tag->name . $tag_matches[4]; 
}
// remove last separator
$tag_list = preg_replace("/".$tag_matches[4]."$/mi", "", $tag_list);
$tags = $tag_matches[2] . $tag_list . $tag_matches[6];
} else { $tags = ""; }
}

if (strpos($postinfo_string,'%author')!==false) {
######### AUTHOR ########
$author_name = get_author_name($post_author_id);
$author_url = get_author_posts_url($post_author_id, $author_name);
// author-linked
$author_linked = '<a href="' . $author_url . '">' . $author_name . '</a>';
// author 
$author = $author_name;
}

if (strpos($postinfo_string,'%date(')!==false) {
######## DATE ########
$date_param = preg_match("/(.*)\%date\('(.*?)'\)(.*)/i",$postinfo_string,$date_matches);
# This works, but not with localization:
#$date = date("$date_matches[2]",strtotime($post_date));
#$date = mysql2date($date_matches[2], date('Y-m-d H:i:s',strtotime($post_date)));
#$date = mysql2date($date_matches[2], $post_date);
$date = mysql2date($date_matches[2], get_the_time('Y-m-d H:i:s'));
}

if (strpos($postinfo_string,'%category')!==false) {
######## CATEGORY ########
// category
$all_categories = get_the_category(); 
$category = $all_categories[0]->cat_name;
$category_notlinked = $category;  
// category-linked
$category_linked = '<a href="' . get_category_link($all_categories[0]->cat_ID) . '">' . $category . '</a>';
}

if (strpos($postinfo_string,'%categories')!==false) {
######## CATEGORIES ########
$category_separator = preg_match("/(.*)%categories\('(.*?)'\)(.*)/i",$postinfo_string,$category_matches);
$category_linked_separator = preg_match("/(.*)%categories-linked\('(.*?)'\)(.*)/i",$postinfo_string,$category_linked_matches);
$categories = "";
$categories_linked = "";
foreach((get_the_category()) as $category) { 
// categories
$categories .= $category->cat_name . $category_matches[2]; 
// categories-linked
$categories_linked .= '<a href="' . get_category_link($category->cat_ID) . '">' . $category->cat_name . '</a>' . $category_linked_matches[2];
} 
// remove last separator
$categories = preg_replace("/".$category_matches[2]."$/mi", "", $categories);
$categories_linked = preg_replace("/".$category_linked_matches[2]."$/mi", "", $categories_linked);
}

if (strpos($postinfo_string,'%comments(')!==false) {
######## COMMENTS ########
$comment_options = preg_match("/(.*)%comments\('(.*?)'(.*?)'(.*?)'(.*?)'(.*?)'(.*?)'(.*?)'(.*)/i",$postinfo_string,$comment_matches);

if ($post_comment_count == 0) { $comment_link_anchor = $comment_matches[2]; } 
elseif ($post_comment_count == 1) { $comment_link_anchor = $comment_matches[4]; } 
elseif ($post_comment_count > 1) { $comment_link_anchor = str_replace("%", $post_comment_count, $comment_matches[6]); } 
elseif ($post_comment_status == "closed") { $comment_link_anchor = $comment_matches[8]; }

if ($post_comment_status == "closed") { $comment_link = $comment_matches[8]; } 
else { $comment_link = '<a href="' . get_permalink() . '#comments">' . $comment_link_anchor . '</a>'; }
}

if (strpos($postinfo_string,'%comments-rss')!==false) {
######## COMMENTS RSS #####
$comments_rss_url = comments_rss();
$comments_rss_link_text = preg_match("/(.*)%comments-rss\('(.*?)'(.*)/i",$postinfo_string,$comments_rss_matches);
$comments_rss_link = '<a href="' . $comments_rss_url .'"';
global $options; if (get_option('bfa_ata_nofollow') == "Yes") {
$comments_rss_link .= ' rel="nofollow"';
}
$comments_rss_link .= '>' . $comments_rss_matches[2] . '</a>';
}

if (strpos($postinfo_string,'%trackback(')!==false) {
######## TRACKBACK ########
$trackback_url = trackback_url(false);
$trackback_link_text = preg_match("/(.*)%trackback\('(.*?)'(.*)/i",$postinfo_string,$trackback_matches);
$trackback_link = '<a href="' . $trackback_url . '">' . $trackback_matches[2] . '</a>';
}

if (strpos($postinfo_string,'%edit(')!==false) {
######## EDIT ########
$edit_options = preg_match("/(.*)%edit\('(.*?)'(.*?)'(.*?)'(.*?)'(.*?)'(.*)/i",$postinfo_string,$edit_matches);
$edit_link = get_edit_post_link( $post->ID );
if ( !current_user_can( 'edit_page', $post->ID )) { $edit = ""; } 
else { $edit = $edit_matches[2] . '<a href="' . $edit_link . '">' . $edit_matches[4] . '</a>' . $edit_matches[6]; }
}

if (strpos($postinfo_string,'%print(')!==false) {
######## PRINT ########
$print_text = preg_match("/(.*)%print\('(.*?)'(.*)/i",$postinfo_string,$print_text_matches);
$print_link = '<a href="javascript:window.print()">' .$print_text_matches[2]. '</a>';
}

if (strpos($postinfo_string,'%wp-email')!==false) {
######## EMAIL ########
$wp_email = ( function_exists('wp_email') ? email_link($email_post_text = '', $email_page_text = '', $echo = false) : "" );
}

if (strpos($postinfo_string,'%wp-print')!==false) {
######## WP-PRINT ########
$wp_print = ( function_exists('wp_print') ? print_link($print_post_text = '', $print_page_text = '', $echo = false) : "" );
}

if (strpos($postinfo_string,'%wp-postviews')!==false) {
######## WP-POSTVIEWS ########
$wp_postviews = ( function_exists('the_views') ? the_views($display = false) : "" );
}

if (strpos($postinfo_string,'%sociable')!==false) {
######## SOCIABLE ########
$sociable = ( (function_exists('sociable_html2') AND function_exists('sociable_html'))? $sociable = sociable_html2() : "" );
}




$postinfo = $postinfo_string;
$postinfo = preg_replace("/(.*)%tags\((.*?)\)%(.*)/i", "\${1}" .$tags. "\${3}", $postinfo);
$postinfo = preg_replace("/(.*)%tags-linked\((.*?)\)%(.*)/i", "\${1}" .$tags_linked. "\${3}", $postinfo);
$postinfo = str_replace("%author%", $author, $postinfo);
$postinfo = str_replace("%author-linked%", $author_linked, $postinfo);
$postinfo = preg_replace("/(.*)%date\((.*?)\)%(.*)/i", "\${1}" .$date. "\${3}", $postinfo);
$postinfo = str_replace("%category%", $category_notlinked, $postinfo);
$postinfo = str_replace("%category-linked%", $category_linked, $postinfo);
$postinfo = preg_replace("/(.*)%categories\((.*?)\)%(.*)/i", "\${1}" .$categories. "\${3}", $postinfo);
$postinfo = preg_replace("/(.*)%categories-linked\((.*?)\)%(.*)/i", "\${1}" .$categories_linked. "\${3}", $postinfo);
$postinfo = preg_replace("/(.*)%comments\((.*?)\)%(.*)/i", "\${1}" .$comment_link. "\${3}", $postinfo);
$postinfo = preg_replace("/(.*)%comments-rss\((.*?)\)%(.*)/i", "\${1}" .$comments_rss_link. "\${3}", $postinfo);
$postinfo = str_replace("%trackback%", $trackback_url, $postinfo);
$postinfo = preg_replace("/(.*)%trackback-linked\((.*?)\)%(.*)/i", "\${1}" .$trackback_link. "\${3}", $postinfo);
$postinfo = preg_replace("/(.*)%edit\((.*?)\)%(.*)/i", "\${1}" .$edit. "\${3}", $postinfo);
$postinfo = preg_replace("/(.*)%print\((.*?)\)%(.*)/i", "\${1}" .$print_link. "\${3}", $postinfo);
$postinfo = str_replace("%wp-print%", $wp_print, $postinfo);
$postinfo = str_replace("%wp-email%", $wp_email, $postinfo);
$postinfo = str_replace("%wp-postviews%", $wp_postviews, $postinfo);
$postinfo = str_replace("%sociable%", $sociable, $postinfo);

if (strpos($postinfo_string,'<image(')!==false) {
// images
$postinfo = preg_replace_callback("|<image\((.*?)\)>|","image_files",$postinfo);
}

return $postinfo;
}
?>