<?php
function bfa_hor_pages($sort_order = "menu_order", $levels = "", $titles = "No", $exclude = "") { 
	$list_pages_string = wp_list_pages('sort_column=' . $sort_order . '&title_li=&depth=' . $levels . '&exclude=' . trim(str_replace(" ", "", $exclude)) . '&echo=0');
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)(.*?)\n<ul>/i","<li class=\"rMenu-expand\\2\n <ul class=\"rMenu-ver\">",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)(.*?)\n\t<ul>/i","<li class=\"rMenu-expand\\2\n\t <ul class=\"rMenu-ver\">",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)(.*?)\n\t\t<ul>/i","<li class=\"rMenu-expand\\2\n\t\t <ul class=\"rMenu-ver\">",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)(.*?)\n\t\t\t<ul>/i","<li class=\"rMenu-expand\\2\n\t\t\t <ul class=\"rMenu-ver\">",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)(.*?)\n\t\t\t\t<ul>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t <ul class=\"rMenu-ver\">",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)(.*?)\n\t\t\t\t\t<ul>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t\t <ul class=\"rMenu-ver\">",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)(.*?)\n\t\t\t\t\t\t<ul>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t\t\t <ul class=\"rMenu-ver\">",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)(.*?)\n\t\t\t\t\t\t\t<ul>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t\t\t\t <ul class=\"rMenu-ver\">",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)(.*?)\n\t\t\t\t\t\t\t\t<ul>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t\t\t\t\t <ul class=\"rMenu-ver\">",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)(.*?)\n\t\t\t\t\t\t\t\t\t<ul>/i","<li class=\"rMenu-expand\\2\n\t\t\t\t\t\t\t\t\t <ul class=\"rMenu-ver\">",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+)\">/i","<li>",$list_pages_string);
   $list_pages_string = preg_replace("/<li class=\"(page_item|page_item page-item-[0-9]+) (.*?)\">/i","<li class=\"\\2\">",$list_pages_string);
   if ($titles == "No") { $list_pages_string = preg_replace("/title=\"(.*?)\"/i","",$list_pages_string);}
return $list_pages_string;
}
?>