<?php
    include "header.php";
    include "backend/user.php";
    session_start();
?>
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
        }
    ?>

<?php
    if(isset($_POST["login"])) {
        if(empty($_POST["username"]) || empty($_POST["password"])) {
            echo "Input field must not be empty!";
        } else {
            $user = new User();
            if($user -> logIn($_POST["username"], md5($_POST["password"]))) {
                header('Refresh: 1;');
            } else {
                echo "Wrong credentials!";
            }
        }
    }

    include "footer.php";
?>