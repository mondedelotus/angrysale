<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')):
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('chld_thm_cfg_parent_css')):
    function chld_thm_cfg_parent_css()
    {
        wp_enqueue_style('chld_thm_cfg_parent', trailingslashit(get_template_directory_uri()) . 'style.css', array());
    }
endif;
add_action('wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10);

// END ENQUEUE PARENT ACTION

function remove_cf7_styles()
{
    wp_dequeue_style('contact-form-7');
}
add_action('wp_enqueue_scripts', 'remove_cf7_styles');

function enqueue_custom_styles()
{
    if (has_shortcode(get_the_content(), 'contact-form-7')) {
        wp_enqueue_style('newsletter', get_stylesheet_directory_uri() . '/components/newsletter.css');
    }
    ;
    if (is_product() || is_shop()) {
        wp_enqueue_style('product', get_stylesheet_directory_uri() . '/components/product.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

function enqueue_child_theme_scripts()
{
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_child_theme_scripts');
