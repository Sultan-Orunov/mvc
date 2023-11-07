<?php

class Home extends Controller
{
  public function index()
  {
    $model = new Model;
    $data = [];
    $result = $model->update(['name' => 'Mary', 'age' => 30], 2);
    dd($result);
  }
}
