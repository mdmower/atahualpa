<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) AND 'download.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('Please do not load this page directly.');
}
global $user_ID; 
if( $user_ID ) { 
	if( current_user_can('level_10') ) { 
		if ( is_serialized(file_get_contents($_FILES['userfile']['tmp_name'])) AND strpos(file_get_contents($_FILES['userfile']['tmp_name']), 'use_bfa_seo') !== FALSE ) {
			update_option('bfa_ata4', unserialize(file_get_contents($_FILES['userfile']['tmp_name'])));
			echo "<strong><span style='color:green'>Successfully imported </span><code>" . basename($_FILES['userfile']['name']) . "</code></strong><br />";
		} else {
			echo "<strong><span style='color:red'>Sorry, but </span>" . basename($_FILES['userfile']['name']) . " <span style='color:red'>doesn't appear to be a valid Atahualpa Settings File.</span></strong>";
		}
	} else {
		die("<span style='color:green'>Only admins can import settings</span>");
	}
}
die();
?>