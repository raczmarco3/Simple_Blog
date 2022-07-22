<?php
    include "header.php";
    include "backend/user.php";
?>

    <form method="POST" action="">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>
    <input type="submit" name="submit" value="Submit">
    </form>


<?php
    if(isset($_POST["submit"])) {
        if(empty($_POST["username"]) || empty($_POST["password"])){
            echo "Input field must not be empty!";
        } else {
            $user = new User();
            $user -> register($_POST["username"], md5($_POST["password"]));
        }
    }    
    include "footer.php";
?>