<?php

/**
 * pointer_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pointer_theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pointer_theme_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pointer_theme, use a find and replace
	 * to change 'pointer_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('pointer_theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'pointer_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'pointer_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pointer_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('pointer_theme_content_width', 640);
}
add_action('after_setup_theme', 'pointer_theme_content_width', 0);


/**
 * Enqueue scripts and styles.
 */
function pointer_theme_scripts()
{
	//Libraries
	wp_enqueue_script('pointer_theme-swiper-scripts', get_template_directory_uri() . '/src/js/libraries/swiper-bundle.min.js', array('jquery'), true);
	wp_enqueue_style('pointer_theme-swiper-styles', get_template_directory_uri() . '/src/css/swiper-bundle.min.css', array(), _S_VERSION);


	wp_enqueue_style('pointer_theme-reset', get_template_directory_uri() . '/src/css/reset.css', array(), _S_VERSION);
	wp_enqueue_style('pointer_theme-style', get_stylesheet_uri(), array(), _S_VERSION);

	wp_enqueue_script('pointer_theme-scripts', get_template_directory_uri() . '/assets/scripts.js', array('jquery'), true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'pointer_theme_scripts');

/**
 * Remove inline WP styles
 */
require get_template_directory() . '/inc/remove-wp-styles.php';

/**
 * Remove empty <p> in editor
 */
require get_template_directory() . '/inc/remove-p.php';

/**
 * Remove uncategorized from sitemap.xml
 */
require get_template_directory() . '/inc/remove-uncategorized-from-sitemap.php';

/**
 * Enable upload .webp, .svg.
 */
require get_template_directory() . '/inc/mime-load.php';

/**
 * Add custom logo in wp-admin
 */
require get_template_directory() . '/inc/wp-admin-logo.php';

/**
 * Transliteration
 */
require get_template_directory() . '/inc/transliteration.php';

/**
 * ACF options
 */
require get_template_directory() . '/inc/acf-options.php';

/**
 * Register Menus
 */
require get_template_directory() . '/inc/menu-registration.php';

/**
 * Register Custom Post Type and Taxonomy
 */
require get_template_directory() . '/inc/custom-post-type.php';

/**
 * Register string traslation Polylang (uncomment if you use Polylang)
 */
require get_template_directory() . '/inc/translates-registration.php';

//WOOCOMMERCE
class WC_Product_Excursion extends WC_Product_Simple
{
	// Возвращает тип продукта
	public function get_type()
	{
		return 'excursion';
	}

	// Показывает даты экскурсий
	public function get_excursion_dates()
	{
		return $this->get_meta('_excursion_dates', true);
	}

	public function is_virtual()
	{
		return true;
	}
}

// Добавление типа продукта "экскурсия" в выпадающий список
function add_type_to_dropdown($types)
{
	// Очищаем массив типов продуктов
	$types = array();
	// Добавляем только тип "Экскурсия"
	$types['excursion'] = __('Excursion', 'vicodemedia');
	return $types;
}
add_filter('product_type_selector', 'add_type_to_dropdown');

// Добавление поля для указания цены экскурсии и дат экскурсии
function add_excursion_fields()
{
	global $product_object;
?>
	<div class='options_group show_if_excursion'>
		<?php
		// Задаем значение дат в виде массива для MultiDatesPicker
		$excursion_dates = $product_object->get_meta('_excursion_dates', true);
		$excursion_dates_array = explode(',', $excursion_dates);

		// Вывод поля для дат экскурсии
		woocommerce_wp_text_input(
			array(
				'id' => '_excursion_dates',
				'label' => __('Disabled Dates', 'vicodemedia'),
				'value' => $excursion_dates,
				'default' => '',
				'placeholder' => 'Enter Disabled Dates',
				'type' => 'text', // Изменено на тип text
				'desc_tip' => true, // Добавляем подсказку в виде тултипа
				'description' => __('Выберите даты в которые экскурсия будет не доступна', 'vicodemedia'), // Текст подсказки
			)
		);


		// Вывод поля для базовой цены
		woocommerce_wp_text_input(
			array(
				'id' => '_regular_price',
				'label' => __('Regular Price', 'vicodemedia'),
				'value' => $product_object->get_regular_price(), // Получение цены до дисконта
				'placeholder' => 'Введіть ціну до знижки (якщо потрібно)',
				'data_type' => 'price',
			)
		);

		// Вывод поля для цены экскурсии
		woocommerce_wp_text_input(
			array(
				'id' => '_excursion_price',
				'label' => __('Excursion Price', 'vicodemedia'),
				'value' => $product_object->get_meta('_excursion_price', true),
				'default' => '',
				'placeholder' => 'Введіть кінцеву ціну продажу',
				'data_type' => 'price',
			)
		);
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('#_excursion_dates').multiDatesPicker({
					dateFormat: "dd-mm-yy",
					minDate: new Date(),
				});
			});
		</script>
	</div>
