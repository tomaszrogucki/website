<?php
/**
 * The main template file.
 *
 * This is the most generic templates file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

		<div id="primary">
		
			<div id="topbar">
				<div class="row rowTopBar">
					<div class="rowContentWrap">
						<?php
						if (is_user_logged_in()) {
							global $current_user;
							get_currentuserinfo();
						?>
						Welcome <b><?php echo($current_user->user_firstname . ' ' . $current_user->user_lastname) ?></b> <a href="<?php echo wp_logout_url('index.php'); ?>">Log out</a>
						<?php
						} else {

						?>
						login : 
						<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="loginForm">
							<input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
							<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
							<input type="submit" name="user-submit" value="submit" tabindex="14" class="submit" />
							<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
							<input type="hidden" name="user-cookie" value="1" />
						</form>
						
						<?php
						}
						?>
						
						
					</div><!-- .rowContentWrap -->
				</div><!-- .row .rowTopBar -->
			</div><!-- #topbar -->
			
			<div id="content" role="main">
			
				<div class="row">
					<div class="rowContentWrap">
						<div class="rowContent logo">
							<h1 class="logoText"><i>Tomasz Rogucki</i></h1>
						</div><!-- .rowContent .logo -->
						<div class="rowContent logoCaption">
							Bla <b>bla</b> bla about all this blog etc...<br/><br/><br/><br/><br/><br/>
						</div><!-- .rowContent .logoCaption -->
					</div><!-- .rowContentWrap -->
				</div><!-- .row -->
				
				<div class="row">
					<div class="rowContentWrap">
						<div class="rowContent">
							<div id="uploadPicture" class="rowContentText">
								Add new post
								
								<form id="uploadPictureForm" enctype='multipart/form-data'>
								    <input type="file" name="uploadPictureInput" value="Upload Photo" />
								    <input type="button" value="Upload" name="uploadPictureSubmit" onclick="uploadpicture('uploadPictureForm', '<?php echo(WEB_ROOT . 'php/UploadPicture.php'); ?>');" />
								</form>
								
								
								<?php 
	
	// 							global $user_ID;
	// 							$new_post = array(
	// 									'post_title' => 'My New Post',
	// 									'post_content' => 'Lorem ipsum dolor sit amet...',
	// 									'post_status' => 'publish',
	// 									'post_date' => date('Y-m-d H:i:s'),
	// 									'post_author' => $user_ID,
	// 									'post_type' => 'post',
	// 									'post_category' => array(0)
	// 							);
	// 							$post_id = wp_insert_post($new_post);
								
								?>
							
							</div>
						</div><!-- .rowContent -->
					</div><!-- .rowContentWrap -->
				</div><!-- .row -->
				
				<?php 
				$args = array(
				    'post_type' => 'post', //'picture',
				    'posts_per_page' => 5
				);
				
				// Query the posts:
				$pictures_query = new WP_Query($args);
	
				?>
				<?php if ( have_posts() ) : ?>
	
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						
						<div class="row">
							<div class="rowLabelWrap">
								<div class="rowLabel">
									<div class="rowLabelDate"><?php the_date('d M Y'); ?></div>
									<?php if(strlen(get_the_author()) > 0) { ?>
									<div class="rowLabelAuthor"><?php the_author(); ?></div>
									<?php } ?>
								</div><!-- .rowLabel -->
							</div><!-- .rowLabelWrap -->
							
							<div class="rowContentWrap">
								<div class="rowContent">
									<div class="rowContentText">
										<h1><?php the_title(); ?></h1>
										<?php the_content(); ?>
									</div><!-- .rowContentText -->

									<?php 
									// comments
									$args = array(
										'status' => 'hold',
										//'number' => '5',
										'post_id' => $post_id, // use post_id, not post_ID
									);
									$comments = get_comments($args);
									$i = 0;
									
									foreach($comments as $comment) :
									?>
									
									<div class="rowCommentWrap <?php echo($i % 2 ? 'rowCommentEven' : 'rowCommentOdd'); ?>">
										<div class="rowCommentAuthorWrap">
											<div class="rowCommentAuthor">
												<?php echo($comment->comment_author); ?>:
											</div><!-- .rowCommentAuthor -->
										</div><!-- .rowCommentAuthorWrap -->
										<div class="rowCommentContentWrap">
											<div class="rowCommentContent">
												<?php echo($comment->comment_content); ?>
											</div><!-- .rowCommentContent -->
										</div><!-- .rowCommentContentWrap -->
									</div><!-- .rowContentText -->
									
									<?php 
									$i++;
									endforeach;
									?>
									
									<div class="rowCommentWrap">
										<div class="rowCommentAddComment">
										<?php 
										$fields =  array(
												'author' => '<p class="comment-form-author" placeholder="Name"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
												'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
										);
										
										$comments_args = array(
											// change "Leave a Reply" to "Comment"
											'title_reply'=>'Leave a comment', 
											'comment_notes_before' => '',
											'comment_notes_after' => '',
											'label_submit'=>'Post comment',
											'fields' => apply_filters( 'comment_form_default_fields', $fields),
											'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Comment here"></textarea></p>',
										);
										
										comment_form($comments_args);
										?>
										</div>
									</div><!-- .rowContentText -->
									
									
									<?php //$withcomments = "1"; comments_template(); ?>
									<?php /*comment_form();*/ ?>
									<?php /*$time = current_time('mysql');*/ ?>
									
								</div><!-- .rowContent -->
							</div><!-- .rowContentWrap -->
						</div><!-- .row -->
						
					<?php endwhile; ?>
	
				<?php else : ?>
	
	
					<div class="row">
						<div class="rowContentWrap">
							<div class="rowContent">
								
								<article id="post-0" class="post no-results not-found">
									<header class="entry-header">
										<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
									</header><!-- .entry-header -->
				
									<div class="entry-content">
										<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
										<?php get_search_form(); ?>
									</div><!-- .entry-content -->
								</article><!-- #post-0 -->
					
							</div><!-- .rowContent -->
						</div><!-- .rowContentWrap -->
					</div><!-- .row -->
	
				<?php endif; ?>
				
				<div id="bottombar">
					<div class="row rowBottomBar">
						<div class="rowContentWrap">
							<div class="rowContentBottomBar">
								this is bottombar<br/>
								some othe caption<br/>
								copyright
							</div>
						</div><!-- .rowContentWrap -->
					</div><!-- .row -->
				</div><!-- #bottombar -->
			</div><!-- #content -->
		</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php //get_footer(); ?>
