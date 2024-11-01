<?php







/**







 * adding all ajax here only for admin side







 */







class SPROWAdminAjax







{







	







	function __construct(){







		//ajax for collect the zipcode details







		add_action( 'wp_ajax_zipcode_details' , array( $this , 'zipcode_details' ) ); 







		//store the warehouse







		add_action( 'wp_ajax_save_warehouse' , array( $this , 'save_warehouse' ) );







		//editwarehouse







		add_action( 'wp_ajax_edit_warehouse' , array( $this, 'edit_warehouse' ) );







		//delete warehouse







		add_action( 'wp_ajax_delete_warehouse', array( $this, 'delete_warehouse' ) );



		//delete dropship







		add_action( 'wp_ajax_delete_dropship', array( $this, 'delete_dropship' ) );







		//products list







		add_action( 'wp_ajax_sp_product_list', array( $this, 'sp_product_list' ) );







		//save product meta







		add_action( 'wp_ajax_sp_product_meta', array( $this , 'sp_product_meta' ) );







		//store setting







		add_action( 'wp_ajax_sp_save_store_setting' , array( $this , 'sp_save_store_setting' ) );







		//save quote setting 







		add_action( 'wp_ajax_sp_save_quote_setting' , array( $this , 'sp_save_quote_setting' ) );







		// save add box sp_add_box







		add_action( 'wp_ajax_sp_add_box' , array( $this , 'sp_add_box' ) );







		//get box data







		add_action( 'wp_ajax_sp_get_box_data' , array( $this, 'sp_get_box_data' ) );







		// edit box







		add_action( 'wp_ajax_sp_edit_box', array( $this, 'sp_edit_box' ) );







		//test carrier connection







		add_action( 'wp_ajax_sp_test_carrier_connections',array( $this, 'sp_test_carrier_connections' ) );







		//delete the box







		add_action( 'wp_ajax_sp_delete_box', array( $this, 'sp_delete_box' ) );







		// store enable carrier table







		add_action( 'wp_ajax_sp_enable_carrier_list' , array( $this , 'sp_enable_carrier_list' ) );







		//delete the enable carrier 







		add_action( 'wp_ajax_sp_remove_carrier', array( $this , 'sp_remove_carrier' ) );







		//get test rate







		add_action( 'wp_ajax_sp_get_test_rate' , array( $this , 'sp_get_test_rate' ) );







		//order list table







		add_action( 'wp_ajax_sp_order_list' , array( $this , 'sp_order_list' ) );







		//license save



		add_action( 'wp_ajax_save_license' , array( $this , 'save_license' ) );







		//disabling carriers when updating license



		add_action( 'wp_ajax_disable_carriers' , array( $this , 'disable_carriers' ) );







		//saveing wwe ltl carriers



		add_action( 'wp_ajax_sp_save_carriers_wwe' , array( $this , 'sp_save_carriers_wwe' ) );







		//get mapping for import



		add_action( 'wp_ajax_sp_get_mapping' , array( $this , 'sp_get_mapping' ) );











		//adding shipping rules



		add_action( 'wp_ajax_shipping_rule_add' , array( $this , 'shipping_rule_add' ) );



		add_action( 'wp_ajax_shipping_rule_delete' , array( $this , 'shipping_rule_delete' ) );



		add_action( 'wp_ajax_shipping_zone_add' , array( $this , 'shipping_zone_add' ) );



		add_action( 'wp_ajax_shipping_zone_delete' , array( $this , 'shipping_zone_delete' ) );



		add_action( 'wp_ajax_shipping_group_add' , array( $this , 'shipping_group_add' ) );



		add_action( 'wp_ajax_shipping_group_delete' , array( $this , 'shipping_group_delete' ) );



		add_action( 'wp_ajax_shipping_filter_add' , array( $this , 'shipping_filter_add' ) );



		add_action( 'wp_ajax_shipping_filter_delete' , array( $this , 'shipping_filter_delete' ) );



		add_action( 'wp_ajax_save_capped_amount' , array( $this , 'save_capped_amount' ) );



		add_action( 'wp_ajax_sp_get_rates' , array( $this , 'sp_get_rates' ) );



		add_action( 'wp_ajax_check_step' , array( $this , 'check_step' ) );







	







	}











	/**







	 * [zipcode_details getting the zipcode details]







	 * @return [type] [description]







	 */



	function sp_get_rates(){



		$arr=stripslashes(sanitize_text_field($_POST['arr']));



		$arr=json_decode($arr,true);



		// echo $arr['rate']['destination']['city'];



		$request = array();



		$request['warehouses'] = sp_get_all_warehouses();



		$request['dropships'] = sp_get_all_dropships();



		$request['store_setting'] = sp_get_all_store_setting();



		$request['box_sizes'] = sp_get_all_box_sizes();



		$request['common_settings'] = sp_get_common_settings();



		$request['authentication'] = sp_get_license();



		$request['destination'] = array();



		$request['destination']['country']=$arr['rate']['destination']['country'];



		$request['destination']['state']=$arr['rate']['destination']['province'];



		$request['destination']['postcode']=$arr['rate']['destination']['postal_code'];



		$request['destination']['city']=$arr['rate']['destination']['city'];



		$request['destination']['address']=$arr['rate']['destination']['address1'];



		$request['destination']['address_1']=$arr['rate']['destination']['address1'];



		$request['destination']['address_2']=$arr['rate']['destination']['address2'];



		$itemCount = 0;



		// error_log('$contents '.json_encode($contents));



	



		foreach ($arr['rate']['items'] as  $content) {



			



		



			 



			$request['items'][$itemCount]['product_name'] = $content['name'];



			$request['items'][$itemCount]['product_sku'] = $content['sku'];



			$request['items'][$itemCount]['product_qty'] = $content['quantity'];



			$request['items'][$itemCount]['weight'] = $content['product_weight'];



			$request['items'][$itemCount]['price'] = $content['price'];



			



			$request['items'][$itemCount]['product_setting'] = array();



			$request['items'][$itemCount]['product_setting'][0]['id'] = $content['product_id'];



			$request['items'][$itemCount]['product_setting'][0]['shop'] = $_SERVER['HTTP_HOST'];



			$request['items'][$itemCount]['product_setting'][0]['product_id'] = $content['product_id'];



			$request['items'][$itemCount]['product_setting'][0]['variant_id'] = $content['variant_id'];



			$request['items'][$itemCount]['product_setting'][0]['nmfc'] = NULL;



			$request['items'][$itemCount]['product_setting'][0]['freight_enable'] = $content['freight_enable'];



			$request['items'][$itemCount]['product_setting'][0]['small_enable'] = $content['small_enable'];



			$request['items'][$itemCount]['product_setting'][0]['product_freight_class'] = $content['product_freight_class'];



			$request['items'][$itemCount]['product_setting'][0]['product_weight'] = $content['product_weight'];



			$request['items'][$itemCount]['product_setting'][0]['product_width'] = $content['product_width'];



			$request['items'][$itemCount]['product_setting'][0]['product_height'] = $content['product_height'];



			$request['items'][$itemCount]['product_setting'][0]['product_length'] = $content['product_length'];



			$request['items'][$itemCount]['product_setting'][0]['hazardous_enable'] = (isset($content['hazardous_enable'])?$content['hazardous_enable']:'');



			$request['items'][$itemCount]['product_setting'][0]['hz_un_number_header'] = NULL;



			$request['items'][$itemCount]['product_setting'][0]['hz_un_number'] = NULL;



			$request['items'][$itemCount]['product_setting'][0]['hazmat_class'] = NULL;



			$request['items'][$itemCount]['product_setting'][0]['hz_em_contact_phone'] = NULL;



			$request['items'][$itemCount]['product_setting'][0]['hz_packaging_group'] = NULL;



			$request['items'][$itemCount]['product_setting'][0]['dropship_enable'] = $content['dropship_enable'];



			$request['items'][$itemCount]['product_setting'][0]['dropship_location'] = $content['dropship_location'];



			$request['items'][$itemCount]['product_setting'][0]['product_sku'] = $content['sku'];



			$request['items'][$itemCount]['product_setting'][0]['handle'] = "";



			$request['items'][$itemCount]['product_setting'][0]['hazmat_details'] = NULL;



			$request['items'][$itemCount]['product_setting'][0]['shipping_rate'] = NULL;



			$request['items'][$itemCount]['product_setting'][0]['additional_settings'] = array();



			$request['items'][$itemCount]['product_setting'][0]['additional_settings']['vertical_rotation']=(isset($content['vertical_rotation'])?$content['vertical_rotation']:'');



			$request['items'][$itemCount]['product_setting'][0]['additional_settings']['ship_own_pakage']=$content['ship_own_pakage'];



			$request['items'][$itemCount]['product_setting'][0]['additional_settings']['ship_own_pakage']=0;



			$request['items'][$itemCount]['product_setting'][0]['additional_settings']['hazardous_enable']=(isset($content['hazardous_enable'])?$content['hazardous_enable']:'');



			$request['items'][$itemCount]['product_setting'][0]['additional_settings']=json_encode($request['items'][$itemCount]['product_setting'][0]['additional_settings']);







			$request['items'][$itemCount]['product_setting'][0]['freight_enable'] = $content['freight_enable'];



			$request['items'][$itemCount]['product_setting'][0]['freight_enable'] = $content['freight_enable'];



		



			$request['items'][$itemCount]['product_id'] = $content['product_id'];



			$request['items'][$itemCount]['variant_id'] = $content['variant_id'];



			$itemCount++;







		}











		$request['currency'] = get_option( 'woocommerce_currency' );



		$request['locale'] = get_locale();



		$responseData=wp_remote_post('https://app.shiprow.com/index.php?shop='.$_SERVER['HTTP_HOST'].'&platform=wordpress',



										array(



											'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),



											'method'=>'POST',



											'httpversion'=>1.0,



											'timeout'     => 30,



											'body'=>json_encode($request),



											));



			$responseData=$responseData['body'];



			$commonSetting=json_decode($responseData,true);



			if(isset($commonSetting['binResponse'])){



			global $wpdb;







				$commonSetting=$commonSetting['binResponse'];



				$totalBalance=$commonSetting['total_balance'];



				$remainingBalance=$commonSetting['remaining_balance'];



				$usedBalance=$commonSetting['used_balance'];



				error_log(json_encode($usedBalance));



				$sql="UPDATE {$wpdb->prefix}common_settings SET `total_balance`=$totalBalance,`remaining_balance`=$remainingBalance,`used_balance`=$usedBalance";



				$wpdb->query($sql);



			}			



			







			error_log(($responseData));



			echo $responseData;



		



		wp_die();



	}



