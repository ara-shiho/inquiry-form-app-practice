<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
  <style>
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

/* メインコンテンツ */
.confirm__content {
  max-width: 700px;
  margin: 0 auto;
  padding: 40px 20px;
}

.confirm__heading h2 {
  text-align: center;
  margin-bottom: 40px;
  font-size: 24px;
}

/* テーブルデザイン（確認画面用） */
.confirm-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 40px;
}

.confirm-table th,
.confirm-table td {
  padding: 15px;
  border-bottom: 1px solid #ddd;
  text-align: left;
}

.confirm-table th {
  width: 30%;
  font-weight: bold;
  color: #333;
}

.confirm-table td {
  width: 70%;
  color: #555;
}

/* 送信ボタン */
.form__button {
  text-align: center;
}

.form__button-submit {
  background: #000;
  color: #fff;
  border: none;
  padding: 12px 80px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 4px;
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
    <div class="confirm__content">
      <div class="confirm__heading">
        <h2>お問い合わせ内容確認</h2>
      </div>
      <form class="form" action="{{ route('contacts.store') }}" method="post">
        @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                {{ $data['name'] ?? '' }}
                <input type="hidden" name="name" value="{{ $data['name'] ?? '' }}" />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                {{ $data['email'] ?? '' }}
                <input type="hidden" name="email" value="{{ $data['email'] ?? '' }}" />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>
              <td class="confirm-table__text">
                {{ $data['tel'] ?? '' }}
                <input type="hidden" name="tel" value="{{ $data['tel'] ?? '' }}" />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
                {{ $data['content'] ?? '' }}
                <input type="hidden" name="content" value="{{ $data['content'] ?? '' }}" />
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>
