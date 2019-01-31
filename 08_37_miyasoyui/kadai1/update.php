<?php
$bookName = $_POST["bookName"];
$bookURL = $_POST["bookURL"];
$bookComment = $_POST["bookComment"];
$readDate = $_POST["readDate"];
$id = $_POST["id"];

include "funcs.php";
$pdo = db_con();


$sql = "UPDATE gs_bm_table SET bookName=:bookName, bookURL=:bookURL, bookComment=:bookComment, readDate=:readDate WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bookName', $bookName, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookURL', $bookURL, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookComment', $bookComment, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':readDate', $readDate, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();


if ($status == false) {
    sqlError($stmt);
} else {
    header("Location: select.php");
    exit;
}

?>

