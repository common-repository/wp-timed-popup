<?php
/*
  Plugin Name: WP Timed Popup
  Plugin URI: http://smartcatdesign.net/wp-popup
  Description: WordPress popup is a timed popup box that shows up on your website, and can be used as a call to action to display products, sign up for newsletters, and mainly to get the attention of your website visitors in an appealing and non-intrusive manner.
  Version: 1.4
  Author: SmartCat
  Author URI: http://smartcatdesign.net
  License: GPL v2
 */
register_activation_hook(__FILE__, 'sc_popup_activate');

function sc_popup_activate() {
    add_option('sc_popup_activation_redirect', true);
    sc_popup_register_options();
}

function sc_popup_register_options() {
    // declare options array
    $sc_popup_options = array(
        'sc_popup_title' => 'Popup Title',
        'sc_popup_subtitle' => 'Popup subtitle',
        'sc_popup_cta_text' => 'Click Here',
        'sc_popup_cta_url' => 'http://smartcatdesign.net',
        'sc_popup_media_type' => 'none',
        'sc_popup_media_link' => '',
        'sc_popup_width' => '400',
        'sc_popup_mode' => 'test',
//        'sc_popup_page' => 'all',
        'sc_popup_days' => '0',
        'sc_popup_delay' => '4',
//        'sc_popup_mobile' => 'show',
        'sc_popup_color' => '#005580',
//        'sc_popup_facebook' => 'http://smartcatdesign.net',
//        'sc_popup_twitter' => 'http://smartcatdesign.net',
//        'sc_popup_gplus' => 'http://smartcatdesign.net',
//        'sc_popup_linkedin' => 'http://smartcatdesign.net',
        'sc_popup_shortcode' => ''
    );
    // check if option is set, if not, add it
    foreach ($sc_popup_options as $option_name => $option_value) {
        if (get_option($option_name) === false) {
            add_option($option_name, $option_value);
        } else {
            update_option( $option_name, stripslashes_deep( sanitize_text_field( $_POST[$option_name] ) ) );
        }
    }
}

// redirect when activated
add_action('admin_init', 'sc_popup_activation_redirect');

function sc_popup_activation_redirect() {
    if (get_option('sc_popup_activation_redirect', false)) {
        delete_option('sc_popup_activation_redirect');
        wp_redirect(admin_url() . 'options-general.php?page=wp-popup.php');
    }
}

// add js to admin
add_action('admin_enqueue_scripts', 'admin_enqueue_scripts');

function admin_enqueue_scripts() {
    wp_enqueue_script('sc_popup_admin_script', plugins_url() . '/wp-timed-popup/jscolor/jscolor.js', array('jquery'), '1.2');
}


add_action('admin_menu', 'sc_popup_menu');

function sc_popup_menu() {
    add_options_page('WP Popup', 'Timed Popup Settings', 'manage_options', 'wp-popup.php', 'sc_popup_options');
}

function sc_popup_options() {
    // when user saves
    if (isset($_POST['wp_popup_save'])) {
        switch ($_POST['wp_popup_save']) {
            case 'Update':
                sc_popup_register_options();
                break;
            case 'reset':
                sc_popup_register_options();
                break;
            default :
                break;
        }
    }

    include_once 'inc/options.php';
}

add_action('wp_enqueue_scripts','load_sc_popup_scripts');
function load_sc_popup_scripts(){
    wp_enqueue_script('sc_popup_script', plugins_url() . '/wp-timed-popup/script/popup.js', array('jquery'), '1.2');
}

add_action('wp_head', 'show_popup');
function show_popup() {
    if (get_option('sc_popup_mode') != 'off') {
        wp_register_style('sc_popup_style', plugins_url() . '/wp-timed-popup/style/popup.css', false, '1.2');
        wp_register_style('sc_popup_font', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,600', false);

        wp_enqueue_style('sc_popup_font');
        wp_enqueue_style('sc_popup_style');

        

        if (get_option('sc_popup_mode') == 'test') {
            include_once 'inc/popup.php';
        } elseif (get_option('sc_popup_mode') == 'live') {
            if (!isset($_COOKIE['newvisitor'])) {
                include_once 'inc/popup.php';
            }
        }
    }
}


// set cookie for timer
add_action('init', 'set_newuser_cookie');
function set_newuser_cookie() {
    if (!isset($_COOKIE['newvisitor'])) {
        $expiry_time = time() + 3600 * 24 * get_option('sc_popup_days');
        setcookie('newvisitor', 1, $expiry_time, COOKIEPATH, COOKIE_DOMAIN, false);
    }
}

