function uploadpicture(formId, uploadPicture)
{
	var form = $('#' + formId);
	form.append("<p>" + uploadPicture + "</p>");
	var formData = new FormData();
	formData.append("picture",$('#uploadPictureInput')[0].files[0]);
	var request = $.ajax({
		url: uploadPicture,
		data: formData,
		type: "POST",
	    cache: false,
	    contentType: false,
	    processData: false,
	});
	form.append("<p>after</p>");
	
	request.done(function(msg) {
//		var picArray = $.parseJSON(msg);
		//$('uploadPicture').append('<img src="' + picArray[0] + '">');
		form.append('<h1>' + msg + '</h1>');
	});
	
	request.fail(function(jqXHR, textStatus) {
		form.append('<h1>error</h1>');
		// TODO: load another CSS
		//alert( "Request failed: " + textStatus );
	});
}