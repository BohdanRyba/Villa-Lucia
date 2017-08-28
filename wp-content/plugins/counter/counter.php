<?php
/*
   Plugin Name: Counter
   Plugin URI: http://wordpress.org/extend/plugins/counter/
   Version: 0.1
   Author: Bogdan
   Description: counter
   Text Domain: counter
   License: GPLv3
  */

/*
    "WordPress Plugin Template" Copyright (C) 2017 Michael Simpson  (email : michael.d.simpson@gmail.com)

    This following part of this file is part of WordPress Plugin Template for WordPress.

    WordPress Plugin Template is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    WordPress Plugin Template is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Contact Form to Database Extension.
    If not, see http://www.gnu.org/licenses/gpl-3.0.html
*/

$Counter_minimalRequiredPhpVersion = '5.0';

/**
 * Check the PHP version and give a useful error message if the user's version is less than the required version
 * @return boolean true if version check passed. If false, triggers an error which WP will handle, by displaying
 * an error message on the Admin page
 */
function Counter_noticePhpVersionWrong() {
	global $Counter_minimalRequiredPhpVersion;
	echo '<div class="updated fade">' .
	     __( 'Error: plugin "Counter" requires a newer version of PHP to be running.', 'counter' ) .
	     '<br/>' . __( 'Minimal version of PHP required: ', 'counter' ) . '<strong>' . $Counter_minimalRequiredPhpVersion . '</strong>' .
	     '<br/>' . __( 'Your server\'s PHP version: ', 'counter' ) . '<strong>' . phpversion() . '</strong>' .
	     '</div>';
}


function Counter_PhpVersionCheck() {
	global $Counter_minimalRequiredPhpVersion;
	if ( version_compare( phpversion(), $Counter_minimalRequiredPhpVersion ) < 0 ) {
		add_action( 'admin_notices', 'Counter_noticePhpVersionWrong' );

		return false;
	}

	return true;
}


/**
 * Initialize internationalization (i18n) for this plugin.
 * References:
 *      http://codex.wordpress.org/I18n_for_WordPress_Developers
 *      http://www.wdmac.com/how-to-create-a-po-language-translation#more-631
 * @return void
 */
function Counter_i18n_init() {
	$pluginDir = dirname( plugin_basename( __FILE__ ) );
	load_plugin_textdomain( 'counter', false, $pluginDir . '/languages/' );
}


//////////////////////////////////
// Run initialization
/////////////////////////////////

// Initialize i18n
add_action( 'plugins_loadedi', 'Counter_i18n_init' );

// Run the version check.
// If it is successful, continue with initialization for this plugin
if ( Counter_PhpVersionCheck() ) {
	// Only load and run the init function if we know PHP version can parse it
	include_once( 'counter_init.php' );
	Counter_init( __FILE__ );
}


//////////////////////////////////////////
///         My functions               ///
//////////////////////////////////////////

add_action( 'wp_head', 'custom_page_counter' );


//////////////////////////////////////////
///         Count increment            ///
//////////////////////////////////////////
function custom_page_counter() {
	$request_uri = $_SERVER['REQUEST_URI'];
	$user_ip     = $_SERVER['REMOTE_ADDR'];
	$watch_time  = current_time( 'h:i:s' );
	global $wpdb;
	$table_name = $wpdb->prefix . 'count_page_views';

	if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name ) {
		createTableForCounter( $table_name );

	} else {
		$insert = "INSERT INTO " . $table_name .
		          " (user_ip, time, url) " .
		          "VALUES ('" . $user_ip . "','" . $watch_time .
		          "','" . $request_uri . "')";

		$results = $wpdb->query( $insert );
	}
}

function createTableForCounter( $table_name ) {
	$sql = "CREATE TABLE " . $table_name . " (
    	  id mediumint(9) NOT NULL AUTO_INCREMENT,
    	  user_ip VARCHAR(255) NOT NULL,
    	  time TIME NOT NULL,
    	  url VARCHAR(255) NOT NULL,
    	  UNIQUE KEY id (id)
    	);";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

//////////////////////////////////////////
///         Show Count of views        ///
//////////////////////////////////////////

add_action( 'get_footer', 'show_counter' );

function show_counter() {

	global $wpdb;
//	get_template_part('view','counter');
	$results = $wpdb->get_results( 'SELECT * FROM wp_count_page_views ORDER BY id DESC ', OBJECT );
	$obj     = new Smk_ThemeView( 'view-counter.php', [ 'results' => $results ] );
	$obj->render();

}


