<?php

class Home extends Controller
{
  public function index()
  {
    $user = new User;
    // $data = ['name' => 'Katy', 'lastname' => 'Tatum', 'age' => 30];
    $result = $user->findAll();
    show($result);
  }
}
