<?php
    /* 
    　フォームの確認画面のhiddenで送られたPOSTデータを受け取ります。
    　更新処理は「どのデータを更新するか？」を知りたいためIDを受け取ります。
    */
    $id     = $_POST['id'];     // ID
    $kamoku = $_POST['kamoku']; // 科目
    $hinmei = $_POST['hinmei']; // 品名
    $kakaku = $_POST['kakaku']; // 価格
    $basyo  = $_POST['basyo'];  // 場所
    $hiduke = $_POST['hiduke']; // 日付
    
    // データベースに接続を行う処理
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
    
    // SQL文(UPDATE文　データの更新を行うSQLです。
    // １行で書くものですが見やすくするために分割しています)
    // コロン付きの書き方は「ここにデータが入る」という仮の値です。
    // データを更新する場合もこの方法を基本的に使います。
    $sql = "UPDATE kakeibo_table SET ";
    $sql = $sql . "kamoku = :kamoku, ";
    $sql = $sql . "hinmei = :hinmei, ";
    $sql = $sql . "kakaku = :kakaku, ";
    $sql = $sql . "basyo = :basyo, ";
    $sql = $sql . "hiduke = :hiduke ";
    $sql = $sql . "WHERE id = :id;";
    
    // SQLを準備(前節で行ったqueryと違います。コロンを使った値を使う場合に使用します。)
    $stmt = $dbh->prepare($sql);
    
    // コロンを使った値を確認画面から受け取った値に置換
    $stmt->bindValue(":kamoku", $kamoku, PDO::PARAM_STR); // 科目
    $stmt->bindValue(":hinmei", $hinmei, PDO::PARAM_STR);// 品名
    $stmt->bindValue(":kakaku", $kakaku, PDO::PARAM_INT);// 価格
    $stmt->bindValue(":basyo", $basyo, PDO::PARAM_STR);// 場所
    $stmt->bindValue(":hiduke", $hiduke, PDO::PARAM_STR);// 日付
    $stmt->bindValue(":id", $id, PDO::PARAM_INT); // ID
    
    // SQLの実行(executeメソッド。ここでデータが更新されます)
    $stmt->execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>データ更新画面</title>
    </head>
    <body>
        <h2>テーブルの情報を更新しました。</h2>

        <form action="./p_6_2_db.php" method="GET">
            <input type="submit" name="list" value="一覧画面に戻る" />
        </form>
    </body>
</html>     