<?php

function omw_theme_customize_register($wp_customize) {

    /* business area */
    $wp_customize->add_section('omw_section_business', array(
        'title' => __(ucwords('business area'), 'starter-child'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('omw_business[header_bg]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
            /* http://dummy-images.com/abstract/dummy-1000x667-Comb.jpg */
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'omw_business_header_bg_c', array(
        'label' => __(ucwords('header background'), 'starter-child'),
        'section' => 'omw_section_business',
        'settings' => 'omw_business[header_bg]',
    )));

    $wp_customize->add_setting('omw_business[header_text_color]', array(
        'default' => '#6092b9',
        'capability' => 'edit_theme_options',
        'type' => 'option',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omw_business_header_text_color_c', array(
        'label' => __(ucwords('text color')),
        'section' => 'omw_section_business',
        'settings' => 'omw_business[header_text_color]',
    )));
}

add_action('customize_register', 'omw_theme_customize_register');

//css generate
function omw_theme_generate_css() {
    ?>
    <style>
        .banner #header-image{
            background-image: url('<?php echo omw_get_business('header_bg') ?>');
        }
        .banner h1{
            color: <?php echo omw_get_business('header_text_color') ?>;
        }
    </style>
    <?php
}

function omw_get_business($setting = '') {
    if ($setting != '' || $setting != NULL) {
        $data = get_option('omw_business');
        return $data[$setting];
    }
}