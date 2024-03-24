<article class="blog-banner">
  <div class="blog-banner__image">
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail(); ?>
    <?php else :
      $upload_dir = wp_upload_dir();
      $image_url = $upload_dir['baseurl'] . '/2024/03/woocommerce-placeholder.png';
    ?>
      <img src="<?php echo esc_url($image_url); ?>" alt="дефолтне зображення">
    <?php endif; ?>
  </div>

  <div class="blog-banner__wrapper">
    <div>
      <span class="blog-banner__time"><?php the_time('d.m.Y'); ?></span>
      <h3 class="section__title blog-banner__title"><?php the_title(); ?></h3>
      <?php the_excerpt(); ?>
    </div>

    <?php
    $btn_text = get_field('blog_card_btn_text', 'options') ?? '';
    ?>
    <a class="btn" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
      <?= $btn_text ?>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
      </svg>
    </a>
  </div>
</article>