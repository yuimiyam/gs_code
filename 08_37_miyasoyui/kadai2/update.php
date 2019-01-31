<?php
$name = $_POST["name"];
$loginId = $_POST["loginId"];
$loginPassword = $_POST["loginPassword"];
$authority = $_POST["authority"];
$id = $_POST["id"];

include "funcs.php";
$pdo = db_con();

$sql = "UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw, kanri_flg=:kanri_flg WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $loginId, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $loginPassword, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $authority, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();


if ($status == false) {
    sqlError($stmt);
} else {
    header("Location: select.php");
    exit;
}

?>

