<?php
// if(
//   !isset($_POST["name"]) || $_POST["name"]=="" ||
//   !isset($_POST["loginId"]) || $_POST["loginId"]== "" ||
//   !isset($_POST["loginPassword"]) || $_POST["loginPassword"]== "" ||
//   !isset($_POST["authority"]) || $_POST["authority"]== "" ||
//   !isset($_POST["activity"]) || $_POST["activity"]== "" 
// ){
//   exit('ParamError');
// }

$name = $_POST["name"];
$loginId = $_POST["loginId"];
$loginPassword = $_POST["loginPassword"];
$authority = $_POST["authority"];
// $activity = $_POST["activity"];

//2. DB接続
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql="INSERT INTO gs_user_table ( id, name, lid, lpw, kanri_flg, life_flg ) VALUES( NULL, :a1, :a2, :a3, :a4, 0)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $loginId, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $loginPassword, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $authority, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':a5', $activity, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
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
