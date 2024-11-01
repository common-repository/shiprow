<?php
//for datatable design
wp_enqueue_style( 'sp-datatable-bootstrap-css' );
//datatable js
wp_enqueue_script( 'sp-datatable-js' );
//datatable bootstrap css
wp_enqueue_script( 'sp-datatable-bootstrap-js' );
//custom js for datatable
wp_enqueue_script( 'sp-table-js' );
//for form validation
wp_enqueue_script( 'sp-validation-js' );
//for form validation plugin
wp_enqueue_script( 'sp-form-js' );
//notification
wp_enqueue_style( 'notfification-css' );

wp_enqueue_script( 'notification-js' );

wp_enqueue_style( 'selectize-css' );
wp_enqueue_script( 'selectize-js' );

global $wpdb;
$drophouse_query = "SELECT * FROM {$wpdb->prefix}locations WHERE type='dropship'";

$dropshipCities = $wpdb->get_results($drophouse_query,ARRAY_A);

$products_query="SELECT * FROM {$wpdb->prefix}product_settings";
$productsSaved=$wpdb->get_results($products_query,ARRAY_A);


?>
<script>

window.onload=function(){
  
  $('#selectProducts').selectize({
    maxItems: 300,
    plugins: ['remove_button'],
    onChange: function(value){
          $('#storeProductQty').empty();
      value.forEach(function(row){
          var qty='<div class="row" pt-2><div class="col-md-10">'+$('option[value="'+row+'"]').text()+'</div><input type="number" class=" form-control col-md-2" id="qty'+row+'" value=1></div>';
          $('#storeProductQty').append(qty);
      })
    }
});
}

function getStoreProductsRates(){
    var country=$("#country").val();
    var state=$("#state").val();
    var zipcode=$('#zipcode').val();
    var address1=$('#address1').val();
    var city=$('#city').val();

    

    var arr={
      "rate": {
        "destination": {
          "country": country,
          "postal_code": zipcode,
          "province": state,
          "city": city,
          "name": "Bob Norman",
          "address1": address1,
          "address2": null,
          "address3": null,
          "phone": null,
          "fax": null,
          "email": null,
          "address_type": null,
          "company_name": null
        },
        "items": [],
        "currency": "USD",
        "locale": "en"
      }
    };
  

    var selectProducts=$('#selectProducts').val();
    var productsSaved=<?=json_encode($productsSaved)?>;
    productsSaved.forEach(function(row){
      if(selectProducts.indexOf(row.product_id+row.variant_id)!== -1){
      console.log(row);
        var productId=row.product_id;
        var variantId=row.variant_id;
        // title
        var productTitle=row.product_title;
        var variantTitle=row.variant_title;
        // weight
        var productWeight=row.product_weight;
        // dimentions
        var sizeL=row.product_length;
        var sizeW=row.product_width;
        var sizeH=row.product_height;
        // ltl enable
        var freight_enable=row.freight_enable;
        var freight=row.product_freight_class;
        //small enable
        var small_enable=row.small_enable;
        var additionalSettings=JSON.parse(row.additional_settings);
        var vertical_rotation=additionalSettings.vertical_rotation;
        var ship_own_pakage=additionalSettings.ship_own_pakage;
        //dropship this product
        var dropshipEnable=row.dropship_enable;
        var dropship=row.dropship_location;

        if($('#qty'+row.product_id+row.variant_id).val()!=undefined){
          var quantity=$('#qty'+row.product_id+row.variant_id).val();
        }else{
          var quantity=1;
        }

        arr['rate']['items'].push({
                "name": productTitle+' : '+variantTitle,
                "sku": "",
                "quantity": quantity,
                "dropship_enable":dropshipEnable,
                "dropship_location": dropship,
                "product_weight": productWeight,
                "product_height": sizeH,
                "product_length": sizeL,
                "product_width": sizeW,
                'freight_enable':freight_enable,
                'vertical_rotation':vertical_rotation,
                'ship_own_pakage':ship_own_pakage,
                'small_enable':small_enable,
                "product_freight_class": freight,
                "price": 0,
                "vendor": "not defined",
                "requires_shipping": true,
                "taxable": true,
                "fulfillment_service": "manual",
                "properties": null,
                "product_id": productId,
                "variant_id": variantId
              });
      }
    })
   arr=JSON.stringify(arr);
    console.log(arr);
    jQuery(loading_div).appendTo(jQuery('form'));
    $('#getRateStoreBtn').prop('disabled',true);
    $.ajax({

                url: ajaxurl,

                type: 'POST',

                data:{arr:arr,'action' : 'sp_get_rates',},

                dataType: 'json',

                success: function(response){
                  $('#getRateStoreBtn').prop('disabled',false);
                  jQuery(loading_class).remove();
                 
                  console.log(response);
                  $('#showRates').empty();
                  $('#showDetail').empty();
                  var text='';
                  response['rates'].forEach(function(row){
                  text+='<div class="custom-control custom-radio custom-control"><input type="radio" class="custom-control-input" id="'+row.service_code+'" name="detailRadio" value="'+row.service_code+'" onclick="showDivDetail(`'+row.service_code+'`)"/><label class="custom-control-label" for="'+row.service_code+'"><b>$'+(row.total_price )+' - '+row.service_name+'</b></label></div>';
                  
                    
                    text+='<br>';
                  })
                  $('#showRates').append(text);

                  for (var key in response.html) {
                    $('#showDetail').append('<div class="detailDiv" id="'+key+'Div" style="display: none;">'+response.html[key]+'</div>');
                  }
                  //making first radio check
                  $('#'+response['rates'][0]['service_code']).prop('checked',true);
                  showDivDetail(response['rates'][0]['service_code']);
                  
                  



                },//when unable to get zip code

              error: function(XMLHttpRequest, textStatus, errorThrown) 

              {
                $('#getRateStoreBtn').prop('disabled',false);
                console.log(errorThrown);
                jQuery(loading_class).remove();
                // alert(errorThrown);

                              }
            });
  }

  

