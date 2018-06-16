<?php
/**
 * Plugin Name: WooCommerce Stripe Gateway
 * Plugin URI: https://wordpress.org/plugins/woocommerce-gateway-stripe/
 * Description: Take credit card payments on your store using Stripe.
 * Author: WooCommerce
 * Author URI: https://woocommerce.com/
 * Version: 4.1.0
 * Requires at least: 4.4
 * Tested up to: 4.9
 * WC requires at least: 2.6
 * WC tested up to: 3.3
 * Text Domain: woocommerce-gateway-stripe
 * Domain Path: /languages/
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WC_Stripe' ) ) :
	/**
	 * Required minimums and constants
	 */
	define( 'WC_STRIPE_VERSION', '4.1.0' );
	define( 'WC_STRIPE_MIN_PHP_VER', '5.6.0' );
	define( 'WC_STRIPE_MIN_WC_VER', '2.6.0' );
	define( 'WC_STRIPE_MAIN_FILE', __FILE__ );
	define( 'WC_STRIPE_PLUGIN_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );
	define( 'WC_STRIPE_PLUGIN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

	class WC_Stripe {

		/**
		 * @var Singleton The reference the *Singleton* instance of this class
		 */
		private static $instance;

		/**
		 * @var Reference to logging class.
		 */
		private static $log;

		/**
		 * Returns the *Singleton* instance of this class.
		 *
		 * @return Singleton The *Singleton* instance.
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Private clone method to prevent cloning of the instance of the
		 * *Singleton* instance.
		 *
		 * @return void
		 */
		private function __clone() {}

		/**
		 * Private unserialize method to prevent unserializing of the *Singleton*
		 * instance.
		 *
		 * @return void
		 */
		private function __wakeup() {}

		/**
		 * Protected constructor to prevent creating a new instance of the
		 * *Singleton* via the `new` operator from outside of this class.
		 */
		private function __construct() {
			add_action( 'admin_init', array( $this, 'install' ) );
			add_action( 'plugins_loaded', array( $this, 'init' ) );
		}

		/**
		 * Init the plugin after plugins_loaded so environment variables are set.
		 *
		 * @since 1.0.0
		 * @version 4.0.0
		 */
		public function init() {
			require_once( dirname( __FILE__ ) . '/includes/class-wc-stripe-exception.php' );
			require_once( dirname( __FILE__ ) . '/includes/class-wc-stripe-logger.php' );
			require_once( dirname( __FILE__ ) . '/includes/class-wc-stripe-helper.php' );
			include_once( dirname( __FILE__ ) . '/includes/class-wc-stripe-api.php' );

			// Don't hook anything else in the plugin if we're in an incompatible environment.
			if ( $this->get_environment_warning() ) {
				return;
			}

			load_plugin_textdomain( 'woocommerce-gateway-stripe', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

			require_once( dirname( __FILE__ ) . '/includes/abstracts/abstract-wc-stripe-payment-gateway.php' );
			require_once( dirname( __FILE__ ) . '/includes/class-wc-stripe-webhook-handler.php' );
			require_once( dirname( __FILE__ ) . '/includes/class-wc-stripe-sepa-payment-token.php' );
			require_once( dirname( __FILE__ ) . '/includes/class-wc-stripe-apple-pay-registration.php' );
			require_once( dirname( __FILE__ ) . '/includes/compat/class-wc-stripe-pre-orders-compat.php' );
			require_once( dirname( __FILE__ ) . '/includes/class-wc-gateway-stripe.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-gateway-stripe-bancontact.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-gateway-stripe-sofort.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-gateway-stripe-giropay.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-gateway-stripe-eps.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-gateway-stripe-ideal.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-gateway-stripe-p24.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-gateway-stripe-alipay.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-gateway-stripe-sepa.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-gateway-stripe-bitcoin.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-gateway-stripe-multibanco.php' );
			require_once( dirname( __FILE__ ) . '/includes/payment-methods/class-wc-stripe-payment-request.php' );
			require_once( dirname( __FILE__ ) . '/includes/compat/class-wc-stripe-subs-compat.php' );
			require_once( dirname( __FILE__ ) . '/includes/compat/class-wc-stripe-sepa-subs-compat.php' );
			require_once( dirname( __FILE__ ) . '/includes/class-wc-stripe-order-handler.php' );
			require_once( dirname( __FILE__ ) . '/includes/class-wc-stripe-payment-tokens.php' );
			require_once( dirname( __FILE__ ) . '/includes/class-wc-stripe-customer.php' );

			if ( is_admin() ) {
				require_once( dirname( __FILE__ ) . '/includes/admin/class-wc-stripe-admin-notices.php' );
			}

			// REMOVE IN THE FUTURE.
			require_once( dirname( __FILE__ ) . '/includes/deprecated/class-wc-stripe-apple-pay.php' );

			add_filter( 'woocommerce_payment_gateways', array( $this, 'add_gateways' ) );
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_action_links' ) );
			add_filter( 'woocommerce_get_sections_checkout', array( $this, 'filter_gateway_order_admin' ) );
		}

		/**
		 * Checks the environment for compatibility problems.
		 * Returns a string with the first incompatibility
		 * found or false if the environment has no problems.
		 *
		 * @since 1.0.0
		 * @version 4.0.0
		 */
		public function get_environment_warning() {
			if ( version_compare( phpversion(), WC_STRIPE_MIN_PHP_VER, '<' ) ) {
				/* translators: 1) int version 2) int version */
				$message = __( 'WooCommerce Stripe - The minimum PHP version required for this plugin is %1$s. You are running %2$s.', 'woocommerce-gateway-stripe' );

				return sprintf( $message, WC_STRIPE_MIN_PHP_VER, phpversion() );
			}

			if ( ! defined( 'WC_VERSION' ) ) {
				return __( 'WooCommerce Stripe requires WooCommerce to be activated to work.', 'woocommerce-gateway-stripe' );
			}

			if ( version_compare( WC_VERSION, WC_STRIPE_MIN_WC_VER, '<' ) ) {
				/* translators: 1) int version 2) int version */
				$message = __( 'WooCommerce Stripe - The minimum WooCommerce version required for this plugin is %1$s. You are running %2$s.', 'woocommerce-gateway-stripe' );

				return sprintf( $message, WC_STRIPE_MIN_WC_VER, WC_VERSION );
			}

			if ( ! function_exists( 'curl_init' ) ) {
				return __( 'WooCommerce Stripe - cURL is not installed.', 'woocommerce-gateway-stripe' );
			}

			return false;
		}

		/**
		 * Updates the plugin version in db
		 *
		 * @since 3.1.0
		 * @version 4.0.0
		 */
		public function update_plugin_version() {
			delete_option( 'wc_stripe_version' );
			update_option( 'wc_stripe_version', WC_STRIPE_VERSION );
		}

		/**
		 * Handles upgrade routines.
		 *
		 * @since 3.1.0
		 * @version 3.1.0
		 */
		public function install() {
			if ( ! is_plugin_active( plugin_basename( __FILE__ ) ) ) {
				return;
			}

			if ( ! defined( 'IFRAME_REQUEST' ) && ( WC_STRIPE_VERSION !== get_option( 'wc_stripe_version' ) ) ) {
				do_action( 'woocommerce_stripe_updated' );

				if ( ! defined( 'WC_STRIPE_INSTALLING' ) ) {
					define( 'WC_STRIPE_INSTALLING', true );
				}

				$this->update_plugin_version();
			}
		}

		/**
		 * Adds plugin action links.
		 *
		 * @since 1.0.0
		 * @version 4.0.0
		 */
		public function plugin_action_links( $links ) {
			$plugin_links = array(
				'<a href="admin.php?page=wc-settings&tab=checkout&section=stripe">' . esc_html__( 'Settings', 'woocommerce-gateway-stripe' ) . '</a>',
				'<a href="https://docs.woocommerce.com/document/stripe/">' . esc_html__( 'Docs', 'woocommerce-gateway-stripe' ) . '</a>',
				'<a href="https://woocommerce.com/contact-us/">' . esc_html__( 'Support', 'woocommerce-gateway-stripe' ) . '</a>',
			);
			return array_merge( $plugin_links, $links );
		}

		/**
		 * Add the gateways to WooCommerce.
		 *
		 * @since 1.0.0
		 * @version 4.0.0
		 */
		public function add_gateways( $methods ) {
			if ( class_exists( 'WC_Subscriptions_Order' ) && function_exists( 'wcs_create_renewal_order' ) ) {
				$methods[] = 'WC_Stripe_Subs_Compat';
				$methods[] = 'WC_Stripe_Sepa_Subs_Compat';
			} else {
				$methods[] = 'WC_Gateway_Stripe';
				$methods[] = 'WC_Gateway_Stripe_Sepa';
			}

			$methods[] = 'WC_Gateway_Stripe_Bancontact';
			$methods[] = 'WC_Gateway_Stripe_Sofort';
			$methods[] = 'WC_Gateway_Stripe_Giropay';
			$methods[] = 'WC_Gateway_Stripe_Eps';
			$methods[] = 'WC_Gateway_Stripe_Ideal';
			$methods[] = 'WC_Gateway_Stripe_P24';
			$methods[] = 'WC_Gateway_Stripe_Alipay';
			$methods[] = 'WC_Gateway_Stripe_Bitcoin';
			$methods[] = 'WC_Gateway_Stripe_Multibanco';

			return $methods;
		}

		/**
		 * Modifies the order of the gateways displayed in admin.
		 *
		 * @since 4.0.0
		 * @version 4.0.0
		 */
		public function filter_gateway_order_admin( $sections ) {
			unset( $sections['stripe'] );
			unset( $sections['stripe_bancontact'] );
			unset( $sections['stripe_sofort'] );
			unset( $sections['stripe_giropay'] );
			unset( $sections['stripe_eps'] );
			unset( $sections['stripe_ideal'] );
			unset( $sections['stripe_p24'] );
			unset( $sections['stripe_alipay'] );
			unset( $sections['stripe_sepa'] );
			unset( $sections['stripe_bitcoin'] );
			unset( $sections['stripe_multibanco'] );

			$sections['stripe']            = 'Stripe';
			$sections['stripe_bancontact'] = __( 'Stripe Bancontact', 'woocommerce-gateway-stripe' );
			$sections['stripe_sofort']     = __( 'Stripe SOFORT', 'woocommerce-gateway-stripe' );
			$sections['stripe_giropay']    = __( 'Stripe Giropay', 'woocommerce-gateway-stripe' );
			$sections['stripe_eps']        = __( 'Stripe EPS', 'woocommerce-gateway-stripe' );
			$sections['stripe_ideal']      = __( 'Stripe iDeal', 'woocommerce-gateway-stripe' );
			$sections['stripe_p24']        = __( 'Stripe P24', 'woocommerce-gateway-stripe' );
			$sections['stripe_alipay']     = __( 'Stripe Alipay', 'woocommerce-gateway-stripe' );
			$sections['stripe_sepa']       = __( 'Stripe SEPA Direct Debit', 'woocommerce-gateway-stripe' );
			$sections['stripe_bitcoin']    = __( 'Stripe Bitcoin', 'woocommerce-gateway-stripe' );
			$sections['stripe_multibanco'] = __( 'Stripe Multibanco', 'woocommerce-gateway-stripe' );

			return $sections;
		}
	}

	WC_Stripe::get_instance();

endif;
