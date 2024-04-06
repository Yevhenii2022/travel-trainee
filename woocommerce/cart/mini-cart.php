<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart'); ?>

<?php if (!WC()->cart->is_empty()): ?>

	<div class="sidebar-cart__wrapper">

		<div class="sidebar-cart__head">
			<span class="sidebar-cart__title">
				<?php pll_e('Твоя Корзина'); ?>
			</span>

			<div class="sidebar-cart__close">
			</div>
		</div>

		<ul
			class="sidebar-cart__list woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">

			<script>
				jQuery(document).ready(function ($) {
					$('.sidebar-cart__close').on('click', function () {
						$('.sidebar-cart').removeClass('active');
					});
				});
			</script>

			<?php
			do_action('woocommerce_before_mini_cart_contents');

			foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
				$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
				$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

				if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
					/**
					 * This filter is documented in woocommerce/templates/cart/cart.php.
					 *
					 * @since 2.1.0
					 */
					$product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
					$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
					$product_price = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
					$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
					$excursion_date = $cart_item['excursion_date'];
					$excursion_guest = $cart_item['guests'];
					?>
					<li
						class="sidebar-cart__item woocommerce-mini-cart-item <?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">
						<?php
						echo apply_filters(
							'woocommerce_cart_item_remove_link',
							sprintf(
								'<a href="#" class="sidebar-cart__remove" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
								esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
								esc_attr($product_id),
								esc_attr($cart_item_key),
								esc_attr($_product->get_sku())
							),
							$cart_item_key
						);
						?>

						<?php if (empty($product_permalink)): ?>
							<div class="sidebar-cart__item-wrapper">
								<div class="sidebar-cart__item-img">
									<?php echo $thumbnail ?>
								</div>

								<div class="sidebar-cart__item-name">
									<?php echo wp_kses_post($product_name); ?>
								</div>
							</div>
						<?php else: ?>
							<a class="sidebar-cart__item-wrapper" href="<?php echo esc_url($product_permalink); ?>">
								<div class="sidebar-cart__item-img">
									<?php echo $thumbnail ?>
								</div>

								<div class="sidebar-cart__item-name">
									<?php echo wp_kses_post($product_name); ?>
								</div>
							</a>
						<?php endif; ?>

						<?php echo wc_get_formatted_cart_item_data($cart_item); ?>
						<!-- <?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s &times; %s', $cart_item['quantity'], $product_price) . '</span>', $cart_item, $cart_item_key); ?> -->
						<?= $excursion_date ?>
						<?= $excursion_guest ?>
					</li>
					<?php
				}
			}

			do_action('woocommerce_mini_cart_contents');
			?>
		</ul>

		<div class="sidebar-cart__bottom">
			<p class="sidebar-cart__total woocommerce-mini-cart__total total">
				<?php
				/**
				 * Hook: woocommerce_widget_shopping_cart_total.
				 *
				 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
				 */
				do_action('woocommerce_widget_shopping_cart_total');
				?>
			</p>

			<div class="sidebar-cart__buttons">
				<a href="<?= get_home_url() . '/checkout' ?>" class="sidebar-cart__button btn">
					<?php pll_e("Оформить заказ"); ?>

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
					</svg>
				</a>

				<a href="<?= get_home_url() . '/excursions' ?>" class="sidebar-cart__button btn btn--white">
					<?php pll_e("Продолжить покупки"); ?>

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
					</svg>
				</a>
			</div>
		</div>
	</div>

<?php else: ?>

	<div class="sidebar-cart__wrapper">

		<div class="sidebar-cart__head">
			<span class="sidebar-cart__title">
				<?php pll_e('Твоя Корзина'); ?>
			</span>

			<div class="sidebar-cart__close">
			</div>
		</div>


		<script>
			jQuery(document).ready(function ($) {
				$('.sidebar-cart__close').on('click', function () {
					$('.sidebar-cart').removeClass('active');
				});
			});
		</script>

		<p class="sidebar-cart__error woocommerce-mini-cart__empty-message">
			<?php pll_e('Корзина пустая') ?>
		</p>

		<div class="sidebar-cart__bottom">
			<a href="<?= get_home_url() . '/excursions/' ?>" class="sidebar-cart__button btn">
				<?php pll_e('Найти экскурсию'); ?>

				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
					<path stroke-linecap="round" stroke-linejoin="round"
						d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
				</svg>
			</a>
		</div>
	</div>

<?php endif; ?>

<?php do_action('woocommerce_after_mini_cart'); ?>