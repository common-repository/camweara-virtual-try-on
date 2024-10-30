<?php
/**
 * Plugin Name: Camweara
 * Plugin URI: https://camweara.com/
 * Description: Camweara Setup 
 * Version: 1.0
 * Author: Camweara
 * Text Domain: camweara-virtual-try-on
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (! defined('ABSPATH') ) {
    exit;
}

function camweara_register_menu_page() {
	add_menu_page(
		__( 'Camweara', 'camweara-virtual-try-on' ),
		'Camweara',
		'manage_options',
		'camweara',
		'camweara_settings_page_callback',
		plugins_url('camweara/assets/images/icon.png'),
	);
}
add_action( 'admin_menu', 'camweara_register_menu_page' );

function camweara_settings_page_callback(){
	
	include_once plugin_dir_path( __FILE__ ) . 'admin-view.php';
}

add_action('admin_enqueue_scripts', 'camweara_admin_assets');
function camweara_admin_assets($hook) {
    if ( 'toplevel_page_camweara' != $hook ) {
        return;
    }
	
	wp_enqueue_style('bootstrap', plugins_url('assets/css/bootstrap.min.css',__FILE__ ), array(), '1.0');
	wp_enqueue_style('style', plugins_url('assets/css/style.css',__FILE__ ), array(), '1.0');
	
	wp_enqueue_script('bootstrap', plugins_url('assets/js/bootstrap.min.js',__FILE__ ), array(), '1.0', false);
	wp_enqueue_script('custom', plugins_url('assets/js/custom.js',__FILE__ ), array(), '1.0', true);
}

function camweara_signup($data)
{
	$url = 'https://camweara.com/api/dashboard/auth/register?platform=wordpress';
	
	$response = wp_remote_post( $url, array(
		'body'        => $data
		)
	);

	if ( !is_wp_error( $response ) ) {
		$body = json_decode($response['body']);

		// Check if the response contains the expected fields
		if (isset($body->Status)) {
			if ($body->Status == 'Failed') {
				return 0;
			} else{
				return $body->Userlink;
			}
		}
		else
			return 0;
	}
	else
		return 0;
}

register_deactivation_hook( __FILE__, 'camweara_deactivate_hook' );

function camweara_deactivate_hook(){
	$site_url = get_bloginfo('url');
    $domain = camweara_get_domain_from_url($site_url);
	
	$data = [
			'company' => $domain,
			'email' => get_bloginfo('admin_email'),
		];
	$url = 'https://camweara.com/api/dashboard/auth/uninstall';
	
	$response = wp_remote_post( $url, array(
		'body'        => $data
		)
	);
	
	delete_option('camweara_dashboard_link');
}

function camweara_get_domain_from_url($url) {
    $parsed_url = wp_parse_url($url);

    if (isset($parsed_url['host'])) {
        $host_parts = explode('.', $parsed_url['host']);

        // Check if the host has at least two parts (e.g., example.com)
        if (count($host_parts) >= 2) {
            // Get the last two parts of the host (e.g., example.com)
            $domain = $host_parts[count($host_parts) - 2] . '.' . $host_parts[count($host_parts) - 1];
            return $domain;
        }
    }

    return null; // Unable to extract domain
}