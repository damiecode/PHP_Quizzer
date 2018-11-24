<?php 
session_start();
include './database.php';
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
              <h2>You're Done!</h2>
                <p>Congrats! You have completed the test</p>
                <p>Final Score: <?php echo $_SESSION['score'];?></p>
                <a href="questions.php?n=1&new=1" class="start">Take Again</a>
            </div>

            <footer>
                <div class="container">
                    Copyright &copy; 2018, PHP Quizzer
                </div>
            </footer>
        </main>
    </body>
</html>