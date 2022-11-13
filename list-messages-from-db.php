<html>
<head>
    <title> Message Board </title>
	
	<style>
		h3 {
		
		font-family: helvetica, sans-serif;
		}
	</style>
</head>
<body>
<script>


</script>


<!-- 
CREATE TABLE 'messages' (
  'id' int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'emotion_id' int NOT NULL,
  'description' text NOT NULL,
  'time' datetime NOT NULL
);

CREATE TABLE 'emotions' (
  'id' int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'image' varchar NOT NULL, 
  'name' varchar NOT NULL
);
-->

<?php
    $db = mysqli_connect ('localhost', 'R00195941_db', 'LiftThanStand');
    mysqli_select_db ($db, 'R00195941_db');
    $charset_set = mysqli_set_charset ($db, 'utf8');

    $current_result = mysqli_query ($db, "SELECT * from messages;");

    // $emotion_from_db = "";
    // $description_from_db = "";
    // $result_from_db = "";
    while ($row = mysqli_fetch_array($current_result)) {
        // echo "<h3>${row['emotion']} </h3>";
        // echo "<p>${row['description']}</p>";

        // $emotion_from_db = ${row['emotion']};
        // $description_from_db = ${row['description']};
        // $time_from_db = ${row['time']};
        // $result_from_db = $description_from_db + $time_from_db + "\n\n\n";
        echo "<div class = 'result'>{$row['emotion_id']}<Br>{$row['time']}<br>{$row['description']}</div>";
    }


    // while ($row = mysqli_fetch_array ($current_result)) {
    //     echo "<div class = 'result'>{$row}</div>\n";
    //  }

?>



<!-- <p>Enter <a href = "index.php">a new message</a></p>
<p>View <a href = "display-messages.php">list of posts</a></p> -->

</body>
</html>