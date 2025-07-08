<?php
  require_once(__DIR__ . '/config/config.php');
  $app = new Monaka\Confirmation();
  $app->run($adminMail, $ext_denied, $EXT_ALLOWS, $maxmemory, $max, $_SERVER["CONTENT_LENGTH"]);
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="assets/img/favicon.ico">
<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/apple-favicon.png">
<link rel="canonical" href="https://yoshidasaori.jp/contactform/confirmation.php">

<title>送信内容の確認｜【公式】吉田沙保里-YOSHIDA SAORI-オフィシャルサイト</title>
<meta name="description" content="吉田沙保里オフィシャルサイト。吉田沙保里に関するイベントやレスリング戦績、最新情報を公開。">
<meta name="keyword" content="吉田沙保里,YOSHIDA SAORI,レスリング">
<meta property="og:locale" content="ja_JP">
<meta property="og:type" content="website">
<meta property="og:sitename" content="【公式】吉田沙保里オフィシャルサイト">
<meta property="og:title" content="【公式】吉田沙保里オフィシャルサイト">
<meta property="og:description" content="吉田沙保里オフィシャルサイト。吉田沙保里に関するイベントやレスリング戦績、最新情報を公開。">
<meta property="og:image" content="https://yoshidasaori.jp/assets/img/og-img.png">
<meta property="og:url" content="https://yoshidasaori.jp/">
<meta name="twitter:card" content="summary_large_image">


<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
<link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
</head>

<body id="top">

<!--header-->
<header class="header">
<div class="head-inner">
<div class="logo">
<h1>
<figure>
<a href="../index.html">
<img src="../assets/img/logo.svg" alt="YOSHIDA SAORI OFFICIAL">
</a>
</figure>
</h1>
</div>

<!--sp nav-->
<span class="menu">
<div class="menu-line">
<span class="menu__line menu__line--top"></span>
<span class="menu__line menu__line--bottom"></span>
</div>
</span>

<!--//-->

<nav class="nav">
<ol>
<li><a href="../index.html#info">INFORMATION</a></li>
<li><a href="../index.html#prof">PROFILE</a></li>
<li><a href="../index.html#record">RECORD</a></li>
<li><a href="../index.html#media">MEDIA</a></li>
<li><a href="../index.html#contact">CONTACT</a></li>
</ol>
<ul>
<li>
<a href=""><img src="../assets/img/onlineshop.svg" alt="ONLINE SHOP"></a>
</li>
<li>
<a href="https://www.instagram.com/saori___yoshida?igsh=ZzNtYzNsY2s1bXlk" target="_blank"><img src="../assets/img/insta.png" alt="Instagram"></a>
</li>
<li>
<a href="https://www.tiktok.com/@saori___yoshida_official" target="_blank"><img src="../assets/img/tk.svg" alt="TikTok"></a>
</li>
<li>
<a href="https://ameblo.jp/yoshidasaori/" target="_blank"><img src="../assets/img/ameba.svg" alt="Ameblo"></a>
</li>
<li>
<a href="https://x.com/sao_sao53" target="_blank"><img src="../assets/img/tw.svg" alt="X"></a>
</li>
<li>
<a href="https://line.me/R/ti/p/%40yoshidasaori" target="_blank"><img src="../assets/img/line.svg" alt="LINE"></a>
</li>
</ul>
</nav>
</div>
</header>


<!--start-->
<main class="sub-page" id="start">

<section class="contact">

<div class="inner">

<h2><span>送信内容確認</span></h2>


<div class="contact-wrap">
<?php if (!empty($app->seriousError)) : ?>
<p class="confirmation">
<?php echo $app->seriousError; ?>
</p>
<?php else : ?>
<?php if (empty($app->err)) : ?>
<p class="confirmation">下記内容で送信してよろしいですか？</p>
<?php else : ?>
<p class="confirmation">
入力に誤りがあります。エラーの内容をご確認いただき、<br>
戻るボタンから修正をお願いいたします。
</p>
<?php endif; ?>
<?php endif; ?>

