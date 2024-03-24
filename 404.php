<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pointer_theme
 */

get_header();
?>

<main style="height: 100vh; background-color: #eaf2f5;">
	<div style=" padding: 15rem 10rem;">
		<h1 class="section__title"><?php pll_e('Такая страница отсутствует') ?></h1>
		<a class="btn" href="<?php echo home_url(); ?>" aria-label="посилання на головну сторінку">
			<?php pll_e('Назад к главной странице') ?>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
				<path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
			</svg>
		</a>
	</div>

	<?php get_footer();	?>

</main>