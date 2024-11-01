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


?>
<link rel = "stylesheet" 
         href = "https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
      <script src = "https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js">
      </script>
      <link rel = "stylesheet" 
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
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

    
    <script type="text/javascript">
  function saveFilter(){
    var required=false;
    var fields = $(".ss-item-required").find("select, textarea, input").serializeArray();
    $.each(fields, function(i, field) {
      if (!field.value){
        notificationAlert('Error','info',field.name +' cant be empty');
        required=true;
        return false;
      }
     });
    var name=$('#name').val();
    var internalDescription=$('#internalDescription').val();
    var appliesTo=$('#appliesTo').val();
    var shippingGroupAppliesTo=$('#shippingGroupAppliesTo').val();

    var priceFilter=$('#priceFilter').val();
    var priceFrom=$('#priceFrom').val();
    var priceTo=$('#priceTo').val();
    var noMaxPrice=+$('#noMaxPrice').is(':checked');
    var filterByPrice={};
    filterByPrice['set_filter_to']=priceFilter;
    filterByPrice['from']=priceFrom;
    filterByPrice['to']=priceTo;
    filterByPrice['no_max']=noMaxPrice;


    var weightFilter=$('#weightFilter').val();
    var weightFrom=$('#weightFrom').val();
    var weightTo=$('#weightTo').val();
    var noMaxWeight=+$('#noMaxWeight').is(':checked');
    var filterByWeight={};
    filterByWeight['set_filter_to']=weightFilter;
    filterByWeight['from']=weightFrom;
    filterByWeight['to']=weightTo;
    filterByWeight['no_max']=noMaxWeight;

    var quantityFilter=$('#quantityFilter').val();
    var quantityFrom=$('#quantityFrom').val();
    var quantityTo=$('#quantityTo').val();
    var noMaxQuantity=+$('#noMaxQuantity').is(':checked');
    var filterByQuantity={};
    filterByQuantity['set_filter_to']=quantityFilter;
    filterByQuantity['from']=quantityFrom;
    filterByQuantity['to']=quantityTo;
    filterByQuantity['no_max']=noMaxQuantity;

    //turning array into object so can convert it into json
    var filter_price=[];
    var filter_weight=[];
    var filter_quantity=[];
    filter_price.push(filterByPrice);
    filter_weight.push(filterByWeight);
    filter_quantity.push(filterByQuantity);

    filterByPrice=JSON.stringify(filter_price);
    filterByWeight=JSON.stringify(filter_weight);
    filterByQuantity=JSON.stringify(filter_quantity);
    if(!required){
      $.ajax({
          url:'admin-ajax.php',
          type:'POST',
          data:{action:'shipping_filter_add',
              name:name,
              internal_description:internalDescription,
              applies_to:appliesTo,
              shipping_group_applies_to:shippingGroupAppliesTo,
              filter_price:filterByPrice,
              filter_weight:filterByWeight,
              filter_quantity:filterByQuantity,
            },
          dataType:'text',
          success:function(response){
            notificationAlert('Success!','success','Successfully Added');
          window.location.href='admin.php?page=sp-settings&tab=shipping_filters';
          },
          error: function(XMLHttpRequest, textStatus, errorThrown){
            alert(errorThrown);
          }

      });
    }

  }
    </script>




<!-- start color quick setting -->

<!-- end color quick setting -->

<!-- start page container -->

<div class="page-container">

<!-- start sidebar menu -->

 <!-- start sidebar menu -->

<!-- start sidebar menu -->


    <!-- end sidebar menu -->

  <!-- start page content -->

<!-- end sidebar menu -->

<!-- end sidebar menu -->

<!-- start page content -->

<div class="row">

<div class="col-md-12">

