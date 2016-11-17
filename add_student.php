<?php
// Get the student data
$course_id = filter_input(INPUT_POST, 'course_id');
$fName = filter_input(INPUT_POST, 'firstName');
$lName = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// Validate inputs
if ($course_id == null || $course_id == false ||
    $fName == null || $lName == null || $email == null || $email == false) {
    $error = "Invalid student data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the student to the database
    $query = 'INSERT INTO sk_students
                 (courseID, firstName, lastName, email)
              VALUES
                 (:course_id, :firstName, :lastName, :email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->bindValue(':firstName', $fName);
    $statement->bindValue(':lastName', $lName);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();

    // Display the student List page
    include('index.php');
}
