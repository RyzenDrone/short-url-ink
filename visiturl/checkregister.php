<?php
session_start();
require_once('./sql.php');
if($_SERVER['REQUEST_METHOD']==='POST') {
    if(empty($_POST['username']) || empty($_POST['password'])){
        $_SESSION['error']="The username or password has not been filled!";
    }else{
        $validationn=$_POST['username'];
        $password=md5($_POST['password']);
        $av_char="/[^a-z0-9A-Z@._]/";
        if(preg_match($av_char, $validationn) === 1 || preg_match($av_char, $_POST['password'])===1){
            $_SESSION['error']="Use the right input!";
        }elseif(strlen($validationn)<5 || strlen($validationn)>30){
            $_SESSION['error']="Username must be between 5 and 30 characters!";
        }elseif(strlen($_POST['password'])<5 || strlen($_POST['password'])>30){
            $_SESSION['error']="Password must be between 5 and 30 characters!";
        }else{
            $sql="SELECT userName FROM validationn WHERE userName = ?";
            $query=$mysqli->prepare($sql);
            $query->bind_param("s", $validationn);
            $query->execute();
            $query->store_result();
            if($query->num_rows==0){
                $sql="INSERT INTO validationn(userName, userPass) VALUES (?, ?)";
                $query=$mysqli->prepare($sql);
                $query->bind_param("ss", $validationn, $password);
                $query->execute();
                if($query->affected_rows<0){
                    $message="Sign Up Failed";
                }else{
                    $message="Sign Up Success";
                }
                header("Location: ./login.php?message=$message");
                die;
            }else{
                $_SESSION['error']="Sign Up Failed!<br>Name has been used!";
            }
        }
    }
    header("Location: ./register.php");
    die;
}
?>
