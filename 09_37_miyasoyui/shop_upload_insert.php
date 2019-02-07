<?php
$shopName = $_POST["shopName"];
$rate = $_POST["rate"];
$access = $_POST["access"];
$shopGenre = $_POST["shopGenre"];
$shopComment = $_POST["shopComment"];
$businessHour = $_POST["businessHour"];
$budget = $_POST["budget"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_shop_table(id, shopName, rate, access, shopGenre, shopComment, businessHour, budget)VALUES(NULL, :shopName, :rate, :access, :shopGenre, :shopComment, :businessHour, :budget)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':shopName', $shopName, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':rate', $rate, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':access', $access, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':shopGenre', $shopGenre, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':shopComment', $shopComment, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':businessHour', $businessHour, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':budget', $budget, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: shop_upload.php");
    exit;
}
