<?php 

session_start();
require_once("vendor/autoload.php");


use \Slim\Slim;

$app = new Slim();

//rota do Tpl do Usuário
$app->config('debug', true);

require_once("admin.php");
require_once("site.php");


$app -> run();
?>

