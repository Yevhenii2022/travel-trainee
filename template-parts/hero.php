<?php
$title = get_sub_field('hero_title') ?? '';
$subtitle = get_sub_field('hero_subtitle') ?? '';
$icon_txt = get_sub_field('hero_icon_txt') ?? '';
$video = get_sub_field('hero_video');
$icon = get_sub_field('hero_icon');
$file_path = get_attached_file($icon);
$svg_content = file_get_contents($file_path);
?>

<section class="hero">
  <?php if ($video) : ?>
    <video autoplay muted loop class="hero__video">
      <source src="<?php echo esc_url($video); ?>" type="video/mp4">
      Ваш браузер не підтримує тег video.
    </video>
  <?php endif; ?>

  <div class="container">
    <div class="hero__wrapper">

      <div class="hero__box">
        <p class="hero__text"><?= $subtitle ?></p>
        <h1 class="main__title"><?php echo $title ?></h1>
        <a class="hero__circle <?php echo (pll_current_language() === 'uk') ? 'hero__circle--lang' : ''; ?>" href="<?php the_permalink(58); ?>" aria-label="посилання на сторінку екскурсій">

          <?php if ($svg_content !== false) {
            echo $svg_content;
          } ?>
        </a>
      </div>

      <div class="hero__contacts">
        <div class="hero__inner">
          <?php
          $instagram = get_field('instagram', 'options');
          $link =  $instagram['instagram_link'] ?? '';
          $icon =  $instagram['instagram_icon'];
          $file_path = get_attached_file($icon);
          $svg_content = file_get_contents($file_path);
          ?>
          <?php if ($instagram) : ?>
            <a href="<?= $link; ?>" class="hero__icon" target="_blank">
              <?php if ($svg_content !== false) {
                echo $svg_content;
              } ?>
            </a>
          <?php endif; ?>

          <?php
          $facebook = get_field('facebook', 'options');
          $link =  $facebook['facebook_link'] ?? '';
          $icon =  $facebook['facebook_icon'];
          $file_path = get_attached_file($icon);
          $svg_content = file_get_contents($file_path);
          ?>
          <?php if ($facebook) : ?>
            <a href="<?= $link; ?>" class="hero__icon" target="_blank">
              <?php if ($svg_content !== false) {
                echo $svg_content;
              } ?>
            </a>
          <?php endif; ?>

          <?php
          $whatsapp = get_field('whatsapp', 'options');
          $number =  $whatsapp['whatsapp_link'] ?? '';
          $cleanedNumber = preg_replace('/\s+/', '', $number);
          $cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
          $icon =  $whatsapp['whatsapp_icon'];
          $file_path = get_attached_file($icon);
          $svg_content = file_get_contents($file_path);
          ?>
          <?php if ($whatsapp) : ?>
            <a href="https://wa.me/+<?php echo $cleanedNumber ?>" class="hero__icon" target="_blank">
              <?php if ($svg_content !== false) {
                echo $svg_content;
              } ?>
            </a>
          <?php endif; ?>
        </div>

        <?php
        $tel = get_field('tel', 'options');
        $number =  $tel['tel_number'] ?? '';
        $icon =  $tel['tel_icon'];
        $cleanedNumber = preg_replace('/\s+/', '', $number);
        $cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
        $file_path = get_attached_file($icon);
        $svg_content = file_get_contents($file_path);
        ?>
        <?php if ($number) : ?>
          <a href="tel:+<?php echo $cleanedNumber ?>" class="hero__tel">
            <?php if ($svg_content !== false) {
              echo $svg_content;
            } ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>