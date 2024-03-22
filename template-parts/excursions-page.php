<section class="excursions-page">
  <div class="container">
    <div class="excursions-page__wrapper">

      <?php
      $title = get_sub_field('excursions-page_title');
      ?>
      <?php if ($title) : ?>
        <h2 class="excursions-page__title section__title"><?= $title; ?></h2>
      <?php endif; ?>



      <div class="excursions-page__top">

        <div class="excursions-page__count">
          <?php
          $count_text = get_sub_field('excursions-page_count') ?? '';
          $products_count = wc_get_products(array(
            'limit' => -1
          ));
          echo '(' . count($products_count) . ')';
          ?>
          <p><?= $count_text ?></p>
        </div>

      </div>




      <div class="excursions-page__inner">
        <?php
        $products = wc_get_products(array(
          'limit' => -1
        ));

        if ($products && !empty($products)) {
          foreach ($products as $product) {
            $product_id = $product->get_id();
            $custom_data = (object) array(
              'ID' => $product_id
            );
            set_query_var('custom_data', $custom_data);

            get_template_part('template-parts/excursion-card');
          }
        }
        ?>
      </div>



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