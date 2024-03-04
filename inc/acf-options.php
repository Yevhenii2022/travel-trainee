<?php
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{
    if (function_exists('acf_add_options_sub_page')) {

        // Add parent.
        acf_add_options_page(
            array(
                'page_title' => __('Загальні налаштування сторінок'),
                'menu_title' => __('Загальні налаштування'),
                'menu_slug' => 'theme-general-settings',
                'capability' => 'edit_posts',
                'redirect' => false
            )
        );

        // Add header sub page.
        acf_add_options_sub_page(
            array(
                'page_title' => __('Header'),
                'menu_title' => __('Header'),
                'parent' => 'theme-general-settings',
                'parent_slug' => 'theme-general-settings',
            )
        );

        // Add footer sub page.
        acf_add_options_sub_page(
            array(
                'page_title' => __('Footer'),
                'menu_title' => __('Footer'),
                'parent' => 'theme-general-settings',
                'parent_slug' => 'theme-general-settings',
            )
        );
    }
}