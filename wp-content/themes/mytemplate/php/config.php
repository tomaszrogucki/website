<?php
	// provide WordPress functions to the script
	$server_base = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/' . substr(substr($_SERVER["REQUEST_URI"],1), 0, strpos(substr($_SERVER["REQUEST_URI"],1), "/")) . '/';
	require_once($server_base . 'wp-blog-header.php');

	// global definitions
	define('SERVER_ROOT', get_theme_root() . '/' . get_template() . '/');
	define('WEB_ROOT', site_url('wp-content/themes/' . get_template() . '/'));
	
	define('CSSCRUSH', 'css-crush/CssCrush.php');
	define('CSSSTYLE', 'css/style.css');
	define('CSSDEF', 'css/styledef.css');
	define('JQUERY', 'javascript/jquery-1.9.1.min.js');
	
	

//$themeDir = get_theme_root() . '/' . get_template() . '/';
//echo(get_theme_root() . "<br/>");
//echo(bloginfo('wpurl') . "<br/>");
//echo(site_url("abc") . "<br/>");
//echo(get_home_url() . "<br/>");
//$cssPath = $themeDir . 'css/';
//$cssCrushPath = $themeDir . 'css-crush/';
//$phpPath = $themeDir . 'php/';
//$picturesPath = $themeDir . 'pictures/';
//$jqueryPath = $themeDir . 'jquery/';
//$cssStyle = $cssPath . 'style.css';
//$cssDef = $cssPath . 'styledef.css';
//$cssCrushPhp = $cssCrushPath . 'CssCrush.php';
//$makeStyle = $phpPath . 'MakeStyle.php';
//$bigBackground = $phpPath . 'BigBackground.php';
//$jquery = $jqueryPath . 'jquery-1.9.1.min.js';
?>