<?php 
session_start();
include './database.php';


//Check to se if score is set to error_handler
if(!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if(isset($_POST["submit"])) {
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    // echo $number. '<br>';
    // echo $selected_choice;
    $next = $number+1;
    $query = "SELECT * FROM `questions`";
    //Get result
    $results = $mysqli->query($query) ; //or die($mysqli->error.__LINE__);
    $total = $results->num_rows; 
    // Get correct answer
    $query = "SELECT * FROM `choices` WHERE question_number= $number AND is_correct=1;";
    //Get result
    $result = $mysqli->query($query); // or die($mysqli->error.__LINE__);
    //Get row
    $row = $result->fetch_assoc();
    //Set correct choice
    $correct_choice = $row['id'];
    //compare
    if($correct_choice == $selected_choice) {
        //Answer is correct
        
        $_SESSION['score']++;
        if($number == $total) {
            header("Location: final.php");
        }else {
            header("Location: questions.php?n={$next}&new=0");
            }
        }else if($correct_choice != $selected_choice) {
            if($number == $total) {
                header("Location: final.php");
                exit();
            }else {
                header("Location: questions.php?n={$next}&new=0");
            }
        }
    }
      

