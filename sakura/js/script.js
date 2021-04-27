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
      breakpoint: 750,
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
    });
}); 

/*validate(入力フォーム)*/
// jQuery(function() {
//     // カスタムルール設定
//     jQuery.validator.addMethod("space",
//     function(value, element) {
//       return this.optional(element) || value.trim().length > 0;
//     },
//     "必須入力です。"
//     );
//     var options = {
//         //ルール設定
//         rules: {
//             username: {
//                 required: true,
//                 space: true,
//                 maxlength: 20
//             },
//             email: {
//                 required: true,
//                 space: true,
//                 email: true
//             },
//             message: {
//                 required: true,
//                 space: true,
//                 maxlength: 100
//             },
//         },
//         //エラーメッセージ設定
//         messages: {
//             username: {
//                 required: "お名前を入力してください。",
//                 maxlength: "お名前は20文字以内で入力してください。"
//             },
//             email: {
//                 required: "メールアドレスを入力してください。",
//                 email: "正しいメールアドレスを入力してください。"
//             },
//             message: {
//                 required: "メッセージを入力してください。",
//                 maxlength: "100文字以内で入力してください。"
//             },
//         },
//         //エラーメッセージ表示位置
//         errorPlacement: function(error, element) {
//             error.insertAfter(element);
//         }
//     }
// /*ajax(入力フォーム)*/
//     jQuery('#form').submit(function(e) {
//         //フォーム既定の動作をキャンセル
//         e.preventDefault();
//         //validate実行（作成したvalidateのoptionを指定）
//         jQuery("#form").validate(options);
//         //エラー時は処理終了
//         if (jQuery("#form").valid() == false) {
//             return false;
//         };
//       //フォームの入力値を変数に格納
//       var form_data = jQuery('form').serialize();
//       //フォームの入力内容をajaxにより送信
//       jQuery.ajax ({
//         url: 'ajaxurl',//送信先のURL
//         type: 'POST',//POST送信
//         data: form_data,//送信するデータを指定
//         timeout: 60000,  //タイムアウトの設定
//         //重複送信を避けるためにボタンを無効化/有効化
//         beforeSend: function (xhr, settings) {
//           jQuery('.submit').attr('disabled', true);
//         },
//         complete: function(xhr, textStatus) {
//           jQuery('.submit').attr('disabled', false);
//         }
//       }).done(function(data, textStatus, jqXHR) {
//           //通信成功時の処理
//           jQuery('form')[0].reset();//フォームに入力値をリセット
//           jQuery('#result').text(data);//phpから返ってきたメッセージを挿入
//           jQuery('#result').text('送信完了しました。');
//           const result = document.getElementById("result")
//           result.style.display ="flex";//メッセージ背景表示
//       }).fail(function(jqXHR, textStatus, errorThrown) {
//           //通信失敗時の処理
//           jQuery('#result').text('送信できませんでした。');
//           const result = document.getElementById("result")
//           result.style.display ="flex";//メッセージ背景表示 
//       });
//     });
//   });
/*メッセージ非表示*/
// jQuery(function(){
// 	// 送信ボタンクリックで非表示
// 	jQuery('#submit').click(function(){
// 		// jQuery('div.wpcf7-response-output').delay(10000).fadeOut(500);
// 	});
// });

/*progressbar(ローディング)*/
jQuery(function(){
    var bar = new ProgressBar.Line(loading__text, {
        easing: 'easeInOut',
        duration: 2000,
        //進捗ゲージ
        strokeWidth: 0.2,
        color: '#ee6e9f',
        //ゲージベース
        trailWidth: 0.2,
        trailColor: '#fff',
        //テキスト指定	
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
            //自動付与のスタイルを切る
            autoStyleContainer: false 
        },
        step: function(state, bar) {
            bar.setText(Math.round(bar.value() * 100) + ' %');
        }
    });

    bar.animate(1.0, function () {
        jQuery("#loading").delay(500).fadeOut(1000);
    });
});

/*snowfall(雪または花びら)*/ 
// jQuery(function(){
//     jQuery(document).snowfall({
//         flakeCount : 30,
//         flakeColor : '#FFF',
//         flakeIndex : 500,
//         minSize : 30,
//         maxSize : 50,
//         minSpeed : 2,
//         maxSpeed : 5,
//         round : true,
//         shadow : false,
//         image : 'http://153.126.204.74/portfolio/wp-content/themes/sakura/img/sakura.png'
//     });
// });
// jQuery(function(){
//     jQuery('.snowfall-flakes').delay(1800).fadeOut(500);
// });