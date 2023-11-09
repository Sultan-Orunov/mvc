<?php

/** check which php extensions are required */
check_extensions();
function check_extensions()
{

  $required_extensions = [

    'gd',
    'pdo_mysql',
    'mbstring',
    'exif',
  ];

  $not_loaded = [];

  foreach ($required_extensions as $ext) {

    if (!extension_loaded($ext)) {
      $not_loaded[] = $ext;
    }
  }

  if (!empty($not_loaded)) {
    show("Please load the following extensions in your php.ini file: <br>" . implode("<br>", $not_loaded));
    die;
  }
}

function show($stuff)
{
  echo "<pre>";
  print_r($stuff);
  echo "</pre>";
}

function dump($stuff)
{
  echo "<pre>";
  var_dump($stuff);
  echo "</pre>";
}

function dd($stuff)
{
  echo "<pre>";
  var_dump($stuff);
  echo "</pre>";
  die();
}

function esc($str)
{
  return htmlspecialchars($str);
}

function redirect($path)
{
  header("Location: " . ROOT . "/" . $path);
  die();
}
