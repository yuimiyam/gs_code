<?php
$id = $_GET["id"];

include "funcs.php";
$pdo = db_con();

//２．Make Data Registration SQL
$sql = "SELECT * FROM gs_bm_table WHERE id= :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．Display Data
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
    $row = $stmt->fetch();
  };
?>
<!DOCTYPE html>
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
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>登録フォーム</legend>
     <label>本の名前：<input type="text" name="bookName" value="<?=$row["bookName"]?>"></label><br>
     <label>本のURL：<input type="text" name="bookURL" value="<?=$row["bookURL"]?>"></label><br>
     <!-- <label>コメント：<input type="text" name="bookComment"></label><br> -->
     <label>コメント：<br><textArea name="bookComment" rows="4" cols="40"><?=$row["bookComment"]?></textArea></label><br>
     <label>読了日：<input type="date" name="readDate" value="<?=$row["readDate"]?>"></label><br>     
     <input type="hidden" name="id" value="<?=$row["id"]?>">
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
