<?php

add_theme_support('title-tag');
add_theme_support('automatic-feed-links');
add_theme_support('post-formats',
    array(
        'image',
        'video',
        'gallery',
    )
);

function mercury_comments_reply()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('comment_form_before', 'mercury_comments_reply');

function mercury_remove_caption_extra_width($width)
{
    return $width - 10;
}

add_filter('img_caption_shortcode_width', 'mercury_remove_caption_extra_width');

/*  Content Width Start  */

function mercury_content_width()
{

    $content_width = 994;
    $GLOBALS['content_width'] = apply_filters('mercury_content_width', $content_width);
}

add_action('after_setup_theme', 'mercury_content_width', 0);

/*  Content Width End  */

/*  Pingback Start  */

function mercury_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
    }
}

add_action('wp_head', 'mercury_pingback_header');

/*  Pingback End  */

/*  Navigation Markup Template Start  */

add_filter('navigation_markup_template', 'mercury_navigation_template', 10, 2);
function mercury_navigation_template($template, $class)
{
    return '
			<div class="space-archive-navigation box-100 relative">
				<nav class="navigation %1$s">
					<div class="nav-links">%3$s</div>
				</nav>
			</div>
			';
}

/*  Navigation Markup Template End  */

/*  Menus, Languages and Thumbnails Start  */

function mercury_setup()
{

    load_theme_textdomain('mercury', get_template_directory() . '/languages');

    add_theme_support('post-thumbnails');
    add_image_size('mercury-custom-logo', 9999, 40);
    add_image_size('mercury-50-50', 50, 50, true);
    add_image_size('mercury-100-100', 100, 100, true);
    add_image_size('mercury-120-120', 120, 120, true);
    add_image_size('mercury-135-135', 135, 135, true);
    add_image_size('mercury-270-270', 270, 270, true);
    add_image_size('mercury-270-430', 270, 430, true);
    add_image_size('mercury-340-447', 340, 447, true);
    add_image_size('mercury-450-254', 450, 254, true);
    add_image_size('mercury-450-317', 450, 317, true);
    add_image_size('mercury-450-338', 450, 338, true);
    add_image_size('mercury-450-450', 450, 450, true);
    add_image_size('mercury-450-600', 450, 600, true);
    add_image_size('mercury-450-717', 450, 717, true);
    add_image_size('mercury-479-479', 479, 479, true);
    add_image_size('mercury-570-270', 570, 270, true);
    add_image_size('mercury-570-430', 570, 430, true);
    add_image_size('mercury-570-570', 570, 570, true);
    add_image_size('mercury-585-505', 585, 505, true);
    add_image_size('mercury-737-556', 737, 556, true);
    add_image_size('mercury-737-983', 737, 983, true);
    add_image_size('mercury-767-767', 767, 767, true);
    add_image_size('mercury-768-576', 768, 576, true);
    add_image_size('mercury-900-675', 900, 675, true);
    add_image_size('mercury-994-559', 994, 559, true);
    add_image_size('mercury-1170-505', 1170, 505, true);
    add_image_size('mercury-2000-400', 2000, 400, true);
    add_image_size('mercury-9999-32', 9999, 32);
    add_image_size('mercury-9999-80', 9999, 80);
    add_image_size('mercury-9999-135', 9999, 135);

    add_theme_support('gutenberg', array('wide-images' => true));

    register_nav_menus(array(
        'main-menu' => esc_html__('Main Menu', 'mercury'),
        'footer-menu' => esc_html__('Footer Menu', 'mercury'),
        'top-menu' => esc_html__('Top Bar Menu', 'mercury'),
    ));

}

add_action('after_setup_theme', 'mercury_setup');

/*  Menus, Languages and Thumbnails End  */

/*  Widgets Setup Start  */

