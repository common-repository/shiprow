<?php

/**

 * adding the plugin custom field on woocommerce product edit page 

 */

class SpProductTab

{

	function __construct(){

		//adding  custom fields on shipping tabs

		add_action( 'woocommerce_product_options_shipping', array( $this , 'sp_custom_shipping_options' ) );

		//adding the custom fields in variations tabs

		add_action( 'woocommerce_product_after_variable_attributes', array( $this, 'sp_custom_shipping_options' ), 10, 3 );

		//save variations

		add_action('woocommerce_save_product_variation' , array( $this, 'sp_save_varitation_meta' ) ,10 , 2 );

		//save the simple product custom field

		add_action('woocommerce_process_product_meta' , array( $this , 'sp_save_varitation_meta' ), 10, 2 );		

	}



	public function sp_custom_shipping_options( $loop, $variation_data = array(), $variation = array()){

		

		if (!empty($variation) || isset($variation->ID)) {

            /* Variable products */

            $this->sp_product_custom_fields( $variation->ID , 'variation'  );

        } else {

            /* Simple products */

            $post_id = get_the_ID();

            $this->sp_product_custom_fields($post_id , 'simple' );

        }

	

	}

	public function sp_product_custom_fields( $post_id , $type ){

		//$product_id = get_the_ID();

		$drophouse_lists = sp_get_all_dropship_locations();

		

		$freight_enable 		= get_post_meta( $post_id, 'freight_enable' , true );

		$small_enable 			= get_post_meta( $post_id, 'small_enable' , true );

		$_freight_class 		= get_post_meta( $post_id, '_freight_class', true );

		

		$vertical_rotaion 		= get_post_meta( $post_id , 'vertical_rotaion' , true );

		$ship_own_item 			= get_post_meta( $post_id , 'ship_own_item' , true );

		$ship_multiple_package 	= get_post_meta( $post_id , 'ship_multiple_package' , true );

		$dropship_enable 		= get_post_meta( $post_id , 'dropship_enable' , true );

		$dropship_location 		= get_post_meta( $post_id , 'dropship_location' , true );

		$hazardous_enable 		= get_post_meta( $post_id , 'hazardous_enable' , true );

		$freight_small 			= get_post_meta( $post_id , 'freight_small' , true );

		

		/* freight option */

		 	$freight_option = array();

		 	$freight_option[0] = 'Please select the classification';

		 	for ($i=1; $i <5 ; $i++) {

		 		$freight_option[$i] = $i;

		 	}



		/* drophouse_option */

	 	$drophouse_option = array();

	 	$drophouse_option[0] = 'Please add the DropShip location';

	 	

	 	if(!empty( 	$drophouse_lists ) ){

	 		foreach ($drophouse_lists as $key => $item) {

		 		$drophouse_option[$item->location_id] = $item->city;

		 	}	

	 	}

	 	



	 	/* freight_enable */

		if( !empty( $freight_enable ) && 1 == $freight_enable ){

			$freight_small = 'freight_enable';

		}



		if( !empty( $small_enable ) && 1 == $small_enable ){

			$freight_small = 'small_enable';

		}

		

		//small_enable

		if( empty( $freight_enable ) && empty( $small_enable ) ){

			$freight_small = 'freight_enable';

		}

		

		?>

		 	<style type="text/css">

		 		.hide {

				    display: none !important;

				}

				#custom_shipping_product_data ul.wc-radios{

					float: none !important;

				}

				#custom_shipping_product_data ul.wc-radios li {

				    display: inline-block !important;

				    max-width: 150px;

