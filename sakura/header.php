<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- ファビコン -->
    <link rel="icon" href="<?= get_template_directory_uri(); ?>/img/favicon.png" type="image/png" />
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
    <?php if(!is_front_page()){ ?>
        <style>
        div.header__nav-sp,
        .snowfall-flakes {
          display:none;
        }
        </style>
    <?php } ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php if(is_front_page()){ ?>
        <div id="loading"></div>
    <?php } ?>

    <header class="header">
      <div class="inner">
        <h1 class="header__logo">
          <a href="/portfolio/">SAKURA</a>
        </h1>

        <nav class="header__nav">
          <ul class="menu">
            <li class="menu__list"><a href="#news">NEWS</a></li>
            <li class="menu__list"><a href="#about">ABOUT</a></li>
            <li class="menu__list"><a href="#spots">SPOTS</a></li>
            <li class="menu__list"><a href="#gallery">GALLERY</a></li>
            <li class="menu__list"><a href="#contact">CONTACT</a></li>
          </ul>
        </nav>
        <div class="header__nav-sp">
          <div class="header__nav-sp-line"></div>
        </div>
      </div>
      <!--.inner-->
    </header>