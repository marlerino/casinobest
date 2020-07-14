<?php

function mercury_posts_shortcode_3($atts) {

	ob_start();

	// Define attributes and their defaults

	extract( shortcode_atts( array (
	    'items_number' => 4,
	    'category' => '',
	    'columns' => 4,
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

	<div class="space-shortcode-wrap space-posts-shortcode-3 relative">

		<?php if ( $title ) { ?>
		<div class="space-block-title relative">
			<span><?php echo esc_html($title); ?></span>
		</div>
		<?php } ?>

		<div class="space-news-3-items box-100 relative">

			<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

			<div class="space-news-3-item <?php if ($columns == 1) { ?>box-100<?php } else if ($columns == 2) { ?>box-50<?php } else if ($columns == 3) { ?>box-33<?php } else { ?>box-25<?php } ?> left relative">
				<div class="space-news-3-item-ins case-15 relative">
					<div class="space-news-3-item-img relative">
						<?php $widget_4_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-450-338'); if ($widget_4_img) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<div class="space-news-3-item-img-ins">
								<img src="<?php echo esc_url($widget_4_img[0]); ?>" alt="<?php the_title_attribute(); ?>">
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
						<div class="space-news-3-item-img-category <?php if ($widget_4_img) { ?>absolute<?php } ?>"><?php the_category(' '); ?></div>
					</div>
					<div class="space-news-3-item-title-box relative">
						<div class="space-news-3-item-title relative">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
						</div>
						<div class="space-news-3-item-excerpt relative">
							<?php echo esc_html(wp_trim_words( get_the_excerpt(), 17, ' ...' )); ?>
						</div>
						<div class="space-news-3-item-meta relative">
							<div class="space-news-3-item-meta-left absolute">
								<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'spacethemes' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
							</div>
							<div class="space-news-3-item-meta-right text-right absolute">
								<span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
							</div>
						</div>
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
 
add_shortcode('mercury-posts-3', 'mercury_posts_shortcode_3');