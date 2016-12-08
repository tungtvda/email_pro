jQuery(document).ready(function($){

	$('select#OptionCommon_clean_urls').on('change', function(){
		var $this = $(this), $wrapper = $this.parent().parent();
		if ($this.val() == 1) {
			$wrapper.find('.form-group').eq(0).addClass('col-lg-8');
			$wrapper.find('.form-group').eq(1).show();
		} else {
			$wrapper.find('.form-group').eq(1).hide();
			$wrapper.find('.form-group').eq(0).removeClass('col-lg-8');
		}
	});
	
	$(document).on('click', 'button.btn-write-htaccess', function(){
		var $this = $(this);
		$this.button('loading');
		$.get($this.data('remote'), {}, function(json){
			$this.button('reset');
			var notifyContainer = notify.getOption('container');
			notify.remove();
			notify.setOption('container', '.modal-message');
			if (json.result === 'success') {
				notify.addSuccess(json.message);
			} else {
				notify.addError(json.message);	
			}
			notify.show();
			notify.setOption('container', notifyContainer);
		}, 'json');
	});
    
    $('a.add-dnsbl').on('click', function(){
        $('#dnsbl-list').append($('#dnsbl-item').html());
        return false;
    });
    
    $(document).on('click', 'a.remove-dnsbl', function() {
        $(this).closest('.form-group').fadeOut('slow', function() {
            $(this).remove();
        });
        return false;
    });
    
    $('a.add-campaign-allowed-extension').on('click', function(){
        $('#campaign-allowed-ext-list').append($('#campaign-allowed-ext-item').html());
        return false;
    });
    
    $(document).on('click', 'a.remove-campaign-allowed-ext', function() {
        $(this).closest('.form-group').fadeOut('slow', function() {
            $(this).remove();
        });
        return false;
    });
    
    $('a.add-campaign-allowed-mime').on('click', function(){
        $('#campaign-allowed-mime-list').append($('#campaign-allowed-mime-item').html());
        return false;
    });
    
    $(document).on('click', 'a.remove-campaign-allowed-mime', function() {
        $(this).closest('.form-group').fadeOut('slow', function() {
            $(this).remove();
        });
        return false;
    });
    
    if ($('#OptionCustomerSending_action_quota_reached').length) {
        $('#OptionCustomerSending_action_quota_reached').on('change', function(){
            var val = $(this).val();
            if (val == 'move-in-group') {
                $('#OptionCustomerSending_move_to_group_id').closest('div').show();
            } else {
                $('#OptionCustomerSending_move_to_group_id').closest('div').hide();
            }
        });
    }
    
    $('.customization-clear-logo').on('click', function(){
        var def = $(this).data('default');
        if (!def) {
            return false;
        }
        $(this).closest('div').find('img:first').attr('src', def);
        $(this).closest('div').parent('div').find('input[type=hidden]').val('');
        return false;
    });
    
});