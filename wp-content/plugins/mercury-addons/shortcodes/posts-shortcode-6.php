<?php

function mercury_posts_shortcode_6($atts) {

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
		'posts_per_page'      => 5,
		'offset'	          => 1,
		'cat'                 => $category,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true
	);

	$third_args = array(
		'posts_per_page'      => 1,
		'offset'	          => 6,
		'cat'                 => $category,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true
	);

	$post_query_first = new WP_Query( $first_args );

	if ( $post_query_first->have_posts() ) {
	?>

	<div class="space-shortcode-wrap space-posts-shortcode-6 relative">

		<?php if ( $title ) { ?>
		<div class="space-block-title relative">
			<span><?php echo esc_html($title); ?></span>
		</div>
		<?php } ?>

		<div class="space-news-6-items-ins-wrap box-100 relative">
			<?php
				while ( $post_query_first->have_posts() ) : $post_query_first->the_post();
				$post_id = get_the_ID();
				$terms = get_the_terms( $post_id, 'category' );
			?>
			<?php
				$widget_1_big = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-570-430');
				$widget_1_big_mobile = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-737-556');
				if ($widget_1_big) {
			?>
			<div class="space-news-6-item first-news box-50 relative">
				<div class="space-news-6-item-ins case-15 relative">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<div class="space-news-6-item-link-wrap relative">
							<img src="<?php echo esc_url($widget_1_big[0]); ?>" alt="<?php the_title_attribute(); ?>" class="space-desktop-view-1">
							<img src="<?php echo esc_url($widget_1_big_mobile[0]); ?>" alt="<?php the_title_attribute(); ?>" class="space-mobile-view-1">
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
							<div class="space-news-6-item-top absolute">
								<div class="space-news-6-item-top-category relative"><?php foreach( $terms as $term ){ ?><span><?php echo esc_html($term->name); ?></span> <?php } ?></div>
								<div class="space-news-6-item-top-title relative"><?php get_the_title() ? the_title() : the_ID(); ?></div>
								<div class="space-news-6-item-top-excerpt relative">
									<?php echo esc_html(wp_trim_words( get_the_excerpt(), 25, ' ...' )); ?>
								</div>
							</div>
							<div class="space-news-6-item-bottom absolute">
								<div class="space-news-6-item-bottom-ins box-100 relative">
									<div class="space-news-6-item-bottom-left absolute">
										<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'spacethemes' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
									</div>
									<div class="space-news-6-item-bottom-right text-right absolute">
										<span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php
				endwhile;
				wp_reset_postdata();
			?>
			<div class="space-news-6-item second-news box-25 relative">
				<div class="space-news-6-item-ins case-15 relative">
					<ul>
						<?php 
							$post_query_second = new WP_Query( $second_args );
							while ( $post_query_second->have_posts() ) : $post_query_second->the_post();
						?>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
							<div>
								<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'spacethemes' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span><span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
							</div>
						</li>
						<?php endwhile;
							wp_reset_postdata();
						?>
					</ul>
				</div>
			</div>

			<?php
				$post_query_third = new WP_Query( $third_args );
				while ( $post_query_third->have_posts() ) : $post_query_third->the_post();
				$post_id = get_the_ID();
				$terms = get_the_terms( $post_id, 'category' );
			?>
			<?php
				$widget_2_big = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-270-430');
				$widget_2_big_mobile = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-737-556');
				if ($widget_2_big) {
			?>
			<div class="space-news-6-item third-news box-25 relative">
				<div class="space-news-6-item-ins case-15 relative">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<div class="space-news-6-item-link-wrap relative">
							<img src="<?php echo esc_url($widget_2_big[0]); ?>" alt="<?php the_title_attribute(); ?>" class="space-desktop-view-2">
							<img src="<?php echo esc_url($widget_2_big_mobile[0]); ?>" alt="<?php the_title_attribute(); ?>" class="space-mobile-view-2">
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
							<div class="space-news-6-item-top absolute">
								<div class="space-news-6-item-top-category relative"><?php foreach( $terms as $term ){ ?><span><?php echo esc_html($term->name); ?></span> <?php } ?></div>
								<div class="space-news-6-item-top-title relative"><?php get_the_title() ? the_title() : the_ID(); ?></div>
							</div>
							<div class="space-news-6-item-bottom absolute">
								<div class="space-news-6-item-bottom-ins box-100 relative">
									<div class="space-news-6-item-bottom-left absolute">
										<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'spacethemes' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
									</div>
									<div class="space-news-6-item-bottom-right text-right absolute">
										<span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
									</div>
								</div>
							</div>
						</div>
					</a>
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
 
add_shortcode('mercury-posts-6', 'mercury_posts_shortcode_6');