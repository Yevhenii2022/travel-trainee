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
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page">
		<header class="header">
			<div class="container">
				<div class="header__wrapper">

					<div class="header__logo <?= is_front_page() ? 'header__logo--filter' : '' ?>">
						<?= the_custom_logo(); ?>
					</div>

					<div class="header__inner">

						<div class="header__overlay">
							<div class="header__nav <?= is_front_page() ? 'header--white' : '' ?>">

								<?php wp_nav_menu([
									'theme_location'       => 'header_menu',
									'container'            => false,
									'menu_class'           => 'header__list',
									'menu_id'              => false,
									'echo'                 => true,
								]);
								?>

								<div class="custom-select <?= is_front_page() ? 'header--white' : '' ?>">
									<?php pll_the_languages(array('dropdown' => 1)); ?>
								</div>

								<div class="header__button">
									<?php
									$btn_text = get_field('header_btn_contact', 'options') ?? '';
									?>
									<button popovertarget="consultation" class="btn <?= is_front_page() ? 'btn--white' : '' ?>">
										<span class="btn--top-text"><?= $btn_text ?></span>
										<span class="btn--bottom-text"><?= $btn_text ?></span>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
											<path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
										</svg>
									</button>
								</div>

							</div>
						</div>

						<div class="header__menu">
							<div class="header__burger burger <?= is_front_page() ? 'burger--white' : '' ?>">
								<span></span>
							</div>

							<?php
							$search_icon = get_field('search_icon', 'options');
							$file_path = get_attached_file($search_icon);
							$svg_content = file_get_contents($file_path);
							?>
							<div class="header__search <?= is_front_page() ? 'header--white header--fill' : '' ?>">
								<?php if ($svg_content !== false) {
									echo $svg_content;
								} ?>
								<input type="search" class="header__input">
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

							<div class="header__button--wrap">
								<?php
								$btn_text = get_field('header_btn_contact', 'options') ?? '';
								?>
								<button popovertarget="consultation" class="header--js btn <?= is_front_page() ? 'btn--white' : '' ?>">
									<span class="btn--top-text"><?= $btn_text ?></span>
									<span class="btn--bottom-text"><?= $btn_text ?></span>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
										<path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
									</svg>
								</button>
							</div>

						</div>
					</div>

					<?php get_template_part('template-parts/popup'); ?>

				</div>
			</div>
		</header>