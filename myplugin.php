<?php
/*
	Plugin Name: My Plugin
	Plugin URI: http://www.johndoe.com/
	Description: My perfect plugin description. 
	Author: John Doe
	Version: 1.0.0
	Author URI: http://www.johndoe.com/
  	Text Domain: myplugin
  	Domain Path: /languages
*/
/*  
	Copyright 2015 John Doe (john.doe@mail.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/ 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Define some good constants.
define( 'MYPLUGIN__VERSION', '1.0.0' );
define( 'MYPLUGIN__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'MYPLUGIN__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MYPLUGIN__TEXTDOMAIN', 'myplugin-textdomain' );

class MyPlugin
{
	protected $autoload = array( 'init', 'admin_init', 'plugins_loaded', 'admin_menu' );

	/**
	 * Autoload Helper
	 * This will init the plugin and autoload files.
	 * @return void
	*/
	function __construct() {
		$this->autoload();
	}

	/**
	 * Do the magic and load hooks
	 * This will load everything :) 
	 * @return void
	*/
	public function autoload() {
		// Get all hooks from protected var $autoload;
		$hooks = $this->autoload;

		// Loop trough hooks and add actions for those who have declared methods.
		foreach ($hooks as $hook) {
			if (method_exists($this, $hook)) 
				add_action($hook, array($this, $hook));
		}
	}

	/**
	 * Init
	 * This function will run when WordPress calls the hook "init".
	 * @return void
	*/
	public function init() {
		load_plugin_textdomain( MYPLUGIN__TEXTDOMAIN, false, MYPLUGIN__TEXTDOMAIN . '/languages' );
	}	

	/**
	 * Admin Init
	 * This function will run when WordPress calls the hook "admin_init".
	 * @return void
	*/
	public function admin_init() {

	}

	/**
	 * Plugins Loaded
	 * This function will run when WordPress calls the hook "plugins_loaded".
	 * @return void
	*/
	public function plugins_loaded() {

	}

	/**
	 * Admin Menu
	 * This function will run when WordPress calls the hook "admin_menu".
	 * @return void
	*/
	public function admin_menu() {
		// add_menu_page( 'My plugin', 'myplugin', 'administrator', 'myplugin', 'plugins.php' , '', 20 ); 
	}

} new MyPlugin;
