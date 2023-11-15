<?php

$server_name = "localhost";
$username = "root";
$password = "";
$databaseName= "centralplaza";

//Establish a connection from php to database
     // test thr connection
     try {
      $conn = new PDO("mysql:host=$server_name;dbname=$databaseName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; // echo mean print
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
  }