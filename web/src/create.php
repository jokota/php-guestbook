<?php
require './init.php';

var_dump($_POST);

// DBへ接続
try {

  $dbh = new PDO($dsn, $db_user, $db_password);

  // クエリの実行
  $query = "INSERT INTO `guest` (`name`, `email`, `address`) VALUES (?, ?, ?)";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($_POST['Name'], $_POST['Email'], $_POST['Address']));

} catch(PDOException $e) {

  $smarty->assign('message', "データベースの接続に失敗しました　" . $e->getMessage());
  $smarty->display('error.html');
  die();

}

// DB接続を閉じる
$dbh = null;

$message = "ゲスト登録しました";
$smarty->assign('message', $message);
$smarty->display('create.html');
