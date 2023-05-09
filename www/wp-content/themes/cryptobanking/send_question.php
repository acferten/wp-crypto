<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
extract($_POST);
$to = get_option('support-mail');
$subject = "New question from cryptobanking-promo";
$message = "
    <table>
    <tr>
        <td>Name</td>
        <td>$name</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>$email</td>
    </tr>
    <tr>
        <td>Question</td>
        <td>$question</td>
    </tr>
    </table>
    ";
$headers = array('Content-Type: text/html; charset=UTF-8');

$result = ['success' => wp_mail($to, $subject, $message, $headers)];
echo json_encode($result);

die();