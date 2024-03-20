<?php
/*
Template Name: Набірна сторінка
*/
get_header();
?>
<main>
  <?php if (have_rows('content')) {
    while (have_rows('content')) :
      the_row();

      if (get_row_layout() == 'banner') {
        get_template_part('template-parts/hero');
      } elseif (get_row_layout() == 'about') {
        get_template_part('template-parts/about');
      } elseif (get_row_layout() == 'video') {
        get_template_part('template-parts/video');
      } elseif (get_row_layout() == 'excursions') {
        get_template_part('template-parts/excursions');
      } elseif (get_row_layout() == 'advantages') {
        get_template_part('template-parts/advantages');
      } elseif (get_row_layout() == 'order') {
        get_template_part('template-parts/order');
      } elseif (get_row_layout() == 'short-gallery') {
        get_template_part('template-parts/gallery');
      } elseif (get_row_layout() == 'gallery') {
        get_template_part('template-parts/gallery-page');
      } elseif (get_row_layout() == 'blog') {
        get_template_part('template-parts/blog-page');
      } ?>
    <?php endwhile ?>
  <?php } ?>

</main>
<?php get_footer(); ?>