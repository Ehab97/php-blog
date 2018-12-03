<?php session_start();?>
<?php
 include('connection.php');
?>

<?php
//check to see if the score set error handler
    if (!isset($_SESSION['score'])){
        $_SESSION['score']=0;
    }
    if($_POST){
        $number=$_POST['number'];
        $selected_choice=$_POST['choice'];
        $next=$number+1;
        //get total
        $query="SELECT * FROM `questions`";
        $result=$mysqli->query($query)or die($mysqli->error.__LINE__);
        $total=$result->num_rows;
        //Get Correct choice
        $query="SELECT * FROM `choices` ";
        $query.="WHERE question_num = $number AND is_correct=1";
        $result=$mysqli->query($query)or die($mysqli->error.__LINE__);
        //GET row
        $row=$result->fetch_assoc();
        //set correct choice
        $correct_choice=$row['id'];
        //compare

        if ($correct_choice==$selected_choice){
            //answer is correct
            $_SESSION['score']++;
        }

        if($number==$total){
            header("Location: ../final.php");
            exit();
        }
        else{
            header("Location: ../question.php?n=".$next);

        }
    }
?>
