<?php
    session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Welcome To Short URL Link</title>
</head>
<body>
    <div class="menu">
        <form method="POST" action="./checklogin.php">
                    <br>
                    <h1><label for="username">Username</label></h1>
                    <input type="text" name="username" id="username"/>
                    <br>
                    <h1><label for="password">Password</label></h1>
                    <input type="password" id="password" name="password"/>
                    <h1>Don't have account? <a class="link" href="./register.php">Register here</a><h1>
                <?php
                    if(!empty($_SESSION['error'])){
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']);
                        }
                        if(!empty($_GET['message'])){
                            echo $_GET['message']; 
                            unset($_GET['error']);
                            }
                ?>
                    <div>
                        <input type="submit" name="Login" class="tombol"></input>
                    </div>
            </form>
        </div>
</body>
</html>