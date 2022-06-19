<?php
require './init.php';

// DBへ接続
try {

  $dbh = new PDO($dsn, $db_user, $db_password);

  // クエリの実行
  $query = "DELETE FROM `guest` WHERE `id` = ?";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($_POST['id']));

} catch(PDOException $e) {

  $smarty->assign('message', "データベースの接続に失敗しました　" . $e->getMessage());
  $smarty->display('error.html');
  die();

}

// DB接続を閉じる
$dbh = null;

$message = "ゲスト削除しました";
$smarty->assign('message', $message);
$smarty->display('delete.html');
