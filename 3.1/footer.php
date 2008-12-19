<?php
global $options;
foreach ($options as $value) { if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } }
global $cols;
?>
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
