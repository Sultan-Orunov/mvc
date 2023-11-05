<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {

  define('ROOT', 'http://localhost/mvc');
  define('WWW', ROOT . '/public');
} else {
  define('ROOT', 'http://website.com');
  define('WWW', ROOT . '/public');
}
