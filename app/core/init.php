<?php

session_start();

spl_autoload_register(function ($class) {
  require_once '../app/models/' . ucfirst($class) . '.php';
});

require_once 'config.php';
require_once 'functions.php';
require_once 'Database.php';
require_once 'Model.php';
require_once 'Controller.php';
require_once 'App.php';
