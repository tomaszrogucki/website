<?php
/**
 * The main template file.
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
						<div id="loginText" style="display: inline-block; cursor: hand; cursor: pointer;">login <div class="triangleRight"></div> 
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
								<div style="padding: 1em; text-align: justify; letter-spacing: 0.1em; line-height: 1.1em;">This website was developed 7000 meters over the Atlantic Ocean, in the middle of the Amazon Jungle, on an island with no roads and no cars, in a bus crossing various countries at a time and other bizzare places documented below.<br/></div>
							</div>
							<div style="width: 50%; float: right;">
								<div style="padding: 1em; text-align: justify; letter-spacing: 0.1em; line-height: 1.1em; font-size: 1.1em;">It is a <b>Photo Diary</b> of my RTW trip. You will find here the best moments of this journey captured with a reflex camera <i>Nikon D5000</i>.<br/></div>
								<div style="padding-right: 1em; text-align: right; font-family: FontFancy; font-size: 1.5em; font-style: italic; text-shadow: 0.1em 0.1em 0.2em rgba(0,0,0,1);" >For life is a journey!</div>
							</div>
							<div style="clear: both;"></div>
						</div><!-- .rowContent .logoCaption -->
					</div><!-- .rowContentWrap -->
				</div><!-- .row -->
				
				<!-- Admin panel -->
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
								    <input type="file" id="uploadPictureInput" value="Upload Photo" onChange="uploadpicture('uploadPictureInput', '<?php echo(WEB_ROOT . 'php/UploadPicture.php'); ?>');$('#newPostWrap').css('display','block');" />
								    <!-- <input type="button" value="Upload" name="uploadPictureSubmit" onclick="uploadpicture('uploadPictureInput', '<?php echo(WEB_ROOT . 'php/UploadPicture.php'); ?>');" />-->
								</form>
								
								<div id="newPostWrap">
									<form id="newPostForm" action="<?php echo(WEB_ROOT); ?>php/NewPost.php" method="POST" enctype="multipart/form-data">
										<input type="text" id="newPostTitle" name="newPostTitle" placeholder="Title" />
										<input type="text" id="newPostCity" name="newPostCity" placeholder="City" />
										<input type="text" id="newPostCountry" name="newPostCountry" placeholder="Country" />
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
								</div>
								
								
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
				
				<div class="row">
					<div class="rowLabelWrap">
						<div class="rowLabel">
							<div class="rowLabelDate">Add new theme</div>
						</div><!-- .rowLabel -->
					</div><!-- .rowLabelWrap -->
					<div class="rowContentWrap">
						<div class="rowContent">
							<div id="uploadPicture" class="rowContentText">
								<form id="newThemeForm" action="" method="POST" enctype="multipart/form-data">
									<div>Theme Name : <input type="text" id="newThemeName" name="newThemeName" /></div>
									<br/>
									<div id="newThemeShow">create new theme <div class="triangleRight"></div></div>
									<div id="newThemeWrapper">
										<br/>
										<div class="onethird">
											<b>Theme:</b><br/><br/>
											<div id="newThemeThemes" class="filelist"></div>
											<input type="hidden" id="newThemeTheme" name="newThemeTheme" />
										</div>
										<div class="onethird">
											<b>Background:</b><br/><br/>
											<div id="newThemeBackgrounds" class="filelist"></div>
											<input type="hidden" id="newThemeBackground" name="newThemeBackground" />
										</div>
										<div class="onethird">
											<b>Add Background Picture:</b><br/><br/>
											<form id="newThemeUploadBackgroundPictureForm" enctype='multipart/form-data'>
											    <input type="file" id="newThemeUploadBackgroundPictureInput" value="Upload Photo" onChange="uploadthemefile('newThemeUploadBackgroundPictureInput', 'picture', '<?php echo(WEB_ROOT . 'php/UploadThemeFile.php'); ?>'); reloadFileLists();" />
											</form>
											<br/>
											<br/>
											<b>Add Font:</b><br/><br/>
											<form id="newThemeUploadFontForm" enctype='multipart/form-data'>
											    <input type="file" id="newThemeUploadFontInput" value="Upload Font" onChange="uploadthemefile('newThemeUploadFontInput', 'font', '<?php echo(WEB_ROOT . 'php/UploadThemeFile.php'); ?>'); reloadFileLists();" />
											</form>
										</div>
										<br/>
										<br/>
										<div class="onethird">
											Normal Regular Font:<br/><br/>
											<div id="newThemeNormalRegularFonts" class="filelist"></div>
											<input type="hidden" id="newThemeNormalRegularFont" name="newThemeNormalRegularFont" />
										</div>
										<div class="onethird">
											Normal <b>Bold</b> Font:<br/><br/>
											<div id="newThemeNormalBoldFonts" class="filelist"></div>
											<input type="hidden" id="newThemeNormalBoldFont" name="newThemeNormalBoldFont" />
										</div>
										<div class="onethird">
											Normal <i>Italic</i> Font:<br/><br/>
											<div id="newThemeNormalItalicFonts" class="filelist"></div>
											<input type="hidden" id="newThemeNormalItalicFont" name="newThemeNormalItalicFont" />
										</div>
										<br/>
										<br/>
										<br/>
										<div class="onethird">
											<span class="fancyFont">Fancy Regular Font:</span><br/><br/>
											<div id="newThemeFancyRegularFonts" class="filelist"></div>
											<input type="hidden" id="newThemeFancyRegularFont" name="newThemeFancyRegularFont" />
										</div>
										<div class="onethird">
											<span class="fancyFont">Fancy <b>Bold</b> Font:</span><br/><br/>
											<div id="newThemeFancyBoldFonts" class="filelist"></div>
											<input type="hidden" id="newThemeFancyBoldFont" name="newThemeFancyBoldFont" />
										</div>
										<div class="onethird">
											<span class="fancyFont">Fancy <i>Italic</i> Font:</span><br/><br/>
											<div id="newThemeFancyItalicFonts" class="filelist"></div>
											<input type="hidden" id="newThemeFancyItalicFont" name="newThemeFancyItalicFont" />
										</div>
										<br/>
										<br/>
										<div class="onethird">
											<div>Text Color : <input type="text" id="newThemeTextColor" name="newThemeTextColor" class="colorInput" /></div>
											<div>Text Color Light Bg : <input type="text" id="newThemeTextColorLightBg" name="newThemeTextColorLightBg" class="colorInput" /></div>
											<div>Dark Bg : <input type="text" id="newThemeDarkBg" name="newThemeDarkBg" class="colorInput" /></div>
											<div>Light Bg : <input type="text" id="newThemeLightBg" name="newThemeLightBg" class="colorInput" /></div>
										</div>
										<div class="onethird">
											<div>Shadow : <input type="text" id="newThemeShadow" name="newThemeShadow" class="colorInput" /></div>
											<div>Comment Even Bg : <input type="text" id="newThemeCommentEvenBg" name="newThemeCommentEvenBg" class="colorInput" /></div>
											<div>Comment Separator : <input type="text" id="newThemeCommentSeparator" name="newThemeCommentSeparator" class="colorInput" /></div>
										</div>
										<div class="onethird">
											<div>Label Date Text Color : <input type="text" id="newThemeLabelDateTextColor" name="newThemeLabelDateTextColor" class="colorInput" /></div>
											<div>Label Country Text Color : <input type="text" id="newThemeLabelCountryTextColor" name="newThemeLabelCountryTextColor" class="colorInput" /></div>
											<div>Label Dark Bg : <input type="text" id="newThemeLabelDarkBg" name="newThemeLabelDarkBg" class="colorInput" /></div>
											<div>Label Light Bg : <input type="text" id="newThemeLabelLightBg" name="newThemeLabelLightBg" class="colorInput" /></div>
										</div>
										<br/>
										<br/>
										<br/>
										<div class="onethird">
											<div>Input Bg : <input type="text" id="newThemeInputBg" name="newThemeInputBg" class="colorInput" /></div>
											<div>Submit Bg : <input type="text" id="newThemeSubmitBg" name="newThemeSubmitBg" class="colorInput" /></div>
										</div>
										<div class="onethird">
											<div>Title Bg : <input type="text" id="newThemeTitleBg" name="newThemeTitleBg" class="colorInput" /></div>
											<div>Content Bg : <input type="text" id="newThemeContentBg" name="newThemeContentBg" class="colorInput" /></div>
											<div>Exif Bg : <input type="text" id="newThemeExifBg" name="newThemeExifBg" class="colorInput" /></div>
										</div>
										
										<input type="hidden" id="newThemeReferer" name="newLocationReferer" value="<?php echo(WEB_MAIN); ?>" />
										<input type="hidden" id="newThemeUserId" name="newLocationUserId" value="<?php echo($user_ID); ?>" />
										<br/>
										<input type="button" id="newThemeSubmit" value="Add new theme" />
									</div>
								</form>
							</div>
						</div><!-- .rowContent -->
					</div><!-- .rowContentWrap -->
				</div><!-- .row -->
				
				<!-- Scripts -->
				
				<script language="javascript" type="text/javascript">
					function reloadFileLists()
					{
						var listFiles = "<?php echo(WEB_ROOT . 'php/ListFiles.php'); ?>";
						listfiles('newThemeThemes','theme',listFiles);

						listFiles = "<?php echo(WEB_ROOT . 'php/ListFiles.php'); ?>";
						listfiles('newThemeBackgrounds','background',listFiles);

						listFiles = "<?php echo(WEB_ROOT . 'php/ListFiles.php'); ?>";
						listfiles('newThemeNormalRegularFonts','font',listFiles);

						listFiles = "<?php echo(WEB_ROOT . 'php/ListFiles.php'); ?>";
						listfiles('newThemeNormalBoldFonts','font',listFiles);

						listFiles = "<?php echo(WEB_ROOT . 'php/ListFiles.php'); ?>";
						listfiles('newThemeNormalItalicFonts','font',listFiles);

						listFiles = "<?php echo(WEB_ROOT . 'php/ListFiles.php'); ?>";
						listfiles('newThemeFancyRegularFonts','font',listFiles);

						listFiles = "<?php echo(WEB_ROOT . 'php/ListFiles.php'); ?>";
						listfiles('newThemeFancyBoldFonts','font',listFiles);

						listFiles = "<?php echo(WEB_ROOT . 'php/ListFiles.php'); ?>";
						listfiles('newThemeFancyItalicFonts','font',listFiles);
					}
				</script>
				
				<script language="javascript" type="text/javascript">
					reloadFileLists();
				</script>
				
				<script language="javascript" type="text/javascript">
					$('input[id^=newTheme]').change(function() {reloadThemeCss();});
				</script>
				
				<script language="javascript" type="text/javascript">
					function getThemeContent()
					{
						var themeContent = "/*" + $('#newThemeBackground').val() + "*/\n/**/\n"
						+ "@define{font_normal_regular:" + $('#newThemeNormalRegularFont').val() + ";}\n"
						+ "@define{font_normal_bold:" + $('#newThemeNormalBoldFont').val() + ";}\n"
						+ "@define{font_normal_italic:" + $('#newThemeNormalItalicFont').val() + ";}\n"
						+ "@define{font_fancy_regular:" + $('#newThemeFancyRegularFont').val() + ";}\n"
						+ "@define{font_fancy_bold:" + $('#newThemeFancyBoldFont').val() + ";}\n"
						+ "@define{font_fancy_italic:" + $('#newThemeFancyItalicFont').val() + ";}\n"
						+ "@define{font_normal:FontNormal, Arial, Helvetica, sans-serif;}\n"
						+ "@define{font_fancy:FontFancy, Arial, Helvetica, sans-serif;}\n"
						+ "@define{text_color:" + $('#newThemeTextColor').val() + ";}\n"
						+ "@define{text_color_light_bg:" + $('#newThemeTextColorLightBg').val() + ";}\n"
						+ "@define{dark_bg:" + $('#newThemeDarkBg').val() + ";}\n"
						+ "@define{light_bg:" + $('#newThemeLightBg').val() + ";}\n"
						+ "@define{shadow:" + $('#newThemeShadow').val() + ";}\n"
						+ "@define{comment_even_bg:" + $('#newThemeCommentEvenBg').val() + ";}\n"
						+ "@define{comment_separator:" + $('#newThemeCommentSeparator').val() + ";}\n"
						+ "@define{label_date_text_color:" + $('#newThemeLabelDateTextColor').val() + ";}\n"
						+ "@define{label_country_text_color:" + $('#newThemeLabelCountryTextColor').val() + ";}\n"
						+ "@define{label_dark_bg:" + $('#newThemeLabelDarkBg').val() + ";}\n"
						+ "@define{label_light_bg:" + $('#newThemeLabelLightBg').val() + ";}\n"
						+ "@define{input_bg:" + $('#newThemeInputBg').val() + ";}\n"
						+ "@define{submit_bg:" + $('#newThemeSubmitBg').val() + ";}\n"
						+ "@define{title_bg:" + $('#newThemeTitleBg').val() + ";}\n"
						+ "@define{content_bg:" + $('#newThemeContentBg').val() + ";}\n"
						+ "@define{exif_bg:" + $('#newThemeExifBg').val() + ";}\n";
						return themeContent;
					}
				</script>
				
				
				<script language="javascript" type="text/javascript">
					function reloadThemeCss()
					{
						var bigBackground = "<?php echo(WEB_ROOT . 'php/BigBackground.php'); ?>";
						var themeContent = getThemeContent();
						loadStyle(bigBackground,themeContent);
					}
				</script>
				
				<script>
					function colorInput() {
						$(".colorInput").spectrum({
					        preferredFormat: "rgb",
					        showInput: true,
					        showPalette: true,
					        showAlpha: true,
					        showSelectionPalette: true,
					        localStorageKey: "spectrum.newtheme",
					        clickoutFiresChange: true,
					        showInitial: true,
						});
					}
				</script>
				
				<script language="javascript" type="text/javascript">
					function readThemeCss(theme)
					{
						if(typeof(theme) === 'undefined')
							theme = 'default.css';
						var readCssTheme = "<?php echo(WEB_ROOT . 'php/ReadCssTheme.php'); ?>";
						readcsstheme(theme,readCssTheme);
						$('#newThemeName').val(theme);
						reloadThemeCss();
						colorInput();
					}
				</script>
				
				<script language="javascript" type="text/javascript">
					//readThemeCss();
				</script>
				
				<script language="javascript" type="text/javascript">
					$('.colorInput').change(function() {colorInput();});
				</script>
				
				<script language="javascript" type="text/javascript">
					function refreshFilelist()
					{
						$('.filelist div').each(function() {
							var theId = $(this).parent().attr('id');
							if(theId == 'newThemeThemes') {
								if($(this).text() === $('#newThemeName').val()) {
									$(this).siblings().css('font-weight','normal');
									$(this).css('font-weight', 'bold');
								};
							}
							else {
								theId = theId.substring(0, theId.length - 1);
								if($(this).text() === $('#' + theId).val()) {
									$(this).siblings().css('font-weight','normal');
									$(this).css('font-weight', 'bold');
								}
							}
						});
					}
				
					$('.filelist').delegate('div', 'click', function() {
						//$(this).siblings().css('font-weight','normal');
						//$(this).css('font-weight','bold');
						var theId = $(this).parent().attr('id');
						if(theId == 'newThemeThemes') {
							readThemeCss($(this).text());
						}
						else {
							theId = theId.substring(0, theId.length - 1);
							$('#' + theId).val($(this).text());
							reloadThemeCss();
						}
						refreshFilelist();
					});
					
					$('.filelist').delegate('div', 'mouseover', function() {
						refreshFilelist();
					});
				</script>
		
				<script language="javascript" type="text/javascript">
					$('#newThemeSubmit').click(
						function()
						{
							if($('#newThemeName').val().trim() === 'default.css')
								return false;
							else
							{
								var saveTheme = "<?php echo(WEB_ROOT . 'php/SaveTheme.php'); ?>";
								savetheme($('#newThemeName').val().trim(), getThemeContent(), saveTheme);
								$('#newThemeSubmit').after('<span id="themeSaved"> Theme Saved!</span>');
								$('#newThemeSubmit').siblings('span[id=themeSaved]').fadeOut();
							}
						}
					);
				</script>
						
				<script language="javascript" type="text/javascript">
					$("#newThemeShow").hover(function(){$(this).css('font-weight', 'bold').css('cursor','hand').css('cursor','pointer');},function(){$(this).css('font-weight', 'normal');});
					$("#newThemeShow").click(function(){readThemeCss();$("#newThemeWrapper").toggle();$(this).children("div").toggleClass('triangleBottom').toggleClass('triangleRight');});
				</script>
				
				<!-- End Scripts -->
				
				<?php } ?>
				<!-- End Admin panel -->
				
				
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
				    'posts_per_page' => 10,
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
									$path = parse_url(get_permalink($postId));
									$query = $path['query'];
									parse_str($query, $queryParsed);
									$postTitle = $queryParsed['photo'];
									if($postTitle == $_GET['photo'])
