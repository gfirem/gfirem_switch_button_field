<?php
/**
 * @package WordPress
 * @subpackage Formidable, gfirem
 * @author GFireM
 * @copyright 2017
 * @link http://www.gfirem.com
 * @license http://www.apache.org/licenses/
 *
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

class GFireMSwitchFreemius {

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;
	protected static $slug = 'gfirem-switch';

	public function __construct() {
		$this->freemius();
	}

	/**
	 * @return Freemius
	 */
	public static function getFreemius() {
		global $gfirem;

		return $gfirem[ self::$slug ]['freemius'];
	}

	// Create a helper function for easy SDK access.
	public function freemius() {
		global $gfirem;

		if ( ! isset( $gfirem[ self::$slug ]['freemius'] ) ) {
			// Include Freemius SDK.
			require_once dirname( __FILE__ ) . '/include/freemius/start.php';

			$gfirem[ self::$slug ]['freemius'] = fs_dynamic_init( array(
				'id'                  => '1698',
				'slug'                => 'gfirem-switch',
				'type'                => 'plugin',
				'public_key'          => 'pk_d598a6714e5f48f769022f48cff64',
				'is_premium'          => true,
				// If your plugin is a serviceware, set this option to false.
				'has_premium_version' => true,
				'has_addons'          => false,
				'has_paid_plans'      => true,
				'is_org_compliant'    => false,
				'is_premium_only'     => true,
				'trial'               => array(
					'days'               => 14,
					'is_require_payment' => true,
				),
				'menu'                => array(
					'slug'       => 'gfirem-switch',
					'first-path' => 'admin.php?page=gfirem-switch',
					'support'    => false,
				),
				// Set the SDK to work in a sandbox mode (for development & testing).
				// IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
				'secret_key'          => 'sk_Waww^La6GL*7!Dn.iKM!D[mdMiID#',
			) );
		}

		return $gfirem[ self::$slug ]['freemius'];
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return GFireMSwitchFreemius A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}