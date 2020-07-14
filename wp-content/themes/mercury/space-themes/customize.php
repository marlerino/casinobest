<?php

/*  Custom Logo & Background Setup  */

function mercury_custom_logo_bg_setup() {
    $defaults = array(
        'height'      => 40,
        'width'       => 173,
        'flex-height' => true,
		'flex-width'  => true,
    );
    add_theme_support( 'custom-logo', $defaults );

    $background_defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'default-attachment'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $background_defaults );
}
add_action( 'after_setup_theme', 'mercury_custom_logo_bg_setup' );

/*  Sanitize Categories Select  */

function mercury_categories_select() {
	$cats = array();
	$cats[0] = esc_html__( 'All', 'mercury' );
	foreach ( get_categories() as $categories => $category ) {
	    $cats[$category->term_id] = $category->name;
	}
	return $cats;
}

/*  Sanitize Pages Select  */

function mercury_pages_select( $page_id, $setting ) {
  $page_id = absint( $page_id );

  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*  Sanitize Select  */

function mercury_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/*  Sanitize Radio  */

function mercury_sanitize_radio( $input, $setting ){ 
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;                      
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                        
}

/*  Sanitize Checkbox  */

function mercury_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/*  Sanitize URL  */

function mercury_sanitize_url( $url ) {
	return esc_url_raw( $url );
}

/*  Sanitize File  */

function mercury_sanitize_file( $file, $setting ) {
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png'
    );
    $file_ext = wp_check_filetype( $file, $mimes );
    return ( $file_ext['ext'] ? $file : $setting->default );
}

/*  Customize Settings Start  */

function mercury_customizer_setting($wp_customize) {

	/*  Main Color  */

    $wp_customize->add_setting( 'main_color', array(
		'default' => '#be2edd',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_color', array(
	    'label'   => esc_html__( 'Main Color', 'mercury' ),
	    'section' => 'colors',
	    'settings'   => 'main_color'
	)));

    /*  Second Color  */

    $wp_customize->add_setting( 'second_color', array(
		'default' => '#ff2453',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'second_color', array(
	    'label'   => esc_html__( 'Second Color', 'mercury' ),
	    'section' => 'colors',
	    'settings'   => 'second_color'
	)));

	/*  Stars Color  */

    $wp_customize->add_setting( 'stars_color', array(
		'default' => '#ffd32a',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stars_color', array(
	    'label'   => esc_html__( 'Stars Color', 'mercury' ),
	    'section' => 'colors',
	    'settings'   => 'stars_color'
	)));

	/*  Enable a homepage archive section  */

	$wp_customize->add_setting( 'mercury_enable_archive_section', array(
		'default' => true,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_enable_archive_section', array(
		'label' => esc_html__( 'Enable a homepage archive section', 'mercury' ),
	    'section'  => 'static_front_page',
	    'settings' => 'mercury_enable_archive_section',
	    'type'     => 'checkbox'
	)));

