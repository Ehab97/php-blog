<?php include('./includes/header.php');?>
<?php
$id= $_GET['id'];
$db = new Database();
$query ="SELECT * FROM `catagries` WHERE id = $id";
$categories = $db->select($query);
$category = $categories->fetch_assoc();
?>
<?php
if (isset($_POST['submit'])) {
    $Name=mysqli_real_escape_string($db->link,$_POST['name']);

    if ($Name == '') {
        $msg = 'pleas fill all filed ';
    }
    else{

        $query="UPDATE `categories` SET
                name = '$Name'
                WHERE id = $id";

        $update = $db->update($query);

    }
}

?>
<?php
if (isset($_POST['delete'])) {
    $query = "DELETE FROM catagries WHERE id = $id";
    $delete = $db->delete($query);
}
?>
    <form method="post" action="edit_catagries.php">
        <div class="form-group">
            <label>category name</label>
            <input value="<?php echo $category['name'];?>" type="text" class="form-control">
        </div>
        <div>
            <button name="submit" type="submit" class="btn btn-primary">submit</button>
            <a class="btn btn-dark" href="index.php">Cancel</a>
            <button name="delete" type="submit" class="btn btn-danger">delete</button>
        </div>
        <br>
    </form>
<?php include('./includes/footer.php');?>