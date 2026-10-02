<?php
/*
  Template Name: Шаблон ГЛАВНОЙ страницы
*/
get_header('home');
?>

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
  <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<!-- Spinner End -->

<!-- Hero Header Start -->
<div class="hero-header overflow-hidden px-5">
  <div class="rotate-img">
    <img src="<?php the_field('gs_bg_fly_pic') ?>" class="img-fluid w-100" alt="">
    <div class="rotate-sty-2"></div>
  </div>
  <div class="row gy-5 align-items-center">
    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
      <h1 class="display-4 text-dark mb-4 wow fadeInUp" data-wow-delay="0.3s"><?php the_field('gs_title') ?></h1>
      <p class="fs-4 mb-4 wow fadeInUp" data-wow-delay="0.5s"><?php the_field('gs_description') ?></p>
      <a href="<?php echo get_field('gs_button')['url'] ?>" class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s"><?php echo get_field('gs_button')['title'] ?></a>
    </div>
    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
      <img src="<?php the_field('gs_picture') ?>" class="img-fluid w-100 h-100" alt="">
    </div>
  </div>
</div>
<!-- Hero Header End -->
</div>

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


<!-- Service Start -->
<div class="container-fluid service py-5">
  <div class="container py-5">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
      <h4 class="mb-1 text-primary"><?php the_field('os_subtitle') ?></h4>
      <h1 class="display-5 mb-4"><?php the_field('os_title') ?></h1>
      <p class="mb-0"><?php the_field('os_description') ?></p>
    </div>

    <?php if (have_rows('os_repeater')) : ?>
      <div class="row g-4 justify-content-center">
        <?php
        $i = 0;
        while (have_rows('os_repeater')) : the_row();
          // delay = 0.1 + 0.2 * ($i % 4)
          $delay = 0.1 + 0.2 * ($i % 4);
        ?>
          <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="<?php echo esc_attr($delay); ?>s">
            <div class="service-item text-center rounded p-4">
              <div class="service-icon d-inline-block bg-light rounded p-4 mb-4">
                <i class="<?php echo esc_attr(get_sub_field('icon_class')); ?> fa-5x text-secondary"></i>
              </div>
              <div class="service-content">
                <h4 class="mb-4"><?php the_sub_field('title'); ?></h4>
                <p class="mb-4"><?php the_sub_field('description'); ?></p>
                <a href="<?php echo get_sub_field('button')['url'] ?>" class="btn btn-light rounded-pill text-primary py-2 px-4"><?php echo get_sub_field('button')['title'] ?></a>
              </div>
            </div>
          </div>
        <?php
          $i++;
        endwhile;
        ?>
      </div>
    <?php endif; ?>

  </div>
</div>
<!-- Service End -->


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


<!-- FAQ Start -->
<div class="container-fluid FAQ bg-light overflow-hidden py-5">
  <div class="container py-5">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
        <div class="accordion" id="accordionExample">
          <?php
          if (have_rows('faq_repeater')):
            $total = count(get_field('faq_repeater'));
            $i = 1;
            while (have_rows('faq_repeater')) : the_row();
              $collapse_id = 'collapse-' . $i;
              $heading_id  = 'heading-' . $i;
              $is_first    = ($i === 1);
              $is_last     = ($i === $total);
              $mb_class    = $is_last ? '' : 'mb-4';
              $i++; ?>
              <div class="accordion-item border-0 <?php echo esc_attr($mb_class); ?>">
                <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                  <button class="accordion-button <?php echo $is_first ? '' : 'collapsed'; ?> rounded-top" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                    aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
                    aria-controls="<?php echo esc_attr($collapse_id); ?>">
                    <?php echo esc_html(get_sub_field('button'));  ?>
                  </button>
                </h2>
                <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse <?php echo $is_first ? 'show' : ''; ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-bs-parent="#accordionExample">
                  <div class="accordion-body my-2">
                    <h5><?php the_sub_field('title');  ?></h5>
                    <p><?php the_sub_field('description');  ?></p>
                  </div>
                </div>
              </div>


          <?php endwhile;
          else :
            echo 'Ошибка, поля не найдены';
          endif;
          ?>

        </div>
      </div>
      <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
        <div class="FAQ-img RotateMoveRight rounded">
          <img src="<?php the_field('faq_picture') ?>" class="img-fluid w-100" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- FAQ End -->


<!-- Pricing Start -->
<div class="container-fluid price py-5">
  <div class="container py-5">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
      <h4 class="text-primary"><?php the_field('p_subtitle') ?></h4>
      <h1 class="display-5 mb-4"><?php the_field('p_title') ?></h1>
      <p class="mb-0"><?php the_field('p_description') ?></p>
    </div>
    <div class="row g-5 justify-content-center">
      <?php if (have_rows('p_repeater')) : ?>
        <?php
        $i = 0;
        while (have_rows('p_repeater')) : the_row();
          $i++;
          $delay = 0.1 + 0.2 * (($i - 1) % 3);
        ?>
          <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="<?php echo esc_attr($delay); ?>s">
            <div class="price-item bg-light rounded text-center">

              <?php if (get_sub_field('is_popular')) : ?>
                <div class="pice-item-offer">Popular</div>
              <?php endif; ?>

              <div class="text-center text-<?php echo esc_attr(get_sub_field('plan_style')); ?> border-bottom d-flex flex-column justify-content-center p-4"
                style="width: 100%; height: 160px;">
                <p class="fs-2 fw-bold text-uppercase mb-0">
                  <?php echo esc_html(get_sub_field('plan')); ?>
                </p>
                <div class="d-flex justify-content-center">
                  <strong class="align-self-start"><?php echo esc_html(get_sub_field('currency')); ?></strong>
                  <p class="mb-0">
                    <span class="display-5"><?php echo esc_html(get_sub_field('price')); ?></span>
                    <?php echo esc_html(get_sub_field('period')); ?>
                  </p>
                </div>
              </div>

              <div class="text-start p-5">
                <?php $total = count(get_sub_field('features'));
                if (have_rows('features')) :
                  $j = 1; ?>
                  <?php while (have_rows('features')) : the_row();
                    $is_last = ($j === $total);
                    $mb_class = $is_last ? 'mb-4' : '';
                  ?>
                    <p class="<?php echo esc_attr($mb_class) ?>">
                      <i class="fas fa-<?php echo get_sub_field('is_included') ? 'check text-success' : 'times text-danger'; ?> me-1"></i>
                      <?php echo esc_html(get_sub_field('feature_text')); ?>
                    </p>
                  <?php $j++;
                  endwhile; ?>
                <?php endif; ?>

                <a href="<?php echo get_sub_field('button')['url'] ?>" class="btn btn-light rounded-pill py-2 px-5">
                  <?php echo get_sub_field('button')['title'] ?>
                </a>
              </div>
            </div>
          </div>
        <?php
        endwhile;
        ?>
    </div>
  <?php endif; ?>
  </div>
</div>
<!-- Pricing End -->


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



<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5">
  <div class="container py-5">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
      <h4 class="text-primary"><?php the_field('t_subtitle') ?></h4>
      <h1 class="display-5 mb-4"><?php the_field('t_title') ?></h1>
      <p class="mb-0"><?php the_field('t_description') ?></p>
    </div>
    <div class="testimonial-carousel owl-carousel wow zoomInDown" data-wow-delay="0.2s">

      <?php
      if (have_rows('t_repeater')):
        while (have_rows('t_repeater')) : the_row(); ?>

          <div class="testimonial-item" data-dot="<img class='img-fluid' src='<?php echo get_sub_field('picture'); ?>' alt=''>">
            <div class="testimonial-inner text-center p-5">
              <div class="d-flex align-items-center justify-content-center mb-4">
                <div class="testimonial-inner-img border border-primary border-3 me-4" style="width: 100px; height: 100px; border-radius: 50%;">
                  <img src="<?php echo get_sub_field('picture'); ?>" class="img-fluid rounded-circle" alt="">
                </div>
                <div>
                  <h5 class="mb-2"><?php echo esc_html(get_sub_field('title')); ?></h5>
                  <p class="mb-0"><?php echo esc_html(get_sub_field('subtitle')); ?></p>
                </div>
              </div>
              <p class="fs-7"><?php echo get_sub_field('description'); ?></p>
              <div class="text-center">
                <div class="d-flex justify-content-center">
                  <!-- / -->
                  <?php
                  $rating = get_sub_field('rating');
                  if ($rating && $rating !== 'none') :
                  ?>
                    <?php
                    // Выводим закрашенные звезды в количестве, равном $rating
                    for ($i = 1; $i <= 5; $i++) {
                      echo $i <= $rating
                        ? '<i class="fas fa-star text-primary"></i>'
                        : '<i class="fas fa-star text-dark"></i>';
                    }
                    ?>
                  <?php endif; ?>
                  <!-- / -->

                </div>
              </div>
            </div>
          </div>

      <?php endwhile;
      else :
        echo 'Ошибка, поля не найдены';
      endif;
      ?>

    </div>
  </div>
</div>
<!-- Testimonial End -->

<?php get_footer(); ?>