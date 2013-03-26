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
 * @subpackage tomaszrogucki
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
						<div id="loginText" style="display: inline-block; cursor: hand;">login <div class="triangleRight"></div> 
						</div>
						
						<div style="display: inline-block;">
							<span class="loginFormWrap" style="display: none;">
								<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="loginForm">
									<input type="text" name="log" id="loginFormName" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
									<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
									<input type="submit" name="user-submit" value="submit" tabindex="14" class="submit" />
									<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
									<input type="hidden" name="user-cookie" value="1" />
								</form>
							</span>
						</div>
						
						<?php
						}
						?>
						
						
					</div><!-- .rowContentWrap -->
				</div><!-- .row .rowTopBar -->
			</div><!-- #topbar -->
			
			<div id="content" role="main">
			
				<div class="row">
					<div class="rowContentWrap">
						<a href="<?php echo(WEB_MAIN); ?>" class="logoTextLink">
							<div class="rowContent logo">
								<span class="logoText">Tomasz Rogucki</span>
							</div><!-- .rowContent .logo -->
						</a>
						<div class="rowContent logoCaption">
							<div style="width: 50%; float: left;">
								<div style="padding: 1em; text-align: justify; letter-spacing: 0.1em; line-height: 1.1em;">This website was developed 3000 meters over the Pacific Ocean, in the middle of the Amazon Jungle, on an island with no roads and no cars, in a bus crossing various countries at a time and other bizzare places documented below.<br/></div>
							</div>
							<div style="width: 50%; float: right;">
								<div style="padding: 1em; text-align: justify; letter-spacing: 0.1em; line-height: 1.1em; font-size: 1.1em;">It is a <b>Photo Diary</b> of my RTW trip. You will find here the best moments of this journey captured with a reflex camera <i>Nikon D5000</i>.<br/></div>
								<div style="padding-right: 1em; text-align: right; font-family: 'JosefinSlab'; font-size: 1.5em; font-style: italic; text-shadow: 0.1em 0.1em 0.2em rgba(0,0,0,1);" >For life is a journey!</div>
							</div>
							<div style="clear: both;"></div>
						</div><!-- .rowContent .logoCaption -->
					</div><!-- .rowContentWrap -->
				</div><!-- .row -->
				
				<?php if(is_user_logged_in() && current_user_can('manage_options')) { ?>
				<div class="row">
					<div class="rowLabelWrap">
						<div class="rowLabel">
							<div class="rowLabelDate">Add new post</div>
						</div><!-- .rowLabel -->
					</div><!-- .rowLabelWrap -->
					<div class="rowContentWrap">
						<div class="rowContent">
							<div id="uploadPicture" class="rowContentText">
								<form id="uploadPictureForm" enctype='multipart/form-data'>
								    <input type="file" id="uploadPictureInput" value="Upload Photo" onChange="uploadpicture('uploadPictureInput', '<?php echo(WEB_ROOT . 'php/UploadPicture.php'); ?>');" />
								    <!-- <input type="button" value="Upload" name="uploadPictureSubmit" onclick="uploadpicture('uploadPictureInput', '<?php echo(WEB_ROOT . 'php/UploadPicture.php'); ?>');" />-->
								</form>
								
								<form id="newPostForm" action="<?php echo(WEB_ROOT); ?>php/NewPost.php" method="POST" enctype="multipart/form-data">
									<input type="text" id="newPostTitle" name="newPostTitle" placeholder="Title" />
									<input type="text" id="newPostCountry" name="newPostCountry" placeholder="Country" />
									<input type="text" id="newPostCity" name="newPostCity" placeholder="City" />
									<input type="text" id="newPostDate" name="newPostDate" placeholder="Date" />
									<input type="text" id="newPostAperture" name="newPostAperture" placeholder="Aperture" />
									<input type="text" id="newPostShutter" name="newPostShutter" placeholder="Shutter speed" />
									<input type="text" id="newPostZoom" name="newPostZoom" placeholder="Focal length" />
									<input type="text" id="newPostIso" name="newPostIso" placeholder="ISO" />
									<input type="hidden" id="newPostPath" name="newPostPath" value="" />
									<input type="hidden" id="newPostReferer" name="newPostReferer" value="<?php echo(WEB_MAIN); ?>" />
									<input type="hidden" id="newPostUserId" name="newPostUserId" value="<?php echo($user_ID); ?>" />
									<textarea id="newPostDescription" name="newPostDescription" placeholder="Description" cols="45" rows="8"></textarea>
									<br/>
									<input type="submit" value="Add new post" />
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
				
				<div class="row">
					<div class="rowLabelWrap">
						<div class="rowLabel">
							<div class="rowLabelDate">Add new location</div>
						</div><!-- .rowLabel -->
					</div><!-- .rowLabelWrap -->
					<div class="rowContentWrap">
						<div class="rowContent">
							<div id="uploadPicture" class="rowContentText">
								<form id="newLocationForm" action="<?php echo(WEB_ROOT); ?>php/NewLocation.php" method="POST" enctype="multipart/form-data">
									<input type="text" id="newLocationCity" name="newLocationCity" placeholder="City" />
									<input type="text" id="newLocationCountry" name="newLocationCountry" placeholder="Country" />
									<input type="text" id="newLocationDate" name="newLocationDate" placeholder="Date" />
									<input type="hidden" id="newLocationReferer" name="newLocationReferer" value="<?php echo(WEB_MAIN); ?>" />
									<input type="hidden" id="newLocationUserId" name="newLocationUserId" value="<?php echo($user_ID); ?>" />
									<br/>
									<input type="submit" value="Add new location" />
								</form>
							</div>
						</div><!-- .rowContent -->
					</div><!-- .rowContentWrap -->
				</div><!-- .row -->				
				<?php } ?>
				
				
				
				<!-- Location -->
				<?php 
				$args = array(
				    'post_type' => 'location',
				    'posts_per_page' => -1,
				);
				
				// Query the posts:
				$location_query = new WP_Query($args);
	
				?>
				
				<?php $closeLocation = false; ?>
				
				<?php if ( $location_query->have_posts() ) : ?>
	
					<?php /* Start the Loop */ ?>
					<?php $locationCounter = 0; ?>
					<?php while ( $location_query->have_posts() ) : $location_query->the_post(); ?>
						<?php $locationCounter += 1; ?>
						<?php $postId = get_the_ID(); ?>
						
						<?php
						if($locationCounter == 1)
						{
							$closeLocation = true;
						?>
						<div id="location" class="row">
							<div class="rowLabelWrap">
								<div class="rowLabel">
									<div class="rowLabelDate">Currently in</div>
								</div><!-- .rowLabel -->
							</div><!-- .rowLabelWrap -->
							
							<div class="rowContentWrap">
								<div class="rowContent">
									<div class="rowContentText">
										<?php $city = get_post_meta($postId, 'city', true); if(strlen($city) > 0) { ?>
										<div class="locationCity"><?php echo($city); ?>,</div>
										<?php } ?>
										<?php $country = get_post_meta($postId, 'country', true); if(strlen($country) > 0) { ?>
										<div class="locationCountry"><?php echo($country); ?></div>
										<?php } ?>
										
										<br/>
										<br/>
										<div class="commentShow">history <div class="triangleRight"></div></div>
									</div><!-- .rowContentText -->
						<?php 
						}
						else {
						?>
						
						
										<div class="rowCommentWrap <?php echo($locationCounter % 2 ? 'rowCommentEven' : 'rowCommentOdd'); ?>">
											<div class="rowCommentAuthorWrap">
												<div class="rowCommentAuthor">
													<div class="rowCommentAuthorDate">
														<?php the_time('d M Y'); ?>
													</div>
												</div><!-- .rowCommentAuthor -->
											</div><!-- .rowCommentAuthorWrap -->
											<div class="rowCommentContentWrap">
												<div class="rowCommentContent">
													<?php $city = get_post_meta($postId, 'city', true); if(strlen($city) > 0) { ?>
													<?php echo($city); ?>,
													<?php } ?>
													<?php $country = get_post_meta($postId, 'country', true); if(strlen($country) > 0) { ?>
													<b><?php echo($country); ?></b>
													<?php } ?>
												</div><!-- .rowCommentContent -->
											</div><!-- .rowCommentContentWrap -->
										</div><!-- .rowContentText -->
						
						<?php } ?>
						
						
					<?php endwhile; ?>
					
					<?php if($closeLocation) { ?>
								</div><!-- .rowContent -->
							</div><!-- .rowContentWrap -->
						</div><!-- .row -->
					<?php } ?>
	
				<?php else : ?>
	
	
					<div class="row">
						<div class="rowContentWrap">
							<div class="rowContent">
								
								<article id="post-0" class="post no-results not-found">
									<header class="entry-header">
										<h1 class="entry-title"><?php _e( 'Nothing Found', 'tomaszrogucki' ); ?></h1>
									</header><!-- .entry-header -->
				
									<div class="entry-content">
										<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'tomaszrogucki' ); ?></p>
										<?php get_search_form(); ?>
									</div><!-- .entry-content -->
								</article><!-- #post-0 -->
					
							</div><!-- .rowContent -->
						</div><!-- .rowContentWrap -->
					</div><!-- .row -->
	
				<?php endif; ?>
				
				<!-- Pictures -->
				<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
				$args = array(
				    'post_type' => 'photo', //'picture',
				    'posts_per_page' => 2,
					'paged' => $paged
				);
				
				// Query the posts:
