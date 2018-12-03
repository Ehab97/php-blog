<?php
//create connection 1
$dbhost = 'localhost';
$dbuser = 'Ehab';
$dbpass = '123';
$dbname = 'quizzer';
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//create mysqli object
$mysqli=new mysqli($dbhost, $dbuser, $dbpass, $dbname);

////error handler 2 way
if($mysqli->connect_error){
    printf('connect failed %s\n',$mysqli->connect_error);
    exit();
}
?>
