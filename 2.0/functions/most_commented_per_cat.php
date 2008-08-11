<?php
/*
Plugin Name: Most Commented Per Cat
Plugin URI: http://mtdewvirus.com/code/wordpress-plugins/
Description: Retrieves a list of the posts with the most comments per Cat. Modified for Last X days -- by DJ Chuang www.djchuang.com. Modified for Per Category by wordpress.bytesforall.com 
Version: 1.5
Author: Nick Momrik
Author URI: http://mtdewvirus.com/
*/

function mdv_most_commented_per_cat($no_posts = 5, $before = '<li>', $after = '</li>', $show_pass_post = false, $duration='', $cat_id = 1) {
    global $wpdb;
	
	$mdv_most_commented_per_cat = wp_cache_get('mdv_most_commented_per_cat');
	if ($mdv_most_commented_per_cat === false) {
		
		$request = "SELECT DISTINCT ID, post_title, comment_count FROM $wpdb->posts as p";
		$request .= " INNER JOIN $wpdb->term_relationships AS tr ON";
		$request .= " (p.ID = tr.object_id AND";
#		$request .= " tr.term_taxonomy_id IN (3,5,6,7) )";
		$request .= " tr.term_taxonomy_id = $cat_id )";
		$request .= " INNER JOIN $wpdb->term_taxonomy AS tt ON";
		$request .= " (tr.term_taxonomy_id = tt.term_taxonomy_id AND";
		$request .= " taxonomy = 'category')";
		$request .= " WHERE post_status = 'publish' AND comment_count > 0";
		if (!$show_pass_post) $request .= " AND post_password =''";
	
		if ($duration !="") $request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
	
		$request .= " ORDER BY comment_count DESC LIMIT $no_posts";
		$posts = $wpdb->get_results($request);

		if ($posts) {
			foreach ($posts as $post) {
				$post_title = stripslashes($post->post_title);
				$comment_count = $post->comment_count;
				$permalink = get_permalink($post->ID);
				$mdv_most_commented_per_cat .= $before . '<a href="' . $permalink . '" title="' . $post_title.'">' . $post_title . ' (' . $comment_count . ')</a>' . $after;
			}
		} else {
#			$mdv_most_commented_per_cat .= $before . "None found" . $after;
			$mdv_most_commented_per_cat = "None found";
		}
	
		wp_cache_set('mdv_most_commented_per_cat', $mdv_most_commented_per_cat);
	} 

    return $mdv_most_commented_per_cat;
}
?>