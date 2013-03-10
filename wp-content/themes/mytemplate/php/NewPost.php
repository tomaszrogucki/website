<?php

	// import configuration
	require_once('config.php');	

	if($_POST['newPostUserId'] != 0)
	{
		if(!empty($_POST['newPostDate']))
		{
			$date = date('Y-m-d H:i:s', strtotime($_POST['newPostDate']));
		}
		else
		{
			$date = date('Y-m-d H:i:s');
		}

		$new_post = array(
				'post_title' => $_POST['newPostTitle'],
				'post_content' => $_POST['newPostDescription'],
				'post_status' => 'publish',
				'post_date' => $date,
				'post_author' => $_POST['newPostUserId'],
				'post_type' => 'post',
				'post_category' => array(0)
		);
		$post_id = wp_insert_post($new_post);
		
		add_post_meta($post_id, "iso", $_POST['newPostIso'], true);
		add_post_meta($post_id, "shutter", $_POST['newPostShutter'], true);
		add_post_meta($post_id, "aperture", $_POST['newPostAperture'], true);
		add_post_meta($post_id, "zoom", $_POST['newPostZoom'], true);
		add_post_meta($post_id, "path", $_POST['newPostPath'], true);
		add_post_meta($post_id, "country", $_POST['newPostCountry'], true);
		add_post_meta($post_id, "city", $_POST['newPostCity'], true);
	
	echo('<META HTTP-EQUIV="Refresh" Content="0; URL=' . $_POST['newPostReferer'] . '">');
	exit;
	
	// resize image and save it + make the stylesheet
// 	if(!empty($_FILES['picture']))
// 	{
// 	}
// 	else
// 	{
// 		// TODO: implement the error case
// 		echo('UploadPicture: Error reading FILES variables !');
// 	}

	}

?>