function mercury_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'mercury'),
        'id' => 'right-sidebar',
        'description' => esc_html__('Add widgets here so that it appears on the sidebar.', 'mercury'),
        'before_widget' => '<div id="%1$s" class="space-widget space-default-widget relative %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="space-widget-title relative"><span>',
        'after_title' => '</span></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Homepage Central Block', 'mercury'),
        'id' => 'homepage-central-block',
        'description' => esc_html__('For widgets in the homepage central block.', 'mercury'),
        'before_widget' => '<div id="%1$s" class="space-widget relative %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="space-widget-title relative"><span>',
        'after_title' => '</span></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Homepage Right Sidebar', 'mercury'),
        'id' => 'homepage-right-sidebar',
        'description' => esc_html__('Add widgets here so that it appears on the homepage right sidebar.', 'mercury'),
        'before_widget' => '<div id="%1$s" class="space-widget relative %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="space-widget-title relative"><span>',
        'after_title' => '</span></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Center', 'mercury'),
        'id' => 'footer-center-sidebar',
        'description' => esc_html__('For text and images only.', 'mercury'),
        'before_widget' => '<div id="%1$s" class="space-widget space-footer-area relative %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="space-widget-title relative"><span>',
        'after_title' => '</span></div>',
    ));

}

add_action('widgets_init', 'mercury_widgets_init');

/*  Widgets Setup End  */

/*  Mobile Browser Bar Color Start  */

function mercury_header_bar_color()
{

    if (!$mobile_header_background_color = get_theme_mod('topbar_background_color')) {
        $mobile_header_background_color = '#f5f6fa';
    } else {
        $mobile_header_background_color = get_theme_mod('topbar_background_color');
    }
    ?>
    <meta name="theme-color" content="<?php echo esc_attr($mobile_header_background_color); ?>"/>
    <meta name="msapplication-navbutton-color" content="<?php echo esc_attr($mobile_header_background_color); ?>"/>
    <meta name="apple-mobile-web-app-status-bar-style"
          content="<?php echo esc_attr($mobile_header_background_color); ?>"/>
<?php }

add_action('wp_head', 'mercury_header_bar_color');

/*  Mobile Browser Bar Color End  */

/*  Register Fonts Start  */

function mercury_google_fonts()
{
    $font_url = '';

    if ('off' !== _x('on', 'Google font: on or off', 'mercury')) {
        $font_url = add_query_arg('family', urlencode('Roboto:300,400,700,900'), "//fonts.googleapis.com/css");
    }

    return $font_url;
}

function mercury_fonts()
{
    wp_enqueue_style('mercury-fonts', mercury_google_fonts(), array(), '3.4.1');
}

add_action('wp_enqueue_scripts', 'mercury_fonts');

/*  Register Fonts End  */

/*  Register Scripts & Colors Start  */

