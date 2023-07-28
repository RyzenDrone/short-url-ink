<?php
    $user='root';
    $password='';
    $host='localhost:3307';
    $mysqli=new mysqli($host,$user,$password);
    if($mysqli->connect_errno){
        die("Cannot connect to the database: " . $mysqli->connect_error);
    }
    $databaseName='validationlogin';
    if(!$mysqli->select_db($databaseName)){
        die("Database '{$databaseName}' doesn't exist: " . $mysqli->error);
    }
?>
