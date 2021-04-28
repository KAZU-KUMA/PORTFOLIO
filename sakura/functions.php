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
    // JQuery
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' );
    // slick
    wp_enqueue_script( 'slide-script', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0', true );
    // scrollreveal
    wp_enqueue_script( 'scrollreveal-script', get_template_directory_uri() . '/js/scrollreveal.min.js', array(), '1.0', true );
    // validate
    wp_enqueue_script( 'validate-script', get_template_directory_uri() . '/js/validate.min.js', array(), '1.0', true );
    // progressbar
    wp_enqueue_script( 'sprogressbar-script', get_template_directory_uri() . '/js/progressbar.min.js', array(), '1.0', true );
    // textanimation
    wp_enqueue_script( 'textanime-script', get_template_directory_uri() . '/js/textAnimation.min.js', array(), '1.0', true );
    // particles
    wp_enqueue_script( 'particles-script', '//cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js', array(), '1.0', true );
    // JSファイル
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );