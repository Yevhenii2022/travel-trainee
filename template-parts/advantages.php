<?php
$title = get_sub_field('advantages_title') ?? '';
$direction = get_sub_field('advantages_direction') ?? '';
$image = get_sub_field('advantages_img');
?>

<section class="аdvantages">
  <div class="аdvantages__wrapper <?php echo ($direction === 'row-reverse') ? 'аdvantages__wrapper--row-reverse' : '' ?>">
    <div class="аdvantages__inner">
      <h2 class="section__title"><?= $title ?></h2>

      <ul class="аdvantages__list">
        <?php $advantages_list = get_sub_field('advantages_list');
        $counter = 1;
        if ($advantages_list) : ?>
          <?php while (have_rows('advantages_list')) : the_row();
            $advantages = get_sub_field('advantages_item') ?? '';
          ?>
            <li class="аdvantages__item">
              <span>
                <?php if ($counter < 10) {
                  echo  '0' . $counter . '.';
                } else {
                  echo '' . $counter . '.';
                }
                $counter++; ?>
              </span>
              <p><?= $advantages ?></p>
            </li>
          <?php endwhile; ?>
        <?php endif ?>
      </ul>
    </div>

    <?php
    if ($image) {
      echo wp_get_attachment_image($image, "full", '', ['alt' => 'картинка секції переваги']);
    }
    ?>

  </div>
</section>