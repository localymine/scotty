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
        "has_archive" => true,
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

//    register_taxonomy("project_tag", array("project", "product"), array('labels' => array('name' => _x('Categories', 'taxonomy general name'))));
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
                'key' => 'field_578ef69a5f307',
                'label' => 'Number Of Column',
                'name' => 'number_of_column',
                'type' => 'select',
                'choices' => array(
                    'one' => 'One',
                    'two' => 'Two',
                    'three' => 'Three',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_578ef72f5f308',
                'label' => 'One Column',
                'name' => 'one_column',
                'type' => 'repeater',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_578ef69a5f307',
                            'operator' => '==',
                            'value' => 'one',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'sub_fields' => array(
                    array(
                        'key' => 'field_578ef7635f309',
                        'label' => 'Content',
                        'name' => 'col_1',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'basic',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => 1,
                'row_limit' => 1,
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array(
                'key' => 'field_578ef7a65f30a',
                'label' => 'Two Columns',
                'name' => 'two_columns',
                'type' => 'repeater',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_578ef69a5f307',
                            'operator' => '==',
                            'value' => 'two',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'sub_fields' => array(
                    array(
                        'key' => 'field_578ef7bf5f30b',
                        'label' => 'Content',
                        'name' => 'col_1',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'basic',
                        'media_upload' => 'yes',
                    ),
                    array(
                        'key' => 'field_578ef7f15f30c',
                        'label' => 'Content',
                        'name' => 'col_2',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'basic',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => 1,
                'row_limit' => 1,
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array(
                'key' => 'field_578ef8765f30e',
                'label' => 'Three Columns',
                'name' => 'three_columns',
                'type' => 'repeater',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_578ef69a5f307',
                            'operator' => '==',
                            'value' => 'three',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'sub_fields' => array(
                    array(
                        'key' => 'field_578ef88d5f30f',
                        'label' => 'Content',
                        'name' => 'col_1',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'basic',
                        'media_upload' => 'yes',
                    ),
                    array(
                        'key' => 'field_578ef8a35f310',
                        'label' => 'Content',
                        'name' => 'col_2',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'basic',
                        'media_upload' => 'yes',
                    ),
                    array(
                        'key' => 'field_578ef8ad5f311',
                        'label' => 'Content',
                        'name' => 'col_3',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'basic',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => 1,
                'row_limit' => 1,
                'layout' => 'table',
                'button_label' => 'Add Row',
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
        'orderby' => 'ID',
        'order' => 'ASC',
        'set_title' => 'yes',
        'set_bookmark' => 'yes',
            ), $atts);

    $output .= '<div class="page-fullwdth-content">';
    $output .= '<div id="business" class="portfolio clearfix">';

    $args = array(
        'post_type' => 'business',
        'posts_per_page' => $a['post_per_page'],
        'orderby' => $a['orderby'],
        'order' => $a['order'],
    );
    $loop = new WP_Query($args);

    if ($loop->have_posts()):
        while ($loop->have_posts()): $loop->the_post();
            $output .= '<div class="col-xs-6 col-sm-3">';
            $output .= '<div class="portfolio-item">';
            $output .= get_the_post_thumbnail(get_the_ID(), 'large', array('class' => 'img-responsive'));
            $output .= '<div class="overlay">';

            $terms = wp_get_post_terms(get_the_ID(), 'business_tax', array('hide_empty' => 1));
            foreach ($terms as $term) {
                if ($a['set_bookmark'] === 'yes') {
                    $url_bookmark_business = 'business/#' . $term->slug;
                    $output .= '<a class="btn-preview goto" href="#' . $term->slug . '" role="tab"><i class="fa fa-link"></i></a>';
                } else {
                    $output .= '<a class="btn-preview goto" href="' . get_term_link($term) . '"><i class="fa fa-link"></i></a>';
                }
            }

            $output .= '</div>';
            if ($a['set_title'] === 'yes') {
                $output .= '<h3 class="ctitle">' . get_the_title() . '</h3>';
            }
            $output .= '</div>';
            $output .= '</div>';
        endwhile;
    endif;

    $output .= '</div>';
    $output .= '</div>';

    wp_reset_postdata();

    return $output;
}