function mercury_scripts()
{

    if (get_theme_mod('mercury_sticky_sidebar')) {
        wp_enqueue_script('theia-sticky-sidebar', get_theme_file_uri('/js/theia-sticky-sidebar.min.js'), array('jquery'), '1.7.0', true);
        wp_enqueue_script('mercury-enable-sticky-sidebar-js', get_theme_file_uri('/js/enable-sticky-sidebar.js'), array('jquery'), '3.4.1', true);
    }

    if (!get_theme_mod('mercury_disable_floating_header')) {
        wp_enqueue_script('mercury-floating-header', get_theme_file_uri('/js/floating-header.js'), array('jquery'), '3.4.1', true);
    }

    wp_enqueue_script('owl-carousel', get_theme_file_uri('/js/owl.carousel.min.js'), array('jquery'), '2.3.4', true);
    wp_enqueue_script('mercury-global-js', get_theme_file_uri('/js/scripts.js'), array('jquery'), '3.4.1', true);

    wp_enqueue_style('font-awesome-free', '//use.fontawesome.com/releases/v5.12.0/css/all.css', array(), '5.12.0');
    wp_enqueue_style('owl-carousel', get_theme_file_uri('/css/owl.carousel.min.css'), array(), '2.3.4');
    wp_enqueue_style('owl-carousel-animate', get_theme_file_uri('/css/animate.css'), array(), '2.3.4');
    wp_enqueue_style('mercury-style', get_stylesheet_uri(), array(), '3.4.1');
    wp_enqueue_style('mercury-media', get_theme_file_uri('/css/media.css'), array(), '3.4.1');

    global $mercury_data;

    // Custom Colors

    if (!$main_custom_color = get_theme_mod('main_color')) {
        $main_custom_color = '#be2edd';
    } else {
        $main_custom_color = get_theme_mod('main_color');
    }

    if (!$second_custom_color = get_theme_mod('second_color')) {
        $second_custom_color = '#ff2453';
    } else {
        $second_custom_color = get_theme_mod('second_color');
    }

    if (!$stars_custom_color = get_theme_mod('stars_color')) {
        $stars_custom_color = '#ffd32a';
    } else {
        $stars_custom_color = get_theme_mod('stars_color');
    }

    // Header layout colors

    if (!$header_background_color = get_theme_mod('header_background_color')) {
        $header_background_color = '#ffffff';
    } else {
        $header_background_color = get_theme_mod('header_background_color');
    }

    if (!$topbar_background_color = get_theme_mod('topbar_background_color')) {
        $topbar_background_color = '#f5f6fa';
    } else {
        $topbar_background_color = get_theme_mod('topbar_background_color');
    }

    if (!$topbar_link_color = get_theme_mod('topbar_link_color')) {
        $topbar_link_color = '#7f8c8d';
    } else {
        $topbar_link_color = get_theme_mod('topbar_link_color');
    }

    if (!$topbar_hover_color = get_theme_mod('topbar_hover_color')) {
        $topbar_hover_color = '#151515';
    } else {
        $topbar_hover_color = get_theme_mod('topbar_hover_color');
    }

    if (!$header_logo_color = get_theme_mod('header_logo_color')) {
        $header_logo_color = '#2d3436';
    } else {
        $header_logo_color = get_theme_mod('header_logo_color');
    }

    if (!$header_slogan_color = get_theme_mod('header_slogan_color')) {
        $header_slogan_color = '#7f8c8d';
    } else {
        $header_slogan_color = get_theme_mod('header_slogan_color');
    }

    if (!$header_menu_color = get_theme_mod('header_menu_color')) {
        $header_menu_color = '#151515';
    } else {
        $header_menu_color = get_theme_mod('header_menu_color');
    }

    if (!$header_hover_menu_color = get_theme_mod('header_hover_menu_color')) {
        $header_hover_menu_color = '#be2edd';
    } else {
        $header_hover_menu_color = get_theme_mod('header_hover_menu_color');
    }

    if (!$header_sub_menu_background_color = get_theme_mod('header_sub_menu_background_color')) {
        $header_sub_menu_background_color = '#ffffff';
    } else {
        $header_sub_menu_background_color = get_theme_mod('header_sub_menu_background_color');
    }

    if (!$header_sub_menu_color = get_theme_mod('header_sub_menu_color')) {
        $header_sub_menu_color = '#34495e';
    } else {
        $header_sub_menu_color = get_theme_mod('header_sub_menu_color');
    }

    if (!$header_hover_sub_menu_color = get_theme_mod('header_hover_sub_menu_color')) {
        $header_hover_sub_menu_color = '#b2bec3';
    } else {
        $header_hover_sub_menu_color = get_theme_mod('header_hover_sub_menu_color');
    }

    // Labels for the main menu items

    // --- "New" ---

    if (!$label_title_new = get_theme_mod('label_title_new')) {
        $label_title_new = 'New';
    } else {
        $label_title_new = get_theme_mod('label_title_new');
    }

    if (!$label_text_color_new = get_theme_mod('label_text_color_new')) {
        $label_text_color_new = '#ffffff';
    } else {
        $label_text_color_new = get_theme_mod('label_text_color_new');
    }

    if (!$label_background_color_new = get_theme_mod('label_background_color_new')) {
        $label_background_color_new = '#4cd137';
    } else {
        $label_background_color_new = get_theme_mod('label_background_color_new');
    }

    // --- "Best" ---

    if (!$label_title_best = get_theme_mod('label_title_best')) {
        $label_title_best = 'Best';
    } else {
        $label_title_best = get_theme_mod('label_title_best');
    }

    if (!$label_text_color_best = get_theme_mod('label_text_color_best')) {
        $label_text_color_best = '#151515';
    } else {
        $label_text_color_best = get_theme_mod('label_text_color_best');
    }

    if (!$label_background_color_best = get_theme_mod('label_background_color_best')) {
        $label_background_color_best = '#f0ff00';
    } else {
        $label_background_color_best = get_theme_mod('label_background_color_best');
    }

    // --- "Top" ---

    if (!$label_title_top = get_theme_mod('label_title_top')) {
        $label_title_top = 'Top';
    } else {
        $label_title_top = get_theme_mod('label_title_top');
    }

    if (!$label_text_color_top = get_theme_mod('label_text_color_top')) {
        $label_text_color_top = '#ffffff';
    } else {
        $label_text_color_top = get_theme_mod('label_text_color_top');
    }

    if (!$label_background_color_top = get_theme_mod('label_background_color_top')) {
        $label_background_color_top = '#f22613';
    } else {
        $label_background_color_top = get_theme_mod('label_background_color_top');
    }

    // --- "Fair" ---

    if (!$label_title_fair = get_theme_mod('label_title_fair')) {
        $label_title_fair = 'Fair';
    } else {
        $label_title_fair = get_theme_mod('label_title_fair');
    }

    if (!$label_text_color_fair = get_theme_mod('label_text_color_fair')) {
        $label_text_color_fair = '#ffffff';
    } else {
        $label_text_color_fair = get_theme_mod('label_text_color_fair');
    }

    if (!$label_background_color_fair = get_theme_mod('label_background_color_fair')) {
        $label_background_color_fair = '#8c14fc';
    } else {
        $label_background_color_fair = get_theme_mod('label_background_color_fair');
    }

    $custom_css = '

/* Main Color */

.has-mercury-main-color,
.home-page .textwidget a:hover,
.space-header-2-top-soc a:hover,
.space-header-menu ul.main-menu li a:hover,
.space-header-menu ul.main-menu li:hover a,
.space-header-2-nav ul.main-menu li a:hover,
.space-header-2-nav ul.main-menu li:hover a,
.space-page-content a:hover,
.space-pros-cons ul li a:hover,
.space-pros-cons ol li a:hover,
.space-comments-form-box p.comment-notes span.required,
form.comment-form p.comment-notes span.required {
	color: ' . esc_attr($main_custom_color) . ';
}

input[type="submit"],
.has-mercury-main-background-color,
.space-block-title span:after,
.space-widget-title span:after,
.space-companies-archive-item-button a,
.space-companies-sidebar-item-button a,
.space-casinos-3-archive-item-count,
.space-games-archive-item-button a,
.space-games-sidebar-item-button a,
.space-aces-single-bonus-info-button-ins a,
.space-bonuses-archive-item-button a,
.home-page .widget_mc4wp_form_widget .space-widget-title::after,
.space-content-section .widget_mc4wp_form_widget .space-widget-title::after {
	background-color: ' . esc_attr($main_custom_color) . ';
}

.space-header-menu ul.main-menu li a:hover,
.space-header-menu ul.main-menu li:hover a,
.space-header-2-nav ul.main-menu li a:hover,
.space-header-2-nav ul.main-menu li:hover a {
	border-bottom: 2px solid ' . esc_attr($main_custom_color) . ';
}
.space-header-2-top-soc a:hover {
	border: 1px solid ' . esc_attr($main_custom_color) . ';
}

/* Second Color */

.has-mercury-second-color,
.space-page-content a,
.space-pros-cons ul li a,
.space-pros-cons ol li a,
.space-page-content ul li:before,
.home-page .textwidget ul li:before,
.space-widget ul li a:hover,
.home-page .textwidget a,
#recentcomments li a:hover,
#recentcomments li span.comment-author-link a:hover,
h3.comment-reply-title small a,
.space-companies-sidebar-2-item-desc a,
.space-companies-sidebar-item-title p a,
.space-companies-archive-item-short-desc a,
.space-companies-2-archive-item-desc a,
.space-casinos-3-archive-item-terms-ins a,
.space-casinos-7-archive-item-terms a,
.space-casino-content-info a,
.space-casino-style-2-calltoaction-text-ins a,
.space-casino-details-item-title span,
.space-casino-style-2-ratings-all-item-value i,
.space-casino-style-2-calltoaction-text-ins a,
.space-casino-content-short-desc a,
.space-casino-header-short-desc a,
.space-casino-content-rating-stars i,
.space-casino-content-rating-overall .star-rating .star,
.space-companies-archive-item-rating .star-rating .star,
.space-casino-content-logo-stars i,
.space-casino-content-logo-stars .star-rating .star,
.space-companies-2-archive-item-rating .star-rating .star,
.space-casinos-3-archive-item-rating-box .star-rating .star,
.space-casinos-4-archive-item-title .star-rating .star,
.space-companies-sidebar-2-item-rating .star-rating .star,
.space-comments-list-item-date a.comment-reply-link,
.space-categories-list-box ul li a,
.space-news-10-item-category a,
.small .space-news-11-item-category a,
#scrolltop,
.widget_mc4wp_form_widget .mc4wp-response a,
.space-header-height.dark .space-header-menu ul.main-menu li a:hover,
.space-header-height.dark .space-header-menu ul.main-menu li:hover a,
.space-header-2-height.dark .space-header-2-nav ul.main-menu li a:hover,
.space-header-2-height.dark .space-header-2-nav ul.main-menu li:hover a,
.space-header-2-height.dark .space-header-2-top-soc a:hover,
.space-casino-header-logo-rating i {
	color: ' . esc_attr($second_custom_color) . ';
}

.space-title-box-category a,
.has-mercury-second-background-color,
.space-casino-details-item-links a:hover,
.space-news-2-small-item-img-category a,
.space-news-2-item-big-box-category span,
.space-block-title span:before,
.space-widget-title span:before,
.space-news-4-item.small-news-block .space-news-4-item-img-category a,
.space-news-4-item.big-news-block .space-news-4-item-top-category span,
.space-news-6-item-top-category span,
.space-news-7-item-category span,
.space-news-3-item-img-category a,
.space-news-8-item-title-category span,
.space-news-9-item-info-category span,
.space-archive-loop-item-img-category a,
.space-casinos-3-archive-item:first-child .space-casinos-3-archive-item-count,
.space-single-bonus.space-dark-style .space-aces-single-bonus-info-button-ins a,
.space-bonuses-archive-item.space-dark-style .space-bonuses-archive-item-button a,
nav.pagination a,
nav.comments-pagination a,
nav.pagination-post a span.page-number,
.widget_tag_cloud a,
.space-footer-top-age span.age-limit,
.space-footer-top-soc a:hover,
.home-page .widget_mc4wp_form_widget .mc4wp-form-fields .space-subscribe-filds button,
.space-content-section .widget_mc4wp_form_widget .mc4wp-form-fields .space-subscribe-filds button {
	background-color: ' . esc_attr($second_custom_color) . ';
}

.space-footer-top-soc a:hover,
.space-header-2-height.dark .space-header-2-top-soc a:hover,
.space-categories-list-box ul li a {
	border: 1px solid ' . esc_attr($second_custom_color) . ';
}

.space-header-height.dark .space-header-menu ul.main-menu li a:hover,
.space-header-height.dark .space-header-menu ul.main-menu li:hover a,
.space-header-2-height.dark .space-header-2-nav ul.main-menu li a:hover,
.space-header-2-height.dark .space-header-2-nav ul.main-menu li:hover a {
	border-bottom: 2px solid ' . esc_attr($second_custom_color) . ';
}

/* Stars Color */

.star,
.fa-star {
	color: ' . esc_attr($stars_custom_color) . '!important;
}

.space-rating-star-background {
	background-color: ' . esc_attr($stars_custom_color) . ';
}

/* Custom header layout colors */

/* --- Header #1 Style --- */

.space-header-height .space-header-wrap {
	background-color: ' . esc_attr($header_background_color) . ';
}
.space-header-height .space-header-top,
.space-header-height .space-header-logo-ins:after {
	background-color: ' . esc_attr($topbar_background_color) . ';
}
.space-header-height .space-header-top-soc a,
.space-header-height .space-header-top-menu ul li a {
	color: ' . esc_attr($topbar_link_color) . ';
}
.space-header-height .space-header-top-soc a:hover ,
.space-header-height .space-header-top-menu ul li a:hover {
	color: ' . esc_attr($topbar_hover_color) . ';
}
.space-header-height .space-header-logo a {
	color: ' . esc_attr($header_logo_color) . ';
}
.space-header-height .space-header-logo span {
	color: ' . esc_attr($header_slogan_color) . ';
}
.space-header-height .space-header-menu ul.main-menu li,
.space-header-height .space-header-menu ul.main-menu li a,
.space-header-height .space-header-search {
	color: ' . esc_attr($header_menu_color) . ';
}
.space-header-height .space-mobile-menu-icon div {
	background-color: ' . esc_attr($header_menu_color) . ';
}
.space-header-height .space-header-menu ul.main-menu li a:hover,
.space-header-height .space-header-menu ul.main-menu li:hover a {
	color: ' . esc_attr($header_hover_menu_color) . ';
	border-bottom: 2px solid ' . esc_attr($header_hover_menu_color) . ';
}

.space-header-height .space-header-menu ul.main-menu li ul.sub-menu {
	background-color: ' . esc_attr($header_sub_menu_background_color) . ';
}

.space-header-height .space-header-menu ul.main-menu li ul.sub-menu li.menu-item-has-children:after,
.space-header-height .space-header-menu ul.main-menu li ul.sub-menu li a {
	color: ' . esc_attr($header_sub_menu_color) . ';
	border-bottom: 1px solid transparent;
}
.space-header-height .space-header-menu ul.main-menu li ul.sub-menu li a:hover {
	border-bottom: 1px solid transparent;
	color: ' . esc_attr($header_hover_sub_menu_color) . ';
	text-decoration: none;
}

/* --- Header #2 Style --- */

.space-header-2-height .space-header-2-wrap,
.space-header-2-height .space-header-2-wrap.fixed .space-header-2-nav {
	background-color: ' . esc_attr($header_background_color) . ';
}
.space-header-2-height .space-header-2-top-ins {
	border-bottom: 1px solid ' . esc_attr($topbar_background_color) . ';
}
.space-header-2-height .space-header-2-top-soc a,
.space-header-2-height .space-header-search {
	color: ' . esc_attr($topbar_link_color) . ';
}
.space-header-2-height .space-header-2-top-soc a {
	border: 1px solid ' . esc_attr($topbar_link_color) . ';
}
.space-header-2-height .space-mobile-menu-icon div {
	background-color: ' . esc_attr($topbar_link_color) . ';
}
.space-header-2-height .space-header-2-top-soc a:hover {
	color: ' . esc_attr($topbar_hover_color) . ';
	border: 1px solid ' . esc_attr($topbar_hover_color) . ';
}
.space-header-2-height .space-header-2-top-logo a {
	color: ' . esc_attr($header_logo_color) . ';
}
.space-header-2-height .space-header-2-top-logo span {
	color: ' . esc_attr($header_slogan_color) . ';
}
.space-header-2-height .space-header-2-nav ul.main-menu li,
.space-header-2-height .space-header-2-nav ul.main-menu li a {
	color: ' . esc_attr($header_menu_color) . ';
}
.space-header-2-height .space-header-2-nav ul.main-menu li a:hover,
.space-header-2-height .space-header-2-nav ul.main-menu li:hover a {
	color: ' . esc_attr($header_hover_menu_color) . ';
	border-bottom: 2px solid ' . esc_attr($header_hover_menu_color) . ';
}
.space-header-2-height .space-header-2-nav ul.main-menu li ul.sub-menu {
	background-color: ' . esc_attr($header_sub_menu_background_color) . ';
}
.space-header-2-height .space-header-2-nav ul.main-menu li ul.sub-menu li a,
.space-header-2-height .space-header-2-nav ul.main-menu li ul.sub-menu li.menu-item-has-children:after {
	color: ' . esc_attr($header_sub_menu_color) . ';
	border-bottom: 1px solid transparent;
}
.space-header-2-height .space-header-2-nav ul.main-menu li ul.sub-menu li a:hover {
	border-bottom: 1px solid transparent;
	color: ' . esc_attr($header_hover_sub_menu_color) . ';
	text-decoration: none;
}

/* --- Mobile Menu Style --- */

.space-mobile-menu .space-mobile-menu-block {
	background-color: ' . esc_attr($header_background_color) . ';
}
.space-mobile-menu .space-mobile-menu-copy {
	border-top: 1px solid ' . esc_attr($topbar_background_color) . ';
}
.space-mobile-menu .space-mobile-menu-copy {
	color: ' . esc_attr($topbar_link_color) . ';
}
.space-mobile-menu .space-mobile-menu-copy a {
	color: ' . esc_attr($topbar_link_color) . ';
}
.space-mobile-menu .space-mobile-menu-copy a:hover {
	color: ' . esc_attr($topbar_hover_color) . ';
}
.space-mobile-menu .space-mobile-menu-header a {
	color: ' . esc_attr($header_logo_color) . ';
}
.space-mobile-menu .space-mobile-menu-header span {
	color: ' . esc_attr($header_slogan_color) . ';
}
.space-mobile-menu .space-mobile-menu-list ul li {
	color: ' . esc_attr($header_menu_color) . ';
}
.space-mobile-menu .space-mobile-menu-list ul li a {
	color: ' . esc_attr($header_menu_color) . ';
}
.space-mobile-menu .space-close-icon .to-right,
.space-mobile-menu .space-close-icon .to-left {
	background-color: ' . esc_attr($header_menu_color) . ';
}

/* --- New - Label for the main menu items --- */

ul.main-menu > li.new > a:before,
.space-mobile-menu-list > ul > li.new:before {
	content: "' . esc_attr($label_title_new) . '";
    color: ' . esc_attr($label_text_color_new) . ';
    background-color: ' . esc_attr($label_background_color_new) . ';
}

/* --- Best - Label for the main menu items --- */

ul.main-menu > li.best > a:before,
.space-mobile-menu-list > ul > li.best:before {
	content: "' . esc_attr($label_title_best) . '";
    color: ' . esc_attr($label_text_color_best) . ';
    background-color: ' . esc_attr($label_background_color_best) . ';
}

/* --- Top - Label for the main menu items --- */

ul.main-menu > li.top > a:before,
.space-mobile-menu-list > ul > li.top:before {
	content: "' . esc_attr($label_title_top) . '";
    color: ' . esc_attr($label_text_color_top) . ';
    background-color: ' . esc_attr($label_background_color_top) . ';
}

/* --- Fair - Label for the main menu items --- */

ul.main-menu > li.fair > a:before,
.space-mobile-menu-list > ul > li.fair:before {
	content: "' . esc_attr($label_title_fair) . '";
    color: ' . esc_attr($label_text_color_fair) . ';
    background-color: ' . esc_attr($label_background_color_fair) . ';
}';

    $custom_css .= esc_attr($mercury_data['custom_css']);
    wp_add_inline_style('mercury-style', $custom_css);

}

