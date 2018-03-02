<?php
//入力チェック(受信確認処理追加)
include("functions.php");

if(
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["instrument"]) || $_POST["instrument"]=="" ||
  !isset($_POST["genre"]) || $_POST["genre"]=="" ||
  !isset($_POST["skill"]) || $_POST["skill"]=="" ||
  !isset($_POST["comment"]) || $_POST["comment"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$lid   = $_POST["lid"];
$instrument   = $_POST["instrument"];
$genre  = $_POST["genre"];
$skill = $_POST["skill"];
$comment = $_POST["comment"];

//2. DB接続します(エラー処理追加)
$pdo = db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO profile_table(id,lid,instrument, genre, skill, comment)
VALUES(NULL,:a0,:a1,:a2,:a3,:a4)");
$stmt->bindValue(':a0', $lid);
$stmt->bindValue(':a1', $instrument);
$stmt->bindValue(':a2', $genre);
$stmt->bindValue(':a3', $skill);
$stmt->bindValue(':a4', $comment);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  queryError($stmt);
}else{
  //５．リダイレクト+kanri_flgチェック
  if($_SESSION["kanri_flg"]==1){
    header("Location: book_select.php");
  }else{
    header("Location: user_profile.php");
  }
  exit();
}
?>
