<?php
    include "backend/user.php";
    session_start();
?>

<!DOCTYPE html>
    <head>
        <title>Simple Blog</title>
    </head>
    <body>
        <div class="right">
            <?php
                if(!isset($_SESSION["username"])) {
            ?>
                    <form method="POST" action="">
                        Username: <input type="text" name="username" required>
                        Password: <input type="password" name="password" required>
                        <input type="submit" name="login" value="Login">
                    </form>
            <?php
                } else {
                    echo "Welcome back ", $_SESSION["username"];
            ?>
                    <form method="POST" action="">
                        <input type="submit" name="logout" value="Logout">
                    </form>
            <?php
                    if(isset($_POST["logout"])) {
                        unset($_SESSION["username"]);
                        header('Refresh: 0;');
                    }
                }
            ?>
        </div>
        <div class="left">

<?php
    if(isset($_POST["login"])) {
        if(empty($_POST["username"]) || empty($_POST["password"])) {
            echo "Input field must not be empty!";
        } else {
            $user = new User();
            if($user -> logIn($_POST["username"], md5($_POST["password"]))) {
                header('Refresh: 0;');
            } else {
                echo "Wrong credentials!";
            }
        }
    }
?>