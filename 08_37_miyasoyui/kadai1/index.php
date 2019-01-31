<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Bookmark for Books</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">お気に入りの本メモ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="get" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>登録フォーム</legend>
     <label>本の名前：<input type="text" name="bookName"></label><br>
     <label>本のURL：<input type="text" name="bookURL"></label><br>
     <!-- <label>コメント：<input type="text" name="bookComment"></label><br> -->
     <label>コメント：<br><textArea name="bookComment" rows="4" cols="40"></textArea></label><br>
     <label>読了日：<input type="date" name="readDate"></label><br>     
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
