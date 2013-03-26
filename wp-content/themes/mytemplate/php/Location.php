
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
				<?php wp_reset_postdata(); ?>
				<?php wp_reset_query(); ?>