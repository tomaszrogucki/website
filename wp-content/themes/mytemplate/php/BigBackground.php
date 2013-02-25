<?php
	// load image processing class
	require_once('SimpleImage.php');

	// resize image and save it + make the stylesheet
	if(!empty($_POST['screenWidth']) && !empty($_POST['screenHeight']) && !empty($_POST['bgPath']) && !empty($_POST['bgPicture']) && !empty($_POST['cssDefText']) && !empty($_POST['cssDef']) && !empty($_POST['cssStyle']) && !empty($_POST['cssCrush']) && !empty($_POST['makeStyle']))
	{
		$image = new SimpleImage();
		$resizedPicture = ''; // path to the resized image
		
		$image->load($_POST['bgPath'] . $_POST['bgPicture']);
		$imageRatio = $image->getWidth() / $image->getHeight();
		$screenRatio = $_POST['screenWidth'] / $_POST['screenHeight'];
		if($imageRatio > $screenRatio)
		{
			// height priority
			$resizedPicture = $_POST['bgPath'] . 'resized/' . 'h' . $_POST['screenHeight'] . $_POST['bgPicture'];
			if(!file_exists($resizedPicture))
			{
				$image->resizeToHeight($_POST['screenHeight']);
				$image->save($resizedPicture);
			}
		}
		else
		{
			// width priority
			$resizedPicture = $_POST['bgPath'] . 'resized/' . 'w' . $_POST['screenWidth'] . $_POST['bgPicture'];
			if(!file_exists($resizedPicture))
			{
				$image->resizeToWidth($_POST['screenWidth']);
				$image->save($resizedPicture);
			}
		}
		
		// TODO: relative paths in CSS
		// append the new background to cssDefText
//		require_once()
		$cssDefText = $_POST['cssDefText'] . '@define{bg_pic:"' . 'http://localhost/website/wp-content/themes/mytemplate/pictures/backgrounds/' . 'resized/' . 'w' . $_POST['screenWidth'] . $_POST['bgPicture'] . '";}';
		
		
		require_once($_POST['makeStyle']);
		// TODO: if $compiledCss is empty - something went wrong
		$compiledCss = MakeStyle::compileFile($_POST['cssCrush'], $_POST['cssDef'], $_POST['cssStyle'], $cssDefText);
		
		echo($compiledCss);
	}
	else
	{
		// TODO: implement the error case
		echo('BigBackground: Error reading POST variables !');
	}

?>