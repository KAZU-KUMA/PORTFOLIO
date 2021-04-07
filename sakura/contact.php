<?php
/*
Template Name: CONTACT_RESULT
*/
?>
<?php get_header(); ?>
<main>
<?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $to = $_POST['email'];
    $name = $_POST['username'];
    $message = $_POST['message'];
    mb_send_mail($to, $name, $message);
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
<main>
<?php get_footer(); ?>