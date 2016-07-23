<?php

function omw_theme_customize_register($wp_customize) {

    /* business area */
    $wp_customize->add_section('omw_section_business', array(
        'title' => __(ucwords('business area'), 'starter-child'),
        'priority' => 20,
    ));
    
    $wp_customize->add_setting('omw_business[hide_block]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
    ));
    $wp_customize->add_control('omw_business_hide_block_c', array(
        'label' => __(ucwords('hide business block'), 'starter-child'),
        'section' => 'omw_section_business',
        'settings' => 'omw_business[hide_block]',
        'type' => 'checkbox'
    ));
    
    $wp_customize->add_setting('omw_business[slogan]', array(
        'default' => 'We go to our limits, <br>so that you can go beyond yours',
        'capability' => 'edit_theme_options',
        'type' => 'option',
    ));
    $wp_customize->add_control('omw_business_slogan_c', array(
        'label' => __(ucwords('slogan'), 'starter-child'),
        'section' => 'omw_section_business',
        'settings' => 'omw_business[slogan]',
        'type' => 'textarea'
    ));
    
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
    
    /* team */
    $wp_customize->add_section('omw_section_team', array(
        'title' => __(ucwords('team'), 'starter-child'),
        'priority' => 20,
    ));
    
    $wp_customize->add_setting('omw_team[slogan]', array(
        'default' => 'Together We are One Team',
        'capability' => 'edit_theme_options',
        'type' => 'option',
    ));
    $wp_customize->add_control('omw_team_slogan_c', array(
        'label' => __(ucwords('slogan'), 'starter-child'),
        'section' => 'omw_section_team',
        'settings' => 'omw_team[slogan]',
        'type' => 'textarea'
    ));
    
    $wp_customize->add_setting('omw_team[header_text_color]', array(
        'default' => '#6092b9',
        'capability' => 'edit_theme_options',
        'type' => 'option',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omw_team_header_text_color_c', array(
        'label' => __(ucwords('text color')),
        'section' => 'omw_section_team',
        'settings' => 'omw_team[header_text_color]',
    )));

    $wp_customize->add_setting('omw_team[header_bg]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
            /* http://dummy-images.com/abstract/dummy-1000x667-Comb.jpg */
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'omw_team_header_bg_c', array(
        'label' => __(ucwords('header background'), 'starter-child'),
        'section' => 'omw_section_team',
        'settings' => 'omw_team[header_bg]',
    )));
    
}

add_action('customize_register', 'omw_theme_customize_register');

//css generate
function omw_theme_generate_css() {
    ?>
    <style>
        .business_header #header-image{
            background-image: url('<?php echo omw_get_business('header_bg') ?>');
        }
        .business_header h1{
            color: <?php echo omw_get_business('header_text_color') ?>;
        }
        .team_header #header-image{
            background-image: url('<?php echo omw_get_team('header_bg') ?>');
        }
        .team_header h1{
            color: <?php echo omw_get_team('header_text_color') ?>;
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

function omw_get_team($setting = '') {
    if ($setting != '' || $setting != NULL) {
        $data = get_option('omw_team');
        return $data[$setting];
    }
}