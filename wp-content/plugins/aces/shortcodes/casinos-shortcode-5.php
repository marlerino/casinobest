<?php

function aces_casinos_shortcode_5($atts) {

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

	<div class="space-shortcode-wrap space-shortcode-5 relative">

		<?php if ( $title ) { ?>
		<div class="space-block-title relative">
			<span><?php echo esc_html($title); ?></span>
		</div>
		<?php } ?>

		<div class="space-casinos-4-archive-items box-100 relative">

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
				$casino_button_title = esc_html( get_post_meta( get_the_ID(), 'casino_button_title', true ) );
				$casino_button_notice = wp_kses( get_post_meta( get_the_ID(), 'casino_button_notice', true ), $casino_allowed_html );
				$casino_permalink_button_title = esc_html( get_post_meta( get_the_ID(), 'casino_permalink_button_title', true ) );
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

				if ($casino_button_title) {
					$button_title = $casino_button_title;
				} else {
					if ( get_option( 'casinos_play_now_title') ) {
						$button_title = esc_html( get_option( 'casinos_play_now_title') );
					} else {
						$button_title = esc_html__( 'Play Now', 'aces' );
					}
				}
				
				if ($casino_permalink_button_title) {
					$permalink_button_title = $casino_permalink_button_title;
				} else {
					if ( get_option( 'casinos_read_review_title') ) {
						$permalink_button_title = esc_html( get_option( 'casinos_read_review_title') );
					} else {
						$permalink_button_title = esc_html__( 'Read Review', 'aces' );
					}
				}

				$terms = get_the_terms( $post->ID, 'casino-category' );
			?>

					<div class="space-casinos-4-archive-item <?php if ($columns == 1) { ?>box-100<?php } else if ($columns == 2) { ?>box-50<?php } else if ($columns == 3) { ?>box-33<?php } else { ?>box-25<?php } ?> relative">
						<div class="space-casinos-4-archive-item-ins relative">
							<div class="space-casinos-4-archive-item-top box-100 relative">
								<div class="space-casinos-4-archive-item-logo relative">
									<?php $casino_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-50-50'); if ($casino_img) { ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url($casino_img[0]); ?>" alt="<?php the_title_attribute(); ?>"></a>
									<?php } ?>
								</div>
								<div class="space-casinos-4-archive-item-title relative">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									<?php if( function_exists('wp_star_rating') ){ wp_star_rating( array( 'rating'=>$casino_overall_rating, 'type'=>'rating' ) ); } ?>
								</div>
							</div>
							<?php if ($casino_short_desc) { ?>
							<div class="space-casinos-4-archive-item-desc box-100 relative">
								<?php echo wp_kses( $casino_short_desc, $casino_allowed_html ); ?>
							</div>
							<?php } ?>
							<div class="space-casinos-4-archive-item-buttons box-100 relative">
								<div class="space-casinos-4-archive-item-button-one box-50 relative">
									<div class="space-casinos-4-archive-item-button-one-ins text-center relative">
										<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( $permalink_button_title ); ?>"><?php echo esc_html( $permalink_button_title ); ?></a>
									</div>
								</div>
								<div class="space-casinos-4-archive-item-button-two box-50 relative">
									<div class="space-casinos-4-archive-item-button-two-ins text-center relative">
										<a href="<?php echo esc_url( $external_link_url ); ?>" title="<?php echo esc_attr( $button_title ); ?>" <?php if ($external_link) { ?>target="_blank" rel="nofollow"<?php } ?>><?php echo esc_html( $button_title ); ?></a>
									</div>
								</div>
							</div>

							<?php if ($casino_button_notice) { ?>

							<div class="space-casinos-archive-item-button-notice text-center box-100 relative">
								<?php echo wp_kses( $casino_button_notice, $casino_allowed_html ); ?>
							</div>

							<?php } ?>
								
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
 
add_shortcode('aces-casinos-5', 'aces_casinos_shortcode_5');