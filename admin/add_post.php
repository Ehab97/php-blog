<?php include('./includes/header.php');?>
<?php
$db = new Database();
$msg='';

if (isset($_POST['submit'])) {
    $title=mysqli_real_escape_string($db->link,$_POST['title']);
    $Body=mysqli_real_escape_string($db->link,$_POST['body']);
    $category=mysqli_real_escape_string($db->link,$_POST['category']);
    $author=mysqli_real_escape_string($db->link,$_POST['author']);
    $tags=mysqli_real_escape_string($db->link,$_POST['tags']);
    if ($title == '' || $Body == '' || $author == '') {
        $msg = 'pleas fill all filed ';
    }
    else{
        $query="INSERT INTO `posts`(`category`, `title`, `body`, `auther`, `tags`) 
    VALUES('$category','$title','$Body','$author','$tags')";
        $insert = $db->insert($query);
        if ($insert) {
            $msg='post added';
        }
    }
}

?>
<?php
$query ="SELECT * FROM `catagries`";
$categories = $db->select($query);
?>
<form method="post" action="add_post.php">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Post title</label>
            <input name="title" type="text" class="form-control" placeholder="Enter Title">
        </div>
        <div class="form-group col-md-6">
            <label>Post Body</label>
            <textarea name="body" type="text" class="form-control" placeholder="Enter Body"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label>category</label>
            <select class="form-control" name="category">
                <?php while($row=$categories->fetch_assoc()):?>
                    <?php if($row['id']==$post['category']){
                        $selected='selected';
                    }else{
                        $selected='';
                    }
                    ?>
                    <option value="<?php echo $row['id'];?>" <?php echo $selected;?>><?php echo $row['name'];?></option>
                <?php endwhile;?>

            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Author</label>
            <input name="author" type="text" class="form-control" placeholder="Enter author">
        </div>
        <div class="form-group col-md-6">
            <label>tags</label>
            <input name="tags" type="text" class="form-control" placeholder="Enter tags">
        </div>
    </div>
    <div>
        <button name="submit" type="submit" class="btn btn-primary">submit</button>
        <a class="btn btn-dark" href="index.php">Cancel</a>
        <button name="delete" type="submit" class="btn btn-danger">delete</button>
    </div>
    <br>
</form>
<?php include('./includes/footer.php');?>
