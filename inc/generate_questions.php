<?php
// Generate random questions
$questions = [];
// Loop for required number of questions
// Get random numbers to add
for ($i = 0; $i <= 9; $i++) {
$leftie = rand(1, 1000);
$rightie = rand(1, 1000);
// Calculate correct answer
$bestGuess= $leftie + $rightie;
// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer
$badGuess= $bestGuess + rand(-10, -1);
$worseGuess= $bestGuess + rand(1, 10);
// Add question and answer to questions array
$questions = [
    'leftAdder' => $leftie,
    'rightAdder' => $rightie,
    'correctAnswer' => $bestGuess,
    'firstIncorrectAnswer' => $badGuess,
    'secondIncorrectAnswer' => $worseGuess
];
}