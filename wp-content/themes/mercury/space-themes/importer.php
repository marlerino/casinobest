<?php 

function mercury_import_files() {

  return array(
    array(

      'import_file_name'             => esc_html__( 'Mercury Demo 1', 'mercury' ),
      'categories'                   => array( 'Casino' ),
      'import_customizer_file_url'   => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/1/options.dat',
      'import_file_url'              => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/1/content.xml',
      'import_widget_file_url'       => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/1/widgets.wie',
      'import_preview_image_url'     => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/screenshots/01.png',
      'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'mercury' ),
      'preview_url'                  => 'https://demo1.mercury.is/',
    ),
    array(

      'import_file_name'             => esc_html__( 'Mercury Demo 2', 'mercury' ),
      'categories'                   => array( 'Casino' ),
      'import_customizer_file_url'   => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/2/options.dat',
      'import_file_url'              => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/2/content.xml',
      'import_widget_file_url'       => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/2/widgets.wie',
      'import_preview_image_url'     => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/screenshots/02.png',
      'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'mercury' ),
      'preview_url'                  => 'https://demo2.mercury.is/',
    ),
    array(

      'import_file_name'             => esc_html__( 'Mercury Demo 3', 'mercury' ),
      'categories'                   => array( 'Casino' ),
      'import_customizer_file_url'   => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/3/options.dat',
      'import_file_url'              => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/3/content.xml',
      'import_widget_file_url'       => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/3/widgets.wie',
      'import_preview_image_url'     => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/screenshots/03.png',
      'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'mercury' ),
      'preview_url'                  => 'https://demo3.mercury.is/',
    ),
    array(

      'import_file_name'             => esc_html__( 'Mercury Demo 4', 'mercury' ),
      'categories'                   => array( 'Sports betting' ),
      'import_customizer_file_url'   => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/4/options.dat',
      'import_file_url'              => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/4/content.xml',
      'import_widget_file_url'       => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/demos/4/widgets.wie',
      'import_preview_image_url'     => 'https://s3.eu-central.stackpathstorage.com/mercuryfiles/screenshots/04.png',
      'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'mercury' ),
      'preview_url'                  => 'https://demo4.mercury.is/',
    ),
  );
}

add_filter( 'pt-ocdi/import_files', 'mercury_import_files' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function mercury_after_import_setup() {

  $front_page_id = get_page_by_title( 'Home' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );

	$main_menu   = get_term_by( 'name', 'Main Menu', 'nav_menu' );
  $footer_menu   = get_term_by( 'name', 'Additional Menu', 'nav_menu' );
  $top_menu   = get_term_by( 'name', 'Additional Menu', 'nav_menu' );

  set_theme_mod( 'nav_menu_locations', array(
    'main-menu'   => $main_menu->term_id,
    'footer-menu'   => $footer_menu->term_id,
    'top-menu'   => $top_menu->term_id
  ));

}

add_action( 'pt-ocdi/after_import', 'mercury_after_import_setup' );