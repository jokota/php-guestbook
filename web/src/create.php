<?php
require './vendor/autoload.php';

$smarty = new Smarty();

$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

$smarty->display('create.html');

?>