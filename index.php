<?php
    include "header.php";
    include "backend/site.php";

    $site = new Site();
    $site->listPosts();
?>
    

<?php
    include "footer.php";
?>