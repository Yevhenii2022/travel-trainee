<?php

// -------------------------------  ПОИСК В ХЕДЕРЕ
function my_ajax_search()
{
    // Проверяем nonce для безопасности
    check_ajax_referer('my_ajax_search_nonce', 'security');

    $query = sanitize_text_field($_POST['query']);
    $search_results = new WP_Query(
        array(
            'post_type' => array('post', 'product', 'city', 'excursions-type'),
            's' => $query,
            'posts_per_page' => 3,
        )
    );
    $total_posts = $search_results->found_posts;

    if ($search_results->have_posts()) : ?>
        <div class="search__total">(
            <?= $total_posts ?>)<span>
                <?php pll_e('Результатов') ?>
            </span>
        </div>
        <?php while ($search_results->have_posts()) :
            $search_results->the_post(); ?>

            <a class="search__link" href="<?= get_permalink() ?>">
                <?php if (get_the_title()) : ?>
                    <h4>
                        <?= get_the_title() ?>
                    </h4>
                <?php endif ?>
            </a>

        <?php endwhile; ?>
        <div id="search__btn" class="btn search__button">
            <span class="btn--top-text"><?= pll_e('Все результаты') ?></span>
            <span class="btn--bottom-text"><?= pll_e('Все результаты') ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
            </svg>
        </div>
    <?php

    else :
        echo '<p class="search__results-nothing">';
        pll_e("Нічого не знайдено");
        echo '</p>';
    endif;

    wp_reset_postdata();
    die();
}

add_action('wp_ajax_nopriv_my_ajax_search', 'my_ajax_search');
add_action('wp_ajax_my_ajax_search', 'my_ajax_search');


function my_enqueue_ajax_script()
{
    wp_enqueue_script('my-ajax-search', get_template_directory_uri() . '/src/js/search-page.js', array('jquery'), '', true);
    wp_localize_script(
        'my-ajax-search',
        'myAjax',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('my_ajax_search_nonce'),
        )
    );
}

add_action('wp_enqueue_scripts', 'my_enqueue_ajax_script');




// -------------------------------  СТРАНИЦА ПОИСКА
function my_ajax_search_page()
{

    check_ajax_referer('my_ajax_search_nonce', 'security');

    $query = sanitize_text_field($_POST['query']);
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $postType = isset($_POST['postType']) ? $_POST['postType'] : '';

    $tax_query = array();
    if (!empty($category) && $category != 'all') {
        $tax_query[] = array(
            'taxonomy' => 'your_taxonomy_here',
            'field' => 'slug',
            'terms' => $category,
        );
    }

    $args = array(
        'post_type' => !empty($postType) && $postType != 'all' ? array($postType) : array('post', 'product', 'city', 'excursions-type'),
        's' => $query,
        'posts_per_page' => 20,
    );

    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    $search_results = new WP_Query($args);




    $unique_post_type_slugs = [];
    $total_posts = $search_results->found_posts;
    echo '<script>document.getElementById("search_count").innerText = ' . $total_posts . ';</script>';
    if ($total_posts > 0) {
        echo '<script>document.querySelector(".search__title-find").style.display = "block"; document.querySelector(".search__title-empty").style.display = "none"</script>';
    } else {
        echo '<script>document.querySelector(".search__title-find").style.display = "none"; document.querySelector(".search__title-empty").style.display = "block"</script>';
    }
    if ($search_results->have_posts()) :

        echo '<div class="search-result__filter" >';
        echo '<p class="search-result__filter-heading">';
        pll_e('ФИЛЬТРЫ');
        echo '</p>';
        echo '<span class="search-result__tab search-result__tab--selected" data-category="all" data-post="all">'; ?>
        <?php pll_e('Все результаты') ?>
        <?php echo '</span>';
        while ($search_results->have_posts()) :
            $search_results->the_post();


            $post_type_slug = get_post_type();


            if (!empty($post_type_slug)) {
                $unique_post_type_slugs[] = $post_type_slug;
            }
        ?>

            <?php endwhile;

        $unique_post_type_slugs = array_unique($unique_post_type_slugs);
        $unique_post_type_slugs_string = join(', ', $unique_post_type_slugs);


        if (!empty($unique_post_type_slugs_string)) :
            $unique_post_type_slugs_array = explode(', ', $unique_post_type_slugs_string);
            foreach ($unique_post_type_slugs_array as $unique_post_type_slug) :
                $post_type_object = get_post_type_object($unique_post_type_slug); // Получаем 
                if ($post_type_object) : ?>
                    <span class="search-result__tab" data-post="<?= esc_attr($unique_post_type_slug); ?>">

                        <?php
                        if ($post_type_object->labels->singular_name == 'Product') {
                            pll_e('Экскурсии');
                        }

                        if ($post_type_object->labels->singular_name == 'Post') {
                            pll_e('Блог');
                        }

                        ?>
                    </span>
        <?php endif;
            endforeach;
        endif; ?>
        </div>

        <?php endif;

    echo '<div class="search-result__result" >';
    if ($search_results->have_posts()) :
        while ($search_results->have_posts()) :
            $search_results->the_post();

            $post_type_slug = get_post_type();
        ?>

            <a href="<?= get_permalink() ?>" class="search-result__item" data-post="<?= esc_attr($post_type_slug); ?>">
                <div class="search-result__image">
                    <?php if (get_the_post_thumbnail_url()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                    <?php endif ?>
                </div>
                <?php if ($post_type_slug) : ?>
                    <div class="search-result__info">
                        <div class="search-result__top">
                            <div class="search-result__tag">
                                <?php $post_type_obj = get_post_type_object($post_type_slug);

                                if ($post_type_obj) {

                                    if ($post_type_obj->labels->singular_name == 'Post') {
                                        pll_e('Блог');
                                    }
                                    if ($post_type_obj->labels->singular_name == 'Product') {
                                        pll_e('Экскурсия');
                                    }
                                } ?>
                            </div>


                            <?php if (get_the_title()) : ?>
                                <h3 class="search-result__title">
                                    <?= get_the_title() ?>
                                </h3>
                            <?php endif ?>

                            <?php if (get_the_excerpt()) : ?>
                                <p class="search-result__excerpt">
                                    <?= get_the_excerpt() ?>
                                </p>
                            <?php endif ?>
                        </div>

                        <div class="search-result__more btn">
                            <span class="btn--top-text"><?php pll_e('Детальніше') ?></span>
                            <span class="btn--bottom-text"><?php pll_e('Детальніше') ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1">
                                </path>
                            </svg>
                        </div>

                    </div>
                <?php endif ?>

            </a>

<?php endwhile;
    endif;
    echo '</div>';
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_nopriv_my_ajax_search_page', 'my_ajax_search_page');
add_action('wp_ajax_my_ajax_search_page', 'my_ajax_search_page');


function my_enqueue_ajax_script_page()
{
    wp_enqueue_script('my-ajax-search-page', get_template_directory_uri() . '/src/js/search-page.js', array('jquery'), '', true);
    wp_localize_script(
        'my-ajax-search-page',
        'myAjaxPage',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('my_ajax_search_nonce'),
        )
    );
}

add_action('wp_enqueue_scripts', 'my_enqueue_ajax_script_page');
