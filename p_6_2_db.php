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

    /* ここから追記 */
    
    // SQL文
    $sql = "SELECT * FROM kakeibo_table;";
    // SQL文を実行しデータを連想配列で取得する
    $datas = $dbh->query($sql, PDO::FETCH_ASSOC);
    
    // テーブルタグのデータを格納する変数
    $table_html = "<table border='1'>";
    $table_html = $table_html . "<tr>";
    $table_html = $table_html . "<th>ID</th>";
    $table_html = $table_html . "<th>科目</th>";
    $table_html = $table_html . "<th>品名</th>";
    $table_html = $table_html . "<th>価格</th>";
    $table_html = $table_html . "<th>場所</th>";
    $table_html = $table_html . "<th>日付</th>";
    $table_html = $table_html . "<th>更新</th>";
    $table_html = $table_html . "<th>削除</th>";
    $table_html = $table_html . "</tr>";
    
    // 取得したデータを１件ずつ取得しテーブルを作成する
    foreach($datas as $key => $data)
    {
      // 更新ボタンと削除ボタン(後ほど使用します)
      $table_html = $table_html . "<tr>";
      $table_html = $table_html . "<td>" . $data['id'] . "</td>";
      $table_html = $table_html . "<td>" . $data['kamoku'] . "</td>";
      $table_html = $table_html . "<td>" . $data['hinmei'] . "</td>";
      $table_html = $table_html . "<td>" . $data['kakaku'] . "</td>";
      $table_html = $table_html . "<td>" . $data['basyo'] . "</td>";
      $table_html = $table_html . "<td>" . $data['hiduke'] . "</td>";
      $table_html = $table_html . 
            "<td><a href='./p_6_2_db_update.php?id=" . $data['id'] . "'>更新</a></td>";
      $table_html = $table_html . 
            "<td><a href='./p_6_2_db_delete_confirm.php?id=" . $data['id'] . 
                  "'>削除</a></td>";
      $table_html = $table_html . "</tr>";
    }
    $table_html = $table_html . "</table>";
    
    // テーブルタグを表示する
    echo $table_html;

    // 新規作成リンク(後ほど使用します)
    echo "<a href='./p_6_2_db_insert.php'>新規作成</a>";
  ?>