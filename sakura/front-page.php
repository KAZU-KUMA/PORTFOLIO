<?php get_header(); ?>
<main class="main">
      <div class="mv">
        <div class="mv__item inner">
          <h2 class="mv__item-title" style="white-space: nowrap;">日本の春の象徴「桜」</h2>
          <p class="mv__item-desc">
            春の代表的な花といえば桜ですよね。<br />
            桜を見て春の訪れを感じる方はたくさんいると思います。<br />
            歴史のある花で古くから日本人に愛されてきました。<br />
          </p>
        </div>
        <!--.mv__item-->
      </div>
      <!--.mv-->

      <section class="news" id="news">
        <div class="inner">
          <h3 class="news__title ttl">NEWS</h3>

          <div class="news__wrap">
            <?php
            $args  = array(
                'post_type' => 'news',
                'posts_per_page' => 3,
                'orderby' => 'news_day',
                'order' => 'DESC',
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();?>
                    <div class="news__item">
                        <div class="news__item-date"><?=esc_html(get_field('news_day'));?></div>
                        <div class="news__item-text"><?=esc_html(get_field('news_title'));?></div>
                    </div><!--.news__item-->
                <?php endwhile;
            endif; ?>
          </div><!--.news_wrap-->
        </div><!--.inner-->
      </section><!--.news-->


      <section class="about" id="about">
        <div class="inner">
          <h3 class="about__title ttl">ABOUT</h3>

          <div class="about__wrap">
            <?php
            $args  = array(
                'post_type' => 'about',
                'posts_per_page' => 4,
                'order' => 'ASC',
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();?>
                    <div class="about__item">
                        <div class="about__item-img">
                            <?php $image = get_field('about_image'); ?>
                            <img src="<?=$image['url']; ?>" alt="<?= $image['alt']; ?>" />
                        </div><!--.about__item-img-->
                        <div class="about__item-texts">
                            <div class="about__item-texts-title"><?=esc_html(get_field('about_title'));?></div>
                            <p class="about__item-texts-desc"><?=esc_html(get_field('about_text'));?></p>
                        </div><!--.about__item-texts-->
                    </div><!--.about__item-->
                <?php endwhile;
            endif; ?>
          </div><!--.about_wrap-->
        </div><!--.inner-->
      </section><!--.about-->

      <section class="spots" id="spots">
        <div class="inner">
          <h3 class="spots__title ttl">SPOTS</h3>

          <div class="spots__wrap slider">
            <?php
            $args  = array(
                'post_type' => 'spots',
                'posts_per_page' => 5,
                'order' => 'ASC',
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();?>
                    <div class="spots__item">
                        <div class="spots__item-img">
                            <?php $image = get_field('spots_image'); ?>
                            <img src="<?=$image['url']; ?>" alt="<?= $image['alt']; ?>" />
                        </div>
                        <!--.spots__item-img-->
                        <div class="spots__item-texts">
                            <div class="spots__item-texts-title"><?=esc_html(get_field('spots_title'));?></div>
                            <p class="spots__item-texts-desc"><?=esc_html(get_field('spots_text'));?></p>
                        </div><!--.spots__item-texts-->
                    </div><!--.spots__item-->
                <?php endwhile;
                endif; ?>
          </div><!--.spots_wrap-->
        </div><!--.inner-->
      </section><!--.spots-->

      <section class="gallery" id="gallery">
        <div class="inner">
          <h3 class="gallery__title ttl">GALLERY</h3>
          <div class="gallery__wrap">
            <?php
            $args  = array(
                'post_type' => 'gallery',
                'posts_per_page' => 18,
                'order' => 'ASC',
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();?>
                <div class="gallery__item">
                    <?php $image = get_field('gallery_image'); ?>
                    <a href="<?=$image['url']; ?>" rel="lightbox"><img src="<?=$image['url']; ?>" /></a>
                </div><!-- .gallery__item -->
                <?php endwhile;
            endif; ?>
          </div><!--.gallery_wrap-->
        </div><!--.inner-->
      </section><!--.gallery-->

      <section class="contact" id="contact">
        <div class="inner">
          <h3 class="contact__title ttl">CONTACT</h3>
          <div class="contact__wrap">
            <form action="/portfolio/contact/" method="POST" id="form">
              <div class="contact__item">
                <label for="name">お名前<span class="required">必須</span></label>
                <input type="text" id="name" name="username" />
              </div>
              <div class="contact__item">
                <label for="email">メールアドレス<span class="required">必須</span></label>
                <input type="text" id="email" name="email" />
              </div>
              <div class="contact__item">
                <label for="message">メッセージ<span class="required">必須</span></label>
                <textarea id="message" name="message"></textarea>
              </div>
              <input type="submit" class="submit" value="送信" />
            </form>
          </div>
          <!--.contact__wrap-->
        </div>
        <!--.inner-->
      </section>
      <!--.contact-->
    </main>
<?php get_footer(); ?>