<?php
require './vendor/autoload.php';

// Loggerを設定
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('guestbook');
$log->info("get Guest List");

// 変数を初期化
$db_host      = getenv('DB_HOST');
$db_name      = getenv('DB_NAME');
$db_user      = getenv('DB_USER');
$db_password  = getenv('DB_PASSWORD');

$dsn      = "mysql:dbname=$db_name;host=$db_host";

$rows = [];

// Smartyを初期化
$smarty = new Smarty();

$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';


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

// 接続を閉じる
$dbh = null;

// データの取得に成功した場合
$smarty->assign('guests', $rows);
$smarty->display('index.html');

?>
