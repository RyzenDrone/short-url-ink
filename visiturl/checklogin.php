<?php
session_start();
require_once('sql.php');
if($_SERVER['REQUEST_METHOD']==='POST'){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    if(empty($username) || empty($password)){
        $_SESSION['error']="Username and password cannot be empty!";
    }elseif(strlen($username)<5 || strlen($username)>30){
        $_SESSION['error']="Username must be between 5 and 30 characters!";
    }elseif(strlen($_POST['password'])<5 || strlen($_POST['password'])>30){
        $_SESSION['error']="Password must be between 5 and 30 characters!";
    }elseif(!preg_match("/^[a-zA-Z0-9@._]+$/", $username)){
        $_SESSION['error']="Use the right input!";
    }else{
        $sql="SELECT userID, userName FROM validationn WHERE userName = ? AND userPass = ?";
        $query=$mysqli->prepare($sql);
        $query->bind_param("ss", $username, $password);
        $query->execute();
        $query->bind_result($user_id, $username_data);
        $query->store_result();
        if ($query->num_rows>0){
            $query->fetch();
            $_SESSION['is_login']=true;
            $_SESSION['user_id']=$user_id;
            $_SESSION['username']=$username_data;
            header("Location: ./index.php");
            die;
        }else{
            $_SESSION['error']="Incorrect username or password!";
            session_destroy();
            unset($_SESSION);
        }
    }
    header("Location: ./login.php");
    die;
    }
?>