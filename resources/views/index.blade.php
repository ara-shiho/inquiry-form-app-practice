<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  
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

    /* メインコンテンツ */
    .contact-form__content {
      max-width: 700px;
      margin: 0 auto;
      padding: 40px 20px;
    }

    .contact-form__heading h2 {
      text-align: center;
      margin-bottom: 40px;
      font-size: 24px;
    }

    /* フォーム周り */
    .form__group {
      display: flex;
      margin-bottom: 25px;
    }

    .form__group-title {
      width: 30%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-right: 20px;
    }

    .form__label--item {
      font-weight: bold;
      font-size: 14px;
    }

    .form__label--required {
      background: #ff0000;
      color: #fff;
      font-size: 11px;
      padding: 2px 6px;
      border-radius: 3px;
    }

    .form__group-content {
      width: 70%;
    }

    .form__input--text input,
    .form__input--textarea textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      background-color: #f9f9f9;
    }

    .form__input--textarea textarea {
      height: 150px;
    }

    .form__error {
      color: #ff0000;
      font-size: 13px;
      margin-top: 5px;
    }

    .form__button {
      text-align: center;
      margin-top: 40px;
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

    .logout-form {
  position: absolute;
  top: 20px;
  right: 30px;
}

.logout-button {
  background-color: transparent; /* 背景を透明に */
  color: #fff;                   /* 黒帯の上なので白文字 */
  border: 1px solid #fff;        */ 白い枠線 */
  padding: 6px 16px;
  font-size: 14px;
  cursor: pointer;
  border-radius: 4px;
  transition: background-color 0.3s;
}

.logout-button:hover {
  background-color: #fff; /* ホバー時に白背景、黒文字に反転 */
  color: #000;
}
  </style>
</head>

<body>
  <!-- ヘッダー（左寄せ） -->
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        Contact Form
      </a>
    </div>
  </header>

  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
      </div>
      <form class="form" action="{{ route('contacts.confirm') }}" method="post">
        @csrf
        
        <!-- お名前 -->
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="name" placeholder="テスト太郎" value="{{ old('name') }}" />
            </div>
            <div class="form__error">
              @error('name')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <!-- メールアドレス -->
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
              @error('email')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <!-- 電話番号 -->
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="tel" name="tel" placeholder="09012345678" value="{{ old('tel') }}" />
            </div>
            <div class="form__error">
              @error('tel')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <!-- お問い合わせ内容 -->
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="content" placeholder="資料をいただきたいです">{{ old('content') }}</textarea>
            </div>
            <div class="form__error">
              @error('content')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
        </div>
      </form>
    </div>
    <form class="logout-form" method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="logout-button" type="submit">ログアウト</button>
  </form>
  </main>
</body>

</html>