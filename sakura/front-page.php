<?php get_header(); ?>
<main class="main">
      <div class="mv" id="mv">
        <div class="mv__img" id="pp-scale"></div>

        <div class="mv__item inner">
          <h2 class="mv__item-title"  id="arctext">日本の春の象徴</h2>
          <p class="mv__item-desc" id="ta">
            春の代表的な花といえば桜ですよね。<br />
            桜を見て春の訪れを感じる方はたくさんいると思います。<br />
            歴史のある花で古くから日本人に愛されてきました。<br />
          </p>
        </div><!--.mv__item-->
      </div><!--.mv-->
      
      <div class="wrapper" id="wrapper">         
        <div class="onoffswitch">
          <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="onoffswitch" tabindex="0">
          <label class="onoffswitch-label" for="onoffswitch"></label>
        </div>
    　</div>


      <article id="info">
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

          <div class="news__wrap" data-aos="zoom-in-up">
            <?php
            $args  = array(
                'post_type' => 'news',
                'posts_per_page' => 3,
                'order' => 'news_day',
                'orderby' => 'DESC',
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



      <section class="weather" id="weather">
      <div class="inner">
      <h3 class="weather__title ttl">WEATHER <br><span>&#9660;地域を選択して天気と気温を確認&#9660;</span></h3>
        <div class="weather__wrap" data-aos="zoom-in-up">
            <form action="" method="POST" id="select">
              <select name="select">
                <option value="" selected>都道府県</option>
                <option value="Hokkaido">北海道</option>
                <option value="Miyagi">宮城県</option>
                <option value="Niigata">新潟県</option>
                <option value="Tokyo">東京都</option>
                <option value="Aichi">愛知県</option>
                <option value="Osaka">大阪府</option>
                <option value="Fukuoka">福岡県</option>
                <option value="Okinawa">沖縄県</option>
              </select>
            </form>
            <div id="output">
              <table class="init">
                <tr>
                  <th>天気</th>
                  <th>気温</th>
                </tr>
                <tr>
                  <td>---</td>
                  <td>---</td>
                </tr>
              </table>
            </div><!-- output -->
          </div><!--.weather_wrap-->
      </div><!--.inner-->
      </section><!--.weather-->



      <section class="topic" id="topic">
      <div class="inner">
        <h3 class="topic__title ttl">TOPIC</h3>

        <div class="topic__wrap" data-aos="zoom-in-up">
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
                        <img class="lazyload" src="<?=$image['url']; ?>" alt="<?= $image['alt']; ?>" />
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
                        <img class="lazyload" src="<?=$image['url']; ?>" alt="<?= $image['alt']; ?>" />
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
      </article>
      

    
      <div id="about__bg-s">
        <div id="about__bg-m">
          <div id="about__bg-l">
            <div class="about__message"><span id="wording">風景と共に桜を楽しむ</span></div>
            <section class="about" id="about">
              <div class="inner">
                <h3 class="about__title ttl">ABOUT</h3>

                <div class="about__wrap">
                <div class="about__item" data-aos="zoom-in-up">
                  <div class="about__item-texts"  style="padding-top:0;">
                      <div class="about__item-texts-title">桜とは</div>
                      <p class="about__item-texts-desc"><span class="marker">桜(cherry blossom)は植物学上ではバラ科サクラ亜科サクラ属の落葉高木または低木の樹木です。</span>
                        北半球に広く分布していますが、特に日本列島には多くの種類が生育しています。</br></br>
                        ソメイヨシノが有名ですが、桜には多くの種類があり、花の大きさや花弁の枚数・色などが異なります。
                        もともと野生の桜が100種類以上あるのですが、さらに品種改良や種間交配がなされた園芸品種は200種類以上もあります。</br></br>
                        「さくら」の語源は、「咲く」に複数を意味する「ら」をつけて「さくら」と呼んだという説など諸説あります。</p>
                  </div><!--.about__item-texts-->
                </div><!--.about__item-->

                  <?php
                  $args  = array(
                      'post_type' => 'about',
                      'posts_per_page' => 4,
                      'orderby' => 'ASC',
                  );
                  $the_query = new WP_Query( $args );
                  if ( $the_query->have_posts() ) :
                      while ( $the_query->have_posts() ) : $the_query->the_post();?>
                          <div class="about__item">
                              <div class="about__item-img">
                                  <?php $image = get_field('about_image'); ?>
                                  <img  class="lazyload" src="<?=$image['url']; ?>" alt="<?= $image['alt']; ?>" />
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

              <div id="skrollr">
                <div class="skrollr__img before" data-4550="opacity:1;" data-4800="opacity:0;"></div>
                <div class="skrollr__img after" data-4550="tranform:traslateY(0%);" data-4800="tranform:traslateY(100%);"></div>
              </div><!-- skrollr -->
              <div id="twentytwenty">
                <?php echo do_shortcode( '[twenty20 img1="188" img2="189" offset="0.5"]' ); ?>
                </div><!-- TwentyTwenty-->

              <div class="inner border">
              <div class="about__wrap">
                <div class="about__item">
                  <div class="about__item-texts" style="padding-top:0;">
                    <div class="about__item-texts-title" data-aos="fade-right">日本三大桜</div>
                      <dl class="about__item-texts-desc" data-aos="fade-right">
                        <dt>&#9312;三春滝桜</dt>
                        <dd>三春滝桜があるのは、福島県田村郡三春町大字滝字桜久保。エドヒガン系の紅枝垂桜（ベニシダレザクラ）で、日本三大桜であるとともに、樹高12m、根回り11m、幹周り9.5m、枝張り東西22m・南北18mと、三大巨桜としても知られています。</dd>
                        <dt>&#9313;山高神代桜</dt>
                        <dd>背後に南アルプスを望む、山梨県北杜市武川町山高の実相寺境内にあるエドヒガンザクラ。樹齢1800年とも2000年ともいわれる老木で、樹高10.3ｍ、根元・幹周り11.8ｍの巨木。幹の上部は朽ちていますが根元近くから新しい枝を張り花を咲かせています。</dd>
                        <dt>&#9314;根尾谷淡墨桜</dt>
                        <dd>岐阜県本巣市の淡墨公園にあるエドヒガンザクラで、高16.3m、幹囲目通り9.91m、枝張りは東西26.90m、南北20.20m。つぼみのときは薄いピンク色で、満開になると白色、散り際には淡い墨色を帯びるのが特徴で、名前の由来にもなっています。</dd>
                      </dl>

                      <div class="about__item-texts-title" data-aos="fade-left">日本三大夜桜</div>
                      <dl class="about__item-texts-desc" data-aos="fade-left">
                        <dt>&#9312;弘前公園</dt>
                        <dd>弘前公園では桜の開花時期になると毎年弘前さくらまつりが開催されます。見どころは、桜のトンネルと夜桜。特にライトアップされた夜桜は幻想的で、弘前城と夜桜のコントラストも見事である。</dd>
                        <dt>&#9313;上野恩賜公園</dt>
                        <dd>上野公園を春色に染める桜は、約50品種、約1200本。「日本さくら名所100選」に指定されており、毎年「うえの桜まつり」も開催されます。約200万人もの花見客が訪れる、押しも押されもせぬ「桜の名所」となりました。</dd>
                        <dt>&#9314;高田公園</dt>
                        <dd>高田公園には約4000本の桜があり、毎年4月に開かれる「高田城百万人観桜会」では約3000個のぼんぼりに灯がともされ、県内外から多くの観光客が訪れる。</dd>
                      </dl>
                  </div><!--.about__item-texts-->
                </div><!--.about__item-->
                </div><!--.about_wrap-->
              </div><!--.inner-->

            </section><!--.about-->
          </div><!-- .about__bg-l -->
        </div><!-- .about__bg-m -->
      </div><!-- .about__bg-s -->



      <section class="spots" id="spots">
        <div class="inner">
          <h3 class="spots__title ttl">SPOTS</h3>

          <div class="spots__wrap" id="slider">
            <?php
            $args  = array(
                'post_type' => 'spots',
                'posts_per_page' => 5,
                'orderby' => 'ASC',
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();?>
                    <div class="spots__item">
                        <div class="spots__item-img" data-aos="flip-left">
                            <?php $image = get_field('spots_image'); ?>
                            <img class="lazyload" src="<?=$image['url']; ?>" alt="<?= $image['alt']; ?>" />
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

          <!-- ========================================== -->
          <div id="slick">
            <?php
            $args  = array(
              'post_type' => 'gallery',
              'orderby' => 'ASC',
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
              while ( $the_query->have_posts() ) : $the_query->the_post();?>
                <div class="gallery__item span2">
                  <?php $image = get_field('gallery_image'); ?>
                  <img class="lazyload" src="<?=$image['url']; ?>" />
                </div><!-- .gallery__item -->
                <?php endwhile;
            endif; ?>
          </div><!--.gallery_wrap-->
          <!-- ========================================== -->   
          
          <div class="gallery__wrap">
            <?php
            $args  = array(
              'post_type' => 'gallery',
                'posts_per_page' => 36,
                'orderby' => 'rand',
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();?>
                <div class="gallery__item">
                    <?php $image = get_field('gallery_image'); ?>
                    <a href="<?=$image['url']; ?>" rel="lightbox"><img class="lazyload" src="<?=$image['url']; ?>" /></a>
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



      <section  class="privacy" id="privacy">
        <div class="inner">
        <div id="service">
            <?php $page_data = get_page_by_path('service'); 
            $page = get_post($page_data);
            $content = $page -> post_content; 
            echo $content; ?>
        </div><!-- .service -->

          <div id="policy">
              <?php $page_data = get_page_by_path('policy'); 
              $page = get_post($page_data);
              $content = $page -> post_content; 
              echo $content; ?>
            </div><!-- .policy -->
          </div><!--.inner-->
      </section><!--.privacy-->
</main>
<?php get_footer(); ?>