add_action('wp_enqueue_scripts', 'mercury_scripts');

/*  Register Scripts & Colors End  */

/*  Space-Themes Functions Start  */

require_once(get_template_directory() . '/space-themes/custom-comments.php');
require_once(get_template_directory() . '/space-themes/customize.php');
require_once(get_template_directory() . '/space-themes/gutenberg.php');
require_once(get_template_directory() . '/space-themes/importer.php');
require_once(get_template_directory() . '/space-themes/class-tgm-plugin-activation.php');

/*  Space-Themes Functions End  */

/*  Mercury Rating Stars Start */

require_once ABSPATH . 'wp-admin/includes/template.php';

function mercury_casino_rating($rating_value)
{

    $allowed_i_tag = array(
        'i' => array(
            'class' => array()
        ),
    );
    $star_full = '<i class="fas fa-star"></i>';
    $star_empty = '<i class="far fa-star"></i>';

    for ($i = 1; $i <= $rating_value; $i++) {
        echo wp_kses($star_full, $allowed_i_tag);
    }
    for ($i = $rating_value; $i < 5; $i++) {
        echo wp_kses($star_empty, $allowed_i_tag);
    }
}

/*  Mercury Rating Stars End */

/*  Mercury - Allow shortcodes in taxonomy descriptions Start */

