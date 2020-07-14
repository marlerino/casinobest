<?php

/* Add Mercury Welcome Page */

function spacethemes_welcome_page() {
		add_submenu_page(
            'index.php',
			esc_html__('Welcome to Mercury', 'spacethemes'),
			esc_html__('Welcome to Mercury', 'spacethemes'),
			'manage_options',
			'mercury_welcome',
			'spacethemes_welcome_options'
		);
	}
add_action('admin_menu', 'spacethemes_welcome_page');

function spacethemes_welcome_options() {
        ?>  

        <div class="wrap">
            <h1><?php esc_html_e('Welcome to Mercury 3.4', 'spacethemes'); ?></h1>
            <p>
                <?php esc_html_e('Thank you for using our theme, please reward it a full five-star ★★★★★ rating.', 'spacethemes'); ?>
            </p>
            <p>
                <strong><?php esc_html_e('All Mercury theme settings are in', 'spacethemes'); ?> <a href="<?php echo esc_url( home_url( '/wp-admin/customize.php' ) ); ?>" target="_blank" title="<?php esc_attr( 'Customize', 'spacethemes' ); ?>"><?php esc_html_e( 'Customize', 'spacethemes' ); ?></a>.</strong><br>
                <a href="<?php echo esc_url( __( 'https://mercury.space-themes.com/docs/', 'spacethemes' ) ); ?>" target="_blank" title="<?php esc_attr( 'Online Documentation', 'spacethemes' ); ?>"><?php esc_html_e( 'Online Documentation', 'spacethemes' ); ?></a><br>
            <a href="<?php echo esc_url( __( 'https://spacethemes.ticksy.com/', 'spacethemes' ) ); ?>" target="_blank" title="<?php esc_attr( 'Need support?', 'spacethemes' ); ?>"><?php esc_html_e( 'Need support?', 'spacethemes' ); ?></a>
            </p>

        </div>
        <?php
}