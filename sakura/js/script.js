// JavaScript Document
'use strict';

/*ページ上部スクロール*/
jQuery(function(){
    // ボタン表示/非表示
    jQuery(window).scroll(function(){
        if (jQuery(this).scrollTop() > 300) {
            jQuery('#pagetop').fadeIn();
        } else {
            jQuery('#pagetop').fadeOut();
        }
    });
    // スクロール設定
    jQuery('#pagetop').click(function(){
        jQuery('html, body').animate(
            {scrollTop:0}, 1000, "swing");
        return false;
    });
});

/*ページ内スクロール*/
jQuery(function () {
  jQuery('.header__nav a[href^="#"]').click(function(){
	//リンク先の位置取得(idの値を取得)
    var target = jQuery(this).attr("href");
    var position = jQuery(target).offset().top;
	// スクロール設定
    jQuery("html, body").animate({
      scrollTop: position}, 1000, "swing");
    return false;
  });
});

/*ハンバーガーメニュー*/
jQuery(function(){
	// ボタン切り替え
	jQuery(".header__nav-sp").click(function(){
		jQuery("html").toggleClass('open');
	});
	// メニュークリックで非表示
	jQuery('a[href^="#"]').click(function(){
		jQuery("html").removeClass('open'); 
	});
});

/*slick(スライド)*/
jQuery(function() {
    jQuery('.slider').slick({
	arrows: false, 
	autoplay: true,
	autoplaySpeed: 3000,
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 1,
    pauseOnFocus: false,
    pauseOnHover: false,
	responsive: [{
      breakpoint: 500,
      settings: {
        slidesToShow: 1
      }
    }]
  });
// スマホ対策(タッチ操作イベント)
  jQuery('.slider').on('touchmove', function(event, slick, currentSlide, nextSlide){
    jQuery('.slider').slick('slickPlay');
  });
});

/*ScrollReveal(フェードインアニメーション)*/ 
jQuery(function(){
    ScrollReveal().reveal(".gallery__item", {
        duration: 1500,
        origin: 'bottom',
        distance: '500px',
        easing:  'ease-in-out',
        opacity: 0,
        interval: 100,
    });
    ScrollReveal().reveal(".about__item-img", {
        duration: 1500,
        rotate: { x: 0, y: 180, z: 0 },
        easing:  'ease-in-out',
    });
}); 

/*文字の流れ*/
jQuery(function(){
    setTimeout(function(){
    jQuery('.mv__item-desc').textAnimation({
        speed: 500,
        delay: 100,
    });
},1000);
});

/*もっと見るボタン*/
jQuery(function() {
    var show = 18; //最初に表示する件数
    var num = 6;  //clickごとに表示したい件数
    var contents = '.gallery__item'; // 対象のコンテンツ
    // 初期設定(クラス付与)
    jQuery(contents + ':nth-child(n + ' + (show + 1) + ')').addClass('hidden');
    // ボタンクリック時(クラス削除)
    jQuery(".btn").click(function(){
    jQuery(contents + '.hidden').slice(0, num).removeClass('hidden');
    // ボタン非表示
    if (jQuery(contents + '.hidden').length == 0) {
        jQuery('.btn').fadeOut();
    }
    });
});

/*パララックス*/ 
jQuery(function() {
    if (jQuery(window).width() > 1366) {
    // スクロール値
    jQuery(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();
　　// 拡大縮小スケール
    jQuery('.mv__img').css({
    transform: 'scale('+(100 + scroll/10)/100+')',
        });
    });
  }
});

/*progressbar(ローディング)*/
jQuery(function(){
    var bar = new ProgressBar.Line(loading__text, {
        easing: 'easeInOut',
        duration: 1500,
        // 進捗ゲージ
        strokeWidth: 0.2,
        color: '#ee6e9f',
        // ゲージベース
        trailWidth: 0.2,
        trailColor: '#fff',
        // テキスト指定	
        text: {		
            style: {
                position: 'absolute',
                left: '50%',
                top: '50%',
                padding: '0',
                margin: '-30px 0 0 0',
                transform:'translate(-50%,-50%)',
                'font-size':'1.5rem',
                color: '#ee6e9f',
            },
            // 自動付与スタイル
            autoStyleContainer: false 
        },
        step: function(state, bar) {
            bar.setText(Math.round(bar.value() * 100) + ' %');
        }
    });
    // ローディング画面非表示 
    bar.animate(1.0, function () {
        jQuery("#loading").delay(250).fadeOut(500);
    });
});

