/* fade */
jQuery(function($){
const targets = document.getElementsByClassName('fade');
for(let i = targets.length; i--;){
let observer = new IntersectionObserver((entries, observer) => {
for(let j = entries.length; j--;){
if (entries[j].isIntersecting) {
entries[j].target.classList.add('active');
observer.unobserve(entries[j].target);
}
}
});
observer.observe(targets[i]);
}
});


/* text animation */
document.addEventListener('DOMContentLoaded', () => {
const boxElement = document.querySelectorAll('.box');
const textElement = document.querySelectorAll('.text-animation');

document.addEventListener('scroll', () => {
for (let i = 0; i < boxElement.length; i++) {
const getElement = boxElement[i].getBoundingClientRect().top + boxElement[i].clientHeight;

if (window.innerHeight > getElement) {
textElement[i].classList.add('show');
}
}
});

for (let i = 0; i < textElement.length; i++) {
const textElements = textElement[i],
animeText = textElements.textContent,
animeTextArray = [];

textElements.textContent = '';

for (let j = 0; j < animeText.split('').length; j++) {
const t = animeText.split('')[j];

if (t === ' ') {
animeTextArray.push(' ');
} else {
animeTextArray.push(
'<span class="text-animation-span"><span style="animation-delay: ' + j * 0.1 + 's">' + t + '</span></span>'
);
}
}

for (let k = 0; k < animeTextArray.length; k++) {
textElements.innerHTML += animeTextArray[k];
}
}
});


/* スムース */
jQuery(function($){
  // #で始まるアンカーをクリックした場合に処理
  jQuery('a[href^="#"]').on('click', function(e) {
  e.preventDefault;
  // スクロールの速度
  var speed = 400;
  // アンカーの値取得
  var href= $(this).attr("href");
  // 移動先を取得
  var target = $(href == "#" || href == "" ? 'html' : href);
  // 移動先を数値で取得
  var position = target.offset().top - [88.12];
  // スムーススクロール
  jQuery('body,html').animate({scrollTop:position}, speed, 'swing');
  return false;
  });
  });
  
  jQuery(function($) {
    jQuery('.menu').on('click',function(){
      jQuery('.menu-line').toggleClass('active');
      jQuery('.nav').fadeToggle();
  });
  jQuery('.nav ol li a').click(function () {
    jQuery('.menu-line').removeClass('active');
    jQuery('.nav').css('display', 'none');
  });
  });

  jQuery(function($){
new ScrollHint('.js-scrollable', {
scrollHintIconAppendClass: 'scroll-hint-icon-white',
enableOverflowScrolling: 'true',
i18n: {
scrollable: 'SCROLL'
}
});
});

window.addEventListener('DOMContentLoaded', function(){

  // 0.5秒後に実行
  setTimeout(() => {
const element = $('.clip-text.left');
const delayTime = 500;

element.each(function (i) {
  $(this).delay(i * delayTime).queue(()=> {
    $(this).addClass('active').dequeue();
  });
});
}, 500);
});

/* scroll color */

 // RAF（requestAnimationFrame）を使用してスクロールイベントを最適化
 function throttleRAF(callback) {
  let ticking = false;
  return function() {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        callback();
        ticking = false;
      });
      ticking = true;
    }
  };
}

// デバウンス関数
function debounce(func, wait) {
  let timeout;
  return function() {
    const context = this;
    const args = arguments;
    clearTimeout(timeout);
    timeout = setTimeout(() => func.apply(context, args), wait);
  };
}

// 色を更新する関数
function updateColors() {
  // トリガーとなるセクションを取得
  const triggerSections = document.querySelectorAll('.trigger-section');
  const windowHeight = window.innerHeight;
  const triggerPosition = windowHeight / 2; // 画面の半分をトリガーポイントに
  
  // デフォルトでは通常モード（反転なし）
  let shouldInvert = false;
  
  // トリガーセクションがビューポートの中央にあるかチェック
  triggerSections.forEach(section => {
    const rect = section.getBoundingClientRect();
    const sectionMiddle = rect.top + rect.height / 2;
    
    // セクションの中央が画面の中央付近にある場合
    if (Math.abs(sectionMiddle - triggerPosition) < windowHeight * 0.3) {
      shouldInvert = true;
    }
  });
  
  // 状態に応じてbodyクラスを更新
  if (shouldInvert) {
    document.body.classList.add('inverted');
    
    // ナビゲーションリンクの色も更新
    document.querySelectorAll('.nav-item').forEach(item => {
      item.style.color = '#ffffff';
    });
  } else {
    document.body.classList.remove('inverted');
    
    // ナビゲーションリンクの色を元に戻す
    document.querySelectorAll('.nav-item').forEach(item => {
      item.style.color = '#212121';
    });
  }
}

// 最適化されたスクロールイベントハンドラを作成
const optimizedScrollHandler = throttleRAF(updateColors);

// イベントリスナーを登録
window.addEventListener('scroll', optimizedScrollHandler);
window.addEventListener('resize', debounce(updateColors, 100));

// ページロード時にも実行
window.addEventListener('load', updateColors);


/* mv */
const swiper1 = new Swiper(".swiper01", {
  loop: true, // ループさせる
  parallax: true, // パララックスさせる
  allowTouchMove: false, // マウスでのスワイプを禁止
  speed: 1500, // 少しゆっくり(デフォルトは300)
  autoplay: { // 自動再生
    delay: 2000, // 2秒後に次のスライド
    disableOnInteraction: false, // 矢印をクリックしても自動再生を止めない
  },
  // ページネーション
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  // 前後の矢印
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
const swiper2 = new Swiper(".swiper02", {
  loop: true, // ループさせる
  parallax: true, // パララックスさせる
  allowTouchMove: false, // マウスでのスワイプを禁止
  speed: 1500, // 少しゆっくり(デフォルトは300)
  autoplay: { // 自動再生
    delay: 2000, // 2秒後に次のスライド
    disableOnInteraction: false, // 矢印をクリックしても自動再生を止めない
  },
  // ページネーション
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  // 前後の矢印
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

//スクロールした時に処理を実行
window.addEventListener('scroll', function(){
  //トップへ戻るボタンを取得
  let topBtn = document.querySelector('.pagetop');

  // 追記
  //ドキュメントの高さ
  const scrollHeight = document.body.clientHeight;
  //スクロール位置
  const scrollPosition = window.pageYOffset;

  //windowの高さ
  const windowHeignt = window.innerHeight;

  //footer取得
  const footer = document.querySelector('.footer');
  
  //footerの高さ
  const footerHeight = footer.offsetHeight;
  if(scrollHeight - scrollPosition - windowHeignt <= footerHeight){
    topBtn.classList.add('stop');
  } else {
    topBtn.classList.remove('stop');
  }
});

let targets = document.querySelectorAll('#titlecontent'); //アニメーションさせたい要素
//スクロールイベント
window.addEventListener('scroll', function () {
  var scroll = window.scrollY; //スクロール量を取得
  var windowHeight = window.innerHeight; //画面の高さを取得
  for (let target of targets) { //ターゲット要素がある分、アニメーション用のクラスをつける処理を繰り返す
    var targetPos = target.getBoundingClientRect().top + scroll; //ターゲット要素の位置を取得
    if (scroll > targetPos - windowHeight) { //スクロール量 > ターゲット要素の位置
      target.classList.add('scroll-flow'); //is-animatedクラスを加える
    }
  }
});

