<?php
/*
Template Name: Головна сторінка
*/

get_header();
?>
<main>

  <?php get_template_part('template-parts/hero'); ?>

  <?php get_template_part('template-parts/about'); ?>

  <?php get_template_part('template-parts/video'); ?>

  <?php get_template_part('template-parts/gallery'); ?>

</main>
<?php get_footer(); ?>