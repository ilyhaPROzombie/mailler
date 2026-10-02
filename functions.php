<?php
if (! defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mailler_setup()
{
  /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mailler, use a find and replace
		* to change 'mailler' to the name of your theme in all the template files.
		*/
  load_theme_textdomain('mailler', get_template_directory() . '/languages');

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
  add_theme_support('title-tag');

  /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
  add_theme_support('post-thumbnails');

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
    array(
      'header'    => 'Шапка', // Название слота для меню в шаблоне
      'footer' => 'Подвал'   // Название другого слота меню в шаблоне
    )
  );

  /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    )
  );

  // Set up the WordPress core custom background feature.
  add_theme_support(
    'custom-background',
    apply_filters(
      'mailler_custom_background_args',
      array(
        'default-color' => 'ffffff',
        'default-image' => '',
      )
    )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support(
    'custom-logo',
    array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    )
  );
}
add_action('after_setup_theme', 'mailler_setup');

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Основные настройки',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки шапки',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки подвала',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/**
 * Enqueue scripts and styles.
 */
// правильный способ подключить стили и скрипты
function mailler_scripts()
{

  // <!-- Google Web Fonts -->
  // Внимание: preconnect лучше не подключать через wp_enqueue_style. Эти строки удалены.
  wp_enqueue_style('mailler-google-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap', array(), null);

  // <!-- Icon Font Stylesheet -->
  wp_enqueue_style('mailler-fontawesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css', array(), null);
  wp_enqueue_style('mailler-bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css', array(), null);

  // <!-- Libraries Stylesheet -->
  // Используем get_template_directory_uri() и уникальные handle!
  wp_enqueue_style('mailler-animate', get_template_directory_uri() . '/lib/animate/animate.min.css', array(), _S_VERSION);
  wp_enqueue_style('mailler-owlcarousel', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css', array(), _S_VERSION);
  wp_enqueue_style('mailler-lightbox', get_template_directory_uri() . '/lib/lightbox/css/lightbox.min.css', array(), _S_VERSION);

  // <!-- Customized Bootstrap Stylesheet -->
  wp_enqueue_style('mailler-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION);

  // <!-- Template Stylesheet (главный style.css темы) -->
  wp_enqueue_style('mailler-main-style', get_stylesheet_uri(), array(), _S_VERSION);

  // <!-- Scripts -->
  // jQuery
  wp_enqueue_script('mailler-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', array(), '3.6.4', true);

  // Bootstrap
  wp_enqueue_script('mailler-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', array(), '5.0.0', true);

  // Скрипты, которым нужна jQuery (указываем mailler-ajax в зависимостях)
  wp_enqueue_script('mailler-wow', get_template_directory_uri() . '/lib/wow/wow.min.js', array('mailler-jquery'), _S_VERSION, true);
  wp_enqueue_script('mailler-easing', get_template_directory_uri() . '/lib/easing/easing.min.js', array('mailler-jquery'), _S_VERSION, true);
  wp_enqueue_script('mailler-waypoints', get_template_directory_uri() . '/lib/waypoints/waypoints.min.js', array('mailler-jquery'), _S_VERSION, true);
  wp_enqueue_script('mailler-counterup', get_template_directory_uri() . '/lib/counterup/counterup.min.js', array('mailler-jquery'), _S_VERSION, true);
  wp_enqueue_script('mailler-owlcarousel', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', array('mailler-jquery'), _S_VERSION, true);
  wp_enqueue_script('mailler-lightbox', get_template_directory_uri() . '/lib/lightbox/js/lightbox.min.js', array('mailler-jquery'), _S_VERSION, true);
  wp_enqueue_script('mailler-main', get_template_directory_uri() . '/js/main.js', array('mailler-jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'mailler_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}



// ччч

class Mailler_Bootstrap_Navwalker extends Walker_Nav_Menu
{
  public function start_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '<div class="dropdown-menu m-0">';
  }

  public function end_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '</div>';
  }

  public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $item_classes = empty($item->classes) ? array() : (array) $item->classes;
    $has_children = in_array('menu-item-has-children', $item_classes, true);
    $is_active    = (bool) array_intersect(
      array('current-menu-item', 'current-menu-ancestor', 'current-menu-parent'),
      $item_classes
    );
    $active = $is_active ? ' active' : '';

    if ($depth === 0) {
      if ($has_children) {
        $output .= '<div class="nav-item dropdown">';
        $output .= '<a href="' . esc_url($item->url) . '" class="nav-link dropdown-toggle' . $active . '" data-bs-toggle="dropdown">';
      } else {
        $output .= '<a href="' . esc_url($item->url) . '" class="nav-item nav-link' . $active . '">';
      }
    } else {
      $output .= '<a href="' . esc_url($item->url) . '" class="dropdown-item' . $active . '">';
    }

    $output .= esc_html($item->title) . '</a>';
  }

  public function end_el(&$output, $item, $depth = 0, $args = null)
  {
    $item_classes = empty($item->classes) ? array() : (array) $item->classes;
    if ($depth === 0 && in_array('menu-item-has-children', $item_classes, true)) {
      $output .= '</div>';
    }
  }
}

require 'breadcrumbs.php';

// Отключаем автоматические <p> и <br> в формах CF7
add_filter( 'wpcf7_autop_or_not', '__return_false' );

