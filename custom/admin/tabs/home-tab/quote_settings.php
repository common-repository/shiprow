<?php

$connection_id = isset( $settings->id ) && !empty($settings->id)? $settings->id : '';

$qs =  isset( $settings->quote_settings ) ? json_decode( $settings->quote_settings ): '';
?>

    <div class="row">

  <div class="col-md-12 col-sm-12">

  <div class="card card-box">

      <div class="card-head">

          <header>Quote Setting</header>

        <!--   <button id = "panel-button3" 

                 class = "mdl-button mdl-js-button mdl-button--icon pull-right" 

                 data-upgraded = ",MaterialButton">

                 <i class = "material-icons">more_vert</i>

              </button>

              <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"

                 data-mdl-for = "panel-button3">

                 <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>

                 <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>

                 <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>

              </ul> -->

      </div>

      <div class="card-body " id="bar-parent2">

        <form name="quoteSettingForm" id="quoteSettingForm">

        <input type="hidden" id="connection_id" name="connection_id" value="<?php echo $connection_id; ?>">

        <?php

            if(isset( $_POST['selectedcarrier'] ) && file_exists( SPROW_CARRIER_FORM_DIR.$_POST['selectedcarrier'].'.php' ) ){

                include SPROW_CARRIER_FORM_DIR.sanitize_text_field($_POST['selectedcarrier']).'-quote-setting.php';  

            }else{

              echo 'Please select the carrier';

            }

        ?>

      </form>

      <div class="row pull-right response">

          <button type="button" class="btn btn-primary" onclick="submitQuote()" >Save</button>

      </div>

      </div>

  </div>

  </div>

  </div>