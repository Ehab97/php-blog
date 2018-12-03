<?php include ('./includes/header.php');?>
<?php
//create db objects
$db=new Database();

//create query
$query="SELECT posts.*,catagries.name FROM posts 
          INNER JOIN catagries
            ON posts.category=catagries.id
              ORDER BY posts.title  desc ";
//run query
$posts=$db->select($query);
//create query
$query="SELECT * FROM catagries ORDER BY name DESC ";
//run query
$catagries=$db->select($query);

?>
<!-continue here- -->
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">post ID</th>
            <th scope="col">post Title</th>
            <th scope="col">author</th>
            <th scope="col">category</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <?php while($row=$posts->fetch_assoc()) : ?>
        <tr>
                <td><?php echo $row['id'];?></td>
                <td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['auther'];?></td>
                <td><?php echo format_date($row['date']);?></td>
        </tr>
        <?php endwhile; ?>
        <tbody>
        </tbody>
    </table>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">category ID</th>
            <th scope="col">category name</th>
        </tr>
        </thead>
        <tbody>
<?php while($row=$catagries->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><a href="edit_catagries.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
        </tr>
<?php endwhile; ?>
        </tbody>
    </table>
<!-End here- -->
<?php include ('./includes/footer.php');?>