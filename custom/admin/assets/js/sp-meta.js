//admin meta js
jQuery(document).ready(function($) {
	
    //jQuery("input:radio[name=freight_small]:first").attr('checked', true);
    jQuery('.wc-metaboxes-wrapper').on( 'change', 'input:radio.freight_small_radio', function(event) {
        var $this, parent;
        $this = jQuery(this);
        parent = $this.closest('.sp_meta_fields');
        console.log('variation-product');
        if(this.value == "freight_enable"){
            parent.find('.pro-radio-change').addClass('hide');
            parent.find('.pro-radio-change.freight').removeClass('hide');
            parent.find('.small_package .input:checked').removeAttr('checked');
        }else if(this.value == "small_enable"){
            parent.find('.pro-radio-change').addClass('hide');
            parent.find('.pro-radio-change.small_package').removeClass('hide');
            parent.find('.freight select.input').val(0);
        }
    });
    jQuery(document).on('woocommerce_variations_loaded',function(){
        jQuery('.woocommerce_variations .sp_meta_fields .pro-radio-change').addClass('hide');
        jQuery('.woocommerce_variations .sp_meta_fields input.freight_small_radio:checked').trigger('change');
    });

    jQuery('.sp_meta_fields .pro-radio-change').addClass('hide');
    //jQuery("input:radio[name=freight_small]:first").attr('checked', true);
    setTimeout(function(){
        jQuery('.sp_meta_fields input:radio.freight_small_radio:checked').trigger('change');
    },300);
    jQuery('.sp_meta_fields').on( 'change','input:radio.freight_small_radio', function(event) {
        console.log('simple-product');
        if(this.value == "freight_enable"){
            jQuery('.pro-radio-change').addClass('hide');
            jQuery('.pro-radio-change.freight').removeClass('hide');
            jQuery('.small_package .input:checked').removeAttr('checked');
        }else if(this.value == "small_enable"){
            jQuery('.pro-radio-change').addClass('hide');
            jQuery('.pro-radio-change.small_package').removeClass('hide');
            jQuery('.freight select.input').val(0);
        }
    });

});