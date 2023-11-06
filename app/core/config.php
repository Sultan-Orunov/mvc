<?php


if ($_SERVER['SERVER_NAME'] == 'localhost') {

  // DB config
  define('HOSTNAME', 'localhost');
  define('DBNAME', 'my_db');
  define('DBUSER', 'root');
  define('DBPWD', '');
  define('CHARSET', 'utf8mb4');
  //end DB config

  define('ROOT', 'http://localhost/mvc');
  define('WWW', ROOT . '/public');
} else {

  // DB config
  define('HOSTNAME', '');
  define('DBNAME', '');
  define('DBUSER', '');
  define('DBPWD', '');
  define('CHARSET', 'utf8mb4');
  //end DB config

  define('ROOT', 'http://website.com');
  define('WWW', ROOT . '/public');
}