function showStoreProduct(){
  $('#storeProducts').show();
  $('#customProducts').hide();
}
function showCustomProduct(){
  $('#customProducts').show();
  $('#storeProducts').hide();
}
function showLTL(count=""){
  $('#LTLDiv'+count).show();
  $('#smallDiv'+count).hide();
}
function showSmall(count=""){
  $('#LTLDiv'+count).hide();
  $('#smallDiv'+count).show();
}
function getRates(){
  var isValid=true;
    var fields=$('.ss-item-required').serializeArray();
    fields.forEach(function(field){
      if(field.value==''){
        notificationAlert('Error','info',field.name +' cant be empty');
        isValid=false;
        return false;
      }
    });
    var loading_div ="<div class='refresh-block'><span class='refresh-loader'><i class='fa fa-spinner fa-spin'></i></span></div>";
    $shop=$('#shop').val();
    var country=$("#country").val();
    var state=$("#state").val();
    var zipcode=$('#zipcode').val();
    var address1=$('#address1').val();
    var city=$('#city').val();


    var quantity=$('#quantity').val();
    var productWeight=$('#productWeight').val();
    var dropship='';
    var dropshipEnable=0;
    var type=$('input[name="typeRadio"]:checked').val();
    if(type=="LTL"){
      var freight_enable=1;
      var small_enable=0;
    }else{
      var freight_enable=0;
      var small_enable=1;
    }
    var vertical_rotation=+$('#vertical').is(':checked');
    var ship_own_pakage=+$('#ownpakage').is(':checked');
    var freight=+$('#freight').val();
    if(document.getElementById('dropshipCheckbox').checked){
      dropshipEnable=1;
      dropship=$('#dropship :selected').val();
    }
    
      var sizeL=$('#sizeL').val();
      var sizeW=$('#sizeW').val();
      var sizeH=$('#sizeH').val();
      // var price=$('#price').val();
    
    

   

    //ship to what? extra fields?more products?how to show result

    var arr={
      "rate": {
        "destination": {
          "country": country,
          "postal_code": zipcode,
          "province": state,
          "city": city,
          "name": "Bob Norman",
          "address1": address1,
          "address2": null,
          "address3": null,
          "phone": null,
          "fax": null,
          "email": null,
          "address_type": null,
          "company_name": null
        },
        "items": [
          {
            "name": "custom product",
            "sku": "",
            "quantity": quantity,
            "dropship_enable":dropshipEnable,
            "dropship_location": dropship,
            "product_weight": productWeight,
            "product_height": sizeH,
            "product_length": sizeL,
            "product_width": sizeW,
            'freight_enable':freight_enable,
            'vertical_rotation':vertical_rotation,
            'ship_own_pakage':ship_own_pakage,
            'small_enable':small_enable,
            "product_freight_class": freight,
            "price": 0,
            "vendor": "Jamie D's Emporium",
            "requires_shipping": true,
            "taxable": true,
            "fulfillment_service": "manual",
            "properties": null,
            "product_id": 'i',
            "variant_id": 'i'
          }
        ],
        "currency": "USD",
        "locale": "en"
      }
    };
   
    var count=-1;
    $('div[name="productsDiv"]').each(function(){
      count=count+1;
      var quantity=$('#'+count+'quantity').val();
      var productWeight=$('#'+count+'productWeight').val();
      var freight=+$('#'+count+'freight').val();
      var dropship='';
      var dropshipEnable=0;
      var vertical_rotation=+$('#vertical'+count).is(':checked');
      var ship_own_pakage=+$('#ownpakage'+count).is(':checked');
      var type=$('input[name="typeRadio'+count+'"]:checked').val();
    if(type=="LTL"){
      var freight_enable=1;
      var small_enable=0;
    }else{
      var freight_enable=0;
      var small_enable=1;
    }
      if(document.getElementById('dropshipCheckbox'+count).checked){
        dropshipEnable=1
        var dropship=$('#dropship'+count+' :selected').val();
      }
        var sizeL=$('#'+count+'sizeL').val();
        var sizeW=$('#'+count+'sizeW').val();
        var sizeH=$('#'+count+'sizeH').val();
        // var price=$('#'+count+'price').val();
      
     arr['rate']['items'].push({
            "name": "custom product "+(count+1),
            "sku": "",
            "quantity": quantity,
            "dropship_enable":dropshipEnable,
            "dropship_location": dropship,
            "product_weight": productWeight,
            "product_height": sizeH,
            "product_length": sizeL,
            "product_width": sizeW,
            'freight_enable':freight_enable,
            'vertical_rotation':vertical_rotation,
            'ship_own_pakage':ship_own_pakage,
            'small_enable':small_enable,
            "product_freight_class": freight,
            "price": 0,
            "vendor": "Jamie D's Emporium",
            "requires_shipping": true,
            "taxable": true,
            "fulfillment_service": "manual",
            "properties": null,
            "product_id": 'i'+count,
            "variant_id": 'i'+count
          });
    
    });

    console.log(arr);


    arr=JSON.stringify(arr);
    // var t='https://shiprow.com/app/index-new.php?shop='+$shop+'&platform=Shopify&calculator=1';
    if(isValid){
    jQuery(loading_div).appendTo(jQuery('form'));
        $('#getRateBtn').prop('disabled',true);

    $.ajax({

                url: ajaxurl,

                type: 'POST',

                data:{arr:arr,'action' : 'sp_get_rates',},

                dataType: 'json',

                success: function(response){
                $('#getRateBtn').prop('disabled',false);

                    jQuery(loading_class).remove();
                 
                  console.log(response);
                  $('#showRates').empty();
                  $('#showDetail').empty();
                  var text='';
                  response['rates'].forEach(function(row){
                  text+='<div class="custom-control custom-radio custom-control"><input type="radio" class="custom-control-input" id="'+row.service_code+'" name="detailRadio" value="'+row.service_code+'" onclick="showDivDetail(`'+row.service_code+'`)"/><label class="custom-control-label" for="'+row.service_code+'"><b>$'+(row.total_price )+' - '+row.service_name+'</b></label></div>';
                  
                    
                    text+='<br>';
                  })
                  $('#showRates').append(text);

                  for (var key in response.html) {
                    $('#showDetail').append('<div class="detailDiv" id="'+key+'Div" style="display: none;">'+response.html[key]+'</div>');
                  }
                  //making first radio check
                  $('#'+response['rates'][0]['service_code']).prop('checked',true);
                  showDivDetail(response['rates'][0]['service_code']);
                  
                  



                },//when unable to get zip code

              error: function(XMLHttpRequest, textStatus, errorThrown) 

              {
                $('#getRateBtn').prop('disabled',false);

                jQuery(loading_class).remove();
                $('#showRates').empty();
                $('#showDetail').empty();
                // alert(errorThrown);

                              }
            });
  }
}
function removeProduct(){
  count=$('div[name="productsDiv"]').length;
  if(count==0){
    return 0;
  }
  count=(parseInt(count)-1).toString();
  $('#productsDiv'+count).remove();
  // alert(count);
}
function addProduct(){
 count=$('div[name="productsDiv"]').length;
 var dropshipOptions=<?=json_encode($dropshipCities)?>;
 var dropshipOptionsStr='';
 dropshipOptions.forEach(function(row){
  dropshipOptionsStr+=`<option value=`+row['location_id']+`>`+row['city']+'</option> ';
 })
  var product=`<div name="productsDiv" id="productsDiv`+count+`">
  <div class="form-group">  &nbsp
  </div>
  <hr>
  <div class=" form-group">
   <b>Added Product `+(count+1)+`</b>
  
  
  </div>
  <hr>
  <div class="form-group">
        <div class="custom-control custom-radio custom-control">
          <input type="radio" class="custom-control-input" id="typeRadioLTL`+count+`" checked="true" name="typeRadio`+count+`" value="LTL" onclick="showLTL(count)">
          <label class="custom-control-label" for="typeRadioLTL`+count+`"><b>LTL Shipment</b></label>
      </div>
        <div class="custom-control custom-radio custom-control">
          <input type="radio" class="custom-control-input" id="typeRadioSmall`+count+`" name="typeRadio`+count+`" value="small" onclick="showSmall(count)"/>
          <label class="custom-control-label" for="typeRadioSmall`+count+`"><b>Small Package or Parcel</b></label>
      </div>
  </div>
    
      <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label class="form-label"><b>Qty</b></label>
                </div>
                <div class="col-md-3">
                     <input type="number" name="quantity" id='`+count+`quantity' class="form-control ss-item-required" >
                </div>
              </div>
            </div>
  <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                     <label class="form-label"><b>Weight(lbs)</b></label>
                </div>
                <div class="col-md-9">
                     <input type="number" name="weight" id='`+count+`productWeight' class="form-control ss-item-required" value="">  
                </div>
              </div>
         
                

      </div>
      <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                    <label class="form-label  text-left " ><b> Dimensions  </b>
                        <span class="required" aria-required="true">  </span>
                    </label>
                </div>
                <div class="col-md-3">
                     <input type="number" name="length" id='`+count+`sizeL' class="form-control ss-item-required" value="" placeholder="L">  
                </div>
                <div class="col-md-3">
                     <input type="number" name="width" id='`+count+`sizeW' class="form-control ss-item-required" value="" placeholder="W">  
                </div>
                <div class="col-md-3">
                     <input type="number" name="height" id='`+count+`sizeH' class="form-control ss-item-required" value="" placeholder="H">  
                </div>
              </div>
         
                

      </div>
  
      <hr>

      
    <div id="showAllDiv`+count+`" >
    <div class="form-group">
              <div class="row" id="LTLDiv`+count+`">
                <label class="control-label col-md-3 text-left bold"> Freight Class
                    <span class="required" aria-required="true">  </span>
                </label>
                <div class="col-md-9">
                <select class="form-control" id="`+count+`freight">
                        <option disabled="disabled" selected="selected" value="">Please Select The Class</option>
                        <option value="50" >50</option>
                        <option value="55" >55</option>
                        <option value="60">60</option>
                        <option value="65" >65</option>
                         <option value="70" >70 </option>
                         <option value="77.5" >77.5 </option>
                         <option value="85" >85 </option>
                         <option value="92.5">92.5 </option>
                         <option value="100" >100 </option>
                         <option value="110" >110 </option>
                         <option value="125" >125 </option>
                         <option value="150" >150 </option>
                         <option value="175" >175 </option>
                         <option value="200" >200 </option>
                         <option value="225" >225 </option>
                         <option value="250" >250 </option>
                         <option value="300" >300 </option>
                         <option value="400" >400 </option>
                         <option value="500" >500 </option>
                    </select>
                     
                </div>
                
              </div>
              <div id="smallDiv`+count+`" style="display: none;">
             <div class="form-group">
                   <div class="checkbox checkbox-icon-black p-0">
                      <input id="vertical`+count+`" type="checkbox" >
                      <label for="vertical`+count+`">
                         <b>Allow Vertical Rotation</b>
                      </label>
                  </div>
            </div>
             <div class="form-group">
                   <div class="checkbox checkbox-icon-black p-0">
                      <input id="ownpakage`+count+`" type="checkbox" >
                      <label for="ownpakage`+count+`">
                     <b>Ship as own package</b>
                         
                      </label>
                  </div>
            </div>
          </div>
         
      </div>
      
      <div class="form-group">
        <div class="custom-control custom-checkbox">
             <input id="dropshipCheckbox`+count+`" type="checkbox" onclick="dropshipSelect(`+count+`)" class="custom-control-input">
                    <label for="dropshipCheckbox`+count+`"" class="custom-control-label">
                       Dropship this product
                    </label>
        </div>
      </div>
      <div id="showDropshipsDiv`+count+`" style="display: none;">
      <div class="form-group">
        <select class="form-control" id="dropship`+count+`">
            <option value="" disabled selected>Please Select Location </option>
            `+dropshipOptionsStr+`
            </select>
          </div>
        </div>
      
    </div>
        </div>`;
  $('#addProductsDiv').append(product);
}

