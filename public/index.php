<?php
require_once '../app/core/init.php';
$minPHPVersion = '8.0';
if (phpversion() < $minPHPVersion) {
  die("Для запускаа этого приложения ваша версия PHP должна быть {$minPHPVersion} или выше. Ваша текущая версия " . phpversion());
}

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

$app = new App();

$app->loadController();
