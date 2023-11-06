<?php

class Model
{
  use Database;

  protected $table = 'users';
  protected $limit = 10;
  protected $offset = 0;

  public function where($data, $dataNot = [])
  {
    $keys = array_keys($data);
    $keysNot = array_keys($dataNot);
    $query = "select * from {$this->table} where ";

    foreach ($keys as $key) {
      $query .= "{$key} = :{$key} && ";
    }

    foreach ($keysNot as $key) {
      $query .= "{$key} != :{$key} && ";
    }

    $query = trim($query, ' && ');
    $query .= " limit {$this->limit} offset {$this->offset}";

    $data = array_merge($data, $dataNot);
    $result = $this->query($query, $data);
    return $result;
  }

  public function
  first($data, $dataNot = [])
  {
    $keys = array_keys($data);
    $keysNot = array_keys($dataNot);
    $query = "select * from {$this->table} where ";

    foreach ($keys as $key) {
      $query .= "{$key} = :{$key} && ";
    }

    foreach ($keysNot as $key) {
      $query .= "{$key} != :{$key} && ";
    }

    $query = trim($query, ' && ');
    $query .= " limit {$this->limit} offset {$this->offset}";

    $data = array_merge($data, $dataNot);
    $result = $this->query($query, $data);
    return $result[0];
  }

  public function insert()
  {
  }

  public function update()
  {
  }
  public function delete($id, $idColumn = 'id')
  {
  }
}
