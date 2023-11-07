<?php

trait Database
{

  private function connect()
  {
    $dsn = "mysql:hostname=" . HOSTNAME . ";dbname=" . DBNAME . ";charset=" . CHARSET;
    $connection = new PDO($dsn, DBUSER, DBPWD);
    return $connection;
  }

  public function query($query, $params = [])
  {
    $connect = $this->connect();
    $stmt = $connect->prepare($query);
    $check = $stmt->execute($params);

    if ($check) {
      $result = $stmt->fetchAll(PDO::FETCH_OBJ);
      if (is_array($result) && count($result)) {
        return $result;
      }
    } else {
      return "Query is Failed";
    }
  }
}
