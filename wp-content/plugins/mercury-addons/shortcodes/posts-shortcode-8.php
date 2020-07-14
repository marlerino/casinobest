<?php

function mercury_posts_shortcode_8($atts) {

	ob_start();

	// Define attributes and their defaults

	extract( shortcode_atts( array (
	    'items_number' => 4,
	    'category' => '',
	    'title' => ''
	), $atts ) );

	$args = array(
		'posts_per_page'      => $items_number,
		'cat'                 => $category,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true
	);

	$post_query = new WP_Query( $args );

	if ( $post_query->have_posts() ) {
	?>

	<div class="space-shortcode-wrap space-posts-shortcode-8 relative">

		<?php if ( $title ) { ?>
		<div class="space-block-title relative">
			<span><?php echo esc_html($title); ?></span>
		</div>
		<?php } ?>

		<div class="space-news-8-items box-100 relative owl-carousel">

			<?php
				while ( $post_query->have_posts() ) : $post_query->the_post();
				$post_id = get_the_ID();
				$terms = get_the_terms( $post_id, 'category' );
			?>

				<div class="space-news-8-item box-100 relative">
					<div class="space-news-8-item-ins case-15 relative">
						<div class="space-news-8-item-img relative">
							<?php
								$widget_8_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-1170-505');
								$widget_8_img_450_600 = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-450-600');
								$widget_8_img_737_556 = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-737-556');
								if ($widget_8_img) { ?>
							<style type="text/css">
									.widget_8_img_450_600,
									.widget_8_img_737_556 {
										display: none !important;
									}
								@media screen and (max-width: 767px) and (min-width: 480px) {
									.widget_8_img {
										display: none !important;
									}
									.widget_8_img_737_556 {
										display: block !important;
									}
								}
								@media screen and (max-width: 479px) {
									.widget_8_img {
										display: none !important;
									}
									.widget_8_img_450_600 {
										display: block !important;
									}
								}
							</style>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<div class="space-news-8-item-img-ins">
									<img src="<?php echo esc_url($widget_8_img_450_600[0]); ?>" alt="<?php the_title_attribute(); ?>" class="widget_8_img_450_600">
									<img src="<?php echo esc_url($widget_8_img_737_556[0]); ?>" alt="<?php the_title_attribute(); ?>" class="widget_8_img_737_556">
									<img src="<?php echo esc_url($widget_8_img[0]); ?>" alt="<?php the_title_attribute(); ?>" class="widget_8_img">
									<div class="space-overlay absolute"></div>
									<?php if ( has_post_format( 'video' )) { ?>
										<div class="space-post-format absolute"><i class="fas fa-play"></i></div>
									<?php } ?>
									<?php if ( has_post_format( 'image' )) { ?>
										<div class="space-post-format absolute"><i class="fas fa-camera"></i></div>
									<?php } ?>
									<?php if ( has_post_format( 'gallery' )) { ?>
										<div class="space-post-format absolute"><i class="fas fa-camera"></i></div>
									<?php } ?>
									<div class="space-news-8-item-title absolute">
										<div class="relative">
											<div class="space-news-8-item-title-category relative">
											<?php foreach( $terms as $term ){ ?><span><?php echo esc_html($term->name); ?></span> <?php } ?>
											</div>
											<div class="space-news-8-item-title-box relative">
												<?php get_the_title() ? the_title() : the_ID(); ?>
											</div>
											<div class="space-news-8-item-title-meta relative">
												<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'spacethemes' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
												<span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
											</div>
										</div>
									</div>
								</div>
							</a>
							<?php } ?>
						</div>
					</div>
				</div>

			<?php endwhile; ?>

		</div>
	</div>

	<?php
	wp_reset_postdata();
	$posts_items = ob_get_clean();
	return $posts_items;
	}

}
 
add_shortcode('mercury-posts-8', 'mercury_posts_shortcode_8');