<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メールアドレス確認</title>
</head>
<body>
    <h1>メールアドレスの確認をお願いします</h1>
    <p>登録いただいたメールアドレス宛に確認用リンクを送信しました。</p>

    @if (session('status') == 'verification-link-sent')
        <p>新しい確認用リンクを送信しました。</p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">確認メールを再送する</button>
    </form>
</body>
</html>