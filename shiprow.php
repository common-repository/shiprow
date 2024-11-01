<?php
/**
 * Plugin Name:       SHIPROW
 * Description:       SHIPROW
 * Plugin URI:        https://shiprow.com/
 * Version:           1.0.0
 * Author:            Owl Technology
 * Author URI:        https://shiprow.com
 * Requires at least: 3.0.0
 * Tested up to:      5.3.2
 * Text Domain: wccsp
 * @package Shipping_Cutomisations
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'SPROW_PLUGIN_DIR', dirname( __FILE__ ) . '/' );
define( 'SPROW_PLUGIN_INC_DIR', dirname( __FILE__ ) . '/custom/inc/' );
define( 'SPROW_PLUGIN_URL', plugins_url( "", __FILE__ ) . '/' );
define( 'SPROW_TEMPLATE_DIR', plugin_dir_path( __FILE__ ) .'custom/templates/' );
define( 'SPROW_CARRIER_FORM_DIR', plugin_dir_path( __FILE__ ) .'custom/admin/tabs/form/carrier-form/' );
define( 'SPROW_IMAGE_DIR',plugin_dir_url( __FILE__ ) .'custom/assets/img/' );


/**
 * Main Shipping_Cutomisations Class
 *
 * @class Shipping_Cutomisations
 * @version	1.0.0
 * @since 1.0.0
 * @package	Shipping_Cutomisations
 */
final class Shipping_Cutomisations {

	/**
	 * Set up the plugin
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'shipping_cutomisations_setup' ), -1 );
		//we are storing the all strings for this plugin
		require_once( 'custom/strings/string.php' );	
		//used for the all other files
		require_once( 'custom/functions.php' );
		if( is_admin() ){
			//admin side settings
			require_once( 'custom/admin/setting.php' );
			//admin ajax file
			require_once( 'custom/admin/class-sp-admin-ajax.php' );
		}
		
	}

	/**
	 * Setup all the things
	 */
	public function shipping_cutomisations_setup() {
		add_action( 'wp_enqueue_scripts', array( $this, 'shipping_cutomisations_css' ), 999 );
		add_action( 'wp_enqueue_scripts', array( $this, 'shipping_cutomisations_js' ) );
		#adming side add scripts
		add_action('admin_enqueue_scripts', array( $this, 'sp_plugin_admin_css' ) );
		add_action('admin_enqueue_scripts', array( $this, 'sp_plugin_admin_js' ) );
	}
	/**
	 * [sp_plugin_admin_css we are adding the admin side css]
	 * @return [type] [description]
	 */
	public function sp_plugin_admin_css(){
		global $pagenow;
		$screen       = get_current_screen();
		$screen_id    = $screen ? $screen->id : '';
		
		//adding css used in shipping rules
		wp_register_style( 'material-indigo-pink-css', plugins_url( '/custom/admin/assets/css/material.indigo-pink.min.css', __FILE__ ) );
		wp_register_style( 'icon-css', plugins_url( '/custom/admin/assets/css/icon.css', __FILE__ ) );

		//adding the icon file for simple line icons
		wp_register_style( 'simple-line-icons', plugins_url( '/custom/admin/assets/fonts/simple-line-icons/simple-line-icons.min.css', __FILE__ ) );
		//font-awesome icons
		wp_register_style( 'font-awesome-icon', plugins_url( '/custom/admin/assets/fonts/font-awesome/css/font-awesome.min.css', __FILE__ ) );
		//material icons
		wp_register_style( 'material-design-icon', plugins_url( '/custom/admin/assets/fonts/material-design-icons/material-icon.css', __FILE__ ) );
		//bootstrap css
		wp_register_style( 'sp-bootstarp-css', plugins_url( '/custom/admin/assets/css/bootstrap.min.css', __FILE__ ) );

		
		//adding-plugin-custom-css
		wp_register_style( 'sp-plugin-css', plugins_url( '/custom/admin/assets/css/sp-plugin.css', __FILE__ ) );

		//formlayout css
		wp_register_style( 'sp-formlayout-css', plugins_url( '/custom/admin/assets/css/formlayout.css', __FILE__ ) );

		//adding notification
		wp_register_style( 'notification-css', plugins_url( '/custom/admin/assets/css/notifications.css', __FILE__ ) );
		wp_register_style( 'google-fonts', plugins_url( '/custom/assets/css/googlecss.css', __FILE__ ) );
		//selectize
		wp_register_style( 'selectize-css', plugins_url( '/custom/admin/assets/css/selectize.default.css', __FILE__ ) );
		


		//adding-plugin-custom-css
		wp_register_style( 'sp-responsive-css', plugins_url( '/custom/admin/assets/css/responsive.css', __FILE__ ) );
		//bootstrap table
		wp_register_style( 'sp-datatable-bootstrap-css', plugins_url( '/custom/admin/assets/js/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css', __FILE__ ) );
		//tag-input
		wp_register_style( 'sp-tag-css', plugins_url( '/custom/admin/assets/js/tagsinput/jquery-tags-input.css', __FILE__ ) );
		if( isset( $_GET['page'] ) && $_GET['page'] == 'sp-settings' ){
			wp_enqueue_style( 'simple-line-icons' );
			wp_enqueue_style( 'font-awesome-icon' );
			wp_enqueue_style( 'material-design-icon' );
			wp_enqueue_style( 'sp-bootstarp-css' );
			wp_enqueue_style( 'sp-plugin-css' );
			wp_enqueue_style( 'sp-responsive-css' );
		}
		

	}

