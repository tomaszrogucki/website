<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>

<?php
	// definitions
	$themeDir = get_theme_root() . '/' . get_template() . '/';
	$cssPath = $themeDir . 'css/';
	$cssCrushPath = $themeDir . 'css-crush/';
	$phpPath = $themeDir . 'php/';
	$picturesPath = $themeDir . 'pictures/';
	$jqueryPath = $themeDir . 'jquery/';
	$cssStyle = $cssPath . 'style.css';
	$cssDef = $cssPath . 'styledef.css';
	$cssCrushPhp = $cssCrushPath . 'CssCrush.php';
	$makeStyle = $phpPath . 'MakeStyle.php';
	$bigBackground = $phpPath . 'BigBackground.php';
	$jquery = $jqueryPath . 'jquery-1.9.1.min.js';
?>

<script src="/website/wp-content/themes/mytemplate/jquery/jquery-1.9.1.min.js"></script>
<script src="/website/wp-content/themes/mytemplate/javascript/loadstyle.js"></script>
	
<b id="jq">abcs</b>

<script language="javascript" type="text/javascript">
	var screenWidth = window.screen.width;
	var screenHeight = window.screen.height;
	var bgPath = "<?php echo($picturesPath . 'backgrounds/'); ?>";
	var bgPicture = "bg.jpg";
	var cssDefText = "@define{color_g:blue;}\n";
	var cssDef = "<?php echo($cssDef); ?>";
	var cssStyle = "<?php echo($cssStyle); ?>";
	var cssCrush = "<?php echo($cssCrushPhp); ?>";
	var makeStyle = "<?php echo($makeStyle); ?>";
	var bigBackground = "/website/wp-content/themes/mytemplate/php/BigBackground.php";
	
	loadStyle(screenWidth, screenHeight, bgPath, bgPicture, cssDefText, cssDef, cssStyle, cssCrush, makeStyle, bigBackground);
</script>



<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> -->


<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<div id="container">
	<p>themedir : <?php echo($themedir); ?></p>
	<p>compiled file : <?php echo($compiled_file); ?></p>
	<p>theme root : <?php echo(get_theme_root()); ?></p>
	<p>get_template() : <?php echo(get_template()); ?></p>
	<p>here => <?php $fileurl=get_theme_root() . '/' . get_template() . '/styletest.css'; echo($fileurl. ' '); if(file_exists($fileurl)) echo('yes'); else echo('no'); ?></p>
</div>