/*  Header Settings  */

	$wp_customize->add_section( 'mercury_header_settings' , array(
	    'title'      => esc_html__( 'Header', 'mercury' ),
	    'priority'   => 120,
	) );

	/*  --- Choose Header style ---  */

	$wp_customize->add_setting( 'mercury_header_style', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_radio',
		'capability' =>  'edit_theme_options'
	 ) );
         
    $wp_customize->add_control( 'mercury_header_style', array(
        'label' => esc_html__( 'Choose a header style', 'mercury' ),
        'section' => 'mercury_header_settings',
        'type' => 'radio',
        'choices' => array(
            '1' => esc_html__('#1 Style', 'mercury'),
            '2' => esc_html__('#2 Style', 'mercury')       
        )
     ) ); 

	/*  --- Enable Dark Style ---  */

	/*  $wp_customize->add_setting( 'mercury_enable_header_dark_style', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_enable_header_dark_style', array(
		'label' => esc_html__( 'Enable Dark Style', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'mercury_enable_header_dark_style',
	    'type'     => 'checkbox'
	)));  */

	/*  --- Enable top bar ---  */

	$wp_customize->add_setting( 'mercury_enable_top_bar', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_enable_top_bar', array(
		'label' => esc_html__( 'Enable Top Bar for #1 Style', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'mercury_enable_top_bar',
	    'type'     => 'checkbox'
	)));

	/*  --- Disable the floating header ---  */

	$wp_customize->add_setting( 'mercury_disable_floating_header', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_disable_floating_header', array(
		'label' => esc_html__( 'Disable the floating header', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'mercury_disable_floating_header',
	    'type'     => 'checkbox'
	)));

	/*  --- Header background color ---  */

    $wp_customize->add_setting( 'header_background_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
	    'label'   => esc_html__( 'Header background color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'header_background_color',
	)));

    /*  --- Top bar background color ---  */

    $wp_customize->add_setting( 'topbar_background_color', array(
		'default' => '#f5f6fa',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_background_color', array(
	    'label'   => esc_html__( 'Top bar background color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'topbar_background_color',
	)));

	/*  --- Top bar text/link color ---  */

    $wp_customize->add_setting( 'topbar_link_color', array(
		'default' => '#7f8c8d',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_link_color', array(
	    'label'   => esc_html__( 'Top bar text/link color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'topbar_link_color',
	)));

	/*  --- Top bar link hover color ---  */

    $wp_customize->add_setting( 'topbar_hover_color', array(
		'default' => '#151515',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_hover_color', array(
	    'label'   => esc_html__( 'Top bar link hover color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'topbar_hover_color',
	)));

	/*  --- Text logo color ---  */

    $wp_customize->add_setting( 'header_logo_color', array(
		'default' => '#2d3436',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_logo_color', array(
	    'label'   => esc_html__( 'Text logo color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'header_logo_color',
	)));

	/*  --- Text slogan color ---  */

    $wp_customize->add_setting( 'header_slogan_color', array(
		'default' => '#7f8c8d',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_slogan_color', array(
	    'label'   => esc_html__( 'Text slogan color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'header_slogan_color',
	)));

	/*  --- Main menu link color ---  */

    $wp_customize->add_setting( 'header_menu_color', array(
		'default' => '#151515',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_color', array(
	    'label'   => esc_html__( 'Main menu link color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'header_menu_color',
	)));

	/*  --- Main menu link hover color ---  */

    $wp_customize->add_setting( 'header_hover_menu_color', array(
		'default' => '#be2edd',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_hover_menu_color', array(
	    'label'   => esc_html__( 'Main menu link hover color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'header_hover_menu_color',
	)));

	/*  --- Submenu background color ---  */

    $wp_customize->add_setting( 'header_sub_menu_background_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_sub_menu_background_color', array(
	    'label'   => esc_html__( 'Submenu background color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'header_sub_menu_background_color',
	)));

	/*  --- Submenu link color ---  */

    $wp_customize->add_setting( 'header_sub_menu_color', array(
		'default' => '#34495e',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_sub_menu_color', array(
	    'label'   => esc_html__( 'Submenu link color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'header_sub_menu_color',
	)));

    /*  --- Submenu link hover color ---  */

    $wp_customize->add_setting( 'header_hover_sub_menu_color', array(
		'default' => '#b2bec3',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_hover_sub_menu_color', array(
	    'label'   => esc_html__( 'Submenu link hover color', 'mercury' ),
	    'section'  => 'mercury_header_settings',
	    'settings' => 'header_hover_sub_menu_color',
	)));

/*  Footer Settings  */

	$wp_customize->add_section( 'mercury_footer_settings' , array(
	    'title'      => esc_html__( 'Footer', 'mercury' ),
	    'priority'   => 130,
	) );

    /*  --- Footer Copyright ---  */

    $wp_customize->add_setting( 'footer_copyright', array(
	  'capability' => 'edit_theme_options',
	  'default' => '',
	  'sanitize_callback' => 'wp_kses',
	) );

	$wp_customize->add_control( 'footer_copyright', array(
	  'type' => 'textarea',
	  'section' => 'mercury_footer_settings',
	  'label' => esc_html__( 'Footer Copyright', 'mercury' ),
	  'description' => esc_html__( 'Add your copyright to the footer.', 'mercury' ),
	) );

	/*  --- Mobile Menu Background image ---  */

    $wp_customize->add_setting('mercury_mobile_menu_bg', array(
        'sanitize_callback' => 'mercury_sanitize_file',
        'capability' =>  'edit_theme_options'
    ));

    $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'mercury_mobile_menu_bg', array(
        'label' => esc_html__( 'Background image for the Mobile Menu', 'mercury' ),
        'description' => esc_html__( 'Minimal background image size 640 x 1200 px.', 'mercury' ),
        'section' => 'mercury_footer_settings',
        'settings' => 'mercury_mobile_menu_bg'
    )));

