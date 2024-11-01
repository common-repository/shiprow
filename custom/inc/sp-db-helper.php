<?php

/*

get all carrier list

*/

function sp_get_all_carrier_list(){

	global $wpdb;

	$table_name = $wpdb->prefix.'carriers';

	$query = "SELECT * FROM $table_name";

	$results = $wpdb->get_results( $query );

	if( !empty( $results ) ){

		return $results;

	}else{

		return false;

	}

}



/*

* get enable carrier list

*/

function sp_enable_carrier_list(){

	global $wpdb;

	$table_enable_carrier = $wpdb->prefix.'store_enabled_carriers';

	$table_carrier_list = $wpdb->prefix.'carriers';

	$query = "SELECT * FROM $table_enable_carrier e JOIN $table_carrier_list c WHERE e.carrier_id = c.carrier_id ORDER BY c.`carrier_name` ASC";

	$results = $wpdb->get_results( $query );

	if( !empty( $results ) ){

		return $results;

	}else{

		return false;

	}

}



/*

* get check carrier 

*/

function sp_check_carrier( $carrier_id ){

	global $wpdb;

	$tablename = $wpdb->prefix.'store_enabled_carriers';

	$query = "SELECT * FROM $tablename WHERE carrier_id=$carrier_id";

	$row = $wpdb->get_row( $query );

	if( !empty( $row ) ){

		return true;

	}else{

		return false;

	} 



}

/*get all dropship locations*/

function sp_get_all_dropship_locations(){

	global $wpdb;

 	$drophouse_query = "SELECT * FROM {$wpdb->prefix}locations WHERE type='dropship'";

	$drophouse_lists = $wpdb->get_results($drophouse_query);
	$settingArray = array();
	foreach($drophouse_lists as $key=>$row){
		$settingArray[$row->location_id] = $row;

	}

	if( !empty( $drophouse_lists ) ){

		return $drophouse_lists;

	}else{

		return false;

	}

}

/*get carrier name*/

function sp_get_carrier_name( $carrier_id ){

	global $wpdb;

	if( !empty( $carrier_id ) ){

		$carrier_query = "SELECT carrier_name FROM {$wpdb->prefix}carriers WHERE carrier_id=$carrier_id";

		$results = $wpdb->get_row($carrier_query);

		if(!empty( $results ) ){

			return $results->carrier_name;

		}else{

			return '';

		}

	}else{

		return '';

	}

}

/*get connection settings*/

function sp_get_connection_settings( $carrier_id ){

	global $wpdb;

	$tablename = $wpdb->prefix.'store_settings';

	$query = "SELECT * FROM $tablename WHERE carrier_id = $carrier_id";

	$results = $wpdb->get_row( $query );

	if( !empty( $results ) ){

		return $results;

	}else{

		return false;

	}

}

/*get list for box size*/

function sp_get_box_list(){

	global $wpdb;

	$tablename = $wpdb->prefix.'bins';

	$query = "SELECT * FROM $tablename";

	$results = $wpdb->get_results( $query );

	if( !empty($results) ){

		return $results;

	}else{

		return false;

	}

}

function sp_get_product_request_data( $product_id , $variation_id = '' ){

	/*$return  = array(

		'name' => ,

		'sku' => ,

		'quantity' => ,

		'grams' => ,

		'price' => ,

		'vendor' => ,

		'requires_shipping' => ,

		'taxable' => ,

		'fulfillment_service' => ",

		'properties' => ,

		'product_id' => ,

		'variant_id' => ,

	);*/



}

function sp_get_license(){
	global $wpdb;
	$query="SELECT * FROM  {$wpdb->prefix}sp_license";
	$result=$wpdb->get_results($query,ARRAY_A);
	if(count($result)>0){
		return $result[0];
	}
	else{
		return '';
	}
}

function sp_get_all_warehouses(){

	global $wpdb;

	//collect all warehouse

	$warehouse_query = "SELECT * FROM {$wpdb->prefix}locations WHERE type='warehouse'";

	$warehouse_lists = $wpdb->get_results($warehouse_query);

	return ( !empty( $warehouse_lists ) ) ? $warehouse_lists : '';



}

function sp_get_all_dropships(){

	global $wpdb;

	//collect all drophouse

	$drophouse_query = "SELECT * FROM {$wpdb->prefix}locations WHERE type='dropship'";

	$drophouse_lists = $wpdb->get_results($drophouse_query);
	$dropships = array();
	foreach($drophouse_lists as $key=> $row){
	    $dropships[$row->location_id] = (array) $row;
	}

	return ( !empty( $dropships ) ) ? $dropships : '';

}

function sp_get_all_store_setting(){

	global $wpdb;

	$query = "SELECT * FROM {$wpdb->prefix}store_settings";

	$query="SELECT {$wpdb->prefix}store_settings.* FROM {$wpdb->prefix}store_enabled_carriers INNER JOIN {$wpdb->prefix}store_settings ON {$wpdb->prefix}store_enabled_carriers.carrier_id={$wpdb->prefix}store_settings.carrier_id";

	$store_setting = $wpdb->get_results($query);
	$settingArray = array();
	foreach($store_setting as $key=>$row){
		$settingArray[$row->carrier_id] = $row;

	}

	return ( !empty( $settingArray ) ) ? $settingArray : '';

}

function sp_get_product_setting( $product_id, $variation_id = '' ){

	global $wpdb;

	$query = "SELECT * FROM {$wpdb->prefix}product_settings WHERE product_id=".$product_id;

	if( !empty( $variation_id ) ){

		$query .=" AND variant_id=".$variation_id;

	}


	$product_setting = $wpdb->get_results($query);

	return ( !empty( $product_setting ) ) ? $product_setting : '';	

}

function sp_get_all_box_sizes(){

	global $wpdb;

	$query = "SELECT * FROM {$wpdb->prefix}bins";

	$box_sizes = $wpdb->get_results($query);

	return ( !empty( $box_sizes ) ) ? $box_sizes : '';		

}
function sp_get_common_settings(){

	global $wpdb;

	$query = "SELECT * FROM {$wpdb->prefix}common_settings";

	$box_sizes = $wpdb->get_results($query);

	return ( !empty( $box_sizes ) ) ? $box_sizes : '';		

}

?>