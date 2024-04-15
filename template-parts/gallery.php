<section class="gallery">
  <div class="gallery__wrapper">

    <div class="container">
      <div class="gallery__inner">
        <?php
        $title = get_sub_field('gallery_title');
        ?>
        <?php if ($title) : ?>
          <h2 class="gallery__title section__title"><?= $title; ?></h2>
        <?php endif; ?>

        <?php
        $btn_text = get_sub_field('gallery_btn_text') ?? '';
        ?>
        <a class="btn btn--hidden" href="<?php the_permalink(60); ?>" aria-label="посилання на сторінку галерея">
        <div class="btn__text">
        <span>
          <?= $btn_text ?>
        </span>
        <span>
          <?= $btn_text ?>
        </span>
      </div>
          
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
          </svg>
        </a>
      </div>
    </div>

    <div class="gallery__slider swiper">
      <div class="swiper-wrapper">
        <?php
        $images = get_sub_field('gallery_list');
        if ($images) {
          foreach ($images as $image) {
            $image_url = wp_get_attachment_url($image);
            echo '<a class="swiper-slide" href="' . esc_url($image_url) . '" data-fancybox="gallery">';
            echo wp_get_attachment_image($image, "full", '', ['alt' => 'картинка галереї']);
            echo '</a>';
          }
        }
        ?>
      </div>
    </div>

    <?php
    $btn_text = get_sub_field('gallery_btn_text') ?? '';
    ?>
    <div class="gallery__box">
      <a class="btn btn--visible" href="<?php the_permalink(60); ?>" aria-label="посилання на сторінку галерея">
      <div class="btn__text">
        <span>
          <?= $btn_text ?>
        </span>
        <span>
          <?= $btn_text ?>
        </span>
      </div>
        
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
        </svg>
      </a>
    </div>

  </div>
</section>