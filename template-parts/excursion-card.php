<?php
$data = get_query_var('custom_data');
$data_id = $data->ID;
$product = wc_get_product($data_id);
$title = $product->get_title() ?? '';
$content = $product->get_description() ?? '';
$excerpt = $product->get_short_description() ?? '';
$image = get_the_post_thumbnail_url($data_id, 'full');
$regular_price = $product->get_regular_price() ?? '';
$excursion_price = $product->get_meta('_excursion_price', true) ?? '';
$currency_symbol = get_woocommerce_currency_symbol();
?>

<a href="<?php echo esc_url($product->get_permalink($data_id)); ?>"
  aria-label="<?php echo esc_attr($product->get_title()); ?>">
  <article class="excursion-card">
    <div class="excursion-card__image">
      <?php if ($image): ?>
        <img src="<?php echo esc_url($image); ?>" alt="<?= $title; ?>">
      <?php else:
        $upload_dir = wp_upload_dir();
        $image_url = $upload_dir['baseurl'] . '/2024/03/woocommerce-placeholder.png';
        ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="дефолтне зображення">
      <?php endif; ?>

      <div class="excursion-card__categories">
        <?php
        $categories = get_the_terms($data_id, 'product_cat');
        if ($categories && !is_wp_error($categories)) {
          foreach ($categories as $category) {
            $translated_category = get_term($category->term_id, 'product_cat');
            if ($translated_category && !is_wp_error($translated_category)) {
              echo '<span class="blog-card__category">' . esc_html($translated_category->name) . '</span>';
            }
          }
        }
        ?>
      </div>
    </div>

    <div class="excursion-card__wrapper">
      <h3 class="section__title excursion-card__title">
        <?= $title; ?>
      </h3>
      <p class="excursion-card__text">
        <?= $excerpt; ?>
      </p>

      <div class="excursion-card__inner">
        <?php
        $btn_text = get_field('excursion_card_btn_text', 'options') ?? '';
        ?>
        <div class="btn">
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
        </div>


        <div class="excursion-card__price">
          <?php if ($regular_price): ?>
            <p>
              <?= $currency_symbol; ?>
              <?= $regular_price; ?>
            </p>
            <?php if ($excursion_price): ?>
              <?= $currency_symbol; ?>
              <span>
                <?= $excursion_price; ?>
              </span>
            <?php endif; ?>
          <?php endif; ?>
        </div>


      </div>

    </div>
  </article>
</a>