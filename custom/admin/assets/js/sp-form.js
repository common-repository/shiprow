jQuery(document).ready(function($) {
	//form validation script
	var warehouseform = $('#warehouse_form');
	warehouseform.validate({
		errorElement: 'span',
		errorClass: 'help-block help-block-error',
		rules: {
			zipcode:{
				required: true,
			}
		},
		messages: {
			zipcode: 'Please enter the zipcode.',
		}
	});

	//product setting page form (view form)
	var parentviewsetting = $('sp_product_meta_form');
	parentviewsetting.validate({
		errorElement: 'span',
		errorClass: 'help-block help-block-error',
		rules: {
			"_weight[]":{
				/*required: true,*/
				number: true
			}
		},
		messages: {
			"_weight[]": 'Please enter the number.',
		}
	});
	jQuery.validator.addClassRules("_weight", {
	 	number: true
	});
	jQuery.validator.setDefaults({
	  debug: true,
	  success: "valid"
	});

	//connection setting form
	var connectionSettingForm = $('#connectionSettingForm');
	connectionSettingForm.validate({
		errorElement: 'span',
		errorClass: 'help-block help-block-error',
	});
	//add box size 
	var addboxsizeform  = $('#addboxsizeform');
	addboxsizeform.validate({
		errorElement: 'span',
		errorClass: 'help-block help-block-error',
		
	});
	//testrateform
	var testrateform  = $('#testrateform');
	testrateform.validate({
		errorElement: 'span',
		errorClass: 'help-block help-block-error',
		
	});
});