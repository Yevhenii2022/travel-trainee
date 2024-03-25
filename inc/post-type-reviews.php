<?php

function reviews_custom_post()
{
  $labels = array(
    'name' => esc_html__('Відгуки', 'pointer_theme'),
    'singular_name' => esc_html__('Відгук', 'pointer_theme'),
    'add_new' => esc_html__('Додати новий відгук', 'pointer_theme'),
    'add_new_item' => esc_html__('Додати новий відгук', 'pointer_theme'),
    'edit_item' => esc_html__('Редагувати відгук', 'pointer_theme'),
    'new_item' => esc_html__('Новий відгук', 'pointer_theme'),
    'all_items' => esc_html__('Всі відгуки', 'pointer_theme'),
    'view_item' => esc_html__('Переглянути відгук', 'pointer_theme'),
    'search_items' => esc_html__('Знайти відгук', 'pointer_theme'),
    'not_found' => esc_html__('Відгуків не знайдено', 'pointer_theme'),
    'featured_image' => esc_html__('Зображення', 'pointer_theme'),
    'set_featured_image' => esc_html__('Додати зображення', 'pointer_theme')
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Відгуки',
    'public' => true,
    'menu_position' => 19,
    'show_in_rest' => true,
    'supports' => array('title', 'editor',),
    'has_archive' => false,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'rewrite' => array('slug' => 'reviews'),
    'menu_icon' => 'dashicons-feedback',
    'publicly_queryable' => false,
    'query_var' => true,
  );

  register_post_type('reviews', $args);
}

add_action('init', 'reviews_custom_post');
