<?php
$title = get_field('аdvantages_title') ?? '';
$image = get_field('аdvantages_img');
?>

<section class="аdvantages">
  <div class="container">
    <div class="аdvantages__wrapper">

      <div class="аdvantages__inner">
        <h2 class="section__title"><?= $title ?></h2>
      </div>

      <?php if ($image) : ?>
        echo wp_get_attachment_image($image, "full", '', ['alt' => 'картинка галереї']);
      <?php endif ?>

    </div>
  </div>
</section>