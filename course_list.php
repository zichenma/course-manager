<?php
require_once('database.php');

// Get all courses
$query = 'SELECT * FROM sk_courses
                       ORDER BY courseID';
$statement = $db->prepare($query);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Course Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Course Manager</h1></header>
<main>
    <h1>Course List</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <!-- add code for the rest of the table here -->
        <?php foreach ($courses as $course) : ?>
            <tr>
                <td><?php echo $course['courseID']; ?></td>
                <td><?php echo $course['courseName']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
    <p>
    <h2>Add Course</h2>

    <!-- add code for the form here -->
    <form action="add_course.php" method="post"
          id="add_course_form">

        <label>Course ID:</label>
        <input type="text" name="c_ID"><br>
        <label>Course Name:</label>
        <input type="text" name="c_Name"><br>
         <p>

        <label>&nbsp;</label>
        <input type="submit" value="Add Course"><br>

    </form>

    <br>
    <p><a href="index.php">List Students</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Zichen Ma</p>
    </footer>
</body>
</html>