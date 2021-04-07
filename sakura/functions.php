<?php
// CSS読み込み
function my_styles() {
    // リセットCSS
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/normalize.css', array(), '1.0', false);
    // CSSファイル
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/style.css', array('reset'), '1.0', false);
    // slick
    wp_enqueue_style( 'slide-style', get_template_directory_uri() . '/css/slick.min.css', array('reset'), '1.0', false);
    wp_enqueue_style( 'slide2-style', get_template_directory_uri() . '/css/slick-theme.min.css', array('reset'), '1.0', false);
}
add_action( 'wp_enqueue_scripts', 'my_styles' );

// JavaScript/JQuery読み込み
function my_scripts() {
    //デフォルトJQuery削除
    wp_deregister_script('jquery');     
    //　JQuery
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' );
    // slick
    wp_enqueue_script( 'slide-script', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0', true );
    // scrollreveal
    wp_enqueue_script( 'scrollreveal-script', get_template_directory_uri() . '/js/scrollreveal.min.js', array(), '1.0', true );
    // validate
    wp_enqueue_script( 'validate-script', get_template_directory_uri() . '/js/validate.min.js', array(), '1.0', true );
    // JSファイル
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

// Googleフォント
function add_google_fonts() {
    wp_enqueue_style( ' add_google_fonts ', ' //fonts.googleapis.com/css2?Kiwi+Maru&display=swap&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );
