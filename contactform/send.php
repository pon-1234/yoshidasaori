<?php
require_once(__DIR__ . '/config/config.php');
$send = new Monaka\Send();
$send->run($adminMail, $adminName, $returnMailTitle, $returnMailHeader, $returnMailFooter);
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="assets/img/favicon.ico">
<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/apple-favicon.png">
<link rel="canonical" href="https://yoshidasaori.jp/contactform/send.php">

<title>送信完了｜【公式】吉田沙保里-YOSHIDA SAORI-オフィシャルサイト</title>
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

<h2><span>送信完了</span></h2>


<div class="contact-wrap">
<p class="confirmation">
<?php echo nl2br(h($completionMessage)); ?>
</p>

<div class="submit-area">
<input class="single" type="button" value="トップページ" onclick="window.location='<?php echo $returnUrl; ?>';">
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