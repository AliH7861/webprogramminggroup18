const courses = {
  course1: {
    name: "Course 1",
    videos: [
      { title: "Video 1", url: "https://www.youtube.com/watch?v=example1" },
      { title: "Video 2", url: "https://www.youtube.com/watch?v=example2" },
    ],
    websites: [
      { name: "Resource 1", url: "https://example.com/resource1" },
      { name: "Resource 2", url: "https://example.com/resource2" },
    ],
  },
  course2: {
    name: "Course 2",
    videos: [
      { title: "Lecture 1", url: "https://www.youtube.com/watch?v=example3" },
    ],
    websites: [
      { name: "Extra Notes", url: "https://example.com/notes" },
    ],
  },
};

//Creates a window that contains a form to input new course data
function openCourseForm(){
  const newWindow = window.open("addCourse.php", "_blank");

  //const newWindow = window.open("", "_blank");

/*
  newWindow.document.write(`
    <!DOCTYPE html>
    <html>
    <head>
      <title>Add a New Course</title>
        <link rel="stylesheet" type="text/css" href="services.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">
      <script src="services.js"></script>
    </head>
    <body>
    <div class="formContainer">
    <div class="courseForm">
      <h2>Add a New Course</h2>
      <form id="courseForm">
        <label for="courseName">Course Name:</label>
        <input type="text" id="courseName" required><br><br>

        <label for="courseType">Course Type:</label>
        <select id="courseType" required>
          <option value="math">Math</option>
          <option value="chem">Chemistry</option>
          <option value="bio">Biology</option>
          <option value="eng">English</option>
          <option value="busi">Business</option>
          <option value="eng">Engineering</option>

        </select><br><br>

        <button type="button" onclick="submitCourse()" id="formSubmit">Submit</button>
      </form>
      </div>
      </div>
    </body>
    </html>
  `);
  */

}

function submitCourse() {
/*
  const courseName = document.getElementById("courseName").value.trim();//the trim method gets rid of whitespaces before and after the value input
  const courseType = document.getElementById("courseType").value;

  if (!courseName || !courseType) {
    alert("Please fill out all fields.");
    return;
  }

  if(courses[courseName]){
    alert("Course already exists.");
    return;
  }
  else{

  alert("Added " + [courseName] + " to the list of courses");

  //addCourseToWrapper(courseName, courseType);

  window.opener.addCourseToWrapper(courseName, courseType);
*/
  // Close the form window
  window.close();

  window.opener.location.reload();

  }


function addCourseToWrapper(courseName, courseType) {
  if (!courses[courseName]) {//Check for existing course, if not, create new object
    courses[courseName] = {
      name: courseName,
      videos: [],
      resources: [],
    };

    // Add a new folder for the course to be displayed
    const coursesWrapper = document.querySelector(".coursesWrapper");
    const folderDiv = document.createElement("div");
    folderDiv.classList.add("folder");
    folderDiv.onclick = () => loadCourseContent(courseName);

    const img = document.createElement("img");
    img.src = "folderIcon.png";
    img.alt = courseName;

    const name = document.createElement("p");
    name.textContent = courseName;

    /*
    const type = document.createElement("p");
    type.textContent = courseType;
    type.style.fontSize ="bold";
    */

    folderDiv.appendChild(img);
    folderDiv.appendChild(name);
    coursesWrapper.appendChild(folderDiv);

  
  }
}

function openCourse(courseId){
  window.open('Resources/courseResource.php?course_id='+courseId, "_blank");
}