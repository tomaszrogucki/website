<?php

	// import configuration
	require_once('config.php');	
	
	if(!empty($_POST['type']))
	{
		switch($_POST['type'])
		{
			case 'background':
				$path = 'pictures/backgrounds/';
				break;
			case 'theme':
				$path = 'css/themes/';
				break;
			case 'font':
				$path = 'css/fonts/';
				break;
			default:
				$path = 'pictures/backgrounds/';
		}
		
		$files = glob(SERVER_ROOT . $path . '*.*');
		natsort($files);
		
		foreach($files as $file)
		{
			echo('<div>' . basename($file) . '</div>');
		}
	}
	
// 	$pictureName = (int)pathinfo($file,PATHINFO_FILENAME);
// 	$pictureExt = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));

// 	$picture = SERVER_ROOT . $picturePath . $_FILES['picture']['name'];
// 	$pictureWeb = WEB_ROOT . $picturePath . $_FILES['picture']['name'];
			
?>