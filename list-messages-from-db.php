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

        #result {
            width: 100%;
            height: 80px;
            background: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top: 0.5px solid #bfbfbf;
            padding: 10px;
            /* position: relative; */
        }

        #result:hover {
            background: pink;
        }

        #result_image {
            /* flex: 1; */
            width: 30%;
            height: 100%;
       }

        #result_text {
            /* flex: 1; */
            width: 70%;
            height: 100%;
            font-family: helvetica, sans-serif;
            /* border-top: 0.5px solid #bfbfbf; */
            /* border-bottom: 0.5px solid #bfbfbf; */
            /* padding: 10px; */
            margin: 0;
        }

        #imgNameText {
            color: #ff0066;
        }

        #timeText {
            color: gray;
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
    $current_result = mysqli_query ($db, 
    "SELECT M.emotion_id, M.description, M.time, E.imgFileName, E.imgName 
    FROM messages AS M, emotions AS E WHERE M.emotion_id = E.id 
    ORDER BY M.time DESC LIMIT 20;");

    function extractName ($fileName) {
        $fName = pathinfo($fileName, PATHINFO_FILENAME);
        return $fName;
    }

    $echoImage = "";
    $imageSrc = "";


    while ($row = mysqli_fetch_array($current_result)) {

        if ($row['imgFileName'] == 'None') {
            echo "<div id = 'result'><div id = 'result_image'>No Image</div><div id = 'result_text'>{$row['description']}<br><span id = 'imgNameText'>{$row['imgName']}</span><br><span id = 'timeText'>{$row['time']}</span></div></div>";
        } else {
            foreach ($files as $currentfile) {
                if($currentfile != '.' && $currentfile != '..') {
                    $tempName = pathinfo($currentfile, PATHINFO_FILENAME);
                    if ($tempName == $row['imgFileName']) {
                        $imageSrc = $imgDir.$currentfile;
                        $echoImage = "<img src='{$imageSrc}' id='img'>";
                        echo "<div id = 'result'><div id = 'result_image'>$echoImage</div><div id = 'result_text'>{$row['description']}<br><span id = 'imgNameText'>{$row['imgName']}</span><br><span id = 'timeText'>{$row['time']}</span></div></div>";
                        // break;
                    }
                }
            }
        }
    }

?>

</body>
</html>