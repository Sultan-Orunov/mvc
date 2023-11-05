<?php

class App
{
  private $controller;
  private $method = 'index';

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
      $this->controller = ucfirst($url[0]);
    } else {
      require '../app/views/errors/_404.php';
      $this->controller = '_404';
    }


    $controller = new $this->controller;
    call_user_func_array([$controller, $this->method], []);
  }
}
