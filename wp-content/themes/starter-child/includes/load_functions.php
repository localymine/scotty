<?php

include 'customize_theme.php';

/**
 * load parent's style
 */
add_action('wp_enqueue_scripts', 'omw_theme_enqueue_styles');

function omw_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style)
    );
}

/**
 * set action wp_head
 */
add_action('wp_head', 'master_wp_head', 2);

function master_wp_head() {

    omw_theme_generate_css();
}

/**
 * -----------------------------------------------------------------------------
 */
if (!function_exists('thm_pagination')):

    function thm_pagination($pages = '', $range = 2) {
        
    }

endif;