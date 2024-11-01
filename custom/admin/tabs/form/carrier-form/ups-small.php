<?php

global $sp_strings;



$accountNumber =  isset( $settings->account_number ) ? esc_textarea($settings->account_number ): '';

$userName =  isset( $settings->username ) ? esc_textarea($settings->username ): '';

$password =  isset( $settings->password ) ? esc_textarea($settings->password ): '';

$UPSAPIAccessKey =  isset( $settings->authentication_key ) ? esc_textarea($settings->authentication_key ): '';

?>





            <div class="form-body">



   


                 <div class="form-group">

                <label class="control-label"><?php echo $sp_strings['accountNumber']; ?> 

                    <span class="required"> * </span>

                </label>

               

                    <input name="accountNumber" type="text" class="form-control" value="<?php echo $accountNumber; ?>" required/>

                    <span class="help-block"> e.g: 5500 0000 0000 0004 </span>

                

            </div>



            <div class="form-group">

                <label class="control-label"><?php echo $sp_strings['userName']; ?>

                    <span class="required"> * </span>

                </label>

               

                    <input name="userName" type="text" class="form-control" value="<?php echo $userName; ?>" required/>

                    

                

            </div>

                <div class="form-group">

                <label class="control-label "><?php echo $sp_strings['password']; ?>

                    <span class="required"> * </span>

                </label>

                

                    <input type="text" name="password" data-required="1" class="form-control" value="<?php echo $password; ?>" required/>

             </div>

              <div class="form-group">

                <label class="control-label "><?php echo $sp_strings['UPSAPIAccessKey']; ?>

                    <span class="required"> * </span>

                </label>

                

                    <input type="text" name="UPSAPIAccessKey" data-required="1" class="form-control" value="<?php echo $UPSAPIAccessKey; ?>" required/>

             </div>

             

             


              

            </div>

              

        

        