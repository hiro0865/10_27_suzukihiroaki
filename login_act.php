<?php
session_start();

// エラーメッセージの初期化
$errorMessage = "";
//0.外部ファイル読み込み
include("functions.php");

//1.  DB接続します
$pdo = db_con();

// 値の空チェック
if (empty($_POST["lid"])){ 
  $errorMessage = "ユーザーIDが未入力です。";
} else if (empty($_POST["lpw"])) {
  $errorMessage =  "パスワードが未入力です。";
}else{

      //2. データ登録SQL作成
      $lid = $_POST["lid"];
      $lpw = $_POST["lpw"];

      $stmt = $pdo->prepare("SELECT*FROM user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0");
      $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
      $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
      $res = $stmt->execute();

      //3. SQL実行時にエラーがある場合
      if($res==false){
          queryError($stmt);
      }

      //4. 抽出データ数を取得
      //$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
      $val = $stmt->fetch(); //1レコードだけ取得する方法

      //5. 該当レコードがあればSESSIONに値を代入
      if( $val["id"] != "" ){
        $_SESSION["chk_ssid"]  = session_id();
        $_SESSION["kanri_flg"] = $val['kanri_flg'];
        $_SESSION["name"]      = $val['name'];
        $_SESSION["lid"]      = $val['lid'];
          if($_SESSION["kanri_flg"]==1){
            header("Location: admin_view.php");
          }else{
            header("Location: user_profile.php");
          }
        //☆☆質問です！ここに「exit();」は必要でしょうか？なくてもうまく言っているような気もします・・・教えて下さい！
      }else{
        // 認証失敗時
        $errorMessage = "入力したユーザーIDまたはパスワードに誤りがあります。";
      }
    }
?>
<header>
  <nav class="navbar navbar-default">ログイン認証</nav>
  <p>ユーザーIDとパスワードを入力して下さい</p>
</header>
<form name="form1" action="login_act.php" method="post">
<div><font color="#ff0000"><?= h($errorMessage); ?></font></div>
ユーザーID:<input type="text" name="lid" /><br>
パスワード:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>