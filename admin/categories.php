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
                            <small>Categories</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php
                                if(isset($_POST['submit'])) {
                                    $new_title = $_POST['cat_title'];
                                    if($new_title == "" || empty($new_title)) {
                                        echo "<div class='alert alert-danger'>Please enter a category.</div>";
                                    } else {
                                        $insert_query = "INSERT INTO categories(cat_title) ";
                                        $insert_query .= "VALUES('{$new_title}')";
                                        $insert = mysqli_query($db, $insert_query);
                                        if(!$insert) {
                                            die('<div class="alert alert-danger">QUERY FAILED '.mysqli_error($db));
                                        }
                                    }
                                }
                            
                            ?>
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            
                                        $query = "SELECT * FROM categories";
                                        $select_cat = mysqli_query($db, $query);
                                        while($row = mysqli_fetch_assoc($select_cat)) {
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "<tr>
                                                    <td>{$cat_id}</td>
                                                    <td>{$cat_title}</td>
                                                    <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                                                    <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
                                                <tr>";
                                        }
                                            
                                        if(isset($_GET['delete'])) {
                                            $get_id = $_GET['delete'];
                                            $delete_query = "DELETE FROM categories WHERE cat_id={$get_id}";
                                            $delete = mysqli_query($db, $delete_query);
                                            header("Location: categories.php");
                                        }
                        
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-6">

                            <form action="categories.php?edit=<?php echo $_GET['edit']; ?>" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Edit Category</label>
                                    <?php
                                        if(isset($_GET['edit'])) {
                                            $edit_id = $_GET['edit'];
                                            $id_select = "SELECT * FROM categories WHERE cat_id={$edit_id} LIMIT 1";
                                            $id_select_query = mysqli_query($db, $id_select);
                                            while($get = mysqli_fetch_assoc($id_select_query)) {
                                                $edit_title = $get['cat_title'];
                                            }
                                            echo "<input class='form-control' type='text' name='edit_title' value='{$edit_title}'>
                                                </div>
                                                <div class='form-group'>
                                                    <input class='btn btn-primary' type='submit' name='edit_submit' value='Edit Category'>
                                                </div>";
                                        } else {
                                            echo "<input class='form-control' type='text' name='edit_title' disabled>
                                                </div>
                                                <div class='form-group'>
                                                    <input class='btn btn-primary' type='submit' name='edit_submit' value='Edit Category' disabled>
                                                </div>";
                                        }
                                        
                                        if(isset($_POST['edit_submit'])) {
                                            $new_title = $_POST['edit_title'];
                                            $edit_query = "UPDATE categories SET cat_title='{$new_title}' WHERE cat_id={$edit_id}";
                                            $edit = mysqli_query($db, $edit_query);
                                            header("Location: categories.php");
                                            if(!$edit) {
                                                die('<div class="alert alert-danger">QUERY FAILED '.mysqli_error($db));
                                            }
                                        }
                                    ?>
                                    
                                    
                                
                                
                            </form>
                        </div>
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