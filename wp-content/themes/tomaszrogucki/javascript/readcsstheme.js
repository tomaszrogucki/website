function readcsstheme(theme, readCssTheme)
{
	if(theme !== '')
	{
		var request = $.ajax({
			url: readCssTheme,
			data: {theme : theme},
			type: 'POST',
			dataType: 'json',
			async: false
		});
		
		request.done(function(msg) {
			$('#newThemeBackground').val(msg.big_pic);
			$('#newThemeNormalRegularFont').val(msg.font_normal_regular);
			$('#newThemeNormalBoldFont').val(msg.font_normal_bold);
			$('#newThemeNormalItalicFont').val(msg.font_normal_italic);
			$('#newThemeFancyRegularFont').val(msg.font_fancy_regular);
			$('#newThemeFancyBoldFont').val(msg.font_fancy_bold);
			$('#newThemeFancyItalicFont').val(msg.font_fancy_italic);
			$('#newThemeDarkBg').val(msg.dark_bg);
			$('#newThemeLightBg').val(msg.light_bg);
			$('#newThemeLabelDarkBg').val(msg.label_dark_bg);
			$('#newThemeLabelLightBg').val(msg.label_light_bg);
			$('#newThemeLabelDateTextColor').val(msg.label_date_text_color);
			$('#newThemeTextColor').val(msg.text_color);
			$('#newThemeTextColorLightBg').val(msg.text_color_light_bg);
			$('#newThemeLabelCountryTextColor').val(msg.label_country_text_color);
			$('#newThemeInputBg').val(msg.input_bg);
			$('#newThemeSubmitBg').val(msg.submit_bg);
			$('#newThemeCommentEvenBg').val(msg.comment_even_bg);
			$('#newThemeShadow').val(msg.shadow);
			$('#newThemeCommentSeparator').val(msg.comment_separator);
			$('#newThemeContentBg').val(msg.content_bg);
			$('#newThemeTitleBg').val(msg.title_bg);
			$('#newThemeExifBg').val(msg.exif_bg);
		});
		
		request.fail(function(jqXHR, textStatus) {
			// TODO: 
			//alert( "Request failed: " + textStatus );
		});
	}
}