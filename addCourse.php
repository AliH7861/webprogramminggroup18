<!DOCTYPE html>
<html>
<head>
    <title>Add a New Course</title>
    <link rel="stylesheet" type="text/css" href="services.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">

</head>
<body class="pagecenter">

    <form method="POST" action="insertCourse.php" class="courseForm">
        <div class="courseform-title">
        <h2>Add a New Course</h2></div>

        <div class="courseinput1">
        <div class="course-name-section">
        <label for="courseName">Course Name:</label>
        <input type="text" id="courseName" name="courseName" required><br><br></div>

        <div class="coursetype"> 
        <label for="courseType">Course Type:</label>
        <select id="courseType" name="courseType" required>

            <option value="math">Math</option>
            <option value="chem">Chemistry</option>
            <option value="bio">Biology</option>
            <option value="eng">English</option>
            <option value="busi">Business</option>
            <option value="eng">Engineering</option>
        </select><br><br></div>
        </div>

        <div class="courseinputrow2">
        <div class="courseID">
        <label for="courseId">Course Id:</label>
        <input type="text" id="courseId" name="courseId" required><br><br>
        </div></div>

        <div class="courseinputrow3">
            <button type="submit" onclick="submitCourse()" id="formSubmit">Submit</button></div>
    </form>
</body>
</html>
