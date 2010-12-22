<?php // Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) AND 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die (__('Please do not load this page directly. Thanks!','atahualpa'));

if ( post_password_required() ) {
	_e('This post is password protected. Enter the password to view comments.','atahualpa');
	return;
}

global $bfa_ata;
// You can start editing below:
?>

<?php // If there are any comments
$bfa_page_comment_open = 0;  
if ( is_page() and ('open' == $post->comment_status)) {
	 $bfa_page_comment_open = 1; }
else {
	$bfa_page_comment_open = 0;} 

if ( have_comments() ) : ?>

	<a name="comments"></a><!-- named anchor for skip links -->
	<h3 id="comments"><?php // Comment Area Title
	comments_number(__('No comments yet to ', 'atahualpa'),
    __('1 comment to ', 'atahualpa'), __('% comments to ', 'atahualpa'));
	echo get_the_title(); ?></h3>

	<?php bfa_next_previous_comments_links('Above'); ?>

	<!-- Comment List -->
	<ul class="commentlist">
		
	<?php // Do this for every comment
	if ($bfa_ata['separate_trackbacks'] == "Yes") {

		wp_list_comments(array(
			'avatar_size'=>$bfa_ata['avatar_size'],
			'reply_text'=>__(' &middot; Reply','atahualpa'),
			'login_text'=>__('Log in to Reply','atahualpa'),
			'callback' => 'bfa_comments', 
			'type' => 'comment'
			));

		wp_list_comments(array(
			'avatar_size'=>$bfa_ata['avatar_size'],
			'reply_text'=>__(' &middot; Reply','atahualpa'),
			'login_text'=>__('Log in to Reply','atahualpa'),
			'callback' => 'bfa_comments', 
			'type' => 'pings'
			));

	} else {

		wp_list_comments(array(
			'avatar_size'=>$bfa_ata['avatar_size'],
			'reply_text'=>__(' &middot; Reply','atahualpa'),
			'login_text'=>__('Log in to Reply','atahualpa'),
			'callback' => 'bfa_comments', 
			'type' => 'all'
			));

	} ?>
	
	</ul>
	<!-- / Comment List -->

	<?php bfa_next_previous_comments_links('Below'); ?>

<?php else : // If there are NO comments  ?>

	<?php // If comments are open, but there are no comments:
if ( ('open' == $post->comment_status) ) : ?>
		<!-- .... -->

	<?php else : // If comments are closed: ?>

		<?php echo $bfa_ata['comments_are_closed_text']; ?>

	<?php endif; ?>

<?php endif; // END of "If there are NO comments" ?>


<?php comment_form(); ?>