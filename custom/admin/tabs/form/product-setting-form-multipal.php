<?php



$variation_id =$variation['variation_id'];

$_weight = get_post_meta( $variation_id, '_weight' , true );

$_length = get_post_meta( $variation_id, '_length' , true );

$_width = get_post_meta( $variation_id, '_width' , true );

$_height = get_post_meta( $variation_id, '_height' , true );

$_sku = get_post_meta( $variation_id, '_sku' , true );

$_sku = ( !empty( $_sku ) ) ? $_sku : $variation_id;

$freight_enable = get_post_meta( $variation_id, 'freight_enable' , true );

$small_enable = get_post_meta( $variation_id, 'small_enable' , true );

$_freight_class = get_post_meta( $variation_id, '_freight_class', true );



$vertical_rotaion = get_post_meta( $variation_id , 'vertical_rotaion' , true );

$ship_own_pakage = get_post_meta( $variation_id , 'ship_own_pakage' , true );

$ship_multiple_package = get_post_meta( $variation_id , 'ship_multiple_package' , true );

$dropship_enable = get_post_meta( $variation_id , 'dropship_enable' , true );

$dropship_location = get_post_meta( $variation_id , 'dropship_location' , true );

$hazardous_enable = get_post_meta( $variation_id , 'hazardous_enable' , true );

$freight_small = get_post_meta( $variation_id , 'freight_small' , true );



//small_enable

if( empty( $freight_enable ) && empty( $small_enable ) ){

	$freight_enable = 1;

}
if(!$dropship_enable){
    $dropshipLocationHide='hide';
}else{
    $dropshipLocationHide='';
}

?>

<fieldset data-variation_id="<?php echo $variation_id; ?>">

<input name="variant_id[<?php echo $variation_id; ?>]" type="hidden" value="<?php echo $variation_id; ?>"/>

<input name="_sku[<?php echo $variation_id; ?>]" type="hidden" value="<?php echo $_sku; ?>"/>



<div class="form-group row copy-val">

    <label class="col-sm-4 col-form-label">Select Shipping Rate Type LTL or small</label>

    <div class="col-sm-8">

       <div class="form-check ">

            <input name="product_title[<?php echo $variation_id; ?>]" type="hidden" value="<?php echo $product_name; ?>"/>
            
            <label class="form-check-label" for="freight_samll_radio-1-<?php echo $variation_id; ?>">

                <input class="form-check-input freight_small_radio freight_enable" type="radio" name="freight_small[<?php echo $variation_id; ?>]" id="freight_samll_radio-1-<?php echo $variation_id; ?>" value="freight_enable" data-cpy="freight_enable" <?php  checked( $freight_enable, 1, true ); ?> <?=$disableLTL?> >

                LTL Shipment &nbsp<span class="text-danger help-block "><small><?=$disableTextLTL?> </small></span>

            </label>

        </div>

        <div class="form-check ">

            <label class="form-check-label" for="freight_samll_radio-2-<?php echo $variation_id; ?>">

                <input class="form-check-input freight_small_radio small_enable" type="radio" name="freight_small[<?php echo $variation_id; ?>]" id="freight_samll_radio-2-<?php echo $variation_id; ?>" value="small_enable" data-cpy="small_enable" <?php  checked( $small_enable, 1, true ); ?> <?=$disableSmall?>>

               Small Package or parcel	<span class="text-danger help-block "><small><?=$disableTextSmall?> </small></span>

            </label>

        </div> 

    </div>

</div>

<div class="form-group row copy-val">

	<label for="pro_weight-<?php echo $variation_id; ?>" class="col-sm-4 col-form-label"> Weight ( lbs ) </label>

	<div class="col-sm-8">

			<input type="text" name="_weight[<?php echo $variation_id; ?>]" class="form-control sp_input_decimal _weight" id="pro_weight-<?php echo $variation_id; ?>"  data-cpy="_weight"  placeholder="" value="<?php echo $_weight; ?>">

	</div>

</div>

<div class="form-group row copy-val">

	<label for="pro_weight" class="col-sm-4 col-form-label"> Dimension ( inches )</label>

	<div class="col-sm-8">

		<div class="row">

			<div class="col-sm-4">

				<input type="text" name="_length[<?php echo $variation_id; ?>]" class="form-control sp_input_decimal _length" data-cpy="_length"  placeholder="length in inches" value="<?php echo $_length; ?>">

			</div>

			<div class="col-sm-4">

				<input type="text" name="_width[<?php echo $variation_id; ?>]" class="form-control sp_input_decimal _width"  data-cpy="_width" placeholder="width in inches" value="<?php echo $_width; ?>">

			</div>

			<div class="col-sm-4">

				<input type="text" name="_height[<?php echo $variation_id; ?>]" class="form-control sp_input_decimal _height"  data-cpy="_height" placeholder="height in inches" value="<?php echo $_height; ?>">

			</div>

		</div>

	</div>

