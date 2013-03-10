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
			$picturesPath = 'pictures/posts/';
			
			$files = glob(SERVER_ROOT . $picturesPath .'*');
			natsort($files);
			$file  = array_pop($files); // the hightest number
			
			$pictureName = (int)pathinfo($file,PATHINFO_FILENAME);
			$pictureExt = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
			
			if($pictureName != 0)
			{
				$pictureName += 1;
				
				if (move_uploaded_file($_FILES['picture']['tmp_name'], SERVER_ROOT . $picturesPath . $pictureName . '.' . $pictureExt))
				{
					$picturePath = WEB_ROOT . $picturesPath . $pictureName . '.' . $pictureExt;
					
					$exifStr = '';
					$exif = exif_read_data($picturePath, 0, true);
					
					foreach ($exif as $key => $section)
					{
						foreach ($section as $name => $val)
						{
							$exifStr = $exifStr . "$key.$name: $val<br />\n";
						}
					}
					
					$arr = array ('path' => $picturePath, 'exif' => $exifStr, 'iso' => $exif['EXIF']['ISOSpeedRatings'], 'aperture' => $exif['EXIF']['FNumber'], 'shutter' => $exif['EXIF']['ExposureTime'], 'date' => $exif['EXIF']['DateTimeOriginal'], 'zoom' => $exif['EXIF']['FocalLength']);
					echo(json_encode($arr));
				}
				else
				{
					echo('UploadPicture: upload failed !');
				}
				
			}
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