<?php
    session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="register.css">
    <title>Register</title>
</head>
<body>
    <div class="menu">
        <h1>Register</h1>
            <form method="post" action="./checkregister.php">
            <br>
            <h1><label for="username">Username</label></h1>
            <input type="text" name="username" id="username"/>
            <br>
            <h1><label for="password">Password</label></h1>
            <input type="password" id="password" name="password" />
          <?php
            if(!empty($_SESSION['error'])){
              echo'<div class="error-reg">'; 
              echo $_SESSION['error']; 
              echo'</div>';
              unset($_SESSION['error']);
              }
            ?>
            <br>
            <br>
            <input type="submit" name="Login" class="btnregister"></input>
            </div>
        </form>
    </div>
</body>
</html>