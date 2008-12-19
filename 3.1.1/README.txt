Wordpress Theme "Atahualpa" version 3.0 


#####################################################################

INSTALLATION:

#####################################################################

1. Extract the file "atahualpa3.zip" on your desktop computer,
i.e. with WinZip or 7-zip

#####################################################################

2. Upload the complete folder "atahualpa3" with its contents to
your web hosting account to the directory
/your wordpress-install/wp-content/themes/
so the final destination of the "atahualpa3" folder becomes:
/your wordpress-install/wp-content/themes/atahualpa3/
You will need a "FTP Client" Software for this, see "Requirements".

#####################################################################

NOTE: In the next step, Atahualpa may look broken/without CSS in the 
preview window. It'll be fine "on air" though

3. Activate Atahualpa3 by clicking on its name or screenshot at:

WP 2.3 and older: 
Your Blog -> Site Admin -> Presentation -> Themes

WP 2.5 - 2.6: 
Your Blog -> Site Admin -> Design -> Themes

WP 2.7 and newer: 
Your Blog -> Site Admin -> Appearance -> Themes

From WP 2.5 on you'll have to click on "Activate [Theme Name]" 
after you selected the theme. In older version the theme will be
activated without that step.

If you have no "Site Admin" link anywhere on your blog, try
http://www.your-domain.com/wp-admin/
If you've installed WordPress in a subfolder such as "blog", it would
be http://www.your-domain.com/blog/wp-admin/

#####################################################################

4. Reload you blog homepage and see if the theme is active. If not, 
repeat the steps above or post at http://forum.bytesforall.com/

If it looks broken, it may be a matter of setting the theme options.
If the sidebars look empty, you may need to add widgets. 

#####################################################################

5. Configure the theme at

WP 2.3 and older: 
Your Blog -> Site Admin -> Presentation -> Atahualpa Theme Options

WP 2.5 - 2.6: 
Your Blog -> Site Admin -> Design -> Atahualpa Theme Options

WP 2.7 and newer: 
Your Blog -> Site Admin -> Appearance -> Atahualpa Theme Options

#####################################################################

6. The theme will automatically install 4 additional widgets:

BFA Recent Comments
An alternative to the default "Recent Comments" widget
(This is not updated to WP 2.7 yet. Works but may link to single comments instead of comment pages)

BFA Popular Posts
Lists the posts with the most comments

BFA Popular in Cat
Lists the posts with the most comments in the given category

BFA Subscribe
Provides a Feedburner "Subscribe by Email" form, plus Posts and
Comments RSS links & buttons

A widget is a content block that you can drag and drop into one
of the sidebars. All widgets, the 4 BFA widgets and the default 
WordPress widgets, can be found at:

WP 2.2 - 2.3: 
Your Blog -> Site Admin -> Presentation -> Widgets

WP 2.5 - 2.6: 
Your Blog -> Site Admin -> Design -> Widgets

WP 2.7 and newer: 
Your Blog -> Site Admin -> Appearance -> Widgets
 
#####################################################################

7. OPTIONAL: Install additional plugins to enhance your blog

Atahualpa3 should work with just about any plugin. Besides that it 
has improved plug & play support for these plugins:

WP-PageNavi
http://wordpress.org/extend/plugins/wp-pagenavi/

WP-Print
http://wordpress.org/extend/plugins/wp-print/

WP-Email
http://wordpress.org/extend/plugins/wp-email/

WP-PostViews
http://wordpress.org/extend/plugins/wp-postviews/

Sociable
http://wordpress.org/extend/plugins/sociable/
Go to the settings page at Settings -> Sociable and 
uncheck all boxes in the sections "Position:" and "Use CSS:"

LMB^Box Comment Quicktags
http://wordpress.org/extend/plugins/lmbbox-comment-quicktags/

Optional: Edit lmbbox-comment-quicktags.php: 
1) To remove the link "Quicktags", delete the line 243
<a href="http://codex.wordpress.org/index.php/Write_Post_SubPanel#Quicktags" title="Help With Quicktags">Quicktags</a>:
2) To fix a not validating tag, change line 276 
<script type="text/javascript" language="javascript" src="<?php echo get_settings('siteurl'); ?>/wp-content/plugins/lmbbox-comment-quicktags.php"></script>
to
<script type="text/javascript" src="<?php echo get_settings('siteurl'); ?>/wp-content/plugins/lmbbox-comment-quicktags.php"></script>

Subscribe to Comments
http://wordpress.org/extend/plugins/subscribe-to-comments/

Paged Comments
http://wordpress.org/extend/plugins/paged-comments/



Atahualpa3 has been tested with

Akismet
http://wordpress.org/extend/plugins/akismet/
(this plugin should already be available in your blog)
Also requires http://wordpress.com/api-keys/

WP Cache 2
http://wordpress.org/extend/plugins/wp-cache/
This is easier to install than WP Super Cache

WP Super Cache
http://wordpress.org/extend/plugins/wp-super-cache/
This requires that you use Permalinks

WP-Syntax
http://wordpress.org/extend/plugins/wp-syntax/

#####################################################################

- Atahualpa3 has no page.php, single.php, archive.php, archives.php
This may confuse a plugin that expects to put something into one of 
these files

- The actual CSS styles for Atahualpa3 are located in style.css.php.
style.css is an empty file for providing
standard theme information to theme repositories that rely on an 
existing file named style.css. You can delete style.css and save
1 hit to the server. 

#####################################################################


LICENSE:

    "Atahualpa" is a WordPress theme
    Copyright (C) 2008  BFA Webdesign, BytesForAll.com

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.




