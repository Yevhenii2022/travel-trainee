<section class="reviews">
  <div class="container">

    <div class="reviews__wrapper">

      <?php
      $title = get_sub_field('reviews_title');
      ?>
      <?php if ($title) : ?>
        <h2 class="reviews__title section__title"><?= $title; ?></h2>
      <?php endif; ?>

      <div class="reviews__count">
        <?php
        $count_text = get_sub_field('reviews_count') ?? '';
        $comments_count = get_comments_number();
        echo '(' . $comments_count . ')';
        ?>
        <p><?= $count_text ?></p>
      </div>



      <?php



      if (comments_open() || get_comments_number()) :
        comments_template('/comments.php');
      endif;
      ?>





    </div>
  </div>
</section>