<?php
/*
  Template Name: Шаблон страницы Blog
*/
get_header('pages');
?>

<!-- Blog Start -->
<div class="container-fluid blog py-5">
  <div class="container py-5">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
      <h4 class="text-primary"><?php the_field('b_subtitle') ?></h4>
      <h1 class="display-5 mb-4"><?php the_field('b_title') ?></h1>
      <p class="mb-0"><?php the_field('b_description') ?></p>
    </div>

    <div class="row g-4 justify-content-center">
      <?php
      $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 8,
      ];

      $blog_query = new WP_Query($args);
      $i = 0;

      if ($blog_query->have_posts()) :
        while ($blog_query->have_posts()) : $blog_query->the_post();
          $i++;
          $delay = 0.1 + 0.2 * (($i - 1) % 4);
      ?>
          <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="<?php echo esc_attr($delay); ?>s">
            <div class="blog-item">

              <div class="blog-img">
                <?php if (has_post_thumbnail()) : ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium_large', [
                      'class' => 'img-fluid w-100',
                      'alt'   => esc_attr(get_the_title()),
                    ]); ?>
                  </a>
                <?php else : ?>
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/blog-placeholder.png'); ?>"
                      class="img-fluid w-100" alt="">
                  </a>
                <?php endif; ?>

                <div class="blog-info">
                  <span>
                    <i class="fa fa-clock"></i>
                    <?php echo esc_html(get_the_date()); ?>
                  </span>
                  <div class="d-flex">
                    <a href="<?php the_permalink(); ?>" class="text-white">
                      <i class="fa fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>

              <div class="blog-content text-dark border p-4">
                <h5 class="mb-4">
                  <a href="<?php the_permalink(); ?>" class="text-dark">
                    <?php the_title(); ?>
                  </a>
                </h5>
                <p class="mb-4">
                  <?php echo esc_html(wp_trim_words(get_the_excerpt(), 15, '...')); ?>
                </p>
                <a class="btn btn-light rounded-pill py-2 px-4" href="<?php the_permalink(); ?>">
                  <?php echo esc_html(get_field('button')); ?>
                </a>
              </div>

            </div>
          </div>
        <?php
        endwhile;
        wp_reset_postdata(); // ← ВАЖНО: сброс глобального $post
      else : ?>
        <div class="col-12 text-center text-muted">
          Записей пока нет.
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<!-- Blog End -->

<?php get_footer(); ?>