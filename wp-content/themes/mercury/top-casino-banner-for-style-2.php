<?php
$casino_allowed_html = array(
    'a' => array(
        'href' => true,
        'title' => true,
        'target' => true,
        'rel' => true
    ),
    'img' => array(
        'src' => true,
        'alt' => true
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
$casino_terms_desc = wp_kses(get_post_meta(get_the_ID(), 'casino_terms_desc', true), $casino_allowed_html);
$casino_rating_trust = esc_html(get_post_meta(get_the_ID(), 'casino_rating_trust', true));
$casino_rating_games = esc_html(get_post_meta(get_the_ID(), 'casino_rating_games', true));
$casino_rating_bonus = esc_html(get_post_meta(get_the_ID(), 'casino_rating_bonus', true));
$casino_rating_customer = esc_html(get_post_meta(get_the_ID(), 'casino_rating_customer', true));

$casino_ratings = array(
    $casino_rating_trust,
    $casino_rating_games,
    $casino_rating_bonus,
    $casino_rating_customer
);

$overall_rating = esc_html(array_sum($casino_ratings) / count($casino_ratings));

$games = get_posts(
    array(
        'post_type'=>'game',
        'posts_per_page'=>-1,
        'meta_query' => array(
            array(
                'key' => 'parent_casino',
                'value' => $post->ID,
                'compare' => 'LIKE'
            )
        )
    )
);
$games_count = count($games);

$casino_button_title = esc_html( get_post_meta( get_the_ID(), 'casino_button_title', true ) );
$casino_button_notice = wp_kses( get_post_meta( get_the_ID(), 'casino_button_notice', true ), $casino_allowed_html );
$casino_permalink_button_title = esc_html( get_post_meta( get_the_ID(), 'casino_permalink_button_title', true ) );
$casino_external_link = esc_url( get_post_meta( get_the_ID(), 'casino_external_link', true ) );
$casino_overall_rating = esc_html( get_post_meta( get_the_ID(), 'casino_overall_rating', true ) );

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

?>
<div class="top-casion-banner-wrapper">
    <div class="tcb-top-row">
        <?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-135-135');
        if ($src) { ?>
            <img src="<?php echo esc_url($src[0]); ?>" alt="<?php the_title_attribute(); ?>">
        <?php } ?>
        <div class="space-block-title relative">
            <span><?php the_title(); ?></span>
        </div>
    </div>
    <div class="tcb-bottom-row-wrapper">
        <div class="tcb-bottom-row">
            <div class="tcb-rating">
                <div class="tcb-rating-wrapper tcb-bottom-item">
                    <div class="space-companies-sidebar-2-item-rating relative">
                        <?php if (function_exists('wp_star_rating')) {
                            wp_star_rating(array('rating' => $overall_rating, 'type' => 'rating'));
                        } ?>
                    </div>
                    <div class="tcb-rating-count"><?php echo str_replace(" rating", "", wp_star_rating(array('rating' => $overall_rating, 'type' => 'rating', 'echo' => false))); ?></div>
                </div>
            </div>
            <div class="tcb-bonus-wrapper tcb-bottom-item">
                <div class="space-casinos-3-archive-item-terms-ins box-100 text-center relative">
                    <img class="item-terms-bonus-img" src="<?= get_template_directory_uri() ?>/images/money.png" alt="">
                    <span class="bonus-short-desc-span">
                                            <?= wp_kses($casino_terms_desc, $casino_allowed_html) ?>
                                        </span>
                    <div class="item-terms-question-wrap">
                        <span class="bonus-question">Welcome Bonus</span>
                        <img class="item-terms-question-img"
                             src="<?= get_template_directory_uri() ?>/images/question_sign.png" alt="">
                    </div>
                </div>
            </div>
            <div class="space-casinos-3-archive-item-gameCount box-20 relative tcb-bottom-item">
                <div class="space-casinos-3-archive-item-rating-ins box-100 text-center relative">
                    <?php if ($games_count) { ?>
                        <div class="space-casinos-3-archive-item-games relative">
                            <?php if ($games_count) { ?>
                                <div class="space-casinos-3-archive-item-games relative">
                                    <img class="item-games-img" src="<?= get_template_directory_uri() ?>/images/game.png"
                                         alt="">
                                    <span class="bonus-short-desc-span"><?php echo esc_html($games_count); ?></span>
                                    <span class="bonus-question">Games</span>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="space-casinos-3-archive-item-button box-20 relative">
            <div class="space-casinos-3-archive-item-button-ins box-100 text-center relative">
                <?php if ($casino_external_link) { ?>

                    <!-- Button Start -->

                    <a href="<?php echo esc_url( $casino_external_link ); ?>" title="<?php echo esc_attr( $button_title ); ?>" class="space-style-2-button" rel="nofollow" target="_blank"><?php echo esc_html( $button_title ); ?></a>

                    <!-- Button End -->

                <?php } ?>

                <a class="item-button-readRewie-botton" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( $permalink_button_title ); ?>"><?php echo esc_html( $permalink_button_title ); ?></a>
            </div>
        </div>
    </div>
</div>
