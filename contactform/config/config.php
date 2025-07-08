<?php

// ----------基本設定開始---------- //

// 送信先メールアドレス
$adminMail = "info@yoshidasaori.jp";


// 送信先メールアドレスを配列化(編集しないでください)
$adminArray = array();
$adminArray = explode(',', $adminMail);


// 送信者名
$adminName = "吉田沙保里オフィシャルサイト運営事務局";


// 送信後に戻るURL
$returnUrl = "https://yoshidasaori.jp/";


// 送信完了メッセージ
$completionMessage = <<<EOD
この度は吉田沙保里オフィシャルサイトにお問い合わせ頂き、誠に有り難うございます。
送信内容を確認の上、折り返しご連絡を差し上げますので、
今しばらくお待ち下さい。

数日中にご返信がない場合は、受信できなかった可能性がありますので、
恐れ入りますが、再度のご連絡をお願い申し上げます。
EOD
;

// リターンメールのメールタイトル
$returnMailTitle = "お問い合わせを受け付けました。";

// リターンメールのヘッダーメッセージ
$returnMailHeader = <<<EOD
この度は吉田沙保里オフィシャルサイトにお問い合わせ頂き、誠に有り難うございます。
送信内容を確認の上、折り返しご連絡を差し上げますので、
今しばらくお待ち下さい。

数日中にご返信がない場合は、受信できなかった可能性がありますので、
恐れ入りますが、再度のご連絡をお願い申し上げます。

大変お手数ですが、「{$adminArray[0]}」まで
再度お問い合わせくださいますようお願いいたします。

EOD
;


// リターンメールのフッターメッセージ
$returnMailFooter = <<<EOD

吉田沙保里オフィシャルサイト運営事務局

URL：https://yoshidasaori.jp
MAIL：info@yoshidasaori.jp

EOD
;

// ----------基本設定終了---------- //


// ----------添付ファイル設定開始---------- //

// 拡張子制限（0=しない・1=する）
$ext_denied = 1;
// 許可する拡張子リスト
$ext_allow1 = "jpg";
$ext_allow2 = "jpeg";
$ext_allow3 = "gif";
$ext_allow4 = "pdf";
// 配列に格納しておく
$EXT_ALLOWS = array($ext_allow1, $ext_allow2, $ext_allow3, $ext_allow4);

// アップロード容量制限（0=しない・1=する）
$maxmemory = 1;
// 最大容量（KB）
$max = 3000;

// ----------添付ファイル設定終了---------- //


// ----------ここから下は変更不要---------- //

require_once(__DIR__ . "/../lib/functions.php");
require_once(__DIR__ . "/autoload.php");

session_start();
