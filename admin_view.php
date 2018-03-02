<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");
//session check
chkSsid();

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<tr>';
    $view .= '<td>';
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= $result["name"];
    $view .= '</td>';
    $view .= '<td>';
    $view .=$result["lid"];
    $view .= '</td>';
    $view .= '<td>';
    $view .=$result["kanri_flg"];
    $view .= '</td>';
    $view .= '<td>';
    $view .=$result["life_flg"];
    $view .= '</td>';
    $view .='</a>';
    $view .= '</td>';
    $view .= '<td>';
    $view .= '<a href="admin_delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .='</a>';
    $view .= '</td>';
    $view .= '</tr>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
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
      <!-- if文を入れて管理者と一般の表示を分ける -->
      <?php if($_SESSION["kanri_flg"]=="1"){ ?>
      <a class="navbar-brand" href="admin_register.php">ユーザー登録</a>
      <?php } ?>
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
          <div class="container jumbotron">
          <table>
          <tr>
          <th>NAME</th>
          <th>ユーザーID</th>
          <th>kanri_flg</th>
          <th>life_flg</th>
          <th>削除</th>
          </tr>
          <?=$view?>
          </table>
          </div>
      </div>
</div>
<!-- Main[End] -->

</body>
</html>
