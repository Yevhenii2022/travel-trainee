<?php
$title = get_sub_field('advantages_title') ?? '';
$image = get_sub_field('advantages_img');
?>

<section class="аdvantages">
  <div class="container">
    <div class="аdvantages__wrapper">


      <h2 class="section__title"><?= $title ?></h2>


      <?php
      if ($image) {
        echo wp_get_attachment_image($image, "full", '', ['alt' => 'картинка галереї']);
      }
      ?>


    </div>
  </div>
</section>