</div>



<div class="form-group row freight pro-radio-change copy-val">

	<label for="_freight_class" class="col-sm-4 col-form-label"> Frieght classification </label>

	<div class="col-sm-8">

			<select name="_freight_class[<?php echo $variation_id; ?>]"  data-cpy="_freight_class" class="form-control _freight_class input" <?=$disableLTL?>>

				<option value="" selected="" disabled="">Please select the classification</option>

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

<div class="form-group row small_package pro-radio-change copy-val">

	<label for="allow_vertical_roation-<?php echo $variation_id; ?>" class="col-sm-4 col-form-label"> Allow vertical roation</label>

	<div class="col-sm-8">

		<div class="form-check">

		  <input class="form-check-input position-static vertical_rotaion input" type="checkbox" id="allow_vertical_roation-<?php echo $variation_id; ?>" name="vertical_rotaion[<?php echo $variation_id; ?>]" data-cpy="vertical_rotaion" <?php checked($vertical_rotaion,1,true); ?> value="1" aria-label="...">

		</div>

	</div>

</div>

<div class="form-group row small_package pro-radio-change copy-val">

	<label for="ship_as_own_package-<?php echo $variation_id; ?>" class="col-sm-4 col-form-label"> Ship as own package</label>

	<div class="col-sm-8">

		<div class="form-check">

		  <input class="form-check-input position-static ship_own_pakage input" type="checkbox" id="ship_as_own_package-<?php echo $variation_id; ?>" name="ship_own_pakage[<?php echo $variation_id; ?>]" data-cpy="ship_own_pakage" <?php checked($ship_own_pakage,1,true); ?> value="1" aria-label="...">

		</div>

	</div>

</div>

<!-- <div class="form-group row small_package pro-radio-change copy-val">

	<label for="ship_as_multiple-<?php echo $variation_id; ?>" class="col-sm-4 col-form-label"> This item Ship as multiple packages. </label>

	<div class="col-sm-8">

		<div class="form-check">

		  <input class="form-check-input position-static ship_multiple_package input" type="checkbox" id="ship_as_multiple-<?php echo $variation_id; ?>" name="ship_multiple_package[<?php echo $variation_id; ?>]" data-cpy="ship_multiple_package" <?php checked($ship_multiple_package,1,true); ?> value="1" aria-label="...">

		</div>

	</div>

</div> -->

<div class="form-group row  pro-radio-change- copy-val">

	<label for="dropship_enable-<?php echo $variation_id; ?>" class="col-sm-4 col-form-label"> Drop Ship this product</label>

	<div class="col-sm-8">

		<div class="form-check">

		  <input class="form-check-input position-static dropship_enable" type="checkbox" id="dropship_enable-<?php echo $variation_id; ?>" name="dropship_enable[<?php echo $variation_id; ?>]" data-cpy="dropship_enable" <?php checked($dropship_enable,1,true); ?>  value="1" aria-label="..." onclick="hideDropshipLocation('dropship_enable-<?php echo $variation_id; ?>','dropship_location_div-<?php echo $variation_id; ?>')">

		</div>

	</div>

</div>

<div class="form-group row dropship_location copy-val <?=$dropshipLocationHide?>" id="dropship_location_div-<?php echo $variation_id; ?>">

	<label for="dropship_location" class="col-sm-4 col-form-label">

		Drop Ship Locations

	</label>

	<div class="col-sm-8">

		<select name="dropship_location[<?php echo $variation_id; ?>]" data-cpy="dropship_location" class="form-control dropship_location">

			

			<?php 

			if( !empty( $drophouse_lists ) ){

				echo '<option value="" selected="" disabled="">Please select the Drop Ship location</option>';

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

<div class="form-group row  pro-radio-change- copy-val">

	<label for="hazardous_enable-<?php echo $variation_id; ?>" class="col-sm-4 col-form-label"> Hazardous material</label>

	<div class="col-sm-8">

		<div class="form-check">

		  <input class="form-check-input position-static hazardous_enable" type="checkbox" id="hazardous_enable-<?php echo $variation_id; ?>" name="hazardous_enable[<?php echo $variation_id; ?>]" data-cpy="hazardous_enable" <?php checked($hazardous_enable,1,true); ?> value="1" aria-label="..." <?=($level>=2? "":"disabled")?>> &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a>

		</div>

	</div>

</div>

</fieldset>

