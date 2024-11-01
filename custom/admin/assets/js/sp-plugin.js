var loading_class=".refresh-block";

var loading_div ="<div class='refresh-block'><span class='refresh-loader'><i class='fa fa-spinner fa-spin'></i></span></div>";

function notificationAlert(title=' ',theme='success',message=' '){
    if(theme!='success' & theme!='info' & theme!='warning' & theme!='error' & theme!='none' ){
      theme='none';
    }
    window.createNotification({
      closeOnClick: true,
     
      // displays close button
      displayCloseButton: false,
     
      // nfc-top-left
      // nfc-bottom-right  // nfc-bottom-left
      positionClass: 'nfc-top-right',
     
      // callback
      onclick: false,
     
      // timeout in milliseconds
      showDuration: 3500,
      // success, info, warning, error, and none
      theme: theme

    })({
      title: title,
      message: message
    });
  }

  	function hideDropshipLocation(checkboxId,locationDivId){
        var dropship=$('#'+checkboxId).prop('checked');
        if(dropship){
            $('#'+locationDivId).removeClass('hide');
        }else{
            $('#'+locationDivId).addClass('hide');

        }
    }



jQuery(document).ready(function($) {


	//for carriers checkbox in wwe ltl setting
	var checkboxes = $('#carriersCheckboxDiv :checkbox');
    var allChecked = checkboxes.length == checkboxes.filter(':checked').length & checkboxes.length!=0;
    if(allChecked){
      $('#selectAll').prop('checked',true);
    }

    $('#selectAll').click(function(){
      if($('#selectAll').prop('checked')){

        $('#carriersCheckboxDiv input:checkbox').prop('checked',true);
      }else{
        $('#carriersCheckboxDiv input:checkbox').prop('checked',false);
      }
    });


    //small select All

    var checkboxes=$('input[name^="domestic"]');
      var allChecked=checkboxes.length==checkboxes.filter(':checked').length;
      if(allChecked){
        $('#selectAllDomestic').prop('checked',true);
      }

var checkboxes=$('input[name^="international"]');
      var allChecked=checkboxes.length==checkboxes.filter(':checked').length;
      if(allChecked){
        $('#selectAllInternational').prop('checked',true);
      }

$('#3dBinPakagingBtn').on('click',function() {
	var rad=+$('#3dBinUsage').is(':checked');
	var total_balance=$('#cappedAmount').val();
	var email=$('#email').val();

	jQuery(loading_div).appendTo(jQuery('#3dBinPakagingForm'));

		jQuery.ajax({

			url : ajaxurl,
			data : {

				'action' : 'save_capped_amount',

				'rad' : rad,

				'total_balance' : total_balance,

				'email' : email

			},

			type: 'POST',

			dataType: 'text',

			success: function(response){
				window.location.reload();

				jQuery(loading_class).remove();
				if(response==1){
					notificationAlert('SAVED','success','Changes Saved successfully!');
				}else if(response==0){
					notificationAlert('SAVED','success','Changes Saved successfully!');
				}else{
					notificationAlert('Error','error','Some Error Occured. try refreshing page');
				}

			},
			error:function(a,b,error){
				console.log(error);
				console.log(a);
				console.log(b);
				jQuery(loading_class).remove();
				notificationAlert('Error','error','Some Error Occured. try refreshing page');

			}

		});
})
$('#selectAllDomestic').change(function(){
  if($('#selectAllDomestic').prop('checked')){
    $('input[name^="domestic"]').prop('checked',true);
  }else{
    $('input[name^="domestic"]').prop('checked',false);
  }
});
$('#selectAllInternational').change(function(){
  if($('#selectAllInternational').prop('checked')){
    $('input[name^="international"]').prop('checked',true);
  }else{
    $('input[name^="international"]').prop('checked',false);
  }
});

	



	//enable bootstrap tooltips

	jQuery('[data-toggle="tooltip"]').tooltip();



	//location page js

	jQuery('.add-warehouse-btn').click(function(){

		


		jQuery('#warehouse_form').submit();

	});

	$('#rating_method').change(function(){
		var value=$('#rating_method :selected').val();
		if(value=="cheapest_options"){
			$('#number_of_options').prop('disabled',false);
		}else{
			$('#number_of_options').prop('disabled',true);
		}
  	});

	jQuery('#warehouse_form').on('submit',function(){

		var $this = jQuery(this);

		var modal = $this.closest('.modal');

		jQuery(loading_div).appendTo(jQuery(this));	


		jQuery.ajax({

			url : ajaxurl,

			data : {

				'action' : 'save_warehouse',

				'data' : jQuery(this).serialize(),

			},

			type: 'POST',

			dataType: 'json',

			success: function(data){

				jQuery(loading_class).remove();
				if(data.success){

					if(data.type == 'insert' ){

						notificationAlert('Success!','success','Successfully Added');

						$this[0].reset();

						$this.find('.tags-input').removeTag();

						$this.find('.warehouse-checkbox').trigger('change');

						modal.find('.modal-footer').prepend( data.message );

						setTimeout(function(){

							modal.find('.modal-footer span').remove()

						},800);

						document.location.reload();

					}else if(data.type == 'update' ){

						notificationAlert('Success!','success','Changes successfully saved');

						modal.find('.modal-footer').prepend( data.message );

						setTimeout(function(){

							modal.find('.modal-footer span').remove()

						},800);

						document.location.reload();

					}

					

				}
				if(data['exist']==true){
					notificationAlert('ERROR!','warning','city already exists');

				}

			},
			error:function(a,b,error){
				jQuery(loading_class).remove();
				notificationAlert('Error','error','Some Error Occured. try refreshing page');

			}

		});

		return false;

	});

	 $('#dropshipCheckbox').click(function(){
          if(document.getElementById('dropshipCheckbox').checked){
            $('#showDropshipsDiv').show()
          }
          else{
            $('#showDropshipsDiv').hide()
          }
         });

	jQuery('.zipcode-change').change(function(){

		var $this;

		$this = jQuery(this);

		if($this.val() != ''){

			jQuery(loading_div).appendTo(jQuery(this).closest('form'));

			jQuery.ajax({

				url : ajaxurl, // AJAX handler

				data : {

					'action': 'zipcode_details', // the parameter for admin-ajax.php

					'zipcode' : $this.val(),

				},

				type : 'POST',

				dataType:'json',

				success : function( data ){

					jQuery(loading_class).remove();

					if(data.success){

						jQuery.each( data.data , function(key,val) {

							$this.closest('form').find('.'+key).val(val);

						});

					}

				},
				error:function(a,b,e){
					jQuery(loading_class).remove();
					console.log(e);
				}

			});

		}else{

			$this.closest('form').find('.city').val('');

			$this.closest('form').find('.state').val('');

			$this.closest('form').find('.country').val('');

		}

		

	});

	

	//warehouse checkbox

	jQuery('.warehouse-checkbox').change(function(){

		//var addfield = jQuery('.warehouse-checkbox:checked').length;

		var div;

		if(jQuery(this).prop('checked')){

			// those fields

			div = jQuery(this).data('id');

			jQuery('.'+div).removeClass('hide');

		}else{

			//remove those fields

			div = jQuery(this).data('id');

			jQuery('.'+div).addClass('hide');

		}

	});



	//js for fill the data on edit time

	jQuery('#addwarehouseModal').on('show.bs.modal', function (event) {

		var button = $(event.relatedTarget) // Button that triggered the modal

		var warehouse_id = button.data('id') // Extract info from data-* attributes

		var modal = $(this)

		var type = button.data('type');

		if(typeof warehouse_id != "undefined"){

			

			if(type == 'warehouse' ){

				modal.find('.modal-title').text('Edit Ware House')

				modal.find('.add-warehouse-btn').text('Edit Warehouse')



			}else if(type == 'dropship' ){

				modal.find('.modal-title').text('Edit Drop Ship')

				modal.find('.add-warehouse-btn').text('Edit Dropship')

			}

			modal.find('.warehouse_edit_id').val(warehouse_id)



			modal.find('#warehouse_form')[0].reset();

			modal.find('#warehouse_form .tags-input').removeTag();

			modal.find('.warehouse-checkbox').trigger('change');

			//modal.find('.modal-body input').val(recipient)

			jQuery(loading_div).appendTo( jQuery('#warehouse_form') );

			jQuery.ajax({

				url : ajaxurl, // AJAX handler

				data : {

					'action' : 'edit_warehouse',

					'warehouse_id' : warehouse_id,

				},

				type : 'POST',

				dataType:'json',

				success : function( response ){

					modal.find('.refresh-block').remove();

					jQuery.each(response.data, function( key, val ) {

						if(key == 'instore_pickup'){

							if(val){

								modal.find('.'+key).prop( 'checked', true );

								modal.find('.'+key).trigger('change');

								//console.log(response.data.settings.instore_pickup);

								if(response.data.settings.instore_pickup.miles){

									var miles = response.data.settings.instore_pickup.miles;	

									modal.find('.'+key+'.miles' ).val(miles);

								}



								if(response.data.settings.instore_pickup.zipcodes){

									var zip_codes = response.data.settings.instore_pickup.zipcodes;

									modal.find('.'+key+'.zip_codes.tags-input' ).importTags(zip_codes);

								}

								

								

							}

						}else if(key == 'local_delivery'){

							

							if(val != '0'){

								modal.find('.'+key).prop( 'checked', true );

								modal.find('.'+key).trigger('change');

								//console.log(response.data.settings.instore_pickup);

								if( response.data.settings.local_delivery.miles ){

									var miles = response.data.settings.local_delivery.miles;	

									modal.find('.'+key+'.miles' ).val(miles);

								}

								

								if( response.data.settings.local_delivery.zipcodes ){

									var zip_codes = response.data.settings.local_delivery.zipcodes;	

									modal.find('.'+key+'.zip_codes.tags-input' ).importTags(zip_codes);

								}

								

								if(response.data.settings.local_delivery.fee ){

									var fees =  response.data.settings.local_delivery.fee;

									modal.find('.'+key+'.fees' ).val(fees);

								}

							}

							



						}else{

							modal.find('.'+key).val(val);

							if(key=='country'){
								var optionValue=val;
								$('#'+key).val(optionValue).find("option[value=" + optionValue +"]").attr('selected', true);
							}



							if(key == 'settings'){

								if(response.data.settings.suppress_other_rates){

									modal.find('.suppress_other_rates').prop( 'checked', true );

								}

								

							}

						}

						

					});

				}

			});



		}else{

			modal.find('.location_type').val(type);

			if(type == 'warehouse' ){

				modal.find('.modal-title').text('Add Ware House')

				modal.find('.add-warehouse-btn').text('Add Warehouse')

				modal.find('.warehouse_edit_id').val('')	

			}else if(type == 'dropship' ){

				modal.find('.modal-title').text('Add Drop House')

				modal.find('.add-warehouse-btn').text('Add Dropship')

				modal.find('.warehouse_edit_id').val('')	

			}

			



			modal.find('#warehouse_form')[0].reset();

			modal.find('.tags-input').removeTag();

			modal.find('.warehouse-checkbox').trigger('change');

		}

	});



	jQuery('.delete-warehouse').click(function(){
	confirmDialog("Are you sure you want to save these changes?", (ans) => {
      if (ans) {
		var $this, id, parent;

		$this = jQuery(this);

		id = $this.data('id');
		jQuery(loading_div).appendTo($this.closest('form'));
		parent = $this.closest('tr');

		jQuery(loading_div).appendTo($this.closest('form'));
			jQuery.ajax({

				url: ajaxurl,

				data : {

					'action' : 'delete_warehouse',

					'warehouse_id' : id

				},

				type: 'POST',

				dataType : 'json',

				success : function(response){

			jQuery( loading_class ).remove();
					if(response.success){
						notificationAlert('Deleted!','info','Successfully Deleted');

						parent.remove();	

					}

				}

			});
		}else{
			return false;
		}
	});

	});

	jQuery('.delete-dropship').click(function(){
		var $this, id, parent;

		$this = jQuery(this);

		id = $this.data('id');

		parent = $this.closest('tr');

		jQuery(loading_div).appendTo($this.closest('form'));
		jQuery.ajax({
          url:ajaxurl,
          type:'POST',
          data : {

					'action' : 'delete_dropship',

					'dropship_id' : id,

				},

          dataType:'JSON',
          success:function(response){
			jQuery( loading_class ).remove();
			confirmDialog("<br><b><span class='text-danger'>"+response.count+"</span></b> products use this dropship location.Are you sure you want to delete this location?", (ans) => {
				if (ans) {
					jQuery(loading_div).appendTo($this.closest('form'));
					jQuery.ajax({
					url: ajaxurl,
					data : {
						'action' : 'delete_warehouse',
						'warehouse_id' : id
					},
					type: 'POST',
					dataType : 'json',
					success : function(response){
						jQuery( loading_class ).remove();
						if(response.success){
							notificationAlert('Deleted!','info','Successfully Deleted');
							parent.remove();	
						}
					}

				});

				}else{
					return false;
				}
			})

            
          },
          error:function(){
			jQuery( loading_class ).remove();
            
          }
        })

		});



	//product [page js]
	//for single product
	$('#dropship_enable').on('click',function(){
		var dropship=$('#dropship_enable').prop('checked');
		if(dropship){
			$('.dropship_location').removeClass('hide');
		}else{
			$('.dropship_location').addClass('hide');

		}
	});

	//for variants
	// $('select[name^="dropship_location"]').on('click',function(){
	// 	var dropship=$('#dropship_enable').prop('checked');
	// 	if(dropship){
	// 		$('.dropship_location').removeClass('hide');
	// 	}else{
	// 		$('.dropship_location').addClass('hide');

	// 	}
	// });

	jQuery('#sp_product_meta_form').submit(function(){

		var $this;

		$this = jQuery(this);

		jQuery(loading_div).appendTo($this);	

		 var fd = new FormData();

       // var file_data = fd.append('cover_pic', jQuery('.'+$id)[0].files[0]);

        var serializedValues = jQuery(this).serializeArray();

        jQuery.each(serializedValues, function (key, input) {

        	
        		// console.log(key);
        		// console.log(input);
        	

            fd.append(input.name, input.value);

        });
        //some validations before calling ajax----
        var required=false;//if any require element is missing than ajax wont run

    //****validation for multiple variations of a product****
        $('input[type=hidden][name^="variant_id"]').each(function(){
        	var variantId=$(this).val();
        	//weight need to b more than zero
        	var weight=$('#pro_weight-'+variantId).val();
	        if(weight<=0 || weight==''){
	            notificationAlert('Error','info','Weight cant be less than 0');
				jQuery( loading_class ).remove();
	            required=true
	        }

	        

	        //if radio is freight than must select freight class
	        var radioLTL=$('#freight_samll_radio-1-'+variantId).prop('checked');
	        var freightClass=$('select[name="_freight_class['+variantId+']"] :checked').val();
	        // alert(freightClass);
	        if(radioLTL & freightClass==''){
	        	notificationAlert('Error','info','Please select Freight Class');
	        	jQuery( loading_class ).remove();
	            required=true
	        }

	        //if dropship is enabled than must select loactoin
	        var dropship=$('#dropship_enable-'+variantId).prop('checked');
	        var dropshipLocation=$('select[name="dropship_location['+variantId+']"] :checked').val();
	        if(dropship & dropshipLocation==''){
	            notificationAlert('Error','info','Please select dropship location');
	            jQuery( loading_class ).remove();
	            required=true
	        }


        });
	//**variation validation end**//

	//******validation for single product with no variation*****//      

        //weight need to b more than zero
        var weight=$('#pro_weight').val();
        if(weight<=0 || weight==''){
            notificationAlert('Error','info','Weight cant be less than 0');
			jQuery( loading_class ).remove();
            required=true
        }


        //if dropship is enabled than must select loactoin
        var dropship=$('#dropship_enable').prop('checked');
        var dropshipLocation=$('select[name="dropship_location"] :checked').val();
        if(dropship & dropshipLocation==''){
            notificationAlert('Error','info','Please select dropship location');
            jQuery( loading_class ).remove();
            required=true
        }




        //if radio is freight than must select freight class
        var radioLTL=$('#inlineRadio1').prop('checked');
        var freightClass=$('select[name="_freight_class"] :checked').val();
        // alert(freightClass);
        if(radioLTL & freightClass==''){
        	notificationAlert('Error','info','Please select Freight Class');
        	jQuery( loading_class ).remove();
            required=true
        }
        //if dropship is enable than must select location
        var dropshipEnable=$('#dropship_enable').prop('checked');
        var dropShipLocation=$('select[name="dropship_location"] :checked').val();
        // alert(freightClass);
        if(dropshipEnable & dropShipLocation==''){
        	notificationAlert('Error','info','Please select dropship location');
        	jQuery( loading_class ).remove();
            required=true
        }
    //**end single product validation**//

        //end validation--------------------------

        fd.append('action' , 'sp_product_meta' );

        if(!required){
			jQuery.ajax({

				url : ajaxurl,

				data : fd,

				type: 'POST',

				dataType : 'json',

				contentType: false,

	            processData: false,

				success : function(response){

					jQuery( loading_class ).remove();
						notificationAlert('Success!','success','Successfully Saved');
					if(response.success){

						// $this.find('.response').prepend( response.message );

						setTimeout(function(){

							$this.find('.response span').remove()

						},1000);

					}

				},
				error: function(response){
					notificationAlert('Error','error','Some Error Occured. try refreshing page');
				}

			});
		}

		

		return false;

	});  



	//adding the validation

	$( document.body )

		.on( 'wc_add_error_tip', function( e, element, error_type ) {

			var offset = element.position();



			if ( element.parent().find( '.sp_error_tip' ).length === 0 ) {

				element.after( '<div class="sp_error_tip ' + error_type + '">' + sp_admin[error_type] + '</div>' );

				element.parent().find( '.sp_error_tip' )

					.css( 'left', offset.left + element.width() - ( element.width() / 2 ) - ( $( '.sp_error_tip' ).width() / 2 ) )

					.css( 'top', offset.top + element.height() )

					.fadeIn( '100' );

			}

		})



		.on( 'wc_remove_error_tip', function( e, element, error_type ) {

			element.parent().find( '.sp_error_tip.' + error_type ).fadeOut( '100', function() { $( this ).remove(); } );

		})

		.on( 'blur', '.sp_input_decimal[type=text], .sp_input_price[type=text], .wc_input_country_iso[type=text]', function() {

				$( '.sp_error_tip' ).fadeOut( '100', function() { $( this ).remove(); } );

			})



			.on( 'change', '.sp_input_price[type=text], .sp_input_decimal[type=text], .wc-order-totals #refund_amount[type=text]', function() {

				var regex, decimalRegex,

					decimailPoint = '.';



				if ( $( this ).is( '.sp_input_price' ) || $( this ).is( '#refund_amount' ) ) {

					decimailPoint ='.';

				}



				regex        = new RegExp( '[^\-0-9\%\\' + decimailPoint + ']+', 'gi' );

				decimalRegex = new RegExp( '\\' + decimailPoint + '+', 'gi' );



				var value    = $( this ).val();

				var newvalue = value.replace( regex, '' ).replace( decimalRegex, decimailPoint );



				if ( value !== newvalue ) {

					$( this ).val( newvalue );

				}

			})



			.on( 'keyup', '.sp_input_price[type=text], .sp_input_decimal[type=text], .wc_input_country_iso[type=text], .wc-order-totals #refund_amount[type=text]', function() {

				var regex, error, decimalRegex,decimal_point,mon_decimal_point;

				var checkDecimalNumbers = false;

				decimal_point = '.';

				mon_decimal_point = ',';

				if ( $( this ).is( '.sp_input_price' ) || $( this ).is( '#refund_amount' ) ) {

					checkDecimalNumbers = true;

					regex = new RegExp( '[^\-0-9\%\\' + mon_decimal_point + ']+', 'gi' );

					decimalRegex = new RegExp( '[^\\' + mon_decimal_point + ']', 'gi' );

					error = 'i18n_mon_decimal_error';

				} else if ( $( this ).is( '.wc_input_country_iso' ) ) {

					regex = new RegExp( '([^A-Z])+|(.){3,}', 'im' );

					error = 'i18n_country_iso_error';

				} else {

					checkDecimalNumbers = true;

					regex = new RegExp( '[^\-0-9\%\\' + decimal_point + ']+', 'gi' );

					decimalRegex = new RegExp( '[^\\' + decimal_point + ']', 'gi' );

					error = 'i18n_decimal_error';

				}



				var value    = $( this ).val();

				var newvalue = value.replace( regex, '' );



				// Check if newvalue have more than one decimal point.

				if ( checkDecimalNumbers && 1 < newvalue.replace( decimalRegex, '' ).length ) {

					newvalue = newvalue.replace( decimalRegex, '' );

				}



				if ( value !== newvalue ) {

					$( document.body ).triggerHandler( 'wc_add_error_tip', [ $( this ), error ] );

				} else {

					$( document.body ).triggerHandler( 'wc_remove_error_tip', [ $( this ), error ] );

				}

			});



	// 

	jQuery('.select-carrier-btn').on('click',function(){

		jQuery('#select_service_form').submit();

	});



	jQuery('#selectcarrier').change(function(){

		var carrier_id = jQuery(this).find('option:selected').attr('data-id');

		jQuery('#selected_carrier_id').val( carrier_id );

	});

	//validation for quote setting

	jQuery('.nav-link.quote_settings').click(function(){

		var connection_id = jQuery('#quote_settings #connection_id').val();

		if(connection_id == ''){

			//return false;

		}

	});

	$("#selectAll").change(function(){

		var selectAll=document.getElementById('selectAll').checked;

		if(selectAll){

			$("#FEDEX_FREIGHT_ECONOMY").prop('checked', true);

			$("#FEDEX_FREIGHT_PRIORITY").prop('checked', true);

		}

		else{

			$("#FEDEX_FREIGHT_ECONOMY").prop('checked', false);

			$("#FEDEX_FREIGHT_PRIORITY").prop('checked', false);



		}

	});

	$("#FEDEX_FREIGHT_ECONOMY").change(function(){

		var FEDEX_FREIGHT_ECONOMY=document.getElementById('FEDEX_FREIGHT_ECONOMY').checked;

		if(!FEDEX_FREIGHT_ECONOMY){

			$("#selectAll").prop('checked', false);

		}

	});

	$("#FEDEX_FREIGHT_PRIORITY").change(function(){

		var FEDEX_FREIGHT_PRIORITY=document.getElementById('FEDEX_FREIGHT_PRIORITY').checked;

		if(!FEDEX_FREIGHT_PRIORITY){

			$("#selectAll").prop('checked', false);

		}

	});

	$("#residential_auto_detection").change(function(){

		var residential_auto_detection=document.getElementById('residential_auto_detection').checked;

		if(residential_auto_detection){

			$("#liftgate_auto_detection").prop('disabled', false);

			//ups-ltl

			$('#showUnconfirmed').show();

		}

		else{

			$("#liftgate_auto_detection").prop('checked', false);

			$("#liftgate_auto_detection").prop('disabled', true);

			//ups-ltls

			if (document.getElementById('unconfirmed_default_commercial0').checked) {

				$("#unconfirmed_default_commercial0").prop('checked', false);

			}else if(document.getElementById('unconfirmed_default_commercial1').checked) {

				$("#unconfirmed_default_commercial1").prop('checked', false);

			}

			$('#showUnconfirmed').hide();

		}

	});

	//ups-ltls

	$("#relationship").change(function(){

		var e=document.getElementById('relationship');

		var relationship=e.options[e.selectedIndex].value;

		if(relationship=="Third-Party"){

			$('#thirdPartyShow').show();

		}

		else{

			$('#thirdPartyShow').hide();

			document.getElementById('thirpartycountry').value='';

			document.getElementById('thirdparty_postal_code').value='';

		}



	});

	$("#discount_enable2").change(function(){

		var discount_enable2=document.getElementById('discount_enable2').checked;

		if(discount_enable2){

			$("#promotional_discount").prop('disabled', false);

		}

	});

	$("#discount_enable1").change(function(){

		var discount_enable1=document.getElementById('discount_enable1').checked;

		if(discount_enable1){

			$("#promotional_discount").prop('disabled', true);

			document.getElementById('promotional_discount').value=''

		}

	});

	$("#show_delivery_estimate0").change(function(){

		var show_delivery_estimate0=document.getElementById('show_delivery_estimate0').checked;

		if(show_delivery_estimate0){

			document.getElementById('cut_off_time').value="";

			document.getElementById('fulfillment_offset_days').value="";

			$("#cut_off_time").prop('disabled', true);

			$("#fulfillment_offset_days").prop('disabled', true);



		}

	});

	$("#show_delivery_estimate1").change(function(){

		var show_delivery_estimate1=document.getElementById('show_delivery_estimate1').checked;

		if(show_delivery_estimate1){

			$("#cut_off_time").prop('disabled', false);

			$("#fulfillment_offset_days").prop('disabled', false);

		}

	});

	$("#show_delivery_estimate2").change(function(){

		var show_delivery_estimate2=document.getElementById('show_delivery_estimate2').checked;

		if(show_delivery_estimate2){

			$("#cut_off_time").prop('disabled', false);

			$("#fulfillment_offset_days").prop('disabled', false);

		}

	});



	//abf-ltl

	$("#show_delivery_estimate").change(function(){

		var show_delivery_estimate=document.getElementById('show_delivery_estimate').checked;

		if(show_delivery_estimate){

			$("#cut_off_time").prop('disabled', false);

			$("#fulfillment_offset_days").prop('disabled', false);



		}else{

			document.getElementById('cut_off_time').value="";

			document.getElementById('fulfillment_offset_days').value="";

			$("#cut_off_time").prop('disabled', true);

			$("#fulfillment_offset_days").prop('disabled', true);

		}

	});

	//rl

	$("#selectAll").change(function(){

		var selectAll=document.getElementById('selectAll').checked;

		if(selectAll){

			$("#standard_service").prop('checked', true);

			$("#guranteed_pm").prop('checked', true);

			$("#guaranteed_am").prop('checked', true);

			$("#guaranteed_hourly").prop('checked', true);

		}

		else{

			$("#standard_service").prop('checked', false);

			$("#guranteed_pm").prop('checked', false);

			$("#guaranteed_am").prop('checked', false);

			$("#guaranteed_hourly").prop('checked', false);



		}

	});

	//to deselect the selectAll

	$("#standard_service").change(function(){

		var standard_service=document.getElementById('standard_service').checked;

		if(!standard_service){

			$("#selectAll").prop('checked', false);

		}

	});

	$("#guranteed_pm").change(function(){

		var guranteed_pm=document.getElementById('guranteed_pm').checked;

		if(!guranteed_pm){

			$("#selectAll").prop('checked', false);

		}

	});

	$("#guaranteed_am").change(function(){

		var guaranteed_am=document.getElementById('guaranteed_am').checked;

		if(!guaranteed_am){

			$("#selectAll").prop('checked', false);

		}

	});

	$("#guaranteed_hourly").change(function(){

		var guaranteed_hourly=document.getElementById('guaranteed_hourly').checked;

		if(!guaranteed_hourly){

			$("#selectAll").prop('checked', false);

		}

	});

	$("#residential_auto_detection").change(function(){

		var residential_auto_detection=document.getElementById('residential_auto_detection').checked;

		if(residential_auto_detection){

			$("#liftgate_auto_detection").prop('disabled', false);

		}

		else{

			$("#liftgate_auto_detection").prop('checked', false);

			$("#liftgate_auto_detection").prop('disabled', true);



		}

	});

	$("#selectAll").change(function(){

	    var selectAll=document.getElementById('selectAll').checked;

	    if(selectAll){

	      $("#day_monday").prop('checked', true);

	      $("#day_tuesday").prop('checked', true);

	      $("#day_wednesday").prop('checked', true);

	      $("#day_thursday").prop('checked', true);

	      $("#day_friday").prop('checked', true);

	      $("#day_saturday").prop('checked', true);

	      $("#day_sunday").prop('checked', true);

	    }

	    else{

	      $("#day_monday").prop('checked', false);

	      $("#day_tuesday").prop('checked', false);

	      $("#day_wednesday").prop('checked', false);

	      $("#day_thursday").prop('checked', false);

	      $("#day_friday").prop('checked', false);

	      $("#day_saturday").prop('checked', false);

	      $("#day_sunday").prop('checked', false);



	    }

	  });





	//js for fill the data on edit time

	jQuery('#editboxModal').on('show.bs.modal', function (event) {

		var button = $(event.relatedTarget) // Button that triggered the modal

		var box_id = button.data('box_id') // Extract info from data-* attributes

		var modal = $(this)

		jQuery(loading_div).appendTo( jQuery('#editboxModal') );

		jQuery.ajax({

			url: ajaxurl,

			data:{

				'action' : 'sp_get_box_data',

				'id' : box_id,

			},

			type: 'POST',

			dataType: 'json',

			success:function( response ){

				modal.find('.refresh-block').remove();

				if(response.success){

					jQuery.each(response.data,function(key,value){

						modal.find('.'+key).val(value);

					});

				}

			}

		});



	});



	jQuery('.box-delete').on('click',function(){

		var  box_id,parent;

		box_id = jQuery(this).attr('data-box_id');

		parent = jQuery(this).closest('tr');

		parent.appendTo(loading_div);

		jQuery.ajax({

			url:ajaxurl,

			data:{

				'action' : 'sp_delete_box',

				'id' : box_id,

			},

			type: 'POST',

			dataType : 'json',

			success: function(repsonse){

				parent.remove();

			}

		});

	});

	//new carrier modal

	//js for fill the data on edit time

	jQuery('#enableCarrierModal').on('show.bs.modal', function (event) {

		var button = $(event.relatedTarget) // Button that triggered the modal

		var modal = $(this)

		var carrier_name = button.data('carrier_name');

		var description = button.data('description');

		//var title_html = carrier_name

		modal.find('.modal-title .carrier_name').html(carrier_name);

		modal.find('.modal-body .carrier-description').html(description);

		modal.find('.modal-footer #carrier_id').val(button.data('carrier_id') )

		modal.find('.modal-footer #selectedcarrier').val(button.data('name') )

		

	});

	// save the data in enable table

	jQuery('form[name^="enablecarrierform"]').on('submit',function(){

		jQuery(loading_div).appendTo(this);

		var fd= new FormData();

		var serializedValues = jQuery(this).serializeArray();

		jQuery.each(serializedValues, function (key, input) {

			fd.append(input.name,input.value);

		});
		carrierId=serializedValues[0].value;
		carrierName=serializedValues[1].value;

		fd.append('action','sp_enable_carrier_list');



		jQuery.ajax({

			url:ajaxurl,

			data:fd,

			type:'POST',


			dataType:'json',

			contentType: false,

			processData:false,

			success:function(response){

				if(response.success){
					notificationAlert('Success!','success','Enabled Successfully');
					checkStep(carrierName,carrierId);
					// document.location.reload();
					return true;	

				}
				else if(response.carrierLimit){
					jQuery( loading_class ).remove();
						confirmDialog("You have reached limit of carriers you can enable in your plan. would you like to ugrade plan?", (ans) => {
					      if (ans) {
					      	window.open("https://shiprow.com/admin/index.php?module=plans&action=load",'_blank');
					      }
					      else{
					      	return false;
					      }
					  });
	        			var carrierCode=[]
						return false;
				}else{
					jQuery( loading_class ).remove();
					notificationAlert('Error','error','Some Error Occured. try refreshing page');
				}

			},
			error:function(){
				jQuery( loading_class ).remove();
				notificationAlert('Error','error','Some Error Occured. try refreshing page');
				return true;
			}					

		});
		return false;

	});

	//remove the carrier from list

	jQuery('.remove-carrier').on('click',function(){

		jQuery(loading_div).appendTo( jQuery(this).closest('.card') );

		var carrier_id = jQuery(this).data('id');

		jQuery.ajax({

			url:ajaxurl,

			data:{

				action : 'sp_remove_carrier',

				carrier_id : carrier_id,

			},

			type:'post',

			dataType:'json',

			success: function( response ){

				if(response.success){
					notificationAlert('Success!','info','Disabled Successfully');
					document.location.reload();

				}

			}

		});

	});



	jQuery('.addproduct').on('click','.btn-showmore',function(){

		var $this, addOrRemove;

		$this = jQuery(this);

		$this.closest('.product-add').find('.other-fields').toggleClass( 'd-none');

		if( $this.closest('.product-add').find('.other-fields').hasClass('d-none') ){

			$this.closest('.product-add').find('span.optional-data').html('Show All Optional')

			$this.closest('.product-add').find('.btn-showmore  i').removeClass('fa-minus').addClass('fa-plus')

		}else{

			$this.closest('.product-add').find('span.optional-data').html('Hide All Optional')

			$this.closest('.product-add').find('.btn-showmore  i').removeClass('fa-plus').addClass('fa-minus')

		}



	});



	jQuery('.addproduct').on( 'click', '.btn-add-product', function(){

		var $this,clonediv,count,total;

		$this = jQuery(this);

		clonediv = $this.closest('.card').find('.product-add:first').clone();

		clonediv.addClass('border-top pt-2');

		count = $this.closest('.card').find('.product-add').length;

		total = parseInt(count)+1; 

		clonediv.find('.product-count span').html(total);

		clonediv.find('input').val('');

		clonediv.find('.product-count').append('<a href="javascript:void(0);" class="pull-right text-info removeproduct"><i class="fa fa-times" aria-hidden="true"></i></a>')

		$this.closest('.card').find('.card-body').append(clonediv);

	

	});



	jQuery('.addproduct').on( 'click' , '.removeproduct' , function(){

		var $this , count ;

		$this = jQuery(this);

		$this.closest('.product-add').remove();

		

		count = 1;

		jQuery('.addproduct .product-add').each(function(){

			jQuery(this).find('.product-count span').html(count);

			count++;

		});

	});

	jQuery('#full_address').change(function(){



		if(jQuery(this).prop('checked')){

			jQuery('#testrateform').find('.street_address').removeClass('d-none')

		}else{

			jQuery('#testrateform').find('.street_address').addClass('d-none')

		}

	});

});
//geting started iframs
function checkStep(data=0,data2=-1){
  // $('#iSpinner').addClass('fa-spinner');
  if($('#iframeCarrierId').length){
    data2=$('#iframeCarrierId').val();
  }
  		jQuery(loading_div).appendTo($('#modalIframe'));
        $.ajax({
            url:ajaxurl,
            type:'POST',
            data:{id:1,carrier_id:data2,'action':'check_step'},
            dataType:'json',
            success:function(response){
					jQuery( loading_class ).remove();


                if(response.currentStep==1){
                    // step(1);
                    notificationAlert('Enable a Carrier','warning','Please enable a carrier first');
                    $('#ibutton'+1).removeClass('btn-default');
                    $('#ibutton'+1).addClass('btn-primary');
                    window.location.reload();
                }else if(response.currentStep==2 || response.currentStep==20){
                    $('#ibutton'+2).removeClass('btn-default');
                    $('#ibutton'+2).addClass('btn-primary');

                    if(response.currentStep==20){
                       notificationAlert('SAVE QUOTE SETTING','warning','please also save quote setting');
                    }
                    if(!$('#iframeCarrierId').length){
                    carrierSettingShow(data,data2);
                    }
                }else if(response.currentStep==3){
                  $('#ibutton'+3).removeClass('btn-default');
                  $('#ibutton'+3).addClass('btn-primary');
                    locationAddShow();
                }else if(response.currentStep==4){
                    $('#ibutton'+4).removeClass('btn-default');
                    $('button[name="ibuttons"').removeClass('btn-primary');
                    $('#ibutton'+4).addClass('btn-primary');
                    visitProduct();
                }else if(response.currentStep==0){
                  window.location.reload()
                }
                response.completedSteps.forEach(function(row){
                    $('#ibutton'+row).removeClass('btn-primary');
                    $('#ibutton'+row).removeClass('btn-default');
                    $('#ibutton'+row).addClass('btn-success');
                })
                
            },
            error:function(a,b,error){
					jQuery( loading_class ).remove();
              $('#iSpinner').removeClass('fa-spinner');
                alert(error);
            }
        })

    }
    function carrierSettingShow(carrierName=0,carrierId=-1){
    $('button[name="ibuttons"').removeClass('btn-primary');
    $('#ibutton2').addClass('btn-primary');
    $('#modalIframe').empty();
    var ifrm = document.createElement("iframe");
    if(carrierName==0){
    ifrm.setAttribute("src", "admin.php?page=sp-settings&tab=carrier_settings");

  }else{
    ifrm.setAttribute("src", "admin.php?page=sp-settings&tab=carrier_settings&carrier_id="+carrierId+"&selectedcarrier="+carrierName+"");

  }
    ifrm.style.width = "100%";
    ifrm.style.height = "340px"
    ifrm.name="iframeSteps";
    $('#modalIframe').append(ifrm);
    hide="<input type='hidden' id='iframeCarrierId' value='"+carrierId+"'>";
    $('#modalIframe').append(hide);
    $('#setupModal').modal('show');
  }
	function visitProduct(){
	    $('#modalIframe').empty();
	    html="<div class='row'><div class='col text-center'><a href='index.php?module=product&action=load' class='btn btn-primary'>add product setting to products to get rates</a></div></div>"
	    $('#modalIframe').append(html);
	    $('#setupModal').modal('show');
	  }
	function locationAddShow(){
    $('button[name="ibuttons"').removeClass('btn-primary');
    $('#ibutton3').addClass('btn-primary');
    $('#modalIframe').empty();
    var ifrm = document.createElement("iframe");
    ifrm.setAttribute("src", "admin.php?page=sp-settings&tab=location");
    ifrm.style.width = "100%";
    ifrm.style.height = "340px"
    ifrm.name="iframeSteps";
    $('#modalIframe').append(ifrm);
    $('#setupModal').modal('show');
  }
