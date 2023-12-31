<?php

trait Model
{
  use Database;

  protected $limit = 10;
  protected $offset = 0;
  protected $orderType = 'desc';
  protected $orderColumn = 'id';

  public function findAll()
  {
    $query = "select * from {$this->table} order by {$this->orderColumn} {$this->orderType} limit {$this->limit} offset {$this->offset}";
    return $this->query($query);
  }

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
    $query .= " order by {$this->orderColumn} {$this->orderType} limit {$this->limit} offset {$this->offset}";

    $data = array_merge($data, $dataNot);
    $result = $this->query($query, $data);
    return $result;
  }

  public function first($data, $dataNot = [])
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

  public function insert($data)
  {
    //Удаляем лищние данные
    if (!empty($this->fillable)) {
      foreach ($data as $key) {
        if (!in_array($key, $this->fillable)) {
          unset($data[$key]);
        }
      }
    }

    $keys = array_keys($data);
    $query = "insert into {$this->table} (" . implode(',', $keys) . ") values (:" . implode(',:', $keys) . ")";
    return $this->query($query, $data);
  }

  public function update($data, $id, $idColumn = 'id')
  {
    //Удаляем лищние данные
    if (!empty($this->fillable)) {
      foreach ($data as $key) {
        if (!in_array($key, $this->fillable)) {
          unset($data[$key]);
        }
      }
    }

    $keys = array_keys($data);
    $query = "update {$this->table} set ";

    foreach ($keys as $key) {
      $query .= "{$key} = :{$key}, ";
    }

    $query = trim($query, ', ');
    $query .= " where {$idColumn} = :{$idColumn}";
    $data[$idColumn] = $id;
    try {
      $this->query($query, $data);
      return 'Success';
    } catch (PDOException $e) {
      return 'Update is Failed: ' . $e->getMessage();
    }
  }
  public function delete($id, $idColumn = 'id')
  {
    $data[$idColumn] = $id;
    $query = "delete from {$this->table} where {$idColumn} = :{$idColumn}";

    try {
      $this->query($query, $data);
      return "Success";
    } catch (PDOException $e) {
      return "Deleting Error: " . $e->getMessage();
    }
  }
}
