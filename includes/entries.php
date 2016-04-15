<div class="col-md-8">
    <h1 class='page-header'>
        Page Heading
        <small>Secondary Text</small>
    </h1>
    
    <?php
    
        $query = "SELECT * FROM posts";
        $select_all_posts = mysqli_query($db, $query);
        
        while($row = mysqli_fetch_assoc($select_all_posts)) {
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            
            echo "<h2>
                    <a href='#'>{$post_title}</a>
                </h2>";
            echo "<p class='lead'>
                    by <a href='index.php'>{$post_author}</a>
                </p>";
            echo "<p>
                    <span class='glyphicon glyphicon-time'></span>
                    Posted on {$post_date}
                </p>";
            echo "<hr>
                    <img class='img-responsive' src='imgs/{$post_image}' alt=''>
                <hr>";
            echo "<p>
                    {$post_content}
                </p>";
            echo "<a class='btn btn-primary' href='#'>
                    Read More <span class='glyphicon glyphicon-chevron-right'></span>
                </a>
                <hr>";  
        }
    
    ?>

    

</div>