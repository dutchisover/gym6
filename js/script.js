// ページの内容がすべて読み込まれたあとに動くようにする
  document.addEventListener('DOMContentLoaded', function() {

    // メニューのボタンを探す
    const navButton = document.querySelector('.nav_button');

    // ボタンがあるか確認（エラー防止）
    if (navButton) {
      // ボタンがクリックされたときに動く処理
      navButton.addEventListener('click', function() {
        // bodyタグを探す
        const body = document.body;

        // bodyタグに「is-open」をつけたり外したりする
        body.classList.toggle('is-open');
      });
    }

  });



// Swiperを動かすためのコード
document.addEventListener("DOMContentLoaded", function () {
  // Swiperを使う場所を指定
  const mvSwiper = new Swiper(".mv_slide", {
    // 無限ループ（最後まで行っても最初に戻る）
    loop: true,

    // スライドを自動で切り替える設定
    autoplay: {
      delay: 2500, // 2.5秒ごとに切り替え
      disableOnInteraction: false, // ユーザー操作後も止まらない
    },

    // スライドの動く速さ（切り替えスピード）
    speed: 1000, // 1秒

    // スライドの並び方
    slidesPerView: "auto", // スライドの数を自動で調整
    spaceBetween: 10, // スライドの間に10pxのすき間

    // スライドを中央に配置
    centeredSlides: true,

    // ドット（ページネーション）の設定
    pagination: {
      el: ".swiper-pagination", // ドットを置く場所
      clickable: true, // クリックできるようにする
    },

    // 矢印やドラッグなどは不要なので省略
  });
});
