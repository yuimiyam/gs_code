<?php
session_start();

include("funcs.php");
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

$pdo = db_con();

$sql = "SELECT * FROM gs_user_table WHERE lid = :lid/* AND lpw = :lpw */AND life_flg = 0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
// $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$res = $stmt->execute();

if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

$val = $stmt->fetch();

if(password_verify($lpw, $val["lpw"])){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["charge"] = $val['charge'];
  $_SESSION["name"]      = $val['name'];
  header("Location: select.php");
}else{
  header("Location: login.php");
}
exit();
?>

