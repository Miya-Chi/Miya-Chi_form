<?php
    require_once('function.php');
    require_once('db_connect.php');

// 検索した値が取得できる準備
    $nickname = '';
    if (isset($_GET['nickname'])){
      $nickname = $_GET['nickname'];
    }

    $stmt = $dbh->prepare('SELECT * FROM surveys WHERE nickname like ?');
    $stmt->execute(["%nickname%"]);
    $results = $stmt->fetchAll();
 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
  <meta charset="utf-8">
   <title>Document</title>
 </head>
 <body>
  <form action="search.php" method="GET">
    <input type="text" name="nickname">
    <input type="submit" value="検索">
  </form>
  <?php foreach ($results as $result): ?>
    <p><?php echo h($result['nickname']) ?></p>
    <p><?php echo h($result['email']) ?></p>
    <p><?php echo h($result['content']) ?></p>
  <?php endforeach ?>


 </body>
 </html>

<!--  コミット
 一行目は概要
 二行目は何のために -->