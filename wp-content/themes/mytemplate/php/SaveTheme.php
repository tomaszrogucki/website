<?php
// import configuration
require_once('config.php');		

if(!empty($_POST['theme']) && !empty($_POST['themeContent']))
{
	$themePath = 'css/themes/';
	$theme = SERVER_ROOT . $themePath . trim($_POST['theme']);
	
	try
	{
		$file = fopen($theme, "w+");
		
		if (flock($file, LOCK_EX))
		{
		    fwrite($file, $_POST['themeContent']);
		    flock($file, LOCK_UN);
		}
		else
		{
		    echo('SaveTheme : Couldn\'t lock ' . $theme .' !');
		    exit();
		}
		
		fclose($file);
		
		echo(json_encode(array('theme' => $theme)));
	}
	catch(Exception $e)
	{
	    echo('SaveTheme : Operatoin on the file ' . $theme .' failed !');
	}
	
}
?>