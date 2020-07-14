<?php

function mercury_posts_shortcode_2($atts) {

	ob_start();

	// Define attributes and their defaults

	extract( shortcode_atts( array (
	    'category' => '',
	    'title' => ''
	), $atts ) );

	$first_args = array(
		'posts_per_page'      => 1,
		'cat'                 => $category,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true
	);

	$second_args = array(
		'posts_per_page'      => 4,
		'offset'	          => 1,
		'cat'                 => $category,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true
	);

	$post_query_first = new WP_Query( $first_args );

	if ( $post_query_first->have_posts() ) {

	?>

	<div class="space-shortcode-wrap space-posts-shortcode-2 relative">

		<?php if ( $title ) { ?>
		<div class="space-block-title relative">
			<span><?php echo esc_html($title); ?></span>
		</div>
		<?php } ?>

		<div class="space-news-2-items box-100 relative">
			<div class="space-news-2-items-left box-50 left relative">
				<?php while ( $post_query_first->have_posts() ) : $post_query_first->the_post();
					$post_id = get_the_ID();
					$terms = get_the_terms( $post_id, 'category' );
				?>
				<?php
					$widget_3_big = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-737-983');
					$widget_3_big_mobile = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-450-600');
				if ($widget_3_big) { ?>
				<div class="space-news-2-item-big relative">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<div class="space-news-2-item-big-ins relative">
							<img src="<?php echo esc_url($widget_3_big[0]); ?>" alt="<?php the_title_attribute(); ?>" class="space-desktop-view">
							<img src="<?php echo esc_url($widget_3_big_mobile[0]); ?>" alt="<?php the_title_attribute(); ?>" class="space-mobile-view">
							<div class="space-news-2-item-big-box absolute">
								<div class="space-news-2-item-big-box-category relative">
									<?php foreach( $terms as $term ){ ?><span><?php echo esc_html($term->name); ?></span> <?php } ?>
								</div>
								<div class="space-news-2-item-big-box-title relative">
									<?php get_the_title() ? the_title() : the_ID(); ?>
								</div>
								<div class="space-news-2-item-big-box-excerpt relative">
									<?php echo esc_html(wp_trim_words( get_the_excerpt(), 30, ' ...' )); ?>
								</div>
								<div class="space-news-2-item-top relative">
									<div class="space-news-2-item-top-ins box-100 relative">
										<div class="space-news-2-item-top-left absolute">
											<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'spacethemes' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
										</div>
										<div class="space-news-2-item-top-right text-right absolute">
											<span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
										</div>
									</div>
								</div>
							</div>
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
				<?php } ?>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
			</div>
			<div class="space-news-2-items-right box-50 left relative">
				<div class="space-news-2-small-items box-100 relative">
					<?php 
						$post_query_second = new WP_Query( $second_args );
						while ( $post_query_second->have_posts() ) : $post_query_second->the_post();
					?>
					<div class="space-news-2-small-item box-50 left relative">
						<div class="space-news-2-small-item-ins case-15 relative">
							<div class="space-news-2-small-item-img relative">
								<?php $widget_3_small = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-450-450'); if ($widget_3_small) { ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<div class="space-news-2-small-item-img-ins">
										<img src="<?php echo esc_url($widget_3_small[0]); ?>" alt="<?php the_title_attribute(); ?>">
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
									</div>
								</a>
								<?php } ?>
								<div class="space-news-2-small-item-img-category <?php if ($widget_3_small) { ?>absolute<?php } ?>"><?php the_category(' '); ?></div>
							</div>
							<div class="space-news-2-small-item-title-box relative">
								<div class="space-news-2-small-item-title relative">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
								</div>
								<div class="space-news-2-small-item-meta relative">
									<div class="space-news-2-small-item-meta-left absolute">
										<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'spacethemes' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
									</div>
									<div class="space-news-2-small-item-meta-right text-right absolute">
										<span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span class="space-post-views"><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>

	<?php
	wp_reset_postdata();
	$posts_items = ob_get_clean();
	return $posts_items;
	}

}
 
add_shortcode('mercury-posts-2', 'mercury_posts_shortcode_2');