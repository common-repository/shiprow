<?php 

global $sp_strings;

$hubId = isset( $settings->username ) ? esc_textarea($settings->username) : '';

?>

  

  <div class="form-body">

      <div class="form-group">

        <label class="control-label"><?php echo $sp_strings['hubId']; ?> 

          <span class="required"> * </span>

        </label>

          <input id="hubId" type="text" class="form-control" name="hubId" value="<?php echo $hubId; ?>" required/>

      </div>

  </div>



       