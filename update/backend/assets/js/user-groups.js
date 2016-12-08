/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.5
 */
jQuery(document).ready(function($){
	
	var ajaxData = {};
	if ($('meta[name=csrf-token-name]').length && $('meta[name=csrf-token-value]').length) {
			var csrfTokenName = $('meta[name=csrf-token-name]').attr('content');
			var csrfTokenValue = $('meta[name=csrf-token-value]').attr('content');
			ajaxData[csrfTokenName] = csrfTokenValue;
	}
    
    $('a.allow-all').on('click', function(){
        $(this).closest('div.box-body').find('select').val('allow');
        return false;
    });
    $('a.deny-all').on('click', function(){
        $(this).closest('div.box-body').find('select').val('deny');
        return false;
    });
    $('.btn-save-route-access').on('click', function(){
        var $this = $(this), $form = $this.closest('form');
        $.post('', $form.serialize(), function(){
            $this.text($this.data('init-text')).removeClass('disabled').removeAttr('disabled');
        });
        return false;
    });
});