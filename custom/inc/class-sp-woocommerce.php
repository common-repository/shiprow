<?php
include 'woo/class-sp-product-tab.php';
				
function custom_shipping_settings_tabs( $tabs ){
 
 
	$tabs['custom_shipping'] = array(
		'label'    => 'Custom Shipping',
		'target'   => 'custom_shipping_product_data',
		'class'    => array(),
		'priority' => 90,
	);
	return $tabs;
 
}




/*adding own shipping method */
add_filter( 'woocommerce_shipping_methods', 'register_custom_method' );
function register_custom_method( $methods ) {

	// $method contains available shipping methods
	$methods[ 'wccsp_method' ] = 'WC_Shipping_Custom';

	return $methods;
}
add_action( 'woocommerce_shipping_init', 'sp_custom_shipping_method' );
function sp_custom_shipping_method(){
/**
 * WC_Shipping_Custom class.
 *
 * @class 		WC_Shipping_Tyche
 * @version		1.0.0
 * @package		Shipping-for-WooCommerce/Classes
 * @category	Class
 * @author 		Team
 */
class WC_Shipping_Custom extends WC_Shipping_Method {

	/**
	 * Constructor. The instance ID is passed to this.
	 */
	public function __construct( $instance_id = 0 ) {
		$this->id                    = 'wccsp_method';
		$this->instance_id           = absint( $instance_id );
		$this->method_title          = __( 'SHIPROW' );
		$this->method_description    = __( 'SHIPROW Displays live shipping rates on your checkout page.' );
		$this->supports              = array(
			'shipping-zones',
			'instance-settings',
		);
		$this->instance_form_fields = array(
			'enabled' => array(
				'title' 		=> __( 'Enable/Disable' ),
				'type' 			=> 'checkbox',
				'label' 		=> __( 'Enable this shipping method' ),
				'default' 		=> 'yes',
			),
			'title' => array(
				'title' 		=> __( 'Method Title' ),
				'type' 			=> 'text',
				'description' 	=> __( 'This controls the title which the user sees during checkout.' ),
				'default'		=> __( 'SHIPROW' ),
				'desc_tip'		=> true
			)
		);
		$this->enabled              = $this->get_option( 'enabled' );
		$this->title                = $this->get_option( 'title' );

		add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
	}

	/**
	 * calculate_shipping function.
	 * @param array $package (default: array())
	 */
	public function calculate_shipping( $package = array() ) {
		
		
		
		$api = new SpWebservice();
		$destination = array();
		$destination = isset( $package['destination'] ) ? $package['destination'] : '';
		$contents = isset( $package['contents'] ) ? $package['contents'] : '';
		$request = array();
		$request['warehouses'] = sp_get_all_warehouses();
		$request['dropships'] = sp_get_all_dropships();
		$request['store_setting'] = sp_get_all_store_setting();
		$request['box_sizes'] = sp_get_all_box_sizes();
		$request['common_settings'] = sp_get_common_settings();
		$request['authentication'] = sp_get_license();
		$request['destination'] = $destination;
		$itemCount = 0;
		// error_log('$contents '.json_encode($contents));
	
		foreach ($contents as $cart_key => $content) {
			
			
			if($content['variation_id'] == 0 ){
			    $content['variation_id'] = $content['product_id'];
			}
		
		
			 
			$request['items'][$itemCount]['product_name'] = $content['data']->get_title();
			$request['items'][$itemCount]['product_sku'] = $content['data']->get_sku();
			$request['items'][$itemCount]['product_qty'] = $content['quantity'];
			$request['items'][$itemCount]['weight'] = $content['data']->get_weight();
			$request['items'][$itemCount]['price'] = $content['data']->get_price();
			$product = sp_get_product_setting( $content['product_id'] , $content['variation_id'] );
			
			$request['items'][$itemCount]['product_setting'] = $product;
		
			$request['items'][$itemCount]['product_id'] = $content['product_id'];
			$request['items'][$itemCount]['variant_id'] = $content['variation_id'];
			$itemCount++;

		}
		
		$request['currency'] = get_option( 'woocommerce_currency' );
		$request['locale'] = get_locale();
		// error_log('$request'.json_encode($request));
	
		

		
		global $wpdb;
		$sql="SELECT * from {$wpdb->prefix}sp_license";
		$license=$wpdb->get_results($sql,ARRAY_A);
		if(count($license)>0){

			$responseData=wp_remote_post('https://app.shiprow.com/index.php?shop='.$_SERVER['HTTP_HOST'].'&platform=wordpress',
										array(
											'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
											'method'=>'POST',
											'httpversion'=>1.0,
											'timeout'=>30,
											'body'=>json_encode($request),
											));
			// error_log('Array json response'.json_encode($responseData).'<br><br><br>');
			if(is_wp_error($responseData)){
				$responseData='NULLLL';
			// error_log(json_encode('here'));

			}
			else{
				$responseData=$responseData['body'];
			}
			// $responseData=(isset($responseData['body'])?$responseData['body']:'');
			// print_r($responseData);
			
			//Print the data out onto the page.
			$response['success'] = true;
			$commonSetting=json_decode($responseData,true);
			if(isset($commonSetting['binResponse'])){
				$commonSetting=$commonSetting['binResponse'];
				$totalBalance=$commonSetting['total_balance'];
				$remainingBalance=$commonSetting['remaining_balance'];
				$usedBalance=$commonSetting['used_balance'];
				error_log(json_encode($usedBalance));
				$sql="UPDATE {$wpdb->prefix}common_settings SET `total_balance`=$totalBalance,`remaining_balance`=$remainingBalance,`used_balance`=$usedBalance";
				$wpdb->query($sql);
			}		
			$response['data'] = json_decode( $responseData, true );
		}else{
			$response['success']=false;
		}	

		

		
		//store the response in woocommerce session after order unset

		WC()->session->set( 'sp_rates_response', json_encode($response) );
		// error_log(json_encode($response));
		
		
		if( $response['success'] ){
			$api_data = $response['data'];
			$api_rates = $api_data['rates'];
			if( !empty( $api_rates ) ){
				foreach ($api_rates as $key => $item) {
						$addrate = array(
							'id'    => $this->id . $item['service_code'],
							'label' => $item['service_name'],
							'cost'  => $item['total_price'],
							'meta_data'  => array('service_code'=>$item['service_code']),
						);	
						$this->add_rate( $addrate );
					
				}		
			}
		}
		

	
	}
	public function sp_woocommerce_available_shipping_methods($rates, $package){
	
      	 return $rates;
	}
	public function new_shipping(){
		$local_delivery = array(
            'id' => 'local-delivery',
            'cost' => 10,
            'meta_data' => ['en_shipping_id' => 'local-delivery'],
            'label' => 'New Shipping',
        );

        $this->add_rate($local_delivery);

        $sunny_delivery = array(
            'id' => 'sunny-delivery',
            'cost' => 5655,
            'meta_data' => ['sp_shipping_id' => 'sunny-delivery'],
            'label' => 'Sunny Shipping',
        );

        $this->add_rate($sunny_delivery);
	}
}

}

add_action( 'woocommerce_checkout_order_processed' , 'sp_wc_checkout_order_processed' );
function sp_wc_checkout_order_processed( $order_id ){
	
	$api_response = WC()->session->get( 'sp_rates_response' );
	update_post_meta( $order_id , 'sp_repsonse' , json_encode($api_response) );
	// WC()->session->__unset( 'sp_rates_response' );
}
?>