/*  Aces Settings  */

	$wp_customize->add_section( 'mercury_aces_settings' , array(
	    'title'      => esc_html__( 'ACES Gambling', 'mercury' ),
	    'priority'   => 140,
	) );

	/*  --- Casino's archive layout style ---  */

	$wp_customize->add_setting( 'mercury_casino_archive_style', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_radio',
		'capability' =>  'edit_theme_options'
	 ) );
         
    $wp_customize->add_control( 'mercury_casino_archive_style', array(
        'label' => esc_html__( 'The layout style of casino listing pages (archive and taxonomy)', 'mercury' ),
        'section' => 'mercury_aces_settings',
        'type' => 'radio',
        'choices' => array(
            '1' => esc_html__('#1 Style', 'mercury'),
            '2' => esc_html__('#2 Style', 'mercury'),
            '3' => esc_html__('#3 Style', 'mercury'),
            '4' => esc_html__('#4 Style', 'mercury'),
            '5' => esc_html__('#5 Style', 'mercury'),
            '6' => esc_html__('#6 Style', 'mercury') ,
            '7' => esc_html__('#7 Style', 'mercury')       
        )
     ) );

    /*  --- Game's archive layout style ---  */

	$wp_customize->add_setting( 'mercury_game_archive_style', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_radio',
		'capability' =>  'edit_theme_options'
	 ) );
         
    $wp_customize->add_control( 'mercury_game_archive_style', array(
        'label' => esc_html__( 'The layout style of game listing pages (archive and taxonomy)', 'mercury' ),
        'section' => 'mercury_aces_settings',
        'type' => 'radio',
        'choices' => array(
            '1' => esc_html__('#1 Style', 'mercury'),
            '2' => esc_html__('#2 Style', 'mercury')    
        )
     ) );

    /*  --- Enable category navigation for Casinos ---  */

    $wp_customize->add_setting( 'mercury_category_navigation_casinos', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_category_navigation_casinos', array(
		'label' => esc_html__( 'Enable category navigation for Casinos', 'mercury' ),
	    'section'  => 'mercury_aces_settings',
	    'settings' => 'mercury_category_navigation_casinos',
	    'type'     => 'checkbox'
	)));

	$wp_customize->add_setting( 'mercury_casinos_list_page_id', array(
		'sanitize_callback' => 'mercury_pages_select',
		'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'mercury_casinos_list_page_id', array(
		'type' => 'dropdown-pages',
		'section' => 'mercury_aces_settings',
		'label' => esc_html__( '"All" page for Casinos', 'mercury' ),
		'description' => esc_html__( 'Please select the page with a list of all casinos', 'mercury' )
	) );

    /*  --- Enable category navigation for Games ---  */

    $wp_customize->add_setting( 'mercury_category_navigation_games', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_category_navigation_games', array(
		'label' => esc_html__( 'Enable category navigation for Games', 'mercury' ),
	    'section'  => 'mercury_aces_settings',
	    'settings' => 'mercury_category_navigation_games',
	    'type'     => 'checkbox'
	)));

	$wp_customize->add_setting( 'mercury_games_list_page_id', array(
		'sanitize_callback' => 'mercury_pages_select',
		'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'mercury_games_list_page_id', array(
		'type' => 'dropdown-pages',
		'section' => 'mercury_aces_settings',
		'label' => esc_html__( '"All" page for Games', 'mercury' ),
		'description' => esc_html__( 'Please select the page with a list of all games', 'mercury' )
	) );

	/*  --- Enable category navigation for Bonuses ---  */

    $wp_customize->add_setting( 'mercury_category_navigation_bonuses', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_category_navigation_bonuses', array(
		'label' => esc_html__( 'Enable category navigation for Bonuses', 'mercury' ),
	    'section'  => 'mercury_aces_settings',
	    'settings' => 'mercury_category_navigation_bonuses',
	    'type'     => 'checkbox'
	)));

	$wp_customize->add_setting( 'mercury_bonuses_list_page_id', array(
		'sanitize_callback' => 'mercury_pages_select',
		'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'mercury_bonuses_list_page_id', array(
		'type' => 'dropdown-pages',
		'section' => 'mercury_aces_settings',
		'label' => esc_html__( '"All" page for Bonuses', 'mercury' ),
		'description' => esc_html__( 'Please select the page with a list of all bonuses', 'mercury' )
	) );

/*  Other Settings  */

	$wp_customize->add_section( 'mercury_posts_settings' , array(
	    'title'      => esc_html__( 'Other Settings', 'mercury' ),
	    'priority'   => 150,
	) );

	/*  --- Boxed Layout ---  */

	$wp_customize->add_setting( 'mercury_boxed_layout', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_boxed_layout', array(
		'label' => esc_html__( 'Enable boxed layout', 'mercury' ),
	    'section'  => 'mercury_posts_settings',
	    'settings' => 'mercury_boxed_layout',
	    'type'     => 'checkbox'
	)));

	/*  --- Related posts ---  */

	$wp_customize->add_setting( 'mercury_related_posts', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_related_posts', array(
		'label' => esc_html__( 'Enable related posts', 'mercury' ),
	    'section'  => 'mercury_posts_settings',
	    'settings' => 'mercury_related_posts',
	    'type'     => 'checkbox'
	)));

	/*  --- Sticky sidebar ---  */

	$wp_customize->add_setting( 'mercury_sticky_sidebar', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_sticky_sidebar', array(
		'label' => esc_html__( 'Enable sticky sidebar', 'mercury' ),
	    'section'  => 'mercury_posts_settings',
	    'settings' => 'mercury_sticky_sidebar',
	    'type'     => 'checkbox'
	)));

	/*  --- Time ago date format ---  */

	$wp_customize->add_setting( 'mercury_time_ago_format', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_time_ago_format', array(
		'label' => esc_html__( 'Enable "time ago" date format', 'mercury' ),
	    'section'  => 'mercury_posts_settings',
	    'settings' => 'mercury_time_ago_format',
	    'type'     => 'checkbox'
	)));

	/*  --- Disable author info block ---  */

	$wp_customize->add_setting( 'mercury_author_info_block', array(
		'default' => false,
		'sanitize_callback' => 'mercury_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mercury_author_info_block', array(
		'label' => esc_html__( 'Disable author info block', 'mercury' ),
	    'section'  => 'mercury_posts_settings',
	    'settings' => 'mercury_author_info_block',
	    'type'     => 'checkbox'
	)));

/*  Labels for the main menu items  */

	$wp_customize->add_section( 'nav_menus_labels', array(
        'title' => esc_html__( 'Main Menu Labels Settings', 'mercury' ),
        'panel' => 'nav_menus'
    ) );

	/*  --- New ---  */

	$wp_customize->add_setting( 'label_title_new', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'New',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'label_title_new', array(
	  'type' => 'text',
	  'section' => 'nav_menus_labels',
	  'label' => esc_html__( 'Title of the "New" label', 'mercury' ),
	  'description' => esc_html__( 'To add to the menu, continue to use the ".new" class', 'mercury' ),
	) );

	$wp_customize->add_setting( 'label_text_color_new', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'label_text_color_new', array(
	    'label'   => esc_html__( 'Color of the title of the "New" label', 'mercury' ),
	    'section'  => 'nav_menus_labels',
	    'settings' => 'label_text_color_new',
	)));

	$wp_customize->add_setting( 'label_background_color_new', array(
		'default' => '#4cd137',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'label_background_color_new', array(
	    'label'   => esc_html__( 'Color of the background of the "New" label', 'mercury' ),
	    'section'  => 'nav_menus_labels',
	    'settings' => 'label_background_color_new',
	)));

	/*  --- Best ---  */

	$wp_customize->add_setting( 'label_title_best', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'Best',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'label_title_best', array(
	  'type' => 'text',
	  'section' => 'nav_menus_labels',
	  'label' => esc_html__( 'Title of the "Best" label', 'mercury' ),
	  'description' => esc_html__( 'To add to the menu, continue to use the ".best" class', 'mercury' ),
	) );

	$wp_customize->add_setting( 'label_text_color_best', array(
		'default' => '#151515',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'label_text_color_best', array(
	    'label'   => esc_html__( 'Color of the title of the "Best" label', 'mercury' ),
	    'section'  => 'nav_menus_labels',
	    'settings' => 'label_text_color_best',
	)));

	$wp_customize->add_setting( 'label_background_color_best', array(
		'default' => '#f0ff00',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'label_background_color_best', array(
	    'label'   => esc_html__( 'Color of the background of the "Best" label', 'mercury' ),
	    'section'  => 'nav_menus_labels',
	    'settings' => 'label_background_color_best',
	)));

	/*  --- Top ---  */

	$wp_customize->add_setting( 'label_title_top', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'Top',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'label_title_top', array(
	  'type' => 'text',
	  'section' => 'nav_menus_labels',
	  'label' => esc_html__( 'Title of the "Top" label', 'mercury' ),
	  'description' => esc_html__( 'To add to the menu, continue to use the ".top" class', 'mercury' ),
	) );

	$wp_customize->add_setting( 'label_text_color_top', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'label_text_color_top', array(
	    'label'   => esc_html__( 'Color of the title of the "Top" label', 'mercury' ),
	    'section'  => 'nav_menus_labels',
	    'settings' => 'label_text_color_top',
	)));

	$wp_customize->add_setting( 'label_background_color_top', array(
		'default' => '#f22613',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'label_background_color_top', array(
	    'label'   => esc_html__( 'Color of the background of the "Top" label', 'mercury' ),
	    'section'  => 'nav_menus_labels',
	    'settings' => 'label_background_color_top',
	)));

    /*  --- Fair ---  */

	$wp_customize->add_setting( 'label_title_fair', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'Fair',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'label_title_fair', array(
	  'type' => 'text',
	  'section' => 'nav_menus_labels',
	  'label' => esc_html__( 'Title of the "Fair" label', 'mercury' ),
	  'description' => esc_html__( 'To add to the menu, continue to use the ".fair" class', 'mercury' ),
	) );

	$wp_customize->add_setting( 'label_text_color_fair', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'label_text_color_fair', array(
	    'label'   => esc_html__( 'Color of the title of the "Fair" label', 'mercury' ),
	    'section'  => 'nav_menus_labels',
	    'settings' => 'label_text_color_fair',
	)));

	$wp_customize->add_setting( 'label_background_color_fair', array(
		'default' => '#8c14fc',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'label_background_color_fair', array(
	    'label'   => esc_html__( 'Color of the background of the "Fair" label', 'mercury' ),
	    'section'  => 'nav_menus_labels',
	    'settings' => 'label_background_color_fair',
	)));

/*  Social Icons Section  */

	$wp_customize->add_section( 'mercury_social_icons' , array(
	    'title'      => esc_html__( 'Social Icons', 'mercury' ),
	    'priority'   => 160,
	) );

	/*  --- Facebook ---  */

	$wp_customize->add_setting( 'mercury_facebook_url', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'mercury_sanitize_url',
	));

	$wp_customize->add_control( 'mercury_facebook_url', array(
		'type' => 'url',
		'section' => 'mercury_social_icons',
		'label' => esc_html__( 'Facebook', 'mercury' ),
		'input_attrs' => array(
		    'placeholder' => esc_html__( 'https://www.facebook.com/', 'mercury' ),
		),
	));

	/*  --- Twitter ---  */

	$wp_customize->add_setting( 'mercury_twitter_url', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'mercury_sanitize_url',
	));

	$wp_customize->add_control( 'mercury_twitter_url', array(
		'type' => 'url',
		'section' => 'mercury_social_icons',
		'label' => esc_html__( 'Twitter', 'mercury' ),
		'input_attrs' => array(
		    'placeholder' => esc_html__( 'https://twitter.com/', 'mercury' ),
		),
	));

	/*  --- YouTube ---  */

	$wp_customize->add_setting( 'mercury_youtube_url', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'mercury_sanitize_url',
	));

	$wp_customize->add_control( 'mercury_youtube_url', array(
		'type' => 'url',
		'section' => 'mercury_social_icons',
		'label' => esc_html__( 'YouTube', 'mercury' ),
		'input_attrs' => array(
		    'placeholder' => esc_html__( 'https://www.youtube.com/', 'mercury' ),
		),
	));

	/*  --- Instagram ---  */

	$wp_customize->add_setting( 'mercury_instagram_url', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'mercury_sanitize_url',
	));

	$wp_customize->add_control( 'mercury_instagram_url', array(
		'type' => 'url',
		'section' => 'mercury_social_icons',
		'label' => esc_html__( 'Instagram', 'mercury' ),
	));

	/*  --- LinkedIn ---  */

	$wp_customize->add_setting( 'mercury_linkedin_url', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'mercury_sanitize_url',
	));

	$wp_customize->add_control( 'mercury_linkedin_url', array(
		'type' => 'url',
		'section' => 'mercury_social_icons',
		'label' => esc_html__( 'LinkedIn', 'mercury' ),
	));

	/*  --- Reddit ---  */

	$wp_customize->add_setting( 'mercury_reddit_url', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'mercury_sanitize_url',
	));

	$wp_customize->add_control( 'mercury_reddit_url', array(
		'type' => 'url',
		'section' => 'mercury_social_icons',
		'label' => esc_html__( 'Reddit', 'mercury' ),
	));

	/*  --- Other Link ---  */

	$wp_customize->add_setting( 'mercury_other_link_url', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'mercury_sanitize_url',
	));

	$wp_customize->add_control( 'mercury_other_link_url', array(
		'type' => 'url',
		'section' => 'mercury_social_icons',
		'label' => esc_html__( 'Other Link', 'mercury' ),
	));

}

add_action('customize_register', 'mercury_customizer_setting');

/*  Customize Settings End  */