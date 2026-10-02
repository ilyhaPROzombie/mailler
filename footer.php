<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
  <div class="container py-5">
    <div class="row g-5">
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="footer-item d-flex flex-column">
          <h4 class="text-dark mb-4"><?php echo esc_attr(get_field('company_title', 'option')); ?></h4>
          <?php
          if (have_rows('company_repeater', 'option')):
            while (have_rows('company_repeater', 'option')) : the_row(); ?>

              <a href="
              <?php echo esc_attr(get_sub_field('link')['url']); ?>">
                <?php echo esc_attr(get_sub_field('link')['title']); ?></a>

          <?php endwhile;
          else :
            echo 'Ошибка, поля не найдены';
          endif;
          ?>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="footer-item d-flex flex-column">
          <h4 class="mb-4 text-dark"><?php echo esc_attr(get_field('quick_title', 'option')); ?></h4>
          <?php
          wp_nav_menu(array(
            'theme_location'  => 'footer',
            'container'       => false,
            'menu_class'     => 'footer-menu list-unstyled',
            'depth'           => 0,
          ));
          ?>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="footer-item d-flex flex-column">
          <h4 class="mb-4 text-dark"><?php echo esc_attr(get_field('services_title', 'option')); ?></h4>
          <?php
          if (have_rows('services_repeater', 'option')):
            while (have_rows('services_repeater', 'option')) : the_row(); ?>

              <a href="<?php echo esc_attr(get_sub_field('link')['url']); ?>"> <?php echo esc_attr(get_sub_field('link')['title']); ?></a>

          <?php endwhile;
          else :
            echo 'Ошибка, поля не найдены';
          endif;
          ?>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="footer-item d-flex flex-column">
          <h4 class="mb-4 text-dark"><?php echo esc_attr(get_field('contact_title', 'option')); ?></h4>

          <?php
          $total = count(get_field('contact_repeater', 'option'));
          if (have_rows('contact_repeater', 'option')):
            $j = 1;?>
            <?php  
            while (have_rows('contact_repeater', 'option')) : the_row();
              $is_last = ($j === $total);
              $mb_class = $is_last ? 'mb-3' : ''; ?>

              <a class="<?php echo esc_attr($mb_class) ?>"
              href="<?php echo esc_attr(get_sub_field('link')['url']); ?>">
                <i class="<?php echo esc_attr(get_sub_field('picture')); ?> me-2"></i>
                <?php echo esc_attr(get_sub_field('link')['title']); ?></a>

                <?php $j++; ?>
          <?php endwhile;
          else :
            echo 'Ошибка, поля не найдены';
          endif;
          ?>

          <div class="d-flex align-items-center">
            <i class="<?php echo esc_attr(get_field('contact_share', 'option')); ?> fa-2x text-secondary me-2"></i>

            <?php
            if (have_rows('contact_socials', 'option')):
              while (have_rows('contact_socials', 'option')) : the_row(); ?>

                <a class="btn-square btn btn-primary rounded-circle mx-1" href="">
                  <i class="<?php echo esc_attr(get_sub_field('picture', 'option')); ?>"></i></a>

            <?php endwhile;
            else :
              echo 'Ошибка, поля не найдены';
            endif;
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-md-6 text-center text-md-start mb-md-0">
        <span class="text-white"><a href="<?php echo esc_attr(get_field('site_name', 'option')['url']); ?>"><i class="fas fa-copyright text-light me-2"></i><?php echo esc_attr(get_field('site_name', 'option')['title']); ?></a>, All right reserved.</span>
      </div>
      <div class="col-md-6 text-center text-md-end text-white">
        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
        Designed By <a class="border-bottom" href="<?php echo esc_attr(get_field('designed_by', 'option')['url']); ?>"><?php echo esc_attr(get_field('designed_by', 'option')['title']); ?></a>
      </div>
    </div>
  </div>
</div>
<!-- Copyright End -->

<?php wp_footer(); ?>
</body>

</html>