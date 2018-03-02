<?php
//入力チェック(受信確認処理追加)
include("functions.php");

if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$name   = $_POST["name"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];

//2. DB接続します(エラー処理追加)
$pdo = db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO user_table(id, name,lid, lpw,
kanri_flg, life_flg )VALUES(NULL, :a1, :a2, :a3, :kanri_flg, :life_flg)");
$stmt->bindValue(':a1', $name);
$stmt->bindValue(':a2', $lid);
$stmt->bindValue(':a3', $lpw);
$stmt->bindValue(':kanri_flg', 0);
$stmt->bindValue(':life_flg', 0);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  queryError($stmt);
}else{
  //５．index.phpへリダイレクト
  header("Location: login.php");
  exit;
}
?>
