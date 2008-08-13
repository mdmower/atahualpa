<?php get_header(); ?>
<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
			<div id="outer-column-container">
				<div id="inner-column-container">
					<div id="source-order-container">
						<div id="middle-column">
							<div class="inside">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="navigation">
	<div class="older"><?php previous_post_link('&laquo; %link') ?></div>
	<div class="newer"><?php next_post_link('%link &raquo;') ?></div>
</div><div style="clear: both"></div><div class="line1pix"></div>
		<div class="post" id="post-<?php the_ID(); ?>">
				<!--<div class="calendar">
				<div class="calendar1"><?php the_time('M') ?></div><div style="clear:left"></div>
				<div class="calendar2"><?php the_time('j') ?></div><div style="clear:left"></div>
				<div class="calendar3"><?php the_time('Y') ?></div><div style="clear:left"></div>
				</div>
				<div class="vert1"><div class="vert2"><div class="vert3">--><h2 style="line-height: 1.2em;"><?php the_title(); ?></h2><!--</div></div></div>-->
			<div style="clear: left;"></div><div class="entry">
				<?php the_content('<p class="serif">More &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<p class="postmetadata">Posted on <?php the_time('F jS, Y') ?> under <?php the_category(', ') ?><?php if ( function_exists('the_tags') && get_the_tags() ) {the_tags(' &bull; Tags: ', ', ', '. ');} ?> <?php if(function_exists('wp_print')) { echo " &bull; "; print_link(); } ?> <?php if(function_exists('wp_email')) { echo " &bull; "; email_link(); } ?>
						<?php if (function_exists(get_post_comments_feed_link) && $ata_nofollow == "Yes") {
						$url = get_post_comments_feed_link();
						echo " &bull; <a rel=\"nofollow\" href='$url'>RSS 2.0</a> feed"; } else {
						echo " &bull; "; comments_rss_link('RSS 2.0'); echo " feed"; } ?>
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							 &bull; <a href="#respond">Leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="<?php if ($ata_nofollow == "Yes") { echo "nofollow, "; } ?>trackback">trackback</a>
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							 & bull; Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="<?php if ($ata_nofollow == "Yes") { echo "nofollow, "; } ?>trackback">trackback</a> from your own site
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							 &bull; You can skip to the end and leave a response. Pinging is currently not allowed
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							 &bull; Both comments and pings are currently closed
						<?php } edit_post_link(' &bull; Edit this entry','',''); ?>
				</p>
			</div>
		</div>
	<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
							</div>
						</div>
						<div id="left-column">
							<div class="inside">
<?php get_sidebar(); ?>
							</div>
						</div>
						<div class="clear-columns"><!-- do not delete --></div>
					</div>
					<div id="right-column">
						<div class="inside">
<?php include ('sidebar2.php'); ?>
						</div>
					</div>
					<div class="clear-columns"><!-- do not delete --></div>
				</div>
			</div>
<?php get_footer(); ?>