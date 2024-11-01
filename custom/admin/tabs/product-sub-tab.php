<?php 
global $wpdb;
//notification
wp_enqueue_style( 'notification-css' );
wp_enqueue_script( 'notification-js' );

$main_product_id = $product_id = (isset($_GET['subtab'])) ? sanitize_text_field($_GET['subtab']) : '';

$variation_id = ( isset( $_GET['variation_id'] ) ) ? sanitize_text_field($_GET['variation_id']) : '';


$product = wc_get_product( $product_id );



if( empty( $product_id ) ) {

	wp_redirect( '?page=sp-settings&tab=products', 302 );

	exit;

}

$show_form = true;

$variation_product = false;

$variations = array();

if( $product->is_type( 'variable' ) ){

	$variation_product = true;

	$variations = $product->get_available_variations();  

	$product_id = $variation_id;

	$show_form = false;

}

$cancel_link = '?page=sp-settings&tab=products';

if( isset( $variation_id ) && !empty($variation_id) ){

	$show_form = true;

	$variation_product = false;	

	$cancel_link = '?page=sp-settings&tab=products&subtab='.$main_product_id;

}else{

	$variation_id = $product_id;

}

//getting enabled carriers whos are either small or ltl**************
$query="SELECT {$wpdb->prefix}carriers.carrier_type from {$wpdb->prefix}store_enabled_carriers INNER JOIN {$wpdb->prefix}carriers on {$wpdb->prefix}store_enabled_carriers.carrier_id={$wpdb->prefix}carriers.carrier_id AND {$wpdb->prefix}store_enabled_carriers.shop='".$_SERVER['HTTP_HOST']."' AND {$wpdb->prefix}carriers.carrier_type='small'";
$smallCarriers=$wpdb->get_results($query,ARRAY_A);

$query="SELECT {$wpdb->prefix}carriers.carrier_type from {$wpdb->prefix}store_enabled_carriers INNER JOIN {$wpdb->prefix}carriers on {$wpdb->prefix}store_enabled_carriers.carrier_id={$wpdb->prefix}carriers.carrier_id AND {$wpdb->prefix}store_enabled_carriers.shop='".$_SERVER['HTTP_HOST']."' AND {$wpdb->prefix}carriers.carrier_type='LTL'";
$LTLCarriers=$wpdb->get_results($query,ARRAY_A);

 //disables small radio if no small carrier enabled
        if(count($smallCarriers)<=0){
            $disableTextSmall="Small Carriers Not Enabled!";
            $disableSmall="disabled";
            
        }else{
            $disableTextSmall="";
            $disableSmall="";
            //if small carrier is enabled than check that
            
        }
     //disables LTL radio if no LTL carrier enabled
        if(count($LTLCarriers)<=0){
            $disableTextLTL="LTL Carriers Not Enabled!";
            $disableLTL="disabled";
        }else{
            $disableTextLTL="";
            $disableLTL="";
        }
//*******************************************************


$_weight = esc_textarea(get_post_meta( $product_id, '_weight' , true ));

$_length = esc_textarea(get_post_meta( $product_id, '_length' , true ));

$_width = esc_textarea(get_post_meta( $product_id, '_width' , true ));

$_height = esc_textarea(get_post_meta( $product_id, '_height' , true ));

$_sku = esc_textarea(get_post_meta( $product_id, '_sku' , true ));

$_sku = ( !empty( $_sku ) ) ? $_sku : $product_id;

$freight_enable = esc_textarea(get_post_meta( $product_id, 'freight_enable' , true ));

$small_enable = esc_textarea(get_post_meta( $product_id, 'small_enable' , true ));

$_freight_class = esc_textarea(get_post_meta( $product_id, '_freight_class', true ));



$vertical_rotaion = esc_textarea(get_post_meta( $product_id , 'vertical_rotaion' , true ));

$ship_own_pakage = esc_textarea(get_post_meta( $product_id , 'ship_own_pakage' , true ));

$ship_multiple_package = esc_textarea(get_post_meta( $product_id , 'ship_multiple_package' , true ));

$dropship_enable = esc_textarea(get_post_meta( $product_id , 'dropship_enable' , true ));

$dropship_location = esc_textarea(get_post_meta( $product_id , 'dropship_location' , true ));

$hazardous_enable = esc_textarea(get_post_meta( $product_id , 'hazardous_enable' , true ));

$freight_small = esc_textarea(get_post_meta( $product_id , 'freight_small' , true ));



//small_enable

if( empty( $freight_enable ) && empty( $small_enable ) ){

	$freight_enable = 1;

}

if(!$dropship_enable){
    $dropshipLocationHide='hide';
}else{
    $dropshipLocationHide='';
}


//get the dropship data

$drophouse_query = "SELECT * FROM {$wpdb->prefix}locations WHERE type='dropship'";

