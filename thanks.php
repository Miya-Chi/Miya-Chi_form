 <?php
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        header('Location: index.html');
    }
    // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //     header('Location: index.html');
    // }
    // 関数の呼び出し
    require_once('function.php');
    $nickname = h($_POST['nickname']);
    $email = h($_POST['email']);
    $content = h($_POST['content']);
    require_once('db_connect.php');
    $stmt = $dbh->prepare('INSERT INTO surveys (nickname, email, content) VALUES (?, ?, ?)');
    $stmt->execute([$nickname, $email, $content]);//?を変数に置き換えてSQLを実行

    // DBとの接続
    require_once('db_connect.php');
    $stmt = $dbh->prepare('INSERT INTO surveys (nickname,email,content) VALUES(?,?,?)');
    $stmt->execute([$nickname, $email, $content]);

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>サンクスページ</title>
        <link href="style.css" rel="stylesheet">
        <link href="bootstrap.css" rel="stylesheet">
    </head>
    <body>
      <div id="contact" class="font-weight-light">
        <h1 class="font-weight-light">♡THX♡</h1>
        <p><?php echo $nickname ?></p>
        <p><?php echo $email ?></p>
        <p><?php echo $content ?></p>
        <a href="index.html">
        <input type="button" value="once more" class="btn btn-info">
        </a>
      </div>
    </body>
</html>
