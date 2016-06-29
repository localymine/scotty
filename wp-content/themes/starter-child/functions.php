<?php

include 'includes/cpt_acf_definitions.php';

function omw_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style)
    );
}

add_action('wp_enqueue_scripts', 'omw_theme_enqueue_styles');


if (!function_exists('thm_pagination')):

    function thm_pagination($pages = '', $range = 2) {
        
    }

endif;