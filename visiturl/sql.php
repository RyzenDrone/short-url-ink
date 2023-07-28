<?php
    $user='root';
    $password="";
    $host="localhost:3307";
    $mysqli=new mysqli($host,$user,$password);
if($mysqli->connect_errno){
    die("Cannot connect database<br>\n");
}
else{
    if(!$mysqli->select_db('validationlogin')){
        die("Database doesn't exsist<br>\n");
    }
}
?>