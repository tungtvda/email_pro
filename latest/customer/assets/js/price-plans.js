/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
jQuery(document).ready(function($){
	
	var ajaxData = {};
	if ($('meta[name=csrf-token-name]').length && $('meta[name=csrf-token-value]').length) {
			var csrfTokenName = $('meta[name=csrf-token-name]').attr('content');
			var csrfTokenValue = $('meta[name=csrf-token-value]').attr('content');
			ajaxData[csrfTokenName] = csrfTokenValue;
	}
	
    $('.btn-do-order').on('click', function(){  
        $('form#payment-options-form #plan_uid').val($(this).data('plan-uid'));
    });	
    
    if ($('#PricePlanOrderNote_note').length) {
        $('form').on('submit', function(){
            var $this = $(this);
            if (!$this.find('#PricePlanOrderNote_note_fake').length) {
                $this.append('<input type="hidden" name="PricePlanOrderNote[note]" id="PricePlanOrderNote_note_fake"/>');
            }
            $this.find('#PricePlanOrderNote_note_fake').val($('#PricePlanOrderNote_note').val());
        });
    }
});