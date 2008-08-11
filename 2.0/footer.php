<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>			<div id="footer">
				<div class="inside">
<p>Copyright &copy; <?php if ($ata_copyright_start_year != "" && $ata_copyright_start_year != date('Y')) {echo $ata_copyright_start_year . "-";} echo date('Y'); ?> <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> - All Rights Reserved<br />
Powered by <a href="http://www.wordpress.org/">WordPress</a> - <a href="http://wordpress.bytesforall.com/">WP Themes</a> by <a href="http://www.bytesforall.com/">BFA Webdesign</a>

		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>