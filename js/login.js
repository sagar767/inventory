(function($) {
	"use strict";

	// Options for Message
	//----------------------------------------------
	var options = {
		'btn-loading' : '<i class="fa fa-spinner fa-pulse"></i>',
		'btn-success' : '<i class="fa fa-check"></i>',
		'btn-error' : '<i class="fa fa-remove"></i>',
		'msg-success' : 'All Good! Redirecting...',
		'msg-error' : 'Wrong login credentials!',
		'useAJAX' : true,
	};

	// Login Form
	//----------------------------------------------
	// Validation
	$("#login-form").validate({
		rules : {
			lg_username : "required",
			lg_password : "required",
		},
		errorClass : "form-invalid"
	});

	// Form Submission
	$("#login-form").submit(function() {
		remove_loading($(this));

		if (options['useAJAX'] == true) {
			// Dummy AJAX request (Replace this with your AJAX code)
			// If you don't want to use AJAX, remove this
			dummy_submit_form($(this));

			// Cancel the normal submission.
			// If you don't want to use AJAX, remove this
			return false;
		}
	});

	// Register Form
	//----------------------------------------------
	// Validation
	$("#register-form").validate({
		rules : {
			reg_username : "required",
			reg_password : {
				required : true,
				minlength : 5
			},
			reg_password_confirm : {
				required : true,
				minlength : 5,
				equalTo : "#register-form [name=reg_password]"
			},
			reg_email : {
				required : true,
				email : true
			},
			reg_agree : "required",
		},
		errorClass : "form-invalid",
		errorPlacement : function(label, element) {
			if (element.attr("type") === "checkbox" || element.attr("type") === "radio") {
				element.parent().append(label);
				// this would append the label after all your checkboxes/labels (so the error-label will be the last element in <div class="controls"> )
			} else {
				label.insertAfter(element);
				// standard behaviour
			}
		}
	});

	// Form Submission
	$("#register-form").submit(function() {
		remove_loading($(this));

		if (options['useAJAX'] == true) {
			// Dummy AJAX request (Replace this with your AJAX code)
			// If you don't want to use AJAX, remove this
			dummy_submit_form($(this));

			// Cancel the normal submission.
			// If you don't want to use AJAX, remove this
			return false;
		}
	});

	// Forgot Password Form
	//----------------------------------------------
	// Validation
	$("#forgot-password-form").validate({
		rules : {
			fp_email : "required",
		},
		errorClass : "form-invalid"
	});

	// Form Submission
	$("#forgot-password-form").submit(function() {
		remove_loading($(this));

		if (options['useAJAX'] == true) {
			// Dummy AJAX request (Replace this with your AJAX code)
			// If you don't want to use AJAX, remove this
			dummy_submit_form($(this));

			// Cancel the normal submission.
			// If you don't want to use AJAX, remove this
			return false;
		}
	});

	// Loading
	//----------------------------------------------
	function remove_loading($form) {
		$form.find('[type=submit]').removeClass('error success');
		$form.find('.login-form-main-message').removeClass('show error success').html('');
	}

	function form_loading($form) {
		$form.find('[type=submit]').addClass('clicked').html(options['btn-loading']);
	}

	function form_success($form) {
		$form.find('[type=submit]').addClass('success').html(options['btn-success']);
		$form.find('.login-form-main-message').addClass('show success').html(options['msg-success']);
	}

	function form_failed($form) {
		$form.find('[type=submit]').addClass('error').html(options['btn-error']);
		$form.find('.login-form-main-message').addClass('show error').html(options['msg-error']);
	}

//Admin Login using Ajax
	$('#login-button').click(function() {
		var username = $("#lg_username").val();
		var password = $("#lg_password").val();
		var dataString = 'username=' + username + '&password=' + password;
		if ($.trim(username).length > 0 && $.trim(password).length > 0) {
			$.ajax({
				type : "POST",
				url : "sites/ajax/ajaxLogin.php",
				data : dataString,
				cache : false,
				beforeSend : function() {
					$("#login-button").val('Connecting...');
				},
				success : function(data) {
					if (data) {
						$("body").hide().fadeIn(1500).delay(6000);
						window.location.href = "sites/home";
					} else {
						//Shake animation effect.
						$('#main-login-form').shake();
						$("#login-button").val('Login');
						$(".login-form-main-message").html("<span>Authentication failed!");
					}
				}
			});

		}
		return false;
	});

	//Admin Forgot Password using Ajax
	$('#forgot-button').click(function() {
		var username = $("#lg_username").val();
		var password = $("#lg_password").val();
		var current_password = $("#lg_current_password").val();
		var dataString = 'username=' + username + '&password=' + password;
		if ($.trim(username).length > 0 && $.trim(password).length > 0) {
			$.ajax({
				type : "POST",
				url : "sites/ajax/ajaxPasswordRecovery.php",
				data : dataString,
				cache : false,
				beforeSend : function() {
					$("#forgot-button").val('Connecting...');
				},
				success : function(data) {
					if (data) {
						var dataString = '&current_password=' + current_password;
						if ($.trim(username).length > 0 && $.trim(password).length > 0) {
						}
					} else {
						//Shake animation effect.
						$('#main-login-form').shake();
						$("#forgot-button").val('Checking');
						$(".login-form-main-message").html("<span>Invalid username and password. ");
					}
				}
			});

		}
		return false;
	});
	$("#retrieve-form").hide();
	$("#forgot-button").click(function(){
		$('#forgot-form').slideToggle("normal", function() {
    // Animation complete.
  });
		$("#retrieve-form").slideToggle("normal", function() {
    // Animation complete.
  });
	});


})(jQuery); 