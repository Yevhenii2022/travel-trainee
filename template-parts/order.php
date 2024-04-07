<?php
$title = get_sub_field('order_title') ?? '';
$direction = get_sub_field('order_direction') ?? '';
$image = get_sub_field('order_img');
?>

<section class="order">
  <div class="order__wrapper <?php echo ($direction === 'row-reverse') ? 'order__wrapper--row-reverse' : '' ?>">

    <?php
    if ($image) {
      echo wp_get_attachment_image($image, "full", '', ['alt' => 'картинка секції замовити консультацію']);
    }
    ?>

    <div class="order__inner">


      <ul class="order__list">
        <?php $icon_list = get_sub_field('order_icon_list');
        if ($icon_list) : ?>
          <?php while (have_rows('order_icon_list')) : the_row();
            $icon = get_sub_field('order_icon');
            $file_path = get_attached_file($icon);
            $svg_content = file_get_contents($file_path);
          ?>
            <li>
              <?php if ($svg_content !== false) {
                echo $svg_content;
              } ?>
            </li>
          <?php endwhile; ?>
        <?php endif ?>
      </ul>

      <h2 class="section__title order__title"><?= $title ?></h2>

      <?php
      $btn_text = get_sub_field('order_btn_text') ?? '';
      ?>
      <button popovertarget="consultation" class="order__button btn">
        <span class="btn--top-text"><?= $btn_text ?></span>
        <span class="btn--bottom-text"><?= $btn_text ?></span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
        </svg>
      </button>

      <?php get_template_part('template-parts/popup'); ?>



    </div>



  </div>
</section>