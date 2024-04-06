<section class="excursions">
  <div class="excursions__wrapper">

    <div class="container">
      <?php
      $subtitle = get_sub_field('excursions_subtitle');
      ?>
      <?php if ($subtitle) : ?>
        <p class="excursions__subtitle"><?= $subtitle; ?></p>
      <?php endif; ?>

      <?php
      $title = get_sub_field('excursions_title');
      ?>
      <?php if ($title) : ?>
        <h2 class="excursions__title section__title"><?= $title; ?></h2>
      <?php endif; ?>
    </div>

    <div class="excursions__inner">
      <div class="excursions__slider swiper">
        <div class="swiper-wrapper">

          <?php $excursions_list = get_sub_field('excursions_list');
          foreach ($excursions_list as $excursion) {
          ?>
            <div class="swiper-slide">
              <?php $excursion_element = $excursion['excursions_product'];
              if ($excursion_element instanceof WP_Post) {
                set_query_var('custom_data', $excursion_element);

                get_template_part('template-parts/excursion-card');
              } ?>
            </div>
          <?php } ?>

        </div>
        <div class="excursions__box">
          <div class="swiper__nav--prev"></div>
          <div class="swiper__pagination"></div>
          <div class="swiper__nav--next"></div>
        </div>
      </div>
    </div>

    <?php
    $btn_text = get_sub_field('excursions_btn_text') ?? '';
    ?>
    <a class="btn excursions__button" href="<?php the_permalink(58); ?>" aria-label="посилання на сторінку екскурсії">
      <span class="btn--top-text"><?= $btn_text ?></span>
      <span class="btn--bottom-text"><?= $btn_text ?></span>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
      </svg>
    </a>

  </div>
</section>