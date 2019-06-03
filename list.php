<?php 
    require_once('function.php');
    require_once('db_connect.php');

    $stmt = $dbh->prepare('SELECT * FROM surveys');
    $stmt->execute();
    $results = $stmt->fetchAll();

  ?>

  <!DOCTYPE html>
  <html lang="ja">
  <head>
    <meta  charset="UTF-8">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
    <link href="bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <div id="contact" class="font-weight-light">
    <a href="index.html">
      <input type="button" value="list" class="btn btn-info">
    </a>
  <?php foreach ($results as $result): ?>
    <p>name♡<?php echo h($result['nickname']) ?></p>
    <p>email♡<?php echo h($result['email']) ?></p>
    <p>contact♡<?php echo h($result['content']) ?></p>
    <hr>
    <?php endforeach ?>
  </div>
  </body>
  </html>
