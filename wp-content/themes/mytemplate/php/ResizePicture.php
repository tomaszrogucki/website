<?php
	// import configuration
	require_once('config.php');	

	// load image processing class
	require_once('SimpleImage.php');
	
	// resize image and output it
	if(!empty($_POST['path']) && !empty($_POST['screenWidth']))
	{
		$path_parts = pathinfo($_POST['path']);
		$pictureName = $path_parts['basename'];
		$picturePath = 'pictures/posts/';
		$picture = SERVER_ROOT . $picturePath . $pictureName;
		$miniPicture = SERVER_ROOT . $picturePath . 'mini/' . $_POST['screenWidth'] . $pictureName;
		$miniPictureWeb = WEB_ROOT . $picturePath . 'mini/' . $_POST['screenWidth'] . $pictureName;
		
		if(!file_exists($miniPicture))
		{
			$image = new SimpleImage();
			$maxWidth = 1000.0 / 0.7;
			$minWidth = 760.0 / 0.7;
			$screenWidth = (int)$_POST['screenWidth'];
			if($screenWidth > $maxWidth)
				$screenWidth = $maxWidth;
			elseif($screenWidth < $minWidth)
				$screenWidth = $minWidth;
			$percentage = 0.7 * 0.8;
			$desiredWidth = $percentage * $screenWidth;
			$quality = 75;
			$image->load($picture);
			$image->resizeToWidth($desiredWidth);
			$image->save($miniPicture,IMAGETYPE_JPEG,$quality);
		}

		echo($miniPictureWeb);
	}
	else
	{
		// TODO: implement the error case
		echo('ResizePicture: Error reading POST variables !');
	}

?>