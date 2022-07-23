<?php
    require_once("database.php");

    Class Site {
        private $connection;

        function __construct() {
            $this -> connection = new Database();
        }

        function listPosts() {
            $posts = $this -> connection -> postsQuery();
            if(!empty($posts)) {
                foreach($posts as $post) {
                    echo '<div class="post">';
                        echo '<div class="postTitle">';
                            echo '<h1>', $post["title"], '</h1>';
                        echo '</div>';
                        echo '<div class="postDescription">', $post["description"];
                        echo '<a href="post.php?id="', $post["id"], '">Read More</a>', '</div>';
                        echo '<div class="postEtc">';                        
                            echo '<p>Posted by: ', $post["posted_by"], '</p>'; 
                            echo '<p>', $post["date"], '</p>';    
                        echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No Posts Yet! Come back later!";
            }
        }
    }

?>