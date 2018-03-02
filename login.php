<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<header>
<div><a href="index.php">トップページ</a></div>
</header>

<div>
<nav class="navbar navbar-default">ログイン認証</nav>
  <p>ユーザーIDとパスワードを入力して下さい</p>
</div>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
ユーザーID:<input type="text" name="lid" /><br>
パスワード:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>


</body>
</html>