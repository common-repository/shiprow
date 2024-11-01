<?php

//for datatable design

wp_enqueue_style( 'sp-datatable-bootstrap-css' );

//datatable js

wp_enqueue_script( 'sp-datatable-js' );

//datatable bootstrap css

wp_enqueue_script( 'sp-datatable-bootstrap-js' );

//custom js for datatable

wp_enqueue_script( 'sp-table-js' );



if(isset( $_GET['subtab'] ) && !empty( $_GET['subtab'] ) ){

    //for form validation

    wp_enqueue_script( 'sp-validation-js' );

    //for form validation plugin

    wp_enqueue_script( 'sp-form-js' );

    include 'product-sub-tab.php';

}else{






?>

<style type="text/css">

    

.page-container-bg-solid .page-bar, .page-content-white .page-bar {

    margin: 0px -20px 1px !important;

}

ul.dropdown-menu.pull-right.show {

    left: -40px !important;

}



</style>

<div class="row">

    <div class="col-md-12">

        <div class="card card-box">

            <div class="card-head">

                <header>All Products</header>


                   <div class="btn-group pull-right">
                                    <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="?page=sp-settings&tab=import_page">
                                                <i class="fa fa-print"></i> Import CSV</a>
                                        </li>
                                        <li>
                                            <a href="?page=sp-settings&tab=export_page">
                                                <i class="fa fa-file-pdf-o"></i> Export CSV </a>
                                        </li>
                                    </ul>
                                </div>


            </div>

            <div class="card-body ">

               

                <div class="table-scrollable">

                    

                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="product_table">

                         <thead>

                            <tr>


                                <th>&nbsp;</th>

                                <th> Product </th>

                                <th> Inventory </th>

                                <th> Type </th>

                                <th> Vendor </th>

                                <th> Action </th>

                            </tr>

                        </thead>

                    </table>

                  

                </div>

            </div>

        </div>

    </div>

</div>

<?php } ?>

<div class="card card-box">
    <div class="card-body no-padding height-9">
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs</h2>

          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/fedex-ltl-freight-quotes-for-woocommerce/#2639" target="_blank"><i class="fa fa-exclamation-circle"></i> Shipping parameters of the product </a></span></p>
          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/fedex-ltl-freight-for-shopify/#2320" target="_blank"><i class="fa fa-exclamation-circle"></i> How to use import CSV Utility to update products? </a></span></p>
          </div>
        </div>
     
      </div>
    </div>
</div>