add_filter('term_description', 'do_shortcode');

/*  Mercury - Allow shortcodes in taxonomy descriptions End */

/*  Mercury Register Required Plugins Start */

add_action('tgmpa_register', 'mercury_register_required_plugins');

function mercury_register_required_plugins()
{

    $plugins = array(

        array(
            'name' => esc_html__('One Click Demo Import', 'mercury'),
            'slug' => 'one-click-demo-import',
            'required' => true,
            'version' => '2.5.2',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => esc_html__('Mercury Addons [Space-Themes.com]', 'mercury'),
            'slug' => 'mercury-addons',
            'source' => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/plugins/3.4.0/mercury-addons-2.2.1.zip',
            'required' => true,
            'version' => '2.2.1',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => esc_html__('ACES Gambling [Mercury]', 'mercury'),
            'slug' => 'aces',
            'source' => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/plugins/3.4.0/aces-2.3.0.zip',
            'required' => true,
            'version' => '2.3.0',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => esc_html__('Yoast SEO', 'mercury'),
            'slug' => 'wordpress-seo',
            'required' => false,
            'version' => '14.0.2',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        )

    );

    $config = array(
        'id' => 'tgmpa',
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'parent_slug' => 'themes.php',
        'capability' => 'edit_theme_options',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',
    );

    tgmpa($plugins, $config);
}

