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


$shipping_zones_query = "SELECT * FROM {$wpdb->prefix}shipping_zones";

$zones = json_decode(json_encode($wpdb->get_results($shipping_zones_query)),true);


?>





<!-- start color quick setting -->

<!-- end color quick setting -->

<!-- start page container -->


<!-- start sidebar menu -->

 <!-- start sidebar menu -->

<!-- start sidebar menu -->
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
  //confirm dialog box coding---------------------------------------------------

 //Pass true to callback function
 $(".btn-yes").click(function () {
     handler(true);
     $("#myModal").modal("hide");
 });
    
 //Pass false to the callback function
 $(".btn-no").click(function () {
     handler(false);
     $("#myModal").modal("hide");
 });
 //
function confirmDialog(message, handler){
  $(`<div class="modal fade" id="myModal" role="dialog"> 
     <div class="modal-dialog"> 
       <!-- Modal content--> 
        <div class="modal-content"> 
           <div class="modal-body" style="padding:10px;"> 
             <h4 class="text-center">${message}</h4> 
             <div class="text-center"> 
               <a class="btn btn-danger btn-yes">yes</a> 
               <a class="btn btn-default btn-no">no</a> 
             </div> 
           </div> 
       </div> 
    </div> 
  </div>`).appendTo('body');
 
  //Trigger the modal
  $("#myModal").modal({
     backdrop: 'static',
     keyboard: false
  });
  
   //Pass true to a callback function
   $(".btn-yes").click(function () {
       handler(true);
       $("#myModal").modal("hide");
   });
    
   //Pass false to callback function
   $(".btn-no").click(function () {
       handler(false);
       $("#myModal").modal("hide");
   });

   //Remove the modal once it is closed.
   $("#myModal").on('hidden.bs.modal', function () {
      $("#myModal").remove();
   });
}
 // end confirm dialog---------------------------------------------------------------
  function deleteZone(id){
    confirmDialog("Are you sure you want to delete this Zone?", (ans) => {
      if (ans) {
         $.ajax({
          url:'admin-ajax.php',
          type:'POST',
          data:{action:'shipping_zone_delete',id:id},
          dataType:'text',
          success:function(response){
            if(response==1){
              $('#tr'+id).remove();    
                notificationAlert('Deleted!','info','Successfully Deleted');
            }
            else{
              alert('some error occurred');
            }
          }

        });
      }else {
         result='false';
      }
     });
  }
    </script>

    <!-- end sidebar menu -->

  <!-- start page content -->

<!-- end sidebar menu -->

<!-- end sidebar menu -->

<!-- start page content -->



<div class="row">

<div class="col-md-12">

<div class="tabbable-line">

   

    <div class="tab-content">

      <!-- start---------------------------- -->
      <div class="row">
      <div class="col-md-12">
        <div class="card card-box">
          <div class="card-head">
            <header>Shipping Zone</header>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-12">
                <div class="btn-group pull-right">
                  <a href="admin.php?page=sp-settings&tab=shipping_zone_form" class="btn btn-info">
                    New <i class="fa fa-plus"></i>
                  </a>
                </div>
                <div class="btn-group pull-left">
                  <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Action
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                    <li>
                      <a href="javascript:;">
                        <i class="fa fa-copy"></i> Duplicate </a>
                      </li>
                      <li>
                        <a href="javascript:;">
                          <i class="fa fa-trash-o"></i> Delete </a>
                        </li>
                      </ul>
                      &nbsp;&nbsp;
                      <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">CSV
                        <i class="fa fa-angle-down"></i>
                      </a>
                      <ul class="dropdown-menu pull-right">
                        <li>
                          <a href="javascript:;">
                            <i class="fa fa-print"></i> Print </a>
                          </li>
                          <li>
                            <a href="javascript:;">
                              <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                            </li>
                            <li>
                              <a href="javascript:;">
                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                              </li>
                            </ul>
                          </div>

                        </div>
                      </div>
                      <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                          <thead>
                            <tr>
                              <th> Name </th>
                              <th> Description </th>
                              <th>Countries</th>
                              <th>State</th>
                              <th>Zip/Postal Code</th>
                              <th> Action </th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php 
                              foreach ($zones as $zone) {
                            ?>
                              <tr id="tr<?php echo $zone['id'] ?>">
                                <td><?php echo $zone['zone_name']?></td>
                                <td><?php echo $zone['internal_notes']?></td>
                                <td><?php echo $zone['country']?></td>
                                <td><?php echo $zone['state']?></td>
                                <td><?php echo $zone['zipcode']?></td>
                                <td>
                                  <a class="btn btn-primary btn-xs" href="admin.php?page=sp-settings&tab=shipping_zone_form_edit&id=<?= $zone['id'] ?>"><i class="fa fa-pencil"></i></a>
                                  <button class="btn btn-danger btn-xs" onclick="deleteZone(<?php echo $zone['id'] ?>)">
                                    <i class="fa fa-trash-o "></i>
                                  </button>
                                </td>
                                
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card card-box">
                    <div class="card-body no-padding height-9">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="container">
                            <h2>Understanding Shipping Zone</h2>
                            <p>Shipping Zones are created to represent products that share the same shipping repuirernents and can be defined anyway you want. For example, you could create a shipping zone named .0versize. feria, [terns that require special handling fees or can only ship with specific carriers.Once your shipping zone Is created You can use this as a condition within your shipping rules. </p>
                          </div>
                          <div class="container">
                            <p>Find all of our helpful docs at : <span><a href=""><i class="fa fa-book"></i> Shipper HQ Help Docs</a></span></p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="container">
                            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs</h2>
                            <ul>
                              <li class="nav-link"><i class="fa fa-exclamation-circle text-primary" aria-hidden="true"></i> <a href="">Setting Up and Using Shipping Zone </a></li>
                              <li class="nav-link"><i class="fa fa-exclamation-circle text-primary" aria-hidden="true"></i> <a href="">Surcharging or Discounting Shipping to a Specific Zone </a></li>
                              <li class="nav-link"><i class="fa fa-exclamation-circle text-primary" aria-hidden="true"></i> <a href="">Preventing Certain items from Shipping to a Zone</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      <!-- end---------------------------------------- -->


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

