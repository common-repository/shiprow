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
//notification
wp_enqueue_style( 'notification-css' );
wp_enqueue_script( 'notification-js' );
//confirmbox
wp_enqueue_script( 'confirmbox-js' );

//shipping rule css and js
wp_enqueue_style( 'material-indigo-pink-css' );
wp_enqueue_style( 'icon-css' );
wp_enqueue_script( 'material.min-js' );


global $wpdb;
if(isset($_GET['id']) AND !empty($_GET['id'])){
        $id=sanitize_text_field($_GET['id']);
        $shipping_rules_query = "SELECT * FROM {$wpdb->prefix}shipping_rules  WHERE id=$id";
        $rule = $wpdb->get_results($shipping_rules_query,ARRAY_A);
        if(count($rule)>0){
            $rule=$rule[0];
            //decoding  json variables
            $rule['custom_shipping_methods']=json_decode($rule['custom_shipping_methods'],true);
            $rule['live_shipping_methods']=json_decode($rule['live_shipping_methods'],true);

            $rule['in_order_to']=json_decode($rule['in_order_to']);

            

      
      }else{
            $rule=NULL;
        }
    }else{
        $rule=NULL;
    }
$query="SELECT * FROM {$wpdb->prefix}store_enabled_carriers";
$enabledCarriersTbl=$wpdb->get_results($query,ARRAY_A);
$enabledCarriers=array();
foreach ($enabledCarriersTbl as $value) {
 $enabledCarriers[]=$value['carrier_id'];
}

?>
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
  input.select2-search__field{
    width: 100% !important;
    height: 39px !important;
}
span.select2.select2-container.select2-container--bootstrap{
  width: 100% !important;
}
input.select2-search__field {
    max-width: 116px;
}
</style>



<script type="text/javascript">

  //for shipping rule
  jQuery(document).ready(function($) {
  $('#selectAllCustom').on('click',function(){
          if($('#selectAllCustom').prop('checked')){
            $('#customShippingDiv input:checkbox').prop('checked', true);
          }else{
            $('#customShippingDiv input:checkbox').prop('checked', true);
          }
        });
        $('#selectAllLive').on('click',function(){
          if($('#selectAllLive').prop('checked')){
            $('#liveShippingDiv input:checkbox').prop('checked', true);
          }else{
            $('#liveShippingDiv input:checkbox').prop('checked', false);
          }
        });
            
        $('#iWantSelect').on('change',function(){
          var value=$('#iWantSelect').val();
          if(value=='modify'){
            $('#modifyPriceRow').show();
          }else{
            $('#modifyPriceRow').hide();
          }
        });

        //adding selected live methods to dialog
        $('#liveList').empty();
    var append='<div class="r-sb-hd"></div>';
    var selectedCustom = [];
    $('#liveShippingDiv input:checked').each(function() {
      append+='<div class="r-rw child"><span>'+$(this).parent().find('span').text()+'</span>&nbsp<i class="fa fa-check"></i></div>';
    });
    $('#liveList').append(append);
    //end for shipping  rule

  });
   
     
   

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


    function tab4(){
      $("#tabBar3").removeClass('is-active');
      $("#tabBar4").addClass('is-active');
      $("#tab3").removeClass('is-active');
      $("#tab4").addClass('is-active');
      
    }

    function addCustoms()
    {
      $('#customList').empty();
      var append='<div class="r-sb-hd"></div>';
      var selectedCustom = [];
        $('#customShippingDiv input:checked').each(function() {
          append+='<div class="r-rw child"><span>'+$(this).attr('name')+'</span>&nbsp<i class="fa fa-check"></i></div>';
        });
      $('#customList').append(append);
    }
     function addLive()
    {
      $('#liveList').empty();
      var append='<div class="r-sb-hd"></div>';
      var selectedCustom = [];
        $('#liveShippingDiv input:checked').each(function() {
          append+='<div class="r-rw child"><span>'+$(this).parent().find('span').text()+'</span>&nbsp<i class="fa fa-check"></i></div>';
        });
      $('#liveList').append(append);
    }
    function clearCustom(){
      //clears lists
      $('#customList').empty();
      var append='<div class="r-sb-hd"></div>';
      $('#customList').append(append);
      //unchecks
      $('#customShippingDiv input:checkbox').prop('checked', false);
      $('#selectAllCustom').prop('checked', false);
    }
    function clearLive(){
      $('#liveList').empty();
      var append='<div class="r-sb-hd"></div>';
      $('#liveList').append(append);
      //unchecks
      $('#liveShippingDiv input:checkbox').prop('checked', false);
      $('#selectAllLive').prop('checked', false);
    }
      
    </script>
    
  



  

