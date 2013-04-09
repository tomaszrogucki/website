function savetheme(theme, themeContent, saveTheme)
{
	if(theme !== '')
	{
		var request = $.ajax({
			url: saveTheme,
			data: {theme : theme, themeContent : themeContent},
			type: 'POST',
			dataType: 'json',
			async: false
		});
		
		request.done(function(msg) {
		});
		
		request.fail(function(jqXHR, textStatus) {
			// TODO: 
			//alert( "Request failed: " + textStatus );
		});
	}
}