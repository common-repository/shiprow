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

  function saveZone(){
    var required=false;
    var fields = $(".ss-item-required").find("select, textarea, input").serializeArray();
    $.each(fields, function(i, field) {
      if (!field.value){
        notificationAlert('Error','info',field.name +' cant be empty');
        required=true;
        return false;
      }
     });
    var zoneName=$('#zoneName').val();
    var internalNotes=$('#internalNotes').val();
    var zipcode=$('#zipcode').val();
    var country=$("#country").val();
    var state=$('#state').val();
    var forStates=$('#forStates :selected').text();
    var city=$('#city').val();
    var forCities=$('#forCities :selected').text();

    //key name should b same as coulmn name in db at data of ajax 
    if(!required){
      $.ajax({
        url:"admin-ajax.php",
        type:'POST',
        data:{ action:'shipping_zone_add',
            zone_name:zoneName,
            internal_notes:internalNotes,
            country:country,
            zipcode:zipcode,
            state:state,
            for_states:forStates,
            city:city,
            for_cities:forCities
          },
        dataType:'text',
        success:function(response){
          notificationAlert('Success!','success','Successfully Added');
          window.location.href='admin.php?page=sp-settings&tab=shipping_zones';
        },
        error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);

              }

      });
    }

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


<div class="row">

<div class="col-md-12">

<div class="tabbable-line">

   

    <div class="tab-content">


<!-- start--------------------------------------------- -->
    <div class="row">
      <div class="col-md-8">
        <div class="card-box">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="container">
                  <p class="text-justify">Shipping Zones in ShipperHQ can loe applied to Origins, Carriers,Shipping Rules, ancl more to define which shipping options and rates you offerto which regions.While Zones in Shipper1-1Q allow you to control shipping based on the addresses used byyour customers,the countries a...son regions your customers can select in your contend checloout are still controlled loy your eCommerce platform.<br> <a href="">Learn More</a></p>
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
                          <label class="col-md-4" for="simpleFormCappedamount">Shipping Zone Name: <span class="required"> * </span></label>
                          <input type="text"  name="Zone name" data-required="1" class="col-md-6 form-control " id="zoneName"/>
                        
                        
                      </div>
                      <div class="form-group row">
                          <label class="col-md-4" for="simpleFormCappedamount">Internal Notes (Optional)</label> 
                          <textarea style="height: 100px" class="form-control col-md-6" id="internalNotes"></textarea> 
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
                    <h2 class="h2 text-primary">Shipping Zone Conditions</h2>
                  </div><br>
                  <div class="container">
                    <form  id="form_sample_1" class="form-horizontal">
                      <div class="form-group row ss-item-required">
                        <div class="col-md-6">
                          <label class="" for="simpleFormCappedamount">Zipcode/Postal <span class="required"> * </span></label>
                            <input name="zipcode" id="zipcode" type="text" class="form-control zipcode zipcode-change" required="required" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label class="" for="simpleFormCappedamount">Countries: <span class="required"> * </span></label>
                            <input name="country" id="country" type="text" class="form-control country" readonly="" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label class="" for="simpleFormCappedamount">For States <span class="required"> * </span></label>
                            <select class="form-control" id="forStates">
                              <option>Including</option>
                              <option>Excluding</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row ss-item-required">
                        <div class="col-md-6">
                          <label class="" for="simpleFormCappedamount">State <span class="required"> * </span></label>
                            <input name="state" id="state" type="text" class="form-control state" readonly="" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label class="" for="simpleFormCappedamount">For Cities <span class="required"> * </span></label>
                            <select class="form-control" id="forCities">
                              <option>Including</option>
                              <option>Excluding</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row ss-item-required">
                        <div class="col-md-6">
                          <label class="" for="simpleFormCappedamount">City <span class="required"> * </span></label>
                            <input name="city" id="city" type="text" class="form-control city" readonly="" />
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
                  <button class="btn btn-primary btn-lg"  onclick="saveZone()">Submit</button>
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
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Setting Up and Using Zones </a></li>
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Surcharging or Discounting Based on Zone </a></li>
                <li class="nav-link d-flex mb-2"><i class="mt-2 ml-1 fa fa-exclamation-circle text-primary" aria-hidden="true"></i>&nbsp; <a href="">Hiding Shipping Options based on Weight,Price or Quantity</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- end------------------------------------------------------ -->
      

    </div>

</div>

</div>

</div>

<!-- end page content -->

<!-- start chat sidebar -->

<!-- end chat sidebar -->

<!-- end page container -->

<!-- start footer -->


<!-- end footer -->


<!-- start js include path -->



<!-- end js include path -->

 <!-- Modal for Add Box -->



  <!-- Modal for Add Box -->

  <!-- Modal for Edit Box -->