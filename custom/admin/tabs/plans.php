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

global $wpdb;
$level=0;
$enabledCArriers=0;
//getting level
$sql="SELECT * FROM {$wpdb->prefix}sp_license";
$result=$wpdb->get_results($sql,ARRAY_A);
if(count($result)>0){
  $level=$result[0]['level'];
}
?>

<style type="text/css">

hr{

    border: 0;

    border-top: 1px solid #eee;

    border-bottom: 0;

}

</style>



<div class="row">

                <div class="comparison">



                  <table class="">

                    <thead>

                      <tr>

                        <th class="tl tl2"></th>

                        

                        <th colspan="3" class="qbo">

                           

                        </th>

                    </tr>

                    <tr>

                        <th class="tl"></th>

                        <th class="compare-heading">

                          Basic

                          <hr>

                      </th>

                      <th class="compare-heading">

                          Standard

                          <hr>

                      </th>

                      <th class="compare-heading">

                          Advance

                          <hr>

                      </th>

                      

                  </tr>

                   <tr>

                    <th></th>

                    <th class="price-info">

                     

                      <div class="price-now"><span>$14</span> /month</div>

                      <div><a target="_blank" href="https://shiprow.com/admin/index.php?module=plans&action=load" class="btn <?=($level==1?'btn-secondary':'price-buy')?> "><?=($level==1?'BOUGHT':'BUY NOW')?> </a></div>

                     

                    </th>

                   <th class="price-info">

                     

                      <div class="price-now"><span>$28</span> /month</div>

                      <div><a target="_blank" href="https://shiprow.com/admin/index.php?module=plans&action=load" class="btn <?=($level==2?'btn-secondary':'price-buy')?>"><?=($level==2?'BOUGHT':'BUY NOW')?> </a></div>

                     

                    </th>

                    <th class="price-info">

                     

                      <div class="price-now"><span>$40</span> /month</div>

                      <div><a target="_blank" href="https://shiprow.com/admin/index.php?module=plans&action=load" class="btn <?=($level==3?'btn-secondary':'price-buy')?>"><?=($level==3?'BOUGHT':'BUY NOW')?> </a></div>

                     

                    </th>

                   

                  </tr>

                  <tr>

                    <th></th>

                    

                    <?php



               



                  



                  ?>

                  



                  

                  

              </tr>

          </thead>

          <tbody>

              <tr>

                <td></td>

                <td colspan="4">Shipping Requests</td>

            </tr>

            <tr class="compare-row">

                <td>Shipping Requests</td>

                <td><span class="tickblue">Unlimited ✔</span></td>

                <td><span class="tickgreen">Unlimited ✔</span></td>

                <td><span class="tickblack">Unlimited ✔</span></td>

                

            </tr>

            <tr>

                <td>&nbsp;</td>

                <td colspan="4">Origins</td>

            </tr>

            <tr>

                <td>Origins</td>

                <td><span class="tickblue">Unlimited ✔</span></td>

                <td><span class="tickgreen">Unlimited ✔</span></td>

                <td><span class="tickblack">Unlimited ✔</span></td>

                

            </tr>

            <tr>

                <td>&nbsp;</td>

                <td colspan="4">Dropships</td>

            </tr>

            <tr class="compare-row">

                <td>Dropships</td>

                <td><span class="tickblue">Unlimited ✔</span></td>

                <td><span class="tickgreen">Unlimited ✔</span></td>

                <td><span class="tickblack">Unlimited ✔</span></td>

                

            </tr>

            <tr>

                <td>&nbsp;</td>

                <td colspan="4">Carriers</td>

            </tr>

            <tr>

                <td>Carriers</td>

                <td><span class="tickblue">1</span></td>

                <td><span class="tickgreen">2</span></td>

                <td><span class="tickblack">3</span></td>

                

            </tr>




            <tr>

             

                <td colspan="4">Handling Fee</td>

            </tr>

            <tr class="compare-row">

                <td>Handling Fee</td>

                <td><span class="tickblue">✔</span></td>

                <td><span class="tickgreen">✔</span></td>

                <td><span class="tickblack">✔</span></td>

                

            </tr>

            <tr>

                <td>&nbsp;</td>

                <td colspan="4">Residential Delivery</td>

            </tr>

            <tr>

                <td>Residential Delivery</td>

                <td><span class="tickblue">✔</span></td>

                <td><span class="tickgreen">✔</span></td>

                <td><span class="tickblack">✔</span></td>

                

            </tr>

            <tr>

                <td>&nbsp;</td>

                <td colspan="4">Lift Gate Delivery( for LTL )</td>

            </tr>

            <tr class="compare-row">

                <td>Lift Gate Delivery( for LTL )</td>

                <td><span class="tickblue">✔</span></td>

                <td><span class="tickgreen">✔</span></td>

                <td><span class="tickblack">✔</span></td>

                

                

            </tr>



            <tr>

                <td>&nbsp;</td>

                <td colspan="4">Address Type Detection </td>

            </tr>

            <tr class="compare-row">

                <td>Address Type Detection</td>

                <td></td>

                <td><span class="tickgreen">✔</span></td>

                <td><span class="tickblack">✔</span></td>



                

            </tr>

            <tr>

                <td>&nbsp;</td>

                <td colspan="4">Hazardous Material </td>

            </tr>

            <tr>

                <td>Hazardous Material</td>

                <td></td>

                <td><span class="tickgreen">✔</span></td>

                <td><span class="tickblack">✔</span></td>



                

            </tr>







  </tbody>

</table>



</div>

</div>


      <div class="card card-box">
          <div class="card-body no-padding height-9">
            <div class="row">
              <div class="col-md-6">
                <div class="container">
                  <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs</h2>
    
                </div>
                <div class="container">
                  <p> <span><a href="https://docs.shiprow.com/fedex-ltl-freight-for-shopify/#2301" target="_blank"><i class="fa fa-exclamation-circle"></i> Choose the plan you need </a></span></p>
                </div>
              </div>
           
            </div>
          </div>
      </div>