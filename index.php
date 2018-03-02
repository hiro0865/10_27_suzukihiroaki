<?php
//0.外部ファイル読み込み
include("functions.php");
//1.  DB接続します
$pdo = db_con();
//２．データ登録SQL作成＋kanri_flgチェック
$stmt = $pdo->prepare("SELECT * FROM profile_table ORDER BY id DESC LIMIT 20");
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
    $view .= '<a href="index_detail.php?id='.$result["id"].'">';
    $view .= $result["lid"];
    $view .= '</td>';
    $view .= '<td>';
    $view .=$result["instrument"];
    $view .= '</td>';
    $view .= '<td>';
    $view .=$result["genre"];
    $view .= '</td>';
    $view .= '<td>';
    $view .=$result["comment"];
    $view .= '</td>';
    $view .='</a>';
    $view .= '</td>';
    $view .= '</tr>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <ul class="main-nav">
          <li><img src="img/music.jpg" width="175px" alt="音符"></li>
          <li><a href="user_profile.php">マイページ</a></li>
          <li><a href="login.php">ログイン</a></li>
          <li><a href="logout.php">ログアウト</a></li>
          <li><a href="user_first_register.php">新規登録</a></li>
        </ul>
      </nav>

<h1>バンド結成サイト</h1>

<div id ="main">
    <p>ユーザー登録してバンドを結成しよう！</p>
    <div id ="output">
          <div class="container jumbotron">
          <table>
          <tr>
          <th>ユーザー</th>
          <th>楽器</th>
          <th>ジャンル</th>
          <th>コメント</th>          
          </tr>
          <?=$view?>
          </table>
          </div>
    </div>
</div>

</body>
</html>