<?php include ('./includes/header.php') ?>
<?php
$id=$_GET['id'];
//create db objects
$db=new Database();

//create query
$query="SELECT * FROM posts WHERE id=".$id;
//run query
$post=$db->select($query)->fetch_assoc();
//create query
$query="SELECT * FROM catagries ";
//run query
$catagries=$db->select($query);

?>

            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $post['title'];?> </h2>
                <p class="blog-post-meta"><?php echo format_date($post['date']);?> <a href="#"><?php echo $post['auther'];?></a></p>
                <p><?php echo $post['body'];?></p>
            </div><!-- /.blog-post -->

<?php include ('./includes/footer.php') ?>