<?php
}
add_action('woocommerce_product_options_general_product_data', 'add_excursion_fields');

// Сохранение дат экскурсий и цены экскурсии
function save_excursion_data($post_id)
{
	$dates = isset($_POST['_excursion_dates']) ? sanitize_text_field($_POST['_excursion_dates']) : '';
	$price = isset($_POST['_excursion_price']) ? sanitize_text_field($_POST['_excursion_price']) : '';

	update_post_meta($post_id, '_excursion_dates', $dates);
	update_post_meta($post_id, '_excursion_price', $price);

	// Сохранение базовой цены
	$regular_price = isset($_POST['_regular_price']) ? sanitize_text_field($_POST['_regular_price']) : '';
	update_post_meta($post_id, '_regular_price', $regular_price);
}
add_action('woocommerce_process_product_meta_excursion', 'save_excursion_data');

// Добавление даты экскурсии в метаданные товара при добавлении в корзину
function add_excursion_date_to_cart_item_data($cart_item_data, $product_id, $variation_id)
{
	if (isset($_POST['excursion_date'])) {
		$cart_item_data['excursion_date'] = sanitize_text_field($_POST['excursion_date']);
	}
	if (isset($_POST['guests'])) {
		$cart_item_data['guests'] = sanitize_text_field($_POST['guests']);
	}
	return $cart_item_data;
}
add_filter('woocommerce_add_cart_item_data', 'add_excursion_date_to_cart_item_data', 10, 3);

// Добавляем данные в линию ордера
function add_excursion_date_and_guests_to_order_line_item($item, $cart_item_key, $values, $order)
{
	// Получаем дату экскурсии из корзины
	$excursion_date = isset($values['excursion_date']) ? $values['excursion_date'] : '';

	// Получаем количество гостей из корзины
	$guests = isset($values['guests']) ? $values['guests'] : '1';

	// Добавляем дату экскурсии в линию ордера
	if ($excursion_date) {
		$excursion_date_label = __('Дата экскурсии', 'vicodemedia'); // Перевод текста "Дата экскурсии"
		$item->add_meta_data($excursion_date_label, $excursion_date);
	}

	// Добавляем количество гостей в линию ордера
	if ($guests) {
		$guests_label = __('Количество гостей', 'vicodemedia'); // Перевод текста "Количество гостей"
		$item->add_meta_data($guests_label, $guests);
	}

	// Возвращаем объект линии ордера с добавленными данными
	return $item;
}
add_action('woocommerce_checkout_create_order_line_item', 'add_excursion_date_and_guests_to_order_line_item', 10, 4);

add_filter('woocommerce_product_tabs', 'remove_tabs', 98);
function remove_tabs($tabs)
{
	unset($tabs['additional_information']);
	unset($tabs['shipping']);
	return $tabs;
}

// ajax
require get_template_directory() . '/inc/custom-sort-blogs.php';

require get_template_directory() . '/inc/custom-sort-excursions.php';
require get_template_directory() . '/inc/search-ajax.php';
function add_post_popularity_meta_field()
{
	register_post_meta(
		'post',
		'post_popularity',
		array(
			'type' => 'integer',
			'single' => true,
			'show_in_rest' => true,
		)
	);
}
add_action('init', 'add_post_popularity_meta_field');

function set_initial_post_popularity()
{
	$posts = get_posts(
		array(
			'post_type' => 'post',
			'posts_per_page' => -1,
		)
	);
	foreach ($posts as $post) {
		update_post_meta($post->ID, 'post_popularity', 0);
	}
}
add_action('init', 'set_initial_post_popularity');