//shipping rule functions
 function saveRule(id=null){
      var required=false;
      var fields = $(".ss-item-required").find("select, textarea, input").serializeArray();
        $.each(fields, function(i, field) {
          if (!field.value){
            notificationAlert('Error','info',field.name +' cant be empty');
            required=true;
          }
         });
  
//basic tab
      var ruleName=$('#ruleName').val();
      var internalDescription=$('#internalDescription').val();
      var selectedCustom = [];
        $('#customShippingDiv input:checked').each(function() {
            selectedCustom.push($(this).attr('name'));
        });
        var selectedLive = {};
        $('#liveShippingDiv input:checked').each(function() {
          var key=$(this).attr('name');
          var value=$(this).attr('id');
          if(!(key in selectedLive)){
            selectedLive[key]=new Array(value)
          }else{
            selectedLive[key].push(value);
          }

        });
        selectedCustom=JSON.stringify(selectedCustom)
        selectedLive=JSON.stringify(selectedLive)

      //Action tab
      var iWant=$('#iWantSelect :selected').val();
      var inOrderTo=[];
      var applyRate='';
      var applyShippingGroups='';
      if($('#iWantSelect').val()=='modify'){
        inOrderTo.push($('#inOrder1 :selected').val());
        inOrderTo.push($('#inOrder2 :selected').val());
        inOrderTo.push($('#inOrder3').val());
        applyRate=$('#applyRateSelect :selected').val();
        applyShippingGroups=$('#applyShippingGroups :selected').val();

      }
      inOrderTo=JSON.stringify(inOrderTo);

      //condition tab
      var WPQ=$('#WPQIs').val();
      var zoneIncludeId=$('#zoneIncludeId').val();
      var zoneDoNotIncludeId=$('#zoneDoNotIncludeId').val();
      var shippingGroupsAllId=$('#shippingGroupsAllId').val();
      var shippingGroupOneOrMoreId=$('#shippingGroupOneOrMoreId').val();
      var shippingGroupsDoNotId=$('#shippingGroupsDoNotId').val();
      var customerGroupsIncludeId=$('#customerGroupsIncludeId').val();


      //advanced tabs
      var validFrom=$('#validFrom').val();
      var validTo=$('#validTo').val();

    //the key in data should be same as column name in database. else it wont save successfully
    if(!required){
      $('#submitBtn').prop('disabled',true);
      $.ajax({
          url:ajaxurl,
          type:'POST',
          data:{ action:'shipping_rule_add',
        id                                 :   id,
        rule_name                          :   ruleName,
        internal_description               :   internalDescription,
        custom_shipping_methods            :   selectedCustom,
        live_shipping_methods              :   selectedLive,
        action_to_perform                  :   iWant,
        in_order_to                        :   inOrderTo,
        apply_this_rate                    :   applyRate,
        apply_shipping_groups              :   applyShippingGroups,
        weight_price_quantity              :   WPQ,
        zone_include                       :   zoneIncludeId,
        zone_donot_include                 :   zoneDoNotIncludeId,
        shipping_groups_include_all        :   shippingGroupsAllId,
        shipping_groups_include_one_or_more:   shippingGroupOneOrMoreId,
        shipping_groups_donot_include      :   shippingGroupsDoNotId,
        customer_groups_include            :   customerGroupsIncludeId,
        valid_from                         :   validFrom,
        valid_to                           :   validTo,
            },
          dataType:'text',
          success:function(response){
            if(response){
          
              notificationAlert('Success!','success','Successfully Added');
              window.location.href='admin.php?page=sp-settings&tab=shipping_rules';
            }else{
              notificationAlert('ERROR!','error','Something went wrong! try refreshing page');
              $('#submitBtn').prop('disabled',false);
            }
          },
          error: function(XMLHttpRequest, textStatus, errorThrown){
        $('#submitBtn').prop('disabled',false);
            // alert(errorThrown);
          }

        });
      }

    }
