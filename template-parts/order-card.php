<?php
$product_id = get_the_ID();
$product = wc_get_product($product_id);
$regular_price = $product->get_regular_price() ?? '';
$excursion_price = $product->get_meta('_excursion_price', true) ?? '';
$currency_symbol = get_woocommerce_currency_symbol();
?>

<div class="order-card">
    <?php
    $excursion_price = get_post_meta(get_the_ID(), '_excursion_price', true);
    if ($regular_price) {
        echo '<div class="excursion-card__price">';
        echo '<p>' . wc_price($regular_price) . '</p>';
        if ($excursion_price) {
            echo '<p class="excursion-card__price-old">' . $currency_symbol . $excursion_price . '</p>';
        }
        echo '</div>';
    }
    ?>

    <?php
    $excursion_dates = get_post_meta(get_the_ID(), '_excursion_dates', true);
    $excursion_dates_array = explode(',', $excursion_dates);
    ?>

    <form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
        <?php
        do_action('woocommerce_before_add_to_cart_button');
        ?>

        <div class="order-card__inputs">
            <!-- Дата пикер -->
            <div class="order-card__input-date">
                <input type="text" id="excursion_date" name="excursion_date" readonly required placeholder="<?php pll_e('Дата') ?>">
            </div>

            <!-- Поле выбора количества людей -->
            <div class="order-card__input-people">
                <input type="hidden" name="guests" value="1" id="quantity_hidden">

                <div class="custom-select">
                    <select id="guests">
                        <?php
                        // Генерируем опции для количества людей от 1 до 5
                        for ($i = 1; $i <= 5; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Скрытое поле с количеством продукта -->
        <input type="hidden" name="quantity" value="1">

        <!-- Кнопка "Добавить в корзину" -->
        <button type="submit" name="add-to-cart" value="<?php echo esc_attr(get_the_ID()); ?>" class="btn btn--cart">
            <span class="btn--top-text"><?php pll_e('Заказать тур'); ?></span>
            <span class="btn--bottom-text"><?php pll_e('Заказать тур'); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
            </svg>
        </button>

        <?php
        // Добавляем дополнительные поля, если они есть
        do_action('woocommerce_after_add_to_cart_button');
        ?>
    </form>

    <script>
        jQuery(document).ready(function($) {
            $('#excursion_date').multiDatesPicker({
                dateFormat: 'dd.mm.yy', // Формат даты
                minDate: new Date(), // Минимальная дата
                // addDisabledDates: <?php echo json_encode(array_map('trim', $excursion_dates_array)); ?>,
                onSelect: function(dateText, inst) {
                    console.log(dateText)
                    // При выборе даты закрываем датапикер
                    $(this).datepicker('hide');
                    $('#excursion_date').val(dateText);
                }
            });
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            // Обработчик отправки формы
            $('form.cart').submit(function(e) {
                // Проверяем, выбрана ли дата экскурсии
                if ($('#excursion_date').val() == '') {
                    // Если дата не выбрана, отменяем отправку формы
                    e.preventDefault();
                    // Активируем поле выбора даты экскурсии
                    $('#excursion_date').focus();
                    // Выводим сообщение об ошибке или выполните другие необходимые действия
                }
            });
        });
        jQuery(document).ready(function($) {
            $('#guests').on('change', function() {
                $('#quantity_hidden').val($(this).val());
            });
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            // Функция для загрузки содержимого корзины
            function loadCartContents() {
                $.ajax({
                    url: wc_add_to_cart_params.ajax_url,
                    method: 'POST',
                    data: {
                        action: 'load_cart_contents'
                    },
                    success: function(response) {
                        $('#sidebar-cart').html(response);
                        $('#sidebar-cart').addClass('active');
                    }
                });
            }

            // Пример обработчика для кнопки открытия корзины
            $('.header__basket').on('click', function(e) {
                e.preventDefault();
                loadCartContents();
            });

            // Добавьте обработчик для закрытия корзины, если необходимо

            $('form.cart').on('submit', function(e) {
                if ($('#excursion_date').val() == '') {
                    // Если дата не выбрана, отменяем отправку формы
                    e.preventDefault();
                    // Активируем поле выбора даты экскурсии
                    $('#excursion_date').focus();
                    // Выводим сообщение об ошибке или выполните другие необходимые действия
                    // alert('Please select an excursion date.');
                    return;
                }
                e.preventDefault();

                var form = $(this);
                var product_id = form.find('button[name="add-to-cart"]').val();
                var quantity = form.find('input[name="quantity"]').val();
                var excursion_date = form.find('#excursion_date').val();
                var guests = form.find('#guests').val();

                $.ajax({
                    type: 'post',
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        action: 'custom_add_to_cart',
                        product_id: product_id,
                        quantity: quantity,
                        excursion_date: excursion_date,
                        guests: guests
                    },
                    beforeSend: function(response) {
                        // Можно добавить индикатор загрузки
                    },
                    complete: function(response) {
                        // Убрать индикатор загрузки
                    },
                    success: function(response) {
                        if (response.error & !response.cart_hash) {
                            alert(response.error);
                            return;
                        } else {
                            // Обновить фрагмент корзины, если это необходимо
                            loadCartContents();
                            $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, form]);
                        }
                    }
                });
            });

            jQuery(document).ready(function($) {
                $(document).on('click', '.sidebar-cart__remove', function(e) {
                    e.preventDefault();
                    console.log('click');
                    var product_id = $(this).data('product_id');
                    var cart_item_key = $(this).data('cart_item_key');

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        data: {
                            action: 'remove_cart_item',
                            product_id: product_id,
                            cart_item_key: cart_item_key,
                        },
                        success: function(response) {
                            // Обновляем мини-корзину
                            $('.sidebar-cart__wrapper').html(response.fragment);
                            // Обновляем итоговую сумму
                            $('.sidebar-cart__total').html(response.cart_total);
                            loadCartContents();
                        },
                    });
                });
            });
        });
    </script>
    <script>

    </script>
</div>