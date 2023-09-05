<?php

$dbname = "postedworks_notcrm";
$username = "postedworks_projepost";
$password = "8505510250Pp";

try {
    $db = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8;", $username, $password);
    //echo "Bağlandı";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}



?>