function deleteRule(id) {
    confirmDialog("Are you sure you want to delete this Rule?", (ans) => {
      if (ans) {
        $.ajax({
          url:ajaxurl,
          type:'POST',
          data:{action:'shipping_rule_delete',id:id},
          dataType:'text',
          success:function(response){
            if(response==1){
              $('#tr'+id).remove();    
                notificationAlert('Deleted!','info','Successfully Deleted');
            }
            else{
              notificationAlert('Error!','error','Some error occured please refresh page');
            }
          }

        });
      }else {
         result='false';
      }
     });

  }
  //end shippping rule functions

function submitConnectionSetting(){

	var fd = new FormData();

   	var fields = {};

   	var otherSettings = {};

   	var other_settings = {};

   	if(jQuery('#connectionSettingForm').valid()){

   		$form = jQuery('#connectionSettingForm');

		jQuery(loading_div).appendTo($form);



	    var serializedValues = jQuery('#connectionSettingForm').serializeArray();

	    var selected_carrier = jQuery('#selected_carrier_name').val();

	    fields = spConnectionField( selected_carrier );

	    if(!jQuery.isEmptyObject(fields.otherSettings) ){

	    	otherSettings =  fields.otherSettings;

	    }



	    jQuery.each(serializedValues, function (key, input) {

			jQuery.each(fields,function(tablefield, inputfield) {

				if(inputfield === input.name){

					fd.append(tablefield, input.value);			

				}

			});

			if(!jQuery.isEmptyObject( otherSettings ) ){

				jQuery.each(otherSettings,function(tablefield, inputfield) {

					if(inputfield === input.name){

						other_settings[tablefield]  = input.value;			

					}

				});

			}

			if(input.name == 'edit_id'){

				fd.append('edit_id',input.value);

			}



	    });



	    if(!jQuery.isEmptyObject( other_settings ) ){

	    	jQuery.each(other_settings,function(field,val){

		    	fd.append('othersettings['+field+']' , val );

		    });	

	    }

	    fd.append('action' , 'sp_save_store_setting' );

		jQuery.ajax({

			url : ajaxurl,

			data : fd,

			type: 'POST',

			dataType: 'json',

			contentType: false,

	        processData: false,

			success: function( response ){
				console.log(response);

				if(response.success){

					if(response.connection_id){

						jQuery('#quote_settings #connection_id').val(response.connection_id);

					}
					if(response.save_quote==true){
					jQuery( loading_class ).remove();
					notificationAlert('Success!','success','Settings Saved Successfully');
						// submitQuote();
					}else{
					jQuery( loading_class ).remove();
					notificationAlert('Success!','success','Settings Saved Successfully');

					}

					// $form.parent().find('.response').prepend( response.message );

					setTimeout(function(){

						$form.parent().find('.response span').remove()

					},1000);

				}else{
					jQuery( loading_class ).remove();

				}

			}

		});

	}

}

