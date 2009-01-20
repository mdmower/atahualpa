<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die (__('Please do not load this page directly. Thanks!','atahualpa'));
if ( post_password_required() ) {
	_e('This post is password protected. Enter the password to view comments.','atahualpa');
	return;
}

	/* This variable is for alternating comment background */
	#$oddcomment = 'class="alt" ';

global $options;
foreach ($options as $value) {
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } }
?>
<!-- You can start editing below: -->

<?php // If there are any comments
if ( have_comments() ) : ?>
	
	<h3 id="comments"><?php // Comment Area Title 
	comments_number(__('No comments yet to ', 'atahualpa'), __('1 comment to ', 'atahualpa'), __('% comments to ', 'atahualpa')); echo get_the_title();
	?>
	</h3>
	
	
	<?php 
?>
	

				<?php // Next/Previous Comments Links 
				// in next_comments_link "next" means newer 
				// if navigation above comments is set
				if ( strpos($bfa_ata_location_comments_next_prev,'Above')!==false ) {
				// if any navigation links exist, paginated or next/previous:
				if ( get_comment_pages_count() > 1 ) {
					// Overall navigation container
					echo '<div class="navigation-comments-above">';
						// paginated links
						if ($bfa_ata_next_prev_comments_pagination == "Yes") {
							paginate_comments_links(array(
							'prev_text' => bfa_escape($bfa_ata_comments_next_prev_older),
							'next_text' => bfa_escape($bfa_ata_comments_next_prev_newer),
							)); 
						// next/previous links
						} else {
							echo '<div class="older">'; 
							$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? 
							previous_comments_link(bfa_escape($bfa_ata_comments_next_prev_older)) : 
							next_comments_link(bfa_escape($bfa_ata_comments_next_prev_newer)); 
							echo ' &nbsp;</div><div class="newer">&nbsp; ';
							$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? 
							next_comments_link(bfa_escape($bfa_ata_comments_next_prev_newer)) : 
							previous_comments_link(bfa_escape($bfa_ata_comments_next_prev_older)); 
							echo '</div>
							<div style="clear:both"></div>';
						}
					echo '</div>'; 
				} 
				} ?>		
				
	<!-- Comment List -->
	<ul class="commentlist">
		
		<!-- Do this for every comment -->
		<?php if ($bfa_ata_separate_trackbacks == "Yes") {
		wp_list_comments(array(
					'avatar_size'=>$bfa_ata_avatar_size,
					'reply_text'=>__(' &middot; Reply','atahualpa'),
					'login_text'=>__('Log in to Reply','atahualpa'),
					'walker' => new Walker_Comment2, 
					'max_depth' => '', 
					'style' => 'ul', 
					'callback' => null, 
					'end-callback' => null, 
					'type' => 'comment',
					'page' => '', 
					'per_page' => '', 
					'reverse_top_level' => null, 
					'reverse_children' => ''
				)); 
		wp_list_comments(array(
					'avatar_size'=>$bfa_ata_avatar_size,
					'reply_text'=>__(' &middot; Reply','atahualpa'),
					'login_text'=>__('Log in to Reply','atahualpa'),
					'walker' => new Walker_Comment2, 
					'max_depth' => '', 
					'style' => 'ul', 
					'callback' => null, 
					'end-callback' => null, 
					'type' => 'pings',
					'page' => '', 
					'per_page' => '', 
					'reverse_top_level' => null, 
					'reverse_children' => ''
				)); 
		} else {
		wp_list_comments(array(
					'avatar_size'=>$bfa_ata_avatar_size,
					'reply_text'=>__(' &middot; Reply','atahualpa'),
					'login_text'=>__('Log in to Reply','atahualpa'),
					'walker' => new Walker_Comment2, 
					'max_depth' => '', 
					'style' => 'ul', 
					'callback' => null, 
					'end-callback' => null, 
					'type' => 'all',
					'page' => '', 
					'per_page' => '', 
					'reverse_top_level' => null, 
					'reverse_children' => ''
				)); 
		}
		?>
	
	</ul>
	<!-- / Comment List -->
	

				<?php // Next/Previous Comments Links 
				// in next_comments_link "next" means newer 
				// if navigation below comments is set
				if ( strpos($bfa_ata_location_comments_next_prev,'Below')!==false ) {
				// if any navigation links exist, paginated or next/previous:
				if ( get_comment_pages_count() > 1 ) {
					// Overall navigation container				
					echo '<div class="navigation-comments-below">';
						// paginated links
						if ($bfa_ata_next_prev_comments_pagination == "Yes") {
							paginate_comments_links(array(
							'prev_text' => bfa_escape($bfa_ata_comments_next_prev_older),
							'next_text' => bfa_escape($bfa_ata_comments_next_prev_newer),
							)); 
						// next/previous links
						} else {
							echo '<div class="older">'; 
							$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? 
							previous_comments_link(bfa_escape($bfa_ata_comments_next_prev_older)) : 
							next_comments_link(bfa_escape($bfa_ata_comments_next_prev_newer)); 
							echo ' &nbsp;</div><div class="newer">&nbsp; ';
							$bfa_ata_next_prev_orientation == 'Older Left, Newer Right' ? 
							next_comments_link(bfa_escape($bfa_ata_comments_next_prev_newer)) : 
							previous_comments_link(bfa_escape($bfa_ata_comments_next_prev_older)); 
							echo '</div>
							<div style="clear:both"></div>';
						}
					echo '</div>'; 
				} 
				} ?>		


