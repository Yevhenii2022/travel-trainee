<?php
/*
Template Name: Галерея
*/

get_header();
?>
<main>
  <section class="gallery-page">
    <div class="gallery-page__wrapper">

      <div class="container">

        <?php
        $title = get_field('gallery_title');
        ?>
        <?php if ($title) : ?>
          <h2 class="gallery-page__title section__title"><?= $title; ?></h2>
        <?php endif; ?>




        <div class="swiper gallery-page__slider2">
          <div class="swiper-wrapper">
            <?php
            $images = get_field('gallery_list');
            if ($images) {
              foreach ($images as $image) {
                echo '<div class="swiper-slide">';
                echo wp_get_attachment_image($image, "full", '', ['alt' => 'картинка галереї']);
                echo '</div>';
              }
            }
            ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination">5/9</div>
        </div>

      </div>



      <div thumbsSlider="" class="swiper gallery-page__slider">
        <div class="swiper-wrapper">
          <?php
          $images = get_field('gallery_list');
          if ($images) {
            foreach ($images as $image) {
              echo '<div class="swiper-slide">';
              echo wp_get_attachment_image($image, "full", '', ['alt' => 'картинка галереї']);
              echo '</div>';
            }
          }
          ?>
        </div>
      </div>




    </div>
  </section>
</main>
<?php get_footer(); ?>