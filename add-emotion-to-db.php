<html>
<head>
</head>
<body>
<!-- 
CREATE TABLE 'messages' (
  'id' int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'emotion_id' int NOT NULL,
  'description' text NOT NULL,
  'time' datetime NOT NULL
);

CREATE TABLE 'emotions' (
  'id' int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'image' varchar NULL, 
  'name' varchar NOT NULL
);
-->

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $db = mysqli_connect ('localhost', 'R00195941_db', 'LiftThanStand');
    mysqli_select_db ($db, 'R00195941_db');
    $charset_set = mysqli_set_charset ($db, 'utf8');


    $image_name = "";
    $image = "";


    if(isset($_POST['submit'])) {
        // $image_name = urldecode($POST['image_name']);
        // $image = urldecode($POST['image']);

        // $image_name = isset($POST['image_name']);
        // $image = isset($POST['image']);

        if (isset($_POST["image_name"])) {
            $image_name = $_POST["image_name"];
        }
        // else {
        // echo "image_name: Not Provided";
        // }
        if (isset($_POST["image"])) {
            $image = $_POST["image"];
        }
        // else {
        //     echo "image: Not Provided"
        // }

    }

    
    $safe_name = mysqli_real_escape_string($db, $image_name);
    $safe_image = mysqli_real_escape_string($db, $image);

    
    $result = mysqli_query ($db, "INSERT into emotions (image, name) VALUES ('$safe_image', '$safe_name');");

    if ($result) {
        echo "
            <p>Emotion Name + Image added!</p>
            <p><a href = 'add-emotion-form.php'>Add New Emoticon</a></p>
            <p><a href = 'index.php'>Home</a></p>
        ";
    } else {
        echo "Error!";
    }

    // while ($row = mysqli_fetch_array ($result)) {
    //    echo "<div class = 'result'>{$row}</div>\n";
    // }



?>



<!-- <p>Enter <a href = "form.html">a new message</a></p>
<p>View <a href = "display-messages.php">list of posts</a></p> -->

</body>
</html>