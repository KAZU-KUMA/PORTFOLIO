<?php
// CSS読み込み
function my_styles() {
    // リセットCSS
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/normalize.css', array(), '1.0', false);
    // CSSファイル
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/style.css', array('reset'), '1.0', false);
    // slick
    wp_enqueue_style( 'slide-style', get_template_directory_uri() . '/css/slick.min.css', array('reset'), '1.0', false);
    wp_enqueue_style( 'slide2-style', get_template_directory_uri() . '/css/slick-theme.min.css', array('reset'), '1.0', false);
}
add_action( 'wp_enqueue_scripts', 'my_styles' );

// JavaScript/JQuery読み込み
function my_scripts() {
    //デフォルトJQuery削除
    wp_deregister_script('jquery');     
    // JQuery
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' );
    // particles
    wp_enqueue_script( 'particles-script', get_template_directory_uri() . '/js/particles.min.js', array(), '1.0', true );
    // slick
    wp_enqueue_script( 'slide-script', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0', true );
    // scrollreveal
    wp_enqueue_script( 'scrollreveal-script', get_template_directory_uri() . '/js/scrollreveal.min.js', array(), '1.0', true );
    // validate
    wp_enqueue_script( 'validate-script', get_template_directory_uri() . '/js/validate.min.js', array(), '1.0', true );
    // progressbar
    wp_enqueue_script( 'sprogressbar-script', get_template_directory_uri() . '/js/progressbar.min.js', array(), '1.0', true );
    // textanimation
    wp_enqueue_script( 'textanime-script', get_template_directory_uri() . '/js/textAnimation.min.js', array(), '1.0', true );
    // parallax
    wp_enqueue_script( 'parallax-script', get_template_directory_uri() . '/js/simpleParallax.min.js', array(), '1.0', true );
    // JSファイル
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

function add_my_ajaxurl() {
?>
    <script>
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
        // wp-admin/admin-ajax.php
    </script>
<?php
}
add_action( 'wp_head', 'add_my_ajaxurl', 1 );

function ajaxFunc(){
    date_default_timezone_set('Asia/Tokyo');
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $date = date('Y年m月d日 H:i:s');
    $from = "qrki1ulf3d@gmail.com";
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['username'] !== "" && $_POST['email'] !== "" && $_POST['message'] !== ""){
        $to = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
//自動返信メール本文
$messageUser = <<< EOD
お問い合わせありがとうございます。
下記の内容で承りました。
----------------------------------------------------
【名前】
  {$name}
【メールアドレス】
  {$to}
【メッセージ】
  {$message}
----------------------------------------------------
送信日時: {$date}
EOD;

mb_send_mail($to, "お問い合わせありがとうございます。", $messageUser, "From:SAKURA<qrki1ulf3d@gmail.com>");

//管理者確認用メール本文
$messageAdmin = <<< EOD
ウェブサイトより下記の内容でお問い合わせがありました。
----------------------------------------------------
【名前】
  {$name}
【メールアドレス】
  {$to}
【メッセージ】
  {$message}
----------------------------------------------------
送信日時: {$date}
EOD;

mb_send_mail($from, "お問い合わせ：".$name, $messageAdmin, "From:SAKURA<qrki1ulf3d@gmail.com>");
    print "送信完了しました。"."\n"."お問い合わせありがとうございました。";
}else{
    print "送信エラー：フォームからの送信に失敗しました。お手数ですが再度お試しください。";
}    
die();
}
add_action( 'wp_ajax_ajaxtest', 'ajaxFunc' );
add_action( 'wp_ajax_nopriv_ajaxtest', 'ajaxFunc' );