function showDivDetail(key){
  $('.detailDiv').hide();
  $('#'+key+'Div').show();
}

function dropshipSelect(count){
  if(document.getElementById('dropshipCheckbox'+count).checked){
            $('#showDropshipsDiv'+count).show()
          }
          else{
            $('#showDropshipsDiv'+count).hide()
          }

}
</script>


      <div class="row">

          <div class="col-md-6">

              <div class="card card-box">

                  <div class="card-head">

                      <header>Shipping to</header>

                      

                  </div>

                  <div class="card-body ">
                    <form>
                      <div class="row">

                          <div class="col-md-12 col-sm-12 col-12">

                              <div class="btn-group pull-right">

                   

   <!-- Button trigger modal -->



                              </div>



                          </div>

                      </div>

<!-- here u start -->
          
            
            <div class="form-group">

                <label class="form-label"> Zip Code</label>

                <input type="text" id='zipcode' name="zipcode" class="ss-item-required form-control zipcode-change ">

              </div>

            <div class="form-group">
              <label class="form-label"> Country
                <i class="fa fa-spinner fa-spin" style="display: none" id="spinnerCountry">&nbsp</i> 

                   <span class="required"> * </span>
              </label>
              <input name="country" id="country" type="text" class="form-control country ss-item-required" />
            </div>

            

          <div class="row">

            <div class="col-sm-6">

              <div class="form-group">

                <label class="control-label">State 

                    <i class="fa fa-spinner fa-spin" style="display: none" id="spinnerState">&nbsp</i>

                   <span class="required"> * </span>

                 </label>

                   <input name="state" id="state" type="text" class="form-control state ss-item-required">


              </div> 
              

            </div>

            <div class="col-sm-6">
              <div class="form-group">
              <label class="form-label"> City
                <i class="fa fa-spinner fa-spin" style="display: none" id="spinnerCity">&nbsp</i> 

                   <span class="required"> * </span>
              </label>
              <input name="city" id="city" type="text" class="form-control city ss-item-required" />
            </div>
             

            </div>

        </div> 

        <div id="fullAddrDiv" >
              
            <div class="form-group">

              <label class="form-label"> Address</label>

              <input type="text" id='address1' name="street_address_1" class="form-control">

            </div>              
          </div> 
           </form>
