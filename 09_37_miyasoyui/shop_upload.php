<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>TGJお店登録フォーム</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">OMISE for shops</a></div>
    </div>
  </nav>
</header>
<form method="post" action="shop_upload_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>Tokyo Gourmet Journalお店情報入力</legend>
     <label>店名：<input type="text" name="shopName"></label><br>
     <!-- 本来ここに画像アップロード用フォーム入れたいが -->
     <label>評価
      <select name="rate">
        <option value="0">1</option>
        <option value="1">2</option>
        <option value="2">3</option>
        <option value="3">4</option>
        <option value="4">5</option>
      </select>
      </label><br>
     <label>アクセス：<input type="text" name="access"></label><br>
     <label>ジャンル：
      <select name="shopGenre">
        <option value="0">和食</option>
        <option value="1">洋食</option>
        <option value="2">中華</option>
        <option value="3">イタリアン</option>
        <option value="4">ファーストフード</option>
        <option value="5">エスニック</option>
        <option value="6">その他</option>
      </select>
      </label><br>
     <label>コメント：<textarea name="shopComment" id="textarea" cols="40" rows="10"></textarea></label><br>
     <label>営業時間：<textarea name="businessHour" id="textarea" cols="40" rows="10"></textarea></label><br>
     <label>予算：<textarea name="budget" id="textarea" cols="40" rows="10"></textarea></label><br>
     <input type="submit" value="登録" id="button">
    </fieldset>
  </div>
</form>
</body>
<script src="js/jquery-2.1.3.min.js"></script>
<script>
$("#button").on('click', function(){
    alert("この内容で登録しますか？");
})

</script>

</html>
