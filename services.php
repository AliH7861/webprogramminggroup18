<!DOCTYPE html>

<html>

<head>

  <link rel="stylesheet" type="text/css" href="services.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">

  <script src="services.js"></script>

</head>


<body>

  <div class="nav">
    <nav class="navbar">
      <ul>
        <li class="logo"><img src="otu_logo.png" alt="Logo" width="80" height="80"></li>
        <li><a href="index.php">Home Page</a></li>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#resources">School Resources</a></li>
        <li><a href="#footer">Contact Us</a></li>
      </ul>
    </nav>
  </div>

  
  <div class="courses" id="courses">

    <h1>Courses</h1>

    <div class="coursesWrapper">  

      <div class="folder" onclick="openCourseForm()">
        <img src="plus.png" alt="Course +">
        <p>Add Course</p>
      </div>

<?php
$conn = mysqli_connect("localhost", "root", "", "course_management");

if($conn === false){
  die("ERROR: Could not connect. " 
      . mysqli_connect_error());
}

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
      echo '<div class="folder" onclick="openCourse(\'' . $row['id'] . '\')">';
      echo '<img src="folderIcon.png" alt="' .$row['name']. '">';
      echo '<p>' .$row['name']. '</p>';
      echo '<p>' .$row['id']. '</p>';
      echo '</div>';
  }
}
// Close the database connection
$conn->close();



?>
  </div>
  </div>

  <div class="resources" id="resources">

    <h1>School Resources</h1>

    <div class="resource">
      <div class="link">
      <h3>Here is a link to Ontario Tech University's <a
          href="https://studentlife.ontariotechu.ca/current-students/academic-support/index.php">Student Learning
          Centre</a></h3>
          </div>
          <div class="link">
      <h3>Here is a link to Ontario Tech University's <a
          href="https://studentlife.ontariotechu.ca/current-students/academic-support/peer-tutoring-and-pass/peer-pods.php">Peer
          Provides</a></h3>
          </div>
          <div class="link">
      <h3>Here is a link to Ontario Tech University's <a
          href="https://studentlife.ontariotechu.ca/current-students/academic-support/peer-tutoring-and-pass/peer-tutoring.php">Peer
          Tutoring</a></h3>
          </div>
          <div class="link">
      <h3>Here is a link to Ontario Tech University's <a
          href="https://studentlife.ontariotechu.ca/current-students/academic-support/peer-tutoring-and-pass/peer-assisted-study-sessions-pass.php">PASS</a>
      </h3>
      </div>


    </div>
</div>

    </div>

    <div class="footer" id="footer">

      <div class="message">

        <h3 class="msg">
          Message Us
        </h3>

        <p>
          Please feel free to give us your feedback,
          we value student feedback to yield efficient
          results to our students at our university
        </p>

        <p>&#9751; 2000 Simcoe Street North </p>
        <p>&#9743; 647-234-1231</p>
        <p>&#9993; <a href="mailto: email@gmail.com">ali.hakkani@ontariotechu.net</a></p>

      </div>

        <?php

echo "<script src='services.js'></script>";

// servername => localhost
// username => root
// password => empty
// database name => course_management
$conn = mysqli_connect("localhost", "root", "", "course_management");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}

   echo '<div class="form">

      <fieldset class="comments">

        <legend>Leave a Comment</legend>

        <br />
        <form method="post">
        <label id="firstName" for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required> <br /> <br />

        <label id="lastName" for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required> <br /> <br />

        <label id="email" for="email">Email: &nbsp;&nbsp;&nbsp; </label>
        <input type="email" id="email" name="email" required> <br /> <br />

        <label class="comments" for="comments">Comments:</label><br /><br />
        <textarea type="textarea" id="comments" name="comments" required></textarea> <br /> <br />

        <button type="submit" id="submit">Submit</button>
        </form>
      </fieldset>

    </div>

  </div>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  // Get form data
  $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $comments = mysqli_real_escape_string($conn, $_POST['comments']);
  
  //Insert the feedback and comments into the database table
  $sql = "INSERT INTO feedback (firstName, lastName, email, feedback) 
          VALUES ('$firstName', '$lastName', '$email', '$comments')";

mysqli_query($conn, $sql);

  echo '<script type="text/javascript">
          alert("Thank You for the Feedback!");
        </script>';

mysqli_close($conn);
}

  ?>
    </div>


</body>



</html>