<?php
//for datatable design

wp_enqueue_style( 'sp-datatable-bootstrap-css' );

//datatable js

wp_enqueue_script( 'sp-datatable-js' );

//datatable bootstrap css

wp_enqueue_script( 'sp-datatable-bootstrap-js' );

//custom js for datatable

wp_enqueue_script( 'sp-table-js' );

//tag script

wp_enqueue_script( 'sp-tag-js' );

// tag css

wp_enqueue_style( 'sp-tag-css' );

//for form validation

wp_enqueue_script( 'sp-validation-js' );

//for form validation plugin

wp_enqueue_script( 'sp-form-js' );

$order_id = $_GET['subtab'];
$response = get_post_meta( $order_id , 'sp_repsonse' , true );
$response=json_decode( ltrim(rtrim($response, '" '), '" '),true);
$order = wc_get_order( $order_id );
$shipping_methods =$order->get_shipping_methods();
foreach ( $shipping_methods as $method_id => $shipping_rate ){
	$meta_data=$shipping_rate->get_meta_data();
	foreach ($meta_data as $key => $value) {
		echo $response['data']['html'][$value->value];
		
	}
}
die();




print_r($shipping_method);
echo $shipping_method->get_meta_data();
die();
print_r($order->id);
die();
$response = get_post_meta( $order_id , 'sp_repsonse' , true );
$response=json_decode( ltrim(rtrim($response, '" '), '" '),true);
print_r($response);
// echo $response['data']['html']['FIRST1'];

die();

$repsonse=json_decode($json,true);
$ordersArr=array();
$ordersArr[]=$repsonse;
?>

<div class="row">
<div class="col-md-12">
<div class="tabbable-line">
   
    <div class="tab-content">
    <?php foreach($ordersArr as $order) { 
     $boxing=json_decode(base64_decode($order['boxing']),true);
     $data=json_decode(base64_decode($order['data']),true);
     // print_r($boxing);
     // echo '<br><br><br><br>';
     // print_r($data);
     // echo '<br><br><br><br>';
    ?>
        <div class="row">
        <div class="col-sm-12">

            <div class="card card-topline-yellow" >
                <div class="card-head">
                    <header><?=$data["service_name"]?></header>
                    
                </div>

               <div class="card-body" id="bar-parent1">
                <?php if(isset($data['handling_fee']) AND (intval($data['handling_fee'])>0)){ ?>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>Handling Fee : </b>$<?=$data["handling_fee"]?></label>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($data['hazardous_fee']) AND (intval($data['hazardous_fee'])>0)){ ?>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>Hazardous Fee : </b>$<?=$data["hazardous_fee"]?></label>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($data['residential_charges']) AND (intval($data['residential_charges'])>0)){ ?>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>Residential Fee : </b>$<?=$data["residential_charges"]?></label>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($data['liftgate_fee']) AND (intval($data['liftgate_fee'])>0)){ ?>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>Liftgate Fee : </b>$<?=$data["liftgate_fee"]?></label>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($data['fuel_charges']) AND (intval($data['fuel_charges'])>0)){ ?>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>Fuel Charges : </b>$<?=$data["fuel_charges"]?></label>
                        </div>
                    </div>
                <?php } ?>
                <hr>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Total Charges : </b>$<?=$data["total_charge"]?></label>
                    </div>
                </div>
                <hr>
                </div>
                <div class="card-head">
                    <header>Origin</header>
                </div>
                <div class="card-body" id="bar-parent1">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><?=(isset($data['origin']['zip'])?$data['origin']['zip']:'')?> : <?=(isset($data['origin']['city'])?$data['origin']['city']:'')?> : <?=(isset($data['origin']['state'])?$data['origin']['state']:'')?> : <?=(isset($data['origin']['country'])?$data['origin']['country']:'')?></label>
                        </div>
                    </div>
                    <?php if(isset($data['quote_id']) AND !empty($data['quote_id'])){?>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label><b>Quote ID : </b><?=$data['quote_id']?></label>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-head">
                    <header>ITEMS</header>
                </div>
                <div class="card-body" id="bar-parent1">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>Total Items : </b><?=count($data["items"])?></label>
                        </div>
                    </div>
                <?php foreach($data["items"] as $itemId=>$itemVal) { ?>
                    <div class="form-group row">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>Product : </b><?=$itemVal["quantity"]?> x <?=$itemVal["name"]?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>L x W x H : </b><?=$itemVal["product_length"]?>x<?=$itemVal["product_width"]?>x<?=$itemVal["product_height"]?></label>
                        </div>
                    </div>
                   
                <?php } ?>
                </div>
                <div class="card-head">
                    <header><?=(isset($boxing['packing_detail'])?'Packaging':'')?></header>
                </div>
                <div class="card-body" id="bar-parent1">
                    <?php
                    if(isset($boxing['packing_detail']) AND !empty($boxing['packing_detail'])){
                    $j=1;
                    $jlength=count($boxing['packing_detail']); 
                    foreach($boxing['packing_detail'] as $box){ 
                        $boxId=explode("-",$box['box_id']);
                        ?>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <b>Box <?=$j?> of <?=$jlength?></b>
                                <div class="row">
                                    <div class="col-md-12"><?=$boxing['boxes'][$boxId[0]][$boxId[1]]['nickname']?></div>
                                    <div class="col-md-12"><?=$box['box_dimention']['w']?>x<?=$box['box_dimention']['h']?>x<?=$box['box_dimention']['d']?></div>
                                    <div class="col-md-12"><?=$boxing['boxes'][$boxId[0]][$boxId[1]]['pkg_weight']?> lbs</div>
                                </div>

                            </div>
                            <div class="">
                                <img src="<?=$box['image_complete']?>">
                            </div>
                        </div>
                        <div class="form-group">&nbsp</div>
                        <div class="form-group row">
                            <div class="col-md-3 center">
                                <b>Total Items Packed : </b> <?=count($box['items_from_api'])?>
                                <div class="row">
                                    <div class="col-md-12"><b>-Packaging Steps-</b></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                        <?php 
                        
                            $i=1;
                            $length=count($box['items_from_api']);
                            foreach($box['items_from_api'] as $itemsApi){ ?>
                                
                                    
                                    <div class="col-md-3" >
                                        <img src="<?=$itemsApi['image_sbs']?>">
                                        <div class="row">
                                            <div class="col-md-12"><?=$boxing['items'][$itemsApi['id']]['name']?></div>
                                        </div>
                                        <div class=" row">
                                            <div class="col-md-12"><?=$itemsApi['w']?>x<?=$itemsApi['h']?>x<?=$itemsApi['d']?></div>
                                        </div>
                                        <div class=" row">
                                            <div class="col-md-12"><?=$itemsApi['wg']?> lbs</div>
                                        </div>
                                    </div>
                        <?php $i++; } ?>
                        </div>

                    <?php $j++; } } ?>
                
               </div>
            </div>
<!----------------------------------------------------------------->

        </div>
        </div>
        <div class="form-group">&nbsp</div>
        <?php } ?>

      </div>

         
  </div>
    </div>
</div>