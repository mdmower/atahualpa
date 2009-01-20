Please let me know about your translations at 
http://wordpress.bytesforall.com or http://forum.bytesforall.com
You'll get credit links in the source files and on wordpress.bytesforall.com.

1) Download and install http://www.poedit.net/

2) In PoEdit:

"New catalog from pot file", choose "atahualpa.pot"

3) Fill out "Project Info" except plural forms, Example:
"Atahualpa Deutsch" or similar, Your name, Your email, German, Germany, UTF-8, UTF-8

The other two tabs (paths, keywords) should not be required

4) Save as "de_DE.po" (or, whatever the Wordpress extension for the given language is: http://codex.wordpress.org/WordPress_Localization

With PoEdit's default setting this would also create a "de_DE.mo" along with the "de_DE.po" file. "de_DE.mo" is the compiled file that would be included with the theme.
Attach that .mo file in a post at forum.bytesforall.com or send it via email to the address in the atahualpa.pot file

Send / attach the .po file as well. Sometimes I have to do small changes to the original theme, and may have to do the same changes in the language files. 
For instance, line numbers may change.

5) Translate and click "Save" before closing PoEdit. Preserve things like trailing spaces. For instance,
"text text text " should become "yourtext yourtext yourtext " and not "yourtext yourtext yourtext"

6) Unlikely but just in case:

Open de_DE.po and make sure the terms don't have paths from your local computer such as
#: C:\wordpress\theme-translations\atahualpa3\_atahualpa3.1.7/comments-paged.php:3

It should be more like this:
#: comments-paged.php:3



Currently existing languages:

de_DE
Deutsch
http://www.lelei.de/
Christian Hans

hu_HU.mo
Hungarian - Magyar
http://www.sakraft.hu/
FYGureout 

po_PO.mo
Portuguese
http://www.bergspot.com/
André Bergonse

cz_CZ.mo
Czech
http://blog.rudice.cz/
Pepawo








