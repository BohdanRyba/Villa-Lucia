jQuery(document).ready(function() {
    // Reservation Form	
	var reservationform = $('#reservationform');
    var reservationMessages = $('#message');
	$(reservationform).validate({
		submitHandler: function(form) {
			var data = $(form).serialize();
			$.ajax({
				type: 'POST',
				url: $(form).attr('action'),
				data: data,
				success: function(data) {					
					$('#booking-totalNights').html($('input[name="price-day"]').val());
					$('#booking-final').html($('input[name="price-total"]').val());	
					$('#booking-adults').html($('#adults').val());	
					$('#booking-children').html($('#children').val());	
					$('#booking-in').html($.datepicker.formatDate("dd.mm.yy", $('#checkin').datepicker('getDate')));
					$('#booking-out').html($.datepicker.formatDate("dd.mm.yy", $('#checkout').datepicker('getDate')));
					$('#booking-prepayment').html($('input[name="price-prepayment"]').val());
					$('#booking-modal').modal('show');
				}
			})
			return false;
		},
		invalidHandler: function(event, validator) {
			var form = $(this);
			var errors = validator.numberOfInvalids();
			if (errors) {
				//
			}
		},
		showErrors: function(errorMap, errorList) {},
		errorClass : 'error-flag'
	});
	
    // Reservation Form	
	var reservationform = $('#bookform');
	$(reservationform).validate({
		submitHandler: function(form) {
			var data = $(form).serialize();
			$.ajax({
				type: 'POST',
				url: $(form).attr('action'),
				data: data,
				success: function(data) {		
					$('#message-firstname').html($('#firstname').val());		
					$('#thanks-modal').modal('show');			
					$('#booking-modal').modal('hide');	
					
					$('#reservationform')[0].reset();
					$('#reservationform input').val('');
					$('#bookform')[0].reset();
					$('#bookform input').val('');
				}
			})
			return false;
		},
		invalidHandler: function(event, validator) {
			var form = $(this);
			var errors = validator.numberOfInvalids();
			if (errors) {
				//
			}
		},
		showErrors: function(errorMap, errorList) {}
	});
	
    // Contact Form
    var contactform = $('#contactform');
    var contactMessages = $('#message');
    $(contactform).submit(function(e) {
        $(contactMessages).slideUp(750);
        $(contactMessages).hide();
        e.preventDefault();
        var formData = $(contactform).serialize();
        var action = $(this).attr('action');
        $.post(action, $(contactform).serialize(),
            function(data) {
                if (data.match('success') != null) $('#contactform .form-group, #contactform .btn').slideUp('slow');
                if (data.match('success') != null) $('#email').val('');
            }
        ).done(function(response) {
            $(contactMessages).html(response).slideDown(400);
        })
    });
});