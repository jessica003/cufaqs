<?php
/*
Plugin Name: plugin for faqs section
Plugin URI: https://complyindia.com/
Description: Faqs details
Version: 1.0.0
Author: Swati
Author URI: https://complyindia.com/
*/

// Exit if accessed directly
if(!defined('ABSPATH')){
  exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__).'/inc/faqs-scripts.php');
// Load Class
require_once(plugin_dir_path(__FILE__).'/inc/faqs2.php');
require_once(plugin_dir_path(__FILE__).'/inc/faqs_form.php');
// require_once(plugin_dir_path(__FILE__).'/inc/testajax.php');
// require_once(plugin_dir_path(__FILE__).'/inc/testinsert.php');