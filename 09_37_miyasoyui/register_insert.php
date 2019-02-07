<?php
session_start();

$name = $_POST["name"];
$email = $_POST["email"];
$genre = $_POST["genre"];
$lid = $_POST["lid"];
$lpw = password_hash($_POST["lpw"], PASSWORD_DEFAULT);
$charge = $_POST["charge"];

//2. DB接続
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql="INSERT INTO gs_user_table (id, name, email, genre, lid, lpw, charge, life_flg ) VALUES( NULL, :a1, :a2, :a3, :a4, :a5, :a6, 0)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $email, PDO::PARAM_STR);
$stmt->bindValue(':a3', $genre, PDO::PARAM_INT);
$stmt->bindValue(':a4', $lid, PDO::PARAM_STR);
$stmt->bindValue(':a5', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':a6', $charge, PDO::PARAM_INT);

$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．loginページへ。登録できました旨のページも欲しい
  header("Location: login.php");
  exit;
}
?>
