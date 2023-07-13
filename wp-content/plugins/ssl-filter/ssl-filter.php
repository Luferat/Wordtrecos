<?php
/*
 * Plugin Name: SSL Filter
 * Description: Permite download de componentes do WordPress na rede do Senac RJ e outras com limitações SSL.
 * Author: André Luferat
 * Author URI: https://github.com/Luferat
 * License: MIT License
 * License URI: https://opensource.org/license/mit/
 * Text Domain: ssl_filter
 * Domain Path: /network/
 * Version: 1.0
 * Requires at least: 6.1
 * Requires PHP: 7.4
 */

add_filter('https_ssl_verify', '__return_false');
?>