	function save_capped_amount(){



		global $wpdb;



		//







		$postData=array();



		$postData['total_balance']=sanitize_text_field($_POST['total_balance']);



		$postData['shop']=$_SERVER['HTTP_HOST'];



		$server_output=wp_remote_post('https://shiprow.com/admin/index.php?module=api&action=totalBalanceAdd',



											array(



												'method'=>'POST',



												'httpversion'=>1.0,



												'timeout'     => 30,



												'body'=>http_build_query($postData),



												));



		$server_output=$server_output['body'];



		if($server_output=='1'){



			$totalBalance=sanitize_text_field($_POST['total_balance']);



			$rad=sanitize_text_field($_POST['rad']);



			$email=sanitize_text_field($_POST['email']);







			$exist=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}common_settings",ARRAY_A);



			if(count($exist)>0){



				$remaining_balance=$totalBalance-((isset($exist[0]['used_balance']) AND $exist[0]['used_balance']>0)?$exist[0]['used_balance']:0);



				$sql="UPDATE `{$wpdb->prefix}common_settings` SET `binpackaging`=".$rad.",`email`='".$email."',`total_balance`=".$totalBalance.",`remaining_balance`=".$remaining_balance."";



			}else{



				$sql="INSERT INTO `{$wpdb->prefix}common_settings` (`shop`,`email`,`binpackaging`,`total_balance`,`remaining_balance`) VALUES('".$_SERVER['HTTP_HOST']."','".$email."',".$rad.",".$totalBalance.",".$totalBalance.")";



			}











		$wpdb->query($sql);



		}else{



			echo '-1';



		}



