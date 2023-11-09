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

/**Загрузи изображение, если не существует загрузи placeholder */
function get_image(mixed $file = '', string $type = 'post'): string
{

  $file = $file ?? '';
  if (file_exists($file)) {
    return ROOT . "/" . $file;
  }

  if ($type == 'user') {
    return ROOT . "/assets/images/user.webp";
  } else {
    return ROOT . "/assets/images/no_image.jpg";
  }
}
