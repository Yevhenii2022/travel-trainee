<?php
$video = get_sub_field('video');
?>

<?php if ($video): ?>
  <section class="video">
    <video loop id="custom-video" class="video__video" preload="auto" playsinline preload="metadata">
    <source src="<?php echo $video; ?>#t=0.001" type="video/mp4">
    <source src="<?php echo $video; ?>#t=0.001" type="video/webm">
    <source src="<?php echo $video; ?>#t=0.001" type="video/ogg">
    <source src="<?php echo $video; ?>#t=0.001" type="video/quicktime">
    <source src="<?php echo $video; ?>#t=0.001" type="video/x-flv">
    <source src="<?php echo $video; ?>#t=0.001" type="video/x-msvideo">
    </video>

    <button class="video__play">
      <svg class="video__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 19" fill="none">
        <path fill="#fff" d="M0 0v19l15-9.5L0 0Z" />
      </svg>
      <?php pll_e('Смотреть видео') ?>
    </button>
  </section>
<?php endif; ?>