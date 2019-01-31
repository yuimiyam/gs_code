<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
if(
  !isset($_GET["bookName"]) || $_GET["bookName"]=="" ||
  !isset($_GET["bookURL"]) || $_GET["bookURL"]== "" ||
  !isset($_GET["bookComment"]) || $_GET["bookComment"]== "" ||
  !isset($_GET["readDate"]) || $_GET["readDate"]== ""
){
  exit('ParamError');
}

$bookName = $_GET["bookName"];
$bookURL = $_GET["bookURL"];
$bookComment = $_GET["bookComment"];
$readDate = $_GET["readDate"];

//2. DB接続
include "funcs.php";
$pdo = db_con();


//３．データ登録SQL作成
$sql="INSERT INTO gs_bm_table ( id, bookName, bookURL, bookComment, readDate, dateOfRegistration ) VALUES( NULL, :a1, :a2, :a3, :a4, sysdate())";
// $sql = "INSERT INTO gs_an_table( id, name, email, naiyou, indate )VALUES( NULL, :a1, :a2, :a3, sysdate())";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $bookName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $bookURL, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $bookComment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $readDate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':a4', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;
}
?>
