<?php
	/**
	 * @package Basket stats
	 */
	/*
	Plugin Name: Basket Stats
	Plugin URI: to-be-announced.com
	Description: Simple plugin for tracking basketball stats
	Version: 0.0.2
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
		add_menu_page('Basket Stats', 'Basket Stats', 'manage_options', __FILE__, 'basket_stats_plugin_page', '', 71);
//		add_submenu_page(__FILE__, 'Drużyny', 'Drużyny', 'manage_options', __FILE__ . '_teams', 'basket_stats_team_page');
//		add_submenu_page(__FILE__, 'Mecze', 'Mecze', 'manage_options', __FILE__ . '_games', 'basket_stats_game_page');
//		add_submenu_page(__FILE__, 'Statystyki', 'Statystyki', 'manage_options', __FILE__ . '_stats', 'basket_stats_stats_page');
//		add_submenu_page(__FILE__, 'Ustawienia', 'Ustawienia', 'manage_options', __FILE__ . '_settings', 'basket_stats_settings_page');
//		add_submenu_page(__FILE__, 'Statystyki', 'Statystyki', 'manage_options', __FILE__ . '_stats', 'basket_stats_plugin_page');

		//add_submenu_page('admin.php?page=basket_stats', 'Basket Stats', 'Basket Stats', 'manage_options', 'basket_stats', 'basket_stats_plugin_page');
		//add_submenu_page(__FILE__, 'Basket Stats', 'Basket Stats', 'manage_options', __FILE__ . '_submenu', 'basket_stats_plugin_page');
	} 

	function basket_stats_plugin_page(){ 
		if(!current_user_can('manage_options')){ 
			//wp_die( __('You do not have sufficient permissions to access this page.') );
		}
		global $wpdb;
		// if(isset($_GET['action']) && $_GET['action'] == 'edit_table'){ 
		// 	require_once( 'php/edit_table.php' );
		// }elseif (isset($_GET['action']) && $_GET['action'] == 'edit_style'){ 
		// 	require_once( 'php/edit_style.php' );
		// }elseif (isset($_GET['action']) && $_GET['action'] == 'rename_table'){ 
		// 	require_once( 'php/rename_table.php' );	
		// }elseif (isset($_GET['action']) && $_GET['action'] == 'ws_import_table'){ 
		// 	require_once( 'php/import_table.php' );	
		// }else{
		require_once('functions.php');
		require_once('choose.php');
		require_once('player.php');
		require_once('include/requests.php');
		require_once('include/action.php');
		basket_admin_tabs($_GET['tab']);

	}

	function basket_admin_tabs( $current = 'edit' ) {
		//if ($current==null)$current='edit';
		$current = $current ?: 'edit';
		// var_dump($current);
		// var_dump($current);

		$tabs = array( 'seasons' => 'Wszystkie Sezony', 'season' => 'Pojedynczy Sezon', 'game' => 'Mecz', 'settings' => 'Ustawienia');
		echo '<div id="icon-themes" class="icon32"><br/></div>';
		echo '<h2 class="nav-tab-wrapper">';
		foreach( $tabs as $tab => $name ){
			$class = ( $tab == $current ) ? ' nav-tab-active' : '';
			echo "<a class='nav-tab$class' href='?page=basket/basket.php&tab=$tab'>$name</a>";
		}
		echo '</h2>';

		if($current == 'edit'){ 
			echo '<div class="metabox-holder">
			<div class="postbox open" style="width:100%;">
				<div class="handlediv" title="Click to toggle"><br /></div>
				<h3 class="hndle"><span>Edycja statystyk</span></h3>
				<div class="inside">';
				$con=connect();
				require_once('include/fet.php');
				require_once('include/fep.php');
				require_once('include/feg.php');
				require_once('include/fes.php');
			echo '</div>
			</div>
		</div>';
		}elseif($current =='add'){
			echo '<div class="metabox-holder">
			<div class="postbox open" style="width:100%;">
				<div class="handlediv" title="Click to toggle"><br /></div>
				<h3 class="hndle"><span>Dodaj dane</span></h3>
				<div class="inside">';
				$con=connect();
				require_once('sub.php');
			echo '</div>
			</div>
		</div>';
		}elseif($current =='settings'){
					echo '<div class="metabox-holder">
			<div class="postbox open" style="width:100%;">
				<div class="handlediv" title="Click to toggle"><br /></div>
				<h3 class="hndle"><span>Ustawienia</span></h3>
				<div class="inside">';
				$con=connect();
				require_once('settings.php');
			echo '</div>
			</div>
		</div>';
			
		}elseif($current =='season'){
			if(isset($_GET['activate'])){
				update_option('BS_active', $_GET['activate']);
			}
					echo '<div class="metabox-holder">
			<div class="postbox open" style="width:100%;">
				<div class="handlediv" title="Click to toggle"><br /></div>
				<h3 class="hndle"><span>Sezon ';
				echo season(null);
				echo '</span></h3>
				<div class="inside">';
				$con=connect();
			require_once('season.php');
			echo '</div>
			</div>
		</div>';
		}elseif($current =='seasons'){
					echo '<div class="metabox-holder">
			<div class="postbox open" style="width:100%;">
				<div class="handlediv" title="Click to toggle"><br /></div>
				<h3 class="hndle"><span>Wszystkie Sezony</span></h3>
				<div class="inside">';
				$con=connect();
				require_once('seasons.php');
			echo '</div>
			</div>
		</div>';
		}elseif($current =='game'){
					echo '<div class="metabox-holder">
			<div class="postbox open" style="width:100%;">
				<div class="handlediv" title="Click to toggle"><br /></div>
				<h3 class="hndle"><span>Mecz</span></h3>
				<div class="inside">';
				$con=connect();
				require_once('game.php');
			echo '</div>
			</div>
		</div>';
		}
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


register_activation_hook( __FILE__, 'activate_basket' );
	function activate_basket(){
		$basket_stats_team_name = "Your Team";
		$basket_stats_team_logo = "http://upload.wikimedia.org/wikipedia/en/f/fc/Greek_Basket_League_Logo.jpg";
		$basket_stats_active_season = "";
		global $wpdb;

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		$table_name = "season";
		$sql = "CREATE TABLE " . $table_name . " (
		  id int(11) NOT NULL AUTO_INCREMENT,
		  year int(11) NOT NULL,
		  UNIQUE KEY id (id)
		) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;";
			
		dbDelta($sql);

		$table_name = "team";
		$sql = "CREATE TABLE " . $table_name . " (
		  id int(11) NOT NULL AUTO_INCREMENT,
		  name char(255) DEFAULT '' NOT NULL,
		  UNIQUE KEY id (id)
		) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;";
			
		dbDelta($sql);

		$table_name = "player";
		$sql = "CREATE TABLE " . $table_name . " (
		  id int(11) NOT NULL AUTO_INCREMENT,
		  name char(255) DEFAULT '' NOT NULL,
		  UNIQUE KEY id (id)
		) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;";
			
		dbDelta($sql);

		$table_name = "game";
		$sql = "CREATE TABLE " . $table_name . " (
		  id int(11) NOT NULL AUTO_INCREMENT,
		  team_id int(11) NOT NULL,
		  season_id int(11) NOT NULL,
		  game_date date,
		  UNIQUE KEY id (id)
		) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;";
			
		dbDelta($sql);

		$table_name = "stat";
		$sql = "CREATE TABLE " . $table_name . " (
		  `id` int(11) NOT NULL auto_increment,
		  `game_id` int(11) NOT NULL,
		  `player_id` int(11) NOT NULL,
		  `active` bool NOT NULL,
		  `minutes` int(11) NOT NULL,
		  `fg3` int(11) NOT NULL, #field goal 3 points - trafiony rzut za 3
		  `fga3` int(11) NOT NULL, #field goal attempt 3 point - wykonany rzut za 3 
		  `fg2` int(11) NOT NULL, 
		  `fga2` int(11) NOT NULL,
		  `fg1` int(11) NOT NULL,
		  `fga1` int(11) NOT NULL,
		  `orb` int(11) NOT NULL, # offensive rebounds - zbiorka w ataku
		  `drb` int(11) NOT NULL, # offensive rebounds - zbiorka w obronie
		  `assists` int(11) NOT NULL, # asysty
		  `fauls` int(11) NOT NULL, # faule
		  `turnovers` int(11) NOT NULL, # strata
		  `steals` int(11) NOT NULL, #przechwyt
		  `blocks` int(11) NOT NULL,
		  UNIQUE KEY id (id)
		) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;";
			
		dbDelta($sql);
		
		add_option("basket_stats_team_name", $basket_stats_team_name);
		add_option("basket_stats_team_logo", $basket_stats_team_logo);
		add_option("basket_stats_active_season", $basket_stats_active_season);

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