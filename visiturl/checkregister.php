<?php
session_start();
require_once('./sql.php');
if($_SERVER['REQUEST_METHOD']==='POST'){
    $error_msg=false;
    if(isset($_POST['username'])&&isset($_POST['password'])){
        if(!empty($_POST['username'])&&!empty($_POST['password'])){
            $validationn=$_POST['username'];
            $password=md5($_POST['password']);
            $av_char="/[^a-z0-9A-Z@._]/";
            if(preg_match($av_char, $validationn)===1){
                $_SESSION['error']="Use the right input!";
                $error_msg=true;
            }
            else if(preg_match($av_char, $_POST['password'])===1){
                $_SESSION['error']="Use the right input!";
                $error_msg=true;
            }
            if($error_msg){
                header("Location: ./register.php");
                die;
            }
            if(empty($validationn)){
                $_SESSION['error']="Username cannot be empty!";
                $error_msg=true;
            }
            else if(strlen($validationn)<5){
                $_SESSION['error']="Username is too short!";
                $error_msg=true;
            }
            else if(strlen($validationn)>30){
                $_SESSION['error']="Username is too long!";
                $error_msg=true;
            }
            if(empty($_POST['password'])){
                $_SESSION['error']="Password cannot be empty!";
                $error_msg=true;
            }
            else if(strlen($_POST['password'])<5){
                $_SESSION['error']="Password is too short!";
                $error_msg=true;
            }
            else if(strlen($_POST['password'])>30){
                $_SESSION['error']="Password is too long!";
                $error_msg=true;
            }
            if($error_msg){
                header("Location: ./register.php");
                die;
            }
            $sql="SELECT userName FROM validationn WHERE userName=?";
            $query=$mysqli->prepare($sql);
            $hasil=$query->bind_param("s",$validationn);
            $query->execute();
            $query->store_result();
            if($query->num_rows==0){
                $sql="INSERT INTO validationn(userName,userPass) VALUES (?,?)";
                $query=$mysqli->prepare($sql);
                $hasil=$query->bind_param("ss",$validationn,$password);
                $query->execute();
                if($query->affected_rows<0){
                    $message="Sign Up Failed";
                    header("location: ./register.php?message=$message");
                }
                else{
                    $message="Sign Up Success";
                    header("location: ./login.php?message=$message");
                }
            }
            else{
                    $query->fetch();
                    $error_msg=true;
                    $_SESSION['error']="Sign Up Failed!<br>Name has been used!";
                    header("location: ./register.php");
                    die;
            }
        }
        else if(empty($_POST['username'])||empty($_POST['password'])){
            $_SESSION['error']="The username or password has not been filled!";
            header("Location: ./register.php");
            die;
        }
    }
    else if(!isset($_POST['username']) && !isset($_POST['password'])){
        $_SESSION['error']="The username or password has not been filled!";
        header("Location: ./register.php");
        die;
    }
}
?>