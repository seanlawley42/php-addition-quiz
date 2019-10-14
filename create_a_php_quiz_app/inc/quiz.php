<?php
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 *
 * These comments are to help you get started.
 * You may split the file and move the comments around as needed.
 *
 * You will find examples of formating in the index.php script.
 * Make sure you update the index file to use this PHP script, and persist the users answers.
 *
 * For the questions, you may use:
 *  1. PHP array of questions
 *  2. json formated questions
 *  3. auto generate questions
 *
 */
// First we need to start a session:
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 //Include questions
include 'inc/generate_questions.php';

// Keep track of which questions have been asked
$whichQuestionBruh = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
    if (empty($whichQuestionBruh)){
        session_destroy();
        $whichQuestionBruh += 1;
    }      
if ($whichQuestionBruh <= 10){
// Show which question they are on
// Show random question
echo "<p class='breadcrumbs'> You are on challenge ". $whichQuestionBruh . " of 10.</p>";
echo '<form action="index.php?p=' . ($whichQuestionBruh + 1) . '" method="post">';
echo "<p class= 'quiz'> What is " . $questions['leftAdder'] . '+ ' . $questions['rightAdder'] . "?</p>";

// Shuffle answer buttons
$answers = [
    $questions['correctAnswer'], 
    $questions['firstIncorrectAnswer'], 
    $questions['secondIncorrectAnswer']
];
shuffle($answers);
echo "<input type = 'submit' class = 'btn' name = 'answer' value = '" . $answers[0] . "'>";
echo "<input type = 'submit' class = 'btn' name = 'answer' value = '" . $answers[1] . "'>";
echo "<input type = 'submit' class = 'btn' name = 'answer' value = '" . $answers[2] . "'>";
echo "</form>";
}
// Toast correct and incorrect answers
// Keep track of answers
if (!isset($_SESSION['scoreboard'])){
    $_SESSION['scoreboard'] = 0;
}  

if (isset($_POST['answer']) && isset($_POST['correctAnswer'])) {
    $_SESSION['answer'] = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['correctAnswer'] = filter_input(INPUT_POST, 'correctAnswer', FILTER_SANITIZE_NUMBER_INT);
    
    if (($_SESSION['answer'] == $_SESSION['correctAnswer'])) {
    $_SESSION['scoreboard']++;
    echo '<h1>That is correct. All will kneel before your math majesty!</h1>';
    }
    elseif ($_SESSION['answer'] !== $_SESSION['correctAnswer']){
    echo '<h1>A shame upon your house! The right answer was ' . $_SESSION['correctAnswer'] . '.</h1>';
        }
    }

// If all questions have been asked, give option to show score
elseif ($whichQuestionBruh == 11) {
    echo '<h1 class="quiz">Your Labors are over. For now...</h1>';
    echo '<form action="index.php?p=' . ($whichQuestionBruh + 1) . '"method="post">';
    echo '<input type="submit" class="btn" name="answer" value="Where Do You Stand?" />';
    echo '</form>';
}
// Or we can start a new game
elseif ($whichQuestionBruh == 12){
    echo '<h2 class="quiz">Congratulations, mighty warrior. </h2>';
    echo '<h3>You are on your way to becoming an addition master!</h3>';
    echo '<p>You got </p>';
    echo $_SESSION['scoreboard'];
    echo '<p> out of 10!</p>';
    echo '<form action="index.php">';
    echo '<input type="submit" class="btn" name="quiz" value="Try again?" />';
    echo '</form>';
}

//Change the background color to create a dazzling, psychedelic showstopper of wonderment
function backgrounderz(){
    $uno = rand(120,180);
    $dos = rand(120,180);
    $tres = rand(120,180);
    $randomonium = "($uno, $dos, $tres)";
    echo $randomonium;
}
?>