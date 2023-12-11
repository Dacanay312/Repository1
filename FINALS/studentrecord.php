<!DOCTYPE html>
<html>
<head>
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
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
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

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

        if (isset($_POST["submit"])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "New user record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        if (isset($_POST["submit_instructor"])) {
            $instructor_name = mysqli_real_escape_string($conn, $_POST['instructor_name']);
            $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);

            $sql = "INSERT INTO instructors (instructor_name, specialization) VALUES ('$instructor_name', '$specialization')";

            if ($conn->query($sql) === TRUE) {
                echo "New instructor record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        if (isset($_POST["submit_student"])) {
            $student_name = mysqli_real_escape_string($conn, $_POST['student_nameHere']);
            $major = mysqli_real_escape_string($conn, $_POST['major']);

            $sql = "INSERT INTO students (student_name, major) VALUES ('$student_name', '$major')";

            if ($conn->query($sql) === TRUE) {
                echo "New student record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $sql = "SELECT id, username, email FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Users</h2>";
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $sql = "SELECT id, instructor_name, specialization FROM instructors";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Instructors</h2>";
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Instructor Name</th><th>Specialization</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["instructor_name"] . "</td>";
                echo "<td>" . $row["specialization"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $sql = "SELECT id, student_name, major FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Students</h2>";
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Student Name</th><th>Major</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["student_name"] . "</td>";
                echo "<td>" . $row["major"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>