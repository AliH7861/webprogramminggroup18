<!DOCTYPE html>

<html>

<head>

  <link rel="stylesheet" type="text/css" href="Home.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">

</head>


<body>

<div class="bar">
  <nav class="navbar">
    <ul>
      <li class="logo"><img src="otu_logo.png" alt="Logo" width="80" height="80"></li>
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About Us</a></li>
      <li><a href="#services">Our Services</a></li>
      <li><a href="#ourteam">Our Team</a></li>
      <li><a href="#footer">Contact Us</a></li>
    </ul>
  </nav>
</div>

  <!--Navbar Ends Here-->

  <div class="wrapper" id="home">

    <div class="left">

      <h1>Welcome to Our Website</h1>
      <h3>Here are our resources for your courses</h3>
      <button class="redirect"  onclick="window.location.href='services.php';">Go to Services</button>

    </div>

    <div class="right">

      <img class="school"
        src="https://news.ontariotechu.ca/archives/2022/03/images/vpri-young-university-top-200-thumbnail.jpg">

    </div>

  </div>


  <!--The Home Section Ends Here-->

  <section class="au" id="about">
    <h1 id="h1">About Us</h1>
    <p id="aboutp">
      We are just a bunch of software engineering students dedicated to making your academic experience smooth.
      We know there are a lot of resources online; however, not all of them are relevant. Hence, we have organized
      this website with a bunch of curated resources.
    </p>
  </section>

  <!--Services Section-->

  <div class="ourservices-section" id="services">
    <div class="content-titles">
      <h1 class="services-header"> Our Services</h1>
      <h4-services-content> Here is the list of Our Services that Our Website Provides</h4>
    </div>

    <div class="service-box-section">

      <div class="service-box">
        <div class="logo-box">
          <div class="service-logo"><img src="images.png"></div>
        </div>
        <div class="service-header">Course Resources</div>
        <div class="service-content">Students can easily access their courses and relevant reference links
           for the courses offered at Ontario Tech University in one place.
        </div>
      </div>

      <div class="service-box">
        <div class="logo-box">
          <div class="service-logo"><img src="images.png"></div>
        </div>
        <div class="service-header">Academic Stress Reduction</div>
        <div class="service-content">The platform seeks to increase student productivity and decrease stress by 
          cutting down on time spent looking for resources while offering a welcoming and encouraging online community.</div>
      </div>

      <div class="service-box">
        <div class="logo-box">
          <div class="service-logo"><img src="images.png"></div>
        </div>
        <div class="service-header">Dynamic Course Upload</div>
        <div class="service-content">Students can add various courses to the website, allowing shared accessibility to 
          shared resources such as videos and websites.
        </div>
      </div>
    </div>
  </div>

  </div>

  <!--Our Team -->

  <div class="ourteam-container" id="ourteam">
    <div class="ourteam-header">
      <h1> Our Team</h1>
    </div>

    <div class="ourteam-content">
      <div class="person-container" id="person1">
        <div class="person-image"><img src="Ali.jpeg"></div>
        <h3 class="person-name"> Ali Hakkani</h3>
        <h5 class="person-position"> BackEnd Developer </h5>
      </div>

      <div class="person-container">
        <div class="person-image"><img src="Sukhchain.jpg"></div>
        <h3 class="person-name"> Sukhchain Dhallu</h3>
        <h5 class="person-position"> FrontEnd Developer</h5>
      </div>

      <div class="person-container">
        <div class="person-image"><img src="Bilal.jpg"></div>
        <h3 class="person-name"> Bilal Brohi</h3>
        <h5 class="person-position"> FrontEnd Developer</h5>
      </div>

      <div class="person-container" id="person2">
        <div class="person-image"><img src="Ahmed.jpg"></div>
        <h3 class="person-name"> Ahmad Ubaid</h3>
        <h5 class="person-position"> Resource Collection </h5>
      </div>
    </div>
  </div>

  <!--Footer-->
  <div class="footer" id="footer">

    <div class="message">

      <h5 class="msg">
        Message Us
      </h5>

      <p>
        Please free, feel to give us your feedback,
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

        <label id="email" for="email">Email:</label>
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


</body>

</html>