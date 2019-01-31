<?php
include "funcs.php";
$pdo = db_con();


//２．Make Data Registration SQL
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．Display Data
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $himoduke = $result["id"];
    // echo $himoduke;
    $view .= '<tr><td><a href="detail.php?id='.$himoduke.'">'."編集する".'</a></td><td>'.$himoduke."</td><td>".$result["bookName"]."</td><td>".$result["bookURL"]."</td><td>".$result["bookComment"]."</td><td>".$result["readDate"]."</td><td>".$result["dateOfRegistration"]."</td><td>".'<a href="delete.php?id='.$himoduke.'">'."削除する"."</a></td></tr>";
    // echo $himoduke;
    // $view .= "<tr><td>".$result["id"]."</td><td>".$result["bookName"]."</td><td>".$result["bookURL"]."</td><td>".$result["bookComment"]."</td><td>".$result["readDate"]."</td><td>".$result["dateOfRegistration"]."</td></tr>";
    // $view .= '<a href="u_view.php?id='.$result["id"].'">'."</td><td>".$result["id"]."</td><td>"."</td><td>".$result["bookName"]."</td><td>".$result["bookURL"]."</td><td>".$result["bookComment"]."</td><td>".$result["readDate"]."</td><td>".$result["dateOfRegistration"]."</td></tr>".'</a>';
  }
};
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>読書データ表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">←データ登録</a>
      <!-- <a class="navbar-brand" href="u_view.php">データ編集→</a> -->
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main1[Start] -->
<!-- <div>
    <div class="container jumbotron"></div>
</div> -->
<!-- Main1[End] -->

<!-- Main2[Start] -->
<table border='1'>
  <tr>
    <th></th>
    <th>ID</th> 
    <th>本の名前</th>        
    <th>本のURL</th>
    <th>コメント</th>
    <th>読了日</th>
    <th>登録日時</th>
    <th></th>
  </tr>
  <?=$view?>
</table>
<!-- Main2[End] -->
</body>
</html>