function saveCarriers(){
	jQuery(loading_div).appendTo($('#carriersWWELTLTable'));

   		confirmDialog("Are you sure you want to save these changes?", (ans) => {
      if (ans) {
        var carrierCode=[]

       $("input:checkbox").each(function(){
          var $this = $(this);    
          if($this.is(":checked")){
            if($this.attr('id').includes('enableCarrier'))//gets checkboxes of carriers enable checkboxes only
              carrierCode.push($this.attr("name"));
          }
      });
      // carrierCode=JSON.stringify(carrierCode);
        console.log(carrierCode);
        if(carrierCode.length==0){
        	carrierCode='';
        }
        $.ajax({
          type:'POST',
          url:ajaxurl,
          data:{
                'carrierCode':carrierCode,
                'action': 'sp_save_carriers_wwe'
              },
          dataType:'json',
          success: function(response){
			jQuery( loading_class ).remove();

           if(response.success){
              notificationAlert('Success!','success','Settings Saved Successfully');
            }
            else if(response.carrierSetting){
              notificationAlert('Error!','warning','Please save carrier Settings first');
            }else{
            	notificationAlert('Error!','error','some error occured');
            }

          },
          error: function(a,b,error){
			jQuery( loading_class ).remove();

            notificationAlert('Error!','error','Some error occured please refresh page');
          }
        });
      }else{
        return false;
      }
    });
   	}


