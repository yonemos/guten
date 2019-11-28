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

// Font Awesomeの属性
// function mytheme_sri($html, $handle)
// {
//   if ($handle === 'mytheme-fontawesome') {
//     return str_replace(
//       '/>',
//       '' . ' />',
//       $html

//     );
//   }
// }
