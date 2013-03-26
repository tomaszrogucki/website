<?php
	echo(dirname($_SERVER['DOCUMENT_ROOT']));
	echo('<br/>');
	echo($_SERVER['REQUEST_URL']);
	$url_folder = substr(substr($_SERVER["REQUEST_URI"],1), 0, strpos(substr($_SERVER["REQUEST_URI"],1), "/"));
	echo('<br/>');
	echo($url_folder);
		
//	$themeDir = get_theme_root() . '/' . get_template() . '/';
//	echo($themeDir);
		
//	require_once('../php/RelativePath.php');
//	echo(RelativePath::makePath('A/b','/a/b/asd'));
?>

	<img src="pic.php" />