<?php
/*
  Template Name: Шаблон страницы Contact
*/
get_header('pages');
?>

<!-- Contact Start -->
<div class="container-fluid contact py-5">
  <div class="container py-5">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
      <h4 class="text-primary mb-4"><?php the_field('cu_subtitle') ?></h4>
      <h1 class="display-5 mb-4"><?php the_field('cu_title') ?></h1>
      <p class="mb-0"><?php the_field('cu_description') ?></p>
    </div>
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
        <h2 class="display-5 mb-2"><?php the_field('cf_title') ?></h2>
        <?php echo do_shortcode( '[contact-form-7 id="d4a38bc" title="Контактная форма 1"]' ); ?>
      </div>
      <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
        <?php
        if (have_rows('info_repeater')):
          while (have_rows('info_repeater')) : the_row(); ?>

            <div class="d-flex align-items-center mb-4">
              <div class="bg-light d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; border-radius: 50px;"><i class="<?php echo esc_attr(get_sub_field('info_ic_class')); ?> fa-2x text-primary"></i></div>
              <div class="ms-4">
                <h4><?php the_sub_field('info_title') ?></h4>
                <p class="mb-0"><?php the_sub_field('info_description') ?></p>
              </div>
            </div>

        <?php endwhile;
        else :
          echo 'Ошибка, поля не найдены';
        endif;
        ?>
        <div class="d-flex align-items-center">
          <div class="me-4">
            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 90px; height: 90px; border-radius: 50px;"><i class="<?php echo esc_attr(get_field('send_ic_class')); ?> fa-2x text-primary"></i></div>
          </div>
          <div class="d-flex">
            <?php
            if (have_rows('society_repeater')):
              while (have_rows('society_repeater')) : the_row(); ?>

                <a class="btn btn-lg-square btn-primary rounded-circle me-2" href=""><i class="<?php echo esc_attr(get_sub_field('society_ic_class')); ?>"></i></a>

            <?php endwhile;
            else :
              echo 'Ошибка, поля не найдены';
            endif;
            ?>
          </div>
        </div>
      </div>
      <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
        <div class="rounded h-100">
          <iframe class="rounded w-100"
            style="height: 500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Contact End -->

<?php get_footer(); ?>