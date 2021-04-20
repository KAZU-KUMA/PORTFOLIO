<?php
/*
Template Name: CONTACT_RESULT
*/
?>
<?php get_header(); ?>
<main>
<?php
    date_default_timezone_set('Asia/Tokyo');
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $date = date('Y年m月d日 H:i:s');
    $from = "qrki1ulf3d@gmail.com";
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) === TRUE && isset($_POST['username']) === TRUE && isset($_POST['message']) === TRUE){
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
    }else{
        print "送信エラー：メールフォームからの送信に失敗しました。お手数ですが再度お試しください。";
        exit;
    }
?>
<div class="contact__result center">
    <div class="inner">        
        <?php if (have_posts()):
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif; ?>
    </div>
</div>
</main>
<?php get_footer(); ?>