<?php
$title = get_field('about_title') ?? '';
$text = get_field('about_text') ?? '';
$image = get_field('about_img')
?>

<section class="about">
  <div class="container container--right">
    <div class="about__wrapper">

      <div class="about__inner">
        <h2 class="section__title"><?= $title ?></h2>
        <?= $text ?>
      </div>

      <?php if ($image) : ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
      <?php endif ?>

    </div>
  </div>
</section>