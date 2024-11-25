<!DOCTYPE html>
<html>

<head>
    <title>Add a Course</title>
    <script src="services.js"></script>
</head>

<body>
        <?php

        echo "    <script src='services.js'></script>";

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
        
        $name =  $_REQUEST['courseName'];
        $type = $_REQUEST['courseType'];
        $courseid =  $_REQUEST['courseId'];

        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO courses  VALUES ('$courseid','$name','$type')";
        


        if(mysqli_query($conn, $sql)){

            echo '<script type="text/javascript">',
            'submitCourse();',
            '</script>';


            //Creating New Rows for Website table, only rows with the correct course_id are loaded for each course
            $defaultWebsiteResources = [
              ['Default Website 1', 'Description for website 1', 'https://via.placeholder.com/250', 'https://example.com'],
              ['Default Website 2', 'Description for website 2', 'https://via.placeholder.com/250', 'https://example.com'],
              ['Default Website 3', 'Description for website 3', 'https://via.placeholder.com/250', 'https://example.com'],
              ['Default Website 4', 'Description for website 4', 'https://via.placeholder.com/250', 'https://example.com'],
              ['Default Website 5', 'Description for website 5', 'https://via.placeholder.com/250', 'https://example.com'],
              ['Default Website 6', 'Description for website 6', 'https://via.placeholder.com/250', 'https://example.com']
          ];
  
          foreach ($defaultWebsiteResources as $resource) {
              $heading = $resource[0];
              $description = $resource[1];
              $image = $resource[2];
              $link = $resource[3];
             // $id = $resource[0];
  
              $insertWebsiteQuery = "INSERT INTO websites (course_id,  header, description, image, link) 
                                     VALUES ('$courseid', '$heading', '$description', '$image', '$link')";
              mysqli_query($conn, $insertWebsiteQuery);
          }
  
            //Creating New Rows for youtube table, only rows with the correct course_id are loaded for each course
            $defaultYouTubeResources = [
              ['Default YouTube Title 1', 'Description for video 1', 'https://via.placeholder.com/250', 'https://youtube.com'],
              ['Default YouTube Title 2', 'Description for video 2', 'https://via.placeholder.com/250', 'https://youtube.com'],
              ['Default YouTube Title 3', 'Description for video 3', 'https://via.placeholder.com/250', 'https://youtube.com'],
              ['Default YouTube Title 4', 'Description for video 4', 'https://via.placeholder.com/250', 'https://youtube.com'],
              ['Default YouTube Title 5', 'Description for video 5', 'https://via.placeholder.com/250', 'https://youtube.com'],
              ['Default YouTube Title 6', 'Description for video 6', 'https://via.placeholder.com/250', 'https://youtube.com']
          ];
  
          foreach ($defaultYouTubeResources as $resource) {
              $heading = $resource[0];
              $description = $resource[1];
              $image = $resource[2];
              $link = $resource[3];
              //$id = $resource[0];
  
              $insertYouTubeQuery = "INSERT INTO youtube_videos (course_id, heading, description, image, link) 
                                     VALUES ('$courseid', '$heading', '$description', '$image', '$link')";
              mysqli_query($conn, $insertYouTubeQuery);
          }


        } else{
            echo "ERROR" 
                . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
        ?>
</body>

</html>