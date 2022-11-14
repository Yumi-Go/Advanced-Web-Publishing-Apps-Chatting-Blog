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

    function extractName ($fileName) {
        $fName = pathinfo($fileName, PATHINFO_FILENAME);
        return $fName;
    }

    while ($row = mysqli_fetch_array($current_result)) {

        // $emotion_from_db = ${row['emotion']};
        // $description_from_db = ${row['description']};
        // $time_from_db = ${row['time']};
        // $result_from_db = $description_from_db + $time_from_db + "\n\n\n";
    
        $imageFormats = array('png', 'jpg', 'jpeg', 'gif');
        $imgDir = 'images/';
        $filesInDir = scandir($imgDir);

        $emotionID_from_messages = $row['emotion_id'];
        $query_findImgName = "SELECT image FROM emotions WHERE emotions.id = $emotionID_from_messages";
        $emotionImg_name = mysqli_query ($db, $query_findImgName);

        $echoImage = "";
        if (!($emotionImg_name == NULL)) {
            foreach ($filesInDir as $currentImage) {
                // $safeCurrentImage = urlencode($currentImage);
                $tempName = extractName($currentImage);
                if ($tempName == $emotionImg_name) {
                    // $emotionImg_name = $tempName;
                    $imageSrc = $imgDir.$currentImage;
                    $echoImage = "<img src='$imageSrc'>";
                } else {
                    $echoImage = "Error. Can not load emoticon image";
                }
            }
        } else {
            $echoImage = "No Image";
        }

        // echo "<div class = 'result'>".$echoImage.$row['emotion_id']."<br>".$row['time']."<br>".$row['description']."</div>";
        echo "<div class = 'result'>".$echoImage."<br>".$row['time']."<br>".$row['description']."</div>";

    }





    // while ($row = mysqli_fetch_array($current_result_messages)) {
    //     // echo "<h3>${row['emotion']} </h3>";
    //     // echo "<p>${row['description']}</p>";

    //     // $emotion_from_db = ${row['emotion']};
    //     // $description_from_db = ${row['description']};
    //     // $time_from_db = ${row['time']};
    //     $emotionID_from_messages = ${row['emotion_id']};
    //     $query_findImgName = "SELECT image FROM emotions WHERE emotions.id = '$emotionID_from_messages'";
    //     $emotionImg_name = mysqli_query ($db, query_findImgName);
    //     if (!is_null($emotionImg_name)) {
    //         foreach ($filesInDir as $currentImage) {
    //             // $safeCurrentImage = urlencode($currentImage);
    //             $tempName = extractName($currentImage);
    //             if ($tempName == $emotionImg_name) {
    //                 // $emotionImg_name = $tempName;
    //                 $imageSrc = $imgDir.$currentImage;
    //                 echo "<img src='$imageSrc' id='img'></label><br>";
    //             } else {
    //                 echo "Error! Can't load emoticon image"
    //             }
    //         }
    //     } else {
    //         echo "No Image"
    //     }
    //     echo "<div class = 'result'>{$row['emotion_id']}<Br>{$row['time']}<br>{$row['description']}</div>";
    // }

?>













<!-- <p>Enter <a href = "index.php">a new message</a></p>
<p>View <a href = "display-messages.php">list of posts</a></p> -->

</body>
</html>