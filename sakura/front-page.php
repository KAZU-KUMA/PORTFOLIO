<?php get_header(); ?>
<main class="main">
      <div class="mv" id="mv">
        <div class="mv__img" id="pp-scale"></div>

        <div class="mv__item inner">
          <h2 class="mv__item-title">日本の春の象徴</h2>
          <p class="mv__item-desc" id="ta">
            春の代表的な花といえば桜ですよね。<br />
            桜を見て春の訪れを感じる方はたくさんいると思います。<br />
            歴史のある花で古くから日本人に愛されてきました。<br />
          </p>
        </div><!--.mv__item-->
      </div><!--.mv-->
      
      <div class="wrapper" id="wrapper">         
         <div class="onoffswitch">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0">
              <label class="onoffswitch-label" for="myonoffswitch"></label>
          </div>
    　</div>

    <div id="bg1">
      <div id="bg2">
        <div id="bg3">
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

      <div id="test">風景と共に桜を楽しむ</div>

      <section class="about" id="about">
        <div class="inner">
          <h3 class="about__title ttl">ABOUT</h3>
          <div class="about__wrap">
          <div class="about__item">
            <div class="about__item-texts"  style="padding-top:0;">
                <div class="about__item-texts-title" style="text-align:center;">桜とは</div>
                <p class="about__item-texts-desc"><span class="marker">桜(cherry blossom)は植物学上ではバラ科サクラ亜科サクラ属の落葉高木または低木の樹木です。</span>
                  北半球に広く分布していますが、特に日本列島には多くの種類が生育しています。</br></br>
                  ソメイヨシノが有名ですが、桜には多くの種類があり、花の大きさや花弁の枚数・色などが異なります。
                  もともと野生の桜が100種類以上あるのですが、さらに品種改良や種間交配がなされた園芸品種は200種類以上もあります。</br></br>
                  「さくら」の語源は、「咲く」に複数を意味する「ら」をつけて「さくら」と呼んだという説など諸説あります。</p>
            </div><!--.about__item-texts-->
          </div><!--.about__item-->
            <div class="twentytwenty">
            <?php //echo do_shortcode( '[twenty20 img1="188" img2="189" offset="0.5"]' ); ?>
            </div><!-- TwentyTwenty-->

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

          <div class="spots__wrap" id="slider">
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

      <section  class="privacy" id="privacy">
      <div class="inner">
      <div id="service">
            <h3 class="service__title ttl">利用規約</h3>
            <div class="service__item wording">
              <p>本ウェブサイトは株式会社SAKURA（以下「当社」といいます）が運営しております。</p></br>
              <p>本ウェブサイトを利用される前に以下の利用条件をお読みいただき、これらの条件にご同意された場合のみご利用ください。本ウェブサイトをご利用されることにより、以下の条件にご同意されたものとみなします。なお、以下の条件は、予告なしに変更されることがあります。本条件が変更された場合、変更後の利用条件に従っていただきます。あらかじめご了承ください。</p></br>
              <h4>1. 著作権について</h4>
              <p>本ウェブサイト上のすべてのコンテンツに関する著作権は、特段の表示のない限り当社に帰属しております。そのすべてまたは一部を、法律にて定められる私的使用等の範囲を超えて、無断で複製、転用、改変、公衆送信、販売などの行為を行うことはできません。</p>
              <h4>2. 商標について</h4>
              <p>本ウェブサイトで使用されている商標・ロゴマーク・商号は、当社の登録商標または商標です。商標法またはその他の法律により認められている場合を除き、当社の事前の承諾なしに、これらを使用等することはできません。</p>
              <h4>3. 免責事項</h4>
              <p>当社は、本ウェブサイトに掲載されている内容について、その正確性、有用性、確実性について保証するものではなく、一切の責任を負わないものといたします。 当社は、予告なしに、本ウェブサイトの運営を中断または中止、掲載内容を修正、変更、削除する場合がありますが、それらによって生じるいかなる損害についても一切責任を負いません。また本ウェブサイトのご利用によりお客様または第三者のハードウェアおよびソフトウェア上に生じた事故、データの毀損・滅失等の損害について一切責任を負いません。</p>
              <h4>4. リンクについて</h4>
              <p>営利、非営利、イントラネットを問わず、本ウェブサイトへのリンクは自由です。 ただし、公序良俗に反するサイトなど、当社の信用、品位を損なうサイトからのリンクはお断りします。また事前事後にかかわらず、その他の理由によりリンクをお断りする場合もあります。</p>
              <h4>5. ご利用環境</h4>
              <p>当ウェブサイトは、OSはWindows、ブラウザはGoogle Chromeを推奨しております。その他のブラウザでご覧になると、機能の一部が正しく動作しない場合があります。また、当ウェブサイトは、JavaScriptを使用しているページがございます。ブラウザのJavaScript設定を無効にされている場合、正しく機能しない、もしくは正しく表示されないことがあります。</p>
            </div><!-- .wording -->
          </div><!-- .service -->
          <div id="policy">
            　<div class="policy__title ttl">プライバシーポリシー</div>
              <div class="policy__item wording">
                <p>株式会社SAKURA（以下「当社」といいます）は、以下のとおり個人情報保護方針を定め、個人情報保護の仕組みを構築し、全従業員に個人情報保護の重要性の認識と取組みを徹底させることにより、個人情報の保護を推進致します。</p></br>
                <h4>1. 個人情報の管理</h4>
                <p>当社は、お客さまの個人情報を正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止するため、セキュリティシステムの維持・管理体制の整備・社員教育の徹底等の必要な措置を講じ、安全対策を実施し個人情報の厳重な管理を行ないます。</p>
                <h4>2. 個人情報の利用目的</h4>
                <p>お客さまからお預かりした個人情報は、当社からのご連絡や業務のご案内やご質問に対する回答として、電子メールや資料のご送付に利用いたします。</p>
                <h4>3. 個人情報の第三者への開示・提供の禁止</h4>
                <p>当社は、お客さまよりお預かりした個人情報を適切に管理し、次のいずれかに該当する場合を除き、個人情報を第三者に開示いたしません。</p>
                <ul>
                  <li>お客さまの同意がある場合</li>
                  <li>お客さまが希望されるサービスを行なうために当社が業務を委託する業者に対して開示する場合</li>
                  <li>法令に基づき開示することが必要である場合</li>
                </ul>
                <h4>4. 個人情報の安全対策</h4>
                <p>当社は、個人情報の正確性及び安全性確保のために、セキュリティに万全の対策を講じています。</p>
                <h4>5. ご本人の照会</h4>
                <p>お客さまがご本人の個人情報の照会・修正・削除などをご希望される場合には、ご本人であることを確認の上、対応させていただきます。</p>
                <h4>6. 法令、規範の遵守と見直し</h4>
                <p>当社は、保有する個人情報に関して適用される日本の法令、その他規範を遵守するとともに、本ポリシーの内容を適宜見直し、その改善に努めます。</p>
                <h4>7. お問い合せ</h4>
                <p>当社の個人情報の取扱に関するお問い合せは下記までご連絡ください。</p>
<pre>
株式会社SAKURA
〒xxx-xxxx　xx県xx市xx町x-x-x
TEL:XXX-XXX-XXXX FAX:XXX-XXX-XXXX
Mail:info@example.co.jp
</pre>
              </div><!-- .wording -->
          </div><!-- .policy -->
        </div><!--.inner-->
      </section><!--.privacy-->
      </div>
   </div>
</div>
</main>
<?php get_footer(); ?>