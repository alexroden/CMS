<?php include "includes/db.php";?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <?php
    
                    if(isset($_POST['submit'])) {    
                        $search = $_POST['search'];
                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' LIMIT 10";
                        $search_query = mysqli_query($db, $query);
                        if(!$search_query) {
                            die("Query Fail".mysqli_error($db));
                        }
            
                        $count = mysqli_num_rows($search_query);
            
                        if($count == 0) {
                            echo "<div class='alert alert-danger'>No results</div>";
                        } else if($count == 1) {
                            echo "<div class='alert alert-success'>{$count} result</div>";
                            while($row = mysqli_fetch_assoc($search_query)) {
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
                        } else {
                            echo "<div class='alert alert-success'>{$count} results</div>";
                            while($row = mysqli_fetch_assoc($search_query)) {
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
                        }
            
                    }
    
                ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>
    