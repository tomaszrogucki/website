<?php
	// import configuration
	require_once('config.php');	

	// load image processing class
	require_once('SimpleImage.php');

	// resize image and save it + make the stylesheet
	if(!empty($_POST['screenWidth']) && !empty($_POST['screenHeight']))
	{
		$image = new SimpleImage();
		$resizedPicture = ''; // server path to the resized image
		$resizedPictureWeb = ''; // web path to the resized image
		$bgPath = 'pictures/backgrounds/';
		$quality = 60;
		$themePath = 'css/themes/';
		
		
		if(!empty($_POST['themeContent']))
		{
			$themeContent = explode('/**/',$_POST['themeContent']);
		}
		else
		{
			require_once('RandomTheme.php');
			$theme = RandomTheme::getTheme();
			
// 			$themes = glob(SERVER_ROOT . $themePath . '*');
// 			$theme = basename($themes[mt_rand(0,count($themes)-1)]);
// // 			$theme = 'default.css';

			$themeContent = file(SERVER_ROOT . $themePath . $theme);
			
		}
		
		$bgString = trim($themeContent[0]);
		$bgFileName = substr($bgString, 2, strlen($bgString) - 4); // format: /*background.jpg*/
		
		$image->load(SERVER_ROOT . $bgPath . $bgFileName);
		$imageRatio = $image->getWidth() / $image->getHeight();
		$screenRatio = $_POST['screenWidth'] / $_POST['screenHeight'];
		if($imageRatio > $screenRatio)
		{
			// height priority
			$resizedPicture = SERVER_ROOT . $bgPath . 'resized/' . 'h' . $_POST['screenHeight'] . $bgFileName;
			$resizedPictureWeb = WEB_ROOT . $bgPath . 'resized/' . 'h' . $_POST['screenHeight'] . $bgFileName;
			if(!file_exists($resizedPicture))
			{
				$image->resizeToHeight($_POST['screenHeight']);
				$image->save($resizedPicture,IMAGETYPE_JPEG,$quality);
			}
		}
		else
		{
			// width priority
			$resizedPicture = SERVER_ROOT . $bgPath . 'resized/' . 'w' . $_POST['screenWidth'] . $bgFileName;
			$resizedPictureWeb = WEB_ROOT . $bgPath . 'resized/' . 'w' . $_POST['screenWidth'] . $bgFileName;
			if(!file_exists($resizedPicture))
			{
				$image->resizeToWidth($_POST['screenWidth']);
				$image->save($resizedPicture,IMAGETYPE_JPEG,$quality);
			}
		}
		
		// TODO: relative paths in CSS
		// append the new background to cssDefText
		$cssDefText = join('',$themeContent) . '@define{bg_pic:"' . $resizedPictureWeb . '";}';
		
		require_once('MakeStyle.php');
		// TODO: if $compiledCss is empty - something went wrong
		$compiledCss = MakeStyle::compileFile($cssDefText);
		
		echo($compiledCss);
	}
	else
	{
		// TODO: implement the error case
		echo('BigBackground: Error reading POST variables !');
	}

?>