$drophouse_lists = $wpdb->get_results($drophouse_query);



$license = $wpdb->prefix.'sp_license';
 $sql = "SELECT * from $license";

$rows=$wpdb->get_results($sql,ARRAY_A);
$level=(count($rows)>0?$rows[0]['level']:0);

?>

<?php if($variation_product){ ?>

<!-- for variations product listing  -->

<div class="row">

    <div class="col-md-12">

        <div class="card card-box">

            <div class="card-head">

                <header><?php echo get_the_title($main_product_id);?></header>

                <div class="tools">

                   
                </div>

            </div>

            <div class="main-card-body">

                 

                  <!-- product meta form -->

                <form action="" method="post" id="sp_product_meta_form">

                    <input type="hidden" name="variation_form" value="yes" />

                    <input name="product_id" type="hidden" value="<?php echo $main_product_id; ?>"/>
                    

                <?php 

                    if( !empty( $variations ) ){

                        foreach ($variations as $key => $variation) { 

                            $attributes = $variation['attributes'];

                            $product_name = get_the_title( $main_product_id ) .' '. implode(', ', $attributes);

                            ?>
                            
                            <div class="card card-box variation-<?php echo $variation['variation_id']; ?>">

                                <div class="card-head">

                                    <header><?php echo $product_name; ?></header>
                                    

                                    <div class="tools">

                                        <a href="javascript:;" class="variation-copy btn-color fa fa-clone" data-toggle="tooltip" title="Copy" data-placement="top" style="position: relative;"></a>

                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>

                                    </div>

                                </div>

                                <div class="card-body ">

                                    <?php include 'form/product-setting-form-multipal.php'; ?>

                                </div>

                            </div>

                            <?php

                        }

                    }

                ?>

                    <div class="pull-right response">

                        <button class="btn btn-info" type="submit">Save</button>

                        <a href="<?php echo $cancel_link; ?>" class="btn btn-link" type="button">Cancel</a>

                    </div>

               </form>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">
    

    jQuery(document).ready(function($) {

        jQuery('.pro-radio-change').addClass('hide');


        setTimeout(function(){

            jQuery('input:radio.freight_small_radio:checked').trigger('change');

        },300);

        jQuery('input:radio.freight_small_radio').on("change",function(event) {

            var $this, card;

            $this = jQuery(this);

            card = $this.closest('.card-body');

            if(this.value == "freight_enable"){

                card.find('.pro-radio-change').addClass('hide');

                card.find('.pro-radio-change.freight').removeClass('hide');

                card.find('.small_package .input:checked').removeAttr('checked');

            }else if(this.value == "small_enable"){

                card.find('.pro-radio-change').addClass('hide');

                card.find('.pro-radio-change.small_package').removeClass('hide');

                card.find('.freight select.input').val(0);

            }

        });

        jQuery('.variation-copy').on('click',function(){

            var $this;

            $this =jQuery(this);

            var copy_element = $this.closest('.card-box');
            console.log(copy_element);

            var selected_val = [];

            var data = {

                'checkbox':{

                    'vertical_rotaion' :copy_element.find('.vertical_rotaion').is(':checked'), 

                    'ship_own_pakage':copy_element.find('.ship_own_pakage').is(':checked'),

                    'ship_multiple_package':copy_element.find('.ship_multiple_package').is(':checked'),

                    'dropship_enable':copy_element.find('.dropship_enable').is(':checked'),

                    'hazardous_enable':copy_element.find('.hazardous_enable').is(':checked'),

                },

                'radio':{

                    'freight_small_radio' : copy_element.find('.freight_small_radio:checked').val(),    

                },

                'select':{

                    '_freight_class' :copy_element.find('._freight_class option:selected').val(), 

                    'dropship_location':copy_element.find('.dropship_location option:selected').val(),

                },

                'text':{

                    '_weight' :copy_element.find('._weight').val(), 

                    '_length' :copy_element.find('._length').val(),                

                    '_width' :copy_element.find('._width').val(),             

                    '_height' :copy_element.find('._height').val(),     

                }

            };

            jQuery.each(data,function( type , data ){



                if(type == 'radio' ){

                    jQuery.each(data,function(name,val){

                        $('.card-box').find('.'+name+'.'+val).prop( 'checked', true ).trigger('change');

                    });

                }else if( type == 'checkbox' ){

                    jQuery.each(data,function(name,val){

                        $('.card-box').find('.'+name).prop( 'checked', val );

                    });

                }else if( type == 'select' ){

                    jQuery.each(data, function( name,val ){

                        $('.card-box').find('.'+name).val(jQuery.trim( val ));    

                    });

                    

                }else if(type == 'text' ){

                    jQuery.each(data, function( name,val ){

                        $('.card-box').find('.'+name).val(jQuery.trim( val ));    

                    });

                }

            });

        });

    });

</script>

<!-- for variations product listing  -->

<?php } ?>