function spConnectionField($type){

	var data = {

		'fedex-ltl' : {

			// licenseKey:'licenseKey',

			accountNumber:'billingAccountNumber',

            speedfreightUsername:'meterNumber',

            speedfreightPassword:'password',

            authenticationKey:'authenticationKey',

            fedex_account_number:'shipperAccountNumber',

            otherSettings: {

            	ShipperAddress:'shipperAddress',

                ShipperCity:'shipperCity',

                ShipperState:'shipperState',

                ShipperZip:'shipperZip',

                ShipperCountry:'shipperCountry',

                physicalAddress:'physicalAddress',

                physicalCity:'physicalCity',

                physicalState:'physicalState',

                physicalZip:'physicalZip',

                physicalCountry:'physicalCountry',

                third_party_account:'thirdPartyAccountNumber',

            },

            carrierId:'carrierId'

		},

		'fedex-small':{

			// licenseKey:'licenseKey',

			accountNumber:'accountNumber',

	        speedfreightUsername:'meterNumber',

	        speedfreightPassword:'password',

	        authenticationKey:'authenticationKey',

	        //otherSettings:{},

	        carrierId:'carrierId'

		},

		'abf-ltl' :{

			// licenseKey:'licenseKey',

			speedfreightUsername:'hubId',

			//otherSettings:{},

            carrierId:'carrierId'

		},

		'rl': {

			// licenseKey:'licenseKey',

			accountNumber:'accountNumber',

            speedfreightUsername:'userName',

            speedfreightPassword:'password',

            authenticationKey:'authenticationKey',

            //otherSettings:{},

            carrierId:'carrierId'

		},

		'ups-ltl' : {

			// licenseKey:'licenseKey',

			accountNumber:'accountNumber',

            speedfreightUsername:'userName',

            speedfreightPassword:'password',

            authenticationKey:'UPSAPIAccessKey',

            otherSettings:{

            	 accessLevel:'accessLevel'

            },

            carrierId:'carrierId',

		},

		'ups-small' : {

			// licenseKey:'licenseKey',

			accountNumber:'accountNumber',

            speedfreightUsername:'userName',

            authenticationKey:'UPSAPIAccessKey',

            speedfreightPassword:'password',

            //otherSettings:{},

            carrierId:'carrierId'

		},

		'wwe-ltl' : {

			// licenseKey:'licenseKey',

			accountNumber:'accountNumber',

            speedfreightUsername:'userName',

            speedfreightPassword:'password',

            authenticationKey:'authenticationKey',

            //otherSettings:'',

            carrierId:'carrierId'

		},

		'wwe-small' : {

			// licenseKey:'licenseKey',

			accountNumber:'accountNumber',

            speedfreightUsername:'userName',

            speedfreightPassword:'password',

            authenticationKey:'authenticationKey',

            //otherSettings:'',

            carrierId:'carrierId'

		},

		'xpo-ltl' : {

			// licenseKey:'licenseKey',

			accountNumber:'accountNumber',

            speedfreightUsername:'userName',

            speedfreightPassword:'password',

            otherSettings:{

            	otherSettingsbillingPostalCode:'postalCode',

                thirdPartyAccountNumber:'BillToAccountNumber',

                accessToken:'APIKey',

                requestType:'requestType',

            },

            carrierId:'carrierId'

		}



	};

	return data[$type];

}