<!-- start-------------------------------- -->
<div class="row">

      <div class="col-md-8">
        <div class="card-box">
          <div class="card-body ">
            <div class = "mdl-tabs mdl-js-tabs">
              <div class = "mdl-tabs__tab-bar tab-left-side">
                <a href = "#tab1" class = "mdl-tabs__tab is-active" id="tabBar1">Basic</a>
                <a href = "#tab2" class = "mdl-tabs__tab" id="tabBar2">Actions</a>
                <a href="#tab3" class="mdl-tabs__tab" id="tabBar3">Conditions</a>
                <a href = "#tab4" class = "mdl-tabs__tab" id="tabBar4">Advance</a>

              </div>
              <div class = "mdl-tabs__panel is-active p-t-20" id = "tab1">
                <div class="card-box">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="container">
                          <p class="text-justify">
                            <b>Please go through above tab to setup your Shipping Rule</b>
                            <ol>
                              <li>Name your Rule and Choose the Shipping Method the action will apply to.</li>
                              <li>Specify the action to perform</li>
                              <li>Set the Condition to meet for the rule action to apply</li>
                            </ol>
                            Advance Settings are optional.
                          </p>
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
                              <div class="form-group row ss-item-required">
                                <label class="col-md-4" for="simpleFormCappedamount">Shipping Rule Name: <span class="required"> * </span></label>
                                <input type="text"  name="Rule Name" value="<?= (isset($rule['rule_name'])?$rule['rule_name']:'')?>" data-required="1" class="col-md-6 form-control" id="ruleName"/>
                          <!-- <p class="col-md-12 pull-right">
                            will match against shipping group set on product listing
                          </p> -->

                        </div>
                        <div class="form-group row">
                          <label class="col-md-4">Description (Optional):</label> 
                          <textarea rows="4" class="form-control col-md-6" id="internalDescription"><?= (isset($rule['internal_description'])?$rule['internal_description']:' ')?></textarea> 
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
                  <div class="container">
                    <form  id="form_sample_1" class="form-horizontal">
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label class="" for="simpleFormCappedamount">Custom Shipping Method <span class="required"> * </span></label>
                          <!-- <input type="text" disabled="true" name="name" data-required="1" class="form-control " /> -->
                          <br>
                          <div class="results">
                            <div class="r-hd">
                              <span>Selected Methods</span>
                              <a onclick="clearCustom()">clear all</a>
                            </div>
                            <div class="list" id="customList">
                              <div class="r-sb-hd">
                                <!-- Flat Carrier -->
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="">Live Shipping Methods</label> 
                          <!-- <input type="text" disabled="true" name="name" data-required="1" class="form-control " /> -->
                          <br>
                          <!-- <p>{Looks After Add Method}</p> -->
                          <div class="results">
                            <div class="r-hd">
                              <span>Selected Methods</span>
                              <a onclick="clearLive()">clear all</a>
                            </div>
                            <div class="list" id="liveList">
                              <div class="r-sb-hd">
                                <!-- UPS -->
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
          <div class="col-md-12">
            <div class="card-box">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-5 offset-md-5">
                    <button type="button" class="btn btn-primary btn-lg" onclick="tab2()">Next</button>
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
                      <b>Specify what action should be taken if this rule applies.</b>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="container">
              <form  id="form_sample_1" class="form-horizontal">
                <h2 class="h2 text-primary">Action to Perform</h2>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="" for="simpleFormCappedamount">I Want to <span class="required"> * </span></label>
                    <select class="form-control" id="iWantSelect">
                      <option value="hide" 
                        <?= ((isset($rule['action_to_perform']) AND $rule['action_to_perform']=='hide')?'selected':'')?>
                        >
                      Hide my selected Shipping Methods
                    </option>
                      <option value="modify" 
                        <?= ((isset($rule['action_to_perform']) AND $rule['action_to_perform']=='modify')?'selected':'')?>
                      >
                      Modify the Price of selected Shipping Methods
                  </option>
                    </select>
                  </div>
                </div>
                <div id="modifyPriceRow" style="display: <?= ((isset($rule['action_to_perform']) AND $rule['action_to_perform']!='hide')?'':'none')?>;">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="" for="simpleFormCappedamount">In Order to <span class="required"> * </span></label>
                      <select class="form-control" id="inOrder1">
                        <option value="overide_rates" <?=((isset($rule['in_order_to'][0]) AND $rule['in_order_to'][0]=='overide_rates')?'selected':'')?>>Overide Rates</option>
                        <option value="surcharge_or_discount" <?= ((isset($rule['in_order_to'][0]) AND $rule['in_order_to'][0]=='surcharge_or_discount')?'selected':'')?>>Surcharge or Discount Rates</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <select class="form-control" id="inOrder2">
                        <option value="by_flat_rate"<?= ((isset($rule['in_order_to'][1]) AND $rule['in_order_to'][1]=='by_flat_rate')?'selected':'')?>>By a Flat Rate</option>
                        <option value="by_percentage"<?= ((isset($rule['in_order_to'][1]) AND $rule['in_order_to'][1]=='by_percentage')?'selected':'')?>>By a Percentage</option>
                        <option value="by_flat_and_percentage"<?= ((isset($rule['in_order_to'][1]) AND $rule['in_order_to'][1]=='by_flat_and_percentage')?'selected':'')?>>By a Flat Rate & Percentage</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row ">
                    <div class="col-md-6">
                      <input type="text" class="form-control " placeholder="$400" name="" id="inOrder3" name="Order Rate" value="<?= (isset($rule['in_order_to'][2])?$rule['in_order_to'][2]:'')?>">
                      <p>A value of 0.00 is a Free Shipping</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="" for="simpleFormCappedamount">And Apply this Rate.. <span class="required"> * </span></label>
                      <select class="form-control" id="applyRateSelect">
                        <option value="per_cart" <?= ((isset($rule['apply_this_rate']) AND $rule['apply_this_rate']=='per_cart')?'selected':'')?>>Per Cart</option>
                        <option value="per_shipping_group" <?= ((isset($rule['apply_this_rate']) AND $rule['apply_this_rate']=='per_shipping_group')?'selected':'')?>>Per Shipping Group</option>
                        <option value="each_item_in_shipping_group"<?= ((isset($rule['apply_this_rate']) AND $rule['apply_this_rate']=='each_item_in_shipping_group')?'selected':'')?>>Each item with in Shipping Group</option>
                        <option value="each_box_in_shipping_group"<?= ((isset($rule['apply_this_rate']) AND $rule['apply_this_rate']=='each_box_in_shipping_group')?'selected':'')?>>Each box with in Shipping Group</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6"> 
                      <label>Apply To These Shipping Groups</label>
                          <select  class="form-control select2-multiple" multiple id="applyShippingGroups">
                             <option <?= ((isset($rule['apply_shipping_groups']) AND $rule['apply_shipping_groups']=='Large')?'selected':'')?>>Large</option>
                             <option <?= ((isset($rule['apply_shipping_groups']) AND $rule['apply_shipping_groups']=='Medium')?'selected':'')?>>Medium</option>
                             <option <?= ((isset($rule['apply_shipping_groups']) AND $rule['apply_shipping_groups']=='Small')?'selected':'')?>>Small</option>
                             <option <?= (($rule['apply_shipping_groups']=='All Shipping groups')?'selected':'')?>>All Shipping groups</option>
                          </select>
                                              
                            

                          </div>
                  </div>
                </div><!--hide div end here-->
              </form>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card-box">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-5 offset-md-5">
                    <button type="button" class="btn btn-primary btn-lg" onclick="tab3()">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class = "mdl-tabs__panel p-t-20" id = "tab3">
          <div class="col-md-12">
            <div class="container">
              <form  id="form_sample_1" class="form-horizontal">
                <h2 class="h2 text-primary">Perform the Action When..</h2>
                <div class="form-group row ss-item-required">
                  <div class="col-md-6">
                    <label class="" for="simpleFormCappedamount">Weight/Price/Quantity is<span class="required"> * </span></label>
                    <input type="text" list="WPQIs" class="form-control " name="Weight/Price/Quantity" value="<?= (isset($rule['weight_price_quantity'])?$rule['weight_price_quantity']:'')?>" id="WPQIs"/>
                      <datalist id="WPQIs">
                        <option>Cart Weight < 500 lbs</option>
                      </datalist>
                  </div>
                </div>
                <div class="form-group row ss-item-required">
                  <div class="col-md-6">
                    <label class="" for="simpleFormCappedamount">Zone Include <span class="required"> * </span></label>
                    <input type="text" list="zoneInclude"  class="form-control" name="Zone Include" id="zoneIncludeId" value="<?=(isset($rule['zone_include'])?$rule['zone_include']:'' )?>" multiple/>
                      <datalist id="zoneInclude">
                        <option>US</option>
                        <option>US 48</option>
                        <option>US APO</option>
                        <option>US POBox</option>
                      </datalist>
                    <p>Set a zone if you want to restrict where this rules applies</p>
                  </div>
                </div>
                <div class="form-group row ss-item-required">
                  <div class="col-md-6">
                    <label class="" for="simpleFormCappedamount">Zones Do Not Inlcude <span class="required"> * </span></label>
                    <input type="text" list="zoneDoNotInclude" class="form-control" name="Zones Do Not Inlcude" id="zoneDoNotIncludeId" value="<?=(isset($rule['zone_donot_include'])?$rule['zone_donot_include']:'' )?>"/>
                      <datalist id="zoneDoNotInclude">
                        <option>US</option>
                        <option>US 48</option>
                        <option>US APO</option>
                        <option>US POBox</option>
                      </datalist>
                    <p>**In most cases you donot need to include this**</p>
                  </div>
                </div>
                <div class="form-group row ss-item-required">
                  <div class="col-md-6">
                    <label class="" for="simpleFormCappedamount">Shipping Groups Include All <span class="required"> * </span></label>
                    <input type="text" list="shippingGroupAll" class="form-control" name="Shipping Groups Include All" id="shippingGroupsAllId" value="<?=(isset($rule['shipping_groups_include_all'])?$rule['shipping_groups_include_all']:'' )?>"/>
                      <datalist id="shippingGroupAll">
                        <option>Large</option>
                        <option>Medium</option>
                        <option>Small</option>
                      </datalist>
                    <p>ALL selected shipping groups must be present for this rule to apply</p>
                  </div>
                </div>
                <div class="form-group row ss-item-required">
                  <div class="col-md-6">
                    <label class="" for="simpleFormCappedamount">Shipping Groups Include One or More <span class="required"> * </span></label>
                    <input type="text" list="shippingGroupOneOrMore" class="form-control" name="Shipping Groups Include One or More" id="shippingGroupOneOrMoreId"  value="<?=(isset($rule['shipping_groups_include_one_or_more'])?$rule['shipping_groups_include_one_or_more']:'' )?>"/>
                      <datalist id="shippingGroupOneOrMore">
                        <option>Large</option>
                        <option>Medium</option>
                        <option>Small</option>
                      </datalist>
                    <p>One or More Of these Shipping groups must be present for this rule to apply</p>
                  </div>
                </div>
                <div class="form-group row ss-item-required">
                  <div class="col-md-6">
                    <label class="" for="simpleFormCappedamount">Shipping Groups DO NOT Include<span class="required"> * </span></label>
                   <input type="text" list="shippingGroupDoNot" class="form-control" name="Shipping Groups DO NOT Include" id="shippingGroupsDoNotId"  value="<?=(isset($rule['shipping_groups_donot_include'])?$rule['shipping_groups_donot_include']:'' )?>"/>
                      <datalist id="shippingGroupDoNot">
                        <option>Large</option>
                        <option>Medium</option>
                        <option>Small</option>
                      </datalist>
                  </div>
                </div>
                <div class="form-group row ss-item-required">
                  <div class="col-md-6">
                    <label class="" for="simpleFormCappedamount">Customer Groups Include<span class="required"> * </span></label>
                    <input type="text" list="customerGroupsInclude" class="form-control" name="Customer Groups Include" id="customerGroupsIncludeId" value="<?=(isset($rule['customer_groups_include'])?$rule['customer_groups_include']:'' )?>"/>
                      <datalist id="customerGroupsInclude">
                        <option>Logged In</option>
                        <option>Not Logged In</option>
                        <option>Retail</option>
                      </datalist>
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
                    <button type="button" class="btn btn-primary btn-lg" onclick="tab4()">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class = "mdl-tabs__panel p-t-20" id = "tab4">
          <div class="card-box">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="container">
                    <p class="text-justify">
                      Advance Filtering Conditions that you see here can be modified in the Rule Setting!
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
                        <h2 class="h2 text-primary">Valid Dates</h2>
                      </div><br>
                      <div class="container">
                        <form id="form_sample_1" class="form-horizontal">
                          <div class="form-group row ss-item-required">
                            <div class="col-md-6">
                              <label class="" for="simpleFormCappedamount">Valid From<span class="required"> * </span></label>
                              <input type="date" data-required="1" class="form-control" name="Valid From" id="validFrom" value="<?=(isset($rule['valid_from'])?$rule['valid_from']:'' )?>">
                            </div>
                            <div class="col-md-6">
                              <label class="">Valid To</label> 
                              <input type="date"   data-required="1" class="form-control" name="Valid To" id="validTo" value="<?=(isset($rule['valid_to'])?$rule['valid_to']:'' )?>">
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
                      <button  id="submitBtn" class="btn btn-primary btn-lg" onclick="saveRule(<?=(isset($rule['id'])?$rule['id']:NULL) ?>)">Submit</button>
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
            <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Configuring Shipping Rule </a></li>
            <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Setting up Custom Rates using Shipping Rules </a></li>
            <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Using Shipping Groups</a></li>
            <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Using Shipping Filters</a></li>
            <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Troubleshooting Shipping Rules</a></li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end------------------------------------------ -->


  <!-- end page content -->
  <!-- start chat sidebar -->
  <!-- end chat sidebar -->

  <!-- end page container -->
  <!-- start footer -->

  <!-- start js include path -->


  <!-- end js include path -->
  <!-- Modal for Add Warehouse -->

  <!-- Modal for Add Warehouse -->
  <!-- Modal for Edit Warehouse -->

  <!-- Modal for Add Box -->
 
  <!-- Modal for Add Box -->
  <!-- Modal for Edit Box -->


 <!-- Modal for Choose Service -->
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
            <!-- <input type="text" placeholder="Search" class="form-control" name=""> -->
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

