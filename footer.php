<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pointer_theme
 */

?>
<div id="sidebar-cart" class="sidebar-cart">
</div>

<footer class="footer">

    <div class="container">
        <div class="footer__wrapper">

            <div class="footer__inner">
                <?= the_custom_logo(); ?>

                <?php wp_nav_menu([
                    'theme_location' => 'footer_menu',
                    'container' => false,
                    'menu_class' => 'footer__list',
                    'menu_id' => false,
                    'echo' => true,
                ]);
                ?>
            </div>

            <div class="footer__box">
                <div class="footer__socials">
                    <?php
                    $instagram = get_field('instagram', 'options');
                    $link = $instagram['instagram_link'] ?? '';
                    $icon = $instagram['instagram_icon'];
                    $file_path = get_attached_file($icon);
                    $svg_content = file_get_contents($file_path);
                    ?>
                    <?php if ($instagram): ?>
                        <a href="<?= $link; ?>" class="footer__icon" target="_blank">
                            <?php if ($svg_content !== false) {
                                echo $svg_content;
                            } ?>
                        </a>
                    <?php endif; ?>

                    <?php
                    $facebook = get_field('facebook', 'options');
                    $link = $facebook['facebook_link'] ?? '';
                    $icon = $facebook['facebook_icon'];
                    $file_path = get_attached_file($icon);
                    $svg_content = file_get_contents($file_path);
                    ?>
                    <?php if ($facebook): ?>
                        <a href="<?= $link; ?>" class="footer__icon" target="_blank">
                            <?php if ($svg_content !== false) {
                                echo $svg_content;
                            } ?>
                        </a>
                    <?php endif; ?>

                    <?php
                    $whatsapp = get_field('whatsapp', 'options');
                    $number = $whatsapp['whatsapp_link'] ?? '';
                    $cleanedNumber = preg_replace('/\s+/', '', $number);
                    $cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
                    $icon = $whatsapp['whatsapp_icon'];
                    $file_path = get_attached_file($icon);
                    $svg_content = file_get_contents($file_path);
                    ?>
                    <?php if ($whatsapp): ?>
                        <a href="https://wa.me/+<?php echo $cleanedNumber ?>" class="footer__icon" target="_blank">
                            <?php if ($svg_content !== false) {
                                echo $svg_content;
                            } ?>
                        </a>
                    <?php endif; ?>

                    <?php
                    $telegram = get_field('telegram', 'options');
                    $number = $telegram['telegram_link'] ?? '';
                    $cleanedNumber = preg_replace('/\s+/', '', $number);
                    $cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
                    $icon = $telegram['telegram_icon'];
                    $file_path = get_attached_file($icon);
                    $svg_content = file_get_contents($file_path);
                    ?>
                    <?php if ($telegram): ?>
                        <a href="https://t.me/+<?php echo $cleanedNumber ?>" class="footer__icon" target="_blank">
                            <?php if ($svg_content !== false) {
                                echo $svg_content;
                            } ?>
                        </a>
                    <?php endif; ?>

                    <?php
                    $viber = get_field('viber', 'options');
                    $number = $viber['viber_link'] ?? '';
                    $cleanedNumber = preg_replace('/\s+/', '', $number);
                    $cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
                    $icon = $viber['viber_icon'];
                    $file_path = get_attached_file($icon);
                    $svg_content = file_get_contents($file_path);
                    ?>
                    <?php if ($viber): ?>
                        <a href="viber://chat?number=+<?php echo $cleanedNumber ?>" class="footer__icon" target="_blank">
                            <?php if ($svg_content !== false) {
                                echo $svg_content;
                            } ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="footer__contacts">
                    <?php
                    $email = get_field('email', 'options') ?? '';
                    ?>
                    <?php if ($email): ?>
                        <a href="mailto:<?php echo $email ?>">
                            <?php echo $email; ?>
                        </a>
                    <?php endif; ?>

                    <?php
                    $tel = get_field('tel', 'options');
                    $number = $tel['tel_number'] ?? '';
                    $cleanedNumber = preg_replace('/\s+/', '', $number);
                    $cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
                    ?>
                    <?php if ($number): ?>
                        <a href="tel:+<?php echo $cleanedNumber ?>">
                            <?php echo $number; ?>
                        </a>
                    <?php endif; ?>

                    <?php
                    $copyright = get_field('copyright', 'options') ?? '';
                    ?>
                    <p>&copy; holland travel
                        <?php echo date("Y"); ?>
                    </p>
                    <!-- <p><?= $copyright; ?></p> -->
                </div>
            </div>

        </div>
    </div>

    <script>
        jQuery(function ($) {
            // Функция для загрузки содержимого корзины
            function loadCartContents() {
                $.ajax({
                    url: wc_add_to_cart_params.ajax_url,
                    method: 'POST',
                    data: {
                        action: 'load_cart_contents'
                    },
                    success: function (response) {
                        $('#sidebar-cart').html(response);
                        $('#sidebar-cart').addClass('active');

                    }
                });
            }

            // Пример обработчика для кнопки открытия корзины
            $('.header__basket').on('click', function (e) {
                e.preventDefault();
                loadCartContents();
            });
        });
    </script>


</footer>

</div>
<?php wp_footer(); ?>
</body>


</html>