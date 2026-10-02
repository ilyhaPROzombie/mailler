<?php
/*
  Template Name: Шаблон страницы Testimonial
*/
get_header('pages');
?>

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