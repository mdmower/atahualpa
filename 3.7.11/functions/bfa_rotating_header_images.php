<?php
function bfa_rotating_header_images() {
	global $bfa_ata;
	$templateURI = get_template_directory_uri(); 

		$files = "";
//		$imgpath = get_template_directory() . '/images/header/';
//		$imgdir = $templateURI . '/images/header/';
        if(isset($bfa_ata['header_images_dir'])) {
           $imgpath = get_template_directory() . '/' . $bfa_ata['header_images_dir'] . '/';
           $imgdir =  $templateURI . '/' . $bfa_ata['header_images_dir'] . '/';
        } else {
           $imgpath = get_template_directory() . '/images/header/';
           $imgdir = $templateURI . '/images/header/';
        }
//echo 'imgdir='.$imgdir.'<br>';

		$dh  = opendir($imgpath);

		while (FALSE !== ($filename = readdir($dh))) {
			if( preg_match('/\.jpg/i', $filename) || preg_match('/\.gif/i', $filename) || preg_match('/\.png/i', $filename) ) {
		   $files[] = $filename;
		   }
		}

		if(isset($bfa_ata['header_image_sort_or_shuffle'])) {
			if ($bfa_ata['header_image_sort_or_shuffle'] == "Sort") {
				sort($files); } 
			else { 
				shuffle($files); }
		}
		
		closedir($dh);

		foreach($files as $value) {
			$bfa_header_images[] = '\'' . $imgdir . $value . '\'';
		} 

return $bfa_header_images;
}
?>