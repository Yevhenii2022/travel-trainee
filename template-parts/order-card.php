<?php
$product_id = get_the_ID();
$product = wc_get_product($product_id);
$regular_price = $product->get_regular_price() ?? '';
$excursion_price = $product->get_meta('_excursion_price', true) ?? '';
$currency_symbol = get_woocommerce_currency_symbol();
?>


<div class="order-card">

  <div>
    <div class="excursion-card__price">
      <p><?= $currency_symbol; ?><?= $excursion_price; ?></p>
      <?php if ($regular_price) : ?>
        <?= $currency_symbol; ?>
        <span><?= $regular_price; ?></span>
      <?php endif; ?>
    </div>

    <div class="order-card__box">

      <input type="date">

      <div class="blog__select blog-select">
        <span>
          <?php pll_e('Сортировать:') ?>
        </span>
        <select id="blogs__select" class="tabs-select">
          <option value="popular">
            <?php pll_e('Популярные'); ?>
          </option>
          <option value="new">
            <?php pll_e('Новые'); ?>
          </option>
          <option value="az">
            <?php pll_e('От А-Я'); ?>
          </option>
        </select>
      </div>


    </div>


  </div>

  <button class="btn">
    <?php pll_e('Заказать тур') ?>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
      <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
    </svg>
  </button>

</div>