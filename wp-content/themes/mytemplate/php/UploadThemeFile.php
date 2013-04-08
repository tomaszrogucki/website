<?php

	// import configuration
	require_once('config.php');	

	// resize image and save it + make the stylesheet
	if(!empty($_FILES['file']) && !empty($_POST['type']))
	{
		echo('~\n');
		echo($_FILES['file']['type']);
		echo($_FILES['file']['error']);
		echo('~\n');
		switch($_POST['type'])
		{
			case 'picture':
				$pictureTypes = array('image/jpeg', 'image/gif');
				if(in_array($_FILES['file']['type'], $pictureTypes))
				{
					$path = 'pictures/backgrounds/';
				}
				else
				{
					echo("UploadThemeFile: Type not supported");
					exit();
				}
				break;
			case 'font':
				if(strpos($_FILES['file']['type'],'font') !== false)
				{
					$path = 'css/fonts/';
				}
				else
				{
					echo("UploadThemeFile: Type not supported");
					exit();
				}
				break;
			default:
				$path = 'pictures/backgrounds/';
		}

		$file = SERVER_ROOT . $path . $_FILES['file']['name'];
		$fileWeb = WEB_ROOT . $path . $_FILES['files']['name'];
		
		if(!file_exists($picture))
		{
			if (move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				
			}
			else
			{
				echo('UploadThemeFile: upload failed !');
				exit;
			}
		}
	}
	else
	{
		// TODO: implement the error case
		echo('UploadThemeFile: Error reading FILES variables !');
	}

?>