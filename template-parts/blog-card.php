<li>
  <article class="blog-card">
    <div class="blog-card__image">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail(); ?>
      <?php else :
        $upload_dir = wp_upload_dir();
        $image_url = $upload_dir['baseurl'] . '/2024/03/woocommerce-placeholder.png';
      ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="дефолтне зображення">
      <?php endif; ?>
    </div>

    <div class="blog-card__bottom">
      <span class="blog-card__time"><?php the_time('d.m.y'); ?></span>
      <h3 class="section__title blog-card__title"><?php the_title(); ?></h3>
      <?php the_excerpt(); ?>

      <?php
      $btn_text = get_sub_field('blog_card_btn_text') ?? '';
      ?>
      <a class="button" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
        <?= $btn_text ?>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
        </svg>
      </a>
    </div>
  </article>
</li>