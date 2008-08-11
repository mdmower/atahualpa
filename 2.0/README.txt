Wordpress Theme "Atahualpa" - INSTALLATION:

* THIS THEME DOES NOT WORK WITH WORDPRESS 2.1 OR OLDER *

1) After you've extracted the "atahualpa.zip" file on your desktop computer, you'll
 get a directory "atahualpa" with files and subdirectories

/directory-where-you-saved-the-zip-file-to/atahualpa.zip
/directory-where-you-saved-the-zip-file-to/atahualpa/
/directory-where-you-saved-the-zip-file-to/atahualpa/functions/
/directory-where-you-saved-the-zip-file-to/atahualpa/images/
/directory-where-you-saved-the-zip-file-to/atahualpa/_plugins/
/directory-where-you-saved-the-zip-file-to/atahualpa/..bunch of files..

2) Remove the subdirectory "_plugins" from
the main directory "atahualpa" and put it one level higher. You can do this with CTRL+x (cut) and CTRL+v (paste) or
with the right mouse button ("cut"..., then "paste"), so that you end up with something like. 

/directory-where-you-saved-the-zip-file-to/atahualpa.zip
/directory-where-you-saved-the-zip-file-to/atahualpa/
/directory-where-you-saved-the-zip-file-to/atahualpa/functions/
/directory-where-you-saved-the-zip-file-to/atahualpa/images/
/directory-where-you-saved-the-zip-file-to/atahualpa/..bunch of files..
/directory-where-you-saved-the-zip-file-to/_plugins/		<--- This directory is now side by side with "atahualpa", and not inside of it anymore

3) Now upload the whole "atahualpa" directory with its subdirectories and files to your 
web hosting account, into the directory "/whereever-your-wordpress-installation-is/wp-content/themes/".
The final location of the "atahualpa" directory should look like this:

/whereever-your-wordpress-installation-is/wp-content/themes/atahualpa/
/whereever-your-wordpress-installation-is/wp-content/themes/atahualpa/functions/
/whereever-your-wordpress-installation-is/wp-content/themes/atahualpa/images/
/whereever-your-wordpress-installation-is/wp-content/themes/atahualpa/..bunch of files..

4) Log in to your Wordpress admin area and click on "Design" (WP 2.5 and newer) or "Presentation" (WP 2.3 and older). 
Scroll down and click on either the name or the screenshot of the "Atahualpa" theme. (From WP 2.6 on there'll be a 
step in between: click on "Activate Atahualpa" on the top right corner of the preview screen)

5) Reload your site in another browser window. The theme should already be up and running now, however not all  
functions will work yet because a few plugins are missing. You don't need to install these plugins, the theme
will not break, the missing functions will just gracefully dissapear or be replaced with WP's default functions 
(in case of Wp-Pagenavi). If you want to install the plugins (recommended), proceed like this:

6) Upload the CONTENT (not the directory itself, only what's IN that directory) of 
/_plugins/_upload_for_all_WP_versions/ to /whereever-your-wordpress-installation-is/wp-content/plugins/. 
Note that we're uploading to /.../plugins/ now and not to /.../themes/ anymore.
The final location of the subdirectories and files of the /_plugins/_upload_for_all_WP_versions/ directory 
would be

/whereever-your-wordpress-installation-is/wp-content/plugins/wp-pagenavi/
/whereever-your-wordpress-installation-is/wp-content/plugins/related-posts.php
/whereever-your-wordpress-installation-is/wp-content/plugins/related-posts-readme-first.txt
/whereever-your-wordpress-installation-is/wp-content/plugins/subscribe-to-comments.php

7) Now you've uploaded the 3 plugins "WP-Pagenavi", "Related Posts" & "Subscribe To Comments".
The remaining plugins "WP-Print" and "WP-Email" are different for almost each WP version. Make sure that you
upload the right directories depending on your WordPress version.