<?php if($show_form) {?>

<div class="row">

    <div class="col-md-12">

        <div class="card card-box">

            <div class="card-head">

                <header><?php echo get_the_title( $product_id ); ?></header>

                <div class="tools">

              

                </div>

            </div>



            <div class="card-body ">

            	

                <!-- product meta form -->

                <form action="" method="post" id="sp_product_meta_form">

                	<input name="product_id" type="hidden" value="<?php echo $main_product_id; ?>"/>

					<input name="variant_id" type="hidden" value="<?php echo $variation_id; ?>"/>

                    <input name="product_title" type="hidden" value="<?php echo get_the_title( $product_id ) ?>"/>

					<input name="_sku" type="hidden" value="<?php echo $_sku; ?>"/>



                    <div class="form-group row">

                        <label class="col-sm-4 col-form-label">Select Shipping Rate Type LTL or small</label>

                        <div class="col-sm-8">

                           <div class="form-check ">

                                <label class="form-check-label" for="inlineRadio1">

                                    <input class="form-check-input freight_small_radio" type="radio" name="freight_small" id="inlineRadio1" value="freight_enable" <?php  checked( $freight_enable, 1, true ); ?> <?=$disableLTL?> >

                                    LTL Shipment &nbsp<span class="text-danger help-block "><small><?=$disableTextLTL?> </small></span>

                                </label>

                            </div>

                            <div class="form-check e">

                                <label class="form-check-label" for="inlineRadio2">

                                    <input class="form-check-input freight_small_radio" type="radio" name="freight_small" id="inlineRadio2" value="small_enable" <?php  checked( $small_enable, 1, true ); ?> <?=$disableSmall?>>

                                   Small Package or parcel <span class="text-danger help-block "><small><?=$disableTextSmall?> </small></span>

                                </label>

                            </div> 

                        </div>

                    </div>

                	<div class="form-group row">

                		<label for="pro_weight" class="col-sm-4 col-form-label"> Weight ( lbs ) </label>

			    		<div class="col-sm-8">

			      			<input type="text" name="_weight" class="form-control sp_input_decimal" id="pro_weight" placeholder="" value="<?php echo $_weight; ?>">

			    		</div>

                	</div>

                	<div class="form-group row">

                		<label for="pro_weight" class="col-sm-4 col-form-label"> Dimension ( inches )</label>

			    		<div class="col-sm-8">

			    			<div class="row">

			    				<div class="col-sm-4">

			    					<input type="text" name="_length" class="form-control sp_input_decimal" id="pro_weight" placeholder="length in inches" value="<?php echo $_length; ?>">

			    				</div>

			    				<div class="col-sm-4">

			    					<input type="text" name="_width" class="form-control sp_input_decimal" id="pro_weight" placeholder="width in inches" value="<?php echo $_width; ?>">

			    				</div>

			    				<div class="col-sm-4">

			    					<input type="text" name="_height" class="form-control sp_input_decimal" id="pro_weight" placeholder="height in inches" value="<?php echo $_height; ?>">

			    				</div>

			    			</div>

			    		</div>

                	</div>

                	

                	<div class="form-group row freight pro-radio-change">

                		<label for="pro_weight" class="col-sm-4 col-form-label"> Frieght classification </label>

			    		<div class="col-sm-8">

			      			<select name="_freight_class" class="form-control input" <?=$disableLTL?>>

			      				<option value="" disabled="" selected="">Please select the classification</option>

			      			

			      					
                                    <option value="50"<?php selected($_freight_class,"50",true); ?>><?php echo "50"; ?></option>
                                    <option value="55" <?php selected($_freight_class,"55",true); ?>><?php echo "55"; ?></option>
                                    <option value="60" <?php selected($_freight_class,"60",true); ?>><?php echo "60"; ?></option>
                                    <option value="65" <?php selected($_freight_class,"65",true); ?>><?php echo "65"; ?></option>
                                     <option value="70" <?php selected($_freight_class,"70",true); ?>><?php echo "70"; ?> </option>
                                     <option value="77.5" <?php selected($_freight_class,"77.5",true); ?>><?php echo "77.5"; ?></option>
                                     <option value="85" <?php selected($_freight_class,"85",true); ?>><?php echo "85"; ?> </option>
                                     <option value="92.5" <?php selected($_freight_class,"92.5",true); ?>><?php echo "92.5"; ?></option>
                                     <option value="100" <?php selected($_freight_class,"100",true); ?>><?php echo "100"; ?> </option>
                                     <option value="110" <?php selected($_freight_class,"110",true); ?>><?php echo "110"; ?> </option>
                                     <option value="125" <?php selected($_freight_class,"125",true); ?>><?php echo "125"; ?> </option>
                                     <option value="150" <?php selected($_freight_class,"150",true); ?>><?php echo "150"; ?> </option>
                                     <option value="175" <?php selected($_freight_class,"175",true); ?>><?php echo "175"; ?> </option>
                                     <option value="200" <?php selected($_freight_class,"200",true); ?>><?php echo "200"; ?> </option>
                                     <option value="225" <?php selected($_freight_class,"225",true); ?>><?php echo "225"; ?> </option>
                                     <option value="250" <?php selected($_freight_class,"250",true); ?>><?php echo "250"; ?> </option>
                                     <option value="300" <?php selected($_freight_class,"300",true); ?>><?php echo "300"; ?> </option>
                                     <option value="400" <?php selected($_freight_class,"400",true); ?>><?php echo "400"; ?> </option>
                                     <option value="500" <?php selected($_freight_class,"500",true); ?>><?php echo "500"; ?> </option>

			      		

			      			</select>

			    		</div>

                	</div>



                		<!-- small -->
                        <div class="form-group row small_package pro-radio-change">
                        <label for="allow_vertical_roation" class="col-sm-4 col-form-label"> Allow vertical roation</label>
                        <div class="col-sm-8">
                            <div class="form-check">
                              <input class="form-check-input position-static input" type="checkbox" id="allow_vertical_roation" name="vertical_rotaion" <?php checked($vertical_rotaion,1,true); ?> value="1" aria-label="...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row small_package pro-radio-change">
                        <label for="ship_as_own_package" class="col-sm-4 col-form-label"> Ship as own package</label>
                        <div class="col-sm-8">
                            <div class="form-check">
                              <input class="form-check-input position-static input" type="checkbox" id="ship_as_own_package" name="ship_own_pakage"  <?php checked($ship_own_pakage,1,true); ?> value="1" aria-label="...">
                            </div>
                        </div>
                    </div>

       



                	<div class="form-group row  pro-radio-change-">

                		<label for="dropship_enable" class="col-sm-4 col-form-label"> Drop Ship this product</label>

                		<div class="col-sm-8">

	                		<div class="form-check">

							  <input class="form-check-input position-static" type="checkbox" id="dropship_enable" name="dropship_enable" <?php checked($dropship_enable,1,true); ?>  value="1" aria-label="..." onclick="hideDropshipLocation('dropship_enable','dropship_location_div')">

							</div>

						</div>

                	</div>

                	<div class="form-group row dropship_location <?=$dropshipLocationHide?>" id="dropship_location_div">

                		<label for="dropship_location" class="col-sm-4 col-form-label">

                			Drop Ship Locations

                		</label>

                		<div class="col-sm-8">

                			<select name="dropship_location" class="form-control">

                				

                				<?php 

                				if( !empty( $drophouse_lists ) ){

                					echo '<option value="" disabled="" selected>Please select the Drop Ship location</option>';

                					foreach ($drophouse_lists as $key => $item) {

                						?>

                						<option value="<?php echo $item->location_id; ?>" <?php selected($dropship_location,$item->location_id,true); ?> ><?php echo $item->city; ?></option>

                						<?php

                					}

                				}else{

                					echo '<option value="">Please add the DropShip location</option>';

                				}

                					

                				?>

                				

                			</select>

                		</div>

                	</div>

                	<div class="form-group row  pro-radio-change-">

                		<label for="hazardous_enable" class="col-sm-4 col-form-label"> Hazardous material</label>

                		<div class="col-sm-8">

	                		<div class="form-check">

							  <input class="form-check-input position-static" type="checkbox" id="hazardous_enable" name="hazardous_enable" <?php checked($hazardous_enable,1,true); ?> value="1" aria-label="..." <?=($level>=2? "":"disabled")?>>   

                              &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a>

							</div>

						</div>

                	</div>



                	<div class="pull-right response">

                		<button class="btn btn-info" type="submit">Save</button>

                		<a href="<?php echo $cancel_link; ?>" class="btn btn-link" type="button">Cancel</a>

                	</div>

                </form>

                <!-- product meta form -->

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">

	jQuery(document).ready(function($) {

		jQuery('.pro-radio-change').addClass('hide');


		setTimeout(function(){

			jQuery('input:radio[name=freight_small]:checked').trigger('change');

		},300);

		jQuery('input:radio[name=freight_small]').on("change",function(event) {

			if(this.value == "freight_enable"){

				jQuery('.pro-radio-change').addClass('hide');

				jQuery('.pro-radio-change.freight').removeClass('hide');

				jQuery('.small_package .input:checked').removeAttr('checked');

			}else if(this.value == "small_enable"){

				jQuery('.pro-radio-change').addClass('hide');

				jQuery('.pro-radio-change.small_package').removeClass('hide');

				jQuery('.freight select.input').val(0);

			}

		});

	});

</script>

<?php } ?>