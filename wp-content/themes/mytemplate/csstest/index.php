<?php 

require_once '/var/www/wp/wp-content/themes/mytemplate/csscrush/CssCrush.php'; 

$compiled_file = csscrush_file( '/var/www/wp/wp-content/themes/mytemplate/csstest/style.css' );

echo ("here");

echo($compiled_file);

?>

