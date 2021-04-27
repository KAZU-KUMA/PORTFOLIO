<?php
/*
Plugin Name: Space Remover for Contact Form 7
Description: remove all space for Contact Form 7
Version: 2.0
Author: KAZUKI KUMAKURA
*/

function my_content_filter($content) {
	$search  = '　';
	$replace = '';
	return preg_replace($search, $replace, $content);
}
add_filter('wpcf7_mail_tag_replaced', my_content_filter); 

?>