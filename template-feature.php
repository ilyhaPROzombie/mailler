<?php
/*
  Template Name: Шаблон страницы Feature
*/
get_header('pages');
?>

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

<?php get_footer(); ?>