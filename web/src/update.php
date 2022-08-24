<?php
require './init.php';

// DBへ接続
try {

  $dbh = new PDO($dsn, $db_user, $db_password);

  // クエリの実行
  $query = "UPDATE `guest` SET `name` = ?, `email` = ?, `address` = ? WHERE `id` = ?";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($_POST['Name'], $_POST['Email'], $_POST['Address'], $_POST['id']));

} catch(PDOException $e) {

  $smarty->assign('message', "データベースの接続に失敗しました　" . $e->getMessage());
  $smarty->display('error.html');
  die();

}

// DB接続を閉じる
$dbh = null;

$message = "情報を更新しました";
$smarty->assign('message', $message);
$smarty->display('update.html');