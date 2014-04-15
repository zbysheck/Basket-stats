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
		echo '<div class="metabox-holder">
		<div class="postbox open" style="width:100%;">
			<div class="handlediv" title="Click to toggle"><br /></div>
			<h3 class="hndle"><span>Edycja statystyk</span></h3>
			<div class="inside">';

	require_once('functions.php');
	require_once('choose.php');
	require_once('player.php');
	require_once('include/requests.php');
	require_once('include/fet.php');
	require_once('include/fep.php');
	require_once('include/feg.php');
	require_once('include/fes.php');
		echo '</div>
		</div>
	</div>';
	}
}

	function allstats ($text){
	require_once('player.php');
	require_once('functions.php');
		$text = str_replace("[allstats]",player::allsum(), $text);
		return $text;
	}

	add_filter("the_content", "allstats");