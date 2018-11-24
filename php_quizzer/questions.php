<?php
session_start();
include_once('./database.php');
//Get question number
$number = (int) $_GET['n'];

if(isset($_GET["new"])){
    $new = (int)$_GET["new"];
    if($new == 1){
        unset($_SESSION["score"]);
    }
}
//Get question
$query = "SELECT * FROM `questions` WHERE question_number=$number";
//Get Result
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question = $result->fetch_assoc();

//Get Choices
$query = "SELECT * FROM `choices` WHERE question_number = $number";


//Get Results
$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

$query = "SELECT * FROM `questions`";
//Get result
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows; 
$next = $total+1;

?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PHP QUIZZER </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="container">
                <h1>PHP Quizzer</h1>
            </div>
        </header>

        <main>
            <div class="container">
               <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
               <p class="question">
                 <?php echo $question['Text']; ?>
               </p>
               <form method="post" action="process.php">
                    <ul class="choices">
                        <?php while($row = $choices->fetch_assoc()) : ?>
                            <li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"/><?php echo $row['Text']; ?></li>
                        <?php endwhile ?>
                    </ul>
                    <input type="submit" name="submit" value="submit"/>
                    <input type="hidden" name="number" value="<?php echo $number; ?>"/>
               </form>
            </div>

            <footer>
                <div class="container">
                    Copyright &copy; 2018, PHP Quizzer
                </div>
            </footer>
        </main>
    </body>
</html>