<!DOCTYPE html>
<html>
<head>
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <!-- Add User -->
        <h2>Add User</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary" name="submit_user">Submit</button>
        </form>

        <!-- Add Instructor -->
        <h2>Add Instructor</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="instructor_name">Instructor Name:</label>
                <input type="text" class="form-control" id="instructor_name" name="instructor_name">
            </div>
            <div class="form-group">
                <label for="specialization">Specialization:</label>
                <input type="text" class="form-control" id="specialization" name="specialization">
            </div>
            <button type="submit" class="btn btn-primary" name="submit_instructor">Submit</button>
        </form>

        <!-- Add Course -->
        <h2>Add Course</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" class="form-control" id="course_name" name="course_name">
            </div>
            <div class="form-group">
                <label for="specification">Course Specification:</label>
                <input type="text" class="form-control" id="specification" name="specification">
            </div>
            <button type="submit" class="btn btn-primary" name="submit_course">Submit</button>
        </form>

        <!-- Add Student -->
        <h2>Add Student</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" class="form-control" id="student_name" name="student_name">
            </div>
            <div class="form-group">
                <label for="major">Major:</label>
                <input type="text" class="form-control" id="major" name="major">
            </div>
            <button type="submit" class="btn btn-primary" name="submit_student">Submit</button>
        </form>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dacanay";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Add User
        if (isset($_POST["submit_user"])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "New user record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Add Instructor
        if (isset($_POST["submit_instructor"])) {
            $instructor_name = mysqli_real_escape_string($conn, $_POST['instructor_name']);
            $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);

            $sql = "INSERT INTO instructor (instructor_name, specialization) VALUES ('$instructor_name', '$specialization')";

            if ($conn->query($sql) === TRUE) {
                echo "New instructor record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

