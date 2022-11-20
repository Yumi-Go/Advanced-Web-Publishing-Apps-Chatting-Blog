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


    if (isset($_POST['emotion'])) {
        $emotion = $_POST['emotion'];
    }

    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    }

    $safe_emotion = mysqli_real_escape_string($db, $emotion);
    $safe_description = mysqli_real_escape_string($db, $description);

    
    $result = mysqli_query ($db, "INSERT into messages (emotion_id, description, time) VALUES ('$safe_emotion', '$safe_description', now());");

    /* Check if the query was successful */
    if ($result) {
        echo "<p>Message was added!</p>";
    } else {
        echo "Error!";
    }

?>


</body>
</html>