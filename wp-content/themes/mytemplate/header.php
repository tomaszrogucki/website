<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="description" content="This website is a Photo Diary of my RTW trip. You will find here the best moments of this journey captured with a reflex camera Nikon D5000.">
<meta name="keywords" content="Tomasz Rogucki, RTW, Round The World, trip, journey, photo, photography, photo diary, photo blog, backpacking">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
// 	global $page, $paged;

// 	wp_title( '|', true, 'right' );

// 	// Add the blog name.
// 	bloginfo( 'name' );

// 	// Add the blog description for the home/front page.
// 	$site_description = get_bloginfo( 'description', 'display' );
// 	if ( $site_description && ( is_home() || is_front_page() ) )
// 		echo " | $site_description";

// 	// Add a page number if necessary:
// 	if ( $paged >= 2 || $page >= 2 )
// 		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?>
	
	tomaszrogucki.com PhotoDiary
</title>



<!-- Build style here -->

<?php require_once('php/config.php'); ?>

<script src="<?php echo(WEB_ROOT . JQUERY); ?>"></script>
<script src="<?php echo(WEB_ROOT . 'javascript/loadstyle.js'); ?>"></script>
<script src="<?php echo(WEB_ROOT . 'javascript/uploadpicture.js'); ?>"></script>
<script src="<?php echo(WEB_ROOT . 'javascript/resizepicture.js'); ?>"></script>
<script src="<?php echo(WEB_ROOT . 'javascript/readcsstheme.js'); ?>"></script>
<script src="<?php echo(WEB_ROOT . 'javascript/listfiles.js'); ?>"></script>
<script src="<?php echo(WEB_ROOT . 'javascript/uploadthemefile.js'); ?>"></script>
<script src="<?php echo(WEB_ROOT . 'javascript/spectrum.js'); ?>"></script>
<script src="<?php echo(WEB_ROOT . 'javascript/savetheme.js'); ?>"></script>

<link rel='stylesheet' href="<?php echo(WEB_ROOT . 'css/spectrum.css'); ?>" />


<script language="javascript" type="text/javascript">
//	var screenWidth = window.screen.width;
//	var screenHeight = window.screen.height;
//	var bgPicture = "bgPanoramic.jpg";
//	var cssDefText = "@define{color_g:blue;}\n";
	var bigBackground = "<?php echo(WEB_ROOT . 'php/BigBackground.php'); ?>";
	
	var themeContent = "/*bgVertical.jpg*/\n|||| @define{dark_bg:rgba(0,0,0,0.8);} @define{light_bg:rgba(0,0,0,0.4);} @define{text_color:rgba(255,255,255,1);} @define{input_bg:rgba(255,255,255,0.4);} @define{submit_bg:rgba(255,255,255,0.6);} @define{comment_even_bg:rgba(0,0,0,0.5);} @define{shadow:rgba(0,0,0,1);} @define{comment_separator:rgba(255,255,255,0.1);} @define{content_bg:rgba(0,0,0,0.9);} @define{exif_bg:rgba(0,0,0,0.6);} @define{font_normal:MavenPro, Arial, Helvetica, sans-serif;} @define{font_fancy:JosefinSlab, Arial, Helvetica, sans-serif;}";
	
	loadStyle(bigBackground);
</script>

<!--
<link href="<?php echo(WEB_ROOT . 'javascript/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet" type="text/css" />
-->

<!-- End of Build style here -->



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
//	if ( is_singular() && get_option( 'thread_comments' ) )
//		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
//	wp_head();
?>
</head>

