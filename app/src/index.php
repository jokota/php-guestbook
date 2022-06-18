<?php
require './vendor/autoload.php';

$smarty = new Smarty();

$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

$smarty->assign('test1', '11行目です。');
$smarty->assign('test2', '2行目です。');
$smarty->assign('test3', '3行目です。');

$smarty->display('form.html');

?>
