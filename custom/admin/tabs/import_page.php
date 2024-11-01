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


//getting product settings table columns
global $wpdb;
$query = $wpdb->get_col("DESC {$wpdb->prefix}product_settings", 0);
 //removing id column
 if(($key=array_search('id',$query))!==false){
  unset($query[$key]);
 }


?>




<script type="text/javascript">
  var loading_div ="<div class='refresh-block'><span class='refresh-loader'><i class='fa fa-spinner fa-spin'></i></span></div>";
    function importCSV(){
        var form=document.getElementById('formFileImport');
        if( document.getElementById("file").files.length == 0 ){
            notificationAlert('Error','warning','no files selected');
        }
        else
        {
            form.submit();
        }
    }
    function importMapping(){
        var form=document.getElementById('formFileImport');
        if( document.getElementById("file").files.length == 0 ){
            notificationAlert('Error','warning','no files selected');
        }
        else
        {
            var file=document.getElementById("file").files[0];
            var form_data=new FormData();
            form_data.append("file", file);
            form_data.append("action", 'sp_get_mapping');
            var productRows=new Array();
            var tmp;
            <?php foreach($query as $row){?>
                tmp=<?php  echo json_encode($row);?>;
                productRows.push(tmp);

            <?php } ?>
        jQuery(loading_div).appendTo(jQuery(form));
            $.ajax({
                url:ajaxurl,
                method:'POST',
                data:form_data,
                processData:false,
                contentType:false,
                cache:false,
                dataType:"JSON",
                success:function(response){
                  jQuery(loading_class).remove();

                    
                    $('#tblBody').empty();
                    $('#saveBtn').empty();
                    var selected='';
                    var count=0;
                    var tr='';
                    productRows.forEach(function(row){
                        tr='';
                        tr+='<tr class="odd gradeX" id="">';
                        tr+='<td>'+row+'</td>';
                        tr+='<td > <select class="form-control" name=column'+count+'>';
                        response.forEach(function(responseRow){
                            if(row==responseRow){
                                selected='selected';
                            }
                            else{
                                selected='';
                            }
                            tr+='<option value="'+response.indexOf(responseRow)+'" '+selected+' >'+responseRow+'</option>';
                        })
                        tr+='</select></td></tr>';
                        count+=1;
                        $('#tblBody').append(tr);
                        
                    })
                    $('#saveBtn').append('<button class="btn btn-primary float-right" onclick="importCSV()">SAVE</button>');

                },
                error:function(e,r,error){
                    
                  jQuery(loading_class).remove();
                  notificationAlert('Error','error','Some Error Occured. try refreshing page');

                }
            })
        }
        
    }
</script>


<div class="row">
<div class="col-md-12">
<div class="tabbable-line">
   <div class="loadingImg"></div>
    <div class="tab-content">
        <div class="tab-pane active fontawesome-demo" id="tab1">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-box submitFade">
                        <div class="card-head">
                            <header> Products Import</header>
                            
                        </div>
                        <div class="card-body ">
                            
                           <form class="form-horizontal" action="?page=sp-settings&tab=insert_CSV" id="formFileImport" method="post" name="uploadCSV"
                                enctype="multipart/form-data">
                                <div class="input-row">
                                    <label class="col-md-4 control-label">Choose CSV File</label> <input
                                        type="file" name="file" id="file" accept=".csv">
                                    <button type="button" class="btn btn-primary" id="BtnSubmit" name="import" onclick="importMapping()"
                                        class="btn-submit">Import</button>
                                    <br/>

                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle">

                                      <thead>

                                          <tr>


                                              <th> Columns in DB </th>

                                              <th> Columns in csv </th>

                                              

                                          </tr>

                                      </thead>

                                      <tbody id="tblBody">

                                      </tbody>
                                  </table>
                                  <div id='saveBtn'>
                                  </div>

                                <div id="labelError"></div>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>