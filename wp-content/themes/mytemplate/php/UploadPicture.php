<?php

echo($_FILES['picture']['name']);

	// import configuration
	require_once('config.php');	

	// load image processing class
	require_once('SimpleImage.php');

	// resize image and save it + make the stylesheet
	if(!empty($_POST['picture']))
	{
		$image = new SimpleImage();
		
		
		echo("Success");
	}
	else
	{
		// TODO: implement the error case
		echo('UploadPicture: Error reading POST variables !');
	}

?>