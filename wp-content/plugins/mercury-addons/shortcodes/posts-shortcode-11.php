<?php

function mercury_posts_shortcode_11($atts) {

	ob_start();

	// Define attributes and their defaults

	extract( shortcode_atts( array (
	    'category' => '',
	    'title' => ''
	), $atts ) );

	$args = array(
		'posts_per_page'      => 3,
		'cat'                 => $category,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true
	);

	$post_query = new WP_Query( $args );

	if ( $post_query->have_posts() ) {
	?>

	<div class="space-shortcode-wrap space-posts-shortcode-11 relative">

		<?php if ( $title ) { ?>
		<div class="space-block-title relative">
			<span><?php echo esc_html($title); ?></span>
		</div>
		<?php } ?>

		<div class="space-news-11-items box-100 relative">

			<?php
				$count = 0;
				while ( $post_query->have_posts() ) : $post_query->the_post();
				$post_id = get_the_ID();
				$terms = get_the_terms( $post_id, 'category' );
				$count++;
			?>

				<?php if ($count == 1) { ?>

					<div class="space-news-11-item big box-50 relative">
						<div class="space-news-11-item-ins case-15 relative">
							<div class="space-news-11-item-image-wrap box-100 relative">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<div class="space-news-11-item-image box-100 relative">
										<?php $widget_11_img_big = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-570-430');
										if ($widget_11_img_big) {
										?>
											<img src="<?php echo esc_url($widget_11_img_big[0]); ?>" alt="<?php the_title_attribute(); ?>">
											<div class="space-overlay absolute"></div>
										<?php } ?>

										<?php if ( has_post_format( 'video' )) { ?>
											<div class="space-post-format absolute"><i class="fas fa-play"></i></div>
										<?php } ?>
										<?php if ( has_post_format( 'image' )) { ?>
											<div class="space-post-format absolute"><i class="fas fa-camera"></i></div>
										<?php } ?>
										<?php if ( has_post_format( 'gallery' )) { ?>
											<div class="space-post-format absolute"><i class="fas fa-camera"></i></div>
										<?php } ?>

										<div class="space-news-11-item-title-box absolute">
											<div class="space-news-11-item-category box-100 relative">
												<?php foreach( $terms as $term ){ ?><span><?php echo esc_html($term->name); ?></span> <?php } ?>
											</div>
											<div class="space-news-11-item-title box-100 relative">
												<?php get_the_title() ? the_title() : the_ID(); ?>
											</div>
											<div class="space-news-11-item-info relative">
												<div class="space-news-11-item-info-left absolute">
													<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'spacethemes' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
												</div>
												<div class="space-news-11-item-info-right text-right absolute">
													<span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>

				<?php } else { ?>

					<div class="space-news-11-item small box-25 relative">
						<div class="space-news-11-item-ins case-15 relative">
							<div class="space-news-11-item-image-wrap box-100 relative">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<div class="space-news-11-item-image box-100 relative">
										<?php $widget_11_img_small = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-450-450');
										if ($widget_11_img_small) {
										?>
											<img src="<?php echo esc_url($widget_11_img_small[0]); ?>" alt="<?php the_title_attribute(); ?>">
											<div class="space-overlay absolute"></div>
										<?php } ?>

										<?php if ( has_post_format( 'video' )) { ?>
											<div class="space-post-format absolute"><i class="fas fa-play"></i></div>
										<?php } ?>
										<?php if ( has_post_format( 'image' )) { ?>
											<div class="space-post-format absolute"><i class="fas fa-camera"></i></div>
										<?php } ?>
										<?php if ( has_post_format( 'gallery' )) { ?>
											<div class="space-post-format absolute"><i class="fas fa-camera"></i></div>
										<?php } ?>
									</div>
								</a>
							</div>
							<div class="space-news-11-item-category box-100 relative">
								<?php the_category(' '); ?>
							</div>
							<div class="space-news-11-item-title box-100 relative">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
							</div>
							<div class="space-news-11-item-info relative">
								<div class="space-news-11-item-info-left absolute">
									<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'spacethemes' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
								</div>
								<div class="space-news-11-item-info-right text-right absolute">
									<span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span class="space-post-views"><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
								</div>
							</div>
						</div>
					</div>

				<?php } ?>

			<?php endwhile; ?>

		</div>
	</div>

	<?php
	wp_reset_postdata();
	$posts_items = ob_get_clean();
	return $posts_items;
	}

}
 
add_shortcode('mercury-posts-11', 'mercury_posts_shortcode_11');