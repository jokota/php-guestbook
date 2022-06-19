<?php
require './vendor/autoload.php';

$db_host      = getenv('DB_HOST');
$db_name      = getenv('DB_NAME');
$db_user      = getenv('DB_USER');
$db_password  = getenv('DB_PASSWORD');

$dsn      = "mysql:dbname=$db_name;host=$db_host";

// DBへ接続
try {
  
  $dbh = new PDO($dsn, $db_user, $db_password);

  // クエリの実行
  $query = "SELECT * FROM guest";
  $stmt = $dbh->query($query);

  // Fetch
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
  print("データベースの接続に失敗しました".$e->getMessage());
  die();
}

// 接続を閉じる
$dbh = null;

$smarty = new Smarty();

$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

$smarty->assign('test1', '11行目です。');
$smarty->assign('test2', '2行目です。');
$smarty->assign('test3', '3行目です。');

$smarty->assign('guests', $rows);

$smarty->display('index.html');

?>
