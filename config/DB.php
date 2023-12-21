<?php
class DB {
  static function getConnection(){
    $conn = new mysqli("localhost","root","","ecommerce_caps_store");
    if($conn->connect_error){
      die("Connection Failed!".$conn->connect_error);
    }
    return $conn;
  }
}