<?php
function my_custom_scripts_excursions()
{
    wp_enqueue_script('my-custom-scripts-excursions', get_template_directory_uri() . '/src/js/load-more-excursions.js', array('jquery'), null, true);
    wp_localize_script('my-custom-scripts-excursions', 'MyAjaxexcursions', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'my_custom_scripts_excursions');


function load_more_excursions()
{
    $cities = isset($_POST['cities']) ? $_POST['cities'] : array();
    $types = isset($_POST['types']) ? $_POST['types'] : array();
    $option = isset($_POST['option']) ? $_POST['option'] : 'all';
    $paged = isset($_POST['page']) ? $_POST['page'] : 1;
    $min_price = isset($_POST['min_price']) ? intval($_POST['min_price']) : 0;
    $max_price = isset($_POST['max_price']) ? intval($_POST['max_price']) : 1000;
    $posts_per_page = 9;
    $city_tax_query = array('relation' => 'OR');
    $type_tax_query = array('relation' => 'OR');

    foreach ($cities as $city) {
        $city_tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $city,
        );
    }

    foreach ($types as $type) {
        $type_tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $type,
        );
    }
    $tax_query = array(
        'relation' => 'AND',
        $city_tax_query,
        $type_tax_query
    );

    $meta_query = array(
        'relation' => 'AND',
        array(
            'key' => '_regular_price',
            'value' => array($min_price, $max_price),
            'type' => 'numeric',
            'compare' => 'BETWEEN',
        ),
    );




    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => $tax_query,
        'meta_query' => $meta_query,
    );
    if ($option === 'post_popularity') {
        $args['meta_key'] = 'post_popularity';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
    } elseif ($option === 'az') {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    } elseif ($option === 'new') {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    }
    $query = new WP_Query($args);
    $total_posts = $query->found_posts;
    echo '<script>document.getElementById("products_count").innerText = ' . $total_posts . ';</script>';

    if ($query->have_posts() && !empty($query->posts)) {
        while ($query->have_posts()) {
            $query->the_post();
            $product_id = get_the_ID();
            $custom_data = (object) array(
                'ID' => $product_id
            );
            set_query_var('custom_data', $custom_data);

            get_template_part('template-parts/excursion-card');
        }
    } else {
        echo '<div class="not-fount-tour">' . pll_e('Екскурсії не знайдені') . '</div>';
    }


    $paginate_args = array(
        'base' => '%_%',
        'format' => '?page=%#%',
        'current' => $paged,
        'total' => $query->max_num_pages,
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
        'type' => 'array',
    );



    $total_posts = $query->found_posts;

    $total_pages = ceil($total_posts / $posts_per_page);

    $pagination_html = '';
    if ($total_pages > 1) {
        $pagination_html .= '<div class="pagination">';
        if ($paged > 1) {
            $pagination_html .= '<span data-page="' . ($paged - 1) . '"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.4"><path d="M7.15056 1.86345L3.51401 5.5L7.15056 9.13655" stroke="#202020" stroke-linecap="round" stroke-linejoin="round"/></g></svg></span>';
        }
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagination_html .= '<span  data-page="' . $i . '"' . ($paged == $i ? ' class="pagination_active"' : '') . '>' . $i . '</span>';
        }
        if ($paged < $total_pages) {
            $pagination_html .= '<span href="#" data-page="' . ($paged + 1) . '"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3.84749 9.13655L7.48404 5.5L3.84749 1.86345" stroke="#202020" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        </span>';
        }
        $pagination_html .= '</div>';
    }

    echo $pagination_html;

    wp_reset_postdata();
    die();
}

add_action('wp_ajax_load_more_excursions', 'load_more_excursions');
add_action('wp_ajax_nopriv_load_more_excursions', 'load_more_excursions');
