<?php

$dbname = "notcrm";
$username = "root";
$password = "12345678";

try {
    $db = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8;", $username, $password);
    //echo "Bağlandı";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}



?>