</div>
<!-- end of card bbody -->
    <hr>      
 <div class="card-head form-group">

                      <header>Add products</header>

                      

  </div>
  <div class="card-body">
      <div class="row">
    <div class="custom-radio custom-control col-6">
            <input type="radio" class="custom-control-input" id="radioStoreProduct" name="radioProducts" value="store" onclick="showStoreProduct()"/>
            <label class="custom-control-label" for="radioStoreProduct"><b>Store Products</b></label>
        </div>
    <div class="custom-control custom-radio col-6">
      <input type="radio" class="custom-control-input" id="radioCustomProduct" name="radioProducts" value="custom" onclick="showCustomProduct()"/>
      <label class="custom-control-label" for="radioCustomProduct"><b>Add Custom Product</b></label>
    </div>
  </div>
  <hr>
    <div class="form-group pt-2" id="storeProducts" style="display:none;">
      <select id="selectProducts" multiple="">
                <option value="">please select product</option>
                <?php foreach($productsSaved as $prod){ ?>
                  <option value="<?=$prod['product_id'].$prod['variant_id']?>">
                      <?=(isset($prod['product_title'])?stripcslashes($prod['product_title']):$prod['product_id'])?>
                        
                  </option>
                  

                <?php } ?>
      </select>
      <button class="btn btn-primary" id="getRateStoreBtn" onclick="getStoreProductsRates()">Get Rates</button>
      <div class="form-group pt-2"><h4><b>Quantity</b></h4></div>
      <div class="form-group pt-2" id="storeProductQty">
      
      </div>
    </div>
    <div id="customProducts" class="pt-2" style="display: none;">
    <div class="form-group">
          <div class="custom-control custom-radio custom-control">
            <input type="radio" class="custom-control-input" id="typeRadioLTL" checked="true" name="typeRadio" value="LTL" onclick="showLTL()"/>
            <label class="custom-control-label" for="typeRadioLTL"><b>LTL Shipment</b></label>
        </div>
          <div class="custom-control custom-radio custom-control">
            <input type="radio" class="custom-control-input" id="typeRadioSmall" name="typeRadio" value="small" onclick="showSmall()"/>
            <label class="custom-control-label" for="typeRadioSmall"><b>Small Package or Parcel</b></label>
        </div>
    </div>
    
  <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label class="form-label"><b>Qty</b></label>
                </div>
                <div class="col-md-3">
                     <input type="number" id='quantity' name="quantity" class="form-control ss-item-required" >
                </div>
              </div>
            </div>
  <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                     <label class="form-label"><b>Weight(lbs)</b></label>
                </div>
                <div class="col-md-9">
                     <input type="number" id='productWeight' name="weight" class="form-control ss-item-required" value="">  
                </div>
              </div>
         
                

      </div>

      <!-- ///////////////////// -->
  <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                    <label class="form-label  text-left " ><b> Dimensions  </b>
                        <span class="required" aria-required="true">  </span>
                    </label>
                </div>
                <div class="col-md-3">
                     <input type="number" id='sizeL' name="length" class="form-control ss-item-required" value="" placeholder="L">  
                </div>
                <div class="col-md-3">
                     <input type="number" id='sizeW' name="width" class="form-control ss-item-required" value="" placeholder="W">  
                </div>
                <div class="col-md-3">
                     <input type="number" id='sizeH' name="height" class="form-control ss-item-required" value="" placeholder="H">  
                </div>
              </div>
         
                

      </div>
  <hr>
  <div class="form-group"></div>
  
      
      
      
    <div id="showAllDiv">
      <div class="form-group">
              <div class="row" id="LTLDiv">
                <label class="control-label col-md-3 text-left bold"> Freight Class
                    <span class="required" aria-required="true">  </span>
                </label>
                <div class="col-md-9">
                     <select class="form-control" id="freight">
                        <option disabled="disabled" selected="selected" value="">Please Select The Class</option>
                        <option value="50" >50</option>
                        <option value="55" >55</option>
                        <option value="60">60</option>
                        <option value="65" >65</option>
                         <option value="70" >70 </option>
                         <option value="77.5" >77.5 </option>
                         <option value="85" >85 </option>
                         <option value="92.5">92.5 </option>
                         <option value="100" >100 </option>
                         <option value="110" >110 </option>
                         <option value="125" >125 </option>
                         <option value="150" >150 </option>
                         <option value="175" >175 </option>
                         <option value="200" >200 </option>
                         <option value="225" >225 </option>
                         <option value="250" >250 </option>
                         <option value="300" >300 </option>
                         <option value="400" >400 </option>
                         <option value="500" >500 </option>
                    </select> 
                </div>
                
              </div>
         
                

      </div>
      <div id="smallDiv" style="display: none;">
             <div class="form-group">
                   <div class="checkbox checkbox-icon-black p-0">
                      <input id="vertical" type="checkbox" >
                      <label for="vertical">
                         <b>Allow Vertical Rotation</b>
                      </label>
                  </div>
            </div>
             <div class="form-group">
                   <div class="checkbox checkbox-icon-black p-0">
                      <input id="ownpakage" type="checkbox" >
                      <label for="ownpakage">
                     <b>Ship as own package</b>
                         
                      </label>
                  </div>
            </div>
          </div>
      
      
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox">
             <input id="dropshipCheckbox" type="checkbox" class="custom-control-input">
                      <label for="dropshipCheckbox" class="custom-control-label">
                         Dropship this product
                      </label>
        </div>
      </div>
      <div id="showDropshipsDiv" style="display: none;">
      <div class="form-group">
        <select class="form-control" id="dropship">
            <option value="" disabled selected>Please Select Location </option>
            <?php foreach ($dropshipCities as $value) { ?>
                <option value="<?=$value['location_id']?>">
                  <?=$value['city']?>
                </option>

            <?php } ?>

        </select>
        </div>
      </div>
  <div id="addProductsDiv" >

  </div>

    <div class="form-group row">
        <input type="hidden" id="shop" value="<?=$_SERVER['HTTP_HOST']?>">
      <button type="button" class="btn btn-info" id="getRateBtn"  onclick="getRates()">

                Get Rate <i class="fa"></i>
      </button>&nbsp
      <button type="button" class="btn btn-danger" onclick="removeProduct()" >

                Remove Product <i class="fa fa-close"></i>
      </button>&nbsp
      <button type="button" class="btn" onclick="addProduct()" >

                Add Product <i class="fa fa-plus"></i>
      </button>
      
    </div>
  </div>



