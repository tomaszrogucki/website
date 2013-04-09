<?php

// import configuration
require_once('config.php');

class RandomTheme
{
	static public function getTheme()
	{
		$path = 'css/themes/';
		$files = glob(SERVER_ROOT . $path . '*.css');
		$files = array_map('basename', $files);
		$max = sizeof($files);
		
		session_start();
		if (!isset($_SESSION['themeIndices']))
		{
			if($max > 0)
			{
				$indices = range(0,sizeof($files) - 1);
				shuffle($indices);
				$_SESSION['themeIndices'] = implode(',', $indices);
			}
			
			return 'default.css';
		}
		else
		{
			$indices = explode(',', $_SESSION['themeIndices']);
			
			if(sizeof($indices) > 1)
			{
				$index = array_pop($indices);
				$_SESSION['themeIndices'] = implode(',', $indices);
			}
			else
			{
				$index = array_pop($indices);
				unset($_SESSION['themeIndices']);
			}
			
			if($index < $max)
			{
				return $files[$index];
			}
			else
			{
				unset($_SESSION['themeIndices']);
				return 'default.css';
			}
		}
	}
	
	static public function readThemeContent($themeName)
	{
		$theme = SERVER_ROOT . 'css/themes/' . $themeName;
		if(!file_exists($theme))
			$theme = SERVER_ROOT . 'css/themes/' . 'default.css';
		echo(impode('\n',file($theme)));
	}
}
?>