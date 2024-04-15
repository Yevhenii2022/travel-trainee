<?php
function my_custom_scripts_reviews()
{
    wp_enqueue_script('my-custom-scripts-reviews', get_template_directory_uri() . '/src/js/load-more-reviews.js', array('jquery'), null, true);
    wp_localize_script('my-custom-scripts-reviews', 'MyAjaxReviews', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'my_custom_scripts_reviews');

function load_more_reviews()
{
    $paged = isset($_POST['page']) ? $_POST['page'] : 1;
    $lang = sanitize_text_field($_POST['lang']);
    $posts_per_page = 6;

    $args = array(
        'post_type' => 'reviews',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $reviews_query = new WP_Query($args);

    if ($reviews_query->have_posts()):
        $post_count = $reviews_query->post_count;
        $half_post_count = ceil($post_count / 2);

        $news_date = get_the_date();
        $date_parts = date_parse($news_date);
        $numeric_month = $date_parts['month'];

        $ukrainian_months = array(
            1 => 'січень',
            2 => 'лютий',
            3 => 'березень',
            4 => 'квітень',
            5 => 'травень',
            6 => 'червень',
            7 => 'липень',
            8 => 'серпень',
            9 => 'вересень',
            10 => 'жовтень',
            11 => 'листопад',
            12 => 'грудень'
        );

        $russian_months = array(
            1 => 'январь',
            2 => 'февраль',
            3 => 'март',
            4 => 'апрель',
            5 => 'май',
            6 => 'июнь',
            7 => 'июль',
            8 => 'август',
            9 => 'сентябрь',
            10 => 'октябрь',
            11 => 'ноябрь',
            12 => 'декабрь'
        );


        ?>

        <div class="reviews__column--first">
            <?php
            $count = 0;
            while ($reviews_query->have_posts() && $count < $half_post_count):
                $reviews_query->the_post(); ?>

                <div class="reviews__card">
                    <div class="reviews__box">

                        <?php $title = get_the_title() ?? ''; ?>
                        <div class="reviews__circle">
                            <?php
                            $words = explode(' ', $title);
                            foreach ($words as $word) {
                                echo mb_substr($word, 0, 1);
                            }
                            ?>
                        </div>

                        <div>
                            <h4>
                                <?php the_title(); ?>
                            </h4>

                            <?php
                            $language = pll_current_language();

                            if ($language === 'uk') {
                                $ukrainian_month = $ukrainian_months[$numeric_month];
                                echo '<p class="reviews__time">' . $ukrainian_month . ' ' . $date_parts['year'] . '</p>';
                            } elseif ($language === 'ru') {
                                $russian_month = $russian_months[$numeric_month];
                                echo '<p class="reviews__time">' . $russian_month . ' ' . $date_parts['year'] . '</p>';
                            }
                            ?>

                            <?php
                            $rating = get_field('reviews_rating');
                            $filled_stars = min(5, max(0, (int) $rating));

                            if ($rating): ?>
                                <div class="reviews__rating">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <div class="reviews__icon<?= ($i <= $filled_stars) ? '1' : '2'; ?>">
                                            <svg viewBox="0 0 25 25" fill="none">
                                                <g clip-path="url(#a)">
                                                    <path fill="<?= ($i <= $filled_stars) ? '#FFE24C' : '#EAF2F5'; ?>"
                                                        d="m12.5 1.087 3.387 7.294 7.984.968-5.89 5.475 1.546 7.893-7.028-3.91-7.027 3.91 1.547-7.893-5.89-5.475 7.983-.968L12.5 1.087Z" />
                                                </g>
                                                <defs>
                                                    <clipPath id="a">
                                                        <path fill="#fff" d="M0 0h25v25H0z" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            <?php else: ?>
                                <div class="reviews__rating">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <div class="reviews__icon2">
                                            <svg viewBox="0 0 25 25" fill="none">
                                                <g clip-path="url(#a)">
                                                    <path fill="#EAF2F5"
                                                        d="m12.5 1.087 3.387 7.294 7.984.968-5.89 5.475 1.546 7.893-7.028-3.91-7.027 3.91 1.547-7.893-5.89-5.475 7.983-.968L12.5 1.087Z" />
                                                </g>
                                                <defs>
                                                    <clipPath id="a">
                                                        <path fill="#fff" d="M0 0h25v25H0z" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="reviews__content">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    $images = get_field('reviews_gallery');
                    if ($images) {
                        echo '<div class="reviews__gallery">';
                        foreach ($images as $image) {
                            $image_url = wp_get_attachment_url($image);
                            echo '<a href="' . esc_url($image_url) . '" data-fancybox="gallery">';
                            echo wp_get_attachment_image($image, "thumbnail", '', ['alt' => 'картинка відгуку']);
                            echo '</a>';
                        }
                        echo '</div>';
                    }
                    ?>

                </div>
                <?php
                $count++;
            endwhile;
            ?>
        </div>

        <div class="reviews__column--second">
            <?php
            while ($reviews_query->have_posts()):
                $reviews_query->the_post(); ?>

                <div class="reviews__card">
                    <div class="reviews__box">

                        <?php $title = get_the_title() ?? ''; ?>
                        <div class="reviews__circle">
                            <?php
                            $words = explode(' ', $title);
                            foreach ($words as $word) {
                                echo mb_substr($word, 0, 1);
                            }
                            ?>
                        </div>

                        <div>
                            <h4>
                                <?php the_title(); ?>
                            </h4>

                            <?php
                            $language = pll_current_language();

                            if ($language === 'uk') {
                                $ukrainian_month = $ukrainian_months[$numeric_month];
                                echo '<p class="reviews__time">' . $ukrainian_month . ' ' . $date_parts['year'] . '</p>';
                            } elseif ($language === 'ru') {
                                $russian_month = $russian_months[$numeric_month];
                                echo '<p class="reviews__time">' . $russian_month . ' ' . $date_parts['year'] . '</p>';
                            }
                            ?>

                            <?php
                            $rating = get_field('reviews_rating');
                            $filled_stars = min(5, max(0, (int) $rating));

                            if ($rating): ?>
                                <div class="reviews__rating">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <div class="reviews__icon<?= ($i <= $filled_stars) ? '1' : '2'; ?>">
                                            <svg viewBox="0 0 25 25" fill="none">
                                                <g clip-path="url(#a)">
                                                    <path fill="<?= ($i <= $filled_stars) ? '#FFE24C' : '#EAF2F5'; ?>"
                                                        d="m12.5 1.087 3.387 7.294 7.984.968-5.89 5.475 1.546 7.893-7.028-3.91-7.027 3.91 1.547-7.893-5.89-5.475 7.983-.968L12.5 1.087Z" />
                                                </g>
                                                <defs>
                                                    <clipPath id="a">
                                                        <path fill="#fff" d="M0 0h25v25H0z" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            <?php else: ?>
                                <div class="reviews__rating">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <div class="reviews__icon2">
                                            <svg viewBox="0 0 25 25" fill="none">
                                                <g clip-path="url(#a)">
                                                    <path fill="#EAF2F5"
                                                        d="m12.5 1.087 3.387 7.294 7.984.968-5.89 5.475 1.546 7.893-7.028-3.91-7.027 3.91 1.547-7.893-5.89-5.475 7.983-.968L12.5 1.087Z" />
                                                </g>
                                                <defs>
                                                    <clipPath id="a">
                                                        <path fill="#fff" d="M0 0h25v25H0z" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="reviews__content">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    $images = get_field('reviews_gallery');
                    if ($images) {
                        echo '<div class="reviews__gallery">';
                        foreach ($images as $image) {
                            $image_url = wp_get_attachment_url($image);
                            echo '<a href="' . esc_url($image_url) . '" data-fancybox="gallery">';
                            echo wp_get_attachment_image($image, "thumbnail", '', ['alt' => 'картинка відгуку']);
                            echo '</a>';
                        }
                        echo '</div>';
                    }
                    ?>

                </div>
                <?php
            endwhile;
            ?>
        </div>

        <?php
        wp_reset_postdata();
    else:
        ?>
        <h3 class="reviews__nothing">
            <?php pll_e('Добавить отзыв') ?>
        </h3>
    <?php endif;


    $total_posts = $reviews_query->found_posts;
    echo '<script>document.getElementById("reviews_count-total").innerText = ' . $total_posts . ';</script>';
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



add_action('wp_ajax_load_more_reviews', 'load_more_reviews');
add_action('wp_ajax_nopriv_load_more_reviews', 'load_more_reviews');
