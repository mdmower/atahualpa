<?php
function widget_bfa_subscribe($args) {
	extract($args);
	$options = get_option('widget_bfa_subscribe');
	$title = apply_filters('widget_title', $options['title']);
	$email_text = apply_filters('widget_text', $options['email-text']);
	$field_text = apply_filters('widget_title', $options['field-text']);
	$submit_text = apply_filters('widget_title', $options['submit-text']);
	$posts_text = apply_filters('widget_text', $options['posts-text']);
	$comments_text = apply_filters('widget_text', $options['comments-text']);
	$id = apply_filters('widget_title', $options['id']);
	echo $before_widget;
	if ( !empty($title) ) { echo $before_title . $title . $after_title; }
	// replace URL placeholders:
	$email_text = str_replace("%email-url", "http://www.feedburner.com/fb/a/emailverifySubmit?feedId=" . $id . "&amp;loc=" . get_bloginfo('language'), $email_text);
	$posts_text = str_replace("%posts-url",  get_bloginfo('rss2_url'), $posts_text);
	$comments_text = str_replace("%comments-url",  get_bloginfo('comments_rss2_url'), $comments_text);
?>
<form class="feedburner-email-form"  
action="http://www.feedburner.com/fb/a/emailverify" method="post" 
onsubmit="window.open('http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php echo $id; ?>', 
'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
<table class="subscribe" cellpadding="0" cellspacing="0" border="0"><tr>
<td class="email-text" colspan="2"><p>
<a href="http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php echo $id; ?>&amp;loc=<?php echo get_bloginfo('language'); ?>"
<?php if ($bfa_ata_nofollow == "Yes") { ?> rel="nofollow"<?php } ?>>
<img src="<?php echo get_bloginfo('template_directory'); ?>/images/feedburner-email.gif" style="float:left; margin: 0 7px 3px 0" alt="" /></a><?php echo $email_text; ?></p>
</td></tr><tr><td class="email-field"><input type="text" name="email" class="text inputblur" value="<?php echo $field_text; ?>" 
onfocus="this.value='';" onblur="this.value='<?php echo $field_text; ?>';" />
<input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php echo $id; ?>" name="url"/>
<input type="hidden" value="<?php echo get_bloginfo('name'); ?>" name="title"/>
<input type="hidden" name="loc" value="<?php echo get_bloginfo('language'); ?>"/>
</td><td class="email-button">
<input type="submit" class="button"  value="<?php echo $submit_text; ?>" />
</td></tr>
<tr>
<td  class="post-text" colspan="2"><p>
<a href="<?php echo get_bloginfo('rss2_url'); ?>"<?php if ($bfa_ata_nofollow == "Yes") { ?> rel="nofollow"<?php } ?>>
<img src="<?php echo get_bloginfo('template_directory'); ?>/images/post-feed.gif" style="float:left; margin: 0 7px 3px 0" alt="" /></a><?php echo $posts_text; ?></p>
</td>
</tr>
<tr>
<td class="comment-text" colspan="2"><p>
<a href="<?php echo get_bloginfo('comments_rss2_url'); ?>"<?php if ($bfa_ata_nofollow == "Yes") { ?> rel="nofollow"<?php } ?>>
<img src="<?php echo get_bloginfo('template_directory'); ?>/images/comment-feed.gif" style="float:left; margin: 0 7px 3px 0" alt="" /></a><?php echo $comments_text; ?></p>
</td>
</tr>
</table>
</form>
<?php
	echo $after_widget;
}
function widget_bfa_subscribe_control() {
	$options = $newoptions = get_option('widget_bfa_subscribe');
	if ( $_POST["subscribe-submit"] ) {
		$newoptions['title'] = strip_tags(stripslashes($_POST["subscribe-title"]));
		
		$newoptions['field-text'] = strip_tags(stripslashes($_POST["feedburner-email-field-text"]));
		$newoptions['submit-text'] = strip_tags(stripslashes($_POST["feedburner-email-submit-text"]));
		
		if ( current_user_can('unfiltered_html') ) {
		$newoptions['email-text'] = stripslashes($_POST["subscribe-email-text"]); 
		$newoptions['posts-text'] = stripslashes($_POST["subscribe-posts-text"]);
		$newoptions['comments-text'] = stripslashes($_POST["subscribe-comments-text"]);
		} else { 
		$newoptions['email-text'] = stripslashes(wp_filter_post_kses($_POST["subscribe-email-text"]));
		$newoptions['posts-text'] = stripslashes(wp_filter_post_kses($_POST["subscribe-posts-text"]));
		$newoptions['comments-text'] = stripslashes(wp_filter_post_kses($_POST["subscribe-comments-text"]));
		}
		
		$newoptions['id'] = strip_tags(stripslashes($_POST["feedburner-email-id"]));
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_bfa_subscribe', $options);
	}
	$title = attribute_escape($options['title']);
	$email_text = format_to_edit($options['email-text']);
	$field_text = attribute_escape($options['field-text']);
	$submit_text = attribute_escape($options['submit-text']);
	$posts_text = format_to_edit($options['posts-text']);
	$comments_text = format_to_edit($options['comments-text']);
	$id = attribute_escape($options['id']);
?>
You may have to save this widget once (Click "Done" and "Save Changes") before you can edit the text fields bewow...<br /><br />
<p><label for="subscribe-title">Optional: Title: 
<input class="widefat" id="subscribe-title" name="subscribe-title" type="text" value="<?php echo $title; ?>" /></label></p>

<p><label for="subscribe-email-text">
Text for Email section. <?php if ( current_user_can('unfiltered_html')) echo' (HTML allowed. Email subscribe URL = %email-url)'; ?>
<textarea class="widefat" style="width: 98%" rows="3" cols="20" id="subscribe-email-text" name="subscribe-email-text">
<?php echo $email_text; ?></textarea></label></p>

<p style="float: left; width: 69%; display: block">
<label for="feedburner-email-field-text">Optional: Text inside Email input field: 
<input class="widefat" id="feedburner-email-field-text" name="feedburner-email-field-text" type="text" value="<?php echo $field_text; ?>" /></label></p>

<p style="float: right; width: 29%; display: block">
<label for="feedburner-email-submit-text">Text for Email submit button: 
<input class="widefat" id="feedburner-email-submit-text" name="feedburner-email-submit-text" type="text" value="<?php echo $submit_text; ?>" /></label></p>
<div style="clear: both"></div>

<p><label for="subscribe-posts-text">
Text for Posts RSS section <?php if ( current_user_can('unfiltered_html')) echo ' (HTML allowed. Posts feed URL = %posts-url)'; ?>
<textarea class="widefat" style="width: 98%" rows="3" cols="20" id="subscribe-posts-text" name="subscribe-posts-text">
<?php echo $posts_text; ?></textarea></label></p>

<p><label for="subscribe-comments-text">
Text for Comments RSS section <?php if ( current_user_can('unfiltered_html')) echo ' (HTML allowed. Comments feed URL = %comments-url)'; ?>
<textarea class="widefat" style="width: 98%" rows="3" cols="20" id="subscribe-comments-text" name="subscribe-comments-text">
<?php echo $comments_text; ?></textarea></label></p>

<p><label for="feedburner-email-id">
Feedburner Email ID:
<input class="widefat" id="feedburner-email-id" name="feedburner-email-id" type="text" value="<?php echo $id; ?>" /></label></p>

<p><strong>How to find the feed ID for this site at Feedburner:</strong><br />
You must have a Feedburner account, and you must have created a feed for this site ("My Feeds" -> "Burn a feed right this instant"). 
Login to your Feedburner account, click "My Feeds" -> Title of the feed in question -> Publicize -> Email Subscriptions -> Check out the two textareas. 
Both contain the ID somewhere in the text. In the bigger textarea it appears as "...?ffid=<strong>XXXXXXX</strong>", 
in the smaller one as "?feedId=<strong>XXXXXXX</strong>". <strong>XXXXXXX</strong> is the number that you need to put here.</p>
			<input type="hidden" id="subscribe-submit" name="subscribe-submit" value="1" />
<?php
}
// register feedburner email widget
	$widget_ops = array('classname' => 'widget_bfa_subscribe', 'description' => 'Subscribe widget for RSS and Email' );
	$control_ops = array('width' => 600, 'height' => 500);
	wp_register_sidebar_widget('bfa_subscribe', 'BFA Subscribe', 'widget_bfa_subscribe', $widget_ops);
	wp_register_widget_control('bfa_subscribe', 'BFA Subscribe', 'widget_bfa_subscribe_control', $control_ops);		
?>