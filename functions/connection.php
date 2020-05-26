<?php
  
  function connection () {

    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $db = 'bloggen';

    $connection = new mysqli($servername, $username, $password, $db);
    
    if ($connection->connect_error) {
      die('error: '.$connection->connect_error );

    } else {}

    return $connection;

  }

?>