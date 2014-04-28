<?php
	/**
	 * @package Basket stats
	 */
	/*
	Plugin Name: Basket Stats
	Plugin URI: to-be-announced.com
	Description: Simple plugin for tracking basketball stats
	Version: 0.0.1
	Author: zbyshekh - Zbigniew Kisły
	Author URI: http://zbyshekh.heliohost.org/
	License: GPLv2 or later
	*/

	/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
	*/

	add_action('admin_menu', 'basket_stats'); //menu


				require_once('functions.php');
				require_once('choose.php');
				require_once('player.php');

	function basket_stats(){ 
		add_submenu_page('tools.php', 'Basket Stats', 'Basket Stats', 'manage_options', 'basket_stats', 'basket_stats_plugin_page');
	} 

	function basket_stats_plugin_page(){ 
		if(!current_user_can('manage_options')){ 
			//wp_die( __('You do not have sufficient permissions to access this page.') );
		}
		global $wpdb;
		if(isset($_GET['action']) && $_GET['action'] == 'edit_table'){ 
			require_once( 'php/edit_table.php' );
		}elseif (isset($_GET['action']) && $_GET['action'] == 'edit_style'){ 
			require_once( 'php/edit_style.php' );
		}elseif (isset($_GET['action']) && $_GET['action'] == 'rename_table'){ 
			require_once( 'php/rename_table.php' );	
		}elseif (isset($_GET['action']) && $_GET['action'] == 'ws_import_table'){ 
			require_once( 'php/import_table.php' );	
		}else{
			basket_admin_tabs();

			echo '<div class="metabox-holder">
			<div class="postbox open" style="width:100%;">
				<div class="handlediv" title="Click to toggle"><br /></div>
				<h3 class="hndle"><span>Edycja statystyk</span></h3>
				<div class="inside">';

				require_once('functions.php');$con=connect();
				require_once('choose.php');
				require_once('player.php');
				require_once('include/requests.php');
				require_once('include/action.php');
				require_once('include/fet.php');
				require_once('include/fep.php');
				require_once('include/feg.php');
				require_once('include/fes.php');
			echo '</div>
			</div>
		</div>';
		}
	}

	function basket_admin_tabs( $current = 'edit' ) {
		$tabs = array( 'add' => 'Dodaj', 'edit' => 'Edytuj', 'settings' => 'Ustawienia' );
		echo '<div id="icon-themes" class="icon32"><br></div>';
		echo '<h2 class="nav-tab-wrapper">';
		foreach( $tabs as $tab => $name ){
			$class = ( $tab == $current ) ? ' nav-tab-active' : '';
			echo "<a class='nav-tab$class' href='?page=basket_stats&tab=$tab'>$name</a>";

		}
		echo '</h2>';
	}
	
	// This adds support for a "simplenote" shortcode
	
	function allsum_shortcode_fn( $attributes ) {
		return print_fn("allsum");
	}
	add_shortcode( 'allsum', 'allsum_shortcode_fn');
	
	function allavg_shortcode_fn( $attributes ) {
		return print_fn("allavg");
	}
	add_shortcode( 'allavg', 'allavg_shortcode_fn');
	
	function all_shortcode_function($attributes){
		return print_fn("all",$attributes[0]);
	}
	add_shortcode('all','all_shortcode_function');
	
	function avg_shortcode_function($attributes){
		return print_fn("avg",$attributes[0]);
	}
	add_shortcode('avg','avg_shortcode_function');
	
	function sum_shortcode_function($attributes){
		return print_fn("sum",$attributes[0]);
	}
	add_shortcode('sum','sum_shortcode_function');

	function print_fn($fn,$a=null){
		//var_dump($a);
		require_once('player.php');
		require_once('functions.php');
		ob_start();
		$fn($a);
		$s = ob_get_clean();
		return $s;
	}



	/*

register_activation_hook( __FILE__, 'callback_plugin' );
	function callback_plugin(){
		global $wpdb;
		$table_name = $wpdb->prefix . "blabla";
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$sql = "CREATE TABLE $table_name (
				id int NOT NULL AUTO_INCREMENT,
				name tinytext NOT NULL
			);";
			//reference to upgrade.php file
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta($sql);
			$wpdb->query($sql);
			echo "lala";
			echo $wpdb->get_results( "SELECT * FROM comments" )[0];
		}
	}*/