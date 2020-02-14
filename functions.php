<?php
//基本設定
function mytheme_setup()
{
  //ページのタイトルを出力」
  add_theme_support(' title-tag ');
  //ページのタイトルを出力
  add_theme_support('post-thumbnails');
  //ナビゲーションメニュー
  register_nav_menus(array(
    'primary' => 'メイン',
  ));

  // editor css
  add_theme_support('editor-styles');
  add_editor_style('editor-style.css');

  // グーテンベルグの由来css(theme.min.css)
  add_theme_support('wp-block-styles');
  // 埋め込みコンテンツ用のレスポンシブ化
  add_theme_support('responsive-embeds');
  //幅広・全域　
  add_theme_support('align-wide');
}

add_action('after_setup_theme', 'mytheme_setup');

//ウィジェット
function mytheme_widgets()
{
  register_sidebar(array(
    'id' => 'sidebar-1',
    'name' => 'サイドメニュー',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>'
  ));
}
add_action('widgets_init', 'mytheme_widgets');

// css
function mytheme_enqueue()
{
  // FOnt Awesome
  wp_enqueue_style('mytheme_fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css', array(), null);
  // google font
  wp_enqueue_style('mytheme-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,800', array(), null);
  // テーマのCSS
  wp_enqueue_style('mytheme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue');


// フロントとエディタの両方に適用するCSS
function mytheme_both()
{
  wp_enqueue_style(
    'mytheme-style-both',
    get_template_directory_uri() . '/style-both.css',
    array(),
    filemtime(get_template_directory() . '/style-both.css')
  );
}
add_action('enqueue_block_assets', 'mytheme_both');


// Font Awesomeの属性
function mytheme_sri($html, $handle)
{
  if ($handle === 'mytheme-fontawesome') {
    return str_replace(
      '/>',
      'integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"' . ' />',
      $html
    );
  }
  return $html;
}
add_filter('style_loader_tag', 'mytheme_sri', 10, 2);

// ブロツクスタイル
function myjs_enqueue()
{
  wp_enqueue_script(
    'myjs-style',
    get_template_directory_uri() . '/mystyle.js',
    array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
    filemtime(get_template_directory() . '/mystyle.js')

  );
}
add_action('enqueue_block_editor_assets', 'myjs_enqueue');

// グーテンベルグを使ったランディングページ

function lp_guten_front()
{
  if (is_page('ランディングページ：グーテンベルグ')) {
    wp_enqueue_style(
      'lp-guten-front-css',
      get_template_directory_uri() . '/lp-guten/lp-guten-front.css',
      array(),
      filemtime(get_template_directory() . '/lp-guten/lp-guten-front.css')
    );
  }
}

add_action('wp_enqueue_scripts', 'lp_guten_front');


function lp_guten_both()
{
  global $post;
  if ($post->post_title == 'ランディングページ：グーテンベルグ') {
    wp_enqueue_style(
      'lp-guten-both-css',
      get_template_directory_uri() . '/lp-guten/lp-guten-both.css',
      array(),
      filemtime(get_template_directory() . '/lp-guten/lp-guten-both.css')
    );
  }
}
add_action('enqueue_block_assets', 'lp_guten_both');

function lp_guten_editor()
{
  global $post;
  if ($post->post_title == 'ランディングページ：グーテンベルグ') {
    wp_enqueue_script(
      'lp-guten-js',
      get_template_directory_uri() . '/lp-guten/lp-guten.js',
      array(),
      filemtime(get_template_directory() . '/lp-guten/lp-guten.js')
    );
  }
}

add_action('enqueue_block_editor_assets', 'lp_guten_editor');
