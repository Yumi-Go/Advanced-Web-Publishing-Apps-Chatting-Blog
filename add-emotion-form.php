<html>
<head>
    <style>
        #img { width: 60px; }
        .avatar { margin: 1em; }
    </style>
	<title>Add New Emoticons</title>
</head>

<body>

<!-- <script>
    function addEmotion() {
    
        const imgFileNameNodeList = document.getElementsByName('imgFileName');
        var imgName = document.getElementById("imgName").value;
   
        // var querystring = "?";
        // var rbs = document.querySelectorAll('input[name="imgFileName"]');
        // var imgFileName = null;
        // for (var i = 0; i < rbs.length; i++) {
        //     if (rbs[i].checked) {
        //         imgFileName = rbs[i].value;
        //         break;
        //     }
        // }
        // querystring = "imgFileName=" + escape(imgFileName) + "&";

        var querystring = "?";
        imgFileNameNodeList.forEach((node) => {
            if (node.checked) {
                querystring += "imgFileName=" + escape(node.value) + "&";
            }
        });

        querystring += "imgName="+escape(imgName);
        location = "add-emotion-to-db.php"+querystring;
    }

    window.addEventListener('load', function(){
        document.getElementById("submitButton").addEventListener("click", addEmotion);
    });


</script> -->

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
            <input type='text' id='imgName' name='imgName'><br>
            <input type='radio' id='no_image' name='imgFileName' value='None'>
            <label for='no_image'>No Image</label><br>
    ";


    foreach ($filesInDir as $currentImage) {
        // $safeCurrentImage = urlencode($currentImage);
        $tempExt = findExts($currentImage);
        if (in_array($tempExt, $imageFormats)) {
            $imgFileName = findName($currentImage);
            $imageSrc = $imgDir.$currentImage;
            echo "<p>for check: $currentImage</p><input type='radio' id='$imgFileName' name='imgFileName' value='$imgFileName'>
            <label for='$imgFileName'><img src='$imageSrc' id='img'></label><br>";
        }
    }

    echo "<br><br><input type='submit' id='submit' name='submit' value='Submit'></form></div>";

?>
</body>
</html>