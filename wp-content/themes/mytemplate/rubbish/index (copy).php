<?php
/*
Template Name: Snarfer
*/
?>

<div id="content">
	<div class="text left">1 Time posted: <?php the_time('g:i a'); ?></div>
	<div class="text">2 <?php get_page_link($id, $leavename, $sample); ?></div></br></br></br>
	<div class="text left">3 <?php echo site_url(); ?></div>
	<div class="text">4 <?php comment_author( $comment_ID ); ?> </div>
	<div class="text">5 This post was written by <?php the_author(); ?></div>
	<div class="text">6 <?php get_header( $name ); ?></div>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
</div>
