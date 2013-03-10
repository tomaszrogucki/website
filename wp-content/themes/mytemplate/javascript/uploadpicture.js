function uploadpicture(formId, uploadPicture)
{
	var form = $('#' + formId);
	if(form.val() !== '')
	{
		var formData = new FormData();
		formData.append('picture',form[0].files[0]);
		var request = $.ajax({
			url: uploadPicture,
			data: formData,
			type: 'POST',
			dataType: 'json',
		    cache: false,
		    contentType: false,
		    processData: false,
		});
		
		request.done(function(msg) {
			form.parent().before('<img src="' + msg.path + '" class="postPicture" />');
			$('#newPostIso').val(msg.iso);
			$('#newPostShutter').val(msg.shutter);
			$('#newPostAperture').val(eval(msg.aperture));
			$('#newPostZoom').val(eval(msg.zoom));
			$('#newPostDate').val(msg.date);
			$('#newPostPath').val(msg.path);
			form.parent().hide();
		});
		
		request.fail(function(jqXHR, textStatus) {
			// TODO: load another CSS
			//alert( "Request failed: " + textStatus );
		});
	}
}