<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		$game_style = get_post_meta( get_the_ID(), 'game_style', true );

		if ($game_style == 2) {
			get_template_part( '/aces/single-game/style-1-without-sidebar' );
		} else if ($game_style == 3) {
			get_template_part( '/aces/single-game/style-2' );
		} else if ($game_style == 4) {
			get_template_part( '/aces/single-game/style-2-without-sidebar' );
		} else if ($game_style == 5) {
			get_template_part( '/aces/single-game/style-3' );
		} else if ($game_style == 6) {
			get_template_part( '/aces/single-game/style-3-without-sidebar' );
		} else {
			get_template_part( '/aces/single-game/style-1' );
		}
	?>

</div>

<?php get_footer(); ?>