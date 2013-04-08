function uploadthemefile(formId,type,uploadThemeFile)
{
	var form = $('#' + formId);
	if(form.val() !== '')
	{
		var formData = new FormData();
		formData.append('file',form[0].files[0]);
		formData.append('type',type);
		var request = $.ajax({
			url: uploadThemeFile,
			data: formData,
			type: 'POST',
			dataType: 'json',
		    cache: false,
		    contentType: false,
		    processData: false,
		});
		
		request.done(function(msg) {
			
		});
		
		request.fail(function(jqXHR, textStatus) {
			// TODO: 
			//alert( "Request failed: " + textStatus );
		});
	}
}