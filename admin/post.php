<?php include "includes/header.php"; ?>
    <div id="wrapper">

        <?php include "includes/navbar.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small>Posts</small>
                        </h1>
                        <?php
                        
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }
                        
                        switch($source) {
                            case "add_post";
                                include "includes/add_post.php";
                            break;
                            case 2;
                            break;
                            default;
                                include "includes/view_all_posts.php";    
                            break;
                        }
                        
                        
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"; ?>