/**
 * Theme View
 *
 * Include a file and(optionally) pass arguments to it.
 *
 * @param string $file The file path, relative to theme root
 * @param array $args The arguments to pass to this file. Optional.
 * Default empty array.
 *
 * @return object Use render() method to display the content.
 */
if ( ! class_exists( 'Smk_ThemeView' ) ) {
	class Smk_ThemeView {
		private $args;
		private $file;

		public function __get( $name ) {
			return $this->args[ $name ];
		}

		public function __construct( $file, $args = array() ) {
			$this->file = $file;
			$this->args = $args;
		}

		public function __isset( $name ) {
			return isset( $this->args[ $name ] );
		}

		public function render() {
			if ( locate_template( $this->file ) ) {
				include( locate_template( $this->file ) );//Theme Check free. Child themes support.
			}
		}
	}
}
################################################################################
/**
 * Smk Get Template Part
 *
 * An alternative to the native WP function `get_template_part`
 *
 * @see PHP class Smk_ThemeView
 *
 * @param string $file The file path, relative to theme root
 * @param array $args The arguments to pass to this file. Optional.
 * Default empty array.
 *
 * @return string The HTML from $file
 */
if ( ! function_exists( 'smk_get_template_part' ) ) {
	function smk_get_template_part( $file, $args = array() ) {
		$template = new Smk_ThemeView( $file, $args );
		$template->render();
	}
}


//////////////////////////////////////////
///         Plugin Settings            ///
//////////////////////////////////////////


add_action( 'admin_menu', 'add_plugin_page' );
function add_plugin_page() {
	add_options_page( 'Настройки Primer', 'Primer', 'manage_options', 'primer_slug', 'primer_options_page_output' );
}

function primer_options_page_output() {
	?>
    <div class="wrap">
        <h2><?php echo get_admin_page_title() ?></h2>

        <form action="options.php" method="POST">
			<?php
			settings_fields( 'option_group' );     // скрытые защитные поля
			do_settings_sections( 'primer_page' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
			submit_button();
			?>
        </form>
    </div>
	<?php
}

/**
 * Регистрируем настройки.
 * Настройки будут храниться в массиве, а не одна настройка = одна опция.
 */
add_action( 'admin_init', 'plugin_settings' );
function plugin_settings() {
	// параметры: $option_group, $option_name, $sanitize_callback
	register_setting( 'option_group', 'option_name', 'sanitize_callback' );

	// параметры: $id, $title, $callback, $page
	add_settings_section( 'section_id', 'Страница просмотра количества посещений', '', 'primer_page' );

	// параметры: $id, $title, $callback, $page, $section, $args
	add_settings_field( 'primer_field1', 'Views', 'fill_primer_field1', 'primer_page', 'section_id' );
	add_settings_field( 'primer_field2', 'Users Ip', 'fill_primer_field2', 'primer_page', 'section_id' );
}

## Заполняем опцию 1
function fill_primer_field1() {
	global $wpdb;
	$table_name = $wpdb->prefix.'count_page_views';
	$results = $wpdb->get_results( 'SELECT * FROM '.$table_name.' ORDER BY id DESC ', OBJECT );
	$arr_users_ip = [];
	foreach ( $results as $result ) {
		if ( $_SERVER['REMOTE_ADDR'] == $result->user_ip ) {
			$arr_users_ip[] = $result->user_ip;
		}
	}

	$arr_uniq_users = array_unique($arr_users_ip);
	?>
    <?php echo count($results) ?>


	<?php
}

## Заполняем опцию 2
function fill_primer_field2() {
	global $wpdb;
	$table_name = $wpdb->prefix.'count_page_views';

	$results = $wpdb->get_results( 'SELECT * FROM '.$table_name.' ORDER BY id DESC ', OBJECT );
	$arr_users_ip = [];
	foreach ( $results as $result ) {
		if ( $_SERVER['REMOTE_ADDR'] == $result->user_ip ) {
			$arr_users_ip[] = $result->user_ip;
		}
	}

	$arr_uniq_users = array_unique($arr_users_ip);
	?>
    <ul class="list-unstyled">
        <?php foreach ($arr_uniq_users as $user):?>
        <li><?php echo $user ?></li>
        <?php endforeach;?>
    </ul>
	<?php
}



