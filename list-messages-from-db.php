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
  'imgFileName' varchar NOT NULL, 
  'imgName' varchar NOT NULL
);
-->

<?php
    $db = mysqli_connect ('localhost', 'R00195941_db', 'LiftThanStand');
    mysqli_select_db ($db, 'R00195941_db');
    $charset_set = mysqli_set_charset ($db, 'utf8');


    $imageFormats = array('png', 'jpg', 'jpeg', 'gif');
    $imgDir = 'images/';
    $filesInDir = scandir($imgDir);


    // $current_result = mysqli_query ($db, "SELECT * from messages;");
    $current_result = mysqli_query ($db, "SELECT M.emotion_id, M.description, M.time, E.imgFileName, E.imgName from messages M, emotions E WHERE M.emotion_id = E.id;");

    function extractName ($fileName) {
        $fName = pathinfo($fileName, PATHINFO_FILENAME);
        return $fName;
    }

    $echoImage = "";


    while ($row = mysqli_fetch_array($current_result)) {
        $aa = implode(" ", $row);

        echo "<div class = 'check2'>".$aa." why........</div>";
    
        for ($i = 0; $i < count($filesInDir); $i++) {
            
            // $tempName = pathinfo($array[$i], PATHINFO_FILENAME);
            // echo "<div class = 'check2'>".$array[$i]." why........</div>";

            if ($array[$i] == $row['M.emotion_id']) {
                // $emotionImg_name = $tempName;
                $imageSrc = $imgDir.$array[$i];
                $echoImage = "<img src='$imageSrc'>";
                break;
            }
            // else {
            //     $echoImage = "Error. Can not load emoticon image";
            // }
        }







        // foreach ($filesInDir as $a) {
        //     $aa = implode(" ", $filesInDir);


        //     $tempName = pathinfo($a, PATHINFO_FILENAME);
        //     echo "<div class = 'check2'>".$a." why........</div>";

        //     if ($tempName == $row['M.emotion_id']) {
        //         // $emotionImg_name = $tempName;
        //         $imageSrc = $imgDir.$a;
        //         $echoImage = "<img src='$imageSrc'>";
        //         break;
        //     }
        //     // else {
        //     //     $echoImage = "Error. Can not load emoticon image";
        //     // }
        // }
    // }

    // while ($row = mysqli_fetch_array($current_result)) {

    //     // $emotion_from_db = ${row['emotion']};
    //     // $description_from_db = ${row['description']};
    //     // $time_from_db = ${row['time']};
    //     // $result_from_db = $description_from_db + $time_from_db + "\n\n\n";
    
    //     $imageFormats = array('png', 'jpg', 'jpeg', 'gif');
    //     $imgDir = 'images/';
    //     $filesInDir = scandir($imgDir);

    //     // $emotionID_from_messages = {$row['emotion_id']};
    //     // $query_findImgName = "SELECT imgFileName FROM emotions WHERE id = '{$emotionID_from_messages}'";
    //     // $emotionImg_name = mysqli_query ($db, $query_findImgName);
    //     $echoImage = "";


    //     if (!($row['emotion_id'] == NULL)) {
    //         foreach ($filesInDir as $currentImage) {
    //             echo "<div class = 'check'>".$emotionImg_name."</div>";
    //             // $safeCurrentImage = urlencode($currentImage);
    //             $tempName = extractName($currentImage);

    //             if ($tempName == $query_findImgName) {
    //                 // echo "<div class = 'check2'>$tempName</div>";

    //                 // $emotionImg_name = $tempName;
    //                 $imageSrc = $imgDir.$currentImage;
    //                 $echoImage = "<img src='$imageSrc'/>";
    //                 break;
    //             }
    //             // else {
    //             //     $echoImage = "Error. Can not load emoticon image";
    //             // }
    //         }
    //     } else {
    //         $echoImage = "No Image";
    //     }


        // echo "<div class = 'result_image'>$echoImage<br>Image should be placed here</div>";
        echo "<div class = 'result'>".$echoImage."<br>".$row['time']."<br>".$row['description']."</div>";

    }






?>

</body>
</html>