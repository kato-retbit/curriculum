// ===== 基本型 (string / number / boolean) =====
const siteName = "Profile";       // 文字列(string) … 文字は " " か ' ' で囲む
const bicycleCount = 3;           // 数値(number)   … 整数も小数もそのまま書く
const isMenuOpen = false;         // 真偽値(boolean) … true か false の2択

// ===== 配列 (array) =====
// 同じ種類のデータを順番に並べて入れておく箱。[ ] で書く
const navLabels = ["About", "Bicycle"];

// ===== オブジェクト (object) =====
// 「名前(key): 値(value)」のペアで色々な情報をまとめる箱。{ } で書く
const profile = {
  name: "KEISUKE KATO",
  role: "Bicycle Rider",
};

// 中身を確認する = console.log()
// ブラウザで右クリック→検証→Consoleタブを開くと結果が見える
console.log(siteName, bicycleCount, isMenuOpen);
console.log(navLabels);
console.log(profile);

// 配列から1つ取り出す：番号(添字)は0から始まる
console.log(navLabels[0]); // "About"

// オブジェクトから1つ取り出す：ドットでキー名を指定
console.log(profile.name); // "KEISUKE KATO"


// ===== DOM: document.querySelector() で要素取得 =====
// CSSセレクタと同じ書き方で、ページの中から要素を1つ取ってくる
const logo = document.querySelector(".header__logo");
const header = document.querySelector(".header");

// ===== イベント(click) + class の付け替え + style 操作 =====
logo.addEventListener("click", () => {
  // classList.toggle：クラスが無ければ付ける、あれば外す（付け替え）
  logo.classList.toggle("is-active");

  // style 操作：JSから直接CSSプロパティを書き換える
  logo.style.cursor = "pointer";
});

// ===== イベント(scroll) =====
window.addEventListener("scroll", () => {
  // 10px以上スクロールしたらヘッダーにクラスを付ける
  if (window.scrollY > 10) {
    header.classList.add("is-scrolled");
  } else {
    header.classList.remove("is-scrolled");
  }
});

// ===== data 属性を使った UI 制御 + イベント(input) =====
const searchInput = document.querySelector('[data-role="bicycle-search"]');
// querySelectorAll は条件に合う要素を「全部」取得する（配列っぽいものが返る）
const bicycleItems = document.querySelectorAll(".bicycle__item");

searchInput.addEventListener("input", () => {
  const keyword = searchInput.value.toLowerCase();

  bicycleItems.forEach((item) => {
    // dataset.title で data-title="bicycle1" の値を読み取れる
    const title = item.dataset.title.toLowerCase();
    const isMatch = title.includes(keyword);

    // マッチしなければ is-hidden クラスを付けて隠す
    item.classList.toggle("is-hidden", !isMatch);
  });
});


// ===== ハンバーガーメニュー =====
const hamburger = document.querySelector('[data-role="hamburger"]');
const nav = document.querySelector(".header__nav");

hamburger.addEventListener("click", () => {
  // ボタンとナビ、両方に is-open を付け外しして見た目を切り替える
  hamburger.classList.toggle("is-open");
  nav.classList.toggle("is-open");
});

// メニュー内のリンクをタップしたら、開いたままにならないよう閉じる
nav.querySelectorAll("a").forEach((link) => {
  link.addEventListener("click", () => {
    hamburger.classList.remove("is-open");
    nav.classList.remove("is-open");
  });
});


// ===== タブ切り替え（Bicycleのカテゴリー絞り込み） =====
const tabButtons = document.querySelectorAll(".bicycle__tab");

tabButtons.forEach((tab) => {
  tab.addEventListener("click", () => {
    // 押されたタブだけ is-active にする（他は全部外す）
    tabButtons.forEach((t) => t.classList.remove("is-active"));
    tab.classList.add("is-active");

    const category = tab.dataset.category;

    bicycleItems.forEach((item) => {
      const isMatch = category === "all" || item.dataset.category === category;
      item.classList.toggle("is-hidden", !isMatch);
    });
  });
});


// ===== アコーディオン（FAQ） =====
const faqButtons = document.querySelectorAll('[data-role="faq-toggle"]');

faqButtons.forEach((button) => {
  button.addEventListener("click", () => {
    // closest：クリックしたボタンから見て一番近い .faq__item を探す
    const item = button.closest(".faq__item");
    item.classList.toggle("is-open");
  });
});


// ===== モーダルウィンドウ（Bicycle画像の拡大表示） =====
const modal = document.querySelector('[data-role="modal"]');
const modalImg = document.querySelector('[data-role="modal-img"]');
const bicycleImages = document.querySelectorAll(".bicycle__img");

bicycleImages.forEach((img) => {
  img.addEventListener("click", () => {
    modalImg.src = img.src;
    modalImg.alt = img.alt;
    modal.classList.add("is-open");
  });
});

// 閉じるボタンと背景オーバーレイ、どちらも data-role="modal-close" にしてまとめて処理
document.querySelectorAll('[data-role="modal-close"]').forEach((closer) => {
  closer.addEventListener("click", () => {
    modal.classList.remove("is-open");
  });
});

// Escapeキーでも閉じられるようにする
document.addEventListener("keydown", (event) => {
  if (event.key === "Escape") {
    modal.classList.remove("is-open");
  }
});


// ===== TOPへ戻るボタン（footerコンポーネント内のbtn） =====
const backToTop = document.querySelector('[data-role="back-to-top"]');

backToTop.addEventListener("click", (event) => {
  // href="#" のデフォルト動作（ページ末尾へのジャンプ）を止める
  event.preventDefault();
  window.scrollTo({ top: 0, behavior: "smooth" });
});
