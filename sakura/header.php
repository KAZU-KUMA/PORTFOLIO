<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="robots" content="noindex,nofollow" />
    <!-- スマホ用アイコン画像 -->
    <link rel="apple-touch-icon" href="<?= get_template_directory_uri(); ?>/img/apple-touch-icon.png"  type="image/png" sizes="180x180"/>
    <!-- ファビコン -->
    <link rel="icon" href="<?= get_template_directory_uri(); ?>/img/favicon.png" type="image/png" sizes="16x16"/>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700;900&display=swap"
    />
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php if(is_front_page()){ ?>
        <div id="loading">
          <!-- <div id="loading__text"></div> -->
          　<img src="<?= get_template_directory_uri(); ?>/img/loading.gif" />
        </div>
    <?php } ?>

    <div id="cursor"></div>
    <div id="follower"></div>

    <header class="header">
      <div class="inner">
        <h1 class="header__logo">
          <a href="/portfolio/">SAKURA</a>
        </h1>

        <nav class="header__nav" id="hm-nav">
          <ul class="menu">
            <li class="menu__list"><a href="#news">NEWS</a></li>
            <li class="menu__list"><a href="#about">ABOUT</a></li>
            <li class="menu__list"><a href="#spots">SPOTS</a></li>
            <li class="menu__list"><a href="#gallery">GALLERY</a></li>
            <li class="menu__list"><a href="#contact">CONTACT</a></li>
          </ul>
        </nav>
        <div class="header__nav-sp" id="hm-btn">
          <div class="header__nav-sp-line"></div>
        </div>
      </div>
      <!--.inner-->
    </header>