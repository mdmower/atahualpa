<?php
function footer_page_links($matches) {
	$page_id = $matches[1];
	$page_data = get_page($page_id, ARRAY_A);
	$page_title = $page_data['post_title'];
	$page_url = get_permalink($page_id);

	return '<a href="' . $page_url . '">' . $page_title . '</a>'; 
}


function loginout_link() {
      if ( ! is_user_logged_in() )
      $link = '<a href="' . get_settings('siteurl') . '/wp-login.php"' . ($bfa_ata_nofollow == "Yes" ? ' rel="nofollow"' : '') . '>' . __('Login','atahualpa') . '</a>';
      else
      $link = '<a href="' . get_settings('siteurl') . '/wp-login.php?action=logout">' . __('Logout','atahualpa') . '</a>';
  
      return apply_filters('loginout', $link);
}
  
  
function register_link() {
      if ( ! is_user_logged_in() ) {
      if ( get_settings('users_can_register') )
           $link = '<a href="' . get_settings('siteurl') . '/wp-register.php"' . ($bfa_ata_nofollow == "Yes" ? ' rel="nofollow"' : '') . '>' . __('Register','atahualpa') . '</a>';
          else
              $link = '';
      } 
  
      return apply_filters('register', $link);
}

function admin_link() {
      if ( is_user_logged_in() ) {
          $link = '<a href="' . get_settings('siteurl') . '/wp-admin/">' . __('Site Admin','atahualpa') . '</a>';
      }
  
      return apply_filters('register', $link);
}
			

function bfa_footer($footer_content) {

if (strpos($footer_content,'%page')!==false) {
// page links
$footer_content = preg_replace_callback("|%page-(.*?)%|","footer_page_links",$footer_content);
}

// home link
$footer_content = str_replace("%home%",  '<a href="' . get_option('home') . '/">' . get_option('blogname') . '</a>', $footer_content);
// login/logout link
$footer_content = str_replace("%loginout%",  loginout_link(), $footer_content);
// admin link
$footer_content = str_replace("%admin%",  admin_link(), $footer_content);
// register link
$footer_content = str_replace("%register%",  register_link(), $footer_content);
// RSS link
$footer_content = str_replace("%rss%",  get_bloginfo('rss2_url'), $footer_content);
// Comments RSS link
$footer_content = str_replace("%comments-rss%",  get_bloginfo('comments_rss2_url'), $footer_content);
// Current Year
$footer_content = str_replace("%current-year%",  date('Y'), $footer_content);


return footer_output($footer_content);

}
?>