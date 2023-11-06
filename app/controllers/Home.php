<?php

class Home extends Controller
{
  public function index()
  {
    $model = new Model;
    $data = ['age' => 23];
    $result = $model->first($data);
    show($result);
  }
}
