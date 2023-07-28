<?php
session_start();
require_once('sql.php');
if($_SERVER['REQUEST_METHOD']==='POST'){
    $error_msg=false;
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $validationn=$_POST['username'];
        $password=md5($_POST['password']);
        $av_char="/[^a-z0-9A-Z@._]/"; 
        if(preg_match($av_char, $validationn)===1){
            $_SESSION['error']="Use the right input!";
            $error_msg=true;
            }
        if($error_msg){
            header("Location: ./login.php");
            die;
            }
        if(strlen($validationn)<5){
            $_SESSION['error']="Username is too long!";
            $error_msg=true;
        }
        else if(strlen($validationn)>30){
            $_SESSION['error']="Username is too long!";
            $error_msg=true;
        }
        if(strlen($_POST['password'])<5){
            $_SESSION['error']="Password is too long!";
            $error_msg=true;
        }
        else if(strlen($_POST['password'])>30){
            $_SESSION['error']="Password is too long!";
            $error_msg=true;
        }
        $sql="SELECT userID,userName FROM validationn WHERE userName = ? AND userPass= ?";
        $query=$mysqli->prepare($sql);
        $hasil=$query->bind_param("ss",$validationn,$password);
        $query->execute();
        $query->bind_result($user_id,$username_data);
        $query->store_result();
        if($query->num_rows>0){
            $query->fetch();
            $_SESSION['is_login']=true;
            $_SESSION['user_id']=$user_id;
            $_SESSION['username']=$username_data;
            header("Location: ./index.php");
        }
        else{
            $message="Incorrect username or password!";
            header("Location: ./login.php?message=$message");
            $mysqli->close();
            session_destroy();
            unset($_SESSION);
            die;
        }
    }
    else{
        $_SESSION['error']="Username and password cannot be empty!!";
        header("Location: ./login.php");
        die;
    }
}
?>