		wp_die();



	}



	function shipping_filter_delete(){



	    global $wpdb;



	    $table = $wpdb->prefix.'filters';



	    $id=sanitize_text_field($_POST['id']);



	    $sql="DELETE FROM $table WHERE id=$id";



	    $wpdb->query($sql);



	    echo 1;



	    wp_die(); 



	 }



	function shipping_filter_add(){



	    unset($_POST['action']);



	    global $wpdb;



	    $table = $wpdb->prefix.'filters';











	    //getting post data and putting it into array



	    $_POST=sanitize_post($_POST);



	    $params=array();



	        foreach ($_POST as $key => $value) {



	            $params[$key]=$value;



	        }



	        $params['shop']=$_SERVER['HTTP_HOST'];











	        //spliting values got from ajax for conversion to sql query string. keys r table name in db.



	        $keys = implode(',', array_keys($params));



	        $values = implode("','", array_values($params));



	        $sql = "INSERT INTO `".$table."` (".$keys.") VALUES ('".$values."')";











	        //iserting into db



	        $wpdb->query($sql);



	        echo 1;



	    wp_die(); 



	 }



	function shipping_group_delete(){



	    global $wpdb;



	    $table = $wpdb->prefix.'shipping_groups';



	    $id=sanitize_text_field($_POST['id']);



	    $sql="DELETE FROM $table WHERE id=$id";



	    $wpdb->query($sql);



	    echo 1;



	    wp_die(); 



	 }



	function shipping_group_add(){



	    unset($_POST['action']);



	    global $wpdb;



	    $table = $wpdb->prefix.'shipping_groups';











	    //getting post data and putting it into array



	    $_POST=sanitize_post($_POST);



	    $params=array();



	        foreach ($_POST as $key => $value) {



	            $params[$key]=$value;



	        }



	        $params['shop']=$_SERVER['HTTP_HOST'];











	        //spliting values got from ajax for conversion to sql query string. keys r table name in db.



	        $keys = implode(',', array_keys($params));



	        $values = implode("','", array_values($params));



	        $sql = "INSERT INTO `".$table."` (".$keys.") VALUES ('".$values."')";











	        //iserting into db



	        $wpdb->query($sql);



	        echo 1;



	    wp_die(); 



	 }











	function shipping_zone_delete(){



	    global $wpdb;



	    $table = $wpdb->prefix.'shipping_zones';



	    $id=sanitize_text_field($_POST['id']);



	    $sql="DELETE FROM $table WHERE id=$id";



	    $wpdb->query($sql);



	    echo 1;



	    wp_die(); 



	 }



	function shipping_zone_add(){



	    unset($_POST['action']);



	    global $wpdb;



	    $table = $wpdb->prefix.'shipping_zones';











	    //getting post data and putting it into array



	    $_POST=sanitize_post($_POST);



	    $params=array();



	        foreach ($_POST as $key => $value) {



	            $params[$key]=$value;



	        }



	        $params['shop']=$_SERVER['HTTP_HOST'];











	        //spliting values got from ajax for conversion to sql query string. keys r table name in db.



	        $keys = implode(',', array_keys($params));



	        $values = implode("','", array_values($params));



	        $sql = "INSERT INTO `".$table."` (".$keys.") VALUES ('".$values."')";











	        //iserting into db



	        $wpdb->query($sql);



	        echo 1;



	    wp_die(); 



	 }



	function shipping_rule_delete(){



	 	global $wpdb;



		$table = $wpdb->prefix.'shipping_rules';



	 	$id=sanitize_text_field($_POST['id']);



	 	$sql="DELETE FROM $table WHERE id=$id";



	 	$wpdb->query($sql);



	 	echo 1;



	 	wp_die(); 



 	}







	function shipping_rule_add(){



		unset($_POST['action']);



		global $wpdb;



		$table = $wpdb->prefix.'shipping_rules';











		//getting post data and putting it into array



		$params=array();



			$_POST=sanitize_post($_POST);



	        foreach ($_POST as $key => $value) {



	            $params[$key]=$value;



	        }



	        $params['shop']=$_SERVER['HTTP_HOST'];



	        unset($params['id']);











	        //spliting values got from ajax for conversion to sql query string. keys r table name in db.



	        if(isset($_POST['id']) AND !empty($_POST['id'])){//for updating



	        	$where=array('shop'=>$_SERVER['HTTP_HOST'],'id'=>$_POST['id']);







	        	$paramStr = implode(', ', array_map(



			        function ($v, $k) {



			            if(is_array($v)){



			                return $k.'[]='.implode('&'.$k.'[]=', $v);



			            }else{



			                return $k."='".$v."'";



			            }



			        }, 



			        $params, 



			        array_keys($params)



			    ));



	        	if($where && is_array($where) && !empty($where)){



			        $where_string = '';



			        $wheresep = '';



			        foreach ($where as $key => $value) {



			            $where_string .= $wheresep."`".$key."` = '".$value."' ";



			            $wheresep = 'AND ';



			        }



			        $where = " WHERE ".$where_string;



			    }else{



			        $where = '';



			    }



		        $sql = "UPDATE `".$table."` SET ".$paramStr." ".$where;



		    }else{ //for inserting



		    	$keys = implode(',', array_keys($params));



		        $values = implode("','", array_values($params));



		        $sql = "INSERT INTO `".$table."` (".$keys.") VALUES ('".$values."')";



		    }











	        //iserting into db



	        $wpdb->query($sql);



	    	echo 1;



		wp_die(); 



	 }







	public function zipcode_details(){







		$spws = new SpWebservice();







		$post_data = array();







		$post_data = array(







		'domain'=> 'test.com',







		'requestType'=>'address',







		'address'=>sanitize_text_field($_POST['zipcode']), //////////////////////// here i have to add my zip code?







		'pluginLicenseKey'=>'12112312-2112132-123121312-12312123'







	);











	$server_output=wp_remote_post('https://app.shiprow.com/geo-location.php',



										array(



											'method'=>'POST',



											'httpversion'=>1.0,



											'timeout'     => 30,



											'body'=>http_build_query($post_data),



											));



	$server_output=$server_output['body'];























		$response['success'] = true;







		$response['data'] =  json_decode($server_output,true);















		$json = array();







		if( $response['success'] ){







			$json['success'] = true;







			$json['data'] = $response['data'];







		}else{







			$json['success'] = false;







			$json['message'] = $response['message'];







		}







		echo json_encode( $json );







		wp_die();







	}















	public function save_warehouse(){







		$json = array();



		







		parse_str( sanitize_post($_POST['data']) , $post );















		if( empty($post['zipcode'] ) OR empty($post['city']) ){







			$json['success'] = false;







			$json['message'] = __( 'Enter the zipcode','wccsp' );







			echo json_encode($json);







			wp_die();







		}



		$post['city']=stripslashes($post['city']);











		$post['shop'] = $_SERVER['HTTP_HOST'];			







		$settings =array();







		







		if( isset( $post['instore_pickup'] ) && $post['instore_pickup'] ){







			







			$settings['instore_pickup']['miles'] = sanitize_text_field($post['instorepickup']['miles']);	







			$settings['instore_pickup']['zipcodes'] = sanitize_text_field($post['instorepickup']['zip_codes']);	







		}















		if( isset( $post['local_delivery'] ) && $post['local_delivery'] ){







			







			$settings['local_delivery']['miles'] = sanitize_text_field($post['localdelivery']['miles']);	







			$settings['local_delivery']['zipcodes'] = sanitize_text_field($post['localdelivery']['zip_codes']);	







			$settings['local_delivery']['fee'] = sanitize_text_field($post['local_delivery_fee']);	















		}















		if( isset( $post['suppress_other_rates'] ) && !empty( $post['suppress_other_rates'] ) ){







			$settings['suppress_other_rates'] = sanitize_text_field($post['suppress_other_rates']);







		}















		if( !empty( $settings ) ){







			$post['settings'] = json_encode( $settings );	







		}







		global $wpdb;







		//checking if city with same name exists











		$tablename = $wpdb->prefix.'locations';







		$sql="SELECT * FROM $tablename WHERE city=%s AND type=%s";



		$exist=$wpdb->get_results($wpdb->prepare($sql,sanitize_text_field($post['city']),sanitize_text_field($post['type'])),ARRAY_A);



		if(count($exist)>0 AND empty( $post['edit_id'])){



			$json['success']=false;



			$json['exist']=true;



			echo json_encode($json);



			wp_die();



		}











		$insert_data = array(







			'shop' => sanitize_text_field($post['shop']),







			'zipcode' => sanitize_text_field($post['zipcode']),







			'city' => sanitize_text_field($post['city']),







			'state' => sanitize_text_field($post['state']),







			'country' => sanitize_text_field($post['country']),







			'type' => sanitize_text_field($post['type']),







			'instore_pickup' => isset( $post['instore_pickup'] ) ? sanitize_text_field($post['instore_pickup']) : 0 ,







			'local_delivery' => isset( $post['local_delivery'] ) ? sanitize_text_field($post['local_delivery']) : 0 ,







			'settings' => (isset($post['settings'])?$post['settings']:''),







		);







		







		if( !empty( $post['edit_id'] ) ){







			$where_arr = array(







				'location_id' => sanitize_text_field($post['edit_id']),







			);







			$where_format = array(  '%d' );







			$format = array('%s','%s','%s','%s','%s','%s','%d','%d','%s');







			$update = $wpdb->update( $tablename, $insert_data, $where_arr, $format ,$where_format);







			if( $update ){















				$json['success'] = true;







				$json['type'] = 'update';







				$json['message'] = '<span class="pull-left text-success"> '.$post['type'].' Updated..!</span>';







			}else{







				$json['success'] = false;







				$json['type'] = 'update';







				$json['message'] = '<span class="pull-left text-danger">Error on '.$post['type'].' Update!</span>';







			}







		}else{







			$formate = array('%s','%s','%s','%s','%s','%s','%d','%d','%s');







			$insert = $wpdb->insert( $tablename, $insert_data, $formate );







			if( $insert ){







				$json['success'] = true;







				$json['type'] = 'insert';







				$json['message'] = '<span class="pull-left text-success">'.$post['type'].' Inserted..!</span>';







			}else{







				$json['success'] = false;







				$json['type'] = 'insert';







				$json['message'] = '<span class="pull-left text-danger">Error on '.$post['type'].' insert..!</span>';







			}







		}







		echo json_encode($json);







		wp_die();







	}















	public function edit_warehouse(){







		global $wpdb;







		$edit_id = sanitize_text_field($_POST['warehouse_id']);







		$warehouse_query = "SELECT * FROM {$wpdb->prefix}locations WHERE location_id = $edit_id";







		$warehouse_data = $wpdb->get_row($warehouse_query);







		$settings = json_decode( $warehouse_data->settings );







		$warehouse_data->settings = $settings;











		$json = array();







		$json['success'] = true; 







		$json['data'] = $warehouse_data; 







		echo json_encode($json);







		wp_die();







	}















	public function delete_warehouse(){







		global $wpdb;







		$json = array();







		$id = sanitize_text_field($_POST['warehouse_id']);







		$tablename = $wpdb->prefix.'locations';







		$delete = $wpdb->delete($tablename , array( 'location_id' => $id ) , array( '%d' ) );







		$json['success'] = ( $delete ) ? true : false ;







		echo json_encode( $json );







		wp_die();







	}



	public function delete_dropship(){



		if(isset($_POST['dropship_id']) AND !empty($_POST['dropship_id'])){



			$id= sanitize_text_field($_POST['dropship_id']);



			global $wpdb;



			$sql="SELECT * FROM {$wpdb->prefix}product_settings WHERE `dropship_location`=%d";



			$result=$wpdb->get_results($wpdb->prepare($sql,$id),ARRAY_A);



			$ret=array('count'=>count($result));



			echo json_encode($ret);







		}



		else{



			echo 0;



		}



		wp_die();







	}















	public function sp_product_list(){







	







		$draw = sanitize_text_field($_POST['draw']);







		$row = sanitize_text_field($_POST['start']);







		$rowperpage = sanitize_text_field($_POST['length']); // Rows display per page







		$columnIndex = sanitize_text_field($_POST['order'][0]['column']); // Column index







		$columnName = sanitize_text_field($_POST['columns'][$columnIndex]['data']); // Column name







		$columnSortOrder = sanitize_text_field($_POST['order'][0]['dir']); // asc or desc







		$searchValue = sanitize_text_field($_POST['search']['value']); // Search value







		$paged = $row/$rowperpage;







		$paged = ($paged == 0) ? 1 : $paged+1;







		$product_args = array(







			'post_type'	=> 'product',







			'post_status'=> 'publish',







			'posts_per_page' => $rowperpage,







			'paged' => $paged,















		);







	







		if( isset( $columnSortOrder ) ){







			$product_args['orderby'] = $columnName;







			if( '_stock' === $columnName ){







				$product_args['orderby'] = 'meta_value_num';







				$product_args['meta_key'] = '_stock';







			}







			$product_args['order'] = $columnSortOrder;







		}







		if( isset( $searchValue ) && !empty( $searchValue ) ){







			$product_args['s'] = $searchValue;







		}







		$product_query = new WP_Query( $product_args );







		$product_posts =  $product_query->posts;







		$totalRecords = $product_query->found_posts;







		$totalRecordwithFilter = $product_query->found_posts;







		if( !empty( $product_posts ) ){







			$product_data = array();







			foreach ( $product_posts as $key => $products) {







				$product_id = $products->ID;







				$manage_stock = get_post_meta( $product_id ,'_manage_stock', true ); //yes for managing stock







				if($manage_stock == 'yes'){







					$inventory = get_post_meta( $product_id , '_stock', true );	







					$inventory = ( !empty( $inventory ) ) ? $inventory. ' ' .__('in stock','wccsp') : '--';







				}else{







					$inventory = '';







				}







				







				$product_link = '<a href="'.get_edit_post_link( $product_id ).'" target="_blank">'.get_the_title( $product_id ).'</a>';







				$image_url = get_the_post_thumbnail_url($product_id);







				$terms = get_the_terms( $product_id, 'product_cat' );















				$product_type = array();







				if( !empty( $terms ) ){







					foreach ($terms as $term) {







					   $product_type[] = $term->name;







					}	







				}















				$author_id = $products->post_author;







				$display_name = get_the_author_meta( 'user_login' , $author_id );







				$data[] = array( 







			    







			      "image"=>'<img src="'.$image_url.'" width="26px"/>',







			      "title"=>$product_link,







			      "_stock" => $inventory,







			      "type"=> !empty( $product_type ) ? implode(' , ', $product_type ) : '',







			      "vendor"=> $display_name,







			      "action"=>'<a href="?page=sp-settings&tab=products&subtab='.$product_id.'" class="btn btn-info" >View Detail</a>'







			   );







				







			}







			$product_data['data'] = $data; 







			 







		}







		$response = array(







		  "draw" => intval($draw),







		  "iTotalRecords" => $totalRecords,







		  "iTotalDisplayRecords" => $totalRecordwithFilter,







		  "aaData" => $data,







		  "paged"=>$paged,







		);







		echo json_encode( $response );







		wp_die();







	}















	public static function sp_product_meta($id='', $post=''){









		if( !empty( $id )){







			$_POST['product_id'] = $id;







		}



















		global $wpdb;







		$tablename = $wpdb->prefix.'product_settings'; 







		$json = array();







		







		if( isset( $_POST['variant_id'] ) && is_array( $_POST['variant_id'] ) && !empty( $_POST['variant_id'] ) ){







			foreach ($_POST['variant_id'] as $variant_key => $variant_id) {







				$additional_settings = array();















				if( isset( $_POST['vertical_rotaion'][$variant_key] )  && !empty( $_POST['vertical_rotaion'][$variant_key] ) ){







					$additional_settings['vertical_rotaion'] = sanitize_text_field($_POST['vertical_rotaion'][$variant_key]);







				}else{







					$additional_settings['vertical_rotaion'] = 0;







				}















				if( isset( $_POST['ship_own_pakage'][$variant_key] )  && !empty( $_POST['ship_own_pakage'][$variant_key] ) ){







					$additional_settings['ship_own_pakage'] = sanitize_text_field($_POST['ship_own_pakage'][$variant_key]);







				}else{







					$additional_settings['ship_own_pakage'] = 2;







				}















				if( isset( $_POST['ship_multiple_package'][$variant_key] )  && !empty( $_POST['ship_multiple_package'][$variant_key] ) ){







					$additional_settings['ship_multiple_package'] = sanitize_text_field($_POST['ship_multiple_package'][$variant_key]);







				}else{







					$additional_settings['ship_multiple_package'] = 0;







				}















				if( isset( $_POST['hazardous_enable'][$variant_key] )  && !empty( $_POST['hazardous_enable'][$variant_key] ) ){







					$additional_settings['hazardous_enable'] = 1;







				}else{







					$additional_settings['hazardous_enable'] = 0;







				}







				$insert_data = array(







					'shop' =>  $_SERVER['HTTP_HOST'],







					'product_id' => isset( $_POST['product_id'] ) ? sanitize_text_field($_POST['product_id']) : sanitize_text_field($_POST['product_id']),







					'variant_id' => isset( $_POST['variant_id'][$variant_id] ) ? sanitize_text_field($_POST['variant_id'][$variant_id]) : sanitize_text_field($_POST['variant_id'][$variant_id]),


					'product_title' => isset( $_POST['product_title'][$variant_key] ) ? sanitize_text_field($_POST['product_title'][$variant_key]) : '',









					'freight_enable' => isset( $_POST['freight_small'][$variant_key] ) &&  $_POST['freight_small'][$variant_key] == 'freight_enable' ? 1 : 0,







					'small_enable' => isset( $_POST['freight_small'][$variant_key] ) && $_POST['freight_small'][$variant_key] == 'small_enable' ? 1 : 0,







					'product_freight_class' => isset( $_POST['_freight_class'][$variant_key] ) ?sanitize_text_field( $_POST['_freight_class'][$variant_key]) : 0,







					'product_weight' => isset( $_POST['_weight'][$variant_key] ) ? sanitize_text_field($_POST['_weight'][$variant_key]) : '',







					'product_width' => isset( $_POST['_width'][$variant_key] ) ? sanitize_text_field($_POST['_width'][$variant_key]) : '',







					'product_height' => isset( $_POST['_height'][$variant_key] ) ? sanitize_text_field($_POST['_height'][$variant_key]) : '',







					'product_length' => isset( $_POST['_length'][$variant_key] ) ? sanitize_text_field($_POST['_length'][$variant_key]) : '',







					'hazardous_enable' => isset( $_POST['hazardous_enable'][$variant_key] ) ? sanitize_text_field($_POST['hazardous_enable'][$variant_key]) : 0,











					'dropship_enable' => isset( $_POST['dropship_enable'][$variant_key] ) ? sanitize_text_field($_POST['dropship_enable'][$variant_key]) : 0,







					'dropship_location' => isset( $_POST['dropship_location'][$variant_key] ) ? sanitize_text_field($_POST['dropship_location'][$variant_key]) : 0,







					'product_sku' => isset( $_POST['_sku'][$variant_key] ) ? sanitize_text_field($_POST['_sku'][$variant_key]) : '',











					'shipping_rate' => isset( $_POST['shipping_rate'][$variant_key] ) ? sanitize_text_field($_POST['shipping_rate'][$variant_key]) : '',







					'additional_settings' => json_encode($additional_settings),







				);








			







				//check data is already exixts or not







				$query = "SELECT * FROM $tablename WHERE product_id = ".sanitize_text_field($_POST['product_id'])." AND variant_id =".sanitize_text_field($_POST['variant_id'][$variant_key]);







				$results = $wpdb->get_row($query);







				$query_results = false;







				if(!empty( $results ) ){







					$where_arr = array(







						'id' => $results->id,







					);







					$where_format = array(  '%d' );







					$formate = array('%s','%d','%d', '%s' ,'%d','%d','%s','%s','%s','%s','%s','%d','%d','%d','%s','%s','%s');







					$update = $wpdb->update( $tablename, $insert_data, $where_arr, $formate ,$where_format);







					if($update){







						$query_results = true;







					}







				}else{







					$formate = array('%s','%d','%d','%s' ,'%d','%d','%s','%s','%s','%s','%s','%d','%d','%d','%s','%s','%s');







					$insert = $wpdb->insert( $tablename, $insert_data, $formate );







					if($insert){







						$query_results = true;







					}







				}







				if( $query_results ){







					$product_id =  sanitize_text_field($_POST['variant_id'][$variant_key]);







					$remove_meta = array('_sku');







					foreach ($insert_data as $meta_key => $meta_value) {







						if( !in_array( $meta_key, $remove_meta ) ){







							if('product_id' != $meta_key){







								$meta_key = str_replace('product', '', $meta_key);	







							}







							if( 'additional_settings' == $meta_key ){







								foreach ($additional_settings as $key => $value) {







									update_post_meta($product_id ,"$key", $value );		







								}







							}else{







								update_post_meta($product_id ,"$meta_key", $meta_value );	







							}	







						}







					}







				}







			}







			$json['success'] = true;







			$json['type'] = 'update';







			$json['message'] = '<span class="pull-left text-success">Product setting Updated..! </span>';







		}else{ //simple product







			$additional_settings = array();







			if( isset( $_POST['vertical_rotaion'] )  && !empty( $_POST['vertical_rotaion'] ) ){







				$additional_settings['vertical_rotaion'] = sanitize_text_field($_POST['vertical_rotaion']);







			}else{







				$additional_settings['vertical_rotaion'] = 0;







			}















			if( isset( $_POST['ship_own_pakage'] )  && !empty( $_POST['ship_own_pakage'] ) ){







				$additional_settings['ship_own_pakage'] = sanitize_text_field($_POST['ship_own_pakage']);







			}else{







				$additional_settings['ship_own_pakage'] = 2;







			}















			if( isset( $_POST['ship_multiple_package'] )  && !empty( $_POST['ship_multiple_package'] ) ){







				$additional_settings['ship_multiple_package'] = sanitize_text_field($_POST['ship_multiple_package']);







			}else{







				$additional_settings['ship_multiple_package'] = 0;







			}















			if( isset( $_POST['hazardous_enable'] )  && !empty( $_POST['hazardous_enable'] ) ){







				$additional_settings['hazardous_enable'] = 1;







			}else{







				$additional_settings['hazardous_enable'] = 0;







			}







			






			$insert_data = array(







				'shop' =>  $_SERVER['HTTP_HOST'],







				'product_id' => isset( $_POST['product_id'] ) ?sanitize_text_field( $_POST['product_id']) : sanitize_text_field($_POST['product_id']),







				'variant_id' => isset( $_POST['variant_id'] ) ?sanitize_text_field( $_POST['variant_id']) : sanitize_text_field($_POST['variant_id']),

				'product_title'=>isset( $_POST['product_title'] ) ? sanitize_text_field($_POST['product_title']) : sanitize_text_field($_POST['product_title']),










				'freight_enable' => isset( $_POST['freight_small'] ) &&  $_POST['freight_small'] == 'freight_enable' ? 1 : 0,







				'small_enable' => isset( $_POST['freight_small'] ) && $_POST['freight_small'] == 'small_enable' ? 1 : 0,







				'product_freight_class' => isset( $_POST['_freight_class'] ) ?sanitize_text_field( $_POST['_freight_class']) : 0,







				'product_weight' => isset( $_POST['_weight'] ) ?sanitize_text_field( $_POST['_weight']) : '',







				'product_width' => isset( $_POST['_width'] ) ?sanitize_text_field( $_POST['_width']) : '',







				'product_height' => isset( $_POST['_height'] ) ?sanitize_text_field( $_POST['_height']) : '',







				'product_length' => isset( $_POST['_length'] ) ?sanitize_text_field( $_POST['_length']) : '',







				'hazardous_enable' => isset( $_POST['hazardous_enable'] ) ?sanitize_text_field( $_POST['hazardous_enable']) : 0,







				'dropship_enable' => isset( $_POST['dropship_enable'] ) ?sanitize_text_field( $_POST['dropship_enable']) : 0,







				'dropship_location' => isset( $_POST['dropship_location'] ) ?sanitize_text_field( $_POST['dropship_location']) : 0,







				'product_sku' => isset( $_POST['_sku'] ) ?sanitize_text_field( $_POST['_sku']) : '',











				'shipping_rate' => isset( $_POST['shipping_rate'] ) ?sanitize_text_field( $_POST['shipping_rate']) : '',







				'additional_settings' => json_encode($additional_settings),







			);















		







			//check data is already exixts or not







			$query = "SELECT * FROM $tablename WHERE product_id = ".sanitize_text_field($_POST['product_id'])." AND variant_id =".sanitize_text_field($_POST['variant_id']);







			$results = $wpdb->get_row($query);







			if(!empty( $results ) ){







				$where_arr = array(







					'id' => $results->id,







				);







				$where_format = array(  '%d' );







				$formate = array('%s','%d','%d', '%s' ,'%d','%d','%s','%s','%s','%s','%s','%d','%d','%d','%s','%s','%s');







				$update = $wpdb->update( $tablename, $insert_data, $where_arr, $formate ,$where_format);







				if( $update ){







					$json['success'] = true;







					$json['type'] = 'update';







					$json['message'] = '<span class="pull-left text-success">Product setting Updated..! </span>';







				}else{







					$json['success'] = false;







					$json['type'] = 'update';







					$json['message'] = '<span class="pull-left text-danger">Error on Product setting Updated! </span>';







				}







			}else{















				$formate = array('%s','%d','%d', '%s' ,'%d','%d','%s','%s','%s','%s','%s','%d','%d','%d','%s','%s','%s');







				$insert = $wpdb->insert( $tablename, $insert_data, $formate );







				if( $insert ){







					$json['success'] = true;







					$json['type'] = 'insert';







					$json['message'] = '<span class="pull-left text-success">Product Setting inserted..! </span>';







				}else{







					$json['success'] = false;







					$json['type'] = 'insert';







					$json['message'] = '<span class="pull-left text-danger">Error on inserting the setting data..! </span>';







				}















			}







			if( $json['success'] ){







				$product_id = ( $_POST['product_id'] != $_POST['variant_id'] ) ? sanitize_text_field($_POST['variant_id']) : sanitize_text_field($_POST['product_id']);







				$remove_meta = array('_sku');







				foreach ($insert_data as $meta_key => $meta_value) {







					if( !in_array( $meta_key, $remove_meta ) ){







						if('product_id' != $meta_key){







							$meta_key = str_replace('product', '', $meta_key);	







						}







						if( 'additional_settings' == $meta_key ){







							foreach ($additional_settings as $key => $value) {







								update_post_meta($product_id ,"$key", $value );		







							}







						}else{







							update_post_meta($product_id ,"$meta_key", $meta_value );	







						}	







					}







				}







			}







		}







		echo json_encode( $json );







		wp_die();







	}























	public function sp_save_store_setting(){







		







		global $wpdb;







		$tablename = $wpdb->prefix.'store_settings';







		$json=array();



		$_POST=sanitize_post($_POST);



		



		//checking if data already exist. if not than also save quotesetting



		$query="SELECT * FROM $tablename WHERE carrier_id=%d";



		$exist=$wpdb->get_results($wpdb->prepare($query,sanitize_text_field($_POST['carrierId'])),ARRAY_A);



		if(count($exist)<=0){



			$json['save_quote']=true;



		}else{



			$json['save_quote']=false;



		}







		$insert_data = array(







			'carrier_id' => isset( $_POST['carrierId'] ) ? sanitize_text_field($_POST['carrierId']) : '',







			'shop' =>  $_SERVER['HTTP_HOST'],







			'account_number' => isset( $_POST['accountNumber'] ) ? sanitize_text_field($_POST['accountNumber']) : '',







			'username' => isset( $_POST['speedfreightUsername'] ) ? sanitize_text_field($_POST['speedfreightUsername']) : '',







			'password' => isset( $_POST['speedfreightPassword'] ) ? sanitize_text_field($_POST['speedfreightPassword']) : '',







			'license_key' => isset( $_POST['licenseKey'] ) ? sanitize_text_field($_POST['licenseKey']) : '',







			'authentication_key' => isset( $_POST['authenticationKey'] ) ? sanitize_text_field($_POST['authenticationKey']) : '',







			'carriers' => isset( $_POST['carriers'] ) ? sanitize_text_field($_POST['carriers']) : '',







			'quote_settings' => isset( $_POST['quote_settings'] ) ? sanitize_text_field(json_encode( $_POST['quote_settings']) ): '',







			'status' => isset( $_POST['status'] ) ? sanitize_text_field($_POST['status']) : 1,







			'fedex_account_number' => isset( $_POST['fedex_account_number'] ) ? sanitize_text_field($_POST['fedex_account_number']) : '',











		);



		if(isset( $_POST['othersettings'] )){



			$insert_data['otherSettings']=json_encode( $_POST['othersettings'] );



		}















		if( ((isset( $_POST['edit_id'] ) && !empty( $_POST['edit_id'])) OR count($exist)>0) ){



			if(count($exist)>0){







				$_POST['edit_id']=$exist[0]['id'];



				/*



				there was a bug where two store_settings of same carrier was being saved.



				issue was that no edit_id was sent via post in some occasions, mainly when open same page in two pc,



				so to fix it there is new check implemented where we check in this function if same carrier already exist than use its id regardless edit id was sent or not and than it updats it.



				*/



			}











			$where_arr = array(







				'id' => sanitize_text_field($_POST['edit_id']) ,







			);



			//no need saving quote setting as this is updating connection seting



			unset($insert_data['quote_settings']);







			$where_format = array(  '%d' );







			$formate = array( '%d','%s','%s','%s','%s','%s','%s','%s','%d','%s','%s' );







			$update = $wpdb->update( $tablename, $insert_data, $where_arr, $formate ,$where_format);







			if( $update ){



				











				$json['success'] = true;







				$json['connection_id'] =  sanitize_text_field($_POST['edit_id']);







				$json['type'] = 'insert';







				$json['message'] = '<span class="pull-left text-success mr-3"> Connection Setting Updated.! </span>';







			}else{







				$json['success'] = false;







				$json['type'] = 'insert';







				$json['connection_id'] = '';







				$json['message'] = '<span class="pull-left text-danger mr-3">Error on updateing the setting data..! </span>';







			}







		}else{











			unset($insert_data['quote_settings']);



			$formate = array( '%d','%s','%s','%s','%s','%s','%s','%s','%d','%s','%s' );



			$insert = $wpdb->insert( $tablename, $insert_data, $formate );



			if( $insert ){







				$json['success'] = true;







				$json['connection_id'] = $wpdb->insert_id;







				$json['type'] = 'insert';







				$json['message'] = '<span class="pull-left text-success mr-3"> Connection Setting Added.! </span>';







			}else{







				$json['success'] = false;







				$json['type'] = 'insert';







				$json['connection_id'] = '';







				$json['message'] = '<span class="pull-left text-danger mr-3">Error on inserting the setting data..! </span>';







			}	







		}







		







	







		echo json_encode( $json );







		wp_die();







	}















	public function sp_save_quote_setting(){











		global $wpdb;







		$tablename = $wpdb->prefix.'store_settings';







		$json = array();







		if( isset( $_POST['connection_id'] ) && !empty( $_POST['connection_id'] ) ){







			$connection_id = sanitize_text_field($_POST['connection_id']);







			







			unset( $_POST['connection_id'] );







			unset( $_POST['carrier_id'] );







			unset( $_POST['action'] );







			







			$insert_data =array();







			$insert_data['quote_settings'] = json_encode(sanitize_post($_POST));







			$where_arr = array(







				'id' => $connection_id ,







			);







			$where_format = array(  '%d' );







			$formate = array( '%s' );







			$update = $wpdb->update( $tablename, $insert_data, $where_arr, $formate ,$where_format);







			if( $update ){







				$json['success'] = true;







				$json['message'] = "Quote Setting added";







			}else{



				$json['success'] = true;



				//if we save same setting again than update returns false as no changes happen.



				//so we want to show saved successfully even if no changes happen in table cause no new change happenn



			}







			







		}else{







			$json['success'] = false;







			$json['message'] = 'Please set your connection setting first..!';















		}







		echo json_encode($json);







		wp_die();







	}















	public function sp_add_box(){







	



		global $wpdb;







		$tablename = $wpdb->prefix.'bins';







		$json = array();







		$insert_data = array(







			'shop' =>  $_SERVER['HTTP_HOST'],







			'box_name' => isset( $_POST['box_name'] ) ?sanitize_text_field( $_POST['box_name']) : '' ,







			'bin_width' => isset( $_POST['bin_width'] ) ?sanitize_text_field( $_POST['bin_width']) : '' ,







			'bin_height' => isset( $_POST['bin_height'] ) ?sanitize_text_field( $_POST['bin_height']) : '' ,







			'bin_length' => isset( $_POST['bin_length'] ) ?sanitize_text_field( $_POST['bin_length']) : '' ,







			'bin_max_weight' => isset( $_POST['bin_max_weight'] ) ?sanitize_text_field( $_POST['bin_max_weight']) : '' ,







			'bin_weight' => isset( $_POST['bin_weight'] ) ?sanitize_text_field( $_POST['bin_weight']) : '' ,







			'available' => isset( $_POST['available'] ) ?sanitize_text_field( $_POST['available']) : '' ,







		);







		$formate = array('%s','%s','%d','%d','%d','%d','%d','%d');







		$insert = $wpdb->insert( $tablename, $insert_data, $formate );







		if( $insert ){







			$json['success'] = true;







			$json['message'] = '<span class="pull-left text-success mr-3"> Box Added.! </span>';







		}else{







			$json['success'] = false;







			$json['message'] = '<span class="pull-left text-danger mr-3">Error on inserting the setting data..! </span>';







		}	







		echo json_encode($json);







		wp_die();







	}















	public function sp_get_box_data(){



		$_POST=sanitize_post($_POST);







		$json = array();







		global $wpdb;







		$edit_id = sanitize_text_field($_POST['id']);







		if( !empty( $edit_id ) ){







			$tablename = $wpdb->prefix.'bins';







			$query = "SELECT * FROM $tablename WHERE bin_id=$edit_id";







			$box_data = $wpdb->get_row( $query  );















			if( !empty( $box_data ) ){







				$json['success'] = true;







				$json['data'] = $box_data;







			}else{







				$json['success'] = false;







			}







		}







		echo json_encode($json);







		wp_die();







	}







	public function sp_edit_box(){







		$_POST=sanitize_post($_POST);



		global $wpdb;







		$tablename = $wpdb->prefix.'bins';







		$json = array();







		$insert_data = array(







			'shop' =>  $_SERVER['HTTP_HOST'],







			'box_name' => isset( $_POST['box_name'] ) ?sanitize_text_field( $_POST['box_name']) : '' ,







			'bin_width' => isset( $_POST['bin_width'] ) ?sanitize_text_field( $_POST['bin_width']) : '' ,







			'bin_height' => isset( $_POST['bin_height'] ) ?sanitize_text_field( $_POST['bin_height']) : '' ,







			'bin_length' => isset( $_POST['bin_length'] ) ?sanitize_text_field( $_POST['bin_length']) : '' ,







			'bin_max_weight' => isset( $_POST['bin_max_weight'] ) ?sanitize_text_field( $_POST['bin_max_weight']) : '' ,







			'bin_weight' => isset( $_POST['bin_weight'] ) ?sanitize_text_field( $_POST['bin_weight']) : '' ,







			'available' => isset( $_POST['available'] ) ?sanitize_text_field( $_POST['available']) : '' ,







		);







		







		$where_arr = array(







			'bin_id' => sanitize_text_field($_POST['bin_id']) ,







		);







		$where_format = array(  '%d' );







		$format = array('%s','%s','%d','%d','%d','%d','%d','%d');







		$update = $wpdb->update( $tablename, $insert_data, $where_arr, $format ,$where_format);















		if( $update ){







			$json['success'] = true;







			$json['message'] = '<span class="pull-left text-success mr-3"> Box updated.! </span>';







		}else{







			$json['success'] = false;







			$json['message'] = '<span class="pull-left text-danger mr-3">Error on updating the setting data..! </span>';







		}	







		echo json_encode($json);







		wp_die();







	}







	public function sp_test_carrier_connections(){



		$postData=sanitize_post($_POST);



		$postData['otherSettings']=json_encode((isset($postData['otherSettings'])?($postData['otherSettings']):''));



		$server_output=wp_remote_post('https://app.shiprow.com/index.php?shop='.$_SERVER["HTTP_HOST"].'&platform=wordpress',



			array(



			  'method' => 'POST',



			  'httpversion' => '1.0',



			   'timeout'     => 30,



			  'body' => http_build_query($postData),



 			));



		echo json_encode($server_output);







		wp_die();







		







	}







	public function sp_delete_box(){







		global $wpdb;











		$json = array();







		$id = sanitize_text_field($_POST['id']);







		$tablename = $wpdb->prefix.'bins';







		$delete = $wpdb->delete($tablename , array( 'bin_id' => $id ) , array( '%d' ) );







		$json['success'] = ( $delete ) ? true : false ;







		echo json_encode( $json );







		wp_die();	







	}







	public function sp_enable_carrier_list(){















		global $wpdb;







		$json = array();



		//checking if carrierenable is limited to plans



		$carrierLimit=0;



		$enabledCarriers=0;



		//getting level



		$sql="SELECT * FROM {$wpdb->prefix}sp_license";



		$result=$wpdb->get_results($sql,ARRAY_A);



		if(count($result)>0){



		  $carrierLimit=$result[0]['carrier_limit'];



		}



		//getting enabled carriers



		$sql="SELECT * FROM {$wpdb->prefix}store_enabled_carriers";



		$result=$wpdb->get_results($sql,ARRAY_A);



		$enabledCarriers=count($result);



		



		if( $enabledCarriers>=$carrierLimit){



			$json['carrierLimit']=true;



			$json['success']=false;



			echo json_encode($json);



			wp_die();



		}















		$tablename = $wpdb->prefix.'store_enabled_carriers';







		$table_store_setting = $wpdb->prefix.'store_settings';







		$insert_data = array(







			'shop' =>  $_SERVER['HTTP_HOST'],







			'carrier_id' => isset( $_POST['carrier_id'] ) ? sanitize_text_field($_POST['carrier_id'] ): '',







		);







		//check carrier already enable or not







		$query = "SELECT * FROM  $tablename WHERE carrier_id=".sanitize_text_field($_POST['carrier_id']);







		$results = $wpdb->get_row( $query );







		if( empty( $results ) ){







			$formate  = array( '%s','%d');







			$insert = $wpdb->insert( $tablename, $insert_data ,$formate );	







		}







		//check this carrier in store setting data







		$storequery = "SELECT * FROM $table_store_setting WHERE carrier_id = ".sanitize_text_field($_POST['carrier_id']);







		$row = $wpdb->get_row($storequery);







		if( !empty( $row ) ){







			//also set the status in store setting







			$where_arr = array(







				'carrier_id' => sanitize_text_field($_POST['carrier_id']),







			);







			$where_format = array('%d');







			$update_data = array(







				'status' => 1,







			);







			$formate = array('%d');







			$update = $wpdb->update( $table_store_setting, $update_data, $where_arr, $formate ,$where_format );







		}







		if( $insert ){







			$json['success'] = true;







		}







		echo json_encode($json);







		wp_die();







	}







	public function sp_remove_carrier(){







		global $wpdb;











		$json = array();







		$id = sanitize_text_field($_POST['carrier_id']);







		







		$tablename = $wpdb->prefix.'store_enabled_carriers';







		$table_store_setting = $wpdb->prefix.'store_settings';







		$delete = $wpdb->delete( $tablename , array( 'carrier_id' => $id ) , array( '%d' ) );















		$json['success'] = ( $delete ) ? true : false ;







		//also set the status in store setting







		$where_arr = array(







			'carrier_id' => $id,







		);







		$where_format = array('%d');







		$insert_data = array(







			'status' => 0,







		);







		$formate = array('%d');







		







		$update = $wpdb->update( $table_store_setting, $insert_data, $where_arr, $formate ,$where_format);







				







		echo json_encode( $json );







		wp_die();







	}















	public function sp_get_test_rate(){















		$api = new SpWebservice();







		$_POST=sanitize_post($_POST);







		$json = array();







		$postData=array();



		foreach ($_POST as $postKey => $postValue) {



			$postData[$postKey]=sanitize_text_field($postValue);



		}







		// calling api to collect the shipping methods and rates		







		$response = $api->sp_call_api( 'rates.php', $postData );







		$html ='<select name="rate_price" class="form-control">';







		if( $response['success'] ){







			$api_data = $response['data'];







			$api_rates = $api_data['rates'];







			if( !empty( $api_rates ) ){







				foreach ($api_rates as $key => $item) {







					$html .='<option value="'.$item['service_name'].'">'.$item['currency'].''.$item['total_price'].' '.$item['service_name'].'</option>';







				}		







			}







		}







		$html .='</select>';







		$json['success'] = true;







		$json['html'] = $html;







		echo json_encode( $json );







		wp_die();







	}







	public function sp_order_list(){







		







		$draw = sanitize_text_field($_POST['draw']);







		$row = sanitize_text_field($_POST['start']);







		$rowperpage = sanitize_text_field($_POST['length']); // Rows display per page







		$columnIndex = sanitize_text_field($_POST['order'][0]['column']); // Column index







		$columnName = sanitize_text_field($_POST['columns'][$columnIndex]['data']); // Column name







		$columnSortOrder = sanitize_text_field($_POST['order'][0]['dir']); // asc or desc







		$searchValue = sanitize_text_field($_POST['search']['value']); // Search value







		$paged = $row/$rowperpage;







		$paged = ($paged == 0) ? 1 : $paged+1;







		$order_args = array(







			'post_type'	=> 'shop_order',







			'post_status'=> 'all',







			'posts_per_page' => $rowperpage,







			'paged' => $paged,















		);











		if( isset( $columnSortOrder ) ){







			$order_args['orderby'] = $columnName;







			$order_args['order'] = $columnSortOrder;







		}







		if( isset( $searchValue ) && !empty( $searchValue ) ){







			$product_args['orderby'] = 'meta_value_num';







			$product_args['meta_key'] = '_customer_user';







			$order_args['s'] = $searchValue;







		}















		$order_query = new WP_Query( $order_args );







		$order_posts =  $order_query->posts;







		$totalRecords = $order_query->found_posts;







		$totalRecordwithFilter = $order_query->found_posts;







		if( !empty( $order_posts ) ){







			$count = 1;







			







			$order_data = array();







			foreach( $order_posts as $key => $order) {















				$order_id = $order->ID;







				$order = wc_get_order( $order_id );







				$order_date =$order->get_date_created()->format('Y-m-d');







				







				$customer_name = $order->get_billing_first_name().' '.$order->get_billing_last_name();







				$status = $order->get_status();;







				$order_total=$order->get_formatted_order_total();;







				$data[] = array( 







					"" => $count,







			      "ID"=> $order_id,







			      "date"=> $order_date,







			      "customer_name" => $customer_name,







			      "status"=>  $status,







			      "total"=> $order_total,







			      "action"=>'<a href="?page=sp-settings&tab=product_order&subtab='.$order_id.'" class="btn btn-info" >View Order</a>',







			   );







				$count++;







			}







			$order_data['data'] = $data; 







			 







		}







		$response = array(







		  "draw" => intval($draw),







		  "iTotalRecords" => $totalRecords,







		  "iTotalDisplayRecords" => $totalRecordwithFilter,







		  "aaData" => $data,







		  "paged"=>$paged,







		);







		echo json_encode( $response );







		wp_die();







	}







	function save_license(){



		$license=sanitize_text_field($_POST['license']);



		$_POST=sanitize_post($_POST);







		



		$server_output=wp_remote_post('https://shiprow.com/admin/index.php?module=api&action=checkLicense',



											array(



												'method'=>'POST',



												'httpversion'=>1.0,



												'timeout'     => 30,



												'body'=>http_build_query($_POST),



												));











		$server_output=$server_output['body'];



		$server_output=json_decode($server_output,true);







		if(isset($server_output['plan_id'])){



			global $wpdb;



			// checking if value exists before



			$licenseTbl = "SELECT * FROM {$wpdb->prefix}sp_license ";



			$rows = $wpdb->get_results($licenseTbl,ARRAY_A);















			//checking if marketplace carriers enabled amount matches with current plan, usually in downgrade plan case



			$query="SELECT * FROM {$wpdb->prefix}store_enabled_carriers";



			$enabledCarriers=$wpdb->get_results($query,ARRAY_A);



			$enabledCarriers=(count($enabledCarriers)>0?count($enabledCarriers):0);



			if($server_output['carrier_limit']<$enabledCarriers){



				echo json_encode('2');



				wp_die();



			}











			if(count($rows)>0){



				$query="UPDATE {$wpdb->prefix}sp_license  SET license='".$license."',plan_id=".$server_output['plan_id'].",level=".$server_output['level'].",carrier_limit=".$server_output['carrier_limit'];







			}else{



				$query="INSERT INTO {$wpdb->prefix}sp_license (`license`,`plan_id`,`level`,`carrier_limit`) VALUES ('".$license."',".$server_output['plan_id'].",".$server_output['level'].",".$server_output['carrier_limit'].")";











			}



			$wpdb->query($query);



			echo json_encode('1');



		}else{



			echo json_encode('0');



		}



		wp_die();



	}







	function disable_carriers(){



		if(isset($_POST['carriers'])){



			global $wpdb;



			$json=array();



			$json['success']=true;



			$_POST=sanitize_post($_POST);

			$carriers=$_POST['carriers'];



			foreach ($carriers as $carrier) {



				$query="DELETE FROM {$wpdb->prefix}store_enabled_carriers WHERE carrier_id=".$carrier;



				if($wpdb->query($query)){



					//do nothing



				}



				else{



					$json['success']=false;



				}



			}







			echo json_encode($json);



		}



		wp_die();



	}







	function sp_save_carriers_wwe(){



		if(isset($_POST['carrierCode'])){



			global $wpdb;



			$json=array();



			foreach ($_POST['carrierCode'] as $key => $value) {



				$carrierCode[$key]=sanitize_text_field($value);



			}



			// $carrierCode=sanitize_text_field($_POST['carrierCode']);



		    $otherSettings=array();



		    $otherSettings['carriers']=$carrierCode;







		    $carrierId=3;//3 is id of WWE LTL carrier



		    



		    $sql="SELECT * FROM {$wpdb->prefix}store_settings WHERE carrier_id=%d";



		    $count=$wpdb->get_results($wpdb->prepare($sql,3),ARRAY_A);



		    if(count($count)>0){



		    	$sql="UPDATE {$wpdb->prefix}store_settings SET otherSettings='".json_encode($otherSettings)."' WHERE carrier_id=3";



		    	$wpdb->query($sql);



		    	$json['success']=true;



		    	$json['carrierSetting']=false;



		    }else{



		    	$json['success']=false;



		    	$json['carrierSetting']=true;



		    }



		    echo json_encode($json);



		}



		wp_die();



	}







	function sp_get_mapping(){



		$_POST=sanitize_post($_POST);



    if(isset($_FILES['file'])){



        $fileName = $_FILES["file"]["tmp_name"];



        $file = fopen($fileName, "r");



        $header=fgetcsv($file,10000,",");//columns of the file csv. used to mapping



        echo json_encode($header);



        wp_die(); 



}



}

