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
            {scrollTop:0}, 1000);
        return false;
    });
});

/*ページ内スクロール*/
jQuery(function () {
  jQuery('a[href^="#"]').click(function(){
	//リンク先の位置取得、設定
    var href = jQuery(this).attr("href");
    var target = jQuery(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
	// スクロール設定
    jQuery("html, body").animate({
      scrollTop: position
    }, 1000, "swing");
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
	responsive: [
    {
      breakpoint: 750,
      settings: {
        slidesToShow: 1
      }
    }
  ]
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
// カスタムルール設定
jQuery(function() {
    jQuery.validator.addMethod("space",
    function(value, element) {
      return this.optional(element) || value.trim().length > 0;
    },
    "必須入力です。"
    );
    jQuery("#form").validate({
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
    });
});

/*snowfall(雪または花びら)*/ 
jQuery(function(){
    jQuery(document).snowfall({
        flakeCount : 100,
        flakeColor : '#FFF',
        flakeIndex : 500,
        minSize : 30,
        maxSize : 50,
        minSpeed : 2,
        maxSpeed : 5,
        round : true,
        shadow : false,
        image : 'http://153.126.204.74/portfolio/wp-content/themes/sakura/img/sakura.png'
    });
});
jQuery(function(){
    jQuery('.snowfall-flakes').delay(1800).fadeOut(500);
});

/*ローディング*/
jQuery(window).on('load', function(){	
    jQuery('#loading').delay(2000).fadeOut(500);	
});