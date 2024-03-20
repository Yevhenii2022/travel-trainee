<section class="blog">
  <div class="container">

    <div class="blog__wrapper">

      <?php
      $title = get_sub_field('blog_title');
      ?>
      <?php if ($title) : ?>
        <h2 class="blog__title section__title"><?= $title; ?></h2>
      <?php endif; ?>



      <ul>
        <li>
          <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"><?php pll_e('Все') ?></a>
        </li>

        <?php
        $categories = get_categories(array(
          'orderby' => 'name',
          'order'   => 'ASC'
        ));

        foreach ($categories as $category) {
          if ($category->name != 'Без категорії') {
            printf(
              '<li><a href="%1$s">%2$s</a></li>',
              esc_url(get_category_link($category->term_id)),
              esc_html($category->name)
            );
          }
        }
        ?>
      </ul>

      <div class="blog__count">
        <?php
        $total_posts = wp_count_posts()->publish;
        echo '(' . $total_posts . ')';
        ?>
        <?php
        $count_text = get_sub_field('blog_count') ?? '';
        ?>
        <p><?= $count_text ?></p>
      </div>

      <ul class="blog__inner">
        <?php
        global $post;
        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query = new WP_Query([
          'posts_per_page' => 1,
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
      $posts_per_page = 1;
      $total_pages = $query->max_num_pages;
      $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $pagination_args = array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text' => ('&#8592;'),
        'next_text' => ('&#8594'),
      );
      echo '<div id="pagination" class="pagination">';
      echo paginate_links($pagination_args);
      echo '</div>';


      wp_reset_postdata();
      ?>




    </div>


  </div>
</section>