jQuery(function() {
    jQuery.validator.addMethod("space",
    function(value, element) {
      return this.optional(element) || value.trim().length > 0;
    },
    "必須入力です。"
    );
    
    var options = {
        //ルール設定
        rules: {
            username: {
                required: true,
                space: true,
                maxlength: 20
            },
            email: {
                required: true,
                space: true,
                email: true
            },
            message: {
                required: true,
                space: true,
                maxlength: 100
            },
        },
        //エラーメッセージ設定
        messages: {
            username: {
                required: "お名前を入力してください。",
                maxlength: "お名前は20文字以内で入力してください。"
            },
            email: {
                required: "メールアドレスを入力してください。",
                email: "正しいメールアドレスを入力してください。"
            },
            message: {
                required: "メッセージを入力してください。",
                maxlength: "100文字以内で入力してください。"
            },
        },
        //エラーメッセージ表示位置
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
    }
    // 処理を実行
    jQuery("#form").validate(options);
});

jQuery(function(){
    // 送信ボタンクリック時処理
    jQuery( '#form' ).submit( function(event){
        //フォーム既定の動作をキャンセル
        event.preventDefault();
        //エラー時は処理
        jQuery("#result").html("");
        if (jQuery("#form").valid() == false) {
            return false;
        };
        //フォームの入力値を変数に格納
        var data = new FormData( this );
 
        //送信するデータを指定
        data.append('action'  , 'ajaxtest' );
 
        //フォームの入力内容をajaxにより送信
        $.ajax({
            type: 'POST',//POST送信
            url: ajaxurl,//送信先のURL(function.php)
            data: data,//送信するデータを指定
            processData: false,//付与したデータをクエリ文字列に変換するかどうかの設定
            contentType: false,//データの形式を指定するもの
            success: function( response ){
                jQuery("#result").html(response);
                jQuery('form')[0].reset();
            },
            error: function( response ){
                jQuery("#result").html( "error" );
            }
        });
        return false;
    });
});

/*particles(花吹雪)*/ 
jQuery(function(){
    particlesJS("wrapper", {
        "particles":{
            "number":{
                "value":30,
                "density":{
                    "enable":true,
                    "value_area":1121.6780303333778
                }
            },
            "color":{
                "value":"#fff"
            },
            "shape":{
                "type":"image",
                "stroke":{
                    "width":0,
                },
                "image":{
                    "src":'http://153.126.204.74/portfolio/wp-content/themes/sakura/img/sakura.png',
                    "width":120,
                    "height":120
                }
            },
            "opacity":{
                "value":0.06409588744762158,
                "random":true,
                "anim":{
                    "enable":false,
                    "speed":1,
                    "opacity_min":0.1,
                    "sync":false
                }
            },
            "size":{
                "value":8.011985930952697,
                "random":true,
                "anim":{
                    "enable":false,
                    "speed":4,
                    "size_min":0.1,
                    "sync":false
                }
            },
            "line_linked":{
                "enable":false,
            },
            "move":{
                "enable":true,
                "speed":7,
                "direction":"bottom-right",
                "random":false,
                "straight":false,
                "out_mode":"out",
                "bounce":false,
                "attract":{
                    "enable":false,
                    "rotateX":281.9177489524316,
                    "rotateY":127.670995809726
                }
            }
        },
        "interactivity":{
            "detect_on":"canvas",
            "events":{
                "onhover":{
                    "enable":false,
                },
                "onclick":{
                    "enable":false,
                },
                "resize":true
            }
        },
        "retina_detect":false
    });
});