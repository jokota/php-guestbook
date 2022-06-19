<?php
require './init.php';

// ログを出力
$log->info("get Guest List");

// 変数を初期化
$rows = [];

// DBへ接続
try {

  $dbh = new PDO($dsn, $db_user, $db_password);

  // クエリの実行
  $query = "SELECT * FROM guest";
  $stmt = $dbh->query($query);

  // Fetch
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {

  $smarty->assign('message', "データベースの接続に失敗しました　" . $e->getMessage());
  $smarty->display('error.html');
  die();

}

// DB接続を閉じる
$dbh = null;

// データの取得に成功した場合
$smarty->assign('guests', $rows);
$smarty->display('index.html');

?>