<div class="tabbable-line">

   

    <div class="tab-content">

      <!-- start---------------------- -->
    <div class="row">
      <div class="col-md-8">
        <div class="card-box">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="container">
                  <p class="text-justify"><b>Please Note:</b> A filter must be applied to a Carrier Rule in order to be effective. If you set conditions for more than one unit type in the same filter. All Conditions for each unit in the filter will need to be met in order for the filter to apply.</p>
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
                    <h2 class="h2 text-primary">Overview</h2>
                  </div><br>
                  <div class="container">
                    <form  id="form_sample_1" class="form-horizontal">
                      <div class="form-group row ss-item-required">
                          <label class="col-md-3" for="simpleFormCappedamount">Name: <span class="required"> * </span></label>
                          <input type="text"  name="filter name" data-required="1" class="col-md-6 form-control " /id="name">
                        
                        
                      </div>
                      <div class="form-group row">
                          <label class="col-md-3">Description (Optional):</label> 
                          <textarea style="height: 100px" class="form-control col-md-6" id="internalDescription"></textarea> 
                      </div>
                      <div class="form-group row">
                          <label class="col-md-3" for="simpleFormCappedamount">Filter Applies to:</label> 
                          <select id="appliesTo" class="form-control col-md-6">
                            <option>Whole Cart</option>
                          </select>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-3" for="simpleFormCappedamount">Shipping Group Filter Applies to:</label> 
                          <select id="shippingGroupAppliesTo" class="form-control col-md-6">
                            <option>Large</option>
                            <option>Small</option>
                            <option>To All Shipping Group</option>
                          </select> 
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
                <div class="col-md-12">
                  <div class="container">
                    <h2 class="h2 text-primary">Filter By Price</h2>
                  </div><br>
                  <div class="container">
                    <form  id="form_sample_1" class="form-horizontal">
                      <div class="form-group row ss-item-required">
                        <div class="col-md-3">
                          <label class="" for="simpleFormCappedamount">Set Filter Price:<span class="required">*</span></label>
                          <select class="form-control"id="priceFilter">
                              <option>Do Nothing</option>
                              <option>Apply To A Range</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                          <label for="simpleFormCappedamount">From <br>&nbsp</label>
                          <input class="form-control" type="text" placeholder="$400" name="price From" id="priceFrom">
                        </div>
                        <div class="col-md-3">
                          <label for="simpleFormCappedamount">To <br>&nbsp</label>
                          <input class="form-control" type="text" placeholder="$400" name="price To" id="priceTo">
                        </div>
                        <div class="col-md-3">
                          <label>No Maximum Price</label>
                          <div class="checkbox text-center checkbox-icon-black">
                                                    <input id="noMaxPrice" type="checkbox">
                                                    <label for="noMaxPrice">
                                                       
                                                    </label>
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
                <div class="col-md-12">
                  <div class="container">
                    <h2 class="h2 text-primary">Filter By Weight</h2>
                  </div><br>
                  <div class="container">
                    <form  id="form_sample_1" class="form-horizontal">
                      <div class="form-group row ss-item-required">
                        <div class="col-md-3">
                          <label class="" for="simpleFormCappedamount">Set Filter Weight: <span class="required"> * </span></label>
                          <select class="form-control"id="weightFilter">
                              <option>Do Nothing</option>
                              <option>Apply To A Range</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                          <label for="simpleFormCappedamount">From<br>&nbsp</label>
                          <input class="form-control" type="text" placeholder="$400" name="weight From" id="weightFrom">
                        </div>
                        <div class="col-md-3">
                          <label for="simpleFormCappedamount">To<br>&nbsp</label>
                          <input class="form-control" type="text" placeholder="$400" name="weight To" id="weightTo">
                        </div>
                        <div class="col-md-3">
                          <label style="font-size: 14px;">No Maximum Weight</label>
                          <div class="checkbox text-center checkbox-icon-black">
                                                    <input id="noMaxWeight" type="checkbox">
                                                    <label for="noMaxWeight">
                                                       
                                                    </label>
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
                <div class="col-md-12">
                  <div class="container">
                    <h2 class="h2 text-primary">Filter By Quantity</h2>
                  </div><br>
                  <div class="container">
                    <form  id="form_sample_1" class="form-horizontal">
                      <div class="form-group row ss-item-required">
                        <div class="col-md-3">
                          <label class="" for="simpleFormCappedamount">Set Filter Quantity: <span class="required">*</span></label>
                          <select class="form-control" id="quantityFilter">
                              <option>Do Nothing</option>
                              <option>Apply To A Range</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                          <label for="simpleFormCappedamount">From<br>&nbsp</label>
                          <input class="form-control" type="text" placeholder="$400" name="quantity From" id="quantityFrom">
                        </div>
                        <div class="col-md-3">
                          <label for="simpleFormCappedamount">To<br>&nbsp</label>
                          <input class="form-control" type="text" placeholder="$400" name="quantity To" id="quantityTo">
                        </div>
                        <div class="col-md-3">
                          <label style="font-size: 12px;">No Maximum Quantity</label>
                          <div class="checkbox text-center checkbox-icon-black">
                                                    <input id="noMaxQuantity" type="checkbox">
                                                    <label for="noMaxQuantity">
                                                       
                                                    </label>
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
                  <button class="btn btn-primary btn-lg" onclick="saveFilter()">Submit</button>
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
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Setting Up and Using Filters </a></li>
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Surcharging or Discounting Based on Price </a></li>
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Hiding Shipping Options based on Weight,Price or Quantity</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- end------------------------------- -->


    </div>

</div>

</div>

</div>
<!-- end page content -->

<!-- start chat sidebar -->

<!-- end chat sidebar -->

<!-- end page container -->

<!-- start footer -->


<!-- start js include path -->

<!-- end js include path -->

 <!-- Modal for Add Box -->



  <!-- Modal for Add Box -->

  <!-- Modal for Edit Box -->