</div>

  </div>


    </div>

            <div class="col-md-6">
             <div class="row">

                  <div class="col-md-12">

                      <div class="card card-box">

                          <div class="card-head">

                              <header><b>Rate Result</b></header>

                              

                          </div>

                        <div class="card-body ">

                            <form id="rateResultForm">
                              <div class="row">

                                  <div class="col-md-12 col-sm-12 col-12">

                                      <div class="btn-group pull-right">

                           





                                      </div>



                                  </div>

                              </div>


                    <div class="form-group">
                      <div class="row">
                        <label class="control-label col-md-3 text-left bold"><b></b>
                            <span class="required" aria-required="true">  </span>
                        </label>
                        <div class="col-md-1">
                            
                        </div>
                      </div>
                      <div class="row">
                        <div id="showRates">
                          <label class="control-label col-md-11 text-left bold"><p><b> Please submit a destination and product(s) values to get rate results.</b></p>
                              <span class="required" aria-required="true">  </span>
                          </label>
                          <div class="col-md-9">
                              
                          </div>
                        </div>
                      </div>
                        
                        <!-- <h3>Details</h3>
                        <hr> -->
                        <div class="" id="showDetail">
                          
                        </div>
                      </div>
                    </form>
                    </div>

                  </div>

                  </div>

              </div>

          </div>
    </div>

