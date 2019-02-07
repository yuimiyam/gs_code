<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>画像保存用フォーム</title>
</head>
<body>
  <img src="picture/sample1" alt="保存する画像">
  <form action="save.php" method="post">
    <input type="text" name="imageName" placeholder="名前">
    <input type="submit" value="送信">
  </form>
</body>
</html>

<?php
// 送信ボタンが押されたら、入力を受け取ってデータベースに画像を送信
if (isset($_POST['imageName'])) {
  $name = $_POST['imageName'];
} else {}
  echo '名前を入力して送信ボタンを押してください。';
  exit;
}
 
function getPDO() {
  // PHP Data Object を返す
  $dataSourceName = 'mysql:host=localhost;dbname=imagedb;charset=utf8';
  $user = 'root';
  $dbPassword = 'password';
 
  return new PDO($dataSourceName, $user, $dbPassword);
}
 
// 送信する画像の中身と拡張子を取得
$imagePath = "./testImage.png";
$image = file_get_contents($imagePath);
$extension = pathinfo($imagePath, PATHINFO_EXTENSION);
 
try {
 
  $pdo = getPDO();
 
  $tableName = "ImageData";
 
  $insert = $pdo->prepare('INSERT INTO ' . $tableName . ' (name, image, extension) VALUES (:name, :image, :extension)');
  $insert->bindValue(':name', $name, PDO::PARAM_STR);
  $insert->bindValue(':image', $image, PDO::PARAM_LOB);
  $insert->bindValue(':extension', $extension, PDO::PARAM_STR);
  $insert->execute();
 
  echo "登録完了: $name <br>";
  echo '<a href="load.php?name='.$name.'">送信した画像を確認する</a>';
 
} catch (Exception $e) {
  echo "insert failed: " . $e;
}
?>