	public function sp_plugin_admin_js(){
		$screen       = get_current_screen();
		$screen_id    = $screen ? $screen->id : '';

		//shipping rule js
		wp_register_script( 'material.min-js', plugins_url( '/custom/admin/assets/js/material.min.js', __FILE__ ), array( 'jquery' ) );

		//bootstrap  js
		wp_register_script( 'sp-bootstrap-js', plugins_url( '/custom/admin/assets/js/bootstrap.min.js', __FILE__ ), array( 'jquery' ) );
		//
		wp_register_script( 'sp-popper-js', plugins_url( '/custom/admin/assets/js/popper/popper.js', __FILE__ ), array( 'jquery' ) );
		//slimscroll  js
		wp_register_script( 'sp-slimscroll-js', plugins_url( '/custom/admin/assets/js/jquery.slimscroll.js', __FILE__ ), array( 'jquery' ) );
		//added this js from html design
		wp_register_script( 'sp-layout-js', plugins_url( '/custom/admin/assets/js/layout.js', __FILE__ ), array( 'jquery' ) );
		//added this js from html design
		wp_register_script( 'sp-app-js', plugins_url( '/custom/admin/assets/js/app.js', __FILE__ ), array( 'jquery' ) );
		//added this js from html design
		wp_register_script( 'sp-datatable-js', plugins_url( '/custom/admin/assets/js/datatables/jquery.dataTables.min.js', __FILE__ ), array( 'jquery' ) );
		//added this js from html design
		wp_register_script( 'sp-datatable-bootstrap-js', plugins_url( '/custom/admin/assets/js/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js', __FILE__ ), array( 'jquery' ) );
		//added this js from html design
		wp_register_script( 'sp-table-js', plugins_url( '/custom/admin/assets/js/table_data.js', __FILE__ ), array( 'jquery' , 'sp-datatable-js' , 'sp-datatable-bootstrap-js' ) );

		//added this js from html design
		wp_register_script( 'sp-tag-js', plugins_url( '/custom/admin/assets/js/tagsinput/jquery-tags-input.js', __FILE__ ), array( 'jquery' ) );
		//selectize
		wp_register_script( 'selectize-js', plugins_url( '/custom/admin/assets/js/selectize.min.js', __FILE__ ), array( 'jquery' ) );

		//notification
		wp_register_script( 'notification-js', plugins_url( '/custom/admin/assets/js/notifications.js', __FILE__ ), array( 'jquery' ) );

		//confirmBox
		wp_register_script( 'confirmbox-js', plugins_url( '/custom/admin/assets/js/confirmbox.js', __FILE__ ), array( 'jquery' ) );

		//added this js from html design - validation form
		wp_register_script( 'sp-validation-js', plugins_url( '/custom/admin/assets/js/validation/jquery.validate.min.js', __FILE__ ), array( 'jquery' ) );
		wp_register_script( 'sp-form-js', plugins_url( '/custom/admin/assets/js/sp-form.js', __FILE__ ), array( 'jquery' , 'sp-validation-js' ) );
		// admin admin custom js- va
		wp_register_script( 'sp-plugin-js', plugins_url( '/custom/admin/assets/js/sp-plugin.js', __FILE__ ), array( 'jquery' ) );
		wp_register_script( 'sp-meta-js', plugins_url( '/custom/admin/assets/js/sp-meta.js', __FILE__ ), array( 'jquery' ) );
		if ( in_array( $screen_id, array( 'product', 'edit-product' ) ) ) {
			wp_enqueue_script( 'sp-meta-js' );
		}

		$decimal = '.';
		$params = array(
			/* translators: %s: decimal */
			'i18n_decimal_error'                => sprintf( __( 'Please enter with one decimal point (%s) without thousand separators.', 'woocommerce' ), $decimal ),
			/* translators: %s: price decimal separator */
			'i18n_mon_decimal_error'            => sprintf( __( 'Please enter with one monetary decimal point (%s) without thousand separators and currency symbols.', 'woocommerce' ), $decimal ),
			'i18n_country_iso_error'            => __( 'Please enter in country code with two capital letters.', 'woocommerce' ),
			'i18n_sale_less_than_regular_error' => __( 'Please enter in a value less than the regular price.', 'woocommerce' ),
			'i18n_delete_product_notice'        => __( 'This product has produced sales and may be linked to existing orders. Are you sure you want to delete it?', 'woocommerce' ),
			'i18n_remove_personal_data_notice'  => __( 'This action cannot be reversed. Are you sure you wish to erase personal data from the selected orders?', 'woocommerce' ),
			'decimal_point'                     => $decimal,
			'mon_decimal_point'                 => $decimal,
			'ajax_url'                          => admin_url( 'admin-ajax.php' ),
			'strings'                           => array(
				'import_products' => __( 'Import', 'woocommerce' ),
				'export_products' => __( 'Export', 'woocommerce' ),
			),
			'nonces'                            => array(
				'gateway_toggle' => wp_create_nonce( 'woocommerce-toggle-payment-gateway-enabled' ),
			),
			'urls'                              => array(
				'import_products' => current_user_can( 'import' ) ? esc_url_raw( admin_url( 'edit.php?post_type=product&page=product_importer' ) ) : null,
				'export_products' => current_user_can( 'export' ) ? esc_url_raw( admin_url( 'edit.php?post_type=product&page=product_exporter' ) ) : null,
			),
		);

		wp_localize_script( 'sp-plugin-js', 'sp_admin', $params );
	}
	/**
	 * Enqueue the CSS
	 *
	 * @return void
	 */
	public function shipping_cutomisations_css() {
		wp_enqueue_style( 'sp_custom-css', plugins_url( '/custom/assets/css/style.css', __FILE__ ) );
	}

