<?php

/**
 * Enqueue scripts and styles on the Lili admin page.
 *
 * @param string $hook Hook suffix for the current admin page.
 */
function lili_admin_enqueue_scripts($hook)
{
    // Only include on our plugin page
    if ($hook != 'toplevel_page_lili-integration') {
        return;
    }

    wp_enqueue_style(
        'lili-inter-font',
        LILI_PLUGIN_URL . 'assets/fonts/inter/stylesheet.css',
        array(),
        '1.0.0'
    );

    wp_enqueue_style(
        'lili-admin-style',
        LILI_PLUGIN_URL . 'assets/css/main.css',
        array(),
        '1.0.0'
    );

    wp_enqueue_script('lili-login', LILI_PLUGIN_URL . 'assets/js/main.js', array('jquery'), '1.0.0', true);
    wp_localize_script('lili-login', 'liliAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'send_otp_nonce' => wp_create_nonce('lili_send_otp_nonce'),
        'login_nonce' => wp_create_nonce('lili_login_nonce'),
        'validate_otp_nonce' => wp_create_nonce('lili_validate_otp_nonce')
    ));

}

add_action('admin_enqueue_scripts', 'lili_admin_enqueue_scripts');

/**
 * Render the Lili admin page.
 */
function lili_admin_menu()
{
    add_menu_page(
        'Business Banking',
        'Business Banking',
        'manage_options',
        'lili-integration',
        'lili_admin_page',
        plugin_dir_url(__FILE__) . '../assets/images/favicon.svg'
    );
}

add_action('admin_menu', 'lili_admin_menu');