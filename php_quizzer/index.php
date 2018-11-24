<?php 
    session_start();
    include './database.php';
?>

<?php 
    //Get Total Questions 
    $query = "SELECT * FROM questions";
    //Get results 
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
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
                <h2>Test your PHP Knowledge</h2>
                <p>This is a multiple choice quiz to test your knowledge of PHP</p>
                <ul>
                    <li><strong>Number of Questions:</strong> <?php echo $total;?></li>
                     <li><strong>Type:</strong> Multiple Choice</li>
                      <li><strong>Estimated Time:</strong> <?php echo $total * .5; ?>minutes</li>
                      <a href="questions.php?n=1" class="start">Start Quiz</a>
                </ul>
            </div>

            <footer>
                <div class="container">
                    Copyright &copy; 2018, PHP Quizzer
                </div>
            </footer>
        </main>
    </body>
</html>