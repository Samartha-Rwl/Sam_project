<?php
if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $class = $_POST['class'];
    $grade = $_POST['grade'];

    $host = "localhost";
    $username = "samartha";
    $password = "rawal";
    $databaseName = "list_students";

    $connection = mysqli_connect($host, $username, $password, $databaseName);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "INSERT INTO students (first_name, last_name, class, grade) VALUES ('$firstName', '$lastName', $class, '$grade')";

    if ($connection->query($sql) === TRUE) {
        echo "<style>";
        echo "body {display:flex; align-items:center; justify-content:center; flex-direction:column;}";
        echo ".success-message { color: green; font-size: 2em; }";
        echo ".link { color: blue; text-decoration: none; }";
        echo "</style>";

        echo "<p class='success-message'>Student record created successfully</p><br>";
        echo "<a href='../read.html' class='link'>View Records</a>";
    } else {
        echo "<style>";
        echo ".error-message { color: red; }";
        echo "</style>";

        echo "<p class='error-message'>Error: " . $sql . "<br>" . $connection->error . "</p>";
    }
    $connection->close();
}
?>
