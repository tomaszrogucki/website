<head>
<?php 
require_once 'CssCrush.php';
$compiled_file = csscrush_file('/var/www/wp/wp-content/themes/mytemplate/styletest.php');
echo $compiled_file;
?>
</head>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo($compiled_file); ?>" />
<body>
<p class="csstest">text</p>
</body>
