$(document).ready(function() {

	/*Product Registration Process*/
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
			allWells.hide();
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

	/*Product Upload button related*/
	$.uploadPreview({
		input_field : "#image-upload", // Default: .image-upload
		preview_box : "#image-preview", // Default: .image-preview
		label_field : "#image-label", // Default: .image-label
		label_default : "Choose File", // Default: Choose File
		label_selected : "Change File", // Default: Change File
		no_label : true // Default: false
	});
});
