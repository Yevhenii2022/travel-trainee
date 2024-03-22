<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pointer_theme
 */

get_header();
?>

<main id="primary">
	<section class="post">
		<div class="post__wrapper">
			<div class="container">

				<a href="<?php echo esc_url(get_home_url() . '/blog/'); ?>" class="post__link" aria-label="назад к блогу">
					<svg viewBox="0 0 11 11" fill="none">
						<path stroke="#202020" stroke-linecap="round" stroke-linejoin="round" d="M5.151 1.863 1.515 5.5m0 0L5.15 9.137M1.515 5.5H10" />
					</svg>
					<p><?php pll_e('Назад к блогу') ?></p>
				</a>

				<h1 class="section__title post__title"><?php the_title(); ?></h1>

				<span class="post__time"><?php the_time('d.m.Y'); ?></span>

				<div class="post__image">
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail(); ?>
					<?php else :
						$upload_dir = wp_upload_dir();
						$image_url = $upload_dir['baseurl'] . '/2024/03/woocommerce-placeholder.png';
					?>
						<img src="<?php echo esc_url($image_url); ?>" alt="дефолтне зображення">
					<?php endif; ?>
				</div>
			</div>

			<div class="post__content">
				<?php the_content(); ?>
			</div>

			<div class="container">
				<h3 class="section__title post__title post__title--left"><?php pll_e('Также вам понравится') ?></h3>

				<ul class="post__inner">
					<?php
					$current_post_id = get_the_ID();
					$popular_posts_query = new WP_Query(array(
						'posts_per_page' => 3,
						'post__not_in' => array($current_post_id),
						'orderby' => 'comment_count',
						'order' => 'DESC'
					));

					if ($popular_posts_query->have_posts()) {
						while ($popular_posts_query->have_posts()) {
							$popular_posts_query->the_post();
							get_template_part('template-parts/blog-card');
						}
						wp_reset_postdata();
					}
					?>
				</ul>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