// 									if(url_to_postid($_SERVER['REQUEST_URI']) > 0)
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
										
										<?php if($lastCommentHoldId != -1) { ?>
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
										<?php } ?>
									
									<?php 
									}
									?>
									
									<div class="rowCommentWrap">
										<div class="rowCommentAddComment">
										<?php 
										$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
										$fields =  array(
												'author' => '<p class="comment-form-author"><div style="width: 20%;">Name (*) : </div>' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" style="display: inline-block;" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
												'email' => '<p class="comment-form-email"><div style="width: 20%;">Email (*) : </div>' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
												'redirect_to' => '<input type="hidden" name="redirect_to" value="'.get_permalink().'&paged='.$paged.'"/>',
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
								<?php require_once(SERVER_ROOT . 'php/RandomQuotation.php'); ?>
							</div>
						</div><!-- .rowContentWrap -->
					</div><!-- .row -->
				</div><!-- #bottombar -->
				
				<div id="copyrightbar">
					<div class="row rowCopyrightBar">
						<div class="rowContentWrap">
							<div class="rowContentCopyrightBar">
								&copy; <b>Tomasz Rogucki</b> 2013
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
			$("#locationHistoryShow").hover(function(){$(this).css('font-weight', 'bold').css('cursor','hand').css('cursor','pointer');},function(){$(this).css('font-weight', 'normal');});
			$("#locationHistoryShow").click(function(){$(this).parent().parent().children(".rowCommentWrap").toggle();$(this).children("div").toggleClass('triangleBottom').toggleClass('triangleRight');});
		</script>
								
		<script language="javascript" type="text/javascript">
			$(".commentShow").hover(function(){$(this).css('font-weight', 'bold').css('cursor','hand').css('cursor','pointer');},function(){$(this).css('font-weight', 'normal');});
			$(".commentShow").click(function(){$(this).parent().parent().children(".rowCommentWrap").toggle();$(this).children("div").toggleClass('triangleBottom').toggleClass('triangleRight');});
		</script>
								
		<script language="javascript" type="text/javascript">
			var addedCommentId = window.location.hash.replace('#comment-','');
			if(!isNaN(addedCommentId))
			{
				$('#addedComment' + addedCommentId).show();
				$('#addedComment' + addedCommentId).parent().parent().children(".rowCommentWrap").css('display','block'); // TODO: check this
			}
		</script>
								
		<script language="javascript" type="text/javascript">
			$('#location .rowCommentWrap').last().addClass('noBorderBottom');
		</script>
		
		<script language="javascript" type="text/javascript">
			$(".postPictureWrap").hover(function(){$(this).children(".infoWrap").fadeOut();},function(){$(this).children(".infoWrap").fadeIn();});
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
