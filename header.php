<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pointer_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://unpkg.com/imask"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page">
		<header class="header">
			<div class="container">
				<div class="header__wrapper">

					<div class="<?= is_front_page() ? 'header__logo--filter' : '' ?>">
						<?= the_custom_logo(); ?>
					</div>

					<div class="header__inner <?= is_front_page() ? 'header--white' : '' ?>">
						<?php wp_nav_menu([
							'theme_location'       => 'header_menu',
							'container'            => false,
							'menu_class'           => 'header__list',
							'menu_id'              => false,
							'echo'                 => true,
						]);
						?>

						<div class="header__nav">
							<?php
							$btn_text = get_field('header_btn_lang', 'options') ?? '';
							?>
							<div class="button button__lang <?= is_front_page() ? 'header--white header--stroke' : '' ?>">
								<?= $btn_text ?>
								<svg viewBox="0 0 10 7" fill="none">
									<path d="M0.757359 1.24264L5 5.48528L9.24264 1.24264" stroke-linecap="round" />
								</svg>
							</div>

							<?php
							$search_icon = get_field('search_icon', 'options');
							$file_path = get_attached_file($search_icon);
							$svg_content = file_get_contents($file_path);
							?>
							<div class="header__search <?= is_front_page() ? 'header--fill' : '' ?>">
								<?php if ($svg_content !== false) {
									echo $svg_content;
								} ?>
							</div>

							<?php
							$basket_icon = get_field('basket_icon', 'options');
							$file_path = get_attached_file($basket_icon);
							$svg_content = file_get_contents($file_path);
							?>
							<div class="header__basket <?= is_front_page() ? 'header--stroke' : '' ?>">
								<?php if ($svg_content !== false) {
									echo $svg_content;
								} ?>
							</div>

							<?php
							$btn_text = get_field('header_btn_contact', 'options') ?? '';
							?>
							<button popovertarget="consultation" class="header__button button <?= is_front_page() ? 'button--white' : '' ?>">
								<?= $btn_text ?>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
									<path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
								</svg>
							</button>
						</div>

						<?php get_template_part('template-parts/popup'); ?>

					</div>
				</div>
			</div>
		</header>