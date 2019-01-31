<?php
include "funcs.php";
$pdo = db_con();

//２．Make Data Registration SQL
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE life_flg = 0");
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
    $view .= '<tr><td><a href="detail.php?id='.$himoduke.'">'."編集する".'</a></td><td>'.$himoduke."</td><td>".$result["name"]."</td><td>".$result["lid"]."</td><td>".$result["lpw"]."</td><td>".$result["kanri_flg"]."</td><td>".'<a href="delete.php?id='.$himoduke.'">'."削除する"."</a></td></tr>";
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
<title>登録ユーザー情報</title>
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
      <a class="navbar-brand" href="index.php">ユーザー情報</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<!-- Main2[Start] -->
<table border='1'>
  <tr>
    <th>EDIT</th>
    <th>ID</th> 
    <th>名前</th>        
    <th>ログインID</th>
    <th>ログインPassword</th>
    <th>権限</th>
    <th>DELETE</th>
  </tr>
  <?=$view?>
</table>
<p>※権限：  0=管理者　1=スーパー管理者</p>
<p>※DELETE： 論理削除</p>
<!-- Main2[End] -->
</body>
</html>