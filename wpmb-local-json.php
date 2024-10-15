<?php
/**
 * Plugin Name: WPMB Local JSON
 * Plugin URI: https://wpmasterbuilder.com
 * Description: Activates ACF's Local JSON and provides a home for files. The README has important notes. (WordPress plugin)
 * Version: 0.1.0
 * Author: Josh Robbs
 * Author URI: https://wpmasterbuilder.com
 * License: GPL2
 *
 * @package WPMB_Local_JSON
 */

namespace WPMB_Local_JSON;

defined( 'ABSPATH' ) || exit;

define( 'WPMB_LOCAL_JSON_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); // The plugin's dir.
define( 'WPMB_LOCAL_JSON_PATH', WPMB_LOCAL_JSON_PLUGIN_DIR . 'acf-json' ); // The actual path to the JSON files.

/**
 * Define UNIVERSAL save path.
 *
 * @param string $path The path to the save directory.
 * @return string
 */
function define_json_save_path( $path ) { // phpcs:ignore
	return WPMB_LOCAL_JSON_PATH;
}
add_filter( 'acf/settings/save_json', __NAMESPACE__ . '\\define_json_save_path' );


/**
 * Define UNIVERSAL load path.
 *
 * @param array $paths The paths to the load directories.
 * @return array
 */
function define_json_load_path( $paths ) {
	unset( $paths[0] );
	$paths[] = WPMB_LOCAL_JSON_PATH;
	return $paths;
}
add_filter( 'acf/settings/load_json', __NAMESPACE__ . '\\define_json_load_path' );
