<article class="excursion-card">
  <div class="excursion-card__image">
    <img src="http://travel/wp-content/uploads/2024/03/excursion-card-1.webp" alt="">
  </div>

  <div class="excursion-card__wrapper">
    <h3 class="section__title excursion-card__title">Тур в Эдам и Волендам и на мельницы Заансе схансе на мельницы Заансе схансе</h3>
    <p class="excursion-card__text">Узнай уникальную историю Амстердама, попробовав местную еду и посетив интересные музеи города. Узнай уникальную историю Амстердама, попробовав местную еду и посетив интересные музеи города.</p>

    <div class="excursion-card__inner">
      <?php
      $btn_text = get_sub_field('excursions_btn_text') ?? '';
      ?>
      <a class="button" href="<?php the_permalink(58); ?>" aria-label="посилання на сторінку екскурсії">
        <?= $btn_text ?>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 12" fill="none">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.849 9.637 9.485 6m0 0L5.85 2.363M9.485 6H1" />
        </svg>
      </a>

      <p class="excursion-card__price">€100</p>
    </div>

  </div>
</article>