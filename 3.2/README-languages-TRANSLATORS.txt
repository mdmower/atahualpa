
###############################################################
#                                                             #
#       BEFORE STARTING A TRANLASTION PLEASE READ             #
#                                                             #
#     http://forum.bytesforall.com/showthread.php?t=82        #
#        (If the URL has changed please look                  #
#         around a bit at forum.bytesforall.com               #
#                                                             #
#         YOUR LANGUGAE MAY ALREADY BE DONE                   #
#                                                             #
###############################################################


Please post your translations in that thread and also post or PM
me a URL/link text for a credit link


HOW TO:

1) Download and install http://www.poedit.net/

2) In PoEdit:

"New catalog from pot file", choose "atahualpa.pot"

3) Fill out all "Project Info" except "plural forms", Example:
"Atahualpa Deutsch" or similar, Your name, Your email, German, Germany, UTF-8, UTF-8

The other two tabs (paths, keywords) should not be required

4) Save as "de_DE.po" (or, whatever the Wordpress extension for the given language is: 
See http://codex.wordpress.org/WordPress_Localization

With PoEdit's default setting this would also create a "de_DE.mo" along with the 
"de_DE.po" file. "de_DE.mo" is the compiled file that would be included with the theme.
Attach that .mo file in a post at forum.bytesforall.com or send it via email to the 
address in the atahualpa.pot file

Send / attach the .po file as well. Sometimes I have to do small changes to the 
original theme, and may have to do the same changes in the language files. 
For instance, line numbers may change.

5) Translate and click "Save" before closing PoEdit. PRESERVE SPACES:
" text " should become " yourtext " and not "yourtext"

6) Unlikely but just in case:

Open de_DE.po and make sure the terms don't have paths from your local computer such as
#: C:\wordpress\theme-translations\atahualpa3\_atahualpa3.1.7/comments-paged.php:3

It should be more like this:
#: comments-paged.php:3

You can edit the xx_XX.po file in an text editor, too.


Currently existing languages (This list is probably outdated, please check
the forum thread at the top of this file):

de_DE - Deutsch: <a href="http://www.lelei.de/">Christian Hans</a>

hu_HU.mo - Hungarian - Magyar: <a href="http://www.sakraft.hu/">FYGureout</a>

po_PO.mo - Portuguese: <a href="http://www.bergspot.com/">André Bergonse</a>

cz_CZ.mo - Czech: <a href="http://blog.rudice.cz/">Pepawo</a>

si_SI.mo - Slovenian: <a href="http://www.fama.eu/">Franci Humerca</a>

tr_TR.mo - Turkish: <a href="http://www.mentalmasturbasyon.com/">Mental Masturbasyon</a>

fr_FR.mo - French: <a href="http://tomne.free.fr/">Michael Zapata</a>

fr_FR_2.mo - French (Altern. Version): <a href="http://www.wolforg.eu/">Wolforg</a>

pl_PL.mo - Polish: <a href="http://agard.wordpress.com">Agard Khaardin</a>

nl_NL.mo - Dutch: Jos Tiel Groenestege

bg_BG.mo - Bulgarian: <a href="http://blogs.hostbg.biz/Veselin/">Veselin Dimitrov</a>

it_IT.mo - Italian: <a href="http://gidibao.net/">Gianni Diurno</a>

vi.mo - Vietnamese: <a href="http://www.anbinh.info/blog/">Teddy Bear</a> 
  (Depending on whether your core WordPress locale is vi_VN or vi you might 
  have to either change the Wordpress vi_VN.mo to vi.mo or change the Atahualpa 
  vi.mo to vi_VN.mo. They should be both either vi.mo or vi_VN.mo)
  
ja_JP.mo - Japanese: <a href="http://www.ounziw.com/">Fumito Mizuno</a>
  You may have to change this to ja.mo

ja_JP_2.mo - Japanese (Altern. Version): nasa9084
  You may have to change this to ja.mo
 
es_ES.mo - Spanish: <a href="http://aves.denordelta.com.ar/">Javier Vasquez</a>