	/**
	 * Enqueue the Javascript
	 *
	 * @return void
	 */
	public function shipping_cutomisations_js() {
		wp_enqueue_script( 'sp_custom-js', plugins_url( '/custom/assets/js/custom.js', __FILE__ ), array( 'jquery' ) );
	}

	/**
	 * Look in this plugin for template files first.
	 * This works for the top level templates (IE single.php, page.php etc). However, it doesn't work for
	 * template parts yet (content.php, header.php etc).
	 *
	 * Relevant trac ticket; https://core.trac.wordpress.org/ticket/13239
	 *
	 * @param  string $template template string.
	 * @return string $template new template string.
	 */
	public function shipping_cutomisations_template( $template ) {
		if ( file_exists( untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/custom/templates/' . basename( $template ) ) ) {
			$template = untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/custom/templates/' . basename( $template );
		}

		return $template;
	}

	/**
	 * Look in this plugin for WooCommerce template overrides.
	 *
	 * For example, if you want to override woocommerce/templates/cart/cart.php, you
	 * can place the modified template in <plugindir>/custom/templates/woocommerce/cart/cart.php
	 *
	 * @param string $located is the currently located template, if any was found so far.
	 * @param string $template_name is the name of the template (ex: cart/cart.php).
	 * @return string $located is the newly located template if one was found, otherwise
	 *                         it is the previously found template.
	 */
	public function shipping_cutomisations_wc_get_template( $located, $template_name, $args, $template_path, $default_path ) {
		$plugin_template_path = untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/custom/templates/woocommerce/' . $template_name;

		if ( file_exists( $plugin_template_path ) ) {
			$located = $plugin_template_path;
		}

		return $located;
	}

	public static  function activate(){
		require_once( 'custom/tables/sql.php' );
		$postData=array();
		$postData['shop']=$_SERVER["HTTP_HOST"];
		$postData['platform']='wordpress';
		$postData['email']=get_option('admin_email');
		$server_output=wp_remote_post('https://shiprow.com/admin/index.php?module=api&action=saveInstalledStore',
		array(
		'method'=>'POST',
		'httpversion'=>1.0,
		'timeout' => 30,
		'body'=>http_build_query($postData),
		));
	}

	public function sp_plugin_string(){

	}

} // End Class

/**
 * Initialise the plugin
 * @Create Object of class To Activate Plugin
 */
if (class_exists('Shipping_Cutomisations')) {

	register_activation_hook(__FILE__, array('Shipping_Cutomisations', 'activate'));
	/*
	 * Check if WooCommerce is active
	 */
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	    global $wp_sp_Class;
	    $wp_sp_Class = new Shipping_Cutomisations();
	}else{
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
	}

    
}

function SPROW_woocommerce__missing_wc_notice(){

	echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'Shipping plugin requires WooCommerce to be installed and active. You can download %s here.', 'wccsp' ), '<a href="https://woocommerce.com/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
}

/**
 * Initialise the plugin
 */
add_action( 'plugins_loaded', 'SPROW_WC_shipping_main' );
function SPROW_WC_shipping_main(){
	if ( ! class_exists( 'WooCommerce' ) ) {
		add_action( 'admin_notices', 'SPROW_woocommerce__missing_wc_notice' );
		return;
	}
}
?>