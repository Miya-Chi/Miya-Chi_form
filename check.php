<?php
    // メソッドがGETの時はトップページにリダイレクト
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: index.html');
    }

    // 関数の呼び出し
    require_once('function.php');

    // $_POST ...スーパーグローバル関数
    $nickname = h($_POST['nickname']);
    $email = h($_POST['email']);
    $content = h($_POST['content']);
    // echo $nickname;

    if ($nickname == '') {
      $nickname_result = 'ニックネームが入力されてません。';
    } else {
      $nickname_result = 'ようこそ、' . $nickname . '様';
    }

    if ($email == '') {
      $email_result = 'メールアドレスが入力されてません。';
    } else {
      $email_result = 'メールアドレス:' . $email;
    }

    if ($content == '') {
      $content_result = 'お問い合わせ内容が入力されていません。';
    } else {
      $content_result = 'お問い合わせ内容:' . $content;
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>入力内容確認</title>
  <link href="style.css" rel="stylesheet">
  <link href="bootstrap.css" rel="stylesheet">
</head>
<body>
  <div id="contact" class="font-weight-light">
    <h1>入力内容確認</h1>
    <p><?php echo $nickname_result ?></p>
    <p><?php echo $email_result ?></p>
    <p><?php echo $content_result ?></p>
    <form method="POST" action="thanks.php">
      <input type="hidden" name="nickname" value="<?php echo $nickname ?>">
      <input type="hidden" name="email" value="<?php echo $email ?>">
      <input type="hidden" name="content" value="<?php echo $content?>">
      <input type="button" value="Back" onclick="history.back()" class="btn btn-info">
      <?php if ($email != '' && $nickname != '' && $content != ''):
        // コロン構文
         ?>
      <input type="submit" value="OK" class="btn btn-info">
    <?php endif;?>
    </form>
  </div>
</body>
</html>