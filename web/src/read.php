<?php
require './init.php';

// DBへ接続
try {

  $dbh = new PDO($dsn, $db_user, $db_password);

  // クエリの実行
  $query = "SELECT `id`, `name`, `email`, `address`, `created_at`, `updated_at` FROM `guest` WHERE `id` = ?";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($_GET['id']));

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch(PDOException $e) {

  $smarty->assign('message', "データベースの接続に失敗しました　" . $e->getMessage());
  $smarty->display('error.html');
  die();

}

// DB接続を閉じる
$dbh = null;

$smarty->assign('guest', $result);
$smarty->display('read.html');
