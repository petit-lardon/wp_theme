<?php
/**
 * @package myFolioTheme
 * User: jlavie
 * Date: 04/08/2019
 * Time: 16:22
 *
 * ====================
 * THEME SUPPORT PAGE
 * ====================
 */

$options = get_option('post_formats');
$header = get_option('custom_header');

$formats =  array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();

foreach ($formats as $format) {
    $output[] = (@$options[$format] == 1 ? $format : '');
}

if(!empty($options)) {
    add_theme_support('post-formats', $output);
}

if(@$header == 1) {
    add_theme_support('custom-header');
}
