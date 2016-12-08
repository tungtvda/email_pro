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
    
    $('ul.list-forms-nav li a').on('click', function(){
        var $lis = $('ul.list-forms-nav li');
        var $li = $(this).closest('li');
        if (!$li.is('.active')) {
            $lis.removeClass('active');
            $li.addClass('active');
            $('.form-container').hide();
            $($(this).attr('href')).show();
        }
        return false;
    });
});