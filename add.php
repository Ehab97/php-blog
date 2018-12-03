<?php include('includes/connection.php') ?>
<?php
    if(isset($_POST['submit'])){
        //get post  variables
        $question_num=$_POST['question_num'];
        $question_text=$_POST['question_text'];
        $correct_choice=$_POST['correct_choice'];
        //choices array
        $choices=array();
        $choices[1]=$_POST['choice1'];
        $choices[2]=$_POST['choice2'];
        $choices[3]=$_POST['choice3'];
        $choices[4]=$_POST['choice4'];
        $choices[5]=$_POST['choice5'];
        //question queries
        $query="INSERT INTO `questions` (question_num,text) values ('$question_num','$question_text') ";
        //run query
        $insert_row=$mysqli->query($query) or die($mysqli->error.__LINE__);
        //validate insert row
        if($insert_row){
            foreach ($choices as $choice=>$value){
                if ($value != ''){
                       if($correct_choice==$choice){
                            $is_correct=1;
                       }
                       else{
                           $is_correct=0;
                       }
                       //choices queries
                       $query ="INSERT INTO  `choices` (question_num,is_correct,text) 
                                values ('$question_num','$is_correct','$value')";
                       //run query
                        $insert_row=$mysqli->query($query) or die($mysqli->error.__LINE__);
                        //validation
                    if($insert_row){
                        continue;
                    }
                    else{
                        die('Error : ('.$mysqli->errno.') '.$mysqli->error);
                    }
                }
            }
           $msg='questions has been added';
        }
    }
//get total
$query="SELECT * FROM `questions`";
$result=$mysqli->query($query)or die($mysqli->error.__LINE__);
$total=$result->num_rows;
$next=$total+1;

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <title>ShoutBox</title>
</head>

<body>
<header>
    <div class="container">
        <h1>php Quizzer</h1>
    </div>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-12"><h2>Add A Question</h2>
                <?php
                    if(isset($msg))
                    {
                        echo '<p>'.$msg.'</p>';
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="add.php">
                    <p>
                        <label>question number: </label>
                        <input type="number" name="question_num" value="<?php echo $next;?>">
                    </p>
                    <p>
                        <label>question Text: </label>
                        <input type="text" name="question_text">
                    </p>
                    <p>
                        <label>Choice1: </label>
                        <input type="text" name="choice1">
                    </p>
                    <p>
                        <label>Choice2: </label>
                        <input type="text" name="choice2">
                    </p>
                    <p>
                        <label>Choice3: </label>
                        <input type="text" name="choice3">
                    </p>
                    <p>
                        <label>Choice4: </label>
                        <input type="text" name="choice4">
                    </p>
                    <p>
                        <label>Choice5: </label>
                        <input type="text" name="choice5">
                    </p>
                    <p>
                        <label>correct choice number : </label>
                        <input type="number" name="correct_choice">
                    </p>
                    <p>
                        <button type="submit" name="submit">submit</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</main>
<footer>
    <div class="container">
        <p>CopyRights &copy; For Php 2018</p>
    </div>
</footer>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/vue.js"></script>
<script src="js/main.js"></script>
</body>

</html>