<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../assets/css/reset.css">
  <link rel="stylesheet" href="../../assets/css/index-agent.min.css">
  <link rel="stylesheet" href="../../assets/css/detail-agent.css">
</head>

<body>
  <?php require  "./capsule/header.php"; ?>

  <main class="main">
    <ul class="main__list">
      <li class="main__item">
        <div class="main__item__account">
          <img src="../../assets/img/icon_avatar.svg" alt="icon">
          <input type="text" value="manaki">
        </div>
        <hr>
        <ul class="score__list">
          <li class="score__item">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="24" cy="24" r="23.5" fill="#44A3EA" fill-opacity=".1" stroke="#44A3EA"></circle>
              <path d="M26 14h-8a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V20l-6-6z" stroke="#44A3EA" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M26 14v6h6M28 25h-8M28 29h-8M22 21h-2" stroke="#44A3EA" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <div class="score__item__content">
              <small class="score__item__title">今月のお問い合わせ数</small>
              <br>
              <div class="score__item__value">
                <span class="score__item__number">112</span>
                <div class="score__item__rank">ランク<span>D</span></div>
              </div>
            </div>
          </li>
          <li class="score__item">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="24" cy="24" r="23.5" fill="#E8AE06" fill-opacity=".1" stroke="#E8AE06"></circle>
              <path d="M30.7 17.5H17.3c-.9 0-1.6.7-1.6 1.7v8.3c0 1 .7 1.7 1.6 1.7h13.4c.9 0 1.6-.8 1.6-1.7v-8.3c0-1-.7-1.7-1.6-1.7zM20.7 32.5h6.6M24 29.2v3.3" stroke="#E8AE06" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <div class="score__item__content">
              <small class="score__item__title">先月のお問い合わせ数</small>
              <br>
              <div class="score__item__value">
                <span class="score__item__number">112</span>
                <div class="score__item__rank">ランク<span>A</span></div>
              </div>
            </div>
          </li>
          <li class="score__item">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="24" cy="24" r="23.5" fill="#7C6AE2" fill-opacity=".1" stroke="#7C6AE2"></circle>
              <g fill="#7C6AE2">
                <path d="M24 16.6a6.7 6.7 0 00-4.4 11.7c1 1 1 3.3 1 3.4v.3h6.8v-.3s0-2.3 1-3.4c1.5-1.3 2.3-3.1 2.3-5 0-3.7-3-6.7-6.7-6.7zm3.9 11l-.1.2c-1 1-1.1 2.7-1.1 3.5h-5.4c0-.8-.1-2.6-1.2-3.6a5.9 5.9 0 117.8 0z"></path>
                <path d="M24 18.3c-.2 0-.4.2-.4.4s.2.4.4.4c2.4 0 4.4 2 4.4 4.4 0 .2.2.4.4.4s.4-.2.4-.4c0-2.9-2.3-5.2-5.2-5.2zM26.7 32.5h-5.4a1 1 0 00-1 1c0 .6.5 1 1 1h5.3c.6 0 1-.4 1-1 0-.5-.4-1-1-1zm0 1.2h-5.4s-.2 0-.2-.2l.2-.2h5.3l.2.2-.1.2zM25.9 35H22a1 1 0 00-1 1c0 .5.5 1 1 1H26c.5 0 1-.5 1-1 0-.6-.5-1-1-1zm0 1.2H22L22 36c0-.2.1-.2.2-.2H26s.2 0 .2.2l-.2.2zM24 14.6c.2 0 .4-.2.4-.4v-2.8c0-.2-.2-.4-.4-.4s-.4.2-.4.4v2.8c0 .2.2.4.4.4zM30.8 13c-.2 0-.4 0-.6.2l-1.5 2.3c-.1.2 0 .4.1.6h.2c.2 0 .3 0 .4-.2l1.5-2.3c.1-.1 0-.4-.1-.5zM19.1 16h.2c.2-.2.3-.4.1-.6L18 13a.4.4 0 00-.6 0c-.2 0-.3.3-.1.5l1.5 2.3c0 .2.2.2.3.2zM16.2 18.6l-2.4-1.3c-.2-.1-.5 0-.6.1-.1.2 0 .5.2.6l2.4 1.3h.2c.2 0 .3 0 .4-.2 0-.2 0-.4-.2-.5zM34.8 17.4c-.1-.2-.4-.2-.6-.1l-2.4 1.3c-.2 0-.3.3-.2.5 0 .2.2.2.4.2h.2l2.4-1.3c.2-.1.3-.4.2-.6z"></path>
              </g>
            </svg>
            <div class="score__item__content">
              <small class="score__item__title">累計お問い合わせ数</small>
              <br>
              <div class="score__item__value">
                <span class="score__item__number">112</span>
                <div class="score__item__rank">ランク<span>C</span></div>
              </div>
            </div>
          </li>
        </ul>
        <hr>
        <div class="main__item__detail"><a href="#">詳細情報を見る</a></div>
      </li>

      <li class="main__item">
        <div class="myCard">
          <p class="myCard__title"><span class="myCard__title__agent">POSSE</span>様への新規お問い合わせ数</p>
          <span class="myCard__number">10</span>
          <p class="myCard__text">対応してない学生に返信をしましょう<br>お問い合わせをいただいた学生の詳細は下記をご覧ください</p>
        </div>
      </li>

      <li class="main__item">
        <div class="student">
          <div class="student__detail">
            <p class="student__detail__title">【学生詳細情報】</p>
            <dl class="student__detail__list">
              <div class="student__detail__item">
                <dt>学生氏名</dt>
                <dd>遠藤愛期</dd>
              </div>
              <div class="student__detail__item">
                <dt>フリガナ</dt>
                <dd>エンドウマナキ</dd>
              </div>
              <div class="student__detail__item">
                <dt>メールアドレス</dt>
                <dd>48690114s@gmail.com</dd>
              </div>
              <div class="student__detail__item">
                <dt>電話番号</dt>
                <dd>09058522963</dd>
              </div>
              <div class="student__detail__item">
                <dt>郵便番号</dt>
                <dd>0001111</dd>
              </div>
              <div class="student__detail__item">
                <dt>住所</dt>
                <dd>神奈川県横浜市港北区赤坂1-1-22</dd>
              </div>
              <div class="student__detail__item">
                <dt>生年月日</dt>
                <dd>2003/09/11</dd>
              </div>
              <div class="student__detail__item">
                <dt>大学</dt>
                <dd>慶應義塾大学</dd>
              </div>
              <div class="student__detail__item">
                <dt>学部</dt>
                <dd>理工学部</dd>
              </div>
              <div class="student__detail__item">
                <dt>学科</dt>
                <dd>管理工学科</dd>
              </div>
              <div class="student__detail__item">
                <dt>卒業年度</dt>
                <dd>25卒</dd>
              </div>
              <div class="student__detail__item">
                <dt>その他自由記述欄</dt>
                <dd>よろしくお願いします！</dd>
              </div>
              <div class="student__detail__item">
                <dt>申請時刻</dt>
                <dd>01月13日09:15:11</dd>
              </div>
            </dl>
          </div>
          <div class="student__operation">
            <ul class="student__operation__list">
              <li class="student__operation__item">
                <button>取消申請</button>
              </li>
              <li class="student__operation__item">
                <button>メールを送信</button>
              </li>
              <li class="student__operation__item">
                <button>連絡済にする</button>
              </li>
              <li class="student__operation__item">
                <button>未連絡に戻す</button>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </main>
</body>

</html>