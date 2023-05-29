<?php // phpcs:ignore
/**
 * Plugin Name:     Ship To Pathao
 * Plugin URI:      https://github.com/shiptopathao
 * Description:     Ship To Pathao gives you ability to send your parcel request to Pathao directly from your WooCommerce dashboard, it enables booking automation from your WordPress website.
 * Author:          Khondokar Shamim Ahmed
 * Author URI:      https://github.com/shamimipt
 * Text Domain:     ship-to-pathao
 * Domain Path:     /languages
 * Version:         1.0.0
 * License:         GPLv3
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package         ShipToPathao
 */

namespace ShipToPathao;

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Ship_To_Pathao' ) ) {
    /**
     * Register the main plugin class.
     *
     * Class Ship_To_Ecourier
     */
    class Ship_To_Pathao {

        /**
         * Plugin version
         *
         * @var string
         */
        const VERSION = '1.0.0';

        /**
         * Holds various class instances.
         *
         * @var array
         */
        private $container = [];

        /**
         * Ship_To_Pathao constructor.
         *
         * @return void
         */
        public function __construct() {
            $this->define_constants();

            //register_activation_hook( __FILE__, array( $this, 'activate' ) );

            add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );

            add_action( 'init', [ $this, 'init_classes' ] );
        }

        /**
         * Initialize a singleton instance.
         *
         * @return false|\Ship_To_Pathao|Ship_To_Pathao
         */
        public static function init() {
            static $instance = false;

            if ( ! $instance ) {
                $instance = new self();
            }

            return $instance;
        }

        /**
         * Defines all necessary constants for the plugin.
         *
         * @return void
         */
        public function define_constants() {
            define( 'STP_VERSION', self::VERSION );
            define( 'STP_FILE', __FILE__ );
            define( 'STP_PATH', __DIR__ );
            define( 'STP_URL', plugins_url( '', STE_FILE ) );
            define( 'STP_ASSETS_URL', STE_URL . '/assets' );
            define( 'STP_TABLE_PREFIX', 'stp_' );
            define( 'STP_API_BASE_URL_STAGING', '' );
            define( 'STP_API_BASE_URL_LIVE', '' );
        }

    }

}

/**
 * Initialize the main plugin.
 *
 * @return bool
 */
function ship_to_pathao() {
    return Ship_To_Pathao::init();
}

// Kick-off the plugin.
ship_to_pathao();