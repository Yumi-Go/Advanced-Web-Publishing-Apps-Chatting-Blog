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
  'imgFileName' varchar NULL, 
  'imgName' varchar NOT NULL
);
-->

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $db = mysqli_connect ('localhost', 'R00195941_db', 'LiftThanStand');
    mysqli_select_db ($db, 'R00195941_db');
    $charset_set = mysqli_set_charset ($db, 'utf8');


    $imgName = "";
    $imgFileName = "";


    if(isset($_POST['submit'])) {

        if (isset($_POST["imgName"])) {
            $imgName = $_POST["imgName"];
        }
        if (isset($_POST["imgFileName"])) {
            $imgFileName = $_POST["imgFileName"];
        }
    }

    
    $safe_imgName = mysqli_real_escape_string($db, $imgName);
    $safe_imgFileName = mysqli_real_escape_string($db, $imgFileName);

    
    $result = mysqli_query ($db, "INSERT into emotions (imgFileName, imgName) VALUES ('$safe_imgFileName', '$safe_imgName');");

    if ($result) {
        echo "
            <p>Emotion Name + Image added!</p>
            <p><a href = 'add-emotion-form.php'>Add New Emoticon</a></p>
            <p><a href = 'index.php'>Home</a></p>
        ";
    } else {
        echo "Error!";
    }

?>


</body>
</html>