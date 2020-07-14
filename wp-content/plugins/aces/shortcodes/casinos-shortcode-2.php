<?php

function aces_casinos_shortcode_2($atts) {

	ob_start();

	// Define attributes and their defaults

	extract( shortcode_atts( array (
	    'items_number' => 4,
	    'external_link' => '',
	    'category' => '',
	    'items_id' => '',
	    'game_id' => '',
	    'columns' => 4,
	    'order' => '',
	    'orderby' => '',
	    'title' => ''
	), $atts ) );

	if ( $orderby == 'rating') {
		$orderby = 'meta_value_num';
	}

	if ($game_id) {
		
		$casino_ids = get_post_meta( $game_id, 'parent_casino', true );
		
		$args = array(
			'posts_per_page' => $items_number,
			'post_type'      => 'casino',
			'post__in'       => $casino_ids,
			'no_found_rows'  => true,
			'post_status'    => 'publish',
			'meta_key'       => 'casino_overall_rating',
			'orderby'        => 'meta_value_num',
			'order'          => $order
		);

	} else {

		if ( !empty( $category ) ) {

			$categories_id_array = explode( ',', $category );

			$args = array(
				'posts_per_page' => $items_number,
				'post_type'      => 'casino',
				'no_found_rows'  => true,
				'post_status'    => 'publish',
				'tax_query' => array(
					array(
						'taxonomy' => 'casino-category',
						'field'    => 'id',
						'terms'    => $categories_id_array
					)
				),
				'meta_key' => 'casino_overall_rating',
				'orderby'  => $orderby,
				'order'    => $order
			);

		} else if ( !empty( $items_id ) ) {

			$items_id_array = explode( ',', $items_id );

			$args = array(
				'posts_per_page' => $items_number,
				'post_type'      => 'casino',
				'post__in'       => $items_id_array,
				'orderby'        => 'post__in',
				'no_found_rows'  => true,
				'post_status'    => 'publish'
			);

		} else {

			$args = array(
				'posts_per_page' => $items_number,
				'post_type'      => 'casino',
				'no_found_rows'  => true,
				'post_status'    => 'publish',
				'meta_key' => 'casino_overall_rating',
				'orderby'  => $orderby,
				'order'    => $order
			);

		}

	}

	$casino_query = new WP_Query( $args );

	if ( $casino_query->have_posts() ) {
	?>

	<div class="space-shortcode-wrap space-shortcode-2 relative">

		<?php if ( $title ) { ?>
		<div class="space-block-title relative">
			<span><?php echo esc_html($title); ?></span>
		</div>
		<?php } ?>

		<div class="space-companies-2-archive-items box-100 relative">

			<?php while ( $casino_query->have_posts() ) : $casino_query->the_post();
				global $post;
				$casino_allowed_html = array(
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
					'p' => array()
				);

				$casino_short_desc = wp_kses( get_post_meta( get_the_ID(), 'casino_short_desc', true ), $casino_allowed_html );
				$casino_external_link = esc_url( get_post_meta( get_the_ID(), 'casino_external_link', true ) );
				$casino_overall_rating = esc_html( get_post_meta( get_the_ID(), 'casino_overall_rating', true ) );

				if ($external_link) {
					if ($casino_external_link) {
						$external_link_url = $casino_external_link;
					} else {
						$external_link_url = get_the_permalink();
					}
				} else {
					$external_link_url = get_the_permalink();
				}

				$terms = get_the_terms( $post->ID, 'casino-category' );
			?>

			<div class="space-companies-2-archive-item <?php if ($columns == 1) { ?>box-100<?php } else if ($columns == 2) { ?>box-50<?php } else if ($columns == 3) { ?>box-33<?php } else { ?>box-25<?php } ?> relative">
				<div class="space-companies-2-archive-item-ins relative">
					<div class="space-companies-2-archive-item-img left relative">
						<?php $widget_2_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-100-100'); if ($widget_2_img) { ?>
						<a href="<?php echo esc_url( $external_link_url ); ?>" title="<?php the_title_attribute(); ?>"<?php if ($external_link) { ?> target="_blank" rel="nofollow"<?php } ?>>
							<img src="<?php echo esc_url($widget_2_img[0]); ?>" alt="<?php the_title_attribute(); ?>">
						</a>
						<?php } ?>
					</div>
					<div class="space-companies-2-archive-item-title-box left relative">
						<div class="space-companies-2-archive-item-title-box-ins relative">
							<div class="space-companies-2-archive-item-title relative">
								<a href="<?php echo esc_url( $external_link_url ); ?>" title="<?php the_title_attribute(); ?>"<?php if ($external_link) { ?> target="_blank" rel="nofollow"<?php } ?>><?php get_the_title() ? the_title() : the_ID(); ?></a>
							</div>

							<div class="space-companies-2-archive-item-rating relative">
								<?php if( function_exists('wp_star_rating') ){ wp_star_rating( array( 'rating'=>$casino_overall_rating, 'type'=>'rating' ) ); } ?>
							</div>

							<?php if ($casino_short_desc) { ?>
							<div class="space-companies-2-archive-item-desc relative">
								<?php echo wp_kses( $casino_short_desc, $casino_allowed_html ); ?>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<?php endwhile; ?>

		</div>
	</div>

<?php
wp_reset_postdata();
$casino_items = ob_get_clean();
return $casino_items;
}

}
 
add_shortcode('aces-casinos-2', 'aces_casinos_shortcode_2');