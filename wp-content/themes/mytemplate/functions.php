<?php 
// hook failed login
add_action('wp_login_failed', 'my_login_fail'); 
 
function my_front_end_login_fail($username){
    // Get the reffering page, where did the post submission come from?
    $referrer = $_SERVER['HTTP_REFERER'];
 
    // if there's a valid referrer, and it's not the default log-in screen
    if(!empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin')){
        // let's append some information (login=failed) to the URL for the theme to use
        wp_redirect($referrer . '?login=failed'); 
    exit;
    }
}


add_action('authenticate', 'my_login_incompltete');

function my_login_incompltete(){
	$referrer = $_SERVER['HTTP_REFERER'];
	if ($user==null || $pwd==null) {
		wp_redirect($referrer);

	}
}


add_action( 'init', 'photo_post_type' );

function photo_post_type() {
	register_post_type( 'photo',
		array(
			'labels' => array(
				'name' => __( 'Photos' ),
				'singular_name' => __( 'Photo' )
			),
			'public' => true,
			'has_archive' => true,
// 			'rewrite' => false, //array('slug'=>'','with_front'=>false),
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
		)
	);
	
// 	global $wp_rewrite;
// 	$gallery_structure = '/photo/%year%/%monthnum%/%photo%';
// 	$wp_rewrite->add_rewrite_tag("%photo%", '([^/]+)', "photo=");
// 	$wp_rewrite->add_permastruct('photo', $gallery_structure, false);
// 	$wp_rewrite->flush_rules();
}


add_action( 'init', 'location_post_type' );

function location_post_type() {
	register_post_type( 'location',
		array(
			'labels' => array(
				'name' => __( 'Location' ),
				'singular_name' => __( 'Location' )
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
		)
	);
}


// add_filter( 'comment_post_redirect', 'wpse_58613_comment_redirect' );
// function wpse_58613_comment_redirect( $location )
// {
// 	return 'www.wp.pl';
// }

?>