function check_step(){

	global $wpdb;

	$_POST=sanitize_post($_POST);

	$response=array();

        $response['currentStep']=0;

        $response['completedSteps']=array();

        //checking if any carrier is enabled

        $query="SELECT * FROM {$wpdb->prefix}store_enabled_carriers";

        $result=$wpdb->get_results($query,ARRAY_A);

        if(count($result)<=0){

            if($response['currentStep']==0){

                $response['currentStep']=1;

            }

        }else{

            $response['completedSteps'][]=1;

        }

        //checking if any carrier setting is saved. if not than do that step

        $query="SELECT * FROM {$wpdb->prefix}store_settings";

        $result=$wpdb->get_results($query,ARRAY_A);

        if(isset($_POST['carrier_id']) AND !empty($_POST['carrier_id'])){



          if($_POST['carrier_id']!=-1){



        	$query="SELECT * FROM {$wpdb->prefix}store_settings WHERE carrier_id=%d";

        	$result=$wpdb->get_results($wpdb->prepare($query,$_POST['carrier_id']),ARRAY_A);

            

          }

        }

        if(count($result)<=0){

            if($response['currentStep']==0){

              $response['currentStep']=2;

                

            }

        }else{

          //checking if any of carrier enabled has quote setting saved

          $response['currentStep']=20;

          foreach ($result as $key => $value) {

            if(isset($value['quote_settings']) AND !empty($value['quote_settings'] )){

              $response['completedSteps'][]=2;

              $response['currentStep']=0;

              break;

              }

          }

        }

        $query="SELECT * FROM {$wpdb->prefix}locations";

        $result=$wpdb->get_results($query,ARRAY_A);

        if(count($result)<=0){

            if($response['currentStep']==0){

                $response['currentStep']=3;

            }

        }else{

            $response['completedSteps'][]=3;

        }

        $query="SELECT * FROM {$wpdb->prefix}product_settings";

        $result=$wpdb->get_results($query,ARRAY_A);

        if(count($result)<=0){

            if($response['currentStep']==0){

                $response['currentStep']=4;

            }

        }else{

            $response['completedSteps'][]=4;

        }

        echo json_encode($response);

        wp_die(); 

}







public function sanitize( $input ) {	



	// Initialize the new array that will hold the sanitize values		



	$new_input = array();	



	// Loop through the input and sanitize each of the values		



	foreach ( $input as $key => $val ) {						



		$new_input[ $key ] = ( isset( $input[ $key ] ) ) ?				



									sanitize_text_field( $val ) :



									'';	



	}	



	return $new_input;	



}







}







$sprowadminajax = new SPROWAdminAjax();







?>