/*  Mercury Register Required Plugins End */

/**
 * @param $img_name
 * @param $class
 * @return string
 * Функция возвращает html картинки. Можно задать атрибут class, о умолчанию пустая строка
 */
function get_img_html($img_name, $class = "")
{
    $html = '<img class="' . $class . '" src="' . get_template_directory_uri() . '/images/' . $img_name . '" alt="">';
    return $html;
}

/* the home page's top banner */
/**
 * @return string
 * Это shortcode необходимый для генерации и вывода картинок в виджете для верхнего банера
 */
function show_roulette_images_shortcode()
{
    $html = '';
    $html .= get_img_html("hp-tb-roulette.png", "hp-tb-roulette-img");
    $html .= get_img_html("hp-tb-rectangle.png", "hp-tb-rectangle-img");
    $html .= get_img_html("hp-tb-play-cubes.png", "hp-tb-play-cubes-img");
    $html .= get_img_html("roulette-shadow.svg", "hp-tb-play-roulette-shadow-img");

    return $html;
}

add_shortcode("hp-tb-roulette-images", "show_roulette_images_shortcode");

/* the home page's stocks banner */
/**
 * @return string
 */
function get_biggest_winnings_block_html()
{
    $html = '';
    $html .= '<div class="biggest_winnings_wrapper">';
    $html .= '<span class="biggest_winnings_title">The biggest winnings of the week</span>';
    $html .= '<div class="lights-bottom-wrapper"></div>';
    $html .= get_img_html("money/1.png", "stock-money-img-1");
    $html .= get_img_html("money/2.png", "stock-money-img-2");
    $html .= get_img_html("money/3.png", "stock-money-img-3");
    $html .= get_img_html("money/4.png", "stock-money-img-4");
    $html .= get_img_html("money/5.png", "stock-money-img-5");
    $html .= get_img_html("money/6.png", "stock-money-img-6");
    $html .= get_img_html("money/7.png", "stock-money-img-7");
    $html .= get_img_html("lights.png", "stock-lights-img");
    $html .= get_img_html("stock-sum.png","stock-sum-img");
    $html .= get_img_html("spinit.png","stock-spinit-img");
    $html .= '<a class="play-now-btn play-now-btn-position" href="" title="" target="_blank" rel="nofollow">Play now</a>';
    $html .= '</div>';

    return $html;
}

function get_most_popular_banners() {
    $html = '';

    $html .= '<div class="most-popular">';
    $html .= get_img_html("popular_casino.png", "popular-casino-img");
    $html .= get_img_html("popular_game.png", "popular-game-img");
    $html .= '</div>';

    return $html;
}

function show_stock_banner_shortcode()
{
    $html = "";
    $html .= '<div class="stocks-banner">';

    $html .= get_biggest_winnings_block_html();
    $html .= get_most_popular_banners();
    $html .= '</div>';

    return $html;
}

add_shortcode("hp-stock-banner", "show_stock_banner_shortcode");


add_filter("widget_text", "shortcode_unautop");//необходимо для того, чтобы shortcode работал в Custom HTML виджете
add_filter("widget_text", "do_shortcode");//необходимо для того, чтобы shortcode работал в Custom HTML виджете