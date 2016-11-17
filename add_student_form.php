<?php
require('database.php');
$query = 'SELECT *
          FROM sk_courses
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
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Course Manager</h1></header>

    <main>
        <h1>Add Student</h1>
        <form action="add_student.php" method="post"
              id="add_student_form">

            <label>Course:</label>
            <select name="course_id">
            <?php foreach ($courses as $course) : ?>
                <option value="<?php echo $course['courseID']; ?>">
                    <?php echo $course['courseID'].'-'.$course['courseName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>First Name:</label>
            <input type="text" name="firstName"><br>

            <label>Last Name:</label>
            <input type="text" name="lastName"><br>

            <label>Email:</label>
            <input type="text" name="email"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Student"><br>
        </form>
        <p><a href="index.php">View Course List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Zichen Ma</p>
    </footer>
</body>
</html>