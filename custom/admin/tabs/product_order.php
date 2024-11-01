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

    include 'order-details.php';

}else{

?>

<div class="row">

    <div class="col-md-12">

        <div class="card card-box">

            <div class="card-head">

                <header>All Orders</header>

                
            </div>

            <div class="card-body ">

               

                <div class="table-scrollable">

                    

                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="order_table">

                         <thead>

                            <tr>


                                <th> &nbsp; </th>

                                <th> Order Id </th>

                                <th> Date </th>

                                <th> Customer Name </th>

                                <th> Status </th>

                                <th> Total </th>

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