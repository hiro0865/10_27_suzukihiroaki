<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");
//sessionチェック
chkSsid();


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <div><a href="index.php">トップページ</a></div>
  <?php if($_SESSION["kanri_flg"]=="1"){ ?>
    <a class="navbar-brand" href="user_register.php">ユーザー登録</a>
    <a class="navbar-brand" href="user_view.php">ユーザー表示</a>
    <a class="navbar-brand" href="book_select.php">書籍一覧表示</a>
  <?php }else{ ?>
    <a class="navbar-brand" href="book_user_select.php">書籍一覧表示</a>
  <?php } ?>
    <a class="navbar-brand" href="logout.php">ログアウト</a>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="profile_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>プロフィール登録</legend>
    <label>楽器名：<input type="text" name="instrument"></label><br>
     <label>ジャンル：<input type="text" name="genre"></label><br>
     <label>スキルレベル：<input type="text" name="skill"></label><br>
     <label>コメント：<textArea name="comment" rows="4" cols="40"></textArea></label><br>
     <input type="hidden" name="lid" value="<?=$_SESSION["lid"]?>"> 
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
