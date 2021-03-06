<?php

function mercury_posts_shortcode_1($atts) {

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

	<div class="space-shortcode-wrap space-posts-shortcode-1 relative">

		<?php if ( $title ) { ?>
		<div class="space-block-title relative">
			<span><?php echo esc_html($title); ?></span>
		</div>
		<?php } ?>

		<div class="space-news-1-items box-100 relative">

			<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

			<div class="space-news-1-item <?php if ($columns == 1) { ?>box-100<?php } else if ($columns == 2) { ?>box-50<?php } else if ($columns == 3) { ?>box-33<?php } else { ?>box-25<?php } ?> left relative">
				<div class="space-news-1-item-ins relative">
					<div class="space-news-1-item-img left relative">
						<?php $widget_2_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-100-100'); if ($widget_2_img) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<img src="<?php echo esc_url($widget_2_img[0]); ?>" alt="<?php the_title_attribute(); ?>">
						</a>
						<?php } ?>
					</div>
					<div class="space-news-1-item-title-box left relative">
						<div class="space-news-1-item-title-box-ins relative">
							<div class="space-news-1-item-title relative">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
							</div>
							<div class="space-news-1-item-meta relative">
								<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'spacethemes' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
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
 
add_shortcode('mercury-posts-1', 'mercury_posts_shortcode_1');