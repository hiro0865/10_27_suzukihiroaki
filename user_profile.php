<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");
//session check
chkSsid();

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成＋kanri_flgチェック
$stmt = $pdo->prepare("SELECT * FROM profile_table WHERE lid=:lid");
$stmt->bindValue(":lid", $_SESSION["lid"], PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  $view = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍登録一覧</title>
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
      <div><a href="index.php">トップページ</a></div>
      <!-- if文を入れて管理者と一般の表示を分ける -->
      <?php if($_SESSION["kanri_flg"]=="1"){ ?>
        <a class="navbar-brand" href="admin_register.php">ユーザー一覧登録</a>
        <a class="navbar-brand" href="admin_view.php">ユーザー表示</a>
      <?php }else{ ?>
        
      <?php } ?>
        <a class="navbar-brand" href="profile_register.php">プロフィール登録</a>
        <a class="navbar-brand" href="logout.php">ログアウト</a>

    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
<!-- nameを拾って「こんにちは」と言うようにする -->
  <div><?=$_SESSION["name"]?>さん、こんにちは</div>
      <div>
          ユーザー名：<?=$view["lid"];?><br>
          楽器名：<?=$view["instrument"];?><br>
          ジャンル：<?=$view["genre"];?><br>
          スキルレベル：<?=$view["skill"];?><br>
          コメント：<?=$view["comment"];?><br>
      </div>
</div>
<!-- Main[End] -->

</body>
</html>
