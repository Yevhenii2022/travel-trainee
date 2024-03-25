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
          'posts_per_page' => -1,
        );
        $reviews_query = new WP_Query($args);

        if ($reviews_query->have_posts()) :
          while ($reviews_query->have_posts()) : $reviews_query->the_post();
        ?>

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
                  <p class="reviews__time"><?php the_time('d.m.Y'); ?></p>

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

                  echo wp_get_attachment_image($image, "thumbnail", '', ['alt' => 'картинка відгуку']);
                }
                echo '</div>';
              }
              ?>

            </div>

          <?php
          endwhile;
          wp_reset_postdata();
        else :
          ?>
          <h3 class="reviews__nothing"><?php pll_e('Добавить отзыв') ?></h3>
        <?php endif; ?>

      </div>





    </div>
  </div>
</section>