<!-- Live Shipping Modal -->
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
            <!-- <input type="text" placeholder="Search" class="form-control" name=""> -->
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
                <?php if(in_array(1,$enabledCarriers)){ ?>
                  <div>
                    <h5>FedEx LTL</h5>
                    <div class="opt child">
                      <input type="checkbox" id= "FEDEX_FREIGHT_ECONOMY" name="fedex_ltl" 
                        <?=((isset($rule['live_shipping_methods']['fedex_ltl']) AND in_array('FEDEX_FREIGHT_ECONOMY',$rule['live_shipping_methods']['fedex_ltl']))?'checked':'')?>
                      > 
                      <div>
                        <span>Economy</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "FEDEX_FREIGHT_PRIORITY" name="fedex_ltl" 
                        <?=((isset($rule['live_shipping_methods']['fedex_ltl']) AND in_array('FEDEX_FREIGHT_PRIORITY',$rule['live_shipping_methods']['fedex_ltl']))?'checked':'')?>
                      > 
                      <div>
                        <span>Priority</span>
                      </div>
                    </div>
                  </div>
              <?php } ?>
              <?php if(in_array(6,$enabledCarriers)){ ?>
                  <div>
                    <h5>FedEx small Domestic</h5>
                    <div class="opt child">
                      <input type="checkbox" id= "GROUND_HOME_DELIVERY" name="fedex_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_domestic']) AND in_array('GROUND_HOME_DELIVERY',$rule['live_shipping_methods']['fedex_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx Home Delivery</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "FEDEX_GROUND_DOMESTIC" name="fedex_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_domestic']) AND in_array('FEDEX_GROUND_DOMESTIC',$rule['live_shipping_methods']['fedex_small_domestic']))?'checked':'')?>
                      >   
                      <div>
                        <span>FedEx Ground</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "FEDEX_EXPRESS_SAVER" name="fedex_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_domestic']) AND in_array('FEDEX_EXPRESS_SAVER',$rule['live_shipping_methods']['fedex_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx Express Saver</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "FEDEX_2_DAY" name="fedex_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_domestic']) AND in_array('FEDEX_2_DAY',$rule['live_shipping_methods']['fedex_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx 2 Day</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "FEDEX_2_DAY_AM" name="fedex_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_domestic']) AND in_array('FEDEX_2_DAY_AM',$rule['live_shipping_methods']['fedex_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx 2 Day AM</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "STANDARD_OVERNIGHT" name="fedex_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_domestic']) AND in_array('STANDARD_OVERNIGHT',$rule['live_shipping_methods']['fedex_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx Standard Overnight</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "PRIORITY_OVERNIGHT"  name="fedex_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_domestic']) AND in_array('PRIORITY_OVERNIGHT',$rule['live_shipping_methods']['fedex_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx Priority Overnight</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "FIRST_OVERNIGHT" name="fedex_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_domestic']) AND in_array('FIRST_OVERNIGHT',$rule['live_shipping_methods']['fedex_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx First Overnight</span>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <?php if(in_array(6,$enabledCarriers)){ ?>
                  <div>
                    <h5>FedEx small International</h5>
                    <div class="opt child">
                      <input type="checkbox" id= "INTERNATIONAL_DISTRIBUTION_FREIGHT" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('INTERNATIONAL_DISTRIBUTION_FREIGHT',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx International Distribution Freight</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "INTERNATIONAL_ECONOMY" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('INTERNATIONAL_ECONOMY',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx International Economy</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "INTERNATIONAL_ECONOMY_DISTRIBUTION" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('INTERNATIONAL_ECONOMY_DISTRIBUTION',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx International Economy Distribution</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "INTERNATIONAL_ECONOMY_FREIGHT" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('INTERNATIONAL_ECONOMY_FREIGHT',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx International Economy Freight</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "INTERNATIONAL_FIRST" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('INTERNATIONAL_FIRST',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx International First</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "INTERNATIONAL_PRIORITY" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('INTERNATIONAL_PRIORITY',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx International Priority</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "INTERNATIONAL_PRIORITY_DISTRIBUTION" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('INTERNATIONAL_PRIORITY_DISTRIBUTION',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >   
                      <div>
                        <span>FedEx International Priority Distribution</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "INTERNATIONAL_PRIORITY_FREIGHT" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('INTERNATIONAL_PRIORITY_FREIGHT',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx International Priority Freight</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "PRIORITY_OVERNIGHT" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('PRIORITY_OVERNIGHT',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >   
                      <div>
                        <span>FedEx Priority Overnight</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "STANDARD_OVERNIGHT" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('STANDARD_OVERNIGHT',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >   
                      <div>
                        <span>FedEx Standard Overnight</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "FEDEX_GROUND_INTERNATIONAL" name="fedex_small_international" 
                        <?=((isset($rule['live_shipping_methods']['fedex_small_international']) AND in_array('FEDEX_GROUND_INTERNATIONAL',$rule['live_shipping_methods']['fedex_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>FedEx Standard Ground</span>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <?php if(in_array(2,$enabledCarriers)){ ?>

                  <div>
                    <h5>UPS LTL</h5>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_LTL" name="ups_ltl" 
                        <?=((isset($rule['live_shipping_methods']['ups_ltl']) AND in_array('UPS_LTL',$rule['live_shipping_methods']['ups_ltl']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS</span>
                      </div>
                    </div>
                  </div>
              <?php } ?>
              <?php if(in_array(8,$enabledCarriers)){ ?>
                  <div>
                    <h5>UPS small Domestic</h5>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_GROUND" name="ups_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_domestic']) AND in_array('UPS_GROUND',$rule['live_shipping_methods']['ups_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS Ground</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_2ND_DAY" name="ups_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_domestic']) AND in_array('UPS_2ND_DAY',$rule['live_shipping_methods']['ups_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS 2nd Day Air</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_2ND_DAY_AM" name="ups_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_domestic']) AND in_array('UPS_2ND_DAY_AM',$rule['live_shipping_methods']['ups_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS 2nd Day Air A.M</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_NEXT_DAY_AIR_SAVER" name="ups_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_domestic']) AND in_array('UPS_NEXT_DAY_AIR_SAVER',$rule['live_shipping_methods']['ups_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS Next Day Air Saver</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_NEXT_DAY_AIR" name="ups_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_domestic']) AND in_array('UPS_NEXT_DAY_AIR',$rule['live_shipping_methods']['ups_small_domestic']))?'checked':'')?>
                      >   
                      <div>
                        <span>UPS Next Day Air</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_NEXT_DAY_AIR_EARLY" name="ups_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_domestic']) AND in_array('UPS_NEXT_DAY_AIR_EARLY',$rule['live_shipping_methods']['ups_small_domestic']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS Next Day Air Early</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_THREE_DAY_SELECT" name="ups_small_domestic" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_domestic']) AND in_array('UPS_THREE_DAY_SELECT',$rule['live_shipping_methods']['ups_small_domestic']))?'checked':'')?>
                      >   
                      <div>
                        <span>UPS 3 Day Select</span>
                      </div>
                    </div>
                  </div>
              <?php } ?>
              <?php if(in_array(8,$enabledCarriers)){ ?>

                  <div>
                    <h5>UPS small International</h5>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_STANDARD_INTERNATIONAL" name="ups_small_international" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_international']) AND in_array('UPS_STANDARD_INTERNATIONAL',$rule['live_shipping_methods']['ups_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS Standard</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_WORLDWIDE_EXPEDITED" name="ups_small_international" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_international']) AND in_array('UPS_WORLDWIDE_EXPEDITED',$rule['live_shipping_methods']['ups_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS Worldwide Expedited</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_WORLDWIDE_SAVER" name="ups_small_international" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_international']) AND in_array('UPS_WORLDWIDE_SAVER',$rule['live_shipping_methods']['ups_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS Worldwide Saver</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_WORLDWIDE_EXPRESS" name="ups_small_international" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_international']) AND in_array('UPS_WORLDWIDE_EXPRESS',$rule['live_shipping_methods']['ups_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS Worldwide Express</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_WORLDWIDE_EXPRESS_PLUS" name="ups_small_international" 
                        <?=((isset($rule['live_shipping_methods']['ups_small_international']) AND in_array('UPS_WORLDWIDE_EXPRESS_PLUS',$rule['live_shipping_methods']['ups_small_international']))?'checked':'')?>
                      >  
                      <div>
                        <span>UPS Worldwide Express Plus</span>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <?php if(in_array(3,$enabledCarriers)){ ?>

                  <div>
                    <h5>WWE LTL</h5>
                    <div class="opt child">
                      <input type="checkbox" id= "WWE_LTL" name="wwe_ltl" 
                        <?=((isset($rule['live_shipping_methods']['wwe_ltl']) AND in_array('WWE_LTL',$rule['live_shipping_methods']['wwe_ltl']))?'checked':'')?>
                      >   
                      <div>
                        <span>WWE</span>
                      </div>
                    </div>
                  </div>
              <?php } ?>
              <?php if(in_array(7,$enabledCarriers)){ ?>

                  <div>
                    <h5>WWE small</h5>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_GROUND" name="wwe_small" 
                        <?=((isset($rule['live_shipping_methods']['wwe_small']) AND in_array('UPS_GROUND',$rule['live_shipping_methods']['wwe_small']))?'checked':'')?>
                      >   
                      <div>
                        <span>UPS Ground</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_THREE_DAY_SELECT" name="wwe_small" 
                        <?=((isset($rule['live_shipping_methods']['wwe_small']) AND in_array('UPS_THREE_DAY_SELECT',$rule['live_shipping_methods']['wwe_small']))?'checked':'')?>
                      >   
                      <div>
                        <span>UPS 3 Day Select</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_SECOND_DAY_AIR" name="wwe_small" 
                        <?=((isset($rule['live_shipping_methods']['wwe_small']) AND in_array('UPS_SECOND_DAY_AIR',$rule['live_shipping_methods']['wwe_small']))?'checked':'')?>
                      >   
                      <div>
                        <span>UPS 2nd Day Air</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_SECOND_DAY_AIR_AM" name="wwe_small" 
                        <?=((isset($rule['live_shipping_methods']['wwe_small']) AND in_array('UPS_SECOND_DAY_AIR_AM',$rule['live_shipping_methods']['wwe_small']))?'checked':'')?>
                      >   
                      <div>
                        <span>UPS 2nd Day Air AM</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_NEXT_DAY_AIR_SAVER" name="wwe_small" 
                        <?=((isset($rule['live_shipping_methods']['wwe_small']) AND in_array('UPS_NEXT_DAY_AIR_SAVER',$rule['live_shipping_methods']['wwe_small']))?'checked':'')?>
                      >   
                      <div>
                        <span>UPS Next Day Air Saver</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_NEXT_DAY_AIR" name="wwe_small" 
                        <?=((isset($rule['live_shipping_methods']['wwe_small']) AND in_array('UPS_NEXT_DAY_AIR',$rule['live_shipping_methods']['wwe_small']))?'checked':'')?>
                      >   
                      <div>
                        <span>UPS Next Day Air </span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "UPS_NEXT_DAY_AIR_EARLY" name="wwe_small" 
                        <?=((isset($rule['live_shipping_methods']['wwe_small']) AND in_array('UPS_NEXT_DAY_AIR_EARLY',$rule['live_shipping_methods']['wwe_small']))?'checked':'')?>
                      >    
                      <div>
                        <span>UPS Next Day Air Early</span>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <?php if(in_array(4,$enabledCarriers)){ ?>

                  <div>
                    <h5>ABF LTL</h5>
                    <div class="opt child">
                      <input type="checkbox" id= "ABF_LTL" name="abf_ltl" 
                        <?=((isset($rule['live_shipping_methods']['abf_ltl']) AND in_array('ABF_LTL',$rule['live_shipping_methods']['abf_ltl']))?'checked':'')?>
                      >   
                      <div>
                        <span>ABF</span>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <?php if(in_array(5,$enabledCarriers)){ ?>

                  <div>
                    <h5>R+L</h5>
                    <div class="opt child">
                      <input type="checkbox" id= "standard_service" name="rl" 
                        <?=((isset($rule['live_shipping_methods']['rl']) AND in_array('standard_service',$rule['live_shipping_methods']['rl']))?'checked':'')?>
                      >    
                      <div>
                        <span>Standard Service</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "guranteed_pm" name="rl"  
                        <?=((isset($rule['live_shipping_methods']['rl']) AND in_array('guranteed_pm',$rule['live_shipping_methods']['rl']))?'checked':'')?>
                      >     
                      <div>
                        <span>PM Service</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "guaranteed_am" name="rl"  
                        <?=((isset($rule['live_shipping_methods']['rl']) AND in_array('guaranteed_am',$rule['live_shipping_methods']['rl']))?'checked':'')?>
                      >      
                      <div>
                        <span>AM Service</span>
                      </div>
                    </div>
                    <div class="opt child">
                      <input type="checkbox" id= "guaranteed_hourly" name="rl"  
                        <?=((isset($rule['live_shipping_methods']['rl']) AND in_array('guaranteed_hourly',$rule['live_shipping_methods']['rl']))?'checked':'')?>
                      >      
                      <div>
                        <span>Hourly Window Service</span>
                      </div>
                    </div>
                  </div>
                <?php } ?>

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