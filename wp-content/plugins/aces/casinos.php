<?php

/*  Casinos - Post Type Start */

add_action('init', 'aces_casinos', 0 );

function aces_casinos() {

	$casino_slug = 'casino';
	if ( get_option( 'casinos_section_slug') ) {
		$casino_slug = get_option( 'casinos_section_slug', 'casino' );
	}

	$casino_name = esc_html__('Casinos', 'aces');
	if ( get_option( 'casinos_section_name') ) {
		$casino_name = get_option( 'casinos_section_name', 'Casinos' );
	}

	$args = array(
        'labels' => array(
			'name' => $casino_name,
			'add_new' => esc_html__('Add New', 'aces'),
            'edit_item' => esc_html__('Edit Item', 'aces'),
            'add_new_item' => esc_html__('Add New', 'aces'),
            'view_item' => esc_html__('View Item', 'aces'),
        ),
        'singular_label' => __('casino'),
        'public' => true,
		'publicly_queryable' => true,
        'show_ui' => true,
		'show_in_rest' => true,
		'menu_icon' => plugins_url( 'aces/images/icon.png' ),
        '_builtin' => false,
        '_edit_link' => 'post.php?post=%d',
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
        	'title',
        	'editor',
        	'author',
        	'comments',
        	'thumbnail',
        	'excerpt',
        	'revisions'
        ),
		'has_archive' => false,
		'rewrite' => array(
			'slug' => $casino_slug,
			'with_front' => false
		)
    );

register_post_type( 'casino' , $args );

/* --- Category: Custom Taxonomy --- */

$casinos_category_title = esc_html__('Categories', 'aces');
if ( get_option( 'casinos_category_title') ) {
	$casinos_category_title = get_option( 'casinos_category_title', 'Categories' );
}

