<?php
	$game_allowed_html = array(
		'a' => array(
			'href' => true,
			'title' => true,
			'target' => true,
			'rel' => true
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'span' => array(
			'class' => true
		),
		'div' => array(
			'class' => true
		),
		'p' => array(),
		'ul' => array(),
		'ol' => array(),
		'li' => array(),

	);
	$game_pros_desc = wp_kses( get_post_meta( get_the_ID(), 'game_pros_desc', true ), $game_allowed_html );
	$game_cons_desc = wp_kses( get_post_meta( get_the_ID(), 'game_cons_desc', true ), $game_allowed_html );
	$game_short_desc = wp_kses( get_post_meta( get_the_ID(), 'game_short_desc', true ), $game_allowed_html );
	$game_external_link = esc_url( get_post_meta( get_the_ID(), 'game_external_link', true ) );
	$game_button_title = esc_html( get_post_meta( get_the_ID(), 'game_button_title', true ) );
	$game_button_notice = wp_kses( get_post_meta( get_the_ID(), 'game_button_notice', true ), $game_allowed_html );
	$game_rating = esc_html( get_post_meta( get_the_ID(), 'game_rating_one', true ) );

	if ($game_button_title) {
		$button_title = $game_button_title;
	} else {
		if ( get_option( 'games_play_now_title') ) {
			$button_title = esc_html( get_option( 'games_play_now_title') );
		} else {
			$button_title = esc_html__( 'Play Now', 'mercury' );
		}
	}
?>

<div class="space-single-casino space-style-2-casino game-page-style-2 relative">

	<!-- Game Header Start -->

	<div class="space-style-2-casino-header box-100 relative">
		<div class="space-style-2-casino-header-ins space-page-wrapper relative">
			<div class="space-style-2-casino-header-elements box-100 relative">
				<div class="space-style-2-casino-header-left box-75 relative">
					<div class="space-style-2-casino-header-left-ins relative">
						<div class="space-casino-header-logo-title box-100 relative">
							<div class="space-casino-header-logo-box relative">

								<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-135-135'); if ($src) { ?>
								<img src="<?php echo esc_url($src[0]); ?>" alt="<?php the_title_attribute(); ?>">
								<?php } ?>

								<?php if ($game_rating) { ?>
								<div class="space-casino-header-logo-rating absolute">
									<?php echo esc_html( number_format( round( $game_rating, 1 ), 1, '.', ',') ); ?> <i class="fas fa-star"></i>
								</div>
								<?php } ?>

							</div>
							<div class="space-casino-header-title-box relative">
								<div class="space-casino-header-title-box-ins box-100 relative">

									<!-- Title Start -->

									<h1><?php the_title(); ?></h1>

									<!-- Title End -->

									<!-- Vendors Start -->

									<?php
									$vendors = get_the_terms( $post->ID , 'vendor' );
									if ($vendors) { ?>
										<div class="space-vendors relative">
											<div class="space-vendors-items relative">
												<span>
													<?php echo esc_html__( 'by', 'mercury' ); ?>
												</span>
												<?php foreach ( $vendors as $vendor ) { ?>
													<?php
													$vendor_logo = get_term_meta($vendor->term_id, 'taxonomy-image-id', true);
													if ($vendor_logo) { ?>
														<a href="<?php echo esc_url (get_term_link( (int)$vendor->term_id, $vendor->taxonomy )); ?>" title="<?php echo esc_attr($vendor->name); ?>" class="space-vendors-item">
															<?php echo wp_get_attachment_image( $vendor_logo, 'mercury-9999-32', "", array( "class" => "space-vendor-logo" ) );  ?>
														</a>
													<?php } else {  ?>
														<a href="<?php echo esc_url (get_term_link( (int)$vendor->term_id, $vendor->taxonomy )); ?>" title="<?php echo esc_attr($vendor->name); ?>" class="space-vendors-item name">
															<?php echo esc_html($vendor->name); ?>
														</a>
													<?php } ?>
												<?php } ?>
											</div>
										</div>
									<?php } ?>

									<!-- Vendors End -->

									<?php if ($game_short_desc) { ?>

									<!-- Short Description of the Game Start -->

									<div class="space-casino-header-short-desc relative">
										<?php echo wp_kses( $game_short_desc, $game_allowed_html ); ?>
									</div>

									<!-- Short Description of the Game End -->

									<?php } ?>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="space-style-2-casino-header-right box-25 relative">
					<div class="space-casino-header-button text-center box-100 relative">

						<?php if ($game_external_link) { ?>

						<!-- Button Start -->

						<a href="<?php echo esc_url( $game_external_link ); ?>" title="<?php echo esc_attr( $button_title ); ?>" class="space-style-2-button" rel="nofollow" target="_blank"><?php echo esc_html( $button_title ); ?> <i class="fas fa-arrow-alt-circle-right"></i></a>

						<!-- Button End -->

						<?php } ?>

						<?php if ($game_button_notice) { ?>

						<!-- The notice below of the button Start -->

						<div class="space-casino-header-button-notice relative">
							<?php echo wp_kses( $game_button_notice, $game_allowed_html ); ?>
						</div>

						<!-- The notice below of the button End -->

						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Game Header End -->

	<!-- Breadcrumbs Start -->

	<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>

	<!-- Breadcrumbs End -->

		<!-- Single Game Page Section Start -->

		<div class="space-page-section box-100 relative">
			<div class="space-page-section-ins space-page-wrapper relative">
				<div class="space-content-section box-100 relative">

							<div class="space-page-content-wrap relative">

								<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
								<?php if(function_exists('spacethemes_set_post_views')) { spacethemes_set_post_views(get_the_ID()); } ?>

								<?php if(has_excerpt()) { ?>
								<div class="space-casino-content-excerpt relative">
									<?php the_excerpt(); ?>
								</div>
								<?php } ?>

								<!-- Pros/Cons Start -->

								<?php if ($game_pros_desc || $game_cons_desc) { ?>

								<div class="space-pros-cons box-100 relative">
									<?php if ($game_pros_desc) { ?>
									<div class="space-pros <?php if (!$game_cons_desc) { ?>box-100<?php } else { ?>box-50<?php } ?> relative">
										<div class="space-pros-ins relative">
											<div class="space-pros-title box-100 relative">
												<?php
													if ( get_option( 'games_pros_title') ) {
														echo esc_html( get_option( 'games_pros_title') );
													} else {
														echo esc_html__( 'Pros', 'mercury' );
													}
												?>
											</div>
											<div class="space-pros-description box-100 relative">
												<?php echo wp_kses( $game_pros_desc, $game_allowed_html ); ?>
											</div>
										</div>
									</div>
									<?php } ?>
									<?php if ($game_cons_desc) { ?>
									<div class="space-cons <?php if (!$game_pros_desc) { ?>box-100<?php } else { ?>box-50<?php } ?> relative">
										<div class="space-cons-ins relative">
											<div class="space-cons-title box-100 relative">
												<?php
													if ( get_option( 'games_cons_title') ) {
														echo esc_html( get_option( 'games_cons_title') );
													} else {
														echo esc_html__( 'Cons', 'mercury' );
													}
												?>
											</div>
											<div class="space-cons-description box-100 relative">
												<?php echo wp_kses( $game_cons_desc, $game_allowed_html ); ?>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>

								<?php } ?>

								<!-- Pros/Cons End -->

								<div class="space-page-content-box-wrap relative">
									<div class="space-page-content box-100 relative">
										<?php
											the_content();
											wp_link_pages( array(
												'before'      => '<div class="clear"></div><nav class="navigation pagination-post">' . esc_html__( 'Pages:', 'mercury' ),
												'after'       => '</nav>',
												'link_before' => '<span class="page-number">',
												'link_after'  => '</span>',
											) );
										?>
									</div>
								</div>

								<?php endwhile; ?>
								<?php endif; ?>

							</div>


					<!-- Related Games Start -->

					<?php
						$game_category_list = get_the_terms( $post->ID, 'game-category' );

						if ( $game_category_list ) {
							
							$game_category_string = wp_list_pluck( $game_category_list, 'term_id' );

							$game_args = get_posts(
								array(
									'posts_per_page' => 8,
									'post_type'      => 'game',
									'exclude'        => $post->ID,
									'tax_query'      => array(
										array(
											'taxonomy' => 'game-category',
											'field'    => 'id',
											'terms'    => $game_category_string
										)
									)
								)
							);
							if( $game_args ){
						?>

						<div class="space-related-items box-100 read-more-block relative">
							<div class="space-related-items-ins space-page-wrapper relative">
								<div class="space-block-title relative">
									<span><?php esc_html_e( 'More Games', 'mercury' ); ?></span>
								</div>
								<div class="space-games-archive-items box-100 relative">

									<?php
										foreach( $game_args as $post ){
										setup_postdata($post);
										
										// connect the game loop item style
										get_template_part( '/aces/game-item-style-1' );

										}
										wp_reset_postdata();
									?>

								</div>
							</div>
						</div>

						<?php }
					} ?>

					<!-- Related Games End -->

					<?php if ( comments_open() || get_comments_number() ) :?>

					<!-- Comments Start -->

					<?php comments_template(); ?>

					<!-- Comments End -->

					<?php endif; ?>

				</div>
			</div>
		</div>

		<!-- Single Game Page Section End -->

</div>