// 				$photo_query = new WP_Query($args);
				query_posts($args);
				
				?>
				
				
				<?php if ( have_posts() ) : ?>
					<?php $postCounter = 0; ?>
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php $postId = get_the_ID(); ?>
						
						<div class="row">
							<div class="rowLabelWrap">
								<div class="rowLabel">
									<div class="rowLabelDate"><?php the_time('d M Y'); ?></div>
									
									<?php $country = get_post_meta($postId, 'country', true); if(strlen($country) > 0) { ?>
									<div class="rowLabelAuthor"><?php echo($country); ?></div>
									<?php } ?>
								</div><!-- .rowLabel -->
							</div><!-- .rowLabelWrap -->
							
							<div class="rowContentWrap">
								<div class="rowContent">
									<div class="rowContentText">
										
										<div id="ppw<?php echo($postCounter); ?>" class="postPictureWrap">
											<?php $path = get_post_meta($postId, 'path', true); if(strlen($path) != 0) { ?>
											<script language="javascript" type="text/javascript">
												var resizePicture = "<?php echo(WEB_ROOT . 'php/ResizePicture.php'); ?>";
												resizepicture('ppw<?php echo($postCounter); ?>','<?php echo($path); ?>',window.screen.width,resizePicture);
												//$('#ppw<?php echo($postCounter); ?>').css('border','1px solid red');
											</script>
											<!-- <img src="<?php echo($path); ?>" class="postPicture" /> -->
											<?php } ?>
											
											<div class="infoWrap">
												<?php if($post->post_title != '') { ?>
												<div class="titleWrap"><?php the_title(); ?></div>
												<?php } ?>
												
												<div class="pictureBottomBar">
													<div class="exifWrap">
														<?php $aperture = get_post_meta($postId, 'aperture', true); if(strlen($aperture) > 0) { ?>
														<div class="exif"><div class="exifDesc"><i>f</i></div> <b><?php echo($aperture); ?></b></div>
														<?php } ?>
														
														<?php $shutter = get_post_meta($postId, 'shutter', true); if(strlen($shutter) > 0) { ?>
														<div class="exif"><b><?php echo($shutter); ?></b> <div class="exifDesc">s</div></div>
														<?php } ?>
														
														<?php $zoom = get_post_meta($postId, 'zoom', true); if(strlen($zoom) > 0) { ?>
														<div class="exif"><b><?php echo($zoom); ?></b> <div class="exifDesc">mm</div></div>
														<?php } ?>
														
														<?php $iso = get_post_meta($postId, 'iso', true); if(strlen($iso) > 0) { ?>
														<div class="exif"><b><?php echo($iso); ?></b> <div class="exifDesc">ISO</div></div>
														<?php } ?>
													</div>
													
													<?php $city = get_post_meta($postId, 'city', true); if(strlen($city) > 0) { ?>
													<div class="cityWrap">
														<div class="cityText">
															<div class="exifDesc">Shot in :</div> <b><?php echo($city); ?></b>
														</div>
													</div>
													<?php } ?>
													
													<?php if($post->post_content != '') { ?>
													<div class="contentWrap">
														<div class="contentText">
															<?php the_content(); ?>
														</div>
													</div>
													<?php } ?>
												</div>
											</div>
										</div>
										
										<br/>
										<div class="commentShow"><?php comments_number( 'leave a comment', '1 comment', '% comments' ); ?> <div class="triangleRight"></div></div>
										
										
									</div><!-- .rowContentText -->

									<?php 
									// comments
									$commentStatus = 'approve';
									if(is_user_logged_in() && current_user_can('manage_options'))
									{
										$commentStatus = 'hold';
									}
									$args = array(
										'status' => $commentStatus,
										//'number' => '5',
										'post_id' => $postId, // use post_id, not post_ID
									);
									$comments = get_comments($args);
									$i = 0;
									
									foreach($comments as $comment) :
									?>
									
									<div class="rowCommentWrap <?php echo($i % 2 ? 'rowCommentEven' : 'rowCommentOdd'); ?>">
										<div class="rowCommentAuthorWrap">
											<div class="rowCommentAuthor">
												<div class="rowCommentAuthorDate">
													<?php echo(date('d M Y',strtotime($comment->comment_date))); ?>
												</div>
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
									
									<?php 
									if(url_to_postid($_SERVER['REQUEST_URI']) > 0)
									{
									?>
									
										<?php 
										// last hold comment
										$args = array(
											'status' => 'hold',
											'post_id' => $postId,
										);
										$comments = get_comments($args);
										$lastCommentHoldId = -1;
										$lastCommentHoldDate = '';
										$lastCommentHoldAuthor = '';
										foreach($comments as $comment) :
											$lastCommentHoldId = get_comment_ID();
											$lastCommentHoldDate = date('d M Y',strtotime($comment->comment_date));
											$lastCommentHoldAuthor = $comment->comment_author;
											break;
										endforeach;
										?>
										
										
										<div class="rowCommentWrap <?php echo($i % 2 ? 'rowCommentEven' : 'rowCommentOdd'); ?>">
											<div id="addedComment<?php echo($lastCommentHoldId); ?>" style="display: none;">
												<div class="rowCommentAuthorWrap">
													<div class="rowCommentAuthor">
														<div class="rowCommentAuthorDate">
															<?php echo($lastCommentHoldDate); ?>
														</div>
														<?php echo($lastCommentHoldAuthor); ?>:
													</div><!-- .rowCommentAuthor -->
												</div><!-- .rowCommentAuthorWrap -->
												<div class="rowCommentContentWrap">
													<div class="rowCommentContent">
														Your comment has been submitted and will become visible after moderation!
													</div><!-- .rowCommentContent -->
												</div><!-- .rowCommentContentWrap -->
											</div>
										</div><!-- .rowContentText -->
									
									<?php 
									}
									?>
									
									<div class="rowCommentWrap">
										<div class="rowCommentAddComment">
										<?php 
										$fields =  array(
												'author' => '<p class="comment-form-author"><div style="width: 20%;">Name (*) : </div>' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" style="display: inline-block;" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
												'email' => '<p class="comment-form-email"><div style="width: 20%;">Email (*) : </div>' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
										);
										
										$comments_args = array(
											// change "Leave a Reply" to "Comment"
											'title_reply'=>'Leave a comment', 
											'comment_notes_before' => '',
											'comment_notes_after' => '',
											'label_submit'=>'Post comment',
											'fields' => apply_filters( 'comment_form_default_fields', $fields),
											'comment_field' => '<p class="comment-form-comment"><div style="width: 20%;">Comment (*) : </div><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p><br/>',
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
					
					<?php $postCounter += 1; ?>
					<?php endwhile; ?>
					
					<div class="row">
							<div class="rowContentWrap">
								<div class="rowContent">
									<div id="navigation" class="rowContentText">
										<?php 
										global $wp_query;
										$big = 999999999;
										$args = array(
											'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
											'format'       => '?paged=%#%',
											'total'        => $wp_query->max_num_pages,
											'current'      => max( 1, get_query_var('paged') ),
											'show_all'     => False,
											'end_size'     => 1,
											'mid_size'     => 2,
											'prev_next'    => True,
											'prev_text'    => __('« Previous&nbsp;&nbsp;&nbsp;&nbsp;'),
											'next_text'    => __('&nbsp;&nbsp;&nbsp;&nbsp;Next »'),
											'type'         => 'plain',
											'add_args'     => False,
											'add_fragment' => ''
										);
				
										echo(paginate_links($args));
										?>
										<?php //posts_nav_link('<div style="width: 4em; display: inline-block;"></div>'); ?>
									</div><!-- .rowContentText -->
								</div><!-- .rowContent -->
							</div><!-- .rowContentWrap -->
						</div><!-- .row -->
						
				<?php else : ?>
	
	
					<div class="row">
						<div class="rowContentWrap">
							<div class="rowContent">
								
								<article id="post-0" class="post no-results not-found">
									<header class="entry-header">
										<h1 class="entry-title"><?php _e( 'Nothing Found', 'tomaszrogucki' ); ?></h1>
									</header><!-- .entry-header -->
				
									<div class="entry-content">
										<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'tomaszrogucki' ); ?></p>
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
								<div class="quotationWrap">
									<div class="quotation">
										“Travel is fatal to prejudice, bigotry, and narrow-mindedness.“ 
									</div>
									<div class="quotationAuthor">
										Mark Twain
									</div>
								</div>
								<div class="quotationWrap">
									<div class="quotation">
										“A traveler without observation is a bird without wings.”
									</div>
									<div class="quotationAuthor">
										Moslih Eddin Saadi
									</div>
								</div>
								<div class="quotationWrap">
									<div class="quotation">
										“Two roads diverged in a wood and I – I took the one less traveled by.”
									</div>
									<div class="quotationAuthor">
										Robert Frost
									</div>
								</div>
								<!--
								<div class="quotationWrap">
									<div class="quotation">
										“One’s destination is never a place, but a new way of seeing things.”
									</div>
									<div class="quotationAuthor">
										Henry Miller
									</div>
								</div>
								<div class="quotationWrap">
									<div class="quotation">
										“Tourists don’t know where they’ve been, travelers don’t know where they’re going.”
									</div>
									<div class="quotationAuthor">
										Paul Theroux
									</div>
								</div>
								<div class="quotationWrap">
									<div class="quotation">
										“Twenty years from now you will be more disappointed by the things you didn’t do than by the ones you did do. So throw off the bowlines, sail away from the safe harbor. Catch the trade winds in your sails. Explore. Dream. Discover.”
									</div>
									<div class="quotationAuthor">
										Mark Twain
									</div>
								</div>
								-->
								<!-- 
								“The world is a book and those who do not travel read only one page.” St. Augustine<br/>
								“For my part, I travel not to go anywhere, but to go. I travel for travel’s sake. The great affair is to move.” Robert Louis Stevenson<br/>
								“A journey is best measured in friends, rather than miles.” Tim Cahill</br>
								-->
							</div>
						</div><!-- .rowContentWrap -->
					</div><!-- .row -->
				</div><!-- #bottombar -->
				
				<div id="copyrightbar">
					<div class="row rowCopyrightBar">
						<div class="rowContentWrap">
							<div class="rowContentCopyrightBar">
								Copyright <b>Tomasz Rogucki</b> 2013
							</div>
						</div><!-- .rowContentWrap -->
					</div><!-- .row -->
				</div><!-- #copyrightbar -->
				
			</div><!-- #content -->
		</div><!-- #primary -->
		
		
		<!-- Scripts -->
		
		<script language="javascript" type="text/javascript">
			$("#loginText").click(function(){$(".loginFormWrap").fadeIn(); $("#loginFormName").focus();});
		</script>
		
		<script language="javascript" type="text/javascript">
			function isEmail(email) {
				var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				return regex.test(email);
			}
			
			$(".form-submit input:submit").click(
				function() {
					var name;
					var email;
					var content;
					var notComplete = false;
					name = $(this).closest('form').children('#author');
					email = $(this).closest('form').children('#email');
					content = $(this).closest('form').children('#comment');
					if(name.val().trim() === '')
					{
						name.addClass('shaddowRed');
						notComplete = true;
					}
					else
					{
						name.removeClass('shaddowRed');
					}
					if(email.val().trim() === '' || !isEmail(email.val()))
					{
						email.addClass('shaddowRed');
						notComplete = true;
					}
					else
					{
						email.removeClass('shaddowRed');
					}
					if(content.val().trim() === '')
					{
						content.addClass('shaddowRed');
						notComplete = true;
					}
					else
					{
						content.removeClass('shaddowRed');
					}
					if(notComplete)
						return false;
				}
			);
		</script>
								
		<script language="javascript" type="text/javascript">
			$("#locationHistoryShow").hover(function(){$(this).css('font-weight', 'bold').css('cursor','hand');},function(){$(this).css('font-weight', 'normal');});
			$("#locationHistoryShow").click(function(){$(this).parent().parent().children(".rowCommentWrap").toggle();$(this).children("div").toggleClass('triangleBottom').toggleClass('triangleRight');});
		</script>
								
		<script language="javascript" type="text/javascript">
			$(".commentShow").hover(function(){$(this).css('font-weight', 'bold').css('cursor','hand');},function(){$(this).css('font-weight', 'normal');});
			$(".commentShow").click(function(){$(this).parent().parent().children(".rowCommentWrap").toggle();$(this).children("div").toggleClass('triangleBottom').toggleClass('triangleRight');});
		</script>
								
		<script language="javascript" type="text/javascript">
			var addedCommentId = window.location.hash.replace('#comment-','');
			if(!isNaN(addedCommentId))
			{
				$('#addedComment' + addedCommentId).show();
			}
		</script>
								
		<script language="javascript" type="text/javascript">
			$('#location .rowCommentWrap').last().addClass('noBorderBottom');
		</script>
		
		<script language="javascript" type="text/javascript">
			$(".postPictureWrap").hover(function(){$(this).children(".infoWrap").fadeOut();},function(){$(this).children(".infoWrap").fadeIn();});
		</script>

		<!-- 
		<script src="<?php echo(WEB_ROOT . 'javascript/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
		<script>
		    //(function($){
		    //    $(window).load(function(){
		    //        $("#content").mCustomScrollbar();
		    //    });
		    //})(jQuery);
		</script>
		-->
		
<?php //get_sidebar(); ?>
<?php //get_footer(); ?>
