<?php
// Find wp-load.php so we can access the database from within our non-standard, external file here
$d = 0; // search depth;
while (!file_exists(str_repeat('../', $d) . 'wp-load.php')) if (++$d > 99) exit;
$wp_load = str_repeat('../', $d) . 'wp-load.php';
require_once($wp_load);

global $wpdb;

// get all option names and options values from the WP Options table where the option name starts with "bfa_ata_"
$atahualpa_options = $wpdb->get_results("SELECT option_name, option_value FROM $wpdb->options WHERE option_name REGEXP '^bfa_ata_'");

// output the header
$filename = 'atahualpa.options.' . str_replace("http://","",get_option('siteurl')) . "." . date('Y-m-d') . '.xml';
header('Content-Description: File Transfer');
header("Content-Disposition: attachment; filename=$filename");
header('Content-Type: text/xml; charset=' . get_option('blog_charset'), true);

// output the file
echo '<?xml version="1.0" encoding="' . get_bloginfo('charset') . '"?' . ">\n";

echo "<atahualpa_options>\n";
// Loop through the database query that we got earlier
foreach ($atahualpa_options as $atahualpa_option) {
        echo "<" . $atahualpa_option->option_name . ">\n";
        echo htmlspecialchars($atahualpa_option->option_value);
        echo "\n</" . $atahualpa_option->option_name . ">\n";
    }
echo"</atahualpa_options>\n";
?>