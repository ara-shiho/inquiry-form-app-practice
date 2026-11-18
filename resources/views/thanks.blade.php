<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
  <style>
    /* リセット & 基本設定 */
    body {
      font-family: Arial, sans-serif;
      color: #333;
      margin: 0;
      background: #fff;
    }

    /* ヘッダー（左寄せ） */
    .header {
      background-color: #000000;
      width: 100%;
      padding: 15px 0;
    }

    .header__inner {
      max-width: 1000px;
      margin: 0 auto;
      padding: 0 40px;
    }

    .header__logo {
      color: #ffffff;
      text-decoration: none;
      font-size: 20px;
      font-weight: bold;
    }

    /* サンクスページのメインコンテンツ */
    .thanks__content {
      max-width: 800px;
      margin: 100px auto 0 auto; /* 上部に余白をとって中央に配置 */
      text-align: center;        /* 全体を中央寄せにする */
      padding: 0 20px;
    }

    .thanks__heading h2 {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        Contact Form
      </a>
    </div>
  </header>

  <main>
    <div class="thanks__content">
      <div class="thanks__heading">
        <h2>お問い合わせありがとうございます</h2>
      </div>
    </div>
  </main>
</body>

</html>
