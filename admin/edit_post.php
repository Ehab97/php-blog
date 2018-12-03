<?php include('./includes/header.php');?>
<?php $id = $_GET['id']; ?>
<?php
$db = new Database();
$query ="SELECT * FROM `posts`WHERE id = ".$id;
$post = $db->select($query);
$row  = $post->fetch_assoc();
?>
<?php
$query ="SELECT * FROM `catagries`";
$categories = $db->select($query);
?>
<?php
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
            $query=" UPDATE `posts` SET  
              `category`=$category,
              `title`=$title,
              `body`=$Body, 
              `auther`=$author ,
              `tags`=$tags 
               WHERE id=".$id;
            $update = $db->update($query);
            if ($update) {
                $msg='post updated';
            }
        }
    }

?>
<?php
if (isset($_POST['delete'])) {
    $query = "DELETE FROM posts WHERE id = $id";
    $delete = $db->delete($query);
}
?>
<form method="post" action="edit_post.php?id=<?php echo $id;?>">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Post title</label>
            <input value="<?php echo $row['title'];?>" name="title" type="text" class="form-control" placeholder="Enter Title">
        </div>
        <div class="form-group col-md-6">
            <label>Post Body</label>
            <textarea name="body" type="text" class="form-control" placeholder="Enter Body">
                "<?php echo $row['body'];?>
            </textarea>
        </div>

        <div class="form-group col-md-6">
            <label>category</label>
            <select class="form-control" name="category">
                <?php while($row2=$categories->fetch_assoc()):?>
                <?php if($row2['id']==$row['category']){
                        $selected='selected';
                     }else{
                        $selected='';
                            }
                ?>
                <option value="<?php echo $row2['id'];?>" <?php echo $selected;?>><?php echo $row2['name'];?></option>
                <?php endwhile;?>

            </select>
        </div>

    <div class="form-group col-md-6">
        <label>Author</label>
        <input value="<?php echo $row['auther'];?>" name="author" type="text" class="form-control" placeholder="Enter author">
    </div>
    <div class="form-group col-md-6">
        <label>tags</label>
        <input value="<?php echo $row['tags'];?>" name="tags" type="text" class="form-control" placeholder="Enter tags">
    </div>
    </div>
    <div>
        <button name="submit" type="submit" class="btn btn-primary">submit</button>
        <a class="btn btn-dark" href="index.php">Cancel</a>
        <button name="delete" type="submit" class="btn btn-danger">delete</button>
    </div>
    <br>
</form

>
<?php include('./includes/footer.php');?>
