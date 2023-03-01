<?php
    /* 
        送られたデータはIDのみです。
        GETデータを用いてはいけません。
        GETデータで直接このページにアクセスすると
        確認画面を経由せずデータが削除できるからです。
    */
    $id = $_POST['id'];     // ID

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

    // SQL文(DELETE文　データの削除を行うSQLです。
    // １行で書くものですが見やすくするために分割しています)
    // コロン付きの書き方は「ここにデータが入る」という仮の値です。
    $sql = " DELETE FROM kakeibo_table ";
    $sql = $sql . "WHERE id = :id;";

    // SQLを準備(UPDATE文と同じです)
    $stmt = $dbh->prepare($sql);

    // コロンを使った値を確認画面から受け取った値に置換
    $stmt->bindValue(":id", $id, PDO::PARAM_INT); // ID

    // SQLの実行(executeメソッド。ここでデータが削除されます)
    $stmt->execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>データ削除画面</title>
    </head>
    <body>
        <h2>テーブルのデータを削除しました。</h2>

        <form action="./p_6_2_db.php" method="GET">
            <input type="submit" name="list" value="一覧画面に戻る" />
        </form>
    </body>
</html>