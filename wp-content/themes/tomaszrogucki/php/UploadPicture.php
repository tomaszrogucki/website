<?php

	// import configuration
	require_once('config.php');	

	// load image processing class
	require_once('SimpleImage.php');

	// resize image and save it + make the stylesheet
	if(!empty($_FILES['picture']))
	{
		$pictureTypes = array('image/jpeg', 'image/gif');
		if(in_array($_FILES['picture']['type'], $pictureTypes))
		{
			$image = new SimpleImage();
			$picturePath = 'pictures/posts/';
			
// 			$files = glob(SERVER_ROOT . $picturesPath .'*');
// 			natsort($files);
// 			$file  = array_pop($files); // the hightest number
			
// 			$pictureName = (int)pathinfo($file,PATHINFO_FILENAME);
// 			$pictureExt = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));

			$picture = SERVER_ROOT . $picturePath . $_FILES['picture']['name'];
			$pictureWeb = WEB_ROOT . $picturePath . $_FILES['picture']['name'];
			
// 			if($pictureName != 0)
// 			{
// 				$pictureName += 1;
			
// 			if (move_uploaded_file($_FILES['picture']['tmp_name'], SERVER_ROOT . $picturesPath . $pictureName . '.' . $pictureExt))
// 			{
			if(!file_exists($picture))
			{
				if (move_uploaded_file($_FILES['picture']['tmp_name'], $picture))
				{
// 					$picturePath = WEB_ROOT . $picturesPath . $pictureName . '.' . $pictureExt;
					
				}
				else
				{
					echo('UploadPicture: upload failed !');
					exit;
				}
			}
			
			$exifStr = '';
			$exif = exif_read_data($pictureWeb, 0, true);
			
			foreach ($exif as $key => $section)
			{
				foreach ($section as $name => $val)
				{
					$exifStr = $exifStr . "$key.$name: $val<br />\n";
				}
			}
			
			$arr = array ('path' => $pictureWeb, 'exif' => $exifStr, 'iso' => $exif['EXIF']['ISOSpeedRatings'], 'aperture' => $exif['EXIF']['FNumber'], 'shutter' => $exif['EXIF']['ExposureTime'], 'date' => $exif['EXIF']['DateTimeOriginal'], 'zoom' => $exif['EXIF']['FocalLength']);
			echo(json_encode($arr));
				
// 			}
		}
		else
		{
			echo("UploadPicture: Type not supported");
		}
		
		
	}
	else
	{
		// TODO: implement the error case
		echo('UploadPicture: Error reading FILES variables !');
	}

?>