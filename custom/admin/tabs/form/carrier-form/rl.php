<?php

global $sp_strings;



$accountNumber = isset( $settings->account_number ) ?esc_textarea( $settings->account_number ): '';

$password = isset( $settings->username ) ?esc_textarea( $settings->username ): '';

$userName = isset( $settings->password ) ?esc_textarea( $settings->password ): '';

$authenticationKey = isset( $settings->authentication_key ) ?esc_textarea( $settings->authentication_key ): '';



?>





            <div class="form-body">



            <!-- 

            <div class="form-group ">

                <label class="control-label">Source of UPS rates:

                    <span class="required"> * </span>

                </label>

                

                    <select class="form-control" name="select">

                          <option>Use my UPS account</option>

                              <option>option 2</option>

                              <option>option 3</option>

                              <option>option 4</option>

                              <option>option 5</option>

                    </select>

                

            </div>

             -->

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

                <label class="control-label "><?php echo $sp_strings['authenticationKey']; ?>

                    <span class="required"> * </span>

                </label>

                

                    <input type="text" name="authenticationKey" data-required="1" class="form-control" value="<?php echo $authenticationKey; ?>" required/>

             </div>

             

             

               <!-- <div class="form-group">

                <label class="control-label">API Number 

                    <span class="required"> * </span>

                </label>

               

                    <input name="apinumber" type="text" class="form-control" />

                   

                

            </div> -->

              

            </div>

              

        

      