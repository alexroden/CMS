<?php create_post(); ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_cat_id">Post Category</label>
        <select class="form-control" name="post_cat_id">
            <option value="" selected="selected"> </option>
            <?php cat_select(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select class="form-control" name="post_status">
            <option></option>
            <option value="draft" selected="selected">Draft</option>
            <option value="publish">Publish</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" style="max-width: 100%;"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Add Post">
    </div>
</form>