				    width: 100%;

				}		



		 	</style>

		<?php

		echo '<input type="hidden" name="sp_product_type" value="'.$type.'">';

		echo '<div class="sp_meta_fields">';

			echo '<div class="options_group">';

				echo '<input name="variant_id[]" type="hidden" value="'.$post_id.'"/>';

			 	woocommerce_wp_radio( array(

					'id' => 'freight_small'.$post_id,

					'label' => '',

					'class' => 'freight_small_radio',

					'name' => 'freight_small['.$post_id.']',

					'value' => $freight_small,

					'options' => array(

						'freight_enable' => 'LTL Shipment',

						'small_enable' => 'Small Package or parcel'

					),

					'style' => 'width:16px', // required for checkboxes and radio buttons

					'wrapper_class' => 'form-field-wide' // always add this class

				) );

		 	echo '</div>';



		 	echo '<div class="options_group freight pro-radio-change">';

		 		woocommerce_wp_select( array(

					'id' => '_freight_class['.$post_id.']',

					'class' => '_freight_class',

					'label' => 'Frieght classification:',

					'value' => $_freight_class,

					'options' => $freight_option,

					'wrapper_class' => 'form-field-wide',

					'desc_tip' => true,

					'description' => 'Select Frieght classification.',

				) );

		 	echo '</div>';



	 	/* small */

		 	echo '<div class="options_group small_package pro-radio-change">';



			 	woocommerce_wp_checkbox( array(

					'id'      => 'vertical_rotaion'.$post_id,

					'name'    => 'vertical_rotaion['.$post_id.']',

					'value'   => $vertical_rotaion,

					'cbvalue' => 1,

					'label'   => 'Allow vertical roation',

					'desc_tip' => true,

					'description' => 'Allow vertical roation.',

				) );



				woocommerce_wp_checkbox( array(

					'id'      => 'ship_own_item'.$post_id,

					'name'      => 'ship_own_item['.$post_id.']',

					'value'   => $ship_own_item,

					'cbvalue'   => 1,

					'label'   => 'Ship as own package',

					'desc_tip' => true,

					'description' => 'Ship as own package.',

				) );



				woocommerce_wp_checkbox( array(

					'id'      => 'ship_multiple_package'.$post_id,

					'name'      => 'ship_multiple_package['.$post_id.']',

					'value'   => $ship_multiple_package,

					'cbvalue'   => 1,

					'label'   => 'This item Ship as multiple packages.',

					'desc_tip' => true,

					'description' => 'This item Ship as multiple packages.',

				) );



		 	echo '</div>';



		 	woocommerce_wp_checkbox( array(

				'id'      => 'dropship_enable'.$post_id,

				'name'      => 'dropship_enable['.$post_id.']',

				'value'   => $dropship_enable,

				'label'   => 'Drop Ship this product',

				'desc_tip' => true,

				'cbvalue'   => 1,

				'description' => 'Drop Ship this product.',

			) );



		 	woocommerce_wp_select( array(

				'id' => 'dropship_location['.$post_id.']',

				'label' => 'Drop Ship Locations:',

				'value' => $dropship_location,

				'options' => $drophouse_option,

				'wrapper_class' => 'form-field-wide',

				'desc_tip' => true,

				'description' => 'Select Drop Ship Locations.',

			) );



		 	woocommerce_wp_checkbox( array(

				'id'      => 'hazardous_enable'.$post_id,

				'name'      => 'hazardous_enable['.$post_id.']',

				'value'   => $hazardous_enable,

				'label'   => 'Hazardous material',

				'desc_tip' => true,

				'cbvalue'   => 1,

				'description' => 'Hazardous material.',

			) );

		echo '</div>';

	 	

	}



	public function sp_save_varitation_meta( $post_id ){

		global $wpdb;

		$tablename = $wpdb->prefix.'product_settings'; 



		//get the variation array key

		$variation_key  = array_search($post_id, sanitize_text_field($_POST['variant_id']));



		$additional_settings = array();



		if( isset( $_POST['vertical_rotaion'][$post_id] )  && !empty( $_POST['vertical_rotaion'][$post_id] ) ){

			$additional_settings['vertical_rotaion'] = sanitize_text_field($_POST['vertical_rotaion'][$post_id]);

		}else{

			$additional_settings['vertical_rotaion'] = 0;

		}



		if( isset( $_POST['ship_own_item'][$post_id] )  && !empty( $_POST['ship_own_item'][$post_id] ) ){

			$additional_settings['ship_own_item'] = sanitize_text_field($_POST['ship_own_item'][$post_id]);

		}else{

			$additional_settings['ship_own_item'] = 0;

		}



		if( isset( $_POST['ship_multiple_package'][$post_id] )  && !empty( $_POST['ship_multiple_package'][$post_id] ) ){

			$additional_settings['ship_multiple_package'] = sanitize_text_field($_POST['ship_multiple_package'][$post_id]);

		}else{

			$additional_settings['ship_multiple_package'] = 0;

		}



		if( isset( $_POST['hazardous_enable'][$post_id] )  && !empty( $_POST['hazardous_enable'][$post_id] ) ){

			$additional_settings['hazardous_enable'] = 1;

		}else{

			$additional_settings['hazardous_enable'] = 0;

		}



		if( isset( $_POST['sp_product_type'] ) && $_POST['sp_product_type'] == 'variation' ){



			$product_weight = isset( $_POST['variable_weight'][$variation_key] ) ?sanitize_text_field( $_POST['variable_weight'][$variation_key]) : '';

			$product_width = isset( $_POST['variable_width'][$variation_key] ) ?sanitize_text_field( $_POST['variable_width'][$variation_key]) : '';

			$product_height = isset( $_POST['variable_height'][$variation_key] ) ?sanitize_text_field( $_POST['variable_height'][$variation_key]) : '';

			$product_length = isset( $_POST['variable_length'][$variation_key] ) ?sanitize_text_field( $_POST['variable_length'][$variation_key]) : '';



			$variant_id = $post_id;



		}else if(isset( $_POST['sp_product_type'] ) && $_POST['sp_product_type'] == 'simple' ){

			$variation_key = $post_id;



			$product_weight = isset( $_POST['_weight'][$variation_key] ) ?sanitize_text_field( $_POST['_weight'][$variation_key]) : '';

			$product_width = isset( $_POST['_width'][$variation_key] ) ?sanitize_text_field( $_POST['_width'][$variation_key]) : '';

			$product_height = isset( $_POST['_height'][$variation_key] ) ?sanitize_text_field( $_POST['_height'][$variation_key]) : '';

			$product_length = isset( $_POST['_length'][$variation_key] ) ?sanitize_text_field( $_POST['_length'][$variation_key]) : '';

			$variant_id = $post_id;



		}

		$insert_data = array(

			'shop' =>  $_SERVER['HTTP_HOST'],

			'product_id' => isset( $_POST['product_id'] ) ?sanitize_text_field( $_POST['product_id']) : $post_id,

			'variant_id' => $variant_id,

			//'nmfc' => ,

			'freight_enable' => isset( $_POST['freight_small'][$post_id] ) &&  $_POST['freight_small'][$post_id] == 'freight_enable' ? 1 : 0,

			'small_enable' => isset( $_POST['freight_small'][$post_id] ) && $_POST['freight_small'][$post_id] == 'small_enable' ? 1 : 0,

			'product_freight_class' => isset( $_POST['_freight_class'][$post_id] ) ?sanitize_text_field( $_POST['_freight_class'][$post_id]) : 0,

			'product_weight' => $product_weight,

			'product_width' => $product_width,

			'product_height' => $product_height,

			'product_length' => $product_length,

			'hazardous_enable' => isset( $_POST['hazardous_enable'][$post_id] ) ?sanitize_text_field( $_POST['hazardous_enable'][$post_id]) : 0,

			//'hz_un_number_header' => ,

			//'hz_un_number' => ,

			//'hazmat_class' => ,

			//'hz_em_contact_phone' => ,

			//'hz_packaging_group' => ,

			'dropship_enable' => isset( $_POST['dropship_enable'][$post_id] ) ?sanitize_text_field( $_POST['dropship_enable'][$post_id]) : 0,

			'dropship_location' => isset( $_POST['dropship_location'][$post_id] ) ?sanitize_text_field( $_POST['dropship_location'][$post_id]) : 0,

			'product_sku' => isset( $_POST['_sku'][$post_id] ) ?sanitize_text_field( $_POST['_sku'][$post_id]) : '',

			//'handle' => ,

			//'hazmat_details' => ,

			'shipping_rate' => isset( $_POST['shipping_rate'][$post_id] ) ?sanitize_text_field( $_POST['shipping_rate'][$post_id]) : '',

			'additional_settings' => json_encode($additional_settings),

		);

		/*echo '<pre>';

		print_r($insert_data);

		echo '</pre>';*/

		//die;

		//check data in our custom table

		$query = "SELECT * FROM $tablename WHERE product_id = ".$insert_data['product_id']." AND variant_id =".$insert_data['variant_id'];

		$results = $wpdb->get_row( $query );

		$query_results = false;

		if(!empty( $results ) ){

			//update the already added data in custom table

			$where_arr = array(

				'id' => $results->id,

			);

			$where_format = array(  '%d' );

			$formate = array('%s','%d','%d','%d','%d','%s','%s','%s','%s','%s','%d','%d','%d','%s','%s','%s');

			$update = $wpdb->update( $tablename, $insert_data, $where_arr, $format ,$where_format);

			if($update){

				$query_results = true;

			}

		}else{

			//insert the new table

			$formate = array('%s','%d','%d','%d','%d','%s','%s','%s','%s','%s','%d','%d','%d','%s','%s','%s');

			$insert = $wpdb->insert( $tablename, $insert_data, $formate );

			if($insert){

				$query_results = true;

			}

		}

		if( $query_results ){

			$product_id =  $insert_data['variant_id'];

			$remove_meta = array('_sku');

			foreach ($insert_data as $meta_key => $meta_value) {

				if( !in_array( $meta_key, $remove_meta ) ){

					if('product_id' != $meta_key){

						$meta_key = str_replace('product', '', $meta_key);	

					}

					if( 'additional_settings' == $meta_key ){

						foreach ($additional_settings as $key => $value) {

							update_post_meta( $product_id , "$key" , $value );		

						}

					}else{

						update_post_meta( $product_id , "$meta_key" , $meta_value );	

					}	

				}

			}

		}

	}

}

$sp_producttab = new SpProductTab();