<?php
/*
Plugin Name: SSL Filter
*/

add_filter('https_ssl_verify', '__return_false');
?>
