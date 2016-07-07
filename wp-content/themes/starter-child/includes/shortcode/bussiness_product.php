<?php

add_action('init', 'cptui_register_my_bussiness_product_cpts');

function cptui_register_my_bussiness_product_cpts() {
    $labels = array(
        "name" => __('Business', 'starter'),
        "singular_name" => __('Business', 'starter'),
    );

    $args = array(
        "label" => __('Business', 'starter'),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "business", "with_front" => true),
        "query_var" => true,
        "supports" => array("title", "editor", "thumbnail"),
    );
    register_post_type("business", $args);

    $labels = array(
        "name" => __('Products', 'starter'),
        "singular_name" => __('Product', 'starter'),
    );

    $args = array(
        "label" => __('Products', 'starter'),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "product", "with_front" => true),
        "query_var" => true,
        "supports" => array("title", "editor", "thumbnail"),
    );
    register_post_type("product", $args);

    // End of cptui_register_my_bussiness_product_cpts()
}

add_action('init', 'cptui_register_my_taxes_business_tax');

function cptui_register_my_taxes_business_tax() {
    $labels = array(
        "name" => __('Business Taxonomy', 'starter'),
        "singular_name" => __('Business Taxonomy', 'starter'),
    );

    $args = array(
        "label" => __('Business Taxonomy', 'starter'),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "Business Taxonomy",
        "show_ui" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'business-tax', 'with_front' => true),
        "show_admin_column" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy("business_tax", array("business", "product"), $args);
    
    register_taxonomy("project_tag", array("project", "product"), array('labels' => array('name' => _x('Categories', 'taxonomy general name'))));

// End cptui_register_my_taxes_business_tax()
}

add_action('init', 'cptui_register_my_taxes_product_line');

function cptui_register_my_taxes_product_line() {
    $labels = array(
        "name" => __('Product Line', 'starter'),
        "singular_name" => __('Product Line', 'starter'),
    );

    $args = array(
        "label" => __('Product Line', 'starter'),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "Product Line",
        "show_ui" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'product-line', 'with_front' => true),
        "show_admin_column" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy("product-line", array("product"), $args);

// End cptui_register_my_taxes_product_line()
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_business',
        'title' => 'Business',
        'fields' => array(
            array(
                'key' => 'field_577d44405c951',
                'label' => 'Link To',
                'name' => 'link_to',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'business',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_product',
        'title' => 'Product',
        'fields' => array(
            array(
                'key' => 'field_577d47a5a0429',
                'label' => 'Catalog',
                'name' => 'catalog',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_577d47e7a042a',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_577d4814a042b',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'basic',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
}

add_shortcode('omw_load_business', 'omw_load_business_shortcode');

function omw_load_business_shortcode($atts, $content = null) {
    $output = '';

    $a = shortcode_atts(array(
        'post_per_page' => 4,
            ), $atts);

    $output .= '<div class="page-fullwdth-content">';
    $output .= '<div id="recent-projects" class="portfolio clearfix">';

    $args = array(
        'post_type' => 'business',
        'posts_per_page' => $a['posts_per_page'],
    );
    $loop = new WP_Query($args);

    if ($loop->have_posts()):
        while ($loop->have_posts()): $loop->the_post();
            $output .= '<div class="col-xs-6 col-sm-3">';
            $output .= '<div class="portfolio-item">';
            $output .= get_the_post_thumbnail('large', array('class' => 'img-responsive'));
            $output .= '<div class="overlay">';
            $output .= '<a class="btn-preview" href="' . get_field('link_to') . '"><i class="fa fa-link"></i></a>';
            $output .= '<a class="btn-preview" href="' . get_the_permalink() . '"><i class="fa fa-link"></i></a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
        endwhile;
    endif;
}
