<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー管理</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザー管理</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>登録フォーム</legend>
     <label>氏名：<input type="text" name="name"></label><br>
     <label>ログインID：<input type="text" name="loginId"></label><br>
     <label>ログインPW：<input type="text" name="loginPassword"></label><br>
     <label>権限：
      <select name="authority">
        <option value="0">管理者</option>
        <option value="1">スーパー管理者</option>
      </select>
      </label><br>
      <!-- <label>アクティブ：
      <select name="activity">
        <option value="0">使用中</option>
        <option value="1">休眠</option>
      </select>
      </label><br><br><br> -->
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
