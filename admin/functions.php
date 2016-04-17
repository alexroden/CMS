<?php 
    function insert_categoires() {
        global $db;
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
    }
    
    function find_all_cats() {
        global $db;
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
    }

    function delete_cat() {
        global $db;
        if(isset($_GET['delete'])) {
            $get_id = $_GET['delete'];
            $delete_query = "DELETE FROM categories WHERE cat_id={$get_id}";
            $delete = mysqli_query($db, $delete_query);
            header("Location: categories.php");
        }
    }
    
    function edit_cat() {
        global $db;
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
    }
    
    function view_posts() {
        global $db;
        $query = "SELECT * FROM posts";
        $post_query = mysqli_query($db, $query);
        while($row = mysqli_fetch_assoc($post_query)) {
            $id = $row['post_id'];
            $cat_id = $row['post_id'];
            $title = $row['post_title'];
            $author = $row['post_author'];
            $date = $row['post_date'];
            $image = $row['post_image'];
            $content = $row['post_content'];
            $tags = $row['post_tags'];
            $comment_count = $row['post_comment_count'];
            $status = $row['post_status'];
            echo "<tr>
                    <td>{$id}</td>
                    <td>{$author}</td>
                    <td>{$title}</td>
                    <td>{$cat_id}</td>
                    <td>{$status}</td>
                    <td><img src='../imgs/{$image}' width='100px'></td>
                    <td>{$tags}</td>
                    <td>{$comment_count}</td>
                    <td>{$date}</td>
                </tr>";
        }
    }
    
    function cat_select() {
        global $db;
        $query = "SELECT * FROM categories";
        $select_cat = mysqli_query($db, $query);
        while($row = mysqli_fetch_assoc($select_cat)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
    }
    
    function create_post() {
        global $db;
        if(isset($_POST['submit'])) {
            $title = $_POST['post_title'];
            $author = $_POST['post_author'];
            $cat_id = $_POST['post_cat_id'];
            $status = $_POST['post_status'];
            $image = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];
            $tags = $_POST['post_tags'];
            $cotent = $_POST['post_content'];
            $post_date = date('d-m-y');
            $post_comment_count = 4;
            $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, posts_comment_count, post_status) ";
            $query .= "VALUES ({$cat_id}, '{$title}', '{$author}', now(), '{$image}', '{$cotent}', '{$tags}', {$post_comment_count}, '{$status}')";
            $insert_query = mysqli_query($db, $query);
            move_uploaded_file($image_temp, "../imgs/".$image);
        }
    }

?>