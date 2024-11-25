<?php

// Database values
$host = "localhost"; //host
$username = "root"; //username
$password = ""; //password
$dbname = "course_management"; //database name

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch input data
    $data = json_decode(file_get_contents("php://input"), true);
    $name = $conn->real_escape_string($data['name']);
    $type = $conn->real_escape_string($data['type']);

    // Check for duplicate entry
    $checkQuery = "SELECT id FROM courses WHERE name = '$name'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        http_response_code(409); // Conflict
        echo json_encode(["message" => "Course already exists"]);
    } else {
        // Insert the new course
        $insertQuery = "INSERT INTO courses (name, type) VALUES ('$name', '$type')";
        if ($conn->query($insertQuery) === TRUE) {
            echo json_encode(["message" => "Course added successfully"]);
        } else {
            echo json_encode(["message" => "Error adding course: " . $conn->error]);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve all courses
    $query = "SELECT name, type FROM courses";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $courses = [];
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
        echo json_encode($courses);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode(["message" => "Method not allowed"]);
}

// Close the database connection
$conn->close();
?>
