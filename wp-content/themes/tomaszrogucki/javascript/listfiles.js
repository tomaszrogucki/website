function listfiles(containerId,type,listFiles)
{
	if(containerId !== '')
	{
		var container = $('#' + containerId);
		
		var request = $.ajax({
			url: listFiles,
			data: {type : type},
			type: 'POST',
			dataType: 'text',
			async: false
		});
		
		request.done(function(msg) {
			container.html(msg);
		});
		
		request.fail(function(jqXHR, textStatus) {
			// TODO: 
			//alert( "Request failed: " + textStatus );
		});
	}
}