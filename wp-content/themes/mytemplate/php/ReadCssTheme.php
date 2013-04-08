<?php
	// import configuration
	require_once('config.php');	

	if(!empty($_POST['theme']))
	{
		$themePath = 'css/themes/';
		$theme = SERVER_ROOT . $themePath . $_POST['theme'];
		
		if(file_exists($theme))
		{
			$themeContent = file($theme);
			$big_pic = substr(trim($themeContent[0]), 2, strlen(trim($themeContent[0])) - 4);
			$themeContent = join('', $themeContent);
			$dark_bg = findCssDefValue('dark_bg', $themeContent);
			$font_normal_regular = findCssDefValue('font_normal_regular', $themeContent);
			$font_normal_bold = findCssDefValue('font_normal_bold', $themeContent);
			$font_normal_italic = findCssDefValue('font_normal_italic', $themeContent);
			$font_fancy_regular = findCssDefValue('font_fancy_regular', $themeContent);
			$font_fancy_bold = findCssDefValue('font_fancy_bold', $themeContent);
			$font_fancy_italic = findCssDefValue('font_fancy_italic', $themeContent);
			$light_bg = findCssDefValue('light_bg', $themeContent);
			$label_dark_bg = findCssDefValue('label_dark_bg', $themeContent);
			$label_light_bg = findCssDefValue('label_light_bg', $themeContent);
			$text_color = findCssDefValue('text_color', $themeContent);
			$text_color_light_bg = findCssDefValue('text_color_light_bg', $themeContent);
			$label_date_text_color = findCssDefValue('label_date_text_color', $themeContent);
			$label_country_text_color = findCssDefValue('label_country_text_color', $themeContent);
			$input_bg = findCssDefValue('input_bg', $themeContent);
			$submit_bg = findCssDefValue('submit_bg', $themeContent);
			$comment_even_bg = findCssDefValue('comment_even_bg', $themeContent);
			$shadow = findCssDefValue('shadow', $themeContent);
			$comment_separator = findCssDefValue('comment_separator', $themeContent);
			$content_bg = findCssDefValue('content_bg', $themeContent);
			$title_bg = findCssDefValue('title_bg', $themeContent);
			$exif_bg = findCssDefValue('exif_bg', $themeContent);
			
			$arr = array (
					'big_pic' => $big_pic,
					'font_normal_regular' => $font_normal_regular,
					'font_normal_bold' => $font_normal_bold,
					'font_normal_italic' => $font_normal_italic,
					'font_fancy_regular' => $font_fancy_regular,
					'font_fancy_bold' => $font_fancy_bold,
					'font_fancy_italic' => $font_fancy_italic,
					'dark_bg' => $dark_bg,
					'light_bg' => $light_bg,
					'label_dark_bg' => $label_dark_bg,
					'label_light_bg' => $label_light_bg,
					'text_color' => $text_color,
					'text_color_light_bg' => $text_color_light_bg,
					'label_date_text_color' => $label_date_text_color,
					'label_country_text_color' => $label_country_text_color,
					'input_bg' => $input_bg,
					'submit_bg' => $submit_bg,
					'comment_even_bg' => $comment_even_bg,
					'shadow' => $shadow,
					'comment_separator' => $comment_separator,
					'content_bg' => $content_bg,
					'title_bg' => $title_bg,
					'exif_bg' => $exif_bg
					);
			echo(json_encode($arr));
		}
		
	}
	else
	{
		// TODO: implement the error case
		echo('ReadCssTheme: Error reading POST variables !');
	}
	
	function findCssDefValue($value, $str)
	{
		preg_match('/@define{' . $value . ':([a-zA-Z0-9(),. ]{1,});}/', $str, $matches);
		return $matches[1];
	}

?>