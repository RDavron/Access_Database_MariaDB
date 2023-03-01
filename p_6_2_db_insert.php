<!DOCTYPE html>
  <html>
      <head>
          <title>データ入力画面</title>
      </head>
      <body>
          <h2>テーブルにデータを登録します</h2>
          <form action="./p_6_2_db_insert_confirm.php" method="POST">
              科目：<input type="text" name="kamoku" value="" size="40" required/><br>
              品名：<input type="text" name="hinmei" value="" size="40" required/><br>
              価格：<input type="text" name="kakaku" value="" size="40" required/><br>
              場所：<input type="text" name="basyo" value="" size="40" required/><br>
              日付：<input type="date" name="hiduke" min="2020-01-01" max="2099-12-31"
                 required/><br>
              <br>
              <input type="submit" name="submit" value="確認画面へ" />
          </form>
          <br>
          <form action="./p_6_2_db.php" method="GET">
              <input type="submit" name="list" value="一覧画面に戻る" />
          </form>
      </body>
  </html>  