function spConnectionField_new($type){

	var data = {

		'fedex-ltl' : {

			account_number:'billingAccountNumber',

            username:'meterNumber',

            password:'password',

            license_key:'authenticationKey',

            fedex_account_number:'shipperAccountNumber',

            otherSettings: {

            	shipperAddress:'shipperAddress',

                shipperCity:'shipperCity',

                shipperState:'shipperState',

                shipperZip:'shipperZip',

                shipperCountry:'shipperCountry',

                physicalAddress:'physicalAddress',

                physicalCity:'physicalCity',

                physicalState:'physicalState',

                physicalZip:'physicalZip',

                physicalCountry:'physicalCountry',

                thirdPartyAccountNumber:'thirdPartyAccountNumber',

            },

            carrierId:'carrierId'

		},

		'fedex-small':{

			account_number:'accountNumber',

	        username:'meterNumber',

	        password:'password',

	        license_key:'authenticationKey',

	        //otherSettings:{},

	        carrierId:'carrierId'

		},

		'abf-ltl' :{

			username:'hubId',

			//otherSettings:{},

            carrierId:'carrierId'

		},

		'rl': {

			account_number:'accountNumber',

            username:'userName',

            password:'password',

            license_key:'authenticationKey',

            //otherSettings:{},

            carrierId:'carrierId'

		},

		'ups-ltl' : {

			account_number:'accountNumber',

            username:'userName',

            password:'password',

            license_key:'UPSAPIAccessKey',

            otherSettings:{

            	 accessLevel:'accessLevel'

            },

            carrierId:'carrierId',

		},

		'ups-small' : {

			account_number:'accountNumber',

            username:'userName',

            license_key:'UPSAPIAccessKey',

            password:'password',

            //otherSettings:{},

            carrierId:'carrierId'

		},

		'wwe-ltl' : {

			account_number:'accountNumber',

            username:'userName',

            password:'password',

            license_key:'authenticationKey',

            //otherSettings:'',

            carrierId:'carrierId'

		},

		'wwe-small' : {

			account_number:'accountNumber',

            username:'userName',

            password:'password',

            license_key:'authenticationKey',

            //otherSettings:'',

            carrierId:'carrierId'

		},

		'xpo-ltl' : {

			account_number:'accountNumber',

            username:'userName',

            password:'password',

            otherSettings:{

            	otherSettingsbillingPostalCode:'postalCode',

                thirdPartyAccountNumber:'BillToAccountNumber',

                accessToken:'APIKey',

                requestType:'requestType',

            },

            carrierId:'carrierId'

		}



	};

	return data[$type];

}

function submitQuote(){


	var fd , serializedValues , form ,disabled;

	fd = new FormData();

	form = jQuery('#quoteSettingForm');

	disabled = form.find(':input:disabled').removeAttr('disabled');

	serializedValues = form.serializeArray();

	disabled.attr('disabled','disabled');

	var selected_carrier = jQuery('#selected_carrier_name').val();

	if(selected_carrier != ''){

		var fields = {};

		

		fields = spQuoteField( selected_carrier );	



		jQuery.each(fields,function(fieldname,fieldval){

			fd.append(fieldname,'');

		});

	}

	

	jQuery.each(serializedValues, function (key, input) {

		fd.append(input.name,input.value);

	});

	fd.append( 'action', 'sp_save_quote_setting' );

	jQuery(loading_div).appendTo(form);

	jQuery.ajax({

		url: ajaxurl,

		data:fd,

		type: 'POST',

		dataType: 'json',

		processData : false,

		contentType : false,

		success : function(response){
			jQuery( loading_class ).remove();
			if(response.success){

			notificationAlert('Success!','success','Settings Saved Successfully');
			}else{
				notificationAlert('Failed!','warning',response.message);
			}
		},
		error:function(a,b,error){
			alert(error);
		}

	});

}

