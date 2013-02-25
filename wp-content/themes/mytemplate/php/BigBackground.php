<?php
	// import configuration
	require_once('config.php');	

	// load image processing class
	require_once('SimpleImage.php');

	// resize image and save it + make the stylesheet
	if(!empty($_POST['screenWidth']) && !empty($_POST['screenHeight']) && !empty($_POST['bgPicture']) && !empty($_POST['cssDefText']))
	{
		$image = new SimpleImage();
		$resizedPicture = ''; // server path to the resized image
		$resizedPictureWeb = ''; // web path to the resized image
		$bgPath = 'pictures/backgrounds/';
		
		$image->load(SERVER_ROOT . $bgPath . $_POST['bgPicture']);
		$imageRatio = $image->getWidth() / $image->getHeight();
		$screenRatio = $_POST['screenWidth'] / $_POST['screenHeight'];
		if($imageRatio > $screenRatio)
		{
			// height priority
			$resizedPicture = SERVER_ROOT . $bgPath . 'resized/' . 'h' . $_POST['screenHeight'] . $_POST['bgPicture'];
			$resizedPictureWeb = WEB_ROOT . $bgPath . 'resized/' . 'h' . $_POST['screenHeight'] . $_POST['bgPicture'];
			if(!file_exists($resizedPicture))
			{
				$image->resizeToHeight($_POST['screenHeight']);
				$image->save($resizedPicture);
			}
		}
		else
		{
			// width priority
			$resizedPicture = SERVER_ROOT . $bgPath . 'resized/' . 'w' . $_POST['screenWidth'] . $_POST['bgPicture'];
			$resizedPictureWeb = WEB_ROOT . $bgPath . 'resized/' . 'w' . $_POST['screenWidth'] . $_POST['bgPicture'];
			if(!file_exists($resizedPicture))
			{
				$image->resizeToWidth($_POST['screenWidth']);
				$image->save($resizedPicture);
			}
		}
		
		// TODO: relative paths in CSS
		// append the new background to cssDefText
		$cssDefText = $_POST['cssDefText'] . '@define{bg_pic:"' . $resizedPictureWeb . '";}' . "\n";
		
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