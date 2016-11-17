<?php
// Get the course data
$cID = filter_input(INPUT_POST, 'c_ID');
$cName = filter_input(INPUT_POST, 'c_Name');

// Validate inputs
if ($cID == null || $cName == null) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the student to the database
    $query = 'INSERT INTO sk_courses
                 (courseID,courseName)
              VALUES
                 (:c_ID,:c_Name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':c_ID', $cID);
    $statement->bindValue(':c_Name', $cName);
    $statement->execute();
    $statement->closeCursor();

    // Display the Student List page
    include('course_list.php');
}
