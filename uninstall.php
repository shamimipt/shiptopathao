<?php
/**
 * This will be triggered on plugin uninstall. This will remove the Pathao configurations.
 *
 * @package ShipToPathao
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Remove eCourier API credentials.
if ( get_option( 'ste_settings' ) ) {
	delete_option( 'ste_settings' );
}
