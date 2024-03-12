<?php
$title = get_field('form_title', 'options') ?? '';
$subtitle = get_field('form_subtitle', 'options') ?? '';
?>

<div id="consultation" class="popup" popover>
  <div class="popup__inner">
    <div>
      <h3><?= $title ?></h3>
      <p><?= $subtitle ?></p>
    </div>
    <button class="popup__button" popovertarget="consultation" popovertargetaction="hide">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19" fill="none">
        <path stroke="#202020" stroke-linecap="round" d="m5.243 13.243 8.485-8.486M5.243 4.757l8.485 8.486" />
      </svg>
    </button>
  </div>

  <?php get_template_part('template-parts/form'); ?>

</div>