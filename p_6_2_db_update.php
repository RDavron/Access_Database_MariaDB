<?php

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
        <title>データ更新画面</title>
    </head>
    <body>
        <h2>テーブルのデータを更新します</h2>
        <form action="./p_6_2_db_update_confirm.php" method="POST">
            ID: <?php echo $id; ?><br>

            <!-- ここは長い記述のため改行していますが、実際に書くときは1行で記載してください -->
            科目：<input type="text"
                name="kamoku" value="<?php echo $kamoku; ?>" size="40" required/><br>
            品名：<input type="text"
                name="hinmei" value="<?php echo $hinmei; ?>" size="40" required/><br>
            価格：<input type="text"
                name="kakaku" value="<?php echo $kakaku; ?>" size="40" required/><br>
            場所：<input type="text"
                name="basyo" value="<?php echo $basyo; ?>" size="40" required/><br>
            日付：<input type="date"
                name="hiduke" value="<?php echo $hiduke; ?>"
                min="2020-01-01" max="2099-12-31" required/><br>
            <br>
            <!-- IDは表示しているのみなので、データを確認画面にhiddenで送る -->
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="submit" name="submit" value="確認画面へ" />
        </form>
        <br>
        <form action="./p_6_2_db.php" method="GET">
            <input type="submit" name="list" value="一覧画面に戻る" />
        </form>
    </body>
</html>