function loadStyle(bigBackground, themeContent)
{
	var request = $.ajax({
		url: bigBackground,
		data: {screenWidth : window.screen.width, screenHeight : window.screen.height, themeContent : themeContent},
		type: "POST",
		dataType: "text"
	});
	
	request.done(function(msg) {
		$('head').append('<link rel="stylesheet" type="text/css" href="' + msg + '">');
	});
	
	request.fail(function(jqXHR, textStatus) {
		// TODO: load another CSS
		//alert( "Request failed: " + textStatus );
	});
}