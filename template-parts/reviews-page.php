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
        $current_language = pll_current_language();
        $total_posts = pll_count_posts($current_language);
        echo '(' . $total_posts . ')';
        ?>
        <p><?= $count_text ?></p>
      </div>


      <ul class="reviews__inner">
        <?php
        global $post;
        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query = new WP_Query([
          'posts_per_page' => 6,
          'paged' => $current_page,
          'orderby' => 'date',
        ]);

        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/blog-card');
          }
          wp_reset_postdata();
        }
        ?>
      </ul>


      <?php
      $posts_per_page = 6;
      $total_pages = $query->max_num_pages;
      $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $pagination_args = array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text' => '<span class="prev-arrow"></span>',
        'next_text' => '<span class="next-arrow"></span>',
      );
      echo '<div class="pagination">';
      echo paginate_links($pagination_args);
      echo '</div>';

      wp_reset_postdata();
      ?>


    </div>
  </div>
</section>