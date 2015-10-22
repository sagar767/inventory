$(document).ready(function() {

	/*Product Registration Process Steps*/
	var navListItems = $('div.setup-panel div a'),
	    allWells = $('.setup-content'),
	    allNextBtn = $('.nextBtn');

	allWells.hide();

	navListItems.click(function(e) {
		e.preventDefault();
		var $target = $($(this).attr('href')),
		    $item = $(this);

		if (!$item.hasClass('disabled')) {
			navListItems.removeClass('btn-danger').addClass('btn-default');
			$item.addClass('btn-danger');
			allWells.fadeOut("slow").hide();
			$target.show();
			$target.find('input:eq(0)').focus();
		}
	});

	allNextBtn.click(function() {
		var curStep = $(this).closest(".setup-content"),
		    curStepBtn = curStep.attr("id"),
		    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
		    curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
		    isValid = true;

		$(".form-group").removeClass("has-error");
		for (var i = 0; i < curInputs.length; i++) {
			if (!curInputs[i].validity.valid) {
				isValid = false;
				$(curInputs[i]).closest(".form-group").addClass("has-error");
			}
		}

		if (isValid)
			nextStepWizard.removeAttr('disabled').trigger('click');
	});

	$('div.setup-panel div a.btn-danger').trigger('click');

	/*Footer Toggle Close*/
	$(".toggle-close").click(function(){
		$(".footer-container").slideToggle("slow");
		checktimeInterval(count);
	});
	/*Product Upload button related*/
	$.uploadPreview({
		input_field : "#image-upload", // Default: .image-upload
		preview_box : "#image-preview", // Default: .image-preview
		label_field : "#image-label", // Default: .image-label
		label_default : "Choose File", // Default: Choose File
		label_selected : "Change File", // Default: Change File
		no_label : true // Default: false
	});

	/*Dealer Registration using Ajax*/
	$('#dealerRegistry').click(function() {
		var companyName = $("#company_name").val();
		var dealerName  = $("#dealer_name").val();
		var dealerPhone = $("#dealer_phone").val();
		var dealerEmail = $("#dealer_email").val();
		var dataString  = 'companyName=' + companyName + '&dealerName=' + dealerName + '&dealerPhone=' + dealerPhone + '&dealerEmail=' + dealerEmail;
		if ($.trim(companyName).length > 0 && $.trim(dealerName).length > 0 && $.trim(dealerPhone).length > 0 && $.trim(dealerEmail).length > 0) {
			$.ajax({
				type : "POST",
				url : "ajax/ajaxDealerRegistration.php",
				data : dataString,
				cache : false,
				beforeSend : function() {
					$("#dealerRegistry").val('Connecting...');
				},
				success : function(data) {
					if (data) {
						$("#status").html("<div class='alert alert-success'>New Dealer Registered Successfully</div>");
						  $("#dealerRegistration input[type=text]").val("");
						   $("#dealerRegistration input[type=email]").val("");
					} else {
						$("#status").html("<span class='alert alert-danger'>Dealer Registeration Incomplete!</span>");
					}
				}
			});

		}
		return false;
	});
	
	//Alert Message Animation
	$(".status").delay(5000).fadeOut();

	/*Dealer View Details Delete*/
	$(".view-dealers a.delete").click(function() {
		var element = $(this);
		var del_dealer_id = element.attr("id");
		var info = 'del_dealer_id=' + del_dealer_id;
		if (confirm("Are you sure you want to delete this?")) {
			$.ajax({
				type : "POST",
				url : "ajax/ajaxDealerDetails.php",
				data : info,
				success : function() {
				}
			});
			$(this).parents("tr").animate({
				backgroundColor : "#003"
			}, "normal").animate({
				opacity : "hide"
			}, "normal");
		}
		return false;
	});
	
	/*Product Quantity Control for Billing*/
	
	$('.btn-number').click(function(e) {
		e.preventDefault();

		fieldName = $(this).attr('data-field');
		type = $(this).attr('data-type');
		var input = $("input[name='" + fieldName + "']");
		var currentVal = parseInt(input.val());
		if (!isNaN(currentVal)) {
			if (type == 'minus') {

				if (currentVal > input.attr('min')) {
					input.val(currentVal - 1).change();
				}
				if (parseInt(input.val()) == input.attr('min')) {
					$(this).attr('disabled', true);
				}

			} else if (type == 'plus') {

				if (currentVal < input.attr('max')) {
					input.val(currentVal + 1).change();
				}
				if (parseInt(input.val()) == input.attr('max')) {
					$(this).attr('disabled', true);
				}

			}
		} else {
			input.val(0);
		}
	});
	$('.input-number').focusin(function() {
		$(this).data('oldValue', $(this).val());
	});
	$('.input-number').change(function() {

		minValue = parseInt($(this).attr('min'));
		maxValue = parseInt($(this).attr('max'));
		valueCurrent = parseInt($(this).val());

		name = $(this).attr('name');
		if (valueCurrent >= minValue) {
			$(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
		} else {
			alert('Sorry, the minimum value was reached');
			$(this).val($(this).data('oldValue'));
		}
		if (valueCurrent <= maxValue) {
			$(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
		} else {
			alert('Sorry, the maximum value was reached');
			$(this).val($(this).data('oldValue'));
		}

	});
	$(".input-number").keydown(function(e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
		// Allow: Ctrl+A
		(e.keyCode == 65 && e.ctrlKey === true) ||
		// Allow: home, end, left, right
		(e.keyCode >= 35 && e.keyCode <= 39)) {
			// let it happen, don't do anything
			return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	}); 

	/*Customer Billing of Product*/
	$('#btnBilling').click(function() {
		var customerName   = $("#customer_name").val();
		var customerEmail  = $("#customer_email").val();
		var customerPhone  = $("#customer_phone").val();
		var paymentMode    = $("#payment_mode").val();
		var productQuantity    = $("#prd_quantity").val();
		var productUserBy      = $("#prd_user_by").val();
		var productBasePrice     = $("#prd_base_price").val();
		var productId      = $("#prd_id").val();
		var productCommission     = $("#prd_commission").val();
		var productActualPrice     = $("#prd_actual_price").val();
		
		var dataString = 'customerName=' + customerName + '&productUserBy=' + productUserBy + '&productBasePrice=' + productBasePrice + '&productActualPrice=' + productActualPrice + '&customerEmail=' + customerEmail + '&customerPhone=' + customerPhone + '&paymentMode=' + paymentMode + '&productQuantity=' + productQuantity + '&productId=' + productId + '&productCommission=' + productCommission;
		if ($.trim(customerName).length > 0 && $.trim(customerEmail).length > 0 && $.trim(customerPhone).length > 0 && $.trim(paymentMode).length > 0 && $.trim(productQuantity).length > 0 && $.trim(productId).length > 0 && $.trim(productCommission).length > 0 && $.trim(productActualPrice).length > 0 && $.trim(productUserBy).length > 0 && $.trim(productBasePrice).length > 0) {
			$.ajax({
				type : "POST",
				url : "ajax/ajaxproductBilling.php",
				data : dataString,
				cache : false,
				beforeSend : function() {
					$("#btnBilling").val('Connecting...');
				},
				success : function(data) {
					if (data) {
						window.location.href="generatepdfreport.php";
					} else {
						$("#status").html("<span class='alert alert-danger'>Product Billing Incomplete!</span>");
					}
				}
			});

		}
		return false;
	});
	
});

