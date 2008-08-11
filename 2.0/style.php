<style type="text/css">

a:link, a:visited, a:active {
	color: #<?php echo $ata_link_color; ?>; 
	font-weight: <?php echo $ata_link_weight; ?>; 
	text-decoration: <?php echo $ata_link_default_decoration; ?>; 
	}
	
a:hover {
	color: #<?php echo $ata_link_hover_color; ?>;
	font-weight: <?php echo $ata_link_weight; ?>; 
	text-decoration: <?php echo $ata_link_hover_decoration; ?>; 
	}


	
.postmetadata a:link, .postmetadata a:visited, .postmetadata a:active {
	color: #777; 
	font-weight: normal
	}
	
h3.widgettitle {
	color: #555555; 
	width: 100%; 
	font-size: 1.3em; 
	margin-bottom: 0px; 
	padding-bottom: 0px; 
	font-family: <?php echo $ata_body_font; ?>; 
	}
	
p.header { 
	float: left; 
	margin: 0 10px 8px 0px; 
	font-size:1.2em; 
	font-weight: bold; 
	/*line-height:1.2em*/; 
	color: #<?php echo $ata_blog_tagline_color; ?>; 
	}
	
h1 { 
	font-family: <?php echo $ata_blog_title_font; ?>; 
	letter-spacing:-1px; 
	line-height: 1.0em; 
	font-size: <?php echo $ata_blog_title_fontsize; ?>em; 
	/*float:left;*/ 
	/*width: 49%;*/ 
	margin: 10px 20px 0 0; 
	padding:0; 
	}
	
h2 a:link, h2 a:visited, h2 a:active  {
	color:#666666; 
	text-decoration: none
	}

h2 a:hover  {
	color:#000000; 
	text-decoration: none
	}
		

a.header:link, a.header:visited, a.header:active {
	color: #<?php echo $ata_blog_title_color; ?>; 
	text-decoration: none; 
	}
	
a.header:hover {
	color: #<?php echo $ata_blog_title_hover_color; ?>; 
	text-decoration: none; 
	}
		
#page-container {
	background: #ffffff; 
	/*border: solid 0px #ffffff;*/
	min-width: 800px; 
	margin: 0 10px; 
	font-family: <?php echo $ata_body_font; ?>, <?php echo $ata_body_backup_font; ?>; 
	}
	
#outer-column-container {
	border-left: solid <?php echo $ata_leftcolumn_width; ?>em #ffffff; 
	border-right: solid <?php echo $ata_rightcolumn_width; ?>em #ffffff;
	}
	
#left-column {
	float: left; 
	margin-left: -<?php echo $ata_leftcolumn_width; ?>em; 
	width: <?php echo $ata_leftcolumn_width; ?>em; 
	margin-right: 1px; 
	}
	
#right-column {
	float: right; 
	margin-right: -<?php echo $ata_rightcolumn_width; ?>em; 
	width: <?php echo $ata_rightcolumn_width; ?>em; 
	margin-left: 1px; 
	}
	
#masthead {
	background: #ffffff url(<?php echo get_bloginfo('template_directory'); ?>/images/headerimage.jpg) <?php echo $ata_header_image_alignment; ?> no-repeat;
	border-top: 0px solid #ffb0b3; 
	padding-top: 1px; 
	border-bottom: solid 15px #913357;
	}
	
#footer {
	background-color: #ffffff; 
	border-top: dashed 1px #cccccc; 
	padding-bottom: 1px;
	}
	
#inner-column-container {
	border: dashed 1px #cccccc;
	border-width: 0 1px; 
	margin: 0 -1px;
	}
	
#inner-column-container {
	background-color: #ffffff;
	}
	
/* set page sub sub pages back so they don't get highlighted as well: */

li.current_page_item li a:link, li.current_page_item li a:active, li.current_page_item li a:visited, li.current_page_item li a:hover {
	color: #<?php echo $ata_link_color; ?>; 
	font-weight: normal; 
	}
	
.inside {
	margin: 15px; 
	}
	
#left-column .inside {
	margin: 15px 15px 15px 5px
	}
	
#footer .inside {
	text-align: center;
	}
	
form input {
	color: #000; 
	background: #f4f4f4; 
	padding: 0; 
	margin:0; 
	border: 1px solid #cccccc; 
	}
	
.postmetadata2 a:hover {
	color: #<?php echo $ata_link_color; ?>; 
	text-decoration: underline
	}
	
#right-column p {
	margin-bottom: 15px;
	}
	
.headerright {
	width: <?php echo $ata_rightcolumn_width; ?>em; 
	}
</style>