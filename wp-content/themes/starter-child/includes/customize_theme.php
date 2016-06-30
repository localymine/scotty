<?php

function omw_theme_customize_register($wp_customize) {
    /* about us section */
    $wp_customize->add_section('omw_section_about_us', array(
        'title' => __(ucwords('about us')),
        'priority' => 20,
    ));
    $wp_customize->add_setting('omw_about_us_bg', array(
        'default' => '#ffffff',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omw_about_us_bg_c', array(
        'label' => __(ucwords('background color')),
        'section' => 'omw_section_about_us',
        'settings' => 'omw_about_us_bg',
        'priority' => 1,
    )));

    /* news section */
    $wp_customize->add_section('omw_section_news', array(
        'title' => __(ucwords('news')),
        'priority' => 20,
    ));

    $wp_customize->add_setting('omw_news_title', array(
        'default' => 'News',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'omw_news_title_c', array(
        'label' => __(ucwords('title')),
        'section' => 'omw_section_news',
        'settings' => 'omw_news_title',
        'type' => 'text',
        'priority' => 1,
    )));
    
    $wp_customize->add_setting('omw_news_sub_title', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'omw_news_sub_title_c', array(
        'label' => __(ucwords('sub title')),
        'section' => 'omw_section_news',
        'settings' => 'omw_news_sub_title',
        'type' => 'textarea',
        'priority' => 1,
    )));
    
    $wp_customize->add_setting('omw_news_bg', array(
        'default' => '#f5f5f5',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omw_news_bg_c', array(
        'label' => __(ucwords('background color')),
        'section' => 'omw_section_news',
        'settings' => 'omw_news_bg',
        'priority' => 1,
    )));

    /* projects section */
    $wp_customize->add_section('omw_section_projects', array(
        'title' => __(ucwords('projects')),
        'priority' => 20,
    ));

    $wp_customize->add_setting('omw_projects_title', array(
        'default' => 'Projects',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'omw_projects_title_c', array(
        'label' => __(ucwords('title')),
        'section' => 'omw_section_projects',
        'settings' => 'omw_projects_title',
        'type' => 'text',
        'priority' => 1,
    )));
    
    $wp_customize->add_setting('omw_projects_sub_title', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'omw_projects_sub_title_c', array(
        'label' => __(ucwords('sub title')),
        'section' => 'omw_section_projects',
        'settings' => 'omw_projects_sub_title',
        'type' => 'textarea',
        'priority' => 1,
    )));
    
    $wp_customize->add_setting('omw_projects_bg', array(
        'default' => '#f5f5f5',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omw_projects_bg_c', array(
        'label' => __(ucwords('background color')),
        'section' => 'omw_section_projects',
        'settings' => 'omw_projects_bg',
        'priority' => 1,
    )));
}

add_action('customize_register', 'omw_theme_customize_register');

//css generate
function omw_theme_generate_css() {
    ?>
    <style>
        #about-us{
            background: <?php echo omw_get_about_us_bg() ?>;
        }
        #news{
            background: <?php echo omw_get_news_setting('bg') ?>;
        }
        #projects{
            background: <?php echo omw_get_projects_setting('bg') ?>;
        }
    </style>
    <?php
}

function omw_get_about_us_bg() {
    return get_theme_mod('omw_about_us_bg');
}

function omw_get_news_setting($setting = '') {
    if ($setting != '' || $setting != NULL) {
        $setting = 'omw_news_' . $setting;
        return get_theme_mod($setting);
    }
    return $setting;
}

function omw_get_projects_setting($setting = '') {
    if ($setting != '' || $setting != NULL) {
        $setting = 'omw_projects_' . $setting;
        return get_theme_mod($setting);
    }
    return $setting;
}
