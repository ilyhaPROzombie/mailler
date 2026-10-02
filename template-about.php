<?php
/*
  Template Name: Шаблон страницы About
*/
get_header('pages');
?>

<!-- About Start -->
<div class="container-fluid overflow-hidden py-5" style="margin-top: 6rem;">
  <div class="container py-5">
    <div class="row g-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="RotateMoveLeft">
          <img src="<?php the_field('au_picture') ?>" class="img-fluid w-100" alt="">
        </div>
      </div>
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
        <h4 class="mb-1 text-primary"><?php the_field('au_subtitle') ?></h4>
        <h1 class="display-5 mb-4"><?php the_field('au_title') ?></h1>
        <p class="mb-4"><?php the_field('au_description') ?></p>
        <a href="<?php echo get_field('au_button')['url'] ?>" class="btn btn-primary rounded-pill py-3 px-5"><?php echo get_field('au_button')['title'] ?></a>
      </div>
    </div>
  </div>
</div>
<!-- About End -->


<!-- Feature Start -->
<div class="container-fluid feature overflow-hidden py-5">
  <div class="container py-5">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
      <h4 class="text-primary"><?php the_field('of_subtitle') ?></h4>
      <h1 class="display-5 mb-4"><?php the_field('of_title') ?></h1>
      <p class="mb-0"><?php the_field('of_description') ?></p>
    </div>
    <div class="row g-4 justify-content-center text-center mb-5">
      <?php if (have_rows('of_repeater')) : ?>
        <?php
        $i = 0;
        while (have_rows('of_repeater')) : the_row();
          $delay = 0.1 + 0.2 * ($i % 4);
        ?>
          <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="<?php echo esc_attr($delay); ?>s">
            <div class="text-center p-4">
              <div class="d-inline-block rounded bg-light p-4 mb-4">
                <i class="<?php echo esc_attr(get_sub_field('icon_class')); ?> fa-5x text-secondary"></i>
              </div>
              <div class="feature-content">
                <a href="<?php echo get_sub_field('link')['url'] ?>" class="h4">
                  <?php echo get_sub_field('link')['title'] ?>
                  <i class="fa fa-long-arrow-alt-right"></i>
                </a>
                <p class="mt-4 mb-0"><?php echo esc_html(get_sub_field('description')); ?></p>
              </div>
            </div>
          </div>
        <?php
          $i++;
        endwhile;
        ?>
      <?php endif; ?>
      <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
        <div class="my-3">
          <a href="<?php echo get_field('of_button')['url'] ?>" class="btn btn-primary d-inline rounded-pill px-5 py-3"><?php echo get_field('of_button')['title'] ?></a>
        </div>
      </div>
    </div>

    <!-- Features part 2 -->

    <div class="row g-5 pt-5" style="margin-top: 6rem;">
      <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
        <div class="feature-img RotateMoveLeft h-100" style="object-fit: cover;">
          <img src="<?php the_field('f_picture') ?>" class="img-fluid w-100 h-100" alt="">
        </div>
      </div>
      <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.1s">
        <h4 class="text-primary"><?php the_field('f_subtitle') ?></h4>
        <h1 class="display-5 mb-4"><?php the_field('f_title') ?></h1>
        <p class="mb-4"><?php the_field('f_description') ?></p>
        <div class="row g-4">
          <?php
          if (have_rows('f_repeater')):
            while (have_rows('f_repeater')) : the_row(); ?>

              <div class="col-6">
                <div class="d-flex">
                  <i class="<?php echo esc_attr(get_sub_field('icon_class')); ?> fa-4x text-secondary"></i>
                  <div class="d-flex flex-column ms-3">
                    <h2 class="mb-0 fw-bold"><?php the_sub_field('f_amount');  ?></h2>
                    <small class="text-dark"><?php the_sub_field('f_subtitle');  ?></small>
                  </div>
                </div>
              </div>


          <?php endwhile;
          else :
            echo 'Ошибка, поля не найдены';
          endif;
          ?>
        </div>
        <div class="my-4">
          <a href="<?php echo get_field('f_button')['url'] ?>" class="btn btn-primary rounded-pill py-3 px-5"><?php echo get_field('f_button')['title'] ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Feature End -->


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