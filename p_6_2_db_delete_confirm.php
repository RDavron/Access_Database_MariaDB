<?php
    /* 
        削除確認画面です。
        更新画面とどこが違うか確認をしてみましょう。
    */

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

    // 一覧ページのGETパラメータからidを取得する
    // 更新したいデータのIDを条件としてテーブルからデータを取得するためです。
    $id = $_GET['id'];
    // SQL文(WHERE文は条件文です。今回はidがGETパラメータの値と同じものを取得が条件です)
    $sql = "SELECT * FROM kakeibo_table WHERE id = " . $id . ";";
    // SQL文を実行しデータを連想配列で取得する
    $datas = $dbh->query($sql, PDO::FETCH_ASSOC);

    // 取得したデータを１件取得し、inputタグのvalue用に変数に格納
    foreach($datas as $key => $data)
    {
        $id = $data['id'];
        $kamoku = $data['kamoku'];
        $hinmei = $data['hinmei'];
        $kakaku = $data['kakaku'];
        $basyo = $data['basyo'];
        $hiduke = $data['hiduke'];
        // 1件しかデータ取得しないのでbreak文でループを抜ける
        break;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>データ削除画面</title>
    </head>
    <body>
        <h2>下記データの削除を行いますか？</h2>
        <!-- 画面に表示するのでhtmlspecialchars関数を用いてエンコードを行います。-->
        <form action="./p_6_2_db_delete_finish.php" method="POST">
            ID：<?php echo htmlspecialchars($id); ?><br>
            科目：<?php echo htmlspecialchars($kamoku); ?><br>
            品名：<?php echo htmlspecialchars($hinmei); ?><br>
            価格：<?php echo htmlspecialchars($kakaku); ?><br>
            場所：<?php echo htmlspecialchars($basyo); ?><br>
            日付：<?php echo htmlspecialchars($hiduke); ?><br>
            <br>
            <!-- 完了画面に送るデータはIDのみです。-->
            <input type="submit" name="submit" value="削除を行う" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
        </form>
        <br>
        <form action="./p_6_2_db.php" method="GET">
            <input type="submit" name="list" value="一覧画面に戻る" />
        </form>
    </body>
</html>