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







global $sp_strings,$wpdb;

//collect all warehouse

$shipping_rules_query = "SELECT * FROM {$wpdb->prefix}shipping_rules";

$shipping_rules = $wpdb->get_results($shipping_rules_query,ARRAY_A);


?>



<!-- end header -->

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
      <!-- start------------------------------------- -->
        <div class="row">
            <div class="col-md-12">
              <div class="card card-box">
                <div class="card-head">
                  <header>Shipping Rule</header>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-7 col-sm-7 col-7">

                      <div class="btn-group pull-right">
                        
                        <h2>
                          <?php
                              if(count($shipping_rules)>0){
                          
                                echo 'Shipping Rules';
                           
                              }else{

                                echo 'Add Your First Rule';

                              } 
                          ?>
                        </h2>

                      </div>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">

                      <div class="btn-group pull-right">
                        
                        <a href="admin.php?page=sp-settings&tab=shipping_rule_form" class="btn btn-info">
                          New <i class="fa fa-plus"></i>
                        </a>

                      </div>

                    </div>
                  </div>
                  <br><br>
                  
                </div>
              </div>
            </div>


            <div class="col-md-12">
              <div class="card card-box">
                <div class="card-head">
                  <header>Shipping Rule</header>
                  
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                      <div class="btn-group pull-right">
                        <a href="admin.php?page=sp-settings&tab=shipping_rule_form" class="btn btn-info">
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
                                    <th> Rule Name </th>
                                    <th> Zones </th>
                                    <th>Enabled</th>
                                    <th> Action </th>
                                  </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    foreach ($shipping_rules as $value) {
                                    ?>

                                    <tr id="<?php echo 'tr'.$value['id']?>">

                                    <td><?php echo $value['rule_name'] ?></td>

                                    <td><?php

                                        foreach (json_decode($value['custom_shipping_methods']) as $v) {

                                          echo $v;

                                          echo '<br>';

                                        }
                                        foreach (json_decode($value['live_shipping_methods']) as $key=> $arr) {
                                          echo '<b>'.strtoupper(str_replace('_',' ',$key)).': </b>';
                                          foreach($arr as $v){
                                            echo strtolower(str_replace('_',' ',$v)).'<b> , </b>';
                                          }
                                          

                                          echo '<br>';
                                        }

                                      ?></td>

                                      <td>False</td>

                                      <td><a class="btn btn-primary btn-xs" href="admin.php?page=sp-settings&tab=shipping_rule_form&id=<?=$value['id']?>"><i class="fa fa-pencil"></i></a>

                                      <button class="btn btn-danger btn-xs" onclick="deleteRule(<?=$value['id']?>)">

                                        <i class="fa fa-trash-o "></i>

                                      </button></td>

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
                                <h2>Understanding Shipping Rules</h2>
                                <p>Shipping Rules allow you to set,surcharge,discount,and hide shipping methods from live and custom carrier,giving you granular control over the shipping rates and option your customer see at checkout.</p>
                              </div>
                              <div class="container">
                                <p>Find all of our helpful docs at : <span><a href=""><i class="fa fa-book"></i> Shipper HQ Help Docs</a></span></p>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="container">
                                <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs</h2>
                                <ul>
                                  <li class="nav-link"><i class="fa fa-exclamation-circle text-primary" aria-hidden="true"></i> <a href="">Configuring Shipping Rule </a></li>
                                  <li class="nav-link"><i class="fa fa-exclamation-circle text-primary" aria-hidden="true"></i> <a href="">Setting up Custom Rates using Shipping Rules</a></li>
                                  <li class="nav-link"><i class="fa fa-exclamation-circle text-primary" aria-hidden="true"></i> <a href="">Using Shipping Groups</a></li>
                                  <li class="nav-link"><i class="fa fa-exclamation-circle text-primary" aria-hidden="true"></i> <a href="">Using Shipping Filters</a></li>
                                  <li class="nav-link"><i class="fa fa-exclamation-circle text-primary" aria-hidden="true"></i> <a href="">Troubleshooting Shipping Rules</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
          </div>
      <!-- end------------------------------------------------ -->



      </div>

    </div>

  </div>

</div>





<!-- end page content -->

<!-- start chat sidebar -->



<!-- end page container -->

<!-- start footer -->



<!-- start js include path -->




<!-- end js include path -->

<!-- Modal for Add Warehouse -->



 