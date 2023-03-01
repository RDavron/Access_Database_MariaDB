<?php
    /* 
        新規登録の確認画面とほぼ同じ処理です。
        ただしidもPOSTデータで受け取っています。
    */
    $id = $_POST['id']; // id
    $kamoku = $_POST['kamoku']; // 科目
    $hinmei = $_POST['hinmei']; // 品名
    $kakaku = $_POST['kakaku']; // 価格
    $basyo  = $_POST['basyo'];  // 場所
    $hiduke = $_POST['hiduke']; // 日付

?>
<!DOCTYPE html>
<html>
    <head>
        <title>データ更新画面</title>
    </head>
    <body>
        <h2>下記データの更新を行いますか？</h2>
        <!-- 画面に表示するのでhtmlspecialchars関数を用いてエンコードを行います。-->
        <form action="./p_6_2_db_update_finish.php" method="POST">
            ID：<?php echo htmlspecialchars($id); ?><br>
            科目：<?php echo htmlspecialchars($kamoku); ?><br>
            品名：<?php echo htmlspecialchars($hinmei); ?><br>
            価格：<?php echo htmlspecialchars($kakaku); ?><br>
            場所：<?php echo htmlspecialchars($basyo); ?><br>
            日付：<?php echo htmlspecialchars($hiduke); ?><br>
            <br>
            <!-- 完了画面に送るデータ。画面に表示しないのでエンコードを行いません。-->
            <input type="submit" name="submit" value="更新を行う" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="hidden" name="kamoku" value="<?php echo $kamoku; ?>" />
            <input type="hidden" name="hinmei" value="<?php echo $hinmei; ?>" />
            <input type="hidden" name="kakaku" value="<?php echo $kakaku; ?>" />
            <input type="hidden" name="basyo" value="<?php echo $basyo; ?>" />
            <input type="hidden" name="hiduke" value="<?php echo $hiduke; ?>" />
        </form>
        <br>
        <form action="./p_6_2_db.php" method="GET">
            <input type="submit" name="list" value="一覧画面に戻る" />
        </form>
    </body>
</html>