7.a) If your WordPress version is 2.2, 2.2.1, 2.2.2 or 2.2.3 do this:
Upload the CONTENT (not the directory itself, only what's IN that directory) of 
/_plugins/upload-WP-2.2/ to /whereever-your-wordpress-installation-is/wp-content/plugins/

7.b) If your WordPress version is 2.3, 2.3.1, 2.3.2 or 2.3.3 do this:
Upload the CONTENT (not the directory itself, only what's IN that directory) of 
/_plugins/upload-WP-2.3/ to /whereever-your-wordpress-installation-is/wp-content/plugins/

7.c) If your WordPress version is 2.5, 2.5.1, 2.6 or even newer, do this:
Upload the CONTENT (not the directory itself, only what's IN that directory) of 
/_plugins/upload-WP-2.5-2.6/ to /whereever-your-wordpress-installation-is/wp-content/plugins/

In all threee cases (7.a, 7.b or 7.c) you should end up with

/whereever-your-wordpress-installation-is/wp-content/plugins/wp-email/
/whereever-your-wordpress-installation-is/wp-content/plugins/wp-print/

So with all 5 Plugins installed, you should have:

/whereever-your-wordpress-installation-is/wp-content/plugins/wp-email/
/whereever-your-wordpress-installation-is/wp-content/plugins/wp-pagenavi/
/whereever-your-wordpress-installation-is/wp-content/plugins/wp-print/
/whereever-your-wordpress-installation-is/wp-content/plugins/related-posts.php
/whereever-your-wordpress-installation-is/wp-content/plugins/related-posts-readme-first.txt
/whereever-your-wordpress-installation-is/wp-content/plugins/subscribe-to-comments.php


8) Back in the admin area of your site, click on "Plugins" and you should see a list of available plugins.
The 5 new plugins that you just uploaded should be there. Actually it may be 6 new plugins depending on 
your WP version because WP-Email may appear twice in the list, as "WP-Email" and "WP-Email Widget". 
The usage of "WP-Email Widget" will not be covered here.

Click on the "Activate" links of:
- "Related Posts"
- "Subscribe To Comments"
- "WP-Email"
- "WP-Pagenavi"
- "WP-Print"

When you check your site again, you should see the WP-Print and WP-Email links at the bottom of posts, 
the "Subscribe to comments" checkbox at the bottom of the comment form, and a list of related posts (if any) at the top
of the right sidebar, when on a single post page. If the related posts aren't there, try another post, the one 
that you're looking at may not have any related posts.

You should also have (already integrated into the theme, no plugin installation required):

- "Popular posts" on the top of the right sidebar, when on the homepage. 
(Won't display if you don't have a single comment on any of your posts)

- "Popular in [category name]" on the top of the right sidebar, when on a category page.
(Won't display if you don't have a single comment on any of your posts in that category)


9) Back in the admin area of your site, click on "Design" (WP 2.5 and newer) or "Presentation" (WP 2.3 and older) 
and then on "Atahualpa Theme Options". Look through the list of options and salt to taste. If you are unsure about 
what the options do, keep another browser window open with your site loaded in there, and refresh your site after 
every change you made on the options page.
Every round of changes on the options page needs to be confirmed by clicking on the "Submit changes" at the bottom of the
options page. You can always set everything back to default by clicking on "Reset" at the bottom of the options page. 

10) Upload your own header images: All image file names must have the extension ".jpg", ".gif" or ".png" but 
the file name itself doesn't matter: "jhkrekjfk7.jpg" will work. Upload the images to
/wp-content/themes/atahualpa/images/header/

The images should be 1280 pixels wide or wider, the height doesn't matter, you can set the visible height at the
options page (see step 9 above). Default setting is "show 150 pixels from top".

Leave one image in that directory, and it will be the only ("static") header image of your site.
Leave 2 or more images there, and they'll be rotated randomly.

11) You may want to turn off that graphical icon on the left hand side of the blog title, look at the options page 
(see step 9 above). Or, upload your own: Create a 50x50 pixels "logosymbol.gif" with a white background and upload to 
"/wp-content/themes/atahualpa/images/" so that you end up with "/wp-content/themes/atahualpa/images/logosymbol.gif".

12) You can remove the "Email This Post" Icon (and also change that text) below each post at Admin -> Email.
You can remove the "Print This Post" Icon (and also change that text) below each post at Admin -> Settings -> Print.



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




