<?php
$video = get_field('video');
?>

<?php if ($video) : ?>
  <section class="video">
    <video loop id="custom-video" class="video__video">
      <source src="<?php echo esc_url($video); ?>" type="video/mp4">
      Ваш браузер не підтримує тег video.
    </video>

    <button class="video__play">
      <svg class="video__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 19" fill="none">
        <path fill="#fff" d="M0 0v19l15-9.5L0 0Z" />
      </svg>
      Смотреть видео
    </button>
  </section>
<?php endif; ?>