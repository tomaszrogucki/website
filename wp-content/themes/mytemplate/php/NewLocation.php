<?php

	// import configuration
	require_once('config.php');	

	if($_POST['newLocationUserId'] != 0)
	{
		if(!empty($_POST['newLocationDate']))
		{
			$date = date('Y-m-d H:i:s', strtotime($_POST['newLocationDate']));
		}
		else
		{
			$date = date('Y-m-d H:i:s');
		}

		$new_post = array(
				'post_title' => trim($_POST['newLocationCountry']),
				'post_content' => trim($_POST['newLocationCity']),
				'post_status' => 'publish',
				'post_date' => $date,
				'post_author' => $_POST['newLocationUserId'],
				'post_type' => 'location',
				'post_category' => array(0)
		);
		$post_id = wp_insert_post($new_post);
		
		add_post_meta($post_id, "country", trim($_POST['newLocationCountry']), true);
		add_post_meta($post_id, "city", trim($_POST['newLocationCity']), true);
	
	echo('<META HTTP-EQUIV="Refresh" Content="0; URL=' . $_POST['newLocationReferer'] . '">');
	exit;
	}

?>