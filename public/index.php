<?php
session_start();

require_once '../app/core/functions.php';

class App
{
  private function splitURL()
  {
    $url = $_GET['url'] ? $_GET['url'] : 'home';
    $url = explode('/', $url);
    return $url;
  }

  public function loadController()
  {
    $url = $this->splitURL();
    $fileName = '../app/controllers/' . ucfirst($url[0]) . '.php';
    if (file_exists($fileName)) {
      require $fileName;
    } else {
      require '../app/controllers/_404.php';
    }
  }
}



$app = new App();

$app->loadController();
