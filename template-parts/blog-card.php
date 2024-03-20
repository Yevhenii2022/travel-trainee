<li>
  <article class="blog-card">
    <div class="blog-card__image">
      <?php the_post_thumbnail(); ?>
    </div>

    <div class="blog-card__bottom">
      <p class="blog-card__time"><?php the_time('d.m.y'); ?></p>
      <h3 class="section__title blog-card__title"><?php the_title(); ?></h3>
      <p class="blog-card__text">Узнайте об уникальной коллекции велосипедов и их роли в культуре и транспорте страны на нашем захватывающем маршруте. Узнайте об уникальной коллекции велосипедов и их роли в культуре и транспорте страны на нашем захватывающем маршруте.</p>

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