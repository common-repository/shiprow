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








<div class="row">
<div class="col-md-12">
<div class="tabbable-line">
   
    <div class="tab-content">
        <div class="tab-pane active fontawesome-demo" id="tab1">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header> Products Export</header>
                            
                        </div>
                        <div class="card-body ">
                            
                           <form class="form-horizontal" action="?page=sp-settings&tab=get_CSV" id="formFileExport" method="post" name="uploadCSV"
                                enctype="multipart/form-data">
                                <div class="input-row">
                                    
                                    <button type="submit" class="btn btn-primary" id="BtnSubmit" name="export" onclick=""
                                        class="btn-submit" >Export</button>
                                    <br/>

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