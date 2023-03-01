<?php
  $kamoku = $_POST['kamoku']; // 科目
  $hinmei = $_POST['hinmei']; // 品名
  $kakaku = $_POST['kakaku']; // 価格
  $basyo  = $_POST['basyo'];  // 場所
  $hiduke = $_POST['hiduke']; // 日付

  $user = "root";
  $pass = "";
  try
  {
      $dbh = new PDO('mysql:host=localhost;dbname=kyaa000', $user, $pass);
  }
  catch(PDOException $e)
  {
      echo $e->getMessage();
  }

  // SQL文(INSERT文　データの登録を行うSQLです。
  // １行で書くものですが見やすくするために分割しています)
  $sql = "INSERT INTO kakeibo_table (kamoku, hinmei, kakaku, basyo, hiduke) ";
  $sql = $sql . "VALUES ";
  $sql = $sql . "('" . $kamoku . "',";
  $sql = $sql . "'" . $hinmei . "',";
  $sql = $sql . "'" . $kakaku . "',";
  $sql = $sql . "'" . $basyo . "',";
  $sql = $sql . "'" . $hiduke . "');";

  // SQLを実行
  $dbh->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>データ入力画面</title>
    </head>
    <body>
        <h2>テーブルに情報を登録しました。</h2>
        <br>
        <form action="./p_6_2_db.php" method="GET">
            <input type="submit" name="list" value="一覧画面に戻る" />
        </form>
    </body>
</html>