<div class="submit_content">
<?php if (!empty($_SESSION["submitContent"]) && empty($app->seriousError)) : ?>
<form action="send.php" method="post" enctype="multipart/form-data">
<?php foreach ($_SESSION["submitContent"] as $key => $value) : ?>
<dl>
<dt><?php echo h($key); ?></dt>
<dd>
<p>
<?php
if (empty($app->err[$key])) {
if (strpos($value, "\n") !== false) {
echo nl2br(h($value));
} else {
echo empty($value) && (string)$value !== "0" ? "&nbsp;\n" : h($value);
}
} else {
echo "<span class=\"err\">{$app->err[$key]}</span>";
}
?>
</p>
</dd>
</dl>
<?php endforeach; ?>
<?php $_SESSION["submitFile"] = array(); ?>
<?php foreach ($_SESSION["fileData"] as $key => $value) : ?>
<dl>
<dt><?php echo h($key); ?></dt>
<dd>
<p>
<?php
if (empty($app->err[$key])) {
if (strpos("jpg,webp,jpeg,gif,png,JPG,JPEG,GIF,PNG", $value["ext"]) !== false) {
$img = base64_encode(file_get_contents($value["tmp"]));
echo "<img src=\"data:image/{$value["ext"]};base64,{$img}\" width=\"150\" ><br>\n";
}
echo "{$value["name"]}\n";
$_SESSION["submitFile"][$key][$value["name"]] = $value["file"];
} else {
echo "<span class=\"err\">{$app->err[$key]}</span>";
}
?>
</p>
</dd>
</dl>
<?php endforeach; ?>

<div class="submit-area">
<input type="hidden" name="requiredItem[name]" value="<?php echo h($app->requiredItem["name"]); ?>">
<input type="hidden" name="requiredItem[mailaddress]" value="<?php echo h($app->requiredItem["mailaddress"]); ?>">
<input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
<?php if (empty($app->err) && empty($app->seriousError)) { echo "<input type=\"submit\" value=\"送信\">"; } ?>
<input type="button" value="戻る" onclick="history.back();">
</div>
</form>
<?php else : ?>
<div class="submit-area">
<input type="button" value="戻る" onclick="history.back();">
</div>
<?php endif; ?>  

</div>
</div>

</div>

</section>

</main>


<footer class="footer">

<div class="pagetop">
<figure class="cv-btn">
<a href="../index.html#contact"><img src="../assets/img/cv-btn.svg" alt="お問い合わせp"></a>
</figure>
<!--<figure class="top-btn">
<a href="#top"><img src="../assets/img/pagetop.svg" alt="Scroll Up"></a>
</figure>-->
</div>

<div class="inner">
<p class="copy">©︎ YSW Tokyo inc. - 2025 吉田沙保里 Official Website. </p>
<ul>
<li>
<a href=""><img src="../assets/img/onlineshop.svg" alt="ONLINE SHOP"></a>
</li>
<li>
<a href="https://www.instagram.com/saori___yoshida?igsh=ZzNtYzNsY2s1bXlk" target="_blank"><img src="../assets/img/insta.png" alt="Instagram"></a>
</li>
<li>
<a href="https://www.tiktok.com/@saori___yoshida_official" target="_blank"><img src="../assets/img/tk.svg" alt="TikTok"></a>
</li>
<li>
<a href="https://ameblo.jp/yoshidasaori/" target="_blank"><img src="../assets/img/ameba.svg" alt="Ameblo"></a>
</li>
<li>
<a href="https://x.com/sao_sao53" target="_blank"><img src="../assets/img/tw.svg" alt="X"></a>
</li>
<li>
<a href="https://line.me/R/ti/p/%40yoshidasaori" target="_blank"><img src="../assets/img/line.svg" alt="LINE"></a>
</li>
</ul>
</div>
</footer>

<script src="../assets/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="../assets/js/yubinbango.js"></script>
<script src="../assets/js/script.js"></script>


</body>

</html>