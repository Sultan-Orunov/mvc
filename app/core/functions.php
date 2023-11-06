<?php

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
