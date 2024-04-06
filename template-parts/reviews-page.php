<section class="reviews">
  <div class="container">
    <div class="reviews__wrapper">
      <?php
      $title = get_sub_field('reviews_title');
      ?>
      <?php if ($title) : ?>
        <h2 class="reviews__title section__title"><?= $title; ?></h2>
      <?php endif; ?>

      <div class="reviews__count">
        <?php
        $count_text = get_sub_field('reviews_count') ?? '';
        $reviews_count = wp_count_posts('reviews');
        echo '(' . $reviews_count->publish . ')';
        ?>
        <p><?= $count_text ?></p>
      </div>

      <div class="reviews__inner">
        <?php
        $args = array(
          'post_type' => 'reviews',
          'posts_per_page' => 6,
        );
        $reviews_query = new WP_Query($args);

        if ($reviews_query->have_posts()) :
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
            while ($reviews_query->have_posts() && $count < $half_post_count) :
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
                    <h4><?php the_title(); ?></h4>

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

                    <?php $rating = get_field('reviews_rating'); ?>
                    <p class="reviews__rating">Рейтинг: <?= $rating; ?></p>
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
            while ($reviews_query->have_posts()) :
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
                    <h4><?php the_title(); ?></h4>

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

                    <?php $rating = get_field('reviews_rating'); ?>
                    <p class="reviews__rating">Рейтинг: <?= $rating; ?></p>
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
        else :
        ?>
          <h3 class="reviews__nothing"><?php pll_e('Добавить отзыв') ?></h3>
        <?php endif; ?>
      </div>


      <?php
      $posts_per_page = 6;
      $total_pages = $reviews_query->max_num_pages;
      $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $pagination_args = array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text' => '<span class="prev-arrow"></span>',
        'next_text' => '<span class="next-arrow"></span>',
      );
      echo '<div class="pagination">';
      echo paginate_links($pagination_args);
      echo '</div>';

      wp_reset_postdata();
      ?>

    </div>

  </div>

  <div class="reviews__bottom">

    <div class="reviews__image">
      <?php
      $image = get_sub_field('reviews_image');
      if ($image) {
        echo wp_get_attachment_image($image, "full", '', ['alt' => 'картинка секції замовити консультацію']);
      }
      ?>
    </div>

    <?php
    $title = get_field('reviews_form_title', 'options') ?? '';
    $subtitle = get_field('reviews_form_subtitle', 'options') ?? '';
    ?>
    <div class="reviews__form-wrap">

      <div>
        <h3 class="section__title"><?= $title ?></h3>
        <h4><?= $subtitle ?></h4>
      </div>

      <?php get_template_part('template-parts/reviews-form'); ?>

    </div>



  </div>





  <!-- <?php if ($rating) : ?>
    <div class="reviews__item-rating">
      <span>
        <?php echo $rating . "/5" ?>
      </span>

      <div class="reviews__item-stars">
        <meter class="reviews__item-avarage" min="0" max="5" value="<?php echo $rating ?>" title="<?php echo $rating ?> out of 5 stars">
          <?php echo $rating ?> out of 5
        </meter>

        <div class="reviews__item-star" style="--percent: calc(<?php echo $rating ?>/ 5 * 100%);">
          ★★★★★
        </div>
      </div>
    </div>
  <?php endif ?> -->




  <!-- <div class="review-modal__right">
    <p>
      <?= $review_modal_text_2 ?>
    </p>

    <div class="review-modal__rate"> -->
  <!-- <div class="review-modal__rate-img">
        <img src="<?= get_template_directory_uri() . '/src/img/google.svg' ?>" alt="<?= $review_modal_title ?>">
      </div> -->
  <!-- 
      <div class="review-modal__rate-number">
        <?= $review_modal_rate ?>
      </div>

      <?php
      if (!function_exists('convert_to_percentage')) {
        function convert_to_percentage($rating)
        {
          if ($rating < 0 || $rating > 5) {
            return "Ошибка: Недопустимое значение оценки!";
          }

          $percentage = $rating * 20 + 1;

          return $percentage . "%";
        }
      }
      ?>

      <div class="review-modal__rate-stars">
        <span class="score">
          <div class="score-wrap">
            <span class="stars-active" style="width:<?= convert_to_percentage($review_modal_rate); ?>">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </span>
            <span class="stars-inactive">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </span>
          </div>
        </span>
      </div>

      <div class="review-modal__rate-ammount">
        <?= $review_modal_ammount ?>
      </div>
    </div>

    <div class="review-modal__img">
      <img src="<?= $review_modal_img ?>" alt="<?= $review_modal_title ?>">
    </div>
  </div> -->




</section>