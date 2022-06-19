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

// Smartyを初期化
$smarty = new Smarty();

$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';
