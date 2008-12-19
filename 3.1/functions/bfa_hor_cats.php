<?php
function bfa_hor_cats($sort_order = "ID", $levels = "", $titles = "No", $exclude = "") { 
   $list_cat_string = wp_list_categories('orderby=' . $sort_order . '&title_li=&depth=' . $levels . '&exclude=' . trim(str_replace(" ", "", $exclude)) . '&echo=0');
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)(.*?)\n<ul class='children'>/i","<li class=\"rMenu-expand\\2\n <ul class=\"rMenu-ver\">",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)(.*?)\n\t<ul class='children'>/i","<li class=\"rMenu-expand\\2\n\t <ul class=\"rMenu-ver\">",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)(.*?)\n\t\t<ul class='children'>/i","<li class=\"rMenu-expand\\2\n\t\t <ul class=\"rMenu-ver\">",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)(.*?)\n\t\t\t<ul class='children'>/i","<li class=\"rMenu-expand\\2\n\t\t\t <ul class=\"rMenu-ver\">",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)(.*?)\n\t\t\t\t<ul class='children'>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t <ul class=\"rMenu-ver\">",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)(.*?)\n\t\t\t\t\t<ul class='children'>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t\t <ul class=\"rMenu-ver\">",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)(.*?)\n\t\t\t\t\t\t<ul class='children'>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t\t\t <ul class=\"rMenu-ver\">",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)(.*?)\n\t\t\t\t\t\t\t<ul class='children'>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t\t\t\t <ul class=\"rMenu-ver\">",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)(.*?)\n\t\t\t\t\t\t\t\t<ul class='children'>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t\t\t\t\t <ul class=\"rMenu-ver\">",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)(.*?)\n\t\t\t\t\t\t\t\t\t<ul class='children'>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t\t\t\t\t\t <ul class=\"rMenu-ver\">",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+)\">/i","<li>",$list_cat_string);
   $list_cat_string = preg_replace("/<li class=\"(cat-item|cat-item cat-item-[0-9]+) (.*?)\">/i","<li class=\"\\2\">",$list_cat_string);
   if ($titles == "No") { $list_cat_string = preg_replace("/title=\"(.*?)\"/i","",$list_cat_string);}
return $list_cat_string;
}
?>