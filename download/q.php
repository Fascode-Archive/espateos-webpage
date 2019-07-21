<?php
header('Content-type: text/plain; charset= UTF-8');
if ($_SERVER['REQUEST_METHOD']=="POST") {
if (empty($_POST['text']) || !is_string($_POST['text'])) {
}else{
$text = h($_POST['text']);
mb_language("ja");
mb_internal_encoding("UTF-8");
$subject = "［自動送信］コメント内容の確認";
$body = <<< EOM
{$text}


{$_SERVER['SERVER_NAME']}
{$_SERVER['REQUEST_URI']}
{$_SERVER['REQUEST_METHOD']}
{$_SERVER['DOCUMENT_ROOT']}
{$_SERVER['SCRIPT_FILENAME']}
{$_SERVER['SCRIPT_NAME']}
{$_SERVER['SERVER_PROTOCOL']}
{$_SERVER['QUERY_STRING']}
{$_SERVER['PHP_SELF']}
{$_SERVER['REMOTE_ADDR']}
{$_SERVER['REMOTE_PORT']}
{$_SERVER['REMOTE_HOST']}
{$_SERVER['HTTP_HOST']}
{$_SERVER['HTTP_REFERER']}
{$_SERVER['HTTP_USER_AGENT']}
{$_SERVER['HTTP_CONNECTION']}
{$_SERVER['SERVER_SOFTWARE']}
{$_SERVER['REQUEST_TIME']}
{$_SERVER['HTTP_ACCEPT']}
{$_SERVER['HTTP_ACCEPT_CHARSET']}
{$_SERVER['HTTP_ACCEPT_ENCODING']}
{$_SERVER['HTTP_ACCEPT_LANGUAGE']}
{$_SERVER['SERVER_PORT']}
EOM;
$fromEmail = "noreply@espate.0u0.biz";
$fromName = "Espate";
$header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";
mb_send_mail('naoko561010@gmail.com', $subject, $body, $header);
mb_send_mail('shun819.mail@gmail.com', $subject, $body, $header);
}
}
function h($str){
return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}
