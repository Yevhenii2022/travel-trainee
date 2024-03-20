<?php
$data = get_query_var('custom_data');
$data_id = $data->ID;
$product = wc_get_product($data_id);
$title = $product->get_title() ?? '';
$content = $product->get_description();
$excerpt = $product->get_short_description() ?? '';
$image = get_the_post_thumbnail_url($data_id, 'full');
$regular_price = $product->get_regular_price() ?? '';
$excursion_price = $product->get_meta('_excursion_price', true) ?? '';
$currency_symbol = get_woocommerce_currency_symbol();
?>

<article class="excursion-card">
  <div class="excursion-card__image">
    <img src="<?php echo esc_url($image); ?>" alt="">
  </div>

  <div class="excursion-card__wrapper">
    <h3 class="section__title excursion-card__title"><?= $title; ?></h3>
    <p class="excursion-card__text"><?= $excerpt; ?></p>

    <div class="excursion-card__inner">
      <?php
      $btn_text = get_sub_field('excursions_btn_card') ?? '';
      ?>
      <a class="button" href="<?php echo esc_url($product->get_permalink()); ?>" aria-label="<?php echo esc_attr($product->get_title()); ?>">
        <?= $btn_text ?>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
        </svg>
      </a>

      <div class="excursion-card__price">


        <p><?= $currency_symbol; ?><?= $excursion_price; ?></p>
        <?php if ($regular_price) : ?>
          <?= $currency_symbol; ?>
          <span><?= $regular_price; ?></span>
        <?php endif; ?>
      </div>
    </div>

  </div>
</article>