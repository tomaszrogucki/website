function loadStyle(screenWidth, screenHeight, bgPicture, cssDefText, bigBackground)
{
	var request = $.ajax({
		url: bigBackground,
		data: {screenWidth : screenWidth, screenHeight : screenHeight, bgPicture : bgPicture, cssDefText : cssDefText, bigBackground : bigBackground},
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