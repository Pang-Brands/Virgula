<?php
add_theme_support('post-thumbnails');

define('THEMELIB', TEMPLATEPATH . '/extension');
define('COMPOSER', TEMPLATEPATH . '/vendor');
require_once(COMPOSER . '/autoload.php');

global $qdi_config;

$root = dirname(__FILE__);
$qdi_config_path = implode(DIRECTORY_SEPARATOR, array($root, 'config'));
$qdi_config = \Qdi\WP\Utils::load_config($qdi_config_path);
\Qdi\WP\Theme::initialize($qdi_config);

$theme_version = wp_get_theme();
$theme_version = $theme_version->get('Version');

define('PATHS_INC', TEMPLATEPATH . '/includes');
define('PATHS_SVG', PATHS_INC . '/svg');
define('PATHS_PARTIALS', PATHS_INC . '/partials');
define('THEME_VERSION', $theme_version);
define('ENV', $qdi_config['env']['env']);
define('FB_APP_ID', $qdi_config['env']['fb_app_id']);
define('FB_ACCESS_TOLKEN', $qdi_config['env']['fb_access_tolken']);
define('LIB', TEMPLATEPATH . '/lib');

// Functions
require_once(THEMELIB . '/helpers.php');
require_once(THEMELIB . '/theme-customizer.php');
require_once(THEMELIB . '/query-filters.php');
require_once(THEMELIB . '/ajax.php');
require_once(LIB . '/parsedown/Parsedown.php');

global $tpl_engine;
global $cache_engine;
global $gpi_settings;


$gpi_settings = get_theme_mod('cpssu_general_theme_settings');

function gpi_setting($key)
{
  global $gpi_settings;

  if (empty($gpi_settings) || !is_array($gpi_settings)) {
    return false;
  }

  if (!array_key_exists($key, $gpi_settings)) {
    return false;
  }

  return $gpi_settings[$key];
}

$tpl_engine = new \Qdi\WP\Template(array(
  'base_path' => PATHS_INC
));

$cache_engine = new \Qdi\WP\Cache(array(
  'prefix' => '_gpi_cache',
  'debug' => false
));

function register_site_scripts()
{
  if (is_admin()) {
    return false;
  }

  $main_queue = null;
  $public_js_dir = get_template_directory_uri();
  $public_js_dir .= '/public/js/';

  $main_js = (ENV == 'production') ? 'app.min.js' : 'app.js';
  $main_js = $public_js_dir . $main_js;
  wp_enqueue_script('main_js', $main_js, $main_queue, THEME_VERSION, true);

  $js_vars = array(
    'ajaxUrl' => get_permalink(get_page_by_title('Ajax')),
    'env' => ENV,
    'homeUrl' => get_bloginfo('url')
  );
  wp_localize_script('main_js', 'phpVars', $js_vars);
}
add_action('wp_enqueue_scripts', 'register_site_scripts');

add_action('init', 'wp_snippet_author_base');
function wp_snippet_author_base()
{
  global $wp_rewrite;
  $author_slug = 'autor'; // the new slug name
  $wp_rewrite->author_base = $author_slug;
}

function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function gpi_theme_setup()
{
  register_nav_menus(array(
    'header' => 'Header Menu principal',
    'footer' => 'Footer Menu',
  ));
}

add_action('after_setup_theme', 'gpi_theme_setup');

if ($GLOBALS['pagenow'] === 'wp-login.php') {
  ob_start();
}

$is_builder = false;
if (array_key_exists('fl_builder', $_GET)) {
  $is_builder = true;
}


add_action('login_form', function ($args) {
  $login = ob_get_contents();
  ob_clean();
  $login = str_replace('id="user_pass"', 'id="user_pass" autocomplete="off"', $login);
  $login = str_replace('id="user_login"', 'id="user_login" autocomplete="off"', $login);
  echo $login;
}, 9999);

add_filter('xmlrpc_methods', function ($methods) {
  unset($methods['pingback.ping']);
  return $methods;
});

if ((ENV != 'production')) {
  add_action('wp', 'refresh_bb_cache');
}

function refresh_bb_cache()
{
  if (FLBuilderModel::is_builder_enabled()) {
    FLBuilder::render_js();
    FLBuilder::render_css(); // You can also do this to flush the CSS.
  }
}

function processarArquivo($urlArquivo)
{
  // Obtém a extensão do arquivo
  $extensao = pathinfo($urlArquivo, PATHINFO_EXTENSION);

  // Verifica se a extensão é SVG
  if (strtolower($extensao) === 'svg') {
    // Se for SVG, importa o conteúdo do arquivo
    $conteudo = file_get_contents($urlArquivo);
    return $conteudo;
  } else {
    // Se não for SVG, retorna apenas a URL
    return $urlArquivo;
  }
}

function download_icon_item($atts, $content = null)
{
	$default = array(

	);
	$shortcode_atts = shortcode_atts($default, $atts);
	$content = do_shortcode($content);
	$html = '<p class="u-icondownload">';
	$html .= $content . '</p>';
	return $html;
}
add_shortcode('icondownload', 'download_icon_item');

function lista_cols($atts, $content = null)
{
	$default = array(

	);
	$shortcode_atts = shortcode_atts($default, $atts);
	$content = do_shortcode($content);
	$html = '<div class="u-list-cols">';
	$html .= $content . '</div>';
	return $html;
}
add_shortcode('listacols', 'lista_cols');

function lista_cols_col($atts, $content = null)
{
	$default = array(

	);
	$shortcode_atts = shortcode_atts($default, $atts);
	$content = do_shortcode($content);
	$html = '<div class="u-list-cols__col">';
	$html .= $content . '</div>';
	return $html;
}
add_shortcode('listacols-col', 'lista_cols_col');

function linkbox($atts, $content = null)
{
	$default = array(

	);
	$shortcode_atts = shortcode_atts($default, $atts);
	$content = do_shortcode($content);
	$html = '<div class="u-linkbox">';
	$html .= $content . '</div>';
	return $html;
}
add_shortcode('linkbox', 'linkbox');