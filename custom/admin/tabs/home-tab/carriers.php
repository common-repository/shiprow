<?php
//for datatable design

wp_enqueue_style( 'sp-datatable-bootstrap-css' );

//datatable js

wp_enqueue_script( 'sp-datatable-js' );

//datatable bootstrap css

wp_enqueue_script( 'sp-datatable-bootstrap-js' );

//custom js for datatable

wp_enqueue_script( 'sp-table-js' );

wp_enqueue_style( 'sp-formlayout-css' );

//for form validation

wp_enqueue_script( 'sp-validation-js' );

//for form validation plugin

wp_enqueue_script( 'sp-form-js' );


//notification
wp_enqueue_style( 'notification-css' );
wp_enqueue_script( 'notification-js' );

//confirmbox
wp_enqueue_script( 'confirmbox-js' );


$license = $wpdb->prefix.'carrier_list';
$_POST['carrierId']=2;
 $sql = "SELECT * from $license ";

$carriersWWE=$wpdb->get_results($sql,ARRAY_A);

$sql="SELECT * from {$wpdb->prefix}store_settings where carrier_id=%d";
$otherSettings=$wpdb->get_results($wpdb->prepare($sql,3),ARRAY_A);
if(count($otherSettings)>0){
        $carriersEnabledWWE=$otherSettings[0]['otherSettings'];
        }else{
          $carriersEnabledWWE=0;
        }

?>

<div class="row">

    <div class="col-md-12">

        <div class="card card-box">

            <div class="card-head">

                <header></header>

             </div>

             	<div class="card-body ">
						<div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="carriersWWELTLTable">
                                <thead>
                                    <tr>
                                      <th >
                                            Carrier Logo 
                                        </th>
                                        <th class="text-center">Carrier Name  </th>
                                        <th >
                                          <div class="checkbox checkbox-icon-black p-0">
                                                <input id="selectAll" 
                                                       type="checkbox" 
                                                       name="select All"
                                                >
                                                <label for="selectAll">
                                                </label>
                                            </div>
                                         
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="carriersCheckboxDiv">
                                   <?php 
                                      foreach ($carriersWWE as $carriers)
                                      {
                                      ?>
                                        <tr class="odd gradeX">
                                            <td class="patient-img text-center ">
                                            <img src="<?php echo plugins_url( '../../../assets/img/wweLTLCarriers/'.$carriers['carrier_logo'], __FILE__ ) ?>" alt="" style="width:50px;height:40px">
                                            </td>
                                             <td class="text-left"><?php echo $carriers['carrier_name'] ?></td>
                                             <td>
                                                <div class="checkbox checkbox-icon-black p-0">
                                                    <input id="enableCarrier<?php echo $carriers['carrier_code']?>" 
                                                           type="checkbox" 
                                                           name="<?php echo $carriers['carrier_code']?>"
                                                           <?php 
                                                           echo(strpos($carriersEnabledWWE,$carriers['carrier_code'])==true?'checked':'')
                                                            ?>
                                                    >
                                                    <label for="enableCarrier<?php echo $carriers['carrier_code']?>">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                      <?php 
                                      }
                                      ?>   

                            </tbody>
                            
                            </table>
                            <table class="table order-column valign-middle" >
                              <thead>
                                    <tr>
                                      <th style="width: 50px;">
                                        </th>
                                        <th class="text-left"></th>
                                        <th  style="width: 100px;">
                                          <button class="btn btn-primary"onclick="saveCarriers()">Save </button>
                                        </th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>