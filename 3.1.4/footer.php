<?php
global $options;
foreach ($options as $value) { if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } }
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
		</td>
		<!-- / Main Column -->	

		<?php if ( $right_col == "on" ) { ?>
		<!-- Right Sidebar -->
		<td id="right">

			<?php // Widgetize the Right Sidebar 
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : 	
			endif; ?>

		</td>
		<!-- / Right Sidebar -->
		<?php } ?>

	</tr>
	<!-- / Main Body -->

	<tr>

		<!-- Footer -->
		<td id="footer" colspan="<?php echo $cols; ?>">	

		<p>
		<?php echo bfa_footer($bfa_ata_footer_style_content); ?>
		</p>
		<?php if ($bfa_ata_footer_show_queries == "Yes - visible") { ?>
		<p>
		<?php echo $wpdb->num_queries; ?><?php _e(' queries. ','atahualpa'); ?><?php timer_stop(1); ?><?php _e(' seconds.','atahualpa'); ?>
		</p>
		<?php } ?>
		
		<?php if ($bfa_ata_footer_show_queries == "Yes - in source code") { ?>
		<!--
		<?php echo $wpdb->num_queries; ?><?php _e(' queries. ','atahualpa'); ?><?php timer_stop(1); ?><?php _e(' seconds.','atahualpa'); ?>
		-->
		<?php } ?>		
	
		<?php wp_footer(); ?>
		</td>
		<!-- / Footer -->
		
	</tr>
</table><!-- / layout -->
</div><!-- / container -->
</div><!-- / wrapper -->
<?php echo ($bfa_ata_html_inserts_body_bottom != "" ? apply_filters(widget_text, $bfa_ata_html_inserts_body_bottom) : ''); ?>
</body>
</html>
