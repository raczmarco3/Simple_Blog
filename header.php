<?php
    include "backend/user.php";
    session_start();
?>

<!DOCTYPE html>
    <head>
        <title>Simple Blog</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="right">
                <?php
                    if(!isset($_SESSION["username"])) {
                ?>      
                        <div class="login_form">
                            <form method="POST" action="">
                                <label for="username"><b>Username:</b></label><br>
                                <input type="text" name="username" required><br>
                                <label for="password"><b>Password:</b></label><br>
                                <input type="password" name="password" required><br>
                                <input type="submit" name="login" value="Login">
                            </form>
                        </div>                        
                <?php
                    } else {
                        echo '<div class="login_form">';
                        echo "<p>Welcome back ", $_SESSION["username"], "!</p>";
                ?>
                        <form method="POST" action="">
                        <input type="submit" name="logout" value="Logout">
                        </form>
                <?php
                        if(isset($_POST["logout"])) {
                            unset($_SESSION["username"]);
                            header('Refresh: 0;');
                        }
                        echo "</div>";
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