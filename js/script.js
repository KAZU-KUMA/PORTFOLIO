// JavaScript Document
'use strict';

/*ページ上部スクロール*/
$(function(){
    // ボタン表示/非表示
    $(window).scroll(function(){
        if ($(this).scrollTop() > 300) {
            $('#pagetop').fadeIn();
        } else {
            $('#pagetop').fadeOut();
        }
    });
    // スクロール設定
    $('#pagetop').click(function(){
        $('html, body').animate(
            {scrollTop:0}, 1000);
        return false;
    });
});

/*ページ内スクロール*/
$(function () {
  $('a[href^="#"]').click(function(){
	//リンク先の位置取得、設定
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
	// スクロール設定
    $("html, body").animate({
      scrollTop: position
    }, 1000, "swing");
    return false;
  });
});

/*ハンバーガーメニュー*/
$(function(){
	// ボタン切り替え
	$(".header__nav-sp").click(function(){
		$("html").toggleClass('open');
	});
	// メニュークリックで非表示
	$('a[href^="#"]').click(function(){
		$("html").removeClass('open'); 
	});
});

/*slick(スライド)*/
$(function() {
    $('.slider').slick({
	arrows: false, 
	autoplay: true,
	autoplaySpeed: 3000,
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 1,
	responsive: [
    {
      breakpoint: 770,
      settings: {
        slidesToShow: 1
      }
    }
  ]
    });
});

/*lightbox2(モーダルウィンドウ)*/ 
$(function () {
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
});

/*ScrollReveal(フェードインアニメーション)*/ 
$(function(){
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
$(function() {
    $.validator.addMethod("space",
    function(value, element) {
      return this.optional(element) || value.trim().length > 0;
    },
    "必須入力です。"
);

    $("#form").validate({
        //ルール設定
        rules: {
            name: {
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
            name: {
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
$(function(){
    $(document).snowfall({
        flakeCount : 100,
        flakeColor : '#FFF',
        flakeIndex : 500,
        minSize : 30,
        maxSize : 50,
        minSpeed : 2,
        maxSpeed : 5,
        round : true,
        shadow : false,
        image : './img/sakura.png'
    });
});

/*ローディング*/
$(window).on('load', function(){
	$('#loading').delay(100).fadeOut(500);	
	$('.snowfall-flakes').delay(100).fadeOut(500);	
});