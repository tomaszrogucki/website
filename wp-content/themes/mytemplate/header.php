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
<b id="testt"></b>
<?php
if(!empty($_POST['userScreenWidth'])) {
	echo('<p>' . $_POST['userScreenWidth1'] . '</p>');
}
else
{
	echo(
		'<script language="JavaScript">
		<!--
		function sleep(milliseconds) {
		  var start = new Date().getTime();
		  for (var i = 0; i < 1e7; i++) {
			if ((new Date().getTime() - start) > milliseconds){
			  break;
			}
		  }
		}

		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST", document.URL, true);
		var screenW = "userScreenWidth1="+window.screen.width;
		document.getElementById("testt").innerHTML = screenW;

		sleep(5000);
		xmlhttp.send("userScreenWidth1="+window.screen.width);
		-->
		</script>'

	);
}
?>


<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> -->
<?php 
$themedir=get_theme_root() . '/' . get_template() . '/';

$fp = fopen($themedir . 'styledefs.css', "w+");
if (flock($fp, LOCK_EX)) { // do an exclusive lock
    fwrite($fp, "@define{color_g:blue;}\n");
    flock($fp, LOCK_UN); // release the lock
} else {
    echo "Couldn't lock the file !";
}
fclose($fp);

require_once($themedir . 'csscrush/CssCrush.php');
echo(file_exists($themedir . 'csscrush/CssCrush.php'));
$compiled_file = csscrush_file($themedir . 'styletest.css');
?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo($compiled_file); ?>" />
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
