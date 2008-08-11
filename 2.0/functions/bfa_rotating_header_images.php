<?php
	$files = "";
	$imgpath = TEMPLATEPATH . '/images/header/';
	$imgdir = get_bloginfo('template_directory') . '/images/header/';
	$dh  = opendir($imgpath);

	while (false !== ($filename = readdir($dh))) {
		if(eregi('.jpg', $filename) || eregi('.gif', $filename) || eregi('.png', $filename)) {
	   $files[] = $filename;
	   }
	}
	closedir($dh);

	/* Generate a random number */
	$amount_images = count($files);
	$number_images = ($amount_images-1);
	$randnum = rand(0,$number_images);

	/* print the result */
	echo $imgdir . $files[$randnum];
?>