function spQuoteField($type){

	var data = {

		'fedex-ltl' : {

			carrier_label:'carrier_label',

			FEDEX_FREIGHT_ECONOMY:'FEDEX_FREIGHT_ECONOMY',

			FEDEX_FREIGHT_PRIORITY:'FEDEX_FREIGHT_PRIORITY',

			show_delivery_estimate:'show_delivery_estimate',

			cut_off_time:'cut_off_time',

			fulfillment_offset_days:'fulfillment_offset_days',

			residential_delivery:'residential_delivery',

			residential_auto_detection:'residential_auto_detection',

			lift_gate_delivery:'lift_gate_delivery',

			carrier_lift_gate_delivery_as_option:'carrier_lift_gate_delivery_as_option',

			liftgate_auto_detection:'liftgate_auto_detection',

			holdAtTerminal:'holdAtTerminal',

			holdAtTerminalFee:'holdAtTerminalFee',

			handling_fee:'handling_fee',

			discount_enable:'discount_enable',

			promotional_discount:'promotional_discount',

			po_box_services:'po_box_services',

			orderNote:'orderNote'

		},

		'ups-ltl' : {

			carrier_label:'carrier_label',

            show_delivery_estimate:'show_delivery_estimate',

            residential_delivery:'residential_delivery',

            residential_auto_detection:'residential_auto_detection',

            unconfirmed_default_commercial:'unconfirmed_default_commercial',

            lift_gate_delivery:'lift_gate_delivery',

            carrier_lift_gate_delivery_as_option:'carrier_lift_gate_delivery_as_option',

            liftgate_auto_detection:'liftgate_auto_detection',

            weight_handling_unit:'weight_handling_unit',

            handling_fee:'handling_fee',

            po_box_services:'po_box_services',

            relationship:'relationship',

            thirpartycountry:'thirpartycountry',

            thirdparty_postal_code:'thirdparty_postal_code'

		},

		'abf-ltl' : {

			carrier_label:'carrier_label',

			show_delivery_estimate:'show_delivery_estimate',

			show_guranteed_options:'show_guranteed_options',

			cut_off_time:'cut_off_time',

			fulfillment_offset_days:'fulfillment_offset_days',

			residential_delivery:'residential_delivery',

			residential_auto_detection:'residential_auto_detection',

			lift_gate_delivery:'lift_gate_delivery',

			carrier_lift_gate_delivery_as_option:'carrier_lift_gate_delivery_as_option',

			liftgate_auto_detection:'liftgate_auto_detection',

			holdAtTerminal:'holdAtTerminal',

			holdAtTerminalFee:'holdAtTerminalFee',

			handling_fee:'handling_fee',

			only_po_box_services:'only_po_box_services',

			orderNote:'orderNote'

		},

		'fedex-small':{

			domestic:{

				FEDEX_HOME_DELIVERY:'FEDEX_HOME_DELIVERY',

				FEDEX_GROUND:'FEDEX_GROUND',

				FEDEX_EXPRESS_SAVER:'FEDEX_EXPRESS_SAVER',

				FEDEX_2_DAY:'FEDEX_2_DAY',

				FEDEX_2_DAY_AM:'FEDEX_2_DAY_AM',

				STANDARD_OVERNIGHT:'STANDARD_OVERNIGHT',

				PRIORITY_OVERNIGHT:'PRIORITY_OVERNIGHT',

				FIRST_OVERNIGHT:'FIRST_OVERNIGHT',

				SMART_POST:'SMART_POST'

			},

            international:{

				INTERNATIONAL_DISTRIBUTION_FREIGHT:'INTERNATIONAL_DISTRIBUTION_FREIGHT',

				INTERNATIONAL_ECONOMY:'INTERNATIONAL_ECONOMY',

				INTERNATIONAL_ECONOMY_DISTRIBUTION:'INTERNATIONAL_ECONOMY_DISTRIBUTION',

				INTERNATIONAL_ECONOMY_FREIGHT:'INTERNATIONAL_ECONOMY_FREIGHT',

				INTERNATIONAL_FIRST:'INTERNATIONAL_FIRST',

				INTERNATIONAL_PRIORITY:'INTERNATIONAL_PRIORITY',

				INTERNATIONAL_PRIORITY_DISTRIBUTION:'INTERNATIONAL_PRIORITY_DISTRIBUTION',

				INTERNATIONAL_PRIORITY_FREIGHT:'INTERNATIONAL_PRIORITY_FREIGHT',

				PRIORITY_OVERNIGHT:'PRIORITY_OVERNIGHT',

				STANDARD_OVERNIGHT:'STANDARD_OVERNIGHT',

				FEDEX_GROUND:'FEDEX_GROUND'

            },

            show_delivery_estimate:'show_delivery_estimate',

            cut_off_time:'cut_off_time',

            day_monday:'day_monday',

            day_tuesday:'day_tuesday',

            day_wednesday:'day_wednesday',

            day_thursday:'day_thursday',

            day_friday:'day_friday',

            day_saturday:'day_saturday',

            day_sunday:'day_sunday',

            fulfillment_offset_days:'fulfillment_offset_days',

            residential_delivery:'residential_delivery',

            residential_auto_detection:'residential_auto_detection',

            ground_hazardous_only:'ground_hazardous_only',

            ground_hazardous_fee:'ground_hazardous_fee',

            air_hazardous_fee:'air_hazardous_fee',

            po_box_services:'po_box_services',

            handling_fee:'handling_fee',

            negotiated_rates:'negotiated_rates'

		},

		'rl' : {

			carrier_label:'carrier_label',

            standard_service:'standard_service',

            guranteed_pm:'guranteed_pm',

            guaranteed_am:'guaranteed_am',

            guaranteed_hourly:'guaranteed_hourly',

            show_delivery_estimate:'show_delivery_estimate',

            residential_delivery:'residential_delivery',

            residential_auto_detection:'residential_auto_detection',

            lift_gate_delivery:'lift_gate_delivery',

            carrier_lift_gate_delivery_as_option:'carrier_lift_gate_delivery_as_option',

            liftgate_auto_detection:'liftgate_auto_detection',

            holdAtTerminal:'holdAtTerminal',

            holdAtTerminalFee:'holdAtTerminalFee',

            handling_fee:'handling_fee',

            free_shipping_threshhold:'free_shipping_threshhold',

            po_box_services:'po_box_services',

            orderNote:'orderNote'

		},

        'ups-small' : {

        	domestic:{

				UPS_GROUND:'UPS_GROUND',

				UPS_2ND_DAY:'UPS_2ND_DAY',

				UPS_2ND_DAY_AM:'UPS_2ND_DAY_AM',

				UPS_NEXT_DAY_AIR:'UPS_NEXT_DAY_AIR',

				UPS_NEXT_DAY_AIR_SAVER:'UPS_NEXT_DAY_AIR_SAVER',

				UPS_NEXT_DAY_AIR_EARLY:'UPS_NEXT_DAY_AIR_EARLY',

				UPS_THREE_DAY_SELECT:'UPS_THREE_DAY_SELECT',

        	},

            international:{

            	UPS_STANDARD_INTERNATIONAL:'UPS_STANDARD_INTERNATIONAL',

	            UPS_WORLDWIDE_EXPEDITED:'UPS_WORLDWIDE_EXPEDITED',

	            UPS_WORLDWIDE_SAVER:'UPS_WORLDWIDE_SAVER',

	            UPS_WORLDWIDE_EXPRESS:'UPS_WORLDWIDE_EXPRESS',

	            UPS_WORLDWIDE_EXPRESS_PLUS:'UPS_WORLDWIDE_EXPRESS_PLUS'

            },

            show_delivery_estimate:'show_delivery_estimate',

            cut_off_time:'cut_off_time',

            day_monday:'day_monday',

            day_tuesday:'day_tuesday',

            day_wednesday:'day_wednesday',

            day_thursday:'day_thursday',

            day_friday:'day_friday',

            day_saturday:'day_saturday',

            day_sunday:'day_sunday',

            fulfillment_offset_days:'fulfillment_offset_days',

            residential_delivery:'residential_delivery',

            residential_auto_detection:'residential_auto_detection',

            ground_hazardous_only:'ground_hazardous_only',

            ground_hazardous_fee:'ground_hazardous_fee',

            air_hazardous_fee:'air_hazardous_fee',

            po_box_services:'po_box_services',

            handling_fee:'handling_fee',

            negotiated_rates:'negotiated_rates'

        },

        'wwe-ltl' : {

        	rating_method:'rating_method',

            number_of_options:'number_of_options',

            carrier_label:'carrier_label',

            show_delivery_estimate:'show_delivery_estimate',

            residential_pickup:'residential_pickup',

            residential_delivery:'residential_delivery',

            residential_auto_detection:'residential_auto_detection',

            liftgate_pickup:'liftgate_pickup',

            lift_gate_delivery:'lift_gate_delivery',

            carrier_lift_gate_delivery_as_option:'carrier_lift_gate_delivery_as_option',

            liftgate_auto_detection:'liftgate_auto_detection',

            weight_handling_unit:'weight_handling_unit',

            handling_fee:'handling_fee',

            po_box_services:'po_box_services'

        },             

        'wwe-small':{

        	domestic: {

				UPS_GROUND:'UPS_GROUND',

				UPS_SECOND_DAY_AIR:'UPS_SECOND_DAY_AIR',

				UPS_SECOND_DAY_AIR_AM:'UPS_SECOND_DAY_AIR_AM',

				UPS_NEXT_DAY_AIR:'UPS_NEXT_DAY_AIR',

				UPS_NEXT_DAY_AIR_SAVER:'UPS_NEXT_DAY_AIR_SAVER',

				UPS_NEXT_DAY_AIR_EARLY:'UPS_NEXT_DAY_AIR_EARLY',

				UPS_THREE_DAY_SELECT:'UPS_THREE_DAY_SELECT',

        	},

            show_delivery_estimate:'show_delivery_estimate',

            residential_delivery:'residential_delivery',

            residential_auto_detection:'residential_auto_detection',

            ground_hazardous_only:'ground_hazardous_only',

            ground_hazardous_fee:'ground_hazardous_fee',

            air_hazardous_fee:'air_hazardous_fee',

            po_box_services:'po_box_services',

            handling_fee:'handling_fee'

        },

        'xpo-ltl' : {

        	carrier_label:'carrier_label',

            show_delivery_estimate:'show_delivery_estimate',

            residential_delivery:'residential_delivery',

            residential_auto_detection:'residential_auto_detection',

            unconfirmed_default_commercial:'unconfirmed_default_commercial',

            lift_gate_delivery:'lift_gate_delivery',

            carrier_lift_gate_delivery_as_option:'carrier_lift_gate_delivery_as_option',

            liftgate_auto_detection:'liftgate_auto_detection',

            holdAtTerminal:'holdAtTerminal',

            holdAtTerminalFee:'holdAtTerminalFee',

            handling_fee:'handling_fee',

            po_box_services:'po_box_services',

            orderNote:'orderNote'

        }

	}

	return data[$type]

}

