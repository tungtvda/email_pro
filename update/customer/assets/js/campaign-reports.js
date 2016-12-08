/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
 */
jQuery(document).ready(function($){
	
	var ajaxData = {};
	if ($('meta[name=csrf-token-name]').length && $('meta[name=csrf-token-value]').length) {
			var csrfTokenName = $('meta[name=csrf-token-name]').attr('content');
			var csrfTokenValue = $('meta[name=csrf-token-value]').attr('content');
			ajaxData[csrfTokenName] = csrfTokenValue;
	}
	
    $(document).on('click', '#bulk_select_all', function(){
        if ($(this).is(':checked')) {
            $('.bulk-selected-options').slideDown();
        } else {
            $('.bulk-selected-options').slideUp();
        }
    });
    
    $(document).on('click', '.bulk-select', function(){
        if ($(this).is(':checked')) {
            $('.bulk-selected-options').slideDown();
        }
    });
    
    $(document).on('change', '.bulk-action', function(){
        var $this = $(this);
        var val = $this.val();
        var serializedCheckboxData = $('.bulk-select:checked').serialize();
        
        $('#bulk_select_all, .bulk-select').removeAttr('checked');
        $('.bulk-selected-options').slideUp();
        $('.bulk-action option').removeAttr('selected');
        
        if (val) {
            var proceed = true;
            
            if (val == 'delete' && !confirm($this.data('delete'))) {
                proceed = false;
            }
            
            if (proceed) {
                var formData = $.param(ajaxData) + '&action=' + val + '&' + serializedCheckboxData;
        		$.post($this.data('bulkurl'), formData, function(){
                    $('#' + $('.grid-view:first').attr('id')).yiiGridView('update');
        		});    
            }
        }
    });

});