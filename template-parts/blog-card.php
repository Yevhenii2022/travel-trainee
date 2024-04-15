<a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
  <article class="blog-card">
    <div class="blog-card__image">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail(); ?>
      <?php else :
        $upload_dir = wp_upload_dir();
        $image_url = $upload_dir['baseurl'] . '/2024/03/woocommerce-placeholder.png';
      ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
      <?php endif; ?>
      <div class="blog-card__categories">
        <?php
        $categories = get_the_category();
        if ($categories) {
          foreach ($categories as $category) {
            $translated_category = get_term_by('id', pll_get_term($category->term_id), 'category');
            echo '<span class="blog-card__category">' . esc_html($translated_category->name) . '</span>';
          }
        }
        ?>
      </div>

    </div>

    <div class="blog-card__bottom">
      <span class="blog-card__time">
        <?php the_time('d.m.Y'); ?>
      </span>
      <h3 class="section__title blog-card__title">
        <?php the_title(); ?>
      </h3>
      <?php the_excerpt(); ?>

      <?php
      $btn_text = get_field('blog_card_btn_text', 'options') ?? '';
      ?>
      <div class="btn">
      <div class="btn__text">
        <span>
          <?= $btn_text ?>
        </span>
        <span>
          <?= $btn_text ?>
        </span>
      </div>
        
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
        </svg>
      </div>
    </div>
  </article>
</a>