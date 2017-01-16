<?php
/**
 * @package Akismet
 */
/*
Plugin Name: Todo list
Plugin URI: https://localhost
Description: Todo list dev plugin
Version: 0.1
Author: zoonim116
Author URI: https://localhost
License: GPLv2 or later
Text Domain: mun-todo-list
*/
define( 'PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require_once( PLUGIN_DIR . 'class.mun_todo_list.php' );

global $mun_db_version;
$mun_db_version = "1.0";

register_activation_hook(__FILE__, array('Mun_Todo_List', 'plugin_activation'));


add_action( 'admin_menu', 'mun_admin_menu', 9 );

function mun_admin_menu() {
	add_menu_page( 'Todo List',
		'Todo List',
		'manage_options', 'mun-todo-list/view/homepage.php',
		'', 'dashicons-format-aside');
        add_submenu_page('mun-todo-list/view/homepage.php', 'All Tasks', 'All Tasks', 'manage_options', 'mun-todo-list/view/list.php', '');
        add_submenu_page('mun-todo-list/view/homepage.php', 'Add Item', 'Add Item', 'manage_options', 'mun-todo-list/view/new.php', '');
}

