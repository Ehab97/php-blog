<?php include('./includes/header.php');?>
<?php
$db = new Database();
$msg='';

if (isset($_POST['submit'])) {
    $name=mysqli_real_escape_string($db->link,$_POST['	name']);
    if ($name == '' ) {
        $msg = 'pleas fill all filed ';
    }
    else{
        $query="INSERT INTO `catagries`(`name`) 
    VALUES('$name')";
        $insert = $db->insert($query);
        if ($insert) {
            $msg='category added';
        }
    }
}

?>
<?php
$query ="SELECT * FROM `catagries`";
$categories = $db->select($query);
?>
<form method="post" action="add_catagries.php">
    <div class="form-group">
        <label>category name</label>
        <input type="text" class="form-control" placeholder="Enter category name">
    </div>
    <div>
        <button name="submit" type="submit" class="btn btn-primary">submit</button>
        <a class="btn btn-dark" href="index.php">Cancel</a>
        <button name="delete" type="submit" class="btn btn-danger">delete</button>
    </div>
    <br>
</form>
<?php include('./includes/footer.php');?>