// Функция для подключения скриптов
function enqueue_multidatespicker_script()
{
	// Регистрация скрипта
	wp_register_script('jquery-ui-multidatespicker', get_template_directory_uri() . '/src/js/libraries/jquery-ui.multidatespicker.js', array('jquery', 'jquery-ui-datepicker'), '1.6.6', true);

	// Подключение скрипта на фронтенде
	wp_enqueue_script('jquery-ui-multidatespicker');
	wp_enqueue_style('jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
}

// Подключение скрипта на фронтенде
add_action('wp_enqueue_scripts', 'enqueue_multidatespicker_script');

function enqueue_multidatespicker_script_for_admin()
{
	// Подключаем jQuery UI Multidatepicker
	wp_enqueue_script('jquery-ui-multidatespicker', get_template_directory_uri() . '/src/js/libraries/jquery-ui.multidatespicker.js', array('jquery', 'jquery-ui-datepicker'), false, true);

	// Также стоит проверить, необходимо ли подключить стили для datepicker, если они не встроены в админку по умолчанию
	wp_enqueue_style('jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
}

add_action('admin_enqueue_scripts', 'enqueue_multidatespicker_script_for_admin');



// AJAX CART

add_action('wp_ajax_custom_add_to_cart', 'custom_add_to_cart');
add_action('wp_ajax_nopriv_custom_add_to_cart', 'custom_add_to_cart');

function custom_add_to_cart()
{
	$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
	$quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
	$excursion_date = !empty($_POST['excursion_date']) ? sanitize_text_field($_POST['excursion_date']) : '';
	$guests = !empty($_POST['guests']) ? sanitize_text_field($_POST['guests']) : '';

	$unique_key = md5(microtime() . rand()); // Создаем уникальный ключ

	// Добавляем товар в корзину с уникальным ключом
	$cart_item_key = WC()->cart->add_to_cart($product_id, $quantity, 0, array(), array('unique_key' => $unique_key));

	if ($cart_item_key) {
		// Обновляем фрагменты корзины и возвращаем их в качестве ответа на AJAX-запрос
		ob_start();
		woocommerce_mini_cart();
		$mini_cart = ob_get_clean();

		$response = array(
			'fragments' => apply_filters(
				'woocommerce_add_to_cart_fragments',
				array(
					'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>',
				)
			),
			'cart_hash' => WC()->cart->get_cart_hash(),
		);

		wp_send_json($response);
	} else {
		// Если товар не был добавлен в корзину, возвращаем ошибку
		wp_send_json_error(__('Failed to add the product to the cart.', 'your-text-domain'));
	}

	wp_die();
}



// LOAD CONTENT

add_action('wp_ajax_load_cart_contents', 'load_cart_contents');
add_action('wp_ajax_nopriv_load_cart_contents', 'load_cart_contents');
function load_cart_contents()
{
	// Путь к вашему собственному шаблону корзины WooCommerce
	$template_path = get_stylesheet_directory() . '/woocommerce/cart/mini-cart.php';

	// Проверяем существование файла шаблона
	if (file_exists($template_path)) {
		// Включаем ваш собственный шаблон корзины WooCommerce
		include($template_path);
	} else {
		// Выводим сообщение об ошибке, если шаблон не найден
		echo 'Собственный шаблон корзины WooCommerce не найден';
	}

	// Завершаем выполнение скрипта
	wp_die();
}


// REMOVE CART
add_action('wp_ajax_remove_cart_item', 'remove_cart_item_callback');
add_action('wp_ajax_nopriv_remove_cart_item', 'remove_cart_item_callback');

function remove_cart_item_callback()
{
	// Получаем ID товара и ключ элемента корзины из AJAX запроса
	$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
	$cart_item_key = isset($_POST['cart_item_key']) ? sanitize_text_field($_POST['cart_item_key']) : '';

	// Проверяем наличие товара и ключа элемента корзины
	if ($product_id && $cart_item_key) {
		// Удаляем товар из корзины
		WC()->cart->remove_cart_item($cart_item_key);

		// Выводим обновленный мини-корзину и итоговую сумму
		woocommerce_mini_cart();
		die();
	}
}

// Checkout
function custom_override_checkout_fields($fields)
{
	// Удаляем необходимые поля
	unset($fields['billing']['billing_company']); // Название компании
	unset($fields['billing']['billing_address_1']); // Адрес
	unset($fields['billing']['billing_address_2']); // Номер дома и название улицы
	unset($fields['billing']['billing_city']); // Город
	unset($fields['billing']['billing_postcode']); // Почтовый индекс
	unset($fields['billing']['billing_state']); // Страна/регион
	unset($fields['billing']['billing_country']); // Страна/регион

	// Оставляем только электронную почту, телефон, имя и фамилию
	$fields['billing']['billing_email']['required'] = true;
	$fields['billing']['billing_phone']['required'] = true;
	$fields['billing']['billing_first_name']['required'] = true;
	$fields['billing']['billing_last_name']['required'] = true;

	return $fields;
}
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
