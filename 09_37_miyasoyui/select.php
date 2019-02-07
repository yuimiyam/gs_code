<?php
session_start();
include "funcs.php";
sessChk();

$pdo = db_con();

$stmt = $pdo->prepare("SELECT * FROM gs_shop_table");
$status = $stmt->execute();

$view = "";
$star = "";
if ($status == false) {
    sqlError($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $star = "";
        $cuisine ="";
        if ($result["rate"] == 1){
            $star = '★☆☆☆☆';
        }else if($result["rate"] == 2){
            $star = '★★☆☆☆';
        }elseif($result["rate"] == 3){
            $star = '★★★☆☆';
        }elseif($result["rate"] == 4){
            $star = '★★★★☆';
        }else{
            $star = '★★★★★';
        };
        if($result["shopGenre"] == 0){
            $cuisine = '和食';
        }elseif($result["shopGenre"] == 1){
            $cuisine = '洋食';
        }elseif($result["shopGenre"] == 2){
            $cuisine = '中華';
        }elseif($result["shopGenre"] == 3){
            $cuisine = 'イタリアン';
        }elseif($result["shopGenre"] == 4){
            $cuisine = 'ファーストフード';
        }elseif($result["shopGenre"] == 5){
            $cuisine = 'エスニック';
        }else{
            $cuisine = 'その他';
        };
        if($_SESSION["charge"] == 0 || $_SESSION["charge"] == 1){
            $view .= '<tr><td>'.$result["id"].'</td><td>'.$result["shopName"].'</td><td>'.$cuisine.'</td><td>'.$star.'</td><td>'.$result["access"].'</td><td>'.$result["shopComment"].'</td><td>'.$result["businessHour"].'</td><td>'.$result["budget"].'</td></tr>';
        }else{
            $view .= '<tr><td>'.$result["id"].'</td><td>'.$result["shopName"].'</td><td>'.$cuisine.'</td><td>'.$star.'</td><td>'.$result["access"].'</td><td>'.$result["shopComment"].'</td><td>'.$result["businessHour"].'</td><td>'.$result["budget"].'</td><td><a href="*">オンライン予約へ</a></td></tr>';
        };
    };
};

$userAccount = $_SESSION["name"];
$userCharge = "";

if ($_SESSION["name"] == ""){
    $userAccount = "ゲスト";
    $userCharge = "お試し期間中";
}else{
    switch($_SESSION["charge"]){
        case 0: $userCharge = "一般ユーザー";
        break;
        case 1: $userCharge = "プレミアムユーザー";
        break;
        case 2: $userCharge = "アルティメットプラチナユーザー";
        break;
    }
};
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tokyo Gourmet Journal</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.default.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>
<style>
div{padding: 10px;font-size:16px;}

#reserve{
    display: none;
}

#description{
    font-size: 12px;
    color: #191970;
}

#title{
    font-size: 40px;
    text-align: center;
}

</style>
</head>
<body id="main">
<header>
<p id="title">Tokyo Gourmet Journal</p>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <?=$userAccount?>さん、こんにちは!<br>
      <?=$userAccount?>さんは現在、<?=$userCharge?>です<br><br>
        <p id="description">＊プランの説明＊<br>☆ゲストユーザー様or一般ユーザー様：TGJ登録のお店情報を見ることができます<br>☆プレミアムユーザー様：ソート機能がつきます<br>☆アルティメットプラチナユーザー様：オンライン予約ができます</p>
        <a class="navbar-brand" href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<p></p>
<div>
    <table border='1' id="myTable" class="tablesorter">
        <thead>
            <tr>
                <th>ID</th>
                <th>店名</th>
                <th>ジャンル</th>
                <th>評価</th>
                <th>アクセス</th>
                <th>お店紹介</th>
                <th>営業時間</th>
                <th>予算</th>
                <th id="reserve">オンライン予約</th>
            </tr>
        </thead>
        <tbody>
            <?=$view?>
        </tbody>
    </table>
</div>
</body>
<script>

if(<?php echo $_SESSION["charge"] ?> == 1 || <?php echo $_SESSION["charge"] ?> == 2){
    $(document).ready(function(){
        $("#myTable").tablesorter();
    }
    );
};

if(<?php echo $_SESSION["charge"]?> == 2){
    $("#reserve").show();
};


</script>
</html>