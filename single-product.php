<?php

/**
 * The template for displaying all single products
 *
 * @link https://developer.wordpress.org
 *
 * @package pointer_theme
 */

get_header();
?>

<main id="primary">
  <section class="product">
    <div class="container">
      <div class="product__wrapper">

        <a href="<?php echo esc_url(get_home_url() . '/excursions/'); ?>" class="product__link" aria-label="назад до укскурсій">
          <svg viewBox="0 0 11 11" fill="none">
            <path stroke="#202020" stroke-linecap="round" stroke-linejoin="round" d="M5.151 1.863 1.515 5.5m0 0L5.15 9.137M1.515 5.5H10" />
          </svg>
          <p><?php pll_e('Назад к эскурсиям') ?></p>
        </a>

        <h1 class="section__title product__title"><?php the_title(); ?></h1>

        <div class="product__banner">
          <div class="product__image">
            <?php
            $product_id = get_the_ID();
            $image_url = get_the_post_thumbnail_url($product_id, 'full');
            if ($image_url) :
            ?>

              <a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery">
                <img src="<?php echo esc_url($image_url); ?>" alt="зображення продукту">
              </a>;
            <?php
            else :
              $upload_dir = wp_upload_dir();
              $image_url = $upload_dir['baseurl'] . '/2024/03/woocommerce-placeholder.png';
            ?>
              <img src="<?php echo esc_url($image_url); ?>" alt="дефолтне зображення">
            <?php endif; ?>
          </div>

          <?php
          $product_gallery = get_post_meta($product_id, '_product_image_gallery', true);
          if ($product_gallery) {
            $product_gallery = explode(',', $product_gallery);

            if (!empty($product_gallery)) {
              echo '<div class="product__gallery">';

              $gallery_count = count($product_gallery);
              $container_class = '';
              switch ($gallery_count) {
                case 1:
                  $container_class = 'first';
                  break;
                case 2:
                  $container_class = 'second';
                  break;
                case 3:
                  $container_class = 'third';
                  break;
                default:
                  $container_class = 'fourth';
                  break;
              }

              echo '<div class="' . esc_attr($container_class) . '">';

              foreach ($product_gallery as $gallery_image_id) {
                $gallery_image_url = wp_get_attachment_image_url($gallery_image_id, 'full');
                if ($gallery_image_url) {
                  echo '<a href="' . esc_url($gallery_image_url) . '" data-fancybox="gallery">';
                  echo '<img src="' . esc_url($gallery_image_url) . '" alt="Зображення з галереї">';
                  echo '</a>';
                }
              }

              echo '</div>';

              echo '<div class="product__label">';
              echo '<p>' . pll__('Показать все фото') . '</p>';
              echo '<svg viewBox="0 0 10 10" fill="none">';
              echo '<path fill="#202020" d="M1 1h2v2H1zM1 4h2v2H1zM1 7h2v2H1zM4 1h2v2H4zM4 4h2v2H4zM4 7h2v2H4zM7 1h2v2H7zM7 4h2v2H7zM7 7h2v2H7z" />';
              echo '</svg>';
              echo '</div>';

              echo '</div>';
              echo '</div>';
            }
          }
          ?>
        </div>



        <?php if (!empty($product_gallery)) : ?>

          <div class="product__slider-wrap">
            <div class="excursions__slider swiper">
              <div class="swiper-wrapper">



                <?php
                if ($product_gallery) {
                  foreach ($product_gallery as $gallery_image_id) {
                    $gallery_image_url = wp_get_attachment_image_url($gallery_image_id, 'full');
                    if ($gallery_image_url) {
                      echo '<div class="swiper-slide">';
                      echo '<img src="' . esc_url($gallery_image_url) . '" alt="Зображення з галереї">';
                      echo '</div>';
                    }
                  }
                }
                ?>


              </div>

              <div class="swiper__nav--prev"></div>
              <div class="swiper__pagination"></div>
              <div class="swiper__nav--next"></div>

            </div>
          </div>


        <?php else : ?>
          <div class="product__image--hide">
            <div class="product__image">
              <?php
              if ($image_url) :
              ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="зображення продукту">

              <?php endif; ?>
            </div>
          </div>


        <?php endif; ?>



        <div class="product__box">

          <div class="product__content">
            <?php the_content(); ?>
          </div>


          <div class="product__flex">

            <?php get_template_part('template-parts/order-card'); ?>


            <?php
            $title = get_field('form_title', 'options') ?? '';
            $subtitle = get_field('form_subtitle', 'options') ?? '';
            ?>
            <div class="product__form">
              <h3><?= $title ?></h3>
              <p><?= $subtitle ?></p>

              <?php get_template_part('template-parts/form'); ?>

            </div>

          </div>


        </div>

        <h2 class="section__title product__subtitle"><?php pll_e('Подобные экскурсии') ?></h2>

        <ul class="product__inner">
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $posts_per_page = 3;
          $current_product_id = get_the_ID();

          $products = wc_get_products(array(
            'limit' => $posts_per_page,
            'paged' => $paged,
            'orderby' => 'date',
            'order' => 'DESC',
            'post__not_in' => array($current_product_id),
          ));

          if ($products && !empty($products)) {
            foreach ($products as $product) {
              $product_id = $product->get_id();
              $custom_data = (object) array(
                'ID' => $product_id
              );
              set_query_var('custom_data', $custom_data);

              get_template_part('template-parts/excursion-card');
            }
          }
          ?>
        </ul>

      </div>
    </div>
  </section>
</main>

<?php
get_footer();
