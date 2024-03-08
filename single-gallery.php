<?php
/*
Template Name: Галерея
*/

get_header();
?>
<main>

  <?php
  $title = get_field('gallery_title');
  ?>
  <?php if ($title) : ?>
    <h2 class="gallery__title section__title"><?= $title; ?></h2>
  <?php endif; ?>

</main>
<?php get_footer(); ?>