function SubmitAddBox(){

	var fd = new FormData();

	if(jQuery('#addboxsizeform').valid()){

		var $form = jQuery('#addboxsizeform');

		jQuery(loading_div).appendTo( $form );

		var serializedValues = jQuery('#addboxsizeform').serializeArray();



		jQuery.each(serializedValues, function (key, input) {

		 	fd.append(input.name,input.value);

		});

		fd.append('action','sp_add_box');

		jQuery.ajax({

			url : ajaxurl,

			data : fd,

			type: 'POST',

			dataType: 'json',

			contentType: false,

	        processData: false,

			success: function( response ){

				jQuery( loading_class ).remove();

				if(response.success){

					$form.closest('.modal-content').find('.response').prepend( response.message );

					$form[0].reset();

					setTimeout(function(){

						$form.closest('.modal-content').find('.response span').remove()

					},1000);

					document.location.reload();

				}

			}

		});

	}

}

function submitEditBox(){

	var fd = new FormData();

	if(jQuery('#editboxsizeform').valid()){

		var $form = jQuery('#editboxsizeform');

		jQuery(loading_div).appendTo( $form );

		var serializedValues = jQuery('#editboxsizeform').serializeArray();



		jQuery.each(serializedValues, function (key, input) {

		 	fd.append(input.name,input.value);

		});

		fd.append('action','sp_edit_box');

		jQuery.ajax({

			url : ajaxurl,

			data : fd,

			type: 'POST',

			dataType: 'json',

			contentType: false,

	        processData: false,

			success: function( response ){

				jQuery( loading_class ).remove();

				if(response.success){

					$form.closest('.modal-content').find('.response').prepend( response.message );

					setTimeout(function(){

						$form.closest('.modal-content').find('.response span').remove()

					},1000);

					document.location.reload();

				}

			}

		});

	}

}
$('#copyBillingToPhysicalCheckbox').change(function(){
        if($('#copyBillingToPhysicalCheckbox').prop('checked')){
          $('input[name="physicalAddress"').val($('input[name="shipperAddress"]').val());
          $('input[name="physicalCity"').val($('input[name="shipperCity"]').val());
          $('input[name="physicalState"').val($('input[name="shipperState"]').val());
          $('input[name="physicalZip"').val($('input[name="shipperZip"]').val());
          $('input[name="physicalCountry"').val($('input[name="shipperCountry"]').val());
        }
        else{
          $('input[name="physicalAddress"').val('');
          $('input[name="physicalCity"').val('');
          $('input[name="physicalState"').val('');
          $('input[name="physicalZip"').val('');
          $('input[name="physicalCountry"').val('');

        }
      });
function TestCarrier(){

	var fd = new FormData();

   	var fields = {};

   	var otherSettings = {};

   	var other_settings = {};

   	if(jQuery('#connectionSettingForm').valid()){
   		jQuery(loading_div).appendTo(jQuery('#connectionSettingForm'));

   		$form = jQuery('#connectionSettingForm');

		jQuery(loading_div).appendTo($form);



	    var serializedValues = jQuery('#connectionSettingForm').serializeArray();

	    var selected_carrier = jQuery('#selected_carrier_name').val();

	    fields = spConnectionField( selected_carrier );

	    if(!jQuery.isEmptyObject(fields.otherSettings) ){

	    	otherSettings =  fields.otherSettings;

	    }



	    jQuery.each(serializedValues, function (key, input) {

			jQuery.each(fields,function(tablefield, inputfield) {

				if(inputfield === input.name){

					fd.append(tablefield, input.value);			

				}

			});

			if(!jQuery.isEmptyObject( otherSettings ) ){

				jQuery.each(otherSettings,function(tablefield, inputfield) {

					if(inputfield === input.name){

						other_settings[tablefield]  = input.value;			

					}

				});

			}

			if(input.name == 'edit_id'){

				fd.append('edit_id',input.value);

			}

	    });



	    if(!jQuery.isEmptyObject( other_settings ) ){

	    	jQuery.each(other_settings,function(field,val){

		    	fd.append('otherSettings['+field+']' , val );

		    });	

	    }
	    fd.append('test_connection',1);

	    fd.append('action' , 'sp_test_carrier_connections' );

		jQuery.ajax({

			url : ajaxurl,

			data : fd,

			type: 'POST',

			dataType: 'json',

			contentType: false,

	        processData: false,

			success: function( response ){
				console.log(response);

				jQuery( loading_class ).remove();
				response=JSON.parse(response.body);
				console.log(response);

				if(response.success==1){
					notificationAlert('Success!','success',response.message);
		        }
		        else{
		        	notificationAlert('Failed!','warning',response.message);
		        }

			},
			error:function(a,b,error){
				jQuery( loading_class ).remove();
				alert(error);
			}

		});

	}

}

function licenseSave(){
	jQuery(loading_div).appendTo(jQuery('#licenseForm'));
	var fd=new FormData();
	    fd.append('license' , $('#licenseText').val() );
	    fd.append('shop' , $('#shop').val() );
	    fd.append('action' , 'save_license' );


	jQuery.ajax({

			url : ajaxurl,

			data : fd,

			type: 'POST',

			dataType: 'json',

			contentType: false,

	        processData: false,

			success: function( response ){
				jQuery( loading_class ).remove();
				if(response=="1"){
					notificationAlert('Success!','success','license verification completed! Saved successfully')
				}
				else if(response=="2"){
					$('#enabledCarriersCheckboxes').modal('show');
				}
				else{
					notificationAlert('ERROR!','error','license verification Failed! Saved Failed')

				}


			},
			error:function(a,b,error){
				jQuery( loading_class ).remove();
				notificationAlert('ERROR!','error','some error occurred')
			}

		});

}
function disableCarriers(){
    var selected = [];
    $('#enabledCarriersDiv input:checked').each(function() {
        selected.push($(this).attr('id'));
    });
    console.log(selected);
    var carriers=JSON.stringify(selected);
	jQuery(loading_div).appendTo($('#enabledCarriersDiv'));
    if(selected.length>0){
	    $.ajax({

	                url: ajaxurl,

	                type: 'POST',

	               data:{

						'action' : 'disable_carriers',

						'carriers' : selected,

					},

	                dataType: 'json',

	                success: function(response){
	                	jQuery( loading_class ).remove();
	                   if(response.success){
	                   	notificationAlert('Successfully Disabled','info','Carrier is Disabled!');
	                   	document.location.reload()
	                   }else{
	                	notificationAlert('Error','error','Some Error Occured. try refreshing page');
	                   }

	       

	                },//when unable to get zip code

	              error: function(XMLHttpRequest, textStatus, errorThrown) 

	              {
	              	jQuery( loading_class ).remove();

	                notificationAlert('Error','error','Some Error Occured. try refreshing page');
	              }
	            });
		}
  }

function GetRates(){

	var $form;

	var fd = new FormData();

	$form = jQuery('#testrateform');

	if($form.valid()){

		jQuery(loading_div).appendTo($form);

	    var serializedValues = jQuery('#testrateform').serializeArray();



	    jQuery.each(serializedValues, function (key, input) {

	    	fd.append(input.name,input.value);

	    });

	    fd.append('action','sp_get_test_rate');

	    jQuery.ajax({

	    	url: ajaxurl,

	    	data:fd,

	    	type:'post',

	    	dataType:'json',

	    	processData: false,

	    	contentType:false,

	    	success:function(response){

	    		jQuery( loading_class ).remove();

	    		if(response.success){

	    			jQuery('.rate-response').html(response.html);

	    		}

	    	}

	    });

    }

}