<?php include ('./includes/header.php') ?>
<?php
//create db objects
$db=new Database();

//check url for catgreis
if(isset($_GET['catagries'])){
    $catagries=$_GET['catagries'];
    //create query
    $query="SELECT * FROM posts WHERE category =".$catagries;
    //run query
    $posts=$db->select($query);
}else{
    //create query
    $query="SELECT * FROM posts ";
    //run query
    $posts=$db->select($query);
}
//create query
$query="SELECT * FROM catagries ";
//run query
$catagries=$db->select($query);




?>
<?php if($posts) : ?>

    <?php while ($row = $posts->fetch_assoc()) : ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?> </h2>
            <p class="blog-post-meta"><?php echo format_date($row['date']);?> <a href="#"><?php echo $row['auther'];?></a></p>
            <p><?php echo format_short($row['body']);?></p>
            <a href="post.php?id=<?php echo urlencode($row['id']);?>" class="readmore">read more</a>
        </div><!-- /.blog-post -->
    <?php endwhile; ?>

<?php else : ?>
    <p>Thereare not posts Yet</p>
<?php endif; ?>
<?php include('./includes/footer.php') ?>
