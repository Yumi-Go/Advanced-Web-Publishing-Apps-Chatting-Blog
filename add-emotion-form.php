<html>
<head>
    <style>
        #img { width: 60px; }
        
        .avatar { margin: 1em; }
        
        .radioLabel {
            vertical-align: middle;
        }
        
        [type="radio"] {
            vertical-align: middle;
        }
    </style>
    <title>Add New Emoticons</title>
</head>

<body>

<h1>Create New Emoticon</h1>

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

    function findExts ($fileName) {
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        return $ext;
    }

    function findName ($fileName) {
        $fName = pathinfo($fileName, PATHINFO_FILENAME);
        return $fName;
    }

    $imageFormats = array('png', 'jpg', 'jpeg', 'gif');
    $imgDir = 'images/';
    $filesInDir = scandir($imgDir);

    echo "
    <div class = 'avatar'>
        <form action = 'add-emotion-to-db.php' method = 'post'>
            <label for='imgName'>Name: </label>
            <input type='text' id='imgName' name='imgName'><br><br>
            <input type='radio' id='None' name='imgFileName' value='None'>
            <label for='None'><span class = 'radioLabel'>No Image</span></label><br><br>
    ";


    foreach ($filesInDir as $currentImage) {
        // $safeCurrentImage = urlencode($currentImage);
        $tempExt = findExts($currentImage);
        if (in_array($tempExt, $imageFormats)) {
            $imgFileName = findName($currentImage);
            $imageSrc = $imgDir.$currentImage;
            echo "<input type='radio' id='$imgFileName' name='imgFileName' value='$imgFileName'>
            <label for='$imgFileName'><span class = 'radioLabel'><img src='$imageSrc' id='img'></span></label><br><br>";
        }
    }

    echo "<input type='submit' id='submit' name='submit' value='Submit'></form></div>";
    echo "<p><a href = 'index.php'>Home</a></p>";
?>
</body>
</html>