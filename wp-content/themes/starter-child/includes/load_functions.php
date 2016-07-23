<?php

/**
 * load parent's style
 */
add_action('wp_enqueue_scripts', 'omw_theme_enqueue_styles');

function omw_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style)
    );
    
    wp_enqueue_script('child-common', get_stylesheet_directory_uri() . '/js/common.js', array('scrollTo', 'SmoothScroll'), false, true);
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
/* -------------------------------------------------------
 * 			Themeum Pagination
 * ------------------------------------------------------- */

if (!function_exists('thm_pagination')):

    function thm_pagination($pages = '', $range = 2) {
        $showitems = ($range * 1) + 1;

        global $paged;

        if (empty($paged))
            $paged = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        if (1 != $pages) {
            echo "<ul class='pagination'>";

            if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
                echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
            }

            if ($paged > 1 && $showitems < $pages) {
                echo '<li>';
                previous_posts_link("Previous");
                echo '</li>';
            }

            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                    echo ($paged == $i) ? "<li class='active'><a href='#'>" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' >" . $i . "</a></li>";
                }
            }

            if ($paged < $pages && $showitems < $pages) {
                echo '<li>';
                next_posts_link("Next");
                echo '</li>';
            }

            if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
                echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
            }

            echo "</ul>";
        }
    }

endif;

/**
 * -----------------------------------------------------------------------------
 */
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
    echo '';
}

function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}

add_action('admin_menu', 'revcon_change_post_label');
add_action('init', 'revcon_change_post_object');