<?php 
// END of "If there ARE any comments"
else : 
// START of "If there are NO comments" 
?>

	<?php 
	// If comments are open, but there are no comments:
	if ('open' == $post->comment_status) : 
	?>
		<!-- .... -->

	<?php 
	// END of "If comments are open, but there are no comments"
	else : 
	// If comments are closed:
	?>
		<p><?php _e('Comments are closed.','atahualpa'); ?></p>
	<?php endif; ?>

<?php 
// END of "If there are NO comments"
endif; 
?>

<?php // If comments are open
if ('open' == $post->comment_status) : ?>


	<?php // If Login is required and User is not logged in 
	if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p><?php printf(__('You must be %slogged in</a> to post a comment.', 'atahualpa'), '<a href="' . get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink()) . '">')?></p>		

	<?php // If Login is not required, or User is logged in 
	else : ?>
		
		<!-- Comment Form -->
		<div id="respond">
		
		<h3 class="reply"><?php comment_form_title(  $noreplytext = __('Leave a Reply','atahualpa'), $replytext = __('Leave a Reply to %s','atahualpa'), $linktoparent = TRUE  ); ?></h3>
	
		<div id="cancel-comment-reply">
		<?php cancel_comment_reply_link(__('Cancel','atahualpa')) ?>
		</div>
	
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

			<?php // If User is logged in
			if ( $user_ID ) : ?>
			<p>
			<?php printf(__('Logged in as %s.', 'atahualpa'), '<a href="' . get_option('siteurl') . '/wp-admin/profile.php">' . $user_identity . '</a>')?>			
			<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account','atahualpa'); ?>"><?php _e('Logout &raquo;','atahualpa'); ?></a>
			</p>

			<?php // If User is not logged in: Display the form fields "Name", "Email", "URL"
			else : ?>
			<p>
			<input class="text author" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />&nbsp;
			<label for="<?php _e('author','atahualpa'); ?>"> <strong><?php _e('Name ','atahualpa'); echo "</strong>"; if ($req) _e('(required)','atahualpa'); ?></label>
			</p>
			<p>
			<input class="text email" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />&nbsp;
			<label for="<?php _e('email','atahualpa'); ?>"> <strong><?php _e('Mail</strong> (will not be published) ','atahualpa'); if ($req) _e('(required)','atahualpa'); ?></label>
			</p>
			<p>
			<input class="text url" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />&nbsp;
			<label for="<?php _e('url','atahualpa'); ?>"> <?php _e('Website','atahualpa'); ?></label>
			</p>
			<?php endif; ?>
	
		<!-- Display Quicktags or allowed XHTML Tags -->
		<?php if (function_exists('lmbbox_comment_quicktags_display')) { echo "<p>"; lmbbox_comment_quicktags_display(); echo "</p>"; } 
		else { 
			if ($bfa_ata_show_xhtml_tags == "Yes") {
		?>
		<p class="thesetags clearfix"><?php printf(__('You can use %1$sthese HTML tags</a>','atahualpa'), '<a class="xhtmltags" href="#" onclick="return false;">'); ?></p>
		<div class="xhtml-tags"><p><code><?php echo allowed_tags(); ?></code></p></div>
		<?php 
			}
		} ?>
	
		<!-- Comment Textarea -->
		<p><textarea name="comment" id="comment" rows="10" cols="10" tabindex="4"></textarea></p>
	
		<?php do_action('comment_form', $post->ID); ?>
		
		<!-- Submit -->
		<p>
		<input name="submit" type="submit" class="button" id="submit" tabindex="5" value="<?php _e('Submit Comment','atahualpa'); ?>" />
		<?php comment_id_fields(); ?>
		</p>
		
		</form>
		</div><!-- / respond -->
		<!-- / Comment Form -->

	<?php endif; ?>
	<!-- / If Login is not required, or User is logged in -->
	
<?php endif; ?>
<!-- If comments are open -->
