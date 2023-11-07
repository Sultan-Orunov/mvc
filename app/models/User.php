<?php

class User
{
  use Model;

  protected $table = 'users';
  protected $fillable = [
    'name',
    'lastname',
    'age '
  ];
}
