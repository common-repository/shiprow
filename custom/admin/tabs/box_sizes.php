<?php
//for datatable design
wp_enqueue_style( 'sp-datatable-bootstrap-css' );
//datatable js
wp_enqueue_script( 'sp-datatable-js' );
//datatable bootstrap css
wp_enqueue_script( 'sp-datatable-bootstrap-js' );
//custom js for datatable
wp_enqueue_script( 'sp-table-js' );
//for form validation
wp_enqueue_script( 'sp-validation-js' );
//for form validation plugin
wp_enqueue_script( 'sp-form-js' );
//notification
wp_enqueue_style( 'notification-css' );
wp_enqueue_script( 'notification-js' );

//common_setting

global $wpdb;
$cap=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}common_settings",ARRAY_A);
$remainingBalance=0;
$totalBalance=0;
$per=0;
if(count($cap)>0){
    $cap=$cap[0];
    $remainingBalance=(isset($cap['remaining_balance'])?$cap['remaining_balance']:0);
    $totalBalance=((isset($cap['total_balance']) AND $cap['total_balance']>0)?$cap['total_balance']:0);
    if($totalBalance>0){
        $per=$remainingBalance/$totalBalance*100;
    }
}else{
    $cap=NULL;
}


$box_list = sp_get_box_list();
// $plan_list = array(
// '100 Requests ($3 )',
// '500 Requests ( $15 )',
// '1000 Requests ( $30)',
// '5000 Requests ( $150)',
// '10,000 Requests ( $300)',
// '15,000 Requests ( $450 )',
// '20,000 Requests ( $600)',
// '25,000 Requests ( $750)',
// '30,000 Requests ( $900 )',
// '35,000 Requests ( $1050 )',
// '40,000 Requests ( $1200 )',
// '45,000 Requests ( $1350 ) ',
// '50,000 Requests ( $1500 )',
// 'Unlimited Requests ( $2200)',
// );
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <header>3d Bin Usage</header>
            </div>
             <div class="card-body ">
                <form  id="3dBinPakagingForm">
                <div class="form-group row ">
                    <label  class="col-sm-4 col-form-label" for="3dBinUsage">
                         Enable
                    </label>
                    <div class="col-sm-8">
                        <div class="checkbox checkbox-icon-black p-0">
                            <input id="3dBinUsage" name= "3dBinUsageCheckbox" type="checkbox"<?=((isset($cap) AND $cap['binpackaging'])?'checked':'')?>>
                        </div>
                    </div>  
                </div>
                <div class="form-group row ">
                    <label for="plan_name" class="col-sm-4 col-form-label"> Capped Amount </label>
                    <div class="col-sm-8">
                        <input type="text" id="cappedAmount" value="<?=((isset($cap['total_balance']))?$cap['total_balance']:'')?>">
                    </div>
                </div>   
                <div class="row form-group">
                   <label for="current_plan" class="col-sm-4 col-form-label"> Current Balance :  </label>
                    <div class="col-sm-8">
                        <label class="col-md-4" for="simpleFormuseage"><?=$remainingBalance?>/ <?=$totalBalance?> (<?=$per?>%) </label> 
                    </div>
                </div>  
                <div class="row form-group">
                   <label for="current_usage" class="col-sm-4 col-form-label"> Notification Email  </label>
                    <div class="col-sm-8">
                        <input type="email" id="email" name="email"  class="col-md-4 form-control"  value="<?=((isset($cap['email']))?$cap['email']:'')?>" />
               </div>
                    </div>
                <div class="row form-group">
                   <input type="button" value="save" id="3dBinPakagingBtn">
                    <div class="col-sm-8">
                        
                    </div>
                </div>  
            </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Box Sizes</header>
              
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addBoxModal">
                                Add Box <i class="fa fa-plus"></i>
                            </button>
                            <!-- Button trigger modal -->


                        </div>

                    </div>
                </div>
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="boxsizelisttable">
                        <thead>
                            <tr>
                                <th style="width: 90px">Nickname</th>
                                <th> Length (in) </th>
                                <th> Width (in) </th>
                                <th> Height (in) </th>
                                <th> Max Weight (LBS) </th>
                                <th> Box Weight (LBS) </th>
                                <th> Available </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if( !empty( $box_list ) ){
                                    foreach ( $box_list as $box_key => $box) {
                                        ?>
                                         <tr class="odd gradeX">
                                            <td><?php echo $box->box_name; ?></td>
                                            <td class="center"> 
                                                <?php echo sprintf( __( '%s in', 'wccsp' ) ,$box->bin_length );?>  
                                            </td>
                                            <td class="center"> <?php echo sprintf( __( '%s in', 'wccsp' ) ,$box->bin_length );?>  </td>
                                            <td class="center"> <?php echo sprintf( __( '%s in', 'wccsp' ) ,$box->bin_width );?>  </td>
                                            <td class="center"> <?php echo sprintf( __( '%s Lbs', 'wccsp' ) ,$box->bin_max_weight );?>  </td>
                                            <td class="center"> <?php echo sprintf( __( '%s Lbs', 'wccsp' ) ,$box->bin_weight );?>  </td>
                                            <td class="center"><?php echo ($box->available > 0) ? 'Yes' : 'No'; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-box_id="<?php echo $box->bin_id; ?>" data-target="#editboxModal">
                                                    <i class="fa fa-pencil"></i>
                                                </button> <br>
                                                <button class="btn btn-danger btn-xs box-delete"  data-box_id="<?php echo $box->bin_id; ?>">
                                                    <i class="fa fa-trash-o "></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Add Box -->
<div class="modal" id="addBoxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Box</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form  id="addboxsizeform" class="">
                        <div class="form-group">
                            <label  class="control-label">Enter Name
                                <span class="required"> * </span>
                            </label>
                            <input type="text" name="box_name" data-required="1" minlength="5" maxlength="10" class="form-control" placeholder="Enter Your Name here"  required="true" />

                        </div>
                        <div class="form-group">
                            <label class="control-label" >Enter Box Size In Length
                                <span class="required"> * </span>
                            </label>
                            <input type="text" name="bin_length" required="true" data-required="1" class="form-control sp_input_decimal" placeholder="Enter Box Length in Inches"/>

                        </div>
                        <div class="form-group">
                            <label  class="control-label">Enter Box Size Width
                            <span class="required"> * </span></label>
                            <input type="text" name="bin_width" data-required="1" class="form-control sp_input_decimal" placeholder="Enter Box Width Inches" required="true" />
                        </div>
                        <div class="form-group">
                            <label  class="control-label">Enter Box Size Height
                                <span class="required"> * </span></label>
                                <input type="text" name="bin_height" data-required="1" class="form-control sp_input_decimal" placeholder="Enter Box Width Height" required="true"/>
                            </div>
                        <div class="form-group">
                            <label  class="control-label">Enter Box Maximum Weight
                                <span class="required"> * </span></label>
                                <input type="text" name="bin_max_weight" data-required="1" class="form-control sp_input_decimal" placeholder="Enter Box Weight" required="true" />
                            </div>
                        <div class="form-group">
                            <label  class="control-label">Enter Box Weight
                                <span class="required"> * </span></label>
                                <input type="text" name="bin_weight" data-required="1" class="form-control sp_input_decimal" placeholder="Enter Box Weight" required="true"/>
                            </div>
                        <div class="form-group">
                            <label class="control-label">Please Select Status Of Availabilty 
                                <span class="required"> * </span></label>
                                <select name="available" class="form-control" required="true">
                                    <option value="">Please select availabilty</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                

                            </div>


                    </form>
                </div>
            </div>
            <div class="modal-footer response">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="SubmitAddBox()">Add Box Size</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Add Box -->

<!-- Modal for Edit Box -->
<div class="modal" id="editboxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Box</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editboxsizeform" class="">
                    <input name="bin_id" class="bin_id" type="hidden">
                    <div class="form-group">
                            <label  class="control-label">Enter Name
                                <span class="required"> * </span>
                            </label>
                            <input type="text" name="box_name" data-required="1" minlength="5" maxlength="10" class="form-control box_name" placeholder="Enter Your Name here"  required="true" />

                        </div>
                        <div class="form-group">
                            <label class="control-label" >Enter Box Size In Length
                                <span class="required"> * </span>
                            </label>
                            <input type="text" name="bin_length" required="true" data-required="1" class="form-control sp_input_decimal bin_length" placeholder="Enter Box Length in Inches"/>

                        </div>
                        <div class="form-group">
                            <label  class="control-label">Enter Box Size Width
                            <span class="required"> * </span></label>
                            <input type="text" name="bin_width" data-required="1" class="form-control sp_input_decimal bin_width" placeholder="Enter Box Width Inches" required="true" />
                        </div>
                        <div class="form-group">
                            <label  class="control-label">Enter Box Size Height
                                <span class="required"> * </span></label>
                                <input type="text" name="bin_height" data-required="1" class="form-control sp_input_decimal bin_height" placeholder="Enter Box Width Height" required="true"/>
                            </div>
                        <div class="form-group">
                            <label  class="control-label">Enter Box Maximum Weight
                                <span class="required"> * </span></label>
                                <input type="text" name="bin_max_weight" data-required="1" class="form-control sp_input_decimal  bin_max_weight" placeholder="Enter Box Weight" required="true" />
                            </div>
                        <div class="form-group">
                            <label  class="control-label">Enter Box Weight
                                <span class="required"> * </span></label>
                                <input type="text" name="bin_weight" data-required="1" class="form-control sp_input_decimal bin_weight" placeholder="Enter Box Weight" required="true"/>
                            </div>
                        <div class="form-group">
                            <label class="control-label">Please Select Status Of Availabilty 
                                <span class="required"> * </span></label>
                                <select name="available" class="form-control available" required="true">
                                    <option value="">Please select availabilty</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                

                            </div>
                </form>
            </div>
            <div class="modal-footer response">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitEditBox()">Edit Box Size</button>
            </div>
        </div>
    </div>
</div>