$labels = array(
	'name' => $casinos_category_title,
	'singular_name' => $casinos_category_title,
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $casinos_category_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'view_item' => esc_html__('View Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_category_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'show_admin_column' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('casino-category', 'casino', $args);

/* --- Software: Custom Taxonomy --- */

$casinos_software_title = esc_html__('Software', 'aces');
if ( get_option( 'casinos_software_title') ) {
	$casinos_software_title = get_option( 'casinos_software_title', 'Software' );
}

$labels = array(
	'name' => $casinos_software_title,
	'singular_name' => $casinos_software_title,
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $casinos_software_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'view_item' => esc_html__('View Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_software_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('software', 'casino', $args);

/* --- Deposit Methods: Custom Taxonomy --- */

$casinos_deposit_method_title = esc_html__('Deposit Methods', 'aces');
if ( get_option( 'casinos_deposit_method_title') ) {
	$casinos_deposit_method_title = get_option( 'casinos_deposit_method_title', 'Deposit Methods' );
}

$labels = array(
	'name' => $casinos_deposit_method_title,
	'singular_name' => $casinos_deposit_method_title,
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $casinos_deposit_method_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'view_item' => esc_html__('View Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_deposit_method_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('deposit-method', 'casino', $args);

/* --- Withdrawal Methods: Custom Taxonomy --- */

$casinos_withdrawal_method_title = esc_html__('Withdrawal Methods', 'aces');
if ( get_option( 'casinos_withdrawal_method_title') ) {
	$casinos_withdrawal_method_title = get_option( 'casinos_withdrawal_method_title', 'Withdrawal Methods' );
}

$labels = array(
	'name' => $casinos_withdrawal_method_title,
	'singular_name' => $casinos_withdrawal_method_title,
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $casinos_withdrawal_method_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'view_item' => esc_html__('View Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_withdrawal_method_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('withdrawal-method', 'casino', $args);

/* --- Withdrawal Limits: Custom Taxonomy --- */

$casinos_withdrawal_limit_title = esc_html__('Withdrawal Limits', 'aces');
if ( get_option( 'casinos_withdrawal_limit_title') ) {
	$casinos_withdrawal_limit_title = get_option( 'casinos_withdrawal_limit_title', 'Withdrawal Limits' );
}

$labels = array(
	'name' => $casinos_withdrawal_limit_title,
	'singular_name' => $casinos_withdrawal_limit_title,
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $casinos_withdrawal_limit_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'view_item' => esc_html__('View Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_withdrawal_limit_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('withdrawal-limit', 'casino', $args);

/* --- Restricted Countries: Custom Taxonomy --- */

$casinos_restricted_countries_title = esc_html__('Restricted Countries', 'aces');
if ( get_option( 'casinos_restricted_countries_title') ) {
	$casinos_restricted_countries_title = get_option( 'casinos_restricted_countries_title', 'Restricted Countries' );
}

$labels = array(
	'name' => $casinos_restricted_countries_title,
	'singular_name' => $casinos_restricted_countries_title,
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $casinos_restricted_countries_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'view_item' => esc_html__('View Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_restricted_countries_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('restricted-country', 'casino', $args);

/* --- Licences: Custom Taxonomy --- */

$casinos_licences_title = esc_html__('Licences', 'aces');
if ( get_option( 'casinos_licences_title') ) {
	$casinos_licences_title = get_option( 'casinos_licences_title', 'Licences' );
}

$labels = array(
	'name' => $casinos_licences_title,
	'singular_name' => $casinos_licences_title,
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $casinos_licences_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'view_item' => esc_html__('View Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_licences_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('licence', 'casino', $args);

/* --- Languages: Custom Taxonomy --- */

$casinos_languages_title = esc_html__('Languages', 'aces');
if ( get_option( 'casinos_languages_title') ) {
	$casinos_languages_title = get_option( 'casinos_languages_title', 'Languages' );
}

$labels = array(
	'name' => $casinos_languages_title,
	'singular_name' => $casinos_languages_title,
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $casinos_languages_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'view_item' => esc_html__('View Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_languages_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('language', 'casino', $args);

/* --- Currencies: Custom Taxonomy --- */

$casinos_currencies_title = esc_html__('Currencies', 'aces');
if ( get_option( 'casinos_currencies_title') ) {
	$casinos_currencies_title = get_option( 'casinos_currencies_title', 'Currencies' );
}

$labels = array(
	'name' => $casinos_currencies_title,
	'singular_name' => $casinos_currencies_title,
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $casinos_currencies_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'view_item' => esc_html__('View Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_currencies_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('currency', 'casino', $args);

/* --- Devices: Custom Taxonomy --- */

$casinos_devices_title = esc_html__('Devices', 'aces');
if ( get_option( 'casinos_devices_title') ) {
	$casinos_devices_title = get_option( 'casinos_devices_title', 'Devices' );
}

$labels = array(
	'name' => $casinos_devices_title,
	'singular_name' => $casinos_devices_title,
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $casinos_devices_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'view_item' => esc_html__('View Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_devices_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('device', 'casino', $args);

}

/* --- Add custom slug for taxonomy 'casino-category' --- */

if ( get_option( 'casino_category_slug') ) {

	function aces_change_casino_category_slug( $taxonomy, $object_type, $args ) {

		$casino_category_slug = 'casino-category';

		if ( get_option( 'casino_category_slug') ) {
			$casino_category_slug = get_option( 'casino_category_slug', 'casino-category' );
		}

	    if( 'casino-category' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_category_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_category_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'software' --- */

if ( get_option( 'casino_software_slug') ) {

	function aces_change_casino_software_slug( $taxonomy, $object_type, $args ) {

		$casino_software_slug = 'software';

		if ( get_option( 'casino_software_slug') ) {
			$casino_software_slug = get_option( 'casino_software_slug', 'software' );
		}

	    if( 'software' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_software_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_software_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'deposit-method' --- */

if ( get_option( 'casino_deposit_method_slug') ) {

	function aces_change_casino_deposit_method_slug( $taxonomy, $object_type, $args ) {

		$casino_deposit_method_slug = 'deposit-method';

		if ( get_option( 'casino_deposit_method_slug') ) {
			$casino_deposit_method_slug = get_option( 'casino_deposit_method_slug', 'deposit-method' );
		}

	    if( 'deposit-method' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_deposit_method_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_deposit_method_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'withdrawal-method' --- */

if ( get_option( 'casino_withdrawal_method_slug') ) {

	function aces_change_casino_withdrawal_method_slug( $taxonomy, $object_type, $args ) {

		$casino_withdrawal_method_slug = 'withdrawal-method';

		if ( get_option( 'casino_withdrawal_method_slug') ) {
			$casino_withdrawal_method_slug = get_option( 'casino_withdrawal_method_slug', 'withdrawal-method' );
		}

	    if( 'withdrawal-method' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_withdrawal_method_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_withdrawal_method_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'withdrawal-limit' --- */

if ( get_option( 'casino_withdrawal_limit_slug') ) {

	function aces_change_casino_withdrawal_limit_slug( $taxonomy, $object_type, $args ) {

		$casino_withdrawal_limit_slug = 'withdrawal-limit';

		if ( get_option( 'casino_withdrawal_limit_slug') ) {
			$casino_withdrawal_limit_slug = get_option( 'casino_withdrawal_limit_slug', 'withdrawal-limit' );
		}

	    if( 'withdrawal-limit' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_withdrawal_limit_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_withdrawal_limit_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'restricted-countries' --- */

if ( get_option( 'casino_restricted_countries_slug') ) {

	function aces_change_casino_restricted_countries_slug( $taxonomy, $object_type, $args ) {

		$casino_restricted_countries_slug = 'restricted-country';

		if ( get_option( 'casino_restricted_countries_slug') ) {
			$casino_restricted_countries_slug = get_option( 'casino_restricted_countries_slug', 'restricted-country' );
		}

	    if( 'restricted-country' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_restricted_countries_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_restricted_countries_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'licence' --- */

if ( get_option( 'casino_licence_slug') ) {

	function aces_change_casino_licence_slug( $taxonomy, $object_type, $args ) {

		$casino_licence_slug = 'licence';

		if ( get_option( 'casino_licence_slug') ) {
			$casino_licence_slug = get_option( 'casino_licence_slug', 'licence' );
		}

	    if( 'licence' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_licence_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_licence_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'language' --- */

if ( get_option( 'casino_language_slug') ) {

	function aces_change_casino_language_slug( $taxonomy, $object_type, $args ) {

		$casino_language_slug = 'language';

		if ( get_option( 'casino_language_slug') ) {
			$casino_language_slug = get_option( 'casino_language_slug', 'language' );
		}

	    if( 'language' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_language_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_language_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'currency' --- */

if ( get_option( 'casino_currency_slug') ) {

	function aces_change_casino_currency_slug( $taxonomy, $object_type, $args ) {

		$casino_currency_slug = 'currency';

		if ( get_option( 'casino_currency_slug') ) {
			$casino_currency_slug = get_option( 'casino_currency_slug', 'currency' );
		}

	    if( 'currency' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_currency_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_currency_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'device' --- */

if ( get_option( 'casino_device_slug') ) {

	function aces_change_casino_device_slug( $taxonomy, $object_type, $args ) {

		$casino_device_slug = 'device';

		if ( get_option( 'casino_device_slug') ) {
			$casino_device_slug = get_option( 'casino_device_slug', 'device' );
		}

	    if( 'device' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_device_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_device_slug', 10, 3 );

}

/*  Casinos - Post Type End */

/*  Casinos - Pros/Cons Start */

add_action( 'admin_init', 'aces_casinos_pros_cons_fields' );

function aces_casinos_pros_cons_fields() {
    add_meta_box( 'aces_casinos_pros_cons_meta_box',
        esc_html__( 'Pros/Cons of the casino', 'aces' ),
        'aces_casinos_pros_cons_display_meta_box',
        'casino', 'normal', 'high'
    );
}

function aces_casinos_pros_cons_display_meta_box( $casino ) {

	wp_nonce_field( 'aces_casinos_pros_cons_box', 'aces_casinos_pros_cons_nonce' );
	$casino_pros_desc = get_post_meta( $casino->ID, 'casino_pros_desc', true );
	$casino_cons_desc = get_post_meta( $casino->ID, 'casino_cons_desc', true );
	$casino_pros_cons_allowed_html = array(
		'a' => array(
			'href' => true,
			'title' => true,
			'target' => true,
			'rel' => true
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'span' => array(),
		'p' => array(),
		'ul' => array(),
		'ol' => array(),
		'li' => array(),
	);
?>

<div class="components-base-control casino_pros_desc">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="casino_pros_desc-0">
			<?php
				$casinos_pros_title = get_option( 'casinos_pros_title' );
				if ( $casinos_pros_title ) {
					echo esc_html($casinos_pros_title);
				} else {
					esc_html_e( 'Pros', 'aces' );
				}
			?>
		</label>
		<textarea class="components-textarea-control__input" id="casino_pros_desc-0" rows="8" name="casino_pros_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($casino_pros_desc, $casino_pros_cons_allowed_html); ?></textarea>
	</div>
</div>

<div class="components-base-control casino_cons_desc">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="casino_cons_desc-0">
			<?php
				$casinos_cons_title = get_option( 'casinos_cons_title' );
				if ( $casinos_cons_title ) {
					echo esc_html($casinos_cons_title);
				} else {
					esc_html_e( 'Cons', 'aces' );
				}
			?>
		</label>
		<textarea class="components-textarea-control__input" id="casino_cons_desc-0" rows="8" name="casino_cons_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($casino_cons_desc, $casino_pros_cons_allowed_html); ?></textarea>
	</div>
</div>

    <?php
}

add_action( 'save_post', 'aces_casinos_pros_cons_save_fields', 10, 2 );

function aces_casinos_pros_cons_save_fields( $post_id ) {

		if ( ! isset( $_POST['aces_casinos_pros_cons_nonce'] ) ) {
            return $post_id;
        }

        $nonce = $_POST['aces_casinos_pros_cons_nonce'];

        if ( ! wp_verify_nonce( $nonce, 'aces_casinos_pros_cons_box' ) ) {
            return $post_id;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        if ( 'casino' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        }

		$casino_pros_desc = $_POST['casino_pros_desc'];
        update_post_meta( $post_id, 'casino_pros_desc', $casino_pros_desc );

        $casino_cons_desc = $_POST['casino_cons_desc'];
        update_post_meta( $post_id, 'casino_cons_desc', $casino_cons_desc );
}

/*  Casinos - Pros/Cons End */

/*  Casinos - Additional Fields Start */

add_action( 'admin_init', 'aces_casinos_fields' );

function aces_casinos_fields() {
    add_meta_box( 'aces_casinos_meta_box',
        esc_html__( 'Additional information', 'aces' ),
        'aces_casinos_display_meta_box',
        'casino', 'side', 'high'
    );
}

function aces_casinos_display_meta_box( $casino ) {

	wp_nonce_field( 'aces_casinos_box', 'aces_casinos_nonce' );
	$casino_short_desc = get_post_meta( $casino->ID, 'casino_short_desc', true );
	$casino_terms_desc = get_post_meta( $casino->ID, 'casino_terms_desc', true );
	$casino_external_link = get_post_meta( $casino->ID, 'casino_external_link', true );
	$casino_button_title = get_post_meta( $casino->ID, 'casino_button_title', true );
	$casino_button_notice = get_post_meta( $casino->ID, 'casino_button_notice', true );
	$casino_permalink_button_title = get_post_meta( $casino->ID, 'casino_permalink_button_title', true );
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
		'p' => array()
	);
?>

<div class="components-base-control casino_short_desc">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="casino_short_desc-0"><?php esc_html_e( 'Short description', 'aces' ); ?></label>
		<textarea class="components-textarea-control__input" id="casino_short_desc-0" rows="4" name="casino_short_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($casino_short_desc, $casino_allowed_html); ?></textarea>
	</div>
</div>

<div class="components-base-control casino_terms_desc">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="casino_terms_desc-0"><?php esc_html_e( 'Promotional description', 'aces' ); ?></label>
		<textarea class="components-textarea-control__input" id="casino_terms_desc-0" rows="8" name="casino_terms_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($casino_terms_desc, $casino_allowed_html); ?></textarea>
	</div>
</div>

<div class="components-base-control casino_external_link">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="casino_external_link-0"><?php esc_html_e( 'External URL for the', 'aces' ); ?> <strong><?php esc_html_e( 'Play Now', 'aces' ); ?></strong> <?php esc_html_e( 'button', 'aces' ); ?></label>
		<input type="url" name="casino_external_link" id="casino_external_link-0" value="<?php echo esc_url($casino_external_link); ?>" style="display: block; margin-bottom: 10px;" />
	</div>
</div>

<div class="components-base-control casino_button_title">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="casino_button_title-0"><?php esc_html_e( 'Custom title for the', 'aces' ); ?> <strong><?php esc_html_e( 'Play Now', 'aces' ); ?></strong> <?php esc_html_e( 'button', 'aces' ); ?></label>
		<input type="text" name="casino_button_title" id="casino_button_title-0" value="<?php echo esc_attr($casino_button_title); ?>" style="display: block; margin-bottom: 10px;" />
	</div>
</div>

<div class="components-base-control casino_button_notice">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="casino_button_notice-0"><?php esc_html_e( 'Notification under the button', 'aces' ); ?></label>
		<textarea class="components-textarea-control__input" id="casino_button_notice-0" rows="8" name="casino_button_notice" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($casino_button_notice, $casino_allowed_html); ?></textarea>
	</div>
</div>

<div class="components-base-control casino_permalink_button_title">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="casino_permalink_button_title-0"><?php esc_html_e( 'Custom title for the', 'aces' ); ?> <strong><?php esc_html_e( 'Read Review', 'aces' ); ?></strong> <?php esc_html_e( 'button', 'aces' ); ?></label>
		<input type="text" name="casino_permalink_button_title" id="casino_permalink_button_title-0" value="<?php echo esc_attr($casino_permalink_button_title); ?>" style="display: block; margin-bottom: 10px;" />
	</div>
</div>

    <?php
}

add_action( 'save_post', 'aces_casinos_save_fields', 10, 2 );

function aces_casinos_save_fields( $post_id ) {

		if ( ! isset( $_POST['aces_casinos_nonce'] ) ) {
            return $post_id;
        }

        $nonce = $_POST['aces_casinos_nonce'];

        if ( ! wp_verify_nonce( $nonce, 'aces_casinos_box' ) ) {
            return $post_id;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        if ( 'casino' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        }

		$casino_short_desc = $_POST['casino_short_desc'];
        update_post_meta( $post_id, 'casino_short_desc', $casino_short_desc );

        $casino_terms_desc = $_POST['casino_terms_desc'];
        update_post_meta( $post_id, 'casino_terms_desc', $casino_terms_desc );

		$casino_external_link = esc_url( $_POST['casino_external_link'] );
        update_post_meta( $post_id, 'casino_external_link', $casino_external_link );

		$casino_button_title = sanitize_text_field( $_POST['casino_button_title'] );
        update_post_meta( $post_id, 'casino_button_title', $casino_button_title );

        $casino_button_notice = $_POST['casino_button_notice'];
        update_post_meta( $post_id, 'casino_button_notice', $casino_button_notice );

        $casino_permalink_button_title = sanitize_text_field( $_POST['casino_permalink_button_title'] );
        update_post_meta( $post_id, 'casino_permalink_button_title', $casino_permalink_button_title );
}

/*  Casinos - Additional Fields End */

/*  Casinos - Ratings Start */

add_action( 'admin_init', 'aces_casinos_ratings_fields' );

function aces_casinos_ratings_fields() {

    add_meta_box( 'aces_casinos_ratings_meta_box',
        esc_html__( 'Casino Ratings', 'aces' ),
        'aces_casinos_ratings_display_meta_box',
        'casino', 'side', 'high'
    );
}

function aces_casinos_ratings_display_meta_box( $casino ) {

	wp_nonce_field( 'aces_casinos_ratings_box', 'aces_casinos_ratings_nonce' );
	$meta = get_post_meta( $casino->ID );

	$casino_rating_trust = ( isset( $meta['casino_rating_trust'][0] ) && '' !== $meta['casino_rating_trust'][0] ) ? $meta['casino_rating_trust'][0] : '';
	$casino_rating_games = ( isset( $meta['casino_rating_games'][0] ) && '' !== $meta['casino_rating_games'][0] ) ? $meta['casino_rating_games'][0] : '';
	$casino_rating_bonus = ( isset( $meta['casino_rating_bonus'][0] ) && '' !== $meta['casino_rating_bonus'][0] ) ? $meta['casino_rating_bonus'][0] : '';
	$casino_rating_customer = ( isset( $meta['casino_rating_customer'][0] ) && '' !== $meta['casino_rating_customer'][0] ) ? $meta['casino_rating_customer'][0] : '';

?>

<style type="text/css">
	.aces-single-rating-box {
		padding-bottom: 10px;
	}
	.aces-single-rating-box label {
		padding-right: 12px;
	}
	.aces-single-rating-box label:last-child {
		padding-right: 0;
	}
	.aces-single-rating-box label input[type=radio] {
		margin-right: 0 !important;
	}
</style>

<div class="components-base-control casino_rating_trust">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_1_title = get_option( 'rating_1' );
			if ( $rating_1_title ) {
				echo esc_html($rating_1_title);
			} else {
				esc_html_e( 'Trust & Fairness', 'aces' );
			} ?>
		</label>
		<div class="aces-single-rating-box">
			<label>
				<input type="radio" name="casino_rating_trust" value="1" <?php checked( $casino_rating_trust, '1' ); ?>>
					<?php esc_attr_e( '1', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_trust" value="2" <?php checked( $casino_rating_trust, '2' ); ?>>
					<?php esc_attr_e( '2', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_trust" value="3" <?php checked( $casino_rating_trust, '3' ); ?>>
					<?php esc_attr_e( '3', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_trust" value="4" <?php checked( $casino_rating_trust, '4' ); ?>>
					<?php esc_attr_e( '4', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_trust" value="5" <?php checked( $casino_rating_trust, '5' ); ?>>
					<?php esc_attr_e( '5', 'aces' ); ?>
			</label>
		</div>
	</div>
</div>

<div class="components-base-control casino_rating_games">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_2_title = get_option( 'rating_2' );
			if ( $rating_2_title ) {
				echo esc_html($rating_2_title);
			} else {
				esc_html_e( 'Games & Software', 'aces' );
			} ?>
		</label>
		<div class="aces-single-rating-box">
			<label>
				<input type="radio" name="casino_rating_games" value="1" <?php checked( $casino_rating_games, '1' ); ?>>
					<?php esc_attr_e( '1', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_games" value="2" <?php checked( $casino_rating_games, '2' ); ?>>
					<?php esc_attr_e( '2', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_games" value="3" <?php checked( $casino_rating_games, '3' ); ?>>
					<?php esc_attr_e( '3', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_games" value="4" <?php checked( $casino_rating_games, '4' ); ?>>
					<?php esc_attr_e( '4', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_games" value="5" <?php checked( $casino_rating_games, '5' ); ?>>
					<?php esc_attr_e( '5', 'aces' ); ?>
			</label>
		</div>
	</div>
</div>

<div class="components-base-control casino_rating_bonus">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_3_title = get_option( 'rating_3' );
			if ( $rating_3_title ) {
				echo esc_html($rating_3_title);
			} else {
				esc_html_e( 'Bonuses & Promotions', 'aces' );
			} ?>
		</label>
		<div class="aces-single-rating-box">
			<label>
				<input type="radio" name="casino_rating_bonus" value="1" <?php checked( $casino_rating_bonus, '1' ); ?>>
					<?php esc_attr_e( '1', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_bonus" value="2" <?php checked( $casino_rating_bonus, '2' ); ?>>
					<?php esc_attr_e( '2', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_bonus" value="3" <?php checked( $casino_rating_bonus, '3' ); ?>>
					<?php esc_attr_e( '3', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_bonus" value="4" <?php checked( $casino_rating_bonus, '4' ); ?>>
					<?php esc_attr_e( '4', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_bonus" value="5" <?php checked( $casino_rating_bonus, '5' ); ?>>
					<?php esc_attr_e( '5', 'aces' ); ?>
			</label>
		</div>
	</div>
</div>

<div class="components-base-control casino_rating_customer">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_4_title = get_option( 'rating_4' );
			if ( $rating_4_title ) {
				echo esc_html($rating_4_title);
			} else {
				esc_html_e( 'Customer Support', 'aces' );
			} ?>
		</label>
		<div class="aces-single-rating-box">
			<label>
				<input type="radio" name="casino_rating_customer" value="1" <?php checked( $casino_rating_customer, '1' ); ?>>
					<?php esc_attr_e( '1', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_customer" value="2" <?php checked( $casino_rating_customer, '2' ); ?>>
					<?php esc_attr_e( '2', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_customer" value="3" <?php checked( $casino_rating_customer, '3' ); ?>>
					<?php esc_attr_e( '3', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_customer" value="4" <?php checked( $casino_rating_customer, '4' ); ?>>
					<?php esc_attr_e( '4', 'aces' ); ?>
			</label>
			<label>
				<input type="radio" name="casino_rating_customer" value="5" <?php checked( $casino_rating_customer, '5' ); ?>>
					<?php esc_attr_e( '5', 'aces' ); ?>
			</label>
		</div>
	</div>
</div>

    <?php
}

add_action( 'save_post', 'aces_casinos_ratings_save_fields', 10, 2 );

function aces_casinos_ratings_save_fields( $post_id ) {

		if ( ! isset( $_POST['aces_casinos_ratings_nonce'] ) ) {
            return $post_id;
        }

        $nonce = $_POST['aces_casinos_ratings_nonce'];

        if ( ! wp_verify_nonce( $nonce, 'aces_casinos_ratings_box' ) ) {
            return $post_id;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        if ( 'casino' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        }

		if ( isset( $_POST['casino_rating_trust'] ) ) {
			update_post_meta( $post_id, 'casino_rating_trust', sanitize_text_field( wp_unslash( $_POST['casino_rating_trust'] ) ) );
		}

		if ( isset( $_POST['casino_rating_games'] ) ) {
			update_post_meta( $post_id, 'casino_rating_games', sanitize_text_field( wp_unslash( $_POST['casino_rating_games'] ) ) );
		}

		if ( isset( $_POST['casino_rating_bonus'] ) ) {
			update_post_meta( $post_id, 'casino_rating_bonus', sanitize_text_field( wp_unslash( $_POST['casino_rating_bonus'] ) ) );
		}

		if ( isset( $_POST['casino_rating_customer'] ) ) {
			update_post_meta( $post_id, 'casino_rating_customer', sanitize_text_field( wp_unslash( $_POST['casino_rating_customer'] ) ) );
		}

		if ( !wp_is_post_revision( $post_id ) ) {

	        $casino_rating_trust = get_post_meta( $post_id, 'casino_rating_trust', true );
	        $casino_rating_games = get_post_meta( $post_id, 'casino_rating_games', true );
	        $casino_rating_bonus = get_post_meta( $post_id, 'casino_rating_bonus', true );
	        $casino_rating_customer = get_post_meta( $post_id, 'casino_rating_customer', true );

	        $casino_ratings_all = array(
				$casino_rating_trust,
				$casino_rating_games,
				$casino_rating_bonus,
				$casino_rating_customer
			);

			$casino_overall_rating = esc_html(array_sum($casino_ratings_all)/count($casino_ratings_all));

	        if (is_float($casino_overall_rating)) { $casino_overall_rating = number_format($casino_overall_rating,1); }

	        update_post_meta($post_id, 'casino_overall_rating', $casino_overall_rating);

	    }

}

/*  Casinos - Ratings End */

/*  Display the Relationship of the Casino and Games Start  */

add_action( 'admin_init', 'aces_casinos_games_list' );

function aces_casinos_games_list() {
    add_meta_box( 'aces_casinos_games_list_meta_box',
        esc_html__( 'Games', 'aces' ),
        'aces_casinos_display_games_list_meta_box',
        'casino', 'side', 'high'
    );
}

function aces_casinos_display_games_list_meta_box( $post ){
	$games = get_posts(
		array(
			'post_type'=>'game',
			'posts_per_page'=>-1,
			'orderby'=>'post_title',
			'order'=>'ASC',
			'meta_query' => array(
		        array(
		            'key' => 'parent_casino',
		            'value' => $post->ID,
		            'compare' => 'LIKE'
		        )
		    )
		)
	);

	if( $games ){
	?>
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
			<?php foreach( $games as $game ){ ?>
				<li><a href="<?php echo esc_url(get_permalink($game->ID)); ?>" title="<?php esc_html_e($game->post_title); ?>" target="_blank"><?php esc_html_e($game->post_title); ?></a></li>
			<?php } ?>
			</ul>
		</div>
	<?php
	} else {
		esc_html_e( 'No games', 'aces' );
	}
}

/*  Display the Relationship of the Casino and Games End  */

/*  Display the Relationship of the Casino and Bonuses Start  */

add_action( 'admin_init', 'aces_casinos_bonuses_list' );

function aces_casinos_bonuses_list() {
    add_meta_box( 'aces_casinos_bonuses_list_meta_box',
        esc_html__( 'Bonuses', 'aces' ),
        'aces_casinos_display_bonuses_list_meta_box',
        'casino', 'side', 'high'
    );
}

function aces_casinos_display_bonuses_list_meta_box( $post ){
	$bonuses = get_posts(
		array(
			'post_type'=>'bonus',
			'posts_per_page'=>-1,
			'orderby'=>'post_title',
			'order'=>'ASC',
			'meta_query' => array(
		        array(
		            'key' => 'bonus_parent_casino',
		            'value' => $post->ID,
		            'compare' => 'LIKE'
		        )
		    )
		)
	);

	if( $bonuses ){
	?>
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
			<?php foreach( $bonuses as $bonus ){ ?>
				<li><a href="<?php echo esc_url(get_permalink($bonus->ID)); ?>" title="<?php esc_html_e($bonus->post_title); ?>" target="_blank"><?php esc_html_e($bonus->post_title); ?></a></li>
			<?php } ?>
			</ul>
		</div>
	<?php
	} else {
		esc_html_e( 'No bonuses', 'aces' );
	}
}

/*  Display the Relationship of the Casino and Bonuses End  */

/*  Add Software logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_software_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Logo', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('software_add_form_fields', 'aces_add_software_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_software_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_software', 'aces_save_software_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_software_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Logo', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $image_id = get_term_meta ( $term->term_id, 'taxonomy-image-id', true ); ?>
    	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
    	<div id="taxonomy-image-wrapper">
        <?php if ( $image_id ) { ?>
        	<?php echo wp_get_attachment_image ( $image_id, 'mercury-custom-logo' ); ?>
        <?php } ?>
       	</div>
       	<p>
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('software_edit_form_fields', 'aces_edit_software_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_software_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_software', 'aces_update_software_image_upload', 10, 2);

/*  Add Software logo End  */

/*  Add Deposit Methods logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_deposit_method_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Logo', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('deposit-method_add_form_fields', 'aces_add_deposit_method_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_deposit_method_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_deposit-method', 'aces_save_deposit_method_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_deposit_method_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Logo', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $image_id = get_term_meta ( $term->term_id, 'taxonomy-image-id', true ); ?>
    	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
    	<div id="taxonomy-image-wrapper">
        <?php if ( $image_id ) { ?>
        	<?php echo wp_get_attachment_image ( $image_id, 'mercury-custom-logo' ); ?>
        <?php } ?>
       	</div>
       	<p>
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('deposit-method_edit_form_fields', 'aces_edit_deposit_method_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_deposit_method_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_deposit-method', 'aces_update_deposit_method_image_upload', 10, 2);

/*  Add Deposit Methods logo End  */

/*  Add Withdrawal Methods logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_withdrawal_method_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Logo', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('withdrawal-method_add_form_fields', 'aces_add_withdrawal_method_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_withdrawal_method_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_withdrawal-method', 'aces_save_withdrawal_method_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_withdrawal_method_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Logo', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $image_id = get_term_meta ( $term->term_id, 'taxonomy-image-id', true ); ?>
    	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
    	<div id="taxonomy-image-wrapper">
        <?php if ( $image_id ) { ?>
        	<?php echo wp_get_attachment_image ( $image_id, 'mercury-custom-logo' ); ?>
        <?php } ?>
       	</div>
       	<p>
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('withdrawal-method_edit_form_fields', 'aces_edit_withdrawal_method_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_withdrawal_method_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_withdrawal-method', 'aces_update_withdrawal_method_image_upload', 10, 2);

/*  Add Withdrawal Methods logo End  */

/*  Add Withdrawal Limits logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_withdrawal_limit_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Logo', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('withdrawal-limit_add_form_fields', 'aces_add_withdrawal_limit_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_withdrawal_limit_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_withdrawal-limit', 'aces_save_withdrawal_limit_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_withdrawal_limit_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Logo', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $image_id = get_term_meta ( $term->term_id, 'taxonomy-image-id', true ); ?>
    	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
    	<div id="taxonomy-image-wrapper">
        <?php if ( $image_id ) { ?>
        	<?php echo wp_get_attachment_image ( $image_id, 'mercury-custom-logo' ); ?>
        <?php } ?>
       	</div>
       	<p>
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('withdrawal-limit_edit_form_fields', 'aces_edit_withdrawal_limit_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_withdrawal_limit_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_withdrawal-limit', 'aces_update_withdrawal_limit_image_upload', 10, 2);

/*  Add Withdrawal Methods logo End  */

/*  Add country code field to Restricted Countries Start  */

/* --- Add custom taxonomy field --- */

function aces_add_restricted_countries_country_code($taxonomy) {
?>
<div class="form-field term-group">
    <label for="aces_country_code">
    	<?php esc_html_e('Country code', 'aces'); ?>
    </label>
    <input type="text" id="aces_country_code" name="aces_country_code" class="regular-text" value="" maxlength="2" style="text-transform: uppercase;">
    <p>
    	<?php esc_html_e( 'For example, for the', 'aces' ); ?> <strong><?php esc_html_e( 'United States', 'aces' ); ?></strong> - <strong><?php esc_html_e( 'US', 'aces' ); ?></strong> <?php esc_html_e( 'code', 'aces' ); ?>. <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2" title="<?php esc_attr_e( 'ISO 3166-1 alpha-2 country codes', 'aces' ); ?>" target="_blank"><?php esc_html_e( 'ISO 3166-1 alpha-2 country codes', 'aces' ); ?></a>
    </p>
</div>
<?php
}

add_action('restricted-country_add_form_fields', 'aces_add_restricted_countries_country_code', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_restricted_countries_country_code($term_id, $tt_id) {
	if( isset( $_POST['aces_country_code'] ) && '' !== $_POST['aces_country_code'] ){
    	$country_code = esc_attr( $_POST['aces_country_code'] );
    	add_term_meta( $term_id, 'aces_country_code', $country_code, true );
	}
}

add_action('created_restricted-country', 'aces_save_restricted_countries_country_code', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_restricted_countries_country_code($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="aces_country_code">
    		<?php esc_html_e( 'Country code', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $country_code = get_term_meta ( $term->term_id, 'aces_country_code', true ); ?>
    	<input type="text" id="aces_country_code" name="aces_country_code" value="<?php echo esc_attr( $country_code ); ?>" maxlength="2" style="text-transform: uppercase;">
    	<p class="description">
	    	<?php esc_html_e( 'For example, for the', 'aces' ); ?> <strong><?php esc_html_e( 'United States', 'aces' ); ?></strong> - <strong><?php esc_html_e( 'US', 'aces' ); ?></strong> <?php esc_html_e( 'code', 'aces' ); ?>. <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2" title="<?php esc_attr_e( 'ISO 3166-1 alpha-2 country codes', 'aces' ); ?>" target="_blank"><?php esc_html_e( 'ISO 3166-1 alpha-2 country codes', 'aces' ); ?></a>
	    </p>
    </td>
</tr>
<?php
}

add_action('restricted-country_edit_form_fields', 'aces_edit_restricted_countries_country_code', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_restricted_countries_country_code($term_id, $tt_id) {
	if( isset( $_POST['aces_country_code'] ) && '' !== $_POST['aces_country_code'] ){
    	$country_code = esc_attr( $_POST['aces_country_code'] );
    	update_term_meta ( $term_id, 'aces_country_code', $country_code );
	} else {
    	update_term_meta ( $term_id, 'aces_country_code', '' );
	}
}

add_action('edited_restricted-country', 'aces_update_restricted_countries_country_code', 10, 2);

/*  Add country code field to Restricted Countries End  */

/*  Add Restricted Countries flag Start  */

/* --- Add custom taxonomy field --- */

function aces_add_restricted_countries_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Flag', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Flag', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Flag', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('restricted-country_add_form_fields', 'aces_add_restricted_countries_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_restricted_countries_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_restricted-country', 'aces_save_restricted_countries_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_restricted_countries_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Flag', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $image_id = get_term_meta ( $term->term_id, 'taxonomy-image-id', true ); ?>
    	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
    	<div id="taxonomy-image-wrapper">
        <?php if ( $image_id ) { ?>
        	<?php echo wp_get_attachment_image ( $image_id, 'mercury-custom-logo' ); ?>
        <?php } ?>
       	</div>
       	<p>
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Flag', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Flag', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('restricted-country_edit_form_fields', 'aces_edit_restricted_countries_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_restricted_countries_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_restricted-country', 'aces_update_restricted_countries_image_upload', 10, 2);

/*  Add Restricted Countries flag End  */

/*  Add Licences logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_licence_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Logo', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('licence_add_form_fields', 'aces_add_licence_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_licence_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_licence', 'aces_save_licence_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_licence_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Logo', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $image_id = get_term_meta ( $term->term_id, 'taxonomy-image-id', true ); ?>
    	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
    	<div id="taxonomy-image-wrapper">
        <?php if ( $image_id ) { ?>
        	<?php echo wp_get_attachment_image ( $image_id, 'mercury-custom-logo' ); ?>
        <?php } ?>
       	</div>
       	<p>
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('licence_edit_form_fields', 'aces_edit_licence_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_licence_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_licence', 'aces_update_licence_image_upload', 10, 2);

/*  Add Licences logo End  */

/*  Add Languages logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_language_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Logo', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('language_add_form_fields', 'aces_add_language_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_language_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_language', 'aces_save_language_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_language_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Logo', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $image_id = get_term_meta ( $term->term_id, 'taxonomy-image-id', true ); ?>
    	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
    	<div id="taxonomy-image-wrapper">
        <?php if ( $image_id ) { ?>
        	<?php echo wp_get_attachment_image ( $image_id, 'mercury-custom-logo' ); ?>
        <?php } ?>
       	</div>
       	<p>
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('language_edit_form_fields', 'aces_edit_language_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_language_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_language', 'aces_update_language_image_upload', 10, 2);

/*  Add Languages logo End  */

/*  Add Currencies logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_currency_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Logo', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('currency_add_form_fields', 'aces_add_currency_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_currency_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_currency', 'aces_save_currency_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_currency_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Logo', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $image_id = get_term_meta ( $term->term_id, 'taxonomy-image-id', true ); ?>
    	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
    	<div id="taxonomy-image-wrapper">
        <?php if ( $image_id ) { ?>
        	<?php echo wp_get_attachment_image ( $image_id, 'mercury-custom-logo' ); ?>
        <?php } ?>
       	</div>
       	<p>
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('currency_edit_form_fields', 'aces_edit_currency_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_currency_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_currency', 'aces_update_currency_image_upload', 10, 2);

/*  Add Currencies logo End  */

/*  Add Devices logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_device_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Logo', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('device_add_form_fields', 'aces_add_device_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_device_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_device', 'aces_save_device_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_device_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Logo', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $image_id = get_term_meta ( $term->term_id, 'taxonomy-image-id', true ); ?>
    	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
    	<div id="taxonomy-image-wrapper">
        <?php if ( $image_id ) { ?>
        	<?php echo wp_get_attachment_image ( $image_id, 'mercury-custom-logo' ); ?>
        <?php } ?>
       	</div>
       	<p>
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('device_edit_form_fields', 'aces_edit_device_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_device_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_device', 'aces_update_device_image_upload', 10, 2);

/*  Add Devices logo End  */

/*  Upload Background image of casino single page - Start  */

function aces_casino_background_image_block() {
	add_meta_box('aces_background_image_box',
		esc_html__( 'Background Image', 'aces' ),
		'aces_casino_background_image_block_show',
		'casino', 'normal', 'high'
	);
}
add_action( 'admin_menu', 'aces_casino_background_image_block' );

function aces_casino_background_image_block_show( $casino ) {

	wp_nonce_field( 'aces_casino_background_box', 'aces_casino_background_nonce' );
	$aces_single_casino_background_image = 'aces_single_casino_background_image';

	echo aces_background_image_uploader( $aces_single_casino_background_image, get_post_meta($casino->ID, $aces_single_casino_background_image, true) );
}
 
function aces_casino_background_image_block_save( $post_id ) {

	if ( ! isset( $_POST['aces_casino_background_nonce'] ) ) {
        return $post_id;
    }

    $nonce = $_POST['aces_casino_background_nonce'];

    if ( ! wp_verify_nonce( $nonce, 'aces_casino_background_box' ) ) {
        return $post_id;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( 'casino' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }

    $aces_single_casino_background_image = 'aces_single_casino_background_image';
    update_post_meta( $post_id, $aces_single_casino_background_image, sanitize_text_field( $_POST[$aces_single_casino_background_image] ) );

}
add_action('save_post', 'aces_casino_background_image_block_save');

/*  Upload Background image of casino single page - End  */