<?php get_header(); ?>
<main class="main">
      <div class="mv" id="mv">
        <div class="mv__img"></div>

        <div class="mv__item inner">
          <h2 class="mv__item-title">日本の春の象徴「桜」</h2>
          <p class="mv__item-desc">
            春の代表的な花といえば桜ですよね。<br />
            桜を見て春の訪れを感じる方はたくさんいると思います。<br />
            歴史のある花で古くから日本人に愛されてきました。<br />
          </p>
        </div><!--.mv__item-->
      </div><!--.mv-->
      
      <div class="wrapper" id="wrapper"></div>

      
      <section class="news" id="news">
      <div class="custom-shape-divider-bottom-1619256456">
          <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
              <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
              <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
              <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
          </svg>
      </div>
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


      <section class="topic" id="topic">

      <div class="inner">
        <h3 class="topic__title ttl">TOPIC</h3>

        <div class="topic__wrap">
          <div class="topic__item">
          <?php
            $args  = array(
                'post_type' => 'topic',
                'posts_per_page' => 1,
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();?>
                <table class="topic__table">
                <tr>
                    <th>案内</th>
                    <td  style="padding:0;">
                      <div class="topic__item-img">
                        <?php $image = get_field('topic_image'); ?>
                        <img src="<?=$image['url']; ?>" alt="<?= $image['alt']; ?>" />
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>名称</th>
                    <td><?=esc_html(get_field('topic_name'));?></td>
                  </tr>
                  <tr>
                    <th>開催期間</th>
                    <td><?=esc_html(get_field('topic_date'));?><br/><?=esc_html(get_field('topic_time'));?></td>
                  </tr>
                  <tr>
                    <th>開催場所</th>
                    <td><?=esc_html(get_field('topic_area'));?></td>
                  </tr>
                  <tr>
                    <th>交通アクセス</th>
                    <td><?=esc_html(get_field('topic_access'));?></td>
                  </tr>
                  <tr>
                    <th>地図</th>
                    <td  style="padding:0;">
                      <div class="topic__item-map">
                        <?php $image = get_field('topic_map'); ?>
                        <img src="<?=$image['url']; ?>" alt="<?= $image['alt']; ?>" />
                      </div>
                    </td>
                  </tr>
                </table>
            <?php endwhile;
            endif; ?>
            </div><!-- .topic__item -->
          </div><!--.topic_wrap-->
      </div><!--.inner-->
      </section><!--.topic-->


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
                        </div><!--.spots__item-img-->
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
                'posts_per_page' => 36,
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
          <div class="btn">
              <button　class="btn__more">もっと見る</button>
          </div>
        </div><!--.inner-->
      </section><!--.gallery-->

      <section class="contact" id="contact">
        <div class="inner">
          <h3 class="contact__title ttl">CONTACT</h3>
          <div class="contact__wrap">
            <?php //echo do_shortcode( '[contact-form-7 id="135" title="コンタクトフォーム"]' ); ?>
            
            <form id="form">
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
                  <textarea id="message" name="message" placeholder="お問い合わせ内容など、ご自由にお書き下さい。"></textarea>
                </div>
              
                <input type="submit" class="submit"  value="送信" /> 
            </form>
 
            <div id="result"></div>
          </div><!--.contact__wrap-->
        </div><!--.inner-->
      </section><!--.contact-->
    </main>
<?php get_footer(); ?>