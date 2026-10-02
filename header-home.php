<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <!-- Navbar Start -->
  <div class="container-fluid header position-relative overflow-hidden p-0">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light px-4 px-lg-5 py-3 py-lg-0">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand p-0">
        <h1 class="display-6 text-primary m-0"><i class="<?php echo esc_attr(get_field('logo', 'option' )); ?> me-3"></i><?php the_field( 'tilte', 'option' ) ?></h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <?php
        wp_nav_menu(array(
          'theme_location'  => 'header',
          'container'       => 'div',
          'container_class' => 'navbar-nav ms-auto py-0',
          'container_id'    => '',
          'items_wrap'      => '%3$s',
          'walker'          => new Mailler_Bootstrap_Navwalker(),
          'depth'           => 2,
          'fallback_cb'     => false,
        ));
        ?>
        <a href="#" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">Log In</a>
        <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4">Sign Up</a>
      </div>
    </nav>
    <!-- Navbar End -->