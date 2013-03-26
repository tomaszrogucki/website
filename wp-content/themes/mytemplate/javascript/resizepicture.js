function resizepicture(where, path, screenWidth, resizePicture)
{
	var picturePlaceholder = $('#' + where);
	var request = $.ajax({
		url: resizePicture,
		data: {path : path, screenWidth : screenWidth},
		type: 'POST',
	    cache: true,
	});
	
	request.done(function(msg) {
//		picturePlaceholder.append('<img src="data:image/jpeg;base64,' + msg + '" class="postPicture" />');
		picturePlaceholder.append('<img src="' + msg + '" class="postPicture" />');
	});
	
	request.fail(function(jqXHR, textStatus) {
		picturePlaceholder.append('<img src="' + path + '" class="postPicture" />');
	});
}