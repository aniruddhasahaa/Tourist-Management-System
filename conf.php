<?php
 $hostName = "localhost:4411";
 $userName = "root";
 $password = "";
 $dbName = "tms";
 $conn= new mysqli($hostName,$userName,$password,$dbName);
//  if($conn){
//     echo "connected";
//  }else{
//     echo "not connected";
//  }
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }