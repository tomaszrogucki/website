function loadStyle(screenWidth, screenHeight, bgPath, bgPicture, cssDefText, cssDef, cssStyle, cssCrush, makeStyle, bigBackground)
{
	var request = $.ajax({
		url: bigBackground,
		data: {screenWidth : screenWidth, screenHeight : screenHeight, bgPath : bgPath, bgPicture : bgPicture, cssDefText : cssDefText, cssDef : cssDef, cssStyle : cssStyle, cssCrush : cssCrush, makeStyle : makeStyle},
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