<html>
<head>
    <title> Message Board </title>
	
	<style>
		h3 {		
		font-family: helvetica, sans-serif;
		}
        #img {
            width: 60px;
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

    $files = scandir($imgDir);


    // $current_result = mysqli_query ($db, "SELECT * from messages;");
    $current_result = mysqli_query ($db, "SELECT M.emotion_id, M.description, M.time, E.imgFileName, E.imgName from messages as M, emotions as E WHERE M.emotion_id = E.id;");

    function extractName ($fileName) {
        $fName = pathinfo($fileName, PATHINFO_FILENAME);
        return $fName;
    }

    $echoImage = "";
    $imageSrc = "";


    while ($row = mysqli_fetch_array($current_result)) {
        // $aa = implode(" ", $row);
        // echo "<div class = 'check2'>".$aa." why........</div>";
    
        // for ($i = 0; $i < count($filesInDir); $i++) {            
        //     // $tempName = pathinfo($array[$i], PATHINFO_FILENAME);
        //     // echo "<div class = 'check2'>".$array[$i]." why........</div>";
    //             $tempName = extractName($currentImage);
    // if ($array[$i] == $row['M.emotion_id']) {
        // $imageSrc = $imgDir.$array[$i];
        // $echoImage = "<img src='$imageSrc'>";
        // break;

        foreach ($files as $currentfile) {
            if($currentfile != '.' && $currentfile != '..') {
                // $aa = implode(" ", $files);
                // echo "<div class = 'check4'>".$aa." why........</div>";
                // echo "<div class = 'check2'>$currentfile this is currentfile Name........</div>";
                $tempName = pathinfo($currentfile, PATHINFO_FILENAME);
                // echo "<div class = 'check3'>$tempName this is tempName........</div>";
                // echo "<div class = 'check5'>$row['imgFileName'] this is E.imgFileName........</div>";
                if ($tempName == $row['imgFileName']) {
                    $imageSrc = $imgDir.$currentfile;
                    // echo "<div class = 'check6'>$imageSrc this is imageSrc........</div>"
                    $echoImage = "<img src='{$imageSrc}' id='img'>";
                    break;
                }
            }
        }










        echo "<div class = 'result_image'>".$echoImage."<br>Image should be placed here</div>";
        echo "<div class = 'result'>".$row['time']."<br>".$row['description']."</div>";

    }






?>

</body>
</html>