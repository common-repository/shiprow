<?php
if(isset($_FILES['file']))
         {
         global $wpdb;

         $fileName = $_FILES["file"]["tmp_name"];
         $file = fopen($fileName, "r");
		 $columnDb = $wpdb->get_col("DESC {$wpdb->prefix}product_settings", 0);
		 //removing id column
		 if(($key=array_search('id',$columnDb))!==false){
		  unset($columnDb[$key]);
		 }
         
         $headerCSV=fgetcsv($file,10000,",");
         
            //loop through every row of csv data and save data to database with mapping provided previouse page
            while (($columnCSV = fgetcsv($file, 10000, ",")) !== FALSE) {
                  $count=0;
                  $params=array();//parameters used to insert into database
                  foreach ($columnDb as $row) {

                  $params[$row]=$columnCSV[sanitize_text_field($_POST['column'.$count])];
                  $count+=1;

                  }
                  $productIdIndex=array_search('product_id', $headerCSV);
                  $variantIdIndex=array_search('variant_id', $headerCSV);
                  $productId=$columnCSV[sanitize_text_field($_POST['column'.$productIdIndex])];//for where condition
                  $variantId=$columnCSV[sanitize_text_field($_POST['column'.$variantIdIndex])];

				  $product_settings = "SELECT * FROM {$wpdb->prefix}product_settings WHERE shop=%s AND product_id=%d AND variant_id=%d";
				  $rows = $wpdb->get_results($wpdb->prepare($product_settings,$_SERVER['HTTP_HOST'],$productId,$variantId), ARRAY_A);
				  if(count($rows)>0){ //update existing product settings

				  	//start seperating params array into string for query for updating
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
			        //end seperating

			        $sql = "UPDATE {$wpdb->prefix}product_settings SET ".$paramStr." WHERE shop='".$_SERVER['HTTP_HOST']."' AND product_id='".$productId."' AND variant_id='".$variantId."'";
			        $result = $wpdb->query($sql);

			        

				  }else{

				  	//start seperating params array into string for query for Inserting
				  	$keys = implode(',', array_keys($params));
        			$values = implode("','", array_values($params));
				  	//end seperating

				  	$sql = "INSERT INTO {$wpdb->prefix}product_settings  (".$keys.") VALUES ('".$values."')";
				  	$result = $wpdb->query($sql);
				  	

				  }
				  if($result){
				  	//updating in wooconnerce start
			        $additional_settings=json_decode($params['additional_settings'],true);

						$product_id = ( $params['product_id'] != $params['variant_id'] ) ? $params['variant_id'] : $params['product_id'];

						$remove_meta = array('_sku');

						foreach ($params as $meta_key => $meta_value) {

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
			        //end 
				  }
				  else{
				  	
				  }
      
            
            }//end of while loop
            header('location:?page=sp-settings&tab=products');
          }
