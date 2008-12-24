<?php // Do not delete these lines
	if ('legacy.comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!','atahualpa'));
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p><?php _e('This post is password protected. Enter the password to view comments.','atahualpa'); ?></p>
			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt clearfix" ';

global $options;
foreach ($options as $value) {
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } }
?>
<!-- You can start editing below: -->

<?php // If there are any comments
if ($comments) : ?>
	
	<h3 id="comments"><?php // Comment Area Title 
	comments_number(__('No comments yet to ', 'atahualpa'), __('1 comment to ', 'atahualpa'), __('% comments to ', 'atahualpa')); echo get_the_title();
	?>
	</h3>
	
	<!-- Comment List -->
	<ol class="commentlist">
		

		<?php // Traditional or reverse display
		if ($bfa_ata_comment_display_order == "Oldest on top") { 
		$comment_number = 1; $all_comments = $comments;
		} else {
		$post_data = get_post($post->ID, ARRAY_A); 
		$comment_number = $post_data['comment_count']; 
		$all_comments = array_reverse($comments);
		}
		
		// Do this for every comment -->
		foreach ($all_comments as $comment) : 
		if ( ($bfa_ata_separate_trackbacks == "Yes" AND get_comment_type() == 'comment') OR $bfa_ata_separate_trackbacks == "No" ) {
		?>

		<li <?php if ( $bfa_ata_author_highlight == "Yes" AND $comment->comment_author_email == get_the_author_email() ) { echo 'class="authorcomment clearfix" '; } else { echo $oddcomment; } ?>id="comment-<?php comment_ID() ?>">
			
			<?php // GRAVATAR
			if (get_comment_type() == 'comment') {
			if ($bfa_ata_avatar_size != 0 AND $bfa_ata_avatar_size != "") {
			if (function_exists('get_avatar')) {
			echo get_avatar($comment -> comment_author_email, $size=$bfa_ata_avatar_size);} 
			# if this WP version has no gravatars, use the theme's custom gravatar function:
			else { if(!empty($comment -> comment_author_email)) {
				$md5 = md5($comment -> comment_author_email);
				$default = urlencode(get_bloginfo('template_directory') . '/images/no-gravatar.gif');
				echo '<img class="avatar" src="http://www.gravatar.com/avatar.php?gravatar_id='.$md5.'&size='.$bfa_ata_avatar_size.'&default='.$default.' alt="'. __('Gravatar','atahualpa') .'" />';
				}
			}
			}
			}
			?>
		
			<div class="comment-number"><a href="#comment-<?php comment_ID() ?>" title=""><?php echo $comment_number; ?></a></div>
			
			<span class="authorname"><?php // Comment Author
			comment_author_link() ?></span>
			
			<?php // Awaiting Moderation Text
			if ($comment->comment_approved == '0') : 
			_e('Your comment is awaiting moderation.','atahualpa'); 
			endif; ?>
		
			<br />
			
			<span class="commentdate">
			<?php // Comment Date and Time
			printf(__('%1$s at %2$s'), get_comment_date(__('F jS, Y','atahualpa')),  get_comment_time()) ?>
			</span>
			
			<?php // Comment Text
			comment_text() ?>
			
			<?php // Edit Comment Link
			edit_comment_link(__('Edit','atahualpa'),'<span class="editcomment">','</span>'); ?>
			

		</li>

		<?php $oddcomment = ( $oddcomment == 'class="clearfix" ' ) ? 'class="alt clearfix" ' : 'class="clearfix" '; 
		if ($bfa_ata_comment_display_order == "Oldest on top") { 
		$comment_number ++; 
		} else {
		$comment_number --;
		}
		
		}
		endforeach; 
		// END of "Do this for every comment "
		?>
		
		<!-- Do this for every trackback / pingpack -->
		<?php  
		if ($bfa_ata_separate_trackbacks == "Yes") {
		foreach ($all_comments as $comment) : 
		if ( get_comment_type() != 'comment') {
		?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
					
			<div class="comment-number"><a href="#comment-<?php comment_ID() ?>" title=""><?php echo $comment_number; ?></a></div>
			
			<?php // Comment Author
			comment_author_link() ?>:
			
			<br />
			
			<?php // Comment Date and Time
			printf(__('%1$s at %2$s'), get_comment_date(__('F jS, Y','atahualpa')),  get_comment_time()) ?>
			
			<?php // Edit Comment Link
			edit_comment_link(__('Edit','atahualpa'),'&nbsp;&nbsp;',''); ?>
			
			<?php // Comment Text
			comment_text() ?>

		</li>

		<?php $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; 
		if ($bfa_ata_comment_display_order == "Oldest on top") { 
		$comment_number ++; 
		} else {
		$comment_number --;
		}
		
		}
		endforeach; 
		}
		// END of "Do this for every trackback / pingback "
		?>
	
	</ol>
	<!-- / Comment List -->

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

	<h3><?php _e('Leave a Reply','atahualpa'); ?></h3>
		
	<?php // If Login is required and User is not logged in 
	if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p><?php printf(__('You must be %slogged in</a> to post a comment.', 'atahualpa'), '<a href="' . get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink()) . '">')?></p>

	<?php // If Login is not required, or User is logged in 
	else : ?>
		
		<!-- Comment Form -->
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

			<?php // If User is logged in
			if ( $user_ID ) : ?>
			<p>
			<?php printf(__('Logged in as %s.', 'atahualpa'), '<a href="' . get_option('siteurl') . '/wp-admin/profile.php">' . $user_identity . '</a>')?> 
			<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account','atahualpa'); ?>"><?php _e('Logout &raquo;','atahualpa'); ?></a>
			</p>

			<?php // If User is not logged in: Display the form fields "Name", "Email", "URL"
			else : ?>
			<p>
			<input class="text author" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />
			<label for="<?php _e('author','atahualpa'); ?>"><?php _e('Name ','atahualpa'); if ($req) _e('(required)','atahualpa'); ?></label>
			</p>
			<p>
			<input class="text email" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />
			<label for="<?php _e('email','atahualpa'); ?>"><?php _e('Mail (will not be published) ','atahualpa'); if ($req) _e('(required)','atahualpa'); ?></label>
			</p>
			<p>
			<input class="text url" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
			<label for="<?php _e('url','atahualpa'); ?>"><?php _e('Website','atahualpa'); ?></label>
			</p>
			<?php endif; ?>
	
		<!-- Display Quicktags or allowed XHTML Tags -->
		<?php if (function_exists('lmbbox_comment_quicktags_display')) { echo "<p>"; lmbbox_comment_quicktags_display(); echo "</p>"; } 
		else { ?>
		<p><?php _e('<strong>XHTML:</strong> You can use these tags:','atahualpa'); ?></p>
		<p><code><?php echo allowed_tags(); ?></code></p>
		<?php } ?>
	
		<!-- Comment Textarea -->
		<p><textarea name="comment" id="comment" rows="10" cols="10" tabindex="4"></textarea></p>

		<!-- Submit -->
		<p>
		<input name="submit" type="submit" class="button" id="submit" tabindex="5" value="<?php _e('Submit Comment','atahualpa'); ?>" />
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</p>
	
		<?php do_action('comment_form', $post->ID); ?>
		</form>
		<!-- / Comment Form -->

	<?php endif; ?>
	<!-- / If Login is not required, or User is logged in -->
	
<?php endif; ?>
<!-- If comments are open -->
