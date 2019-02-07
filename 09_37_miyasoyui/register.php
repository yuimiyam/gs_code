<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>TGJ登録フォーム</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザー管理</a></div>
    </div>
  </nav>
</header>
<form method="post" action="register_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>Tokyo Gourmet Journal会員情報入力</legend>
     <label>お名前：<input type="text" name="name"></label><br>
     <label>メールアドレス：<input type="text" name="email"></label><br>
     <label>好きな料理のジャンル：
      <select name="genre">
        <option value="0">和食</option>
        <option value="1">洋食</option>
        <option value="2">中華</option>
        <option value="3">イタリアン</option>
        <option value="4">ファーストフード</option>
        <option value="5">エスニック</option>
        <option value="6">その他</option>
      </select>
      </label><br>
     <label>ログインID：<input type="text" name="lid"></label><br>
     <label>ログインPW：<input type="password" name="lpw"></label><br>
     <label>有料ユーザー登録：
      <select name="charge">
        <option value="0">しない</option>
        <option value="1">プレミアムユーザー登録</option>
        <option value="2">アルティメットプラチナユーザー登録</option>
      </select>
      </label><br>
     <input type="submit" value="登録" id="button">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
<script src="js/jquery-2.1.3.min.js"></script>
<script>
$("#button").on('click', function(){
    alert("この内容で登録しますか？");
})

</script>

</html>
