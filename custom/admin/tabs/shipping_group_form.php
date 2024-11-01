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


global $sp_strings,$wpdb;

//getting zones list for dropdown
$shipping_zones_query = "SELECT * FROM {$wpdb->prefix}shipping_zones";

$zones = json_decode(json_encode($wpdb->get_results($shipping_zones_query)),true);


?>



   <link rel = "stylesheet" 
         href = "https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
      <script src = "https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js">
      </script>
      <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- notification js -->
    <link rel="stylesheet" href="js/notification/notifications.css">
  <script src="js/notification/notifications.js"></script>
<!-- end notification -->
<script type="text/javascript">
  function notificationAlert(title=' ',theme='success',message=' '){
    if(theme!='success' & theme!='info' & theme!='warning' & theme!='error' & theme!='none' ){
      theme='none';
    }
    window.createNotification({
      closeOnClick: true,
     
      // displays close button
      displayCloseButton: false,
     
      // nfc-top-left
      // nfc-bottom-right  // nfc-bottom-left
      positionClass: 'nfc-top-right',
     
      // callback
      onclick: false,
     
      // timeout in milliseconds
      showDuration: 3500,
      // success, info, warning, error, and none
      theme: theme

    })({
      title: title,
      message: message
    });
  }
</script>
<style type="text/css">
  textarea.form-control.col-md-6{
    overflow: hidden;
  }
  .moda-body .list {
    max-height: 360px;
    overflow-y: auto;
    text-align: left;
    font-size: 14px;
  }
  .modal-body .list .opt {
    padding: 10px 20px;
    display: flex;
  }
  .modal-body .list .slct-all {
    background: #596675;
    color: white;
    font-weight: 700;
  }
  .modal-body .list .opt {
    border-bottom: 1px solid #ddd;
    font-size: 14px;
  }
  input[type="radio"], input[type="checkbox"] {
    margin-top: 4px;
    margin-right: 5px;
    width: 15px;
    height: 15px;
  }
  .modal-body .list h5 {
    font-weight: 700;
    margin: 0;
    padding: 15px 20px;
    background: #f3f3f3;
  }
  .modal-body .list h5, .modal-dialog.mbasic.mlist .modal-content .list .opt {
    border-bottom: 1px solid #ddd;
    font-size: 14px;
  }
  .results {
    display: flex;
    border: 1px solid #ccc;
    border-radius: 3px;
    flex-flow: column;
    font-size: 13px;
    margin-bottom: 8px;
    -webkit-box-shadow: 0px 1px 0px 0px rgba(0,0,0,0.12);
    -moz-box-shadow: 0px 1px 0px 0px rgba(0,0,0,0.12);
    box-shadow: 0px 1px 0px 0px rgba(0,0,0,0.12);
  }
  .results .r-hd {
    color: #fff;
    background: #596675;
    border-radius: 3px 3px 0 0;
    font-size: 13px;
  }
  .results .r-sb-hd, .md-ms .results .r-rw {
    border-bottom: 1px solid #ccc;
    padding: 8px 15px;
    display: flex;
    flex-flow: row;
    justify-content: space-between;
  }
  .results .r-hd {
    color: #fff;
    background: #596675;
    border-radius: 3px 3px 0 0;
    font-size: 13px;
    padding: 9px;
  }
  .results .r-hd a {
    color: #efefef;
    text-decoration: underline;
    margin-left: 10px;
    text-transform: none;
  }
  .results .r-hd a {
    color: #efefef;
    text-decoration: underline;
    margin-left: 10px;
    text-transform: none;
  }
  .results .list {
    max-height: 400px;
    overflow-y: auto;
  }
  .results .list {
    max-height: 400px;
    overflow-y: auto;
  }
  .results .r-sb-hd {
    background: #f3f3f3;
    font-weight: 700;
  }
  .results .r-sb-hd, .md-ms .results .r-rw {
    border-bottom: 1px solid #ccc;
    padding: 8px 15px;
    display: flex;
    flex-flow: row;
    justify-content: space-between;
  }
  .results .r-sb-hd {
    background: #f3f3f3;
    font-weight: 700;
  }
  .results .r-sb-hd, .md-ms .results .r-rw {
    border-bottom: 1px solid #ccc;
    padding: 8px 15px;
    display: flex;
    flex-flow: row;
    justify-content: space-between;
  }
  .results .r-rw:last-of-type {
    border-bottom: none;
  }
  .results .r-rw.child {
    padding: 8px 15px 8px 30px;
  }
  .results .r-rw a {
    margin-left: 10px;
    color: #333;
    width: 20px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    border-radius: 40px;
  }
  .results .r-rw a {
    margin-left: 10px;
    color: #333;
    width: 20px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    border-radius: 40px;
  }
  .fal {
    font-family: 'Font Awesome 5 Pro';
    font-weight: 300;
  }
</style>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $(document).ready(function(){
    $('#selectAllCustom').on('click',function(){
      if($('#selectAllCustom').prop('checked')){
        $('#customShippingDiv input:checkbox').prop('checked', true);
      }
    });
    $('#selectAllLive').on('click',function(){
      if($('#selectAllLive').prop('checked')){
        $('#liveShippingDiv input:checkbox').prop('checked', true);
      }
    });
  });
});


  function saveGroup(){
    var required=false;
    var fields = $(".ss-item-required").find("select, textarea, input").serializeArray();
    $.each(fields, function(i, field) {
      if (!field.value){
        notificationAlert('Error','info',field.name +' cant be empty');
        required=true;
        return false;
      }
     });
//basic tab
      var name=$('#name').val();
      var internalDescription=$('#internalDescription').val();
      //optional tab
      var selectedCustom = [];
        $('#customShippingDiv input:checked').each(function() {
            selectedCustom.push($(this).attr('name'));
        });
        var selectedLive = [];
        $('#liveShippingDiv input:checked').each(function() {
            selectedLive.push($(this).attr('name'));
        });
        selectedCustom=JSON.stringify(selectedCustom)
        selectedLive=JSON.stringify(selectedLive)
        var zone=$('#zoneList :selected').val();
      //advanced tab
      var freightClass=$('#freightClass :selected').val();
      var SKUBased=+$('#SKUBased').is(':checked');
      var mustShipFreight=+$('#mustShipFreight').is(':checked');
      var excludeCarrierWeight=+$('#excludeCarrierWeight').is(':checked');





    // the key in data should be same as column name in database. else it wont save successfully
    if(!required){
      $.ajax({
          url:'admin-ajax.php',
          type:'POST',
          data:{ action:'shipping_group_add', 
              name:name,
              internal_description:internalDescription,
              custom_shipping_methods:selectedCustom,
              live_shipping_methods:selectedLive,
              shipping_zone:zone,
              freight_class:freightClass,
              sku_shipping_group:SKUBased,
              must_ship_freight:mustShipFreight,
              exclude_carrier_weight_threshold:excludeCarrierWeight
            },
          dataType:'text',
          success:function(response){
            notificationAlert('Success!','success','Successfully Added');
          window.location.href='admin.php?page=sp-settings&tab=shipping_groups';
          },
          error: function(XMLHttpRequest, textStatus, errorThrown){
            alert(errorThrown);
          }

        });
    }

    }

    function tab2() {
      $("#tabBar1").removeClass('is-active');
      $("#tabBar2").addClass('is-active');
      $("#tab1").removeClass('is-active');
      $("#tab2").addClass('is-active');
     
    }

    function tab3(){
      $("#tabBar2").removeClass('is-active');
      $("#tabBar3").addClass('is-active');
      $("#tab2").removeClass('is-active');
      $("#tab3").addClass('is-active');
    
  }

  function addCustoms()
    {
      $('#customList').empty();
      var append='<div class="r-sb-hd">Flat Carrier</div>';
      var selectedCustom = [];
        $('#customShippingDiv input:checked').each(function() {
          append+='<div class="r-rw child"><span>'+$(this).attr('name')+'</span>&nbsp<i class="fa fa-check"></i></div>';
        });
      $('#customList').append(append);
    }
     function addLive()
    {
      $('#liveList').empty();
      var append='<div class="r-sb-hd">UPS</div>';
      var selectedCustom = [];
        $('#liveShippingDiv input:checked').each(function() {
          append+='<div class="r-rw child"><span>'+$(this).attr('name')+'</span>&nbsp<i class="fa fa-check"></i></div>';
        });
      $('#liveList').append(append);
    }
    function clearCustom(){
      //clears lists
      $('#customList').empty();
      var append='<div class="r-sb-hd">Flat Carrier</div>';
      $('#customList').append(append);
      //unchecks
      $('#customShippingDiv input:checkbox').prop('checked', false);
      $('#selectAllCustom').prop('checked', false);
    }
    function clearLive(){
      $('#liveList').empty();
      var append='<div class="r-sb-hd">UPS</div>';
      $('#liveList').append(append);
      //unchecks
      $('#liveShippingDiv input:checkbox').prop('checked', false);
      $('#selectAllLive').prop('checked', false);
    }
</script>



<!-- start color quick setting -->

<!-- end color quick setting -->

<!-- start page container -->


<!-- start sidebar menu -->

 <!-- start sidebar menu -->

<!-- start sidebar menu -->

   

    <!-- end sidebar menu -->

  <!-- start page content -->

<!-- end sidebar menu -->

<!-- end sidebar menu -->

<!-- start page content -->


<!-- start---------------------------- -->
    <div class="row">

      <div class="col-md-8">
        <div class="card-box">
                  
                  <div class="card-body ">
                        <div class = "mdl-tabs mdl-js-tabs">
                           <div class = "mdl-tabs__tab-bar tab-left-side">
                              <a href = "#tab1" id="tabBar1" class = "mdl-tabs__tab is-active">Basic</a>
                              <a href = "#tab2" id="tabBar2" class = "mdl-tabs__tab">Optional</a>
                              <a href = "#tab3" id="tabBar3" class = "mdl-tabs__tab">Advance</a>
                           </div>
                           <div class = "mdl-tabs__panel is-active p-t-20" id = "tab1">
                             <div class="card-box">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="container">
                  <p class="text-justify">Once you Create a shipping group in ShipperHQ you will need to apply this shipping group to products in your eCommerce store.<a href="" class="text-primary">How to assign products to shipping groups.</a> </p>
                  <div class="container text-center">
                    <a href="#" class="btn btn-success">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card-box">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="container">
                    <h2 class="h2 text-primary">Name Your Shipping Group</h2>
                    <p class="text-justify">
                      The name you create here will match against the shipping group set on the product listing  in your eCommerce platform. We recommend you use caps just to save spelling typos,they are often easier to see with caps and short names.
                    </p>
                  </div><br>
                  <div class="container">
                    <form  id="form_sample_1" class="form-horizontal">
                      <div class="form-group row ss-item-required">
                          <label class="col-md-3" for="simpleFormCappedamount">Name: <span class="required"> * </span></label>
                          <input type="text"  name="Group  name" data-required="1" class="col-md-6 form-control " id="name"/>
                          <!-- <p class="col-md-12 pull-right">
                            will match against shipping group set on product listing
                          </p> -->
                        
                      </div>
                      <div class="form-group row">
                          <label class="col-md-3">Description (Optional):</label> 
                          <textarea style="height: 100px" class="form-control col-md-6" id="internalDescription"></textarea> 
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card-box">
            <div class="card-body">
              <div class="row">
                <div class="col-md-5 offset-md-5">
                  <button class="btn btn-primary btn-lg" onclick="tab2()">Next</button>
                </div>
              </div>
            </div>
          </div>
        </div>
                           </div>
                           <div class = "mdl-tabs__panel p-t-20" id = "tab2">
                               <div class="card-box">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="container">
                  <p class="text-justify">
                    <span style="color: red">Please Note: </span> Restriction Applied to a shipping group will take effect regardless of the other shipping group in the cart. Shipping rules should be used if you need to use different methods when there is different combination of shipping group in the cart.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card-box">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="container">
                    <h2 class="h2 text-primary">Restrict to Specific Shipping Method</h2>
                    <p class="text-justify">
                      Below, Select the Shipping Method to Allow if this Shipping Group is in the cart.<br> Read more about <a href="">why you would want to restrict specific methods</a>
                    </p>
                  </div><br>
                  <div class="container">
                    <form  id="form_sample_1" class="form-horizontal">
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label class="" for="simpleFormCappedamount">Custom Shipping Method <span class="required"> * </span></label>
                          <input type="text" disabled="true" name="name" data-required="1" class="form-control " />
                          <br>
                          <div class="results">
                            <div class="r-hd">
                              <span>Selected Methods</span>
                              <a onclick="clearCustom()">clear all</a>
                            </div>
                            <div class="list" id="customList">
                              <div class="r-sb-hd">
                                Flat Carrier
                              </div>
                              <!-- <div class="r-rw child">
                                <span>Fixed</span>
                                <a><i class="fa fa-close"></i></a>
                              </div> -->
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="">Live Shipping Methods</label> 
                          <input type="text" disabled="true" name="name" data-required="1" class="form-control " />
                          <br>
                          <!-- <p>{Looks After Add Method}</p> -->
                          <div class="results">
                            <div class="r-hd">
                              <span>Selected Methods</span>
                              <a onclick="clearLive()">clear all</a>
                            </div>
                            <div class="list" id="liveList">
                              <div class="r-sb-hd">
                                UPS
                              </div>
                              <!-- <div class="r-rw child">
                                <span>Fixed</span>
                                <a><i class="fa fa-close"></i></a>
                              </div> -->
                            </div>
                          </div>
                        </div>
                        
                      </div>
                       <div class="form-group row">
                        <div class="col-md-6">
                          <input type="button" value="Add Method" class="btn btn-primary pull-left" data-toggle="modal" data-target="#customShippingModal" />
                        </div>
                        <div class="col-md-6"> 
                          <input type="button" value="Add Method" class="btn btn-primary pull-left" data-toggle="modal" data-target="#liveShippingModal"/>
                        </div>  
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
                  <div class="container">
                    <h2 class="h2 text-primary">Restrict to Specific Destination</h2>
                    <p class="text-justify">
                      Example you may only want to allow this shipping group to domestic zones.<br>You Only need to set this if constraining over and above what you have set at career level.
                    </p>
                  </div><br>
                  <div class="container">
                    <form  id="form_sample_1" class="form-horizontal">
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label class="" for="simpleFormCappedamount">Zone <span class="required"> * </span></label>
                          <select class="form-control" id="zoneList">
                            <?php
                            foreach ($zones as $zone) {
                              echo '<option value="'.$zone["id"].'">  '.$zone["zone_name"].'    </option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

        <div class="col-md-12">
          <div class="card-box">
            <div class="card-body">
              <div class="row">
                <div class="col-md-5 offset-md-5">
                  <button class="btn btn-primary btn-lg" onclick="tab3()">Next</button>
                </div>
              </div>
            </div>
          </div>
        </div>
                           </div>
                           <div class = "mdl-tabs__panel p-t-20" id = "tab3">
                                                   <div class="card-box">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="container">
                  <p class="text-justify">
                    Advance Setting.If unsure Please ignore !
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card-box">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="container">
                    <form  id="form_sample_1" class="form-horizontal">
                      <div class="form-group row">
                        <div class="col-md-12">
                          
                          <div class="checkbox checkbox-icon-black">
                                                    <input id="SKUBased" type="checkbox">
                                                    <label class="h6" for="SKUBased">
                                                       SKU Shipping Based Group
                                                    </label>
                                                   </div>
                                                </div>
                                                   <div class="col-md-12">
                                                     <p>When set will look for this shipping group name within SKU for example- Sample</p>
                                                  </div>
                        
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <div class="checkbox checkbox-icon-black">
                                                    <input id="excludeCarrierWeight" type="checkbox">
                                                    <label class="h6" for="excludeCarrierWeight">
                                                       Exclude from Carrier Weight Threshold Checks
                                                    </label>
                                                   </div>
                                                </div>
                                                   <div class="col-md-12">
                                                     <p>Only Use if you want the Carrier to ignore When Considering min/max weight threshold</p>
                                                  </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label>Freight Class</label>
                          <select id="freightClass" class="form-control">
                            <option>4</option>
                            <option>6</option>
                            <option>8</option>
                            <option>10</option>
                          </select>
                        </div>
                      </div>
                        <br><br>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <div class="checkbox checkbox-icon-black">
                                                    <input id="mustShipFreight" type="checkbox">
                                                    <label class="h6" for="mustShipFreight">
                                                       Must Ship Freight
                                                    </label>
                                                   </div>
                                                    <div class="col-md-12">
                                                     <p>When Set the Whole Cart is forced to ship via Frieght</p>
                                                  </div>
                                                </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card-box">
            <div class="card-body">
              <div class="row">
                <div class="col-md-5 offset-md-5">
                  <button class="btn btn-primary btn-lg" onclick="saveGroup()">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
                           </div>
                        </div>
                  </div>
                </div>
      </div>
      <div class="col-md-4">
        <div class="card-box">
          <div class="card-body">
            <div class="container">
              <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs</h2>
              <ul style="padding: 0px;">
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Setting Up and Using Groups </a></li>
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Setting Up Free Shipping for a Shipping Group </a></li>
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Restricting Shipping Methods by Shipping Group</a></li>
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Setting Fixed Shipping Rates for a Shipping Group</a></li>
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Using Shipping Groups with Table Rate Carriers</a></li>
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Assigning Products to Shipping Group in Shopify</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- end-=------------------------------------- -->




</div>

<!-- end page content -->

<!-- start chat sidebar -->

<!-- end chat sidebar -->

<!-- end page container -->

<!-- start footer -->


<!-- end footer -->

</div>

<!-- start js include path -->

    <!-- modal for custome shipping  -->
<div class="modal" id="customShippingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Custom Shipping Methods Assigned</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="addCustoms()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" placeholder="Search" class="form-control" name="">
          </div>
        </div>
        <div class="row">
          
          <div class="col-md-12">
            <div class="list"><div class="slct-all opt"><input type="checkbox" id="selectAllCustom"> Select All</div>
              <div id="customShippingDiv">
                <div><h5>Flat Carrier</h5><div class="opt child">
                    <input type="checkbox" id="groundCheckbox" name="Flat Rate: Ground" > 
                    <div><span>Ground</span></div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" onclick="addCustoms()"> Done</button>
      </div>
</div>
</div>
</div>
<!-- modal for live shipping -->
<div class="modal" id="liveShippingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Live Shipping Methods Assigned</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="addLive()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" placeholder="Search" class="form-control" name="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="list">
              <div class="slct-all opt">
                <input type="checkbox" id="selectAllLive"> 
                Select All
              </div>
              <div id="liveShippingDiv">
                <div>
                  <h5>UPS</h5>
                  <div class="opt child">
                    <input type="checkbox" name="UPS GROUND"> 
                    <div>
                      <span>UPS GROUND</span>
                    </div>
                  </div>
                  <div class="opt child">
                    <input type="checkbox" name="UPS NEXYDAY AIR"> 
                    <div>
                      <span>UPS NEXYDAY AIR</span>
                    </div>
                  </div>
                  <div class="opt child">
                    <input type="checkbox" name="UPS SECOND DAY AIR"> 
                    <div>
                      <span>UPS SECOND DAY AIR</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" onclick="addLive()"> Done</button>
      </div>
    </div>
</div>
</div>
<!-- end js include path -->

 <!-- Modal for Add Box -->



  <!-